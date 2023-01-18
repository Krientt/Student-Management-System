@extends('admin.master')
@section('title','Teacher Details')
@section('content')
<section class='content'>
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Teacher Details</h3>
                    @include('admin.includes.flash_message')
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Teacher Name</th>
                                <th>Email</th>
                                <th>Contact</th>
                                <th>Address</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($teachers) > 0 )
                            @foreach($teachers as $teacher)
                            <tr>
                                <td>{{$teacher->name}}</td>
                                <td>{{$teacher->email}}</td>
                                <td>{{$teacher->contact}}</td>
                                <td>{{$teacher->address}}</td>
                                <td>
                                    <a href="{{route('admin.teacher.edit',$teacher->id)}}"><button class="btn btn-primary">
                                            <i class="fa fa-edit"></i>
                                        </button></a>
                                    <a href="{{route('admin.teacher.delete',$teacher->id)}}" onclick="return confirm('Are you sure?')"><button class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
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
                                <th>Teacher Name</th>
                                <th>Email</th>
                                <th>Contact</th>
                                <th>Address</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                {{$teachers->links()}}
            </div>
        </div>
    </div>
</section>
@endsection