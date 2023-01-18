@extends('admin.master')
@section('title','Add Course Details')
@section('content')
<section class='content'>
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Add Course Details</h3>
          @include('admin.includes.flash_message')
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <form role="form" action="{{route('admin.blog.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="box-body">
              <div class="form-group">
                <label for="exampleForName">Course Name</label>
                <input type="text" class="form-control" name="title" id="exampleForName" placeholder="Enter Course Name" required>
              </div>
              <div class="form-group">
                <label for="courseduration">Course Duration</label>
                <input type="text" class="form-control" name="ctime" id="courseduration" placeholder="Enter Course Duration(eg: 45 hours)" required>
              </div>
              <div class="form-group">
                <label for="category">Branch Name</label>
                <select name="category_id" class="form-control" id="category">
                  <option value="" selected disabled>Select Branch</option>
                  @foreach($categories as $category)
                  <option value="{{$category->id}}">{{$category->name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="teacher">Course Teacher</label>
                <select name="teacher_id" class="form-control" id="teacher">
                  <option value="" selected disabled>Select Teacher</option>
                  @foreach($teachers as $teacher)
                  <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="ForImage">Image</label>
                <input type="file" class="form-control" name="image" id="ForImage">
              </div>
              <div class="form-group">
                <label for="exampleForDescription">Course Details</label>
                <textarea name="description" class="form-control" id="exampleForDescription" cols="30" rows="10"></textarea>
              </div>
              <div class="form-group">
                <label for="exampleForStatus">Status</label>
                <select name="status" class="form-control" id="exampleForStatus">
                  <option value="1">Active</option>
                  <option value="0">In-Active</option>
                </select>
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <a href="{{route('admin.dashboard')}}"><button class="btn btn-primary" type="button">Cancel</button></a>
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