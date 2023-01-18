@extends('frontend.master')
@section('title','Search Results')
@section('content')
<div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('images/bg_1.jpg')">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-lg-7">
                <h2 class="mb-0">Search Results</h2>
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
        <span class="current">Search</span>
    </div>
</div>
<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <span class="caption d-block small">Blogs</span>
                </div>
                @if($blogs->count() > 0)
                <div class="row">
                    @foreach($blogs as $blog)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="course-1-item">
                            <figure class="thumnail">
                                <a href="{{route('frontend.single.blog',$blog->slug)}}"><img src="/uploads/blogs/{{$blog->image}}" alt="Image" class="img-fluid"></a>
                                <div class="category">
                                    <a href="{{route('frontend.single.blog',$blog->slug)}}">
                                        <h3>{{$blog->title}}</h3>
                                    </a>
                                </div>
                            </figure>
                            <div class="course-1-content pb-4">
                                <div class="rating text-center mb-3">
                                </div>
                                <p class="desc mb-4">{!!\Illuminate\Support\Str::limit($blog->description,100)!!}</p>
                                <p><a href="{{route('frontend.single.blog',$blog->slug)}}" class="btn btn-primary rounded-0 px-4">More Info</a></p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <div class="post-entry-2 d-flex">
                    No Records Found........
                </div>
                @endif

            </div>
        </div>
    </div>
</div>
@endsection