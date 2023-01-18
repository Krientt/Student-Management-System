@extends('teacher.master')
@section('title','Attendance')
@section('content')
<section class='content'>
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Attendance</h3>
                    @include('admin.includes.flash_message')
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form action="{{route('student.attendance.store')}}" method="post" id="demo-form2" class="form-horizontal form-label-left" novalidate="">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="visitor">Student Name</label>
                                <select name="visitor_id" class="form-control" id="visitor">
                                    <option value="" selected disabled>Select Student</option>
                                    @foreach($visitors as $visitor)
                                    <option value="{{$visitor->id}}">{{$visitor->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="date">Date</label>
                                <input type="date" name='date' class="form-control" id="date">
                            </div>
                            <div class="form-group">
                                <label for="exampleForStatus">Status</label>
                                <select name="status" class="form-control" id="exampleForStatus">
                                    <option value="2">Holiday</option>
                                    <option value="1">Present</option>
                                    <option value="0">Absent</option>
                                </select>
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