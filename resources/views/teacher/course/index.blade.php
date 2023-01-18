@extends('teacher.master')
@section('title','Course Details')
@section('content')
<section class='content'>
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Course Details</h3>
          @include('admin.includes.flash_message')
          <div id="msg"></div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>S.N.</th>
                <th>Course Name</th>
                <th>Course Duration</th>
                <th>Course Teacher</th>
                <th>Branch Name</th>
                <th>Image</th>
                <th>Course Details</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @if(count($blogs) > 0 )
              @foreach($blogs as $key=>$blog)
              <tr>
                <td>{{++$key}}</td>
                <td>{{$blog->title}}</td>
                <td>{{$blog->ctime}}</td>
                <td>{{$blog->teacher->name}}</td>
                <td>{{$blog->category->name}}</td>
                <td><img src="/uploads/blogs/{{$blog->image}}" alt="{{$blog->image}}" width="100" height="80"></td>
                <td>{{\Illuminate\Support\Str::limit($blog->description,60)}}</td>
                <td>
                  <a href="{{route('teacher.course.edit',$blog)}}"><i class="fa fa-edit" title="Edit"></i></a>
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
                <th>Course Name</th>
                <th>Course Duration</th>
                <th>Course Teacher</th>
                <th>Branch Name</th>
                <th>Image</th>
                <th>Course Details</th>
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