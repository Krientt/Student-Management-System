@extends('admin.master')
@section('title','Course Enrollment Details')
@section('content')
<section class='content'>
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Course Enrollment Details</h3>
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
                                <th>Enrolled Courses</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($likes) > 0 )
                            @foreach($likes as $key=>$like)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$like->visitor->name}}</td>
                                <td>{{$like->blog->title}}</td>
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
                                <th>Enrolled Courses</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection