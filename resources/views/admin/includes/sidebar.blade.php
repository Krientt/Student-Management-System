<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="/uploads/admin_profile/{{Auth::user()->image}}" class="img-circle" alt="User Image">
      </div>
      <a href="{{route('admin.profile')}}">
        <div class="pull-left info">
          <p><b>{{Auth::user()->name}}</b></p>
        </div>
      </a>

    </div>
    <!-- search form -->
    <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <!-- <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
            <li><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
          </ul>
        </li> -->
      <li>
        <a href="{{route('admin.dashboard')}}">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-pencil-square-o"></i> <span>About</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{route('admin.details.create')}}"><i class="fa fa-circle-o"></i>Add About</a></li>
          <li><a href="{{route('admin.details.index')}}"><i class="fa fa-circle-o"></i>View About</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-puzzle-piece"></i> <span>Feature</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{route('admin.features.create')}}"><i class="fa fa-circle-o"></i>Add Feature</a></li>
          <li><a href="{{route('admin.features.index')}}"><i class="fa fa-circle-o"></i>View Feature</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-thumb-tack"></i> <span>Notice</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{route('admin.notices.create')}}"><i class="fa fa-circle-o"></i>Add Notice</a></li>
          <li><a href="{{route('admin.notices.index')}}"><i class="fa fa-circle-o"></i>View Notice</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-child"></i> <span>Student</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{route('admin.student.create')}}"><i class="fa fa-circle-o"></i>Student Registration</a></li>
          <li><a href="{{route('admin.student.view')}}"><i class="fa fa-circle-o"></i>Student Details</a></li>
          <li><a href="{{route('student.enroll.index')}}"><i class="fa fa-circle-o"></i>Enrolled</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-group"></i> <span>Teacher</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{route('admin.teacher.create')}}"><i class="fa fa-circle-o"></i>Teacher Registration</a></li>
          <li><a href="{{route('admin.teacher.view')}}"><i class="fa fa-circle-o"></i>Teacher Details</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-plus"></i> <span>Branch</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{route('admin.category.create')}}"><i class="fa fa-circle-o"></i>Create Branch</a></li>
          <li><a href="{{route('admin.category.index')}}"><i class="fa fa-circle-o"></i>View Branches</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-book"></i> <span>Course</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{route('admin.blog.create')}}"><i class="fa fa-circle-o"></i>Add Course</a></li>
          <li><a href="{{route('admin.blog.index')}}"><i class="fa fa-circle-o"></i>View Course</a></li>
        </ul>
      </li>
      <li>
        <a href="{{route('admin.enquiries.index')}}">
          <i class="fa fa-pencil-square-o"></i> <span>Enquiries</span>
        </a>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>