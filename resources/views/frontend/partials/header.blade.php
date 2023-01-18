<?php


$categories = App\Models\admin\Category::where('show_in_menu', 1)->get();
$details = App\Models\admin\Detail::where('status', 1)->get();

?>


<div class="py-2 bg-light">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-9 d-none d-lg-block">
        @foreach($details as $detail)
        <a class="small mr-3"><span class="icon-phone2 mr-2"></span> {{$detail->contact}}</a>
        <a class="small mr-3"><span class="icon-envelope-o mr-2"></span> {{$detail->email}}</a>
        @endforeach
      </div>
      <div class="col-lg-3 text-right">
        @if(Auth::guard('visitor')->check())
        <a href="{{route('frontend.profile.view')}}" class="small btn btn-primary px-4 py-2 rounded-0"><span class="icon-user"></span> Profile</a>
        <a href="{{route('frontend.logout')}}" class="small btn btn-primary px-4 py-2 rounded-0"><span class="icon-unlock-alt"></span> Log Out</a>
        @else
        <button class="small btn btn-primary mr-3" data-toggle="modal" data-target="#loginModal"><span class="icon-unlock-alt"></span> Log In</button>
        <a href="{{route('frontend.register.view')}}" class="small btn btn-primary px-4 py-2 rounded-0"><span class="icon-users"></span> Register</a>
        @endif
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Sign In To Continue</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @include('admin.includes.flash_message')
        <form action="{{route('frontend.modal.login')}}" name="login-modal" method="post">
          @csrf
          <input type="email" class="form-control" name="email" placeholder="Email" id="email" value="" />
          <input type="password" class="form-control" name="password" placeholder="Password" id="password" value="" />
      </div>
      <a href="{{route('visitor.resend.code')}}">
        <p>Email Not Verified? Resend Code</p>
      </a><br>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Log In</button>
      </div>
      </form>
    </div>
  </div>
</div>
<header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">

  <div class="container">
    <div class="d-flex align-items-center">
      <div class="site-logo">
        <a href="{{route('frontend.home')}}" class="d-block">
          @foreach($details as $detail)
          <img src="/uploads/details/{{$detail->image}}" alt="Image" class="img-fluid" width="100" height="80">
          @endforeach
        </a>
      </div>
      <div class="mr-auto">
        <nav class="site-navigation position-relative text-right" role="navigation">
          <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
            <li>
              <a href="{{route('frontend.home')}}" class="nav-link text-left">Home</a>
            </li>
            <li class="has-children">
              <a href="{{route('frontend.about.school')}}" class="nav-link text-left">About Us</a>
              <ul class="dropdown">
                <li><a href="{{route('frontend.about.school')}}">Our Institute</a></li>
                <li><a href="{{route('frontend.about.teacher')}}">Our Teachers</a></li>
              </ul>
            </li>
            <li>
              <a href="{{route('frontend.categories')}}" class="nav-link text-left">Courses</a>
            </li>
            <li>
              <a href="{{route('frontend.notices')}}" class="nav-link text-left">Notices</a>
            </li>
            <li>
              <a href="{{route('frontend.contact')}}" class="nav-link text-left">Contact</a>
            </li>
          </ul>
          </ul>
        </nav>

      </div>
      <div class="d-flex">
        <form action="{{route('frontend.blog.search')}}" name="blog-search" method="post">
          @csrf
          <input type="text" class="form-control" name="search" placeholder="Search Course... " value="">
          <!-- <button type="submit" class="btn btn-secondary" ><span class="icon-search"></span></button> -->
        </form>
      </div>
      <!-- <div class="ml-auto">
        <div class="social-wrap">
          <a href="#"><span class="icon-facebook"></span></a>
          <a href="#"><span class="icon-twitter"></span></a>
          <a href="#"><span class="icon-linkedin"></span></a>

          <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a>
        </div>
      </div> -->

    </div>
  </div>

</header>