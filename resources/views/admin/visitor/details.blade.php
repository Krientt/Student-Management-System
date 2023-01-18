@extends('admin.master')
@section('title','Student Details')
@section('content')
<section class='content'>
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Student Details</h3>
          @include('admin.includes.flash_message')
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Student Name</th>
                <th>Parents Name</th>
                <th>Class</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @if(count($visitors) > 0 )
              @foreach($visitors as $visitor)
              <tr>
                <td>{{$visitor->name}}</td>
                <td>{{$visitor->Parents_Name}}</td>
                <td>{{$visitor->Class}}</td>
                <td>{{$visitor->email}}</td>
                <td>{{$visitor->Phone_Number}}</td>
                <td>
                  <a href="{{route('admin.student.edit',$visitor->id)}}"><button class="btn btn-primary">
                      <i class="fa fa-edit"></i>
                    </button></a>
                  <a href="{{route('admin.student.delete',$visitor->id)}}" onclick="return confirm('Are you sure?')"><button class="btn btn-danger">
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
                <th>Student Name</th>
                <th>Parents Name</th>
                <th>Class</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Action</th>
              </tr>
            </tfoot>
          </table>
        </div>
        {{$visitors->links()}}
      </div>
    </div>
  </div>
</section>
@endsection