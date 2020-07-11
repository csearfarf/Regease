<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
      <?php 
              $dashboard = base_url()."dashboard";
              $events = base_url()."dashboard/events";
              $users = base_url()."dashboard/users";
              $students = base_url()."dashboard/students";
              $attendance = base_url()."dashboard/attendance";

              if(current_url() == $dashboard){
              echo ' RegEase | Dashboard';
              }elseif (current_url() == $events) {
              echo ' RegEase | Events';
              }elseif (current_url() == $users) {
              echo ' RegEase | Users';
              }elseif (current_url() == $students) {
              echo ' RegEase | Students';
              }elseif (current_url() == $attendance) {
              echo ' RegEase | Attendance';
              }
      ?>
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/assets/materialicons.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="<?php echo base_url(); ?>assets/assets/css/material-dashboard.css" rel="stylesheet" />
  <link href="<?php echo base_url(); ?>assets/assets/css/regease.css" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="<?php echo base_url(); ?>assets/assets/demo/demo.css" rel="stylesheet" />
   <!--   Core JS Files   -->
  <script src="<?php echo base_url(); ?>assets/assets/js/core/jquery.min.js"></script>
  
  <script src='<?php echo base_url(); ?>assets/assets/js/core/jquery-ui.min.js'></script>
    <!-- Forms Validations Plugin -->
  <script src="<?php echo base_url(); ?>assets/assets/js/plugins/jquery.validate.min.js"></script>


  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/fireworks.js/style/fireworks.css" media="screen" />
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/fireworks.js/script/fireworks.js"></script>
  
</head>



<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="<?php echo base_url(); ?>assets/assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo mt-2">
        <a href="#" class="simple-text logo-normal">
          <img src="<?php echo base_url(); ?>assets/assets/img/regease.png"  style="width: 50%;"/>
        </a>
      </div>



  <?php 
  $dashboard = base_url()."dashboard";
  $events = base_url()."dashboard/events";
  $users = base_url()."dashboard/users";
  $students = base_url()."dashboard/students";
  $attendance = base_url()."dashboard/attendance";

  if(current_url() == $dashboard){
    //css events

  echo 
  '
   <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item active  ">
            <a class="nav-link" href="'.$dashboard.'">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="'.$events.'">
              <i class="material-icons">event</i>
              <p>Events</p>
            </a>
          </li>
          <li class="nav-item ">
              <a class="nav-link" href="'.$users.'">
                <i class="material-icons">person</i>
                <p>Users</p>
              </a>
            </li>
          <li class="nav-item ">
            <a class="nav-link" href="'.$students.'">
              <i class="material-icons">face</i>
              <p>Students</p>
            </a>
          </li>
          <li class="nav-item active-pro ">
              <a class="nav-link mb-2" href="#">
                  <div class="row">
                      <div class="thumbnail">
                          <img src="'.base_url().'assets/img/anime3.png" alt="Circle Image" class="portrait">
                      </div>
                      <h6 class="mt-2 ml-2 title" >'.$_SESSION['name'].'<br><span class="text-primary">admin</span></h6>
                  </div>
              </a>
          </li>
        </ul>
      </div>
  ';

  }elseif (current_url() == $events) {
  echo 
  '
    <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item ">
            <a class="nav-link" href="'.$dashboard.'">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item active ">
            <a class="nav-link" href="'.$events.'">
              <i class="material-icons">event</i>
              <p>Events</p>
            </a>
          </li>
          <li class="nav-item ">
              <a class="nav-link" href="'.$users.'">
                <i class="material-icons">person</i>
                <p>Users</p>
              </a>
            </li>
          <li class="nav-item ">
            <a class="nav-link" href="'.$students.'">
              <i class="material-icons">face</i>
              <p>Students</p>
            </a>
          </li>
          <li class="nav-item active-pro ">
              <a class="nav-link mb-2" href="#">
                  <div class="row">
                       <div class="thumbnail">
                          <img src="'.base_url().'assets/img/anime3.png" alt="Circle Image" class="portrait">
                      </div>
                      <h6 class="mt-2 ml-2 title" >'.$_SESSION['name'].'<br><span class="text-primary">admin</span></h6>
                  </div>
              </a>
          </li>
        </ul>
      </div>

  ';
  }elseif (current_url() == $users) {
  echo 
  '
    <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="'.$dashboard.'">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="'.$events.'">
              <i class="material-icons">event</i>
              <p>Events</p>
            </a>
          </li>
          <li class="nav-item active  ">
              <a class="nav-link" href="'.$users.'">
                <i class="material-icons">person</i>
                <p>Users</p>
              </a>
            </li>
          <li class="nav-item ">
            <a class="nav-link" href="'.$students.'">
              <i class="material-icons">face</i>
              <p>Students</p>
            </a>
          </li>
          <li class="nav-item active-pro ">
              <a class="nav-link mb-2" href="#">
                  <div class="row">
                     <div class="thumbnail">
                          <img src="'.base_url().'assets/img/anime3.png" alt="Circle Image" class="portrait">
                      </div>
                      <h6 class="mt-2 ml-2 title" >'.$_SESSION['name'].'<br><span class="text-primary">admin</span></h6>
                  </div>
              </a>
          </li>
        </ul>
      </div>

  ';
  }elseif (current_url() == $students) {
  echo 
  '
    <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item ">
            <a class="nav-link" href="'.$dashboard.'">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="'.$events.'">
              <i class="material-icons">event</i>
              <p>Events</p>
            </a>
          </li>
          <li class="nav-item ">
              <a class="nav-link" href="'.$users.'">
                <i class="material-icons">person</i>
                <p>Users</p>
              </a>
            </li>
          <li class="nav-item active ">
            <a class="nav-link" href="'.$students.'">
              <i class="material-icons">face</i>
              <p>Students</p>
            </a>
          </li>
          <li class="nav-item active-pro ">
              <a class="nav-link mb-2" href="#">
                  <div class="row">
                     <div class="thumbnail">
                          <img src="'.base_url().'assets/img/anime3.png" alt="Circle Image" class="portrait">
                      </div>
                      <h6 class="mt-2 ml-2 title" >'.$_SESSION['name'].'<br><span class="text-primary">admin</span></h6>
                  </div>
              </a>
          </li>
        </ul>
      </div>

  ';
  }elseif (current_url() == $attendance) {
  echo 
  '
    <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="'.$dashboard.'">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="'.$events.'">
              <i class="material-icons">event</i>
              <p>Events</p>
            </a>
          </li>
          <li class="nav-item ">
              <a class="nav-link" href="'.$users.'">
                <i class="material-icons">person</i>
                <p>Users</p>
              </a>
            </li>
          <li class="nav-item ">
            <a class="nav-link" href="'.$students.'">
              <i class="material-icons">face</i>
              <p>Students</p>
            </a>
          </li>
          <li class="nav-item active-pro ">
              <a class="nav-link mb-2" href="#">
                  <div class="row">
                     <div class="thumbnail">
                          <img src="'.base_url().'assets/img/anime3.png" alt="Circle Image" class="portrait">
                      </div>
                      <h6 class="mt-2 ml-2 title" >'.$_SESSION['name'].'<br><span class="text-primary">admin</span></h6>
                  </div>
              </a>
          </li>
        </ul>
      </div>

  ';
  }
  ?>

     
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <?php 
              $dashboard = base_url()."dashboard";
              $events = base_url()."dashboard/events";
              $users = base_url()."dashboard/users";
              $students = base_url()."dashboard/students";
              $attendance = base_url()."dashboard/attendance";

              if(current_url() == $dashboard){
                //css events
              echo 
              '
              <a class="navbar-brand" href="'.$dashboard.'">Dashboard</a>
              ';

              }elseif (current_url() == $events) {
              echo 
              '
              <a class="navbar-brand" href="'.$events.'">Events</a>
              ';

              }elseif (current_url() == $users) {
              echo 
              '
              <a class="navbar-brand" href="'.$users.'">Users</a>
              ';

              }elseif (current_url() == $students) {
              echo 
              '
              <a class="navbar-brand" href="'.$students.'">Students</a>
              ';

              }elseif (current_url() == $attendance) {
              echo 
              '
              <a class="navbar-brand" href="'.$attendance.'">Attendance</a>
              ';

              }
            ?>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <form class="navbar-form">
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                  <i class="material-icons">search</i>
                  <div class="ripple-container"></div>
                </button>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="#" onclick="logout()">
                  <i class="material-icons">power_settings_new</i>
                  <p class="d-lg-none d-md-block">
                    Log-Out
                  </p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>



   

