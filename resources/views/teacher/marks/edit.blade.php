@extends('teacher.master')
@section('title','Marksheet')
@section('content')
<section class='content'>
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Edit Marks Details</h3>
                    @include('admin.includes.flash_message')
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form action="{{route('student.marks.update',$mark->id)}}" method="post" id="demo-form2" class="form-horizontal form-label-left" novalidate="">
                        @method('patch')
                        @csrf
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-11 form-group">
                                    <label for="visitor">Student Name</label>
                                    <select name="visitor_id" class="form-control" id="visitor">
                                        <option value="" selected disabled>Select Student</option>
                                        @foreach($visitors as $visitor)
                                        <option value="{{$visitor->id}}" {{($mark->visitor_id == $visitor->id)?'selected':''}}>{{$visitor->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-11 form-group">
                                    <label for="terminals">Exam Terminal</label>
                                    <input type="text" name="terminal" id="terminals" value="{{$mark->terminal}}" class="form-control form-control-lg">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5 form-group">
                                    <label for="blog1">1st Subject</label>
                                    <select name="blog1_id" class="form-control" id="blog1">
                                        <option value="" selected disabled>Select Subject</option>
                                        @foreach($blogs as $blog)
                                        <option value="{{$blog->id}}" {{($mark->blog1_id == $blog->id)?'selected':''}}>{{$blog->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-1"> </div>
                                <div class="col-md-5 form-group">
                                    <label for="marks1">Marks</label>
                                    <input type="Integer" class="form-control" name="marks1" value="{{$mark->marks1}}" id="marks1" placeholder="Enter Marks">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5 form-group">
                                    <label for="blog2">2nd Subject</label>
                                    <select name="blog2_id" class="form-control" id="blog2">
                                        <option value="" selected disabled>Select Subject</option>
                                        @foreach($blogs as $blog)
                                        <option value="{{$blog->id}}" {{($mark->blog2_id == $blog->id)?'selected':''}}>{{$blog->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-1"> </div>
                                <div class="col-md-5 form-group">
                                    <label for="marks2">Marks</label>
                                    <input type="Integer" class="form-control" name="marks2" value="{{$mark->marks2}}" id="marks2" placeholder="Enter Marks">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5 form-group">
                                    <label for="blog3">3rd Subject</label>
                                    <select name="blog3_id" class="form-control" id="blog3">
                                        <option value="" selected disabled>Select Subject</option>
                                        @foreach($blogs as $blog)
                                        <option value="{{$blog->id}}" {{($mark->blog3_id == $blog->id)?'selected':''}}>{{$blog->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-1"> </div>
                                <div class="col-md-5 form-group">
                                    <label for="marks3">Marks</label>
                                    <input type="Integer" class="form-control" name="marks3" value="{{$mark->marks3}}" id="marks3" placeholder="Enter Marks">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5 form-group">
                                    <label for="blog4">4th Subject</label>
                                    <select name="blog4_id" class="form-control" id="blog4">
                                        <option value="" selected disabled>Select Subject</option>
                                        @foreach($blogs as $blog)
                                        <option value="{{$blog->id}}" {{($mark->blog4_id == $blog->id)?'selected':''}}>{{$blog->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-1"> </div>
                                <div class="col-md-5 form-group">
                                    <label for="marks4">Marks</label>
                                    <input type="Integer" class="form-control" name="marks4" value="{{$mark->marks4}}" id="marks4" placeholder="Enter Marks">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5 form-group">
                                    <label for="blog5">5th Subject</label>
                                    <select name="blog5_id" class="form-control" id="blog5">
                                        <option value="" selected disabled>Select Subject</option>
                                        @foreach($blogs as $blog)
                                        <option value="{{$blog->id}}" {{($mark->blog5_id == $blog->id)?'selected':''}}>{{$blog->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-1"> </div>
                                <div class="col-md-5 form-group">
                                    <label for="marks5">Marks</label>
                                    <input type="Integer" class="form-control" name="marks5" value="{{$mark->marks5}}" id="marks5" placeholder="Enter Marks">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-11 form-group">
                                    <label for="remarks">Grade</label>
                                    <input type="text" name="remarks" value="{{$mark->remarks}}" id="remarks" class="form-control form-control-lg">
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