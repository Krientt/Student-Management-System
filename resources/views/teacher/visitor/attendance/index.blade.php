@extends('teacher.master')
@section('title','Attendance Details')
@section('content')
<section class='content'>
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Attendance Details</h3>
                    @include('admin.includes.flash_message')
                    <div id="msg"></div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>S.N.</th>
                                <th>Student Name</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($attendances) > 0 )
                            @foreach($attendances as $key=>$attendance)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$attendance->visitor->name}}</td>
                                <td>{{$attendance->date}}</td>
                                <td>@if($attendance->status == 1)
                                    Present
                                    @elseif($attendance->status == 0)
                                    Absent
                                    @else
                                    Holiday
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('student.attendance.edit',$attendance->id)}}"><button class="btn btn-primary">
                                            <i class="fa fa-edit"></i>
                                        </button></a>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="4" class="text-center">No Records Found..</td>
                            </tr>
                            @endif
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>S.N.</th>
                                <th>Student Name</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection