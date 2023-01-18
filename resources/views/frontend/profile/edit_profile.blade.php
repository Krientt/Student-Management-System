@extends('frontend.master')
@section('title','Edit Profile')
@section('content')
@if(Auth::guard('visitor')->check())
<div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('images/bg_1.jpg')">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-lg-7">
                <h2 class="mb-0">Edit Profile</h2>
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
        <span class="current">Edit Profile</span>
    </div>
</div>
@include('admin.includes.flash_message')

<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
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

            <div class="col-lg-4 col-lg-8 mb-4">
                <div class="course-1-item">
                    <figure class="thumnail">
                        <div class="category">
                            <h3>Edit Profile</h3>
                        </div>
                    </figure>
                    <div class="pb-4">
                        <form class="form-horizontal" name="edit-profile" action="{{route('frontend.profile.update')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$visitor->id}}">
                            <hr>
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Name</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputName" placeholder="Name" name="name" value="{{$visitor->name}}" required>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Parents_Name</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputParents_Name" value="{{$visitor->Parents_Name}}" placeholder="Parents Name" name="Parents_Name">
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="inputEmail" placeholder="Email" name="email" value="{{$visitor->email}}" required>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Phone_Number</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputPhone_Number" value="{{$visitor->Phone_Number}}" placeholder="Phone Number" name="Phone_Number">
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Class</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputClass" value="{{$visitor->Class}}" placeholder="Class" name="Class">
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <a href="{{route('frontend.profile.view')}}" class="small btn btn-primary px-3 py-1.5 rounded-4">Back To Profile</a>
                                    <button type="submit" class="btn btn-danger">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endif
@endsection