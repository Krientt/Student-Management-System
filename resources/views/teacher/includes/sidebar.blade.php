<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="/uploads/teacher_profile/{{Auth::user()->image}}" class="img-circle" alt="User Image">
      </div>
      <a href="{{route('teacher.profile')}}">
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
        <a href="{{route('teacher.dashboard')}}">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-child"></i> <span>Student</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{route('teacher.student.create')}}"><i class="fa fa-circle-o"></i>Student Registration</a></li>
          <li><a href="{{route('teacher.student.view')}}"><i class="fa fa-circle-o"></i>Student Details</a></li>
        </ul>
      </li>
      <li>
        <a href="{{route('teacher.course.index')}}">
          <i class="fa fa-book"></i> <span>View Course</span>
        </a>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-edit"></i> <span>Attendance</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{route('student.attendance.create')}}"><i class="fa fa-circle-o"></i>Add Attendance</a></li>
          <li><a href="{{route('student.attendance.view')}}"><i class="fa fa-circle-o"></i>View Attendance</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-edit"></i> <span>Marks</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{route('student.marks.create')}}"><i class="fa fa-circle-o"></i>Add Marks</a></li>
          <li><a href="{{route('student.marks.view')}}"><i class="fa fa-circle-o"></i>View Marks</a></li>
        </ul>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>