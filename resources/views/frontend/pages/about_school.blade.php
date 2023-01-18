@extends('frontend.master')
@section('title','Organization')
@section('content')
<div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('images/bg_1.jpg')">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-lg-7">
                <h2 class="mb-0">Our Institute</h2>
            </div>
        </div>
    </div>
</div>
<div class="custom-breadcrumns border-bottom">
    <div class="container">
        <a href="{{route('frontend.home')}}">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Our Institute</span>
    </div>
</div>
@foreach($details as $detail)
<div class="container pt-5 mb-5">
    <div class="row">
        <div class="col-lg-4">
            <h2 class="section-title-underline">
                <span>Academics History</span>
            </h2>
        </div>
        <div class="col-lg-7">
            <p>{{$detail->history}}</p>
        </div>
    </div>
</div> -->
@endforeach

<div class="section-bg style-1" style="background-image: url('images/about_1.jpg');">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <h2 class="section-title-underline style-2">
                    <span>About Our Institute</span>
                </h2>
            </div>
            @foreach($details as $detail)
            <div class="col-lg-8">
                <p class="lead">{{$detail->detail}}</p>
                <!-- <p><a href="{{route('frontend.about.school')}}">Read more</a></p> -->
            </div>
            @endforeach
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <h2 class="section-title-underline mb-5">
            <span>Why Study Here</span>
        </h2>
        <div class="row mb-5">
            @foreach($features as $feature)
            <div class="col-lg-6 mb-lg-0 mb-4">
                <img src="/uploads/features/{{$feature->image}}" alt="{{$feature->image}}" class="img-fluid">
            </div>
            <div class="col-lg-5 ml-auto align-self-center">
                <h2 class="section-title-underline mb-5">
                    <span>{{$feature->title}}</span>
                </h2>
                <p>{!!$feature->detail!!}</p>
            </div>
            <div class="col-lg-12 border-bottom"></div>
            @endforeach
        </div>
    </div>
</div>

@endsection