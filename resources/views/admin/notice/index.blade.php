@extends('admin.master')
@section('title','Notice Details')
@section('content')
<section class='content'>
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Notice Details</h3>
                    @include('admin.includes.flash_message')
                    <div id="msg"></div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>S.N.</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($notices) > 0 )
                            @foreach($notices as $key=>$notice)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$notice->title}}</td>
                                <td>{{\Illuminate\Support\Str::limit($notice->detail,100)}}</td>
                                <td><img src="/uploads/notices/{{$notice->image}}" alt="{{$notice->image}}" width="100" height="80"></td>
                                <td>
                                    <a href="{{route('admin.notices.edit',$notice)}}"><i class="fa fa-edit" title="Edit"></i></a>
                                    <a href="{{route('admin.notices.delete',$notice)}}" onclick="return confirm('Are You Sure You Want To Delete?');"><i class="fa fa-trash text-danger" title="delete"></i></a>
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
                                <th>Title</th>
                                <th>Description</th>
                                <th>Image</th>
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