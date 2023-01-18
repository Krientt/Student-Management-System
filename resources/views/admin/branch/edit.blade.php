@extends('admin.master')
@section('title','Branch Edit')
@section('content')
<section class='content'>
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Edit Branch</h3>
          @include('admin.includes.flash_message')
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <form role="form" action="{{route('admin.category.update',$category->id)}}" method="post">
            @method('PATCH')
            @csrf
            <div class="box-body">
              <div class="form-group">
                <label for="exampleForName">Branch Short Name</label>
                <input type="text" class="form-control" name="shortname" id="exampleForName" placeholder="Enter Branch Short Name" value="{{$category->shortname}}">
              </div>
              <div class="form-group">
                <label for="exampleForName">Branch Name</label>
                <input type="text" class="form-control" name="name" id="exampleForName" placeholder="Enter Branch Name" value="{{$category->name}}">
              </div>
              <div class="form-group">
                <label for="exampleForStatus">Status</label>
                <select name="status" class="form-control" id="exampleForStatus" value="{{$category->status}}">
                  <option value="1" {{($category->status==1)?'selected':''}}>Active</option>
                  <option value="0" {{($category->status==0)?'selected':''}}>In-Active</option>
                </select>
              </div>
              <div class="form-group">
                <label for="exampleForStatus">Show In Menu</label>
                <select name="show_in_menu" class="form-control" id="exampleForStatus" value="{{$category->show_in_menu}}">
                  <option value="1" {{($category->show_in_menu==1)?'selected':''}}>Yes</option>
                  <option value="0" {{($category->show_in_menu==0)?'selected':''}}>No</option>
                </select>
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