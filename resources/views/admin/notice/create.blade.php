@extends('admin.master')
@section('title','Add Notice Details')
@section('content')
<section class='content'>
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Add Notice Details</h3>
                    @include('admin.includes.flash_message')
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form role="form" action="{{route('admin.notices.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="Fortitle">Title</label>
                                <input type="text" class="form-control" name="title" id="Fortitle" placeholder="Enter Title" required>
                            </div>
                            <div class="form-group">
                                <label for="Fordetail">Description</label>
                                <textarea name="detail" class="form-control" id="Fordetail" cols="30" rows="10"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="ForImage">Image</label>
                                <input type="file" class="form-control" name="image" id="ForImage">
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