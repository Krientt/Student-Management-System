@extends('admin.master')
@section('title','Edit Details')
@section('content')
<section class='content'>
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Edit Details</h3>
                    @include('admin.includes.flash_message')
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form role="form" action="{{route('admin.details.update',$detail)}}" method="post" enctype="multipart/form-data">
                        @method('patch')
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="Fortitle">Unique ID</label>
                                <input type="text" class="form-control" name="title" id="Fortitle" value="{{$detail->title}}" placeholder="Enter ID" required>
                            </div>
                            <div class="form-group">
                                <label for="Forquote">Principal Quote</label>
                                <textarea name="quote" class="form-control" id="Forquote" cols="30" rows="10">{{$detail->quote}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="Forhistory">Academic History</label>
                                <textarea name="history" class="form-control" id="Forhistory" cols="30" rows="10">{{$detail->history}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="Fordetail">About Us</label>
                                <textarea name="detail" class="form-control" id="Fordetail" cols="30" rows="10">{{$detail->detail}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="Foremail">Email</label>
                                <input type="email" name='email' class="form-control" id="Foremail" value="{{$detail->email}}" placeholder="Email" required>
                            </div>
                            <div class="item form-group">
                                <label for="Forcontact">Contact</label>
                                <input type="text" name="contact" class="form-control" id="Forcontact" value="{{$detail->contact}}" placeholder="Contact">
                            </div>
                            <div class="form-group">
                                <label for="ForImage">Logo</label>
                                <input type="file" class="form-control" name="image" id="ForImage">
                            </div>
                            <div class="form-group">
                                <label for="exampleForStatus">Status</label>
                                <select name="status" class="form-control" id="exampleForStatus">
                                    <option value="1" {{($detail->status == 1)?'selected':''}}>Active</option>
                                    <option value="0" {{($detail->status == 0)?'selected':''}}>In-Active</option>
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
<!-- @push('scripts')
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('exampleForDescription');
</script>
@endpush -->