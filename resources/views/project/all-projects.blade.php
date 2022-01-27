<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>all - projects - pms</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../vendors/feather/feather.css">
  <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="../../vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="../../js/select.dataTables.min.css">
  <link rel="stylesheet" href="../../vendors/select2/select2.min.css">
  <link rel="stylesheet" href="../../vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
  <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/cbe_logo.png" />
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="index.html"><img src="../../images/CBElogo-1.png" class="mr-2" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="index.html"><img src="../../images/cbe_logo.png" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-search d-none d-lg-block">
            <div class="input-group">
              <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                <span class="input-group-text" id="search">
                  <i class="icon-search"></i>
                </span>
              </div>
              <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now" aria-label="search" aria-describedby="search">
            </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="icon-bell mx-0"></i>
              <span class="count"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
              <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
              
            </div>
          </li>
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="../../images/faces/face28.png" alt="profile"/>{{Auth::user()->name}}
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item">
                <i class="ti-settings text-primary"></i>
                Settings
              </a>
              <a class="dropdown-item"
                  data-toggle="modal"
                  href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                  <i class="ti-power-off text-primary"></i>
                  Logout
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{route('dashboard')}}">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="icon-columns menu-icon"></i>
              <span class="menu-title">Projects</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{route('add-project')}}">Add Project</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('project-tasks')}}">Project - Tasks</a></li>
                <li class="nav-item"> <a class="nav-link" href="#">Projects</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">Members</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="icon-bar-graph menu-icon"></i>
              <span class="menu-title">Reports</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- project form -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">              
              <div class="card">
                <div class="card-body">
                  <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                      <a class="btn btn-outline-secondary active" id="pills-active-tab" data-toggle="pill" href="#pills-active" role="tab" aria-controls="pills-active" aria-selected="true">Active</a>
                    </li>
                    <li class="nav-item">
                      <a class="btn btn-outline-secondary" id="pills-completed-tab" data-toggle="pill" href="#pills-completed" role="tab" aria-controls="pills-completed" aria-selected="false">Completed</a>
                    </li>
                    <li class="nav-item">
                      <a class="btn btn-outline-secondary" id="pills-terminated-tab" data-toggle="pill" href="#pills-terminated" role="tab" aria-controls="pills-terminated" aria-selected="false">Terminated</a>
                    </li>
                    <li class="nav-item">
                      <a class="btn btn-outline-secondary" id="pills-all-tab" data-toggle="pill" href="#pills-all" role="tab" aria-controls="pills-all" aria-selected="false">All Projects</a>
                    </li>
                  </ul>
                  <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-active" role="tabpanel" aria-labelledby="pills-active-tab">
                      <div class="table-responsive">
                        <table class="table table-striped">
                          <thead>
                            <tr>
                              <th>
                                Title
                              </th>
                              <th>
                                Team Leader
                              </th>
                              <th>
                                Progress
                              </th>
                              <th>
                                Project Owner
                              </th>
                              <th>
                                Deadline
                              </th>
                              <th></th>
                              <th></th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($active_projects as $project)
                            <tr>
                              <td class="py-1">
                                {{$project->projecttitle}}
                              </td>
                              <td>
                                {{$project->teamleader}}
                              </td>
                              <td>
                                <div class="progress">
                                  <div class="progress-bar bg-success" role="progressbar" style="width: {{($project->accomplishment/$project->totalweight)*100}}%" aria-valuenow="{{($project->accomplishment/$project->totalweight)*100}}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                              </td>
                              <td>
                                {{$project->unit}}
                              </td>
                              <td>
                                {{$project->enddate}}
                              </td>
                              <td><a href="#" class="btn btn-info btn-sm">Detail</a></td>
                              <td>
                                <form action="{{route('mark-flag')}}" method="post">
                                {{ csrf_field() }}
                                  <input type="text" name="flag" value="completed" style="display: none;">
                                  <input type="text" name="projecttitle" value="{{$project->projecttitle}}" style="display: none;">
                                  <button type="submit" class="btn btn-outline-info btn-sm"><small>mark as completed</small></button>
                                </form>
                              </td>
                              <td>
                                <form action="{{route('mark-flag')}}" method="post">
                                {{ csrf_field() }}
                                  <input type="text" name="flag" value="terminated" style="display: none;">
                                  <input type="text" name="projecttitle" value="{{$project->projecttitle}}" style="display: none;">
                                  <button type="submit" class="btn btn-outline-warning btn-sm"><small>mark as terminated</small></button>
                                </form>
                              </td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="pills-completed" role="tabpanel" aria-labelledby="pills-completed-tab">
                      <div class="table-responsive">
                        <table class="table table-striped">
                          <thead>
                            <tr>
                              <th>
                                Title
                              </th>
                              <th>
                                Team Leader
                              </th>
                              <th>
                                Progress
                              </th>
                              <th>
                                Project Owner
                              </th>
                              <th>
                                Deadline
                              </th>
                              <th></th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($completed_projects as $project)
                            <tr>
                              <td class="py-1">
                                {{$project->projecttitle}}
                              </td>
                              <td>
                                {{$project->teamleader}}
                              </td>
                              <td>
                                <div class="progress">
                                  <div class="progress-bar bg-success" role="progressbar" style="width: {{($project->accomplishment/$project->totalweight)*100}}%" aria-valuenow="{{($project->accomplishment/$project->totalweight)*100}}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                              </td>
                              <td>
                                {{$project->unit}}
                              </td>
                              <td>
                                {{$project->enddate}}
                              </td>
                              <td><a href="#" class="btn btn-info btn-sm">Detail</a></td>
                              <td><a href="#" class="btn btn-outline-info btn-sm"><small>mark as completed</small></a></td>
                            </tr>
                            @endforeach                        
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="pills-terminated" role="tabpanel" aria-labelledby="pills-terminated-tab">
                      <div class="table-responsive">
                        <table class="table table-striped">
                          <thead>
                            <tr>
                              <th>
                                Title
                              </th>
                              <th>
                                Team Leader
                              </th>
                              <th>
                                Progress
                              </th>
                              <th>
                                Project Owner
                              </th>
                              <th>
                                Deadline
                              </th>
                              <th></th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($terminated_projects as $project)
                            <tr>
                              <td class="py-1">
                                {{$project->projecttitle}}
                              </td>
                              <td>
                                {{$project->teamleader}}
                              </td>
                              <td>
                                <div class="progress">
                                  <div class="progress-bar bg-success" role="progressbar" style="width: {{($project->accomplishment/$project->totalweight)*100}}%" aria-valuenow="{{($project->accomplishment/$project->totalweight)*100}}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                              </td>
                              <td>
                                {{$project->unit}}
                              </td>
                              <td>
                                {{$project->enddate}}
                              </td>
                              <td><a href="#" class="btn btn-info btn-sm">Detail</a></td>
                              <td><a href="#" class="btn btn-outline-success btn-sm"><small>activate</small></a></td>
                            </tr>
                            @endforeach                        
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab">
                      <div class="table-responsive">
                        <table class="table table-striped">
                          <thead>
                            <tr>
                              <th>
                                Title
                              </th>
                              <th>
                                Team Leader
                              </th>
                              <th>
                                Progress
                              </th>
                              <th>
                                Project Owner
                              </th>
                              <th>
                                Deadline
                              </th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($projects as $project)
                            <tr>
                              <td class="py-1">
                                {{$project->projecttitle}}
                              </td>
                              <td>
                                {{$project->teamleader}}
                              </td>
                              <td>
                                <div class="progress">
                                  <div class="progress-bar bg-success" role="progressbar" style="width: {{($project->accomplishment/$project->totalweight)*100}}%" aria-valuenow="{{($project->accomplishment/$project->totalweight)*100}}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                              </td>
                              <td>
                                {{$project->unit}}
                              </td>
                              <td>
                                {{$project->enddate}}
                              </td>
                              <td><a href="#" class="btn btn-info btn-sm">Detail</a></td>
                            </tr>
                            @endforeach                        
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>                  
                </div>
              </div>
            </div>
          </div>
        </div>        
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.  Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- project form end here -->  
    </div>   
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="../../vendors/chart.js/Chart.min.js"></script>
  <script src="../../vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="../../vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="../../js/dataTables.select.min.js"></script>
  <script src="../../vendors/typeahead.js/typeahead.bundle.min.js"></script>
  <script src="../../vendors/select2/select2.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../../js/dashboard.js"></script>
  <script src="../../js/Chart.roundedBarCharts.js"></script>
  <script src="../../js/select2.js"></script>
  <!-- End custom js for this page-->
</body>

</html>

