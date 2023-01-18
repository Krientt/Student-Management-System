@extends('frontend.master')
@section('title','All Courses')
@section('content')

<div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('images/bg_1.jpg')">
  <div class="container">
    <div class="row align-items-end">
      <div class="col-lg-7">
        <h2 class="mb-0">Courses</h2>
      </div>
    </div>
  </div>
</div>


<div class="custom-breadcrumns border-bottom">
  <div class="container">
    <a href="{{route('frontend.home')}}">Home</a>
    <span class="mx-3 icon-keyboard_arrow_right"></span>
    <span class="current">Courses</span>
  </div>
</div>
@foreach($categories as $category)
<div class="site-section">
  <div class="container">
    <div class="section-title">
      <h2><a href="{{route('frontend.category',$category->slug)}}">{{$category->name}}</a></h2>
    </div>
    <div class="row">
      @foreach($blogs as $blog)
      @if($blog->category_id == $category->id)
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="course-1-item">
          <figure class="thumnail">
            <a href="{{route('frontend.single.blog',$blog->slug)}}"><img src="/uploads/blogs/{{$blog->image}}" alt="Image" class="img-fluid"></a>
            <div class="price"><a href="{{route('frontend.category',$blog->category->slug)}}">{{$category->shortname}}</a></div>
            <div class="category">
              <a href="{{route('frontend.single.blog',$blog->slug)}}">
                <h3>{{$blog->title}}</h3>
              </a>
            </div>
          </figure>
          <div class="course-1-content pb-4">
            <div class="rating text-center mb-3">
            </div>
            <p class="desc mb-4">{!!\Illuminate\Support\Str::limit($blog->description,100)!!}</p>
            <p><a href="{{route('frontend.single.blog',$blog->slug)}}" class="btn btn-primary rounded-0 px-4">More Info</a></p>
          </div>
        </div>
      </div>
      @endif
      @endforeach
    </div>
  </div>
</div>
@endforeach
@endsection