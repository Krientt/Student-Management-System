@extends('frontend.master')
@section('title','All Notices')
@section('content')

<div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('images/bg_1.jpg')">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-lg-7">
                <h2 class="mb-0">Notices</h2>
            </div>
        </div>
    </div>
</div>


<div class="custom-breadcrumns border-bottom">
    <div class="container">
        <a href="{{route('frontend.home')}}">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Notices</span>
    </div>
</div>
<div class="news-updates">
    <div class="container">

        <div class="row">
            <div class="col-lg-9">
                <div class="section-heading">
                    <h2 class="text-black">Notices</h2>
                </div>
                <div class="row">
                    <div class="col-lg-15">
                        @foreach($notices as $notice)
                        <div class="post-entry-big horizontal d-flex mb-4">
                            <a href="{{route('frontend.single.notice',$notice->id)}}" class="img-link mr-4"><img src="/uploads/notices/{{$notice->image}}" alt="Image" class="img-fluid"></a>
                            <div class="post-content">
                                <div class="post-meta">
                                    <a href="#">{{$notice->created_at->format('F d')}}</a>
                                </div>
                                <h3 class="post-heading"><a href="{{route('frontend.single.notice',$notice->id)}}">{{$notice->title}}</a></h3>
                                <p>{!!\Illuminate\Support\Str::limit($notice->detail,150)!!}</p>
                            </div>
                        </div>
                        <div class="col-lg-15 border-bottom"></div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection