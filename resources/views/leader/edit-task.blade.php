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
  <link rel="stylesheet" href="../../vendors/mdi/css/materialdesignicons.min.css">
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
                <li class="nav-item"> <a class="nav-link" href="{{route('leader.my-projects')}}">My Projects</a></li>
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
            <div class="col-md-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title mb-0">Edit Task</p>  
                  <div class="justify-content-end d-flex">
                    <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                        @if ($task->status == 'active')
                        <form action="{{route('leader.mark-task.submit')}}" method="post">
                            {{ csrf_field() }}
                            <input type="text" name="taskname" value="{{$task->taskname}}" style="display: none;">
                            <button class="btn btn-sm btn-light bg-white" type="submit">
                            <i class="mdi mdi-checkbox-marked"></i> Mark this task as completed
                            </button>
                        </form>
                        @endif                        
                    </div>
                  </div>              
                  <div class="table-responsive">
                  <form class="forms-sample" method="POST" action="{{route('leader.edit-task.submit')}}">
                    {{ csrf_field() }}
                    <div class="row">
                      <div class="col-md-12">
                        <input type="text" name="projecttitle" value="{{$task->projecttitle}}" style="display: none;">
                        <div class="form-group">
                          <label for="exampleInputUsername1">Task Name</label>
                          <input type="text" class="form-control" name="taskname" value="{{$task->taskname}}" placeholder="task name">
                        </div>
                        <div class="form-group" id="simple-date4">
                          <label for="dateRangePicker">Select Dates</label>
                          <div class="input-daterange input-group">
                            <input type="date" class="input-sm form-control" name="startdate" value="{{$task->startdate}}" placeholder="start"/>
                            <div class="input-group-prepend">
                              <span class="input-group-text" style="background-color: #460d46">to</span>
                            </div>
                            <input type="date" class="input-sm form-control" name="enddate" value="{{$task->enddate}}" placeholder="end(not including)"/>
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
                                    <input type="number" class="form-control" name="weight" value="{{$task->weight}}" placeholder="task weight">
                                </div>
                            </div>
                        </div>                        
                        <div class="form-group">
                          <label for="exampleInputEmail1">Task Description</label>
                          <textarea class="form-control" name="description" id="exampleTextarea1" value="{{$task->description}}" rows="4"></textarea>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-outline-primary mr-2">Update</button>
                  </form>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-8 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
                        <p class="card-title mb-0">Task Updates</p>
                        <div class="table-responsive">
                            <table class="table table-striped table-borderless">
                                <thead>
                                    <tr>
                                        <th>Updates</th>
                                        <th>Accomplishment</th>
                                        <th>Challenge</th>
                                        <th>Accomplished Weight <small>(of {{$task->weight}})</small></th>
                                        <th>Progress</th>
                                    </tr>  
                                </thead>
                                <tbody>                                    
                                    @foreach ($updates as $update)
                                    <tr>
                                        <td>{{$update->id}}</td>
                                        <td>{{$update->accomplishment}}</td>
                                        <td>{{$update->challenge}}</td>
                                        <td>{{$update->accomplishedweight}}(<small>{{($update->accomplishedweight/$task->weight)*100}}%</small>)</td>
                                        <td>
                                            <div class="progress">      
                                                <div class="progress-bar bg-success" role="progressbar" style="width: {{($update->accomplishedweight/$task->weight)*100}}%" aria-valuenow="{{($update->accomplishedweight/$task->weight)*100}}" aria-valuemin="0" aria-valuemax="100"></div>
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
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.  Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
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

