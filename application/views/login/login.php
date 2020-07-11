<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    RegEase | Login
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

  <!-- CSS Files -->

  <link href="<?php echo base_url(); ?>assets/assets/css/material-dashboard.css" rel="stylesheet" />
  <link href="<?php echo base_url(); ?>assets/assets/css/regease.css" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
   <!--   Core JS Files   -->
  <script src="<?php echo base_url(); ?>assets/assets/js/core/jquery.min.js"></script>
    <!-- Forms Validations Plugin -->
  <script src="<?php echo base_url(); ?>assets/assets/js/plugins/jquery.validate.min.js"></script>
  
</head>
<!--<div id="introLoader" class="introloader">
    <div id="anim">
    </div>-->
</div>
<style>

.image {
  background-image: url('<?php echo base_url(); ?>assets/img/background.svg');
  background-position: top center;
  background-size: cover;

}

.avatar {
  width: 150px;
  height: 150px;
  box-sizing: border-box;
  border: 5px white solid;
  border-radius: 50%;
  overflow: hidden;
  box-shadow: 0 5px 15px 0px rgba(0,0,0,0.6);
  transform: translatey(0px);
  animation: float 6s ease-in-out infinite;
  img { width: 100%; height: auto; }
}

.content {
  width: 100%;
  max-width: 600px;
  padding: 20px 40px;
  box-sizing: border-box;
  text-align: center;
}
</style>

<body style="background-color:white;">
    <div class="wrapper image">
        <div class="container">
            <div class="row pt-5">
                  <div class="col-lg-4 col-md-6 col-sm-12 pt-5">
                    <div class="card pt-5 mt-5 pb-5">
                      <div class="card-body">
                        <div class="text-center">
                          <img src="<?php echo base_url(); ?>assets/img/regease.png" class="pb-2 pt-4 floating" style="width:40%"/>
                        </div>
                          <div class="col-11 m-auto pt-3">
                            <form method="POST" id="loginForm" autocomplete="off">
                                <div class="form-group">
                                  <label >Username</label>
                                  <input type="text" id="tbUsername"  class="form-control" minlength="3" required/>
                                </div>
                                </br>
                                <div class="form-group">
                                  <label >Password</label>
                                  <input type="password" id="tbPassword" minlength="3"  class="form-control" required/>
                                </div>
                                <div style="margin-top: 20px">
                                  <button id="btnOrgLogin" type="submit" onclick="user_login();" class="btn btn-primary btn-block">Login</button>
                                </div> 
                                <div class="mt-3" id="response_div">
                                <div class="pb-4"></div>
                              </div> 
                            </form>
                          </div>
                        </div>
                      </div>
                    </div> 
                    <div class="col-lg-8 col-md-6 col-sm-12 pt-5 mt-5">
                      <div class="col-md-4 m-auto pt-4">
                        <img src="<?php echo base_url(); ?>assets/img/stuudents.svg" style="width:32vw;  transform: translatey(0px);
  animation: float 6s ease-in-out infinite;"/>
                      </div>
                    </div>
                     
            </div>
        
        </div>
    </div>

    <script>
           $("#loginForm").submit(function(e) {
              e.preventDefault();// [prevents submitting form to do ajax]
          });

           // validate signup form on keyup and submit
             setFormValidation('#loginForm');
             function setFormValidation(id) {
            $(id).validate({
              highlight: function(element) {
                $(element).closest('.form-group').removeClass('has-success').addClass('has-danger');
                $(element).closest('.datetimepicker').removeClass('has-success').addClass('has-danger');
              },
              success: function(element) {
                $(element).closest('.form-group').removeClass('has-danger').addClass('has-success');
                $(element).closest('.datetimepicker').removeClass('has-danger').addClass('has-success');
              },
              errorPlacement: function(error, element) {
                $(element).closest('.form-group').append(error);
              },
            });
          }
          function user_login(){


            if($("#loginForm").valid()){
              var username = $('#tbUsername').val();
              var password = $('#tbPassword').val();

              var baseURL= "<?= base_url();?>";
              var url=baseURL + "home/checkInput";

                $.ajax({
              url: url, // Url to which the request is send
              type: "POST",             // Type of request to be send, called as method
              data: {username:username,password:password}, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
              dataType: 'json',
              success: function(data)   // A function to be called if request succeeds
              {
                console.log(data);
                if(data.logged_in){
                swal({
                title: 'Welcome  ' + data.username + '! ☺',
                type: "success"
                }).then(function() {     
                  if(data.type ==1){
                window.location.replace("<?= base_url();?>dashboard/");
                }else{
                window.location.replace("<?= base_url();?>devcom/");
                }
                });
           
               

                }else{

              
                swal({
                title: 'Invalid Credentials',
                type: "warning"
                }).then(function() {     
                     $("#username").focus();
                     $('#formsend').trigger("reset");
                });
                }
              
              }

          });


            }
          }

    </script>
 
  <!-- Preloader -->
  <script src="<?php echo base_url(); ?>assets/lottie.js"></script>
  <script src="<?php echo base_url(); ?>assets/loader.js"></script>

  <script src="<?php echo base_url(); ?>assets/assets/js/core/popper.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Plugin for the momentJs  -->
  <script src="<?php echo base_url(); ?>assets/assets/js/plugins/moment.min.js"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="<?php echo base_url(); ?>assets/assets/js/plugins/sweetalert2.js"></script>

  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="<?php echo base_url(); ?>assets/assets/js/plugins/jquery.bootstrap-wizard.js"></script>
  <!--  Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="<?php echo base_url(); ?>assets/assets/js/plugins/bootstrap-selectpicker.js"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="<?php echo base_url(); ?>assets/assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
  <script src="<?php echo base_url(); ?>assets/assets/js/plugins/jquery.dataTables.min.js"></script>


  <!--  Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="<?php echo base_url(); ?>assets/assets/js/plugins/bootstrap-tagsinput.js"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="<?php echo base_url(); ?>assets/assets/js/plugins/jasny-bootstrap.min.js"></script>
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script src="<?php echo base_url(); ?>assets/assets/js/plugins/fullcalendar.min.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="<?php echo base_url(); ?>assets/assets/js/plugins/nouislider.min.js"></script>
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
  <!-- Library for adding dinamically elements -->
  <script src="<?php echo base_url(); ?>assets/assets/js/plugins/arrive.min.js"></script>
  <!-- Chartist JS -->
  <script src="<?php echo base_url(); ?>assets/assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="<?php echo base_url(); ?>assets/assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?php echo base_url(); ?>assets/assets/js/material-dashboard.js?v=2.1.1" type="text/javascript"></script>
  <script>
    $(document).ready(function() {
      $().ready(function() {
        $sidebar = $('.sidebar');

        $sidebar_img_container = $sidebar.find('.sidebar-background');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');

        window_width = $(window).width();

        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

        if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
          if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
            $('.fixed-plugin .dropdown').addClass('open');
          }

        }

        $('.fixed-plugin a').click(function(event) {
          // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .active-color span').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-color', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data-color', new_color);
          }
        });

        $('.fixed-plugin .background-color .badge').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('background-color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-background-color', new_color);
          }
        });

        $('.fixed-plugin .img-holder').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).parent('li').siblings().removeClass('active');
          $(this).parent('li').addClass('active');


          var new_image = $(this).find("img").attr('src');

          if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            $sidebar_img_container.fadeOut('fast', function() {
              $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
              $sidebar_img_container.fadeIn('fast');
            });
          }

          if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $full_page_background.fadeOut('fast', function() {
              $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
              $full_page_background.fadeIn('fast');
            });
          }

          if ($('.switch-sidebar-image input:checked').length == 0) {
            var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
          }
        });

        $('.switch-sidebar-image input').change(function() {
          $full_page_background = $('.full-page-background');

          $input = $(this);

          if ($input.is(':checked')) {
            if ($sidebar_img_container.length != 0) {
              $sidebar_img_container.fadeIn('fast');
              $sidebar.attr('data-image', '#');
            }

            if ($full_page_background.length != 0) {
              $full_page_background.fadeIn('fast');
              $full_page.attr('data-image', '#');
            }

            background_image = true;
          } else {
            if ($sidebar_img_container.length != 0) {
              $sidebar.removeAttr('data-image');
              $sidebar_img_container.fadeOut('fast');
            }

            if ($full_page_background.length != 0) {
              $full_page.removeAttr('data-image', '#');
              $full_page_background.fadeOut('fast');
            }

            background_image = false;
          }
        });

        $('.switch-sidebar-mini input').change(function() {
          $body = $('body');

          $input = $(this);

          if (md.misc.sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            md.misc.sidebar_mini_active = false;

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

          } else {

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

            setTimeout(function() {
              $('body').addClass('sidebar-mini');

              md.misc.sidebar_mini_active = true;
            }, 300);
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);

        });
      });
    });
  </script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();

    });
  </script>
</body>

</html>
