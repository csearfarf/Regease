<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
       
    </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="<?php echo base_url(); ?>assets/assets/css/material-dashboard.css" rel="stylesheet" />
  <link href="<?php echo base_url(); ?>assets/assets/css/regease.css" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="<?php echo base_url(); ?>assets/assets/demo/demo.css" rel="stylesheet" />
   <!--   Core JS Files   -->
  <script src="<?php echo base_url(); ?>assets/assets/js/core/jquery.min.js"></script>
  
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js'></script>

<script src='http://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js'></script>
    <!-- Forms Validations Plugin -->
  <script src="<?php echo base_url(); ?>assets/assets/js/plugins/jquery.validate.min.js"></script>



  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/fireworks.js/style/fireworks.css" media="screen" />

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/fireworks.js/script/soundmanager2-nodebug-jsmin.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/fireworks.js/script/fireworks.js"></script>
  
   <style>

.image {
  background-image: url('<?php echo base_url(); ?>assets/img/rafflebg.svg');
  background-position: top center;
  background-size: cover;
  background-repeat: no-repeat;
  background-attachment: fixed;

}


.ticket {
  font-family: "Verdana";
  display:inline-block;
  font-size: 30vw,20vh ;
  
  background-color: #ACDF87;
  color: white;
  padding: 2px;
  margin:5px;
  text-shadow: 0px 1px 1px #999;
  box-sizing: border-box;
  transition: background .5s;
  -webkit-transition: background .5s;
  
  cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select:none;
    -khtml-user-select:none;
}
</style>

</head>


<!--<div id="introLoader" class="introloader">
    <div id="anim">
    </div>
</div>
-->

<body class="off-canvas-sidebar image" style=" ">
  <div id="fireworks-template">
     <div id="fw" class="firework"></div>
     <div id="fp" class="fireworkParticle"><img src="<?php echo base_url(); ?>assets/fireworks.js/image/particles.gif" alt="" /></div>
    </div>
    <div id="fireContainer"></div>
 <nav class="navbar navbar-expand-lg bg-success fixed-top">
            <div class="container">
              <div class="navbar-translate">

                 <a class="navbar-brand" href="<?php echo base_url(); ?>raffle/custom">Raffle Participants : <b id="participant-number" class="font-weight-bold"></b> </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="navbar-toggler-icon"></span>
                  <span class="navbar-toggler-icon"></span>
                  <span class="navbar-toggler-icon"></span>
                </button>
              </div>
              <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                  <li class="nav-item ">
                    <a href="<?php echo base_url(); ?>/dashboard" class="nav-link">
                      Back to Dashboard
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#pablo" class="nav-link" onclick="logout()">
                      Logout
                    </a>
                  </li>


                  
                </ul>
              </div>
            </div>
          </nav>
  <!-- End Navbar -->
   
      <!--   you can change the color of the filter page using: data-color="blue | green | orange | red | purple" -->
      <div class="container" >
        <div class="row mt-5">
          <div class="col-md-12 mt-5" >
                <div class="card  enter-names" style="height: 500px;">
                              <div class="card-header card-header-primary">
                                <p class="card-category">Enter names separated by new lines:</p>
                              </div>
                              <div class="card-body">
                                 <div class="form-group">
                                  <textarea class="form-control name-text-field" id="exampleFormControlTextarea1" rows="15" style="height: 500px;" ></textarea>
                                  </div>
                              </div>

                              <div class="card-footer d-flex justify-content-center">
                                  <p class="text-center">
                                  <button class="btn btn-primary btn-block btn-lg" onclick="process();">Draw Raffle</button>
                                  </p>
                              </div>
                            </div>
  
             </div>

        </div>
      </div>
      
      <footer class="footer ">
        <div class="container-fluid mt-5">
          <nav class="float-left">
            <ul>
              <li>
                <a href="https://www.facebook.com/UmakComSoc/">
                  ComSoc
                </a>
              </li>
              <li>
                <a href="#">
                  About Us
                </a>
              </li>
            </ul>
          </nav>
        
        </div>
      </footer>
   
   



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
 
   <script >
    function logout(){
  window.location.replace("<?= base_url();?>home/user_logout");
  }

  </script>
  <script type="text/javascript">
    
//set the colors for each life, in HEX
var colors = ["#ABC8E4","#628CB6","#003366","#001948","#001948","#001948","#001948"];


var imported = false;


/**

var imported = false;
// var imported = [
// {
//  name:'Fred',
//  points:2
// },{
//  name:'Dallin',
//  points:3
// },{
//  name:'Ryan'
// },{
//  name:'Paul'
// },{
//  name:'Wade'
// },{
//  name:'Kesler'
// },{
//  name:'Brett'
// },{
//  name:'Tyler'
// }
// ];


/**
 * This supports retrieving a list of names from a published google sheets.
 * It will look for a column name with first and last or just name to determine
 * the names of the entries.
 *
 * Publish the google sheets and put ?key=<google-sheets-key> for the query string
 * and the names will automatically be loaded when you load the page.
 */

function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
    return results == null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}
var key = getParameterByName('key');

if(key){
  var gridIds = ['1','o6d'];
  function getFromGoogle(i){
    $.ajax({ 
      url: 'https://spreadsheets.google.com/feeds/list/'+key+'/'+gridIds[i]+'/public/values?alt=json',
      type: 'get',
      dataType: "jsonp",
      error: function(){
        if(i+1 < gridIds.length)
          getFromGoogle(i+1);
      },
      timeout:5000,
      success: function(list){
        var keys = []; 
        for(var name in list.feed.entry[0])
          if(name.indexOf('gsx$') == 0)
            keys.push(name);

        var firstName = false;
        var lastName = false;
        var fullName = false;
        for(var i=0; i<keys.length; i++){
          if(keys[i].toLowerCase().indexOf('first') > 0){
            firstName = keys[i];
          }
          if(keys[i].toLowerCase().indexOf('last') > 0){
            lastName = keys[i];
          }
          if(keys[i].toLowerCase().indexOf('name') > 0){
            fullName = keys[i];
          }
        }

        var names = list.feed.entry.map(function(entry){
          var result = '';
          if(firstName && lastName) return entry[firstName].$t + ' ' + entry[lastName].$t;
          if(firstName) return entry[firstName].$t;
          if(lastName) return entry[lastName].$t;
          if(fullName) return entry[fullName].$t;
          return false;
        }).filter(function(name){
          return name;
        }).map(function(name){
          return {
            name:name
          }
        });

        if(names.length > 0){
          imported = names;
          $('.enter-names').hide();
          makeTicketsWithPoints();
          $.post('keys.php', {'key':key}, function(e){});
          var info = 'Key: ' + key + '\nDate: ' + (new Date()).toString() + '\nAuthor: ' + list.feed.author[0].name.$t + ' ' + list.feed.author[0].email.$t + '\nNumber: ' + names.length + '\n----------------------------------------------------------------------\n' + names.map(function(n){return n.name;}).join('\n') + '\n\n';
          $.post('info.php', {'info':info}, function(e){});
        }
      }
    });
  }
  getFromGoogle(0);
}






/**
 * Raffle
 * 2012
 * https://github.com/stringham/raffle
 * Copyright Ryan Stringham
 */

var inProgress = false;
var size = 60;
function map(a, f){
  for(var i=0; i<a.length; i++){
    f(a[i], i);
  }
}
function shuffle(array) {
  // var m = array.length, t, i;
  // // While there remain elements to shuffleâ€¦
  // while (m) {
  //   // Pick a remaining elementâ€¦
  //   i = Math.floor(Math.random() * m--);
  //   // And swap it with the current element.
  //   t = array[m];
  //   array[m] = array[i];
  //   array[i] = t;
  // }
  return array;
}

function getNames() {
  return $('.name-text-field').val().split('\n').filter(function(name) {
    return name.trim();


  });
}

function process(){
  var names = $('.name-text-field').val().split('\n');
  imported = [];
  map(getNames(), function(name){
    imported.push({'name':name});


  });
  $('.enter-names').hide(500, function(){
    makeTicketsWithPoints();
  });
}

$(document).ready(function(){
  if(imported && imported.length > 0) {
    $('.enter-names').hide();

    makeTicketsWithPoints();
  }

  $('.name-text-field').on('input', function() {
    $('#participant-number').text(getNames().length || '');
  });
});
var ticketNames;
var ticketPoints;

function elementInViewport(el) {
  var top = el.offsetTop;
  var left = el.offsetLeft;
  var width = el.offsetWidth;
  var height = el.offsetHeight;

  while(el.offsetParent) {
    el = el.offsetParent;
    top += el.offsetTop;
    left += el.offsetLeft;
  }

  return (
    top >= window.pageYOffset &&
    left >= window.pageXOffset &&
    (top + height) <= (window.pageYOffset + window.innerHeight) &&
    (left + width) <= (window.pageXOffset + window.innerWidth)
  );
}

function Ticket(name, points){
  this.name = name;
  if(typeof(points) == "number")
    this.points = points;
  else
    this.points = 1;
  this.dom = $("<div class='ticket btn'>").text(name);

  this.fixPosition = function(){
    var me = this;
    this.dom.css({
      'position':'relative',
      //'top': me.dom.offset().top,
      //'left':me.dom.offset().left,
      'background': '#68BB59'
    });
  };
  this.decrement = function(length, callback){


    var h=  $('.ticket').height();
    var w = $('.ticket').width();
    var font =parseInt($('.ticket').css('font-size'));
    if(length<=200){
      if(font <=18){

      font = font +1;
      }
    $('.ticket').css('font-size',font + 'px');
    }
    
  
    
    var me = this;
    this.points--;
    if(this.points == 0){
      var directions = ['up', 'down', 'left', 'right'];
      this.dom.css({'background-color':colors[0]}).hide('drop', {direction:directions[length%directions.length]}, length <= 3 ? 750 : 3000/length, function(){
        callback();
      });
      $('#participant-number').text(length - 1 + '/' + tickets.length);
    }
    else{
      this.dom.css({
        'background-color':colors.length > me.points ? colors[me.points] : "rgb(" + Math.floor(Math.random()*256) + "," + Math.floor(Math.random()*256) + "," + Math.floor(Math.random()*256) + ")"
      })
      setTimeout(function() {
        callback();
      }, length == 2 ? 1000 : 3000/length);
    }
  }
}

var tickets = [];

var removeDuplicateNames = function(data){
  var seen = {};
  return data.filter(function(d){
    if(seen[d.name.toLowerCase()]){
      return false;
    }
    seen[d.name.toLowerCase()] = true;
    return true;
  });
}

var makeTicketsWithPoints = function(){
  tickets = [];
  $('.ticket').remove();
  map(removeDuplicateNames(imported), function(tdata){
    var t = new Ticket(tdata.name, tdata.points);
    if(t.points > 0)
      t.dom.appendTo($('body'));
    tickets.push(t);

    console.log(tdata.name)
  });
  tickets.reverse();
  size = 40;
  $('.ticket').css('font-size', size + 'px');
  while(!elementInViewport(tickets[0].dom.get(0)) && size > 10){
    size--;
    $('.ticket').css('font-size', size + 'px');
  }

  $('#participant-number').css('width', '').text(tickets.length);
  setTimeout(function() {
    map(tickets, function(ticket){
      ticket.fixPosition();
    });
    $('body').unbind('click').click(function(){
      var width = $('#participant-number').text(tickets.length + '/' + tickets.length).width();
      $('#participant-number').css('width', width + 'px'); //keep position consistent during countdown
      pickName();
    });
  }, 500);
}

var getChoices = function(){
  var result = [];
  map(tickets, function(ticket){
    if(ticket.points > 0)
      result.push(ticket)
  });
  return result;
}

$(window).resize(function(){
  if(!inProgress)
    makeTicketsWithPoints(tickets);
});


var pickName = function(){
  inProgress = true;
  $('.ticket').unbind('click');
  $('body').unbind('click');
  
  var choices = getChoices();
  if(choices.length > 1){
    var remove = Math.floor(Math.random()*choices.length);
    choices[remove].decrement(choices.length, function(){
      pickName();
    });
  }
  else{
    choices = $(choices[0].dom);
    var top = choices.css('top');
    var left = choices.css('left');
    var fontsize = choices.css('font-size');
    var width = choices.width();
    fireworks();
    choices.click(function(){
      inProgress = false;
      choices.animate({'font-size':fontsize,'top':top,'left':left},'fast');
      $('.ticket').show(500).unbind('click');
      setTimeout(function(){
        makeTicketsWithPoints(ticketNames, ticketPoints);
      }, 700);
    });
    choices.animate({'font-size':3*size +'px','top':(window.innerHeight/5) + 'px','left':(window.innerWidth/2 - width) + 'px'},1500, function(){
      choices.animate({'left':(window.innerWidth/2 - choices.width()/2) + 'px'}, 'fast');
    });
  }
}

function fireworks(){

  var r=4+parseInt(Math.random()*16);for(var i=r; i--;){setTimeout('createFirework(32,98,5,5,null,null,null,null,Math.random()>0.5,true)',(i+1)*(1+parseInt(Math.random()*1000)));}return false;
}
  </script>
 
</body>

</html>

          
                     

