@extends('frontend.master')
@section('title','Profile')
@section('content')
@if(Auth::guard('visitor')->check())
<div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('images/bg_1.jpg')">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-lg-7">
                <h2 class="mb-0">Profile</h2>
            </div>
        </div>
    </div>
</div>


<div class="custom-breadcrumns border-bottom">
    <div class="container">
        <a href="{{route('frontend.home')}}">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Profile</span>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-lg-6">
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
                    <div class="col-lg-6">
                        <div class="course-1-item">
                            <figure class="thumnail">
                                <div class="category">
                                    <h3>Edit Profile</h3>
                                </div>
                            </figure>
                            <div class="course-1-content pb-4">
                                <h2>To Edit Your Profile</h2>
                                <p class="desc mb-4">Follow The Link Below</p>
                                <p><a href="{{route('frontend.profile.edit')}}" class="btn btn-primary rounded-0 px-4">Edit Profile</a></p>
                            </div>
                        </div>
                        <hr>
                        <div class="course-1-item">
                            <figure class="thumnail">
                                <div class="category">
                                    <h3>Courses You Enrolled</h3>
                                </div>
                            </figure>
                            <div class="course-1-content pb-4">
                                <h2>To View Courses You Enrolled</h2>
                                <p class="desc mb-4">Follow The Link Below</p>
                                <p><a href="{{route('frontend.profile.enrollment')}}" class="btn btn-primary rounded-0 px-4">Check Enrollment</a></p>
                            </div>
                        </div>
                        <hr>
                        <div class="course-1-item">
                            <figure class="thumnail">
                                <div class="category">
                                    <h3>Marks You Scored</h3>
                                </div>
                            </figure>
                            <div class="course-1-content pb-4">
                                <h2>To View Marks You Scored</h2>
                                <p class="desc mb-4">Follow The Link Below</p>
                                <p><a href="{{route('frontend.profile.marks')}}" class="btn btn-primary rounded-0 px-4">Check Marks</a></p>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="course-1-item">
                    <figure class="thumnail">
                        <div class="category">
                            <h3>Change Password</h3>
                        </div>
                    </figure>
                    <div class="course-1-content pb-4">
                        <h2>To Change Your Password</h2>
                        <p class="desc mb-4">Follow The Link Below</p>
                        <p><a href="{{route('frontend.profile.passchange')}}" class="btn btn-primary rounded-0 px-4">Change Password</a></p>
                    </div>
                </div>
                <hr>
                <div class="course-1-item">
                    <figure class="thumnail">
                        <div class="category">
                            <h3>Your Attendance Record</h3>
                        </div>
                    </figure>
                    <div class="course-1-content pb-4">
                        <h2>To View Your Attendance Record</h2>
                        <p class="desc mb-4">Follow The Link Below</p>
                        <p><a href="{{route('frontend.profile.attendance')}}" class="btn btn-primary rounded-0 px-4">Check Attendance</a></p>
                    </div>
                </div>
                <hr>
            </div>
        </div>
    </div>
</div>
@endif
@endsection