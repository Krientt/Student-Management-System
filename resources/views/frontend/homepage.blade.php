@extends('frontend.master')
@section('title','Home')
@section('content')
<div class="hero-slide owl-carousel site-blocks-cover">
  @foreach($sliders as $slider)
  <div class="intro-section" style="background-image: url('/uploads/blogs/{{$slider->image}}');">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-12 mx-auto text-center" data-aos="fade-up">
          <h1><a href="{{route('frontend.single.blog',$slider->slug)}}">{{$slider->title}}</a></h1>
        </div>
      </div>
    </div>
  </div>
  @endforeach
</div>

<div></div>

<!-- Functions -->
<div class="site-section">
  <div class="container">
    <div class="row mb-5 justify-content-center text-center">
      <div class="col-lg-4 mb-5">
        <h2 class="section-title-underline mb-5">
          <span>Why Study Here</span>
        </h2>
      </div>
    </div>
    <div class="row">
      @foreach($features as $feature)
      <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
        <div class="feature-1 border">
          <div class="icon-wrapper bg-primary">
            <span class="flaticon-mortarboard text-white"></span>
          </div>
          <div class="feature-1-content">
            <h2>{{$feature->title}}</h2>
            <p>{!!\Illuminate\Support\Str::limit($feature->detail,200)!!}</p>
            <p><a href="{{route('frontend.about.school')}}" class="btn btn-primary px-4 rounded-0">Learn More</a></p>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>

<!-- About -->
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

<!-- Popular course -->
<div class="site-section">
  <div class="container">


    <div class="row mb-5 justify-content-center text-center">
      <div class="col-lg-6 mb-5">
        <h2 class="section-title-underline mb-3">
          <span>Our Most Enrolled Courses</span>
        </h2>
      </div>
    </div>

    <div class="row">
      <div class="col-12">
        <div class="owl-slide-3 owl-carousel">
          @foreach($populars as $popular)
          <div class="course-1-item">
            <figure class="thumnail">
              <a href="{{route('frontend.single.blog',$popular->slug)}}"><img src="/uploads/blogs/{{$popular->image}}" alt="Image" class="img-fluid"></a>
              <div class="category">
                <a href="{{route('frontend.single.blog',$popular->slug)}}">
                  <h3>{{$popular->title}}</h3>
                </a>
              </div>
            </figure>
            <div class="course-1-content pb-4">
              <div class="rating text-center mb-3">
              </div>
              <p class="mb-3">{!!\Illuminate\Support\Str::limit($popular->description,100)!!}</p>
              <p><a href="{{route('frontend.single.blog',$popular->slug)}}" class="btn btn-primary rounded-0 px-4">More Info</a></p>
            </div>
          </div>
          @endforeach
        </div>

      </div>
    </div>



  </div>
</div>

<!-- Comments -->
<!-- <div class="site-section">
  <div class="container">
    <div class="row mb-5">
      <div class="col-lg-4">
        <h2 class="section-title-underline">
          <span>Testimonials</span>
        </h2>
      </div>
    </div>


    <div class="owl-slide owl-carousel">

      <div class="ftco-testimonial-1">
        <div class="ftco-testimonial-vcard d-flex align-items-center mb-4">
          <img src="images/person_1.jpg" alt="Image" class="img-fluid mr-3">
          <div>
            <h3>Allison Holmes</h3>
            <span>Designer</span>
          </div>
        </div>
        <div>
          <p>&ldquo;Lorem ipsum dolor sit, amet consectetur adipisicing elit. Neque, mollitia. Possimus mollitia nobis libero quidem aut tempore dolore iure maiores, perferendis, provident numquam illum nisi amet necessitatibus. A, provident aperiam!&rdquo;</p>
        </div>
      </div>

      <div class="ftco-testimonial-1">
        <div class="ftco-testimonial-vcard d-flex align-items-center mb-4">
          <img src="images/person_2.jpg" alt="Image" class="img-fluid mr-3">
          <div>
            <h3>Allison Holmes</h3>
            <span>Designer</span>
          </div>
        </div>
        <div>
          <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Neque, mollitia. Possimus mollitia nobis libero quidem aut tempore dolore iure maiores, perferendis, provident numquam illum nisi amet necessitatibus. A, provident aperiam!</p>
        </div>
      </div>

      <div class="ftco-testimonial-1">
        <div class="ftco-testimonial-vcard d-flex align-items-center mb-4">
          <img src="images/person_4.jpg" alt="Image" class="img-fluid mr-3">
          <div>
            <h3>Allison Holmes</h3>
            <span>Designer</span>
          </div>
        </div>
        <div>
          <p>&ldquo;Lorem ipsum dolor sit, amet consectetur adipisicing elit. Neque, mollitia. Possimus mollitia nobis libero quidem aut tempore dolore iure maiores, perferendis, provident numquam illum nisi amet necessitatibus. A, provident aperiam!&rdquo;</p>
        </div>
      </div>

      <div class="ftco-testimonial-1">
        <div class="ftco-testimonial-vcard d-flex align-items-center mb-4">
          <img src="images/person_3.jpg" alt="Image" class="img-fluid mr-3">
          <div>
            <h3>Allison Holmes</h3>
            <span>Designer</span>
          </div>
        </div>
        <div>
          <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Neque, mollitia. Possimus mollitia nobis libero quidem aut tempore dolore iure maiores, perferendis, provident numquam illum nisi amet necessitatibus. A, provident aperiam!</p>
        </div>
      </div>

      <div class="ftco-testimonial-1">
        <div class="ftco-testimonial-vcard d-flex align-items-center mb-4">
          <img src="images/person_2.jpg" alt="Image" class="img-fluid mr-3">
          <div>
            <h3>Allison Holmes</h3>
            <span>Designer</span>
          </div>
        </div>
        <div>
          <p>&ldquo;Lorem ipsum dolor sit, amet consectetur adipisicing elit. Neque, mollitia. Possimus mollitia nobis libero quidem aut tempore dolore iure maiores, perferendis, provident numquam illum nisi amet necessitatibus. A, provident aperiam!&rdquo;</p>
        </div>
      </div>

      <div class="ftco-testimonial-1">
        <div class="ftco-testimonial-vcard d-flex align-items-center mb-4">
          <img src="images/person_4.jpg" alt="Image" class="img-fluid mr-3">
          <div>
            <h3>Allison Holmes</h3>
            <span>Designer</span>
          </div>
        </div>
        <div>
          <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Neque, mollitia. Possimus mollitia nobis libero quidem aut tempore dolore iure maiores, perferendis, provident numquam illum nisi amet necessitatibus. A, provident aperiam!</p>
        </div>
      </div>

    </div>

  </div>
</div> -->

<!-- Specialities -->
<!-- <div class="section-bg style-1" style="background-image: url('images/hero_1.jpg');">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-md-6 mb-5 mb-lg-0">
        <span class="icon flaticon-mortarboard"></span>
        <h3>Our Philosphy</h3>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reiciendis recusandae, iure repellat quis delectus ea? Dolore, amet reprehenderit.</p>
      </div>
      <div class="col-lg-4 col-md-6 mb-5 mb-lg-0">
        <span class="icon flaticon-school-material"></span>
        <h3>Academics Principle</h3>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reiciendis recusandae, iure repellat quis delectus ea?
          Dolore, amet reprehenderit.</p>
      </div>
      <div class="col-lg-4 col-md-6 mb-5 mb-lg-0">
        <span class="icon flaticon-library"></span>
        <h3>Key of Success</h3>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reiciendis recusandae, iure repellat quis delectus ea?
          Dolore, amet reprehenderit.</p>
      </div>
    </div>
  </div>
</div> -->

<!-- News and Updates -->
<div class="news-updates">
  <div class="container">

    <div class="row">
      <div class="col-lg-12">
        <div class="section-heading">
          <h2 class="text-black">Notices</h2>
          <a href="{{route('frontend.notices')}}">Read All Notices</a>
        </div>
        <div class="row">
          @foreach($latests as $latest)
          <div class="col-lg-6">
            <div class="post-entry-big">
              <a href="{{route('frontend.single.notice',$latest->id)}}" class="img-link"><img src="/uploads/notices/{{$latest->image}}" alt="Image" class="img-fluid"></a>
              <div class="post-content">
                <div class="post-meta">
                  <a href="#">{{$latest->created_at->format('F d')}}</a>
                  <!-- <span class="mx-1">/</span> -->
                  <!-- <a href="#">Admission</a>, <a href="#">Updates</a> -->
                </div>
                <h3 class="post-heading"><a href="{{route('frontend.single.notice',$latest->id)}}">{{$latest->title}}</a></h3>
                <p>{!!\Illuminate\Support\Str::limit($latest->detail,50)!!}</p>
              </div>
            </div>
          </div>
          @endforeach
          <div class="col-lg-6">
            @foreach($recents as $recent)
            <div class="post-entry-big horizontal d-flex mb-4">
              <a href="{{route('frontend.single.notice',$recent->id)}}" class="img-link mr-4"><img src="/uploads/notices/{{$recent->image}}" alt="Image" class="img-fluid"></a>
              <div class="post-content">
                <div class="post-meta">
                  <p>{{$recent->created_at->format('F d')}}</p>
                  <!-- <a href="#">Admission</a>, <a href="#">Updates</a> -->
                </div>
                <h3 class="post-heading"><a href="{{route('frontend.single.notice',$recent->id)}}">{{$recent->title}}</a></h3>
                <p>{!!\Illuminate\Support\Str::limit($recent->detail,50)!!}</p>
              </div>
            </div>
            <div class="col-lg-12 border-bottom"></div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection