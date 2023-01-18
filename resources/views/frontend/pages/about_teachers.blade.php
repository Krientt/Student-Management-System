@extends('frontend.master')
@section('title','Teachers')
@section('content')
<div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('images/bg_1.jpg')">
  <div class="container">
    <div class="row align-items-end">
      <div class="col-lg-7">
        <h2 class="mb-0">Our Teachers</h2>
      </div>
    </div>
  </div>
</div>
<div class="custom-breadcrumns border-bottom">
  <div class="container">
    <a href="{{route('frontend.home')}}">Home</a>
    <span class="mx-3 icon-keyboard_arrow_right"></span>
    <span class="current">Our Teacher</span>
  </div>
</div>

<div class="container pt-5 mb-5">
  <div class="row">
    <div class="col-lg-4">
      <h2 class="section-title-underline">
        <span>Our Principal</span>
      </h2>
    </div>
    <div class="col-lg-7">
      @foreach($details as $detail)
      <p>{{$detail->quote}}</p>
      @endforeach
    </div>
  </div>
</div>

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
        <p class="lead">{!!\Illuminate\Support\Str::limit($detail->detail,600)!!}</p>
        <p><a href="{{route('frontend.about.school')}}">Read more</a></p>
      </div>
      @endforeach
    </div>
  </div>
</div>

<div class="site-section">
  <div class="container">
    <div class="row mb-5 justify-content-center text-center">
      <div class="col-lg-4 mb-5">
        <h2 class="section-title-underline mb-5">
          <span>Our Teachers</span>
        </h2>
      </div>
    </div>
    <div class="row">
      @foreach($teachers as $teacher)
      <div class="col-lg-4 col-md-6 mb-5 mb-lg-5">
        <div class="feature-1 border person text-center">
          <img src="/uploads/teacher_profile/{{$teacher->image}}" alt="Image" class="img-fluid">
          <div class="feature-1-content">
            <h2>{{$teacher->name}}</h2>
            <p>{{$teacher->bio}}</p>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
@endsection