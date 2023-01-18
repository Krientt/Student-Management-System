@extends('admin.master')
@section('title','Teacher Register')
@section('content')
<section class='content'>
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Teacher Registration</h3>
                    @include('admin.includes.flash_message')
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form action="{{route('admin.teacher.store')}}" method="post" id="demo-form2" class="form-horizontal form-label-left" novalidate="">
                        @csrf
                        <div class="box-body">
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Teacher Name<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" name='name' class="form-control" id="name" placeholder="Teacher Name" required>
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
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Contact<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="integer" name="contact" class="form-control" id="contact" placeholder="Contact">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="Parents_Name">Address<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" name="address" class="form-control" id="address" placeholder="Address">
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
                            <a href="{{route('admin.dashboard')}}"><button class="btn btn-primary" type="button">Cancel</button></a>
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