@extends('teacher.master')
@section('title','Student Register')
@section('content')
<section class='content'>
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Student Registration</h3>
                    @include('admin.includes.flash_message')
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form action="{{route('teacher.student.store')}}" method="post" id="demo-form2" class="form-horizontal form-label-left" novalidate="">
                        @csrf
                        <div class="box-body">
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Student Name<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" name='name' class="form-control" id="name" placeholder="Student Name" required>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="Parents_Name">Parents Name<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" name="Parents_Name" class="form-control" id="Parents_Name" placeholder="Parents Name">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="Class" class="col-form-label col-md-3 col-sm-3 label-align">Class<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" name="Class" class="form-control" id="Class" placeholder="Class">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="email">Email<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="email" name='email' class="form-control" id="email" placeholder="Email" required>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Phone Number<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="integer" name="Phone_Number" class="form-control" id="Phone_Number" placeholder="Phone Number">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Password<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="password" name='password' class="form-control" id="password" placeholder="Password" required>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Confirm Password<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="password" name='confirm-password' class="form-control" id="password" placeholder="Retype password" required>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <a href="{{route('teacher.dashboard')}}"><button class="btn btn-primary" type="button">Cancel</button></a>
                            <button class="btn btn-primary" type="reset">Reset</button>
                            <button type="submit" name="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection