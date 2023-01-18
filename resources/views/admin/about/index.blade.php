@extends('admin.master')
@section('title','Institute Details')
@section('content')
<section class='content'>
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Institute Details</h3>
                    @include('admin.includes.flash_message')
                    <div id="msg"></div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>S.N.</th>
                                <th>ID</th>
                                <th>Principal Quote</th>
                                <th>Academic History</th>
                                <th>About Us</th>
                                <th>Email</th>
                                <th>Contact</th>
                                <th>Logo</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($details) > 0 )
                            @foreach($details as $key=>$detail)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$detail->title}}</td>
                                <td>{{\Illuminate\Support\Str::limit($detail->quote,60)}}</td>
                                <td>{{\Illuminate\Support\Str::limit($detail->history,60)}}</td>
                                <td>{{\Illuminate\Support\Str::limit($detail->detail,60)}}</td>
                                <td>{{\Illuminate\Support\Str::limit($detail->email,60)}}</td>
                                <td>{{\Illuminate\Support\Str::limit($detail->contact,60)}}</td>
                                <td><img src="/uploads/details/{{$detail->image}}" alt="{{$detail->image}}" width="100" height="80"></td>
                                <td>@if($detail->status == 1)
                                    Active
                                    @else
                                    In-Active
                                    @endif

                                </td>
                                <td>
                                    <a href="{{route('admin.details.edit',$detail)}}"><i class="fa fa-edit" title="Edit"></i></a>
                                    <a href="{{route('admin.details.delete',$detail)}}" onclick="return confirm('Are You Sure You Want To Delete?');"><i class="fa fa-trash text-danger" title="delete"></i></a>
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
                                <th>ID</th>
                                <th>Principal Quote</th>
                                <th>Academic History</th>
                                <th>About Us</th>
                                <th>Email</th>
                                <th>Contact</th>
                                <th>Logo</th>
                                <th>Status</th>
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