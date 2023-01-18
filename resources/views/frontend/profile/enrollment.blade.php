@extends('frontend.master')
@section('title','Enrolled Courses')
@section('content')
@if(Auth::guard('visitor')->check())
<div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('images/bg_1.jpg')">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-lg-7">
                <h2 class="mb-0">Enrolled Courses</h2>
            </div>
        </div>
    </div>
</div>


<div class="custom-breadcrumns border-bottom">
    <div class="container">
        <a href="{{route('frontend.home')}}">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <a href="{{route('frontend.profile.view')}}">Profile</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Enrolled Courses</span>
    </div>
</div>
@include('admin.includes.flash_message')

<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="course-1-item">
                            <figure class="thumnail">
                                <div class="category">
                                    <h3>About Me</h3>
                                </div>
                            </figure>
                            <div class="course-1-content pb-4">
                                <hr>
                                <strong><i class="fa fa-pencil margin-r-5"></i>Name:</strong>
                                <p>
                                    {{$visitor->name}}
                                </p>
                                <hr>
                                <strong><i class="fa fa-pencil margin-r-5"></i> Parents_Name:</strong>
                                <p>
                                    {{$visitor->Parents_Name}}
                                </p>
                                <hr>
                                <strong><i class="fa fa-map-marker margin-r-5"></i> Email:</strong>
                                <p>
                                    {{$visitor->email}}
                                </p>
                                <hr>
                                <strong><i class="fa fa-pencil margin-r-5"></i> Phone_Number:</strong>
                                <p>
                                    {{$visitor->Phone_Number}}
                                </p>
                                <hr>
                                <strong><i class="fa fa-pencil margin-r-5"></i>Class:</strong>
                                <p>
                                    {{$visitor->Class}}
                                </p>
                                <hr>
                                <strong><i class="fa fa-file-text-o margin-r-5"></i> Member_Since:</strong>
                                <p>{{$visitor->created_at->diffForHumans()}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="row">
                    @foreach($likes as $like)
                    <div class="col-lg-6">
                        <div class="course-1-item">
                            <figure class="thumnail">
                                <a href="{{route('frontend.single.blog',$like->blog->slug)}}"><img src="/uploads/blogs/{{$like->blog->image}}" alt="Image" class="img-fluid" width="350" height="200"></a>
                                <div class="category">
                                    <a href="{{route('frontend.single.blog',$like->blog->slug)}}">
                                        <h3>{{$like->blog->title}}</h3>
                                    </a>
                                </div>
                            </figure>
                            <div class="course-1-content pb-4">
                                <div class="rating text-center mb-3">
                                </div>
                                <p class="desc mb-4">{!!\Illuminate\Support\Str::limit($like->blog->description,100)!!}</p>
                                <p><a href="{{route('frontend.single.blog',$like->blog->slug)}}" class="btn btn-primary rounded-0 px-4">More Info</a></p>
                            </div>
                        </div>
                        <hr>
                        <hr>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection