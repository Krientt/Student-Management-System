<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\admin\Blog;
use App\Models\admin\Category;
use App\Models\admin\Detail;
use App\Models\admin\Feature;
use App\Models\admin\Notice;
use App\Models\Frontend\Comment;
use App\Models\Frontend\Like;
use App\Models\Frontend\Visitor;
use App\Models\Teacher\Attendance;
use App\Models\Teacher\Mark;
use App\Models\Teacher\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class FrontendController extends Controller
{
    public function home()
    {
        $sliders = Blog::with('user', 'category')->where('show_in_slider', 1)->get();
        $counts = DB::select("SELECT b.id as blog_id,count(l.id) as count_likes FROM `blogs` b LEFT JOIN likes l ON b.id = l.blog_id GROUP BY b.id ORDER by count_likes DESC LIMIT 5");
        $ids = [];
        foreach ($counts as $count) {
            $ids[] = $count->blog_id;
        }
        $populars = Blog::with('user', 'category')->whereIn('id', $ids)->get();
        $details = Detail::where('status', 1)->get();
        $features = Feature::where('show_in_home', 1)->latest()->take(3)->get();
        $recents = Notice::latest()->take(3)->get();
        $latests = Notice::latest()->take(1)->get();
        // $recents = Blog::with('user','category')->whereIn('id',$ids)->latest()->take(5)->get();
        return view('frontend.homepage', compact('sliders', 'populars', 'details', 'features', 'recents', 'latests'));
    }
    public function categories()
    {
        $categories = Category::where('status', 1)->get();
        $blogs = Blog::with('user', 'category')->where('status', 1)->get();
        // $counts = DB::select("SELECT b.id as blog_id,count(l.id) as count_likes FROM `blogs` b LEFT JOIN likes l ON b.id = l.blog_id GROUP BY b.id ORDER by count_likes DESC LIMIT 5");
        // $ids =[];
        // foreach($counts as $count){
        //     $ids[] = $count->blog_id;
        // }
        // $populars = Blog::with('user','category')->whereIn('id',$ids)->get();
        return view('frontend.pages.all_categories', compact('categories', 'blogs'));
    }
    public function category($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $blogs = Blog::where('category_id', $category->id)->where('status', 1)->get();
        // $counts = DB::select("SELECT b.id as blog_id,count(l.id) as count_likes FROM `blogs` b LEFT JOIN likes l ON b.id = l.blog_id GROUP BY b.id ORDER by count_likes DESC LIMIT 5");
        // $ids =[];
        // foreach($counts as $count){
        //     $ids[] = $count->blog_id;
        // }
        // $populars = Blog::with('user','category')->whereIn('id',$ids)->get();
        return view('frontend.pages.category', compact('blogs', 'category'));
    }
    public function singleBlog($slug)
    {
        $blog = Blog::with('user', 'category')->where('slug', $slug)->first();
        // $counts = DB::select("SELECT b.id as blog_id,count(l.id) as count_likes FROM `blogs` b LEFT JOIN likes l ON b.id = l.blog_id GROUP BY b.id ORDER by count_likes DESC LIMIT 5");
        // $ids =[];
        // foreach($counts as $count){
        //     $ids[] = $count->blog_id;
        // }
        // $populars = Blog::with('user','category')->whereIn('id',$ids)->get();
        if (Auth::guard('visitor')->check()) {
            $user_liked = Like::where('visitor_id', Auth::guard('visitor')->user()->id)->where('blog_id', $blog->id)->count();
        } else {
            $user_liked = Like::where('blog_id', $blog->id)->count();
        }
        $comments = Comment::with('visitor')->where('blog_id', $blog->id)->get();
        $liked = Like::where('blog_id', $blog->id)->count();
        return view('frontend.pages.single_blog', compact('blog', 'liked', 'user_liked', 'comments'));
    }
    public function postComment(Request $request)
    {
        $request->validate([
            'blog_id' => 'required|integer',
            'visitor_id' => 'required|integer',
            'comment' => 'required|min:20|max:255',
        ]);
        Comment::create($request->all());
        return redirect()->back();
    }
    public function like(Request $request, $id)
    {
        $like = Like::where('visitor_id', Auth::guard('visitor')->user()->id)->where('blog_id', $id)->first();
        if ($like) {
            $like->delete();
            $liked = Like::where('blog_id', $id)->count();
            return response(['message' => 'unliked', 'liked' => $liked]);
        } else {
            $like = new Like();
            $like->blog_id = $id;
            $like->visitor_id = Auth::guard('visitor')->user()->id;
            $like->visitor_name = Auth::guard('visitor')->user()->name;
            $like->save();
            $liked = Like::where('blog_id', $id)->count();
            return response(['message' => 'liked', 'liked' => $liked]);
        }
    }
    public function searchBlog(Request $request)
    {
        $blogs = Blog::with('user', 'category')->where('title', 'LIKE', '%' . $request->search . '%')->get();
        return view('frontend.pages.search', compact('blogs'));
    }
    public function profile(Request $request)
    {
        $visitor = Auth::guard('visitor')->user();
        return view('frontend.profile.index', compact('visitor'));
    }
    public function editProfile()
    {
        $visitor = Auth::guard('visitor')->user();
        return view('frontend.profile.edit_profile', compact('visitor'));
    }
    public function updateProfile(Request $request)
    {
        $datas = $request->all();
        $request->validate([
            'name' => 'required|min:3|max:50',
            'Parents_Name' => 'required|min:3|max:50',
            'email' => 'required|email|unique:visitors,email,' . $request->id, //same email cannot be used by different people.
            'Phone_Number' => 'required|unique:visitors,Phone_Number,' . $request->id,
            'Class' => 'required',
        ]);
        $visitor = Visitor::find($request->id);
        $visitor->name = $datas['name'];
        $visitor->Parents_Name = $datas['Parents_Name'];
        $visitor->email = $datas['email'];
        $visitor->Phone_Number = $datas['Phone_Number'];
        $visitor->Class = $datas['Class'];
        $visitor->update();
        return redirect()->back()->with('success', 'Profile Updated Successfully.');
    }
    public function changePassword()
    {
        $visitor = Auth::guard('visitor')->user();
        return view('frontend.profile.pass_change', compact('visitor'));
    }
    public function updatePassword(Request $request)
    {
        $check = Hash::check($request->current_password, Auth::guard('visitor')->user()->password);
        if ($check) {
            $request->validate([
                'password' => 'required|min:6|max:100',
                'confirm-password' => 'required|same:password',
            ]);
            $visitor = Visitor::find(Auth::guard('visitor')->user()->id);
            $visitor->password = Hash::make($request->password);
            $visitor->update();
            return redirect()->back()->with('success', 'Password Changed Successfully');
        } else {
            return redirect()->back()->with('error', 'Old Password Do Not Match.');
        }
    }
    public function about()
    {
        $details = Detail::where('status', 1)->get();
        $features = Feature::all();
        return view('frontend.pages.about_school', compact('details', 'features'));
    }
    public function aboutTeachers()
    {
        $teachers = Teacher::all();
        $details = Detail::where('status', 1)->get();
        return view('frontend.pages.about_teachers', compact('teachers', 'details'));
    }
    public function allNotice()
    {
        $notices = Notice::latest()->get();
        return view('frontend.pages.all_notices', compact('notices'));
    }
    public function singleNotice($id)
    {
        $notice = Notice::where('id', $id)->first();
        return view('frontend.pages.single_notice', compact('notice'));
    }
    public function likes()
    {
        $visitor = Auth::guard('visitor')->user();
        $likes = Like::with('blog', 'visitor')->where('visitor_id', Auth::guard('visitor')->user()->id)->get();
        return view('frontend.profile.enrollment', compact('likes', 'visitor'));
    }
    public function attendances()
    {
        $visitor = Auth::guard('visitor')->user();
        $attendances = Attendance::with('visitor')->where('visitor_id', Auth::guard('visitor')->user()->id)->get();
        return view('frontend.profile.attendance', compact('attendances', 'visitor'));
    }
    public function marks()
    {
        $visitor = Auth::guard('visitor')->user();
        $marks = Mark::with('visitor', 'blog1', 'blog2', 'blog3', 'blog4', 'blog5')->where('visitor_id', Auth::guard('visitor')->user()->id)->get();
        return view('frontend.profile.marks', compact('marks', 'visitor'));
    }
}
