@extends('admin.master')
@section('title','Features Details')
@section('content')
<section class='content'>
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Features Details</h3>
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
                                <th>Show in HomePage</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($features) > 0 )
                            @foreach($features as $key=>$feature)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$feature->title}}</td>
                                <td>{{\Illuminate\Support\Str::limit($feature->detail,60)}}</td>
                                <td><img src="/uploads/features/{{$feature->image}}" alt="{{$feature->image}}" width="100" height="80"></td>
                                <td>@if($feature->show_in_home == 1)
                                    Yes
                                    @else
                                    No
                                    @endif

                                </td>
                                <td>
                                    <a href="{{route('admin.features.edit',$feature)}}"><i class="fa fa-edit" title="Edit"></i></a>
                                    <a href="{{route('admin.features.delete',$feature)}}" onclick="return confirm('Are You Sure You Want To Delete?');"><i class="fa fa-trash text-danger" title="delete"></i></a>
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
                                <th>Show in HomePage</th>
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