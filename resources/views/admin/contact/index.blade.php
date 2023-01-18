@extends('admin.master')
@section('title','Suggestions and Enquiries')
@section('content')
<section class='content'>
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Suggestions and Enquiries</h3>
                    @include('admin.includes.flash_message')
                    <div id="msg"></div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>S.N.</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Message</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($suggestions) > 0 )
                            @foreach($suggestions as $key=>$suggestion)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$suggestion->fname}}</td>
                                <td>{{$suggestion->lname}}</td>
                                <td>{{$suggestion->email}}</td>
                                <td>{{$suggestion->phone}}</td>
                                <td>{{$suggestion->message}}</td>
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
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Message</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection