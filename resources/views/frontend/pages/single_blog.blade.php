@extends('frontend.master')
@section('title','Course Details')
@section('content')
<div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('images/bg_1.jpg')">
  <div class="container">
    <div class="row align-items-end">
      <div class="col-lg-7">
        <h2 class="mb-0">{{$blog->title}}</h2>
      </div>
    </div>
  </div>
</div>


<div class="custom-breadcrumns border-bottom">
  <div class="container">
    <a href="{{route('frontend.home')}}">Home</a>
    <span class="mx-3 icon-keyboard_arrow_right"></span>
    <a href="{{route('frontend.categories')}}">Courses</a>
    <span class="mx-3 icon-keyboard_arrow_right"></span>
    <span class="current">Course</span>
  </div>
</div>
@include('admin.includes.flash_message')
<div class="site-section">
  <div class="container">
    <div class="row">
      <div class="col-md-6 mb-4">
        <p>
          <img src="/uploads/blogs/{{$blog->image}}" alt="Image" class="img-fluid">
        </p>
      </div>
      <div class="col-lg-5 ml-auto align-self-center">
        <h2 class="section-title-underline mb-5">
          <span>Course Details</span>
        </h2>

        <p><strong class="text-black d-block">Teacher:</strong> {{$blog->teacher->name}}</p>
        <p class="mb-5"><strong class="text-black d-block">Duration:</strong>{{$blog->ctime}}</p>
        {!!$blog->description!!}
        <p>
          @if(Auth::guard('visitor')->check())
          @if($user_liked > 0)
          <button class="btn btn-primary liked show-like-value rounded-0 btn-lg px-5" id="like" onclick='likeBlog("{{$blog->id}}")'>Drop Out ({{$liked}}) </button>
          @else
          <button class="btn btn-primary unlike show-like-value rounded-0 btn-lg px-5" id="like" onclick='likeBlog("{{$blog->id}}")'>Enroll ({{$liked}}) </button>
          @endif
          @else
          <button class="btn btn-primary unlike show-like-value rounded-0 btn-lg px-5" data-toggle="modal" data-target="#loginModal">Enroll ({{$liked}}) </button>
          @endif
        </p>

      </div>

    </div>
  </div>
</div>
<!-- Comments -->
<div class="site-section">
  <div class="container">
    <div class="row mb-5">
      <div class="col-lg-4">
        <h2 class="section-title-underline">
          <span>{{count($comments)}} Comments</span>
        </h2>
      </div>
    </div>
    <ul class="comment-list">
      @foreach($comments as $comment)
      <div class="custom-breadcrumns border-bottom">
        <li class="comment">
          <div class="comment-body">
            <div class="ftco-testimonial-vcard d-flex align-items-center mb-4">
              <div>
                <h3>{{ucwords($comment->visitor->name)}}</h3>
                <span>{{$comment->created_at->format('F d,Y')}} AT {{$comment->created_at->format('h:i')}}</span>
              </div>
            </div>
            <div>
              <p>&ldquo;{!!$comment->comment!!}&rdquo;</p>
            </div>
          </div>
        </li>
      </div>
      @endforeach
    </ul>
    @if(Auth::guard('visitor')->check())
    <div class="comment-form-wrap pt-5">
      <div class="section-title">
        <h2 class="mb-5">Leave a comment</h2>
      </div>
      <form action="{{route('frontend.post.comment')}}" method="post" class="p-5 bg-light">
        @csrf
        <input type="hidden" name="blog_id" value="{{$blog->id}}">
        <input type="hidden" name="visitor_id" value="{{Auth::guard('visitor')->user()->id}}" />
        <div class="form-group">
          <label for="message">Message</label>
          <textarea id="message" name="comment" placeholder="Comment Here" cols="30" rows="10" class="form-control"></textarea>
        </div>
        <div class="form-group">
          <input type="submit" value="Post Comment" class="btn btn-primary rounded-0 px-4">
        </div>
      </form>
    </div>
    @else
    <div class="comment-form-wrap pt-5">
      <button class="btn btn-primary rounded-0 px-4" data-toggle="modal" data-target="#loginModal">Log In To Comment</button>
    </div>
    @endif
  </div>
</div>
@endsection
@push('scripts')
<script>
  function likeBlog(id) {
    $.ajax({
      type: 'GET',
      url: '/blog/like/post/' + id,
      data: '',
      success: function(data) {
        if (data.message == "liked") {
          $('.show-like-value').html("Drop Out (" + data.liked + ")");
        } else {
          $('.show-like-value').html("Enroll (" + data.liked + ")");
        }
      }
    });
  }
</script>
@endpush