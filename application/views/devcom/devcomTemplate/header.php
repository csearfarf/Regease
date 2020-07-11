<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
        <?php 
              $dashboard = base_url()."devcom";
              $users = base_url()."devcom/registration";
              if(current_url() == $dashboard){
              echo ' RegEase | Event List';
              }elseif (current_url() == $users) {
              echo ' RegEase | Registration';
              }
      ?>
    </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->  
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/assets/materialicons.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="<?php echo base_url(); ?>assets/assets/css/material-dashboard.css" rel="stylesheet" />
  <link href="<?php echo base_url(); ?>assets/css/carousel.css" rel="stylesheet" />

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
  
   <style>

.image {
  background-image: url('<?php echo base_url(); ?>assets/img/back.svg');
  
  background-position: top center;
  background-size: cover;
  background-repeat: no-repeat;
  background-attachment: fixed;

}
</style>




</head>


<!--<div id="introLoader" class="introloader">
    <div id="anim">
    </div>
</div>-->

<body class="off-canvas-sidebar image" style="background-color:white;">
  <!-- Extra details for Live View on GitHub Pages -->
  <!-- Google Tag Manager (noscript) -->

  <!-- End Google Tag Manager (noscript) -->
  <!-- Navbar -->

 <nav class="navbar navbar-expand-lg bg-success fixed-top">
            <div class="container">
              <div class="navbar-translate">
               


                 <?php
                $dashboard = base_url()."devcom";
              $users = base_url()."devcom/registration";

                if(current_url() == $dashboard){
                  echo ' <a class="navbar-brand" href="'.$dashboard.'">Event List</a>';

                }elseif(current_url() == $users){
                  echo ' <a class="navbar-brand" href="'.$users.'">Registration</a>';

                }

                 ?>
                <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="navbar-toggler-icon"></span>
                  <span class="navbar-toggler-icon"></span>
                  <span class="navbar-toggler-icon"></span>
                </button>
              </div>
              <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">


                   <?php 
              $dashboard = base_url()."devcom";
              $users = base_url()."devcom/registration";

  if(current_url() == $dashboard){
    //css events

  echo 
  '
                  <li class="nav-item active">
                       <a href="'.$dashboard.'" class="nav-link">
                          <i class="material-icons"></i>Event List
                        </a>
                  </li>
                  <li class="nav-item">
                    <a href="'.$users.'" class="nav-link">
                      Registration
                    </a>
                  </li>
                 
  ';

  }elseif(current_url() == $users)
echo '
                  <li class="nav-item ">
                       <a href="'.$dashboard.'" class="nav-link">
                          <i class="material-icons"></i>Event List
                        </a>
                  </li>
                  <li class="nav-item active">
                    <a href="'.$users.'" class="nav-link">
                      Registration
                    </a>
                  </li>
                  
';

  ?>

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
  <!-- End Navbar -->
  <div class="wrapper  " style="clear:both;">
   
      <!--   you can change the color of the filter page using: data-color="blue | green | orange | red | purple" -->
      <div class="container" >
        <div class="row mt-5">
          <div class="col-md-12 mt-5">





          
                     

