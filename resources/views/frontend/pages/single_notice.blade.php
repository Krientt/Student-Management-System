@extends('frontend.master')
@section('title','Notice Details')
@section('content')
<div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('images/bg_1.jpg')">
  <div class="container">
    <div class="row align-items-end">
      <div class="col-lg-7">
        <h2 class="mb-0">{{$notice->title}}</h2>
      </div>
    </div>
  </div>
</div>


<div class="custom-breadcrumns border-bottom">
  <div class="container">
    <a href="{{route('frontend.home')}}">Home</a>
    <span class="mx-3 icon-keyboard_arrow_right"></span>
    <a href="{{route('frontend.categories')}}">Notices</a>
    <span class="mx-3 icon-keyboard_arrow_right"></span>
    <span class="current">Notice</span>
  </div>
</div>
@include('admin.includes.flash_message')
<div class="site-section">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-9 mb-4">
        <p class="mb-5">
          <img src="/uploads/notices/{{$notice->image}}" alt="Image" class="img-fluid">
        </p>
        <div class="post-meta">
          <a href="#">{{$notice->created_at->format('F d')}}</a>
        </div>
        <p>{{$notice->detail}}</p>
      </div>

    </div>
  </div>
</div>
@endsection