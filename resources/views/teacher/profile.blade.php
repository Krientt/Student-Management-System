@extends('teacher.master')
@section('title','Teacher Profile')
@section('content')
<section class="content">
    <div class="row">
        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle" src="/uploads/teacher_profile/{{$teacher->image}}" alt="User profile picture">

                    <h3 class="profile-username text-center">{{$teacher->name}}</h3>

                    <p class="text-muted text-center">{{$teacher->username}}</p>

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

            <!-- About Me Box -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">About Me</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <strong><i class="fa fa-book margin-r-5"></i> Quote</strong>

                    <p class="text-muted">
                        {{Auth::user()->bio}}
                    </p>

                    <hr>

                    <strong><i class="fa fa-map-marker margin-r-5"></i> Email</strong>

                    <p class="text-muted">{{Auth::user()->email}}</p>

                    <hr>

                    <strong><i class="fa fa-pencil margin-r-5"></i> Username</strong>

                    <p>
                        {{Auth::user()->username}}
                    </p>

                    <hr>

                    <strong><i class="fa fa-pencil margin-r-5"></i> Contact</strong>

                    <p>
                        {{Auth::user()->contact}}
                    </p>

                    <hr>

                    <strong><i class="fa fa-pencil margin-r-5"></i> Address</strong>

                    <p>
                        {{Auth::user()->address}}
                    </p>

                    <hr>

                    <strong><i class="fa fa-file-text-o margin-r-5"></i> Member Since</strong>

                    <p>{{Auth::user()->created_at->diffForHumans()}}</p>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#edit" data-toggle="tab">Edit Profile</a></li>
                    <li><a href="#password" data-toggle="tab">Change Password</a></li>
                </ul>
                <div class="tab-content">
                    <div class="active tab-pane" id="edit">
                        <form class="form-horizontal" name="edit-profile" action="{{route('teacher.edit.profile')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @include('admin.includes.flash_message')
                            <input type="hidden" name="id" value="{{$teacher->id}}">
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Name</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputName" placeholder="Name" name="name" value="{{$teacher->name}}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="inputEmail" placeholder="Email" name="email" value="{{$teacher->email}}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Username</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputName" value="{{$teacher->username}}" placeholder="Username" name="username">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Contact</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputName" value="{{$teacher->contact}}" placeholder="Contact" name="contact">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Address</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputName" value="{{$teacher->address}}" placeholder="Address" name="address">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputExperience" class="col-sm-2 control-label">Quote</label>

                                <div class="col-sm-10">
                                    <textarea class="form-control" id="inputExperience" placeholder="Bio" name="bio">{{$teacher->bio}}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputSkills" class="col-sm-2 control-label">Profile Picture</label>

                                <div class="col-sm-10">
                                    <input type="file" class="form-control" id="inputSkills" placeholder="Image" name="image">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-danger">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="password">

                        <form class="form-horizontal" action="{{route('teacher.change.password')}}" method="post">
                            @include('admin.includes.flash_message')
                            <div class="form-group">
                                @csrf
                                <label for="inputName" class="col-sm-2 control-label">Current Password</label>

                                <div class="col-sm-10">
                                    <input type="password" name="current_password" class="form-control" id="inputName" placeholder="Current Password" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail" class="col-sm-2 control-label">New Password</label>

                                <div class="col-sm-10">
                                    <input type="password" name="password" class="form-control" id="inputEmail" placeholder="New Password" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Confirm New Password</label>

                                <div class="col-sm-10">
                                    <input type="password" name="confirm-password" class="form-control" id="inputName" placeholder="Confirm New Password" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-danger">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div>
            <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.nav-tabs-custom -->
    </div>
    <!-- /.col -->
    </div>
    <!-- /.row -->

</section>
@endsection