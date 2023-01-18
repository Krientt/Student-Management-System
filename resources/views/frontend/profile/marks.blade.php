@extends('frontend.master')
@section('title','Edit Profile')
@section('content')
@if(Auth::guard('visitor')->check())
<div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('images/bg_1.jpg')">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-lg-7">
                <h2 class="mb-0">Edit Profile</h2>
            </div>
        </div>
    </div>
</div>


<div class="custom-breadcrumns border-bottom">
    <div class="container">
        <a href="{{route('frontend.home')}}">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <a href="{{route('frontend.profile.view')}}">Profile</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Edit Profile</span>
    </div>
</div>
@include('admin.includes.flash_message')

<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4 mb-4">
                <div class="course-1-item">
                    <figure class="thumnail">
                        <div class="category">
                            <h3>About Me</h3>
                        </div>
                    </figure>
                    <div class="course-1-content pb-4">
                        <hr>
                        <strong><i class="fa fa-pencil margin-r-5"></i>Name:</strong>
                        <p>
                            {{$visitor->name}}
                        </p>
                        <hr>
                        <strong><i class="fa fa-pencil margin-r-5"></i> Parents_Name:</strong>
                        <p>
                            {{$visitor->Parents_Name}}
                        </p>
                        <hr>
                        <strong><i class="fa fa-map-marker margin-r-5"></i> Email:</strong>
                        <p>
                            {{$visitor->email}}
                        </p>
                        <hr>
                        <strong><i class="fa fa-pencil margin-r-5"></i> Phone_Number:</strong>
                        <p>
                            {{$visitor->Phone_Number}}
                        </p>
                        <hr>
                        <strong><i class="fa fa-pencil margin-r-5"></i>Class:</strong>
                        <p>
                            {{$visitor->Class}}
                        </p>
                        <hr>
                        <strong><i class="fa fa-file-text-o margin-r-5"></i> Member_Since:</strong>
                        <p>{{$visitor->created_at->diffForHumans()}}</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-lg-9 mb-4">
                <div class="course-1-item">
                    <figure class="thumnail">
                        <div class="category">
                            <h3>Edit Profile</h3>
                        </div>
                    </figure>
                    <div class="pb-4">
                        <div class="col-lg-12 box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center" rowspan="2">S.N.</th>
                                        <th class="text-center" rowspan="2">Terminal</th>
                                        <th class="text-center">Subject 1</th>
                                        <th class="text-center">Subject 2</th>
                                        <th class="text-center">Subject 3</th>
                                        <th class="text-center">Subject 4</th>
                                        <th class="text-center">Subject 5</th>
                                        <th class="text-center" rowspan="2">Remarks</th>
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
                                        <td class="text-center" rowspan="2">{{$mark->terminal}}</td>
                                        <td class="text-center">{{$mark->blog1->title}}</td>
                                        <td class="text-center">{{$mark->blog2->title}}</td>
                                        <td class="text-center">{{$mark->blog3->title}}</td>
                                        <td class="text-center">{{$mark->blog4->title}}</td>
                                        <td class="text-center">{{$mark->blog5->title}}</td>
                                        <td class="text-center" rowspan="2">{{$mark->remarks}}</td>
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
                                        <th class="text-center" rowspan="2">Terminal</th>
                                        <th class="text-center">Subject 1</th>
                                        <th class="text-center">Subject 2</th>
                                        <th class="text-center">Subject 3</th>
                                        <th class="text-center">Subject 4</th>
                                        <th class="text-center">Subject 5</th>
                                        <th class="text-center" rowspan="2">Remarks</th>
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

        </div>
    </div>
</div>
@endif
@endsection