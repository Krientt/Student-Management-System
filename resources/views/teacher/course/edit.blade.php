@extends('teacher.master')
@section('title','Edit Course Details')
@section('content')
<section class='content'>
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Edit Course Details</h3>
          @include('admin.includes.flash_message')
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <form role="form" action="{{route('teacher.course.update',$blog)}}" method="post" enctype="multipart/form-data">
            @method('patch')
            @csrf
            <div class="box-body">
              <div class="form-group">
                <label for="exampleForName">Course Name</label>
                <input type="text" class="form-control" name="title" id="exampleForName" placeholder="Enter Course Name" value="{{$blog->title}}" required>
              </div>
              <div class="form-group">
                <label for="exampleForName">Course Duration</label>
                <input type="text" class="form-control" name="ctime" id="exampleForName" placeholder="Enter Course Duration(eg: 45 hours)" value="{{$blog->ctime}}" required>
              </div>
              <div class="form-group">
                <label for="ForImage">Image</label>
                <input type="file" class="form-control" name="image" id="ForImage">
              </div>
              <div class="form-group">
                <label for="exampleForName">Course Details</label>
                <textarea name="description" class="form-control" id="exampleForDescription" cols="30" rows="10">{{$blog->description}}</textarea>
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
@push('scripts')
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
  CKEDITOR.replace('exampleForDescription');
</script>
@endpush