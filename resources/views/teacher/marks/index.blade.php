@extends('teacher.master')
@section('title','Marks Details')
@section('content')
<section class='content'>
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Marks Details</h3>
                    @include('admin.includes.flash_message')
                    <div id="msg"></div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center" rowspan="2">S.N.</th>
                                <th class="text-center" rowspan="2">Student Name</th>
                                <th class="text-center" rowspan="2">Terminal</th>
                                <th class="text-center">Subject 1</th>
                                <th class="text-center">Subject 2</th>
                                <th class="text-center">Subject 3</th>
                                <th class="text-center">Subject 4</th>
                                <th class="text-center">Subject 5</th>
                                <th class="text-center" rowspan="2">Remarks</th>
                                <th class="text-center" rowspan="2">Action</th>
                            </tr>
                            <tr>
                                <th class="text-center">Marks 2</th>
                                <th class="text-center">Marks 3</th>
                                <th class="text-center">Marks 4</th>
                                <th class="text-center">Marks 1</th>
                                <th class="text-center">Marks 5</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($marks) > 0 )
                            @foreach($marks as $key=>$mark)
                            <tr>
                                <td class="text-center" rowspan="2">{{++$key}}</td>
                                <td class="text-center" rowspan="2">{{$mark->visitor->name}}</td>
                                <td class="text-center" rowspan="2">{{$mark->terminal}}</td>
                                <td class="text-center">{{$mark->blog1->title}}</td>
                                <td class="text-center">{{$mark->blog2->title}}</td>
                                <td class="text-center">{{$mark->blog3->title}}</td>
                                <td class="text-center">{{$mark->blog4->title}}</td>
                                <td class="text-center">{{$mark->blog5->title}}</td>
                                <td class="text-center" rowspan="2">{{$mark->remarks}}</td>
                                <td class="text-center" rowspan="2">
                                    <a href="{{route('student.marks.edit',$mark->id)}}"><button class="btn btn-primary">
                                            <i class="fa fa-edit"></i>
                                        </button></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">{{$mark->marks1}}</td>
                                <td class="text-center">{{$mark->marks2}}</td>
                                <td class="text-center">{{$mark->marks3}}</td>
                                <td class="text-center">{{$mark->marks4}}</td>
                                <td class="text-center">{{$mark->marks5}}</td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="9" class="text-center">No Records Found..</td>
                            </tr>
                            @endif
                        </tbody>
                        <tfoot>
                            <tr>
                                <th class="text-center" rowspan="2">S.N.</th>
                                <th class="text-center" rowspan="2">Student Name</th>
                                <th class="text-center" rowspan="2">Terminal</th>
                                <th class="text-center">Subject 1</th>
                                <th class="text-center">Subject 2</th>
                                <th class="text-center">Subject 3</th>
                                <th class="text-center">Subject 4</th>
                                <th class="text-center">Subject 5</th>
                                <th class="text-center" rowspan="2">Remarks</th>
                                <th class="text-center" rowspan="2">Action</th>
                            </tr>
                            <tr>
                                <th class="text-center">Marks 1</th>
                                <th class="text-center">Marks 2</th>
                                <th class="text-center">Marks 3</th>
                                <th class="text-center">Marks 4</th>
                                <th class="text-center">Marks 5</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection