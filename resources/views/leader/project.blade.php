<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>dashboard - pms</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../vendors/feather/feather.css">
  <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="../../vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">
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
              <img src="../../images/faces/face28.png" alt="profile"/> {{Auth::user()->name}}
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
      </div>
    </nav>
    <div class="container-fluid page-body-wrapper">
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
                <li class="nav-item"> <a class="nav-link" href="#">My Projects</a></li>
                <li class="nav-item"> <a class="nav-link" href="#">My Tasks</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-12 mb-4 mb-xl-0">
                
                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                        <p class="card-title">Project Details</p>
                        <div class="row">
                            <div class="col-12">
                            <div class="table-responsive">
                                <table id="" class="" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Team Leader</th>
                                            <th>Weight</th>
                                            <th>Status</th>
                                            <th>Description</th>
                                            <th>Progress</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($project as $project)
                                        <tr>
                                            <td>{{$project->projecttitle}}</td>
                                            <td>{{$project->startdate}}</td>
                                            <td>{{$project->enddate}}</td>
                                            <td>{{$project->teamleader}}</td>
                                            <td>{{$project->totalweight - 1}}</td>
                                            <td class="badge badge-info">Active</td>
                                            <td>{{$project->description}}</td>
                                            <td>
                                              <div class="progress">         
                                                <div class="progress-bar bg-success" role="progressbar" style="width: {{($project->accomplishment/($project->totalweight))*100}}%" aria-valuenow="{{($project->accomplishment/($project->totalweight))*100}}" aria-valuemin="0" aria-valuemax="100"></div>
                                              </div>
                                            </td>
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
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title mb-0">Add New Task</p>
                  <div class="table-responsive">
                  <form class="forms-sample" method="POST" action="{{route('leader.create-tasks')}}">
                    {{ csrf_field() }}
                    <div class="row">
                      <div class="col-md-12">
                        <select class="form-control" id="" name="projecttitle" style="display: none;">
                          @foreach ($projects as $project)
                            <option value="{{$project->projecttitle}}">{{$project->projecttitle}}</option>
                          @endforeach
                          </select>
                        <div class="form-group">
                          <label for="exampleInputUsername1">Task Name</label>
                          <input type="text" class="form-control" name="taskname" placeholder="task name">
                        </div>
                        <div class="form-group" id="simple-date4">
                          <label for="dateRangePicker">Select Dates</label>
                          <div class="input-daterange input-group">
                            <input type="date" class="input-sm form-control" name="startdate" placeholder="start"/>
                            <div class="input-group-prepend">
                              <span class="input-group-text" style="background-color: #460d46">to</span>
                            </div>
                            <input type="date" class="input-sm form-control" name="enddate" placeholder="end(not including)"/>
                          </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">                            
                                <div class="form-group">                                  
                                    <label for="exampleInputPassword1">Person in Charge</label>
                                    <select name="personincharge" class="form-control" id="">
                                       @foreach ($teammembers as $teammember)
                                        <option value="{{$teammember}}">{{$teammember}}</option>
                                        @endforeach
                                    </select>                                                                      
                                </div>                                 
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Task Weight</label>
                                    <input type="number" class="form-control" name="weight" placeholder="task weight">
                                </div>
                            </div>
                        </div>                        
                        <div class="form-group">
                          <label for="exampleInputEmail1">Task Description</label>
                          <textarea class="form-control" name="description" id="exampleTextarea1" placeholder="project description" rows="4"></textarea>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-outline-primary mr-2">Add</button>
                  </form>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-8 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
                        <p class="card-title mb-0">Tasks</p>
                        <div class="table-responsive">
                            <table class="table table-striped table-borderless">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Name</th>
                                        <th>Dates</th>
                                        <th>In-charge</th>
                                        <th>Weight</th>
                                        <th>Description</th>
                                        <th>Progress</th>
                                    </tr>  
                                </thead>
                                <tbody>
                                    @foreach($tasks as $task)
                                    <tr>
                                        <td>
                                          <a href="{{route('leader.edit-task', ['id' => preg_replace('/[^a-zA-Z0-9\s]/', '', $task->taskname)])}}" class="badge badge-primary">edit</a>
                                        </td>
                                        <td>{{$task->taskname}}</td>
                                        <td>start: {{$task->startdate}} <br> <br> end: {{$task->enddate}}</td>
                                        <td>{{$task->personincharge}}</td>
                                        <td>{{$task->weight}}</td>
                                        <td>{{$task->description}}</td>
                                        <td>
                                          <div class="progress">         
                                            <div class="progress-bar bg-success" role="progressbar" style="width: {{($task->accomplishedweight/($task->weight))*100}}%" aria-valuenow="{{($task->accomplishedweight/($task->weight))*100}}" aria-valuemin="0" aria-valuemax="100"></div>
                                          </div>
                                        </td>
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
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright ?? 2021.  Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
          </div>
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Distributed by <a href="https://www.themewagon.com/" target="_blank">Themewagon</a></span> 
          </div>
        </footer> 
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
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
  <!-- End custom js for this page-->
</body>

</html>

