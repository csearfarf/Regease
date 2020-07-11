<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Attendance List</h4>
                  <p class="card-category">List of students that is officially registered in selected event.</p>
                </div>
                <div class="card-body">
                  
                    <div class="row">
                      <div class="col-md-4">
                      </div>
                      <div class="col-md-4">
                      <div class="form-group">
                      <input type="text" class="form-control" id="searchBox" placeholder="Search">
                      </div>
                      </div>

                      <div class="col-md-4">
                          <p class="text-right">
                          <button class="btn-primary btn btn-md" data-toggle="modal" data-target="#selection">Draw Raffle</button>
                          </p>
                      </div>
                      
                    </div>
                   
                 
                     <table class="table dt-responsive nowrap text-center" id="accounts">
                     <thead class="text-primary">
                     <tr>
                        <th class="text-center font-weight-bold h4">Student Number</th>
                        <th class="text-center font-weight-bold h4">Name</th>
                        <th class="text-center font-weight-bold h4">Year</th>
                        <th class="text-center font-weight-bold h4">Section</th>
                        <th class="text-center font-weight-bold h4">Email</th>
                        <th class="text-center font-weight-bold h4">Registrator Name</th>
                        <th class="text-center font-weight-bold h4">Time-in</th>
                     </tr>
                     </thead>
                     <tbody>
                     </tbody>
                     </table>
                </div>
              </div>
            </div>
          </div>
        </div>
</div>





<!-- Modal Fullscreen -->


  
<div class="modal fade " tabindex="-1" role="dialog" id="selection">
  <div class="modal-dialog modal-full" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Raffle Type ss</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="text-center">
          <a href="<?php echo base_url(); ?>raffle/custom"><button class="btn-primary btn btn-md" id="custom">Customize Raffle</button></a>
          <a href="<?php echo base_url(); ?>raffle"><button class="btn-primary btn btn-md"  id="all">All Attendees</button></a>
        </p>
      </div>
    </div>
  </div>
</div>





<script type="text/javascript">
  
  $("#all").on("click", function(){
    $("#selection").modal("hide");
    $("#selection").on("hidden.bs.modal",function(){
    $("#allModal").modal("show");
    });
});

   $("#custom").on("click", function(){
    $("#selection").modal("hide");
    $("#selection").on("hidden.bs.modal",function(){
    $("#customModal").modal("show");
    });
});

</script>

<script type="text/javascript">
   
    //set the colors for each life, in HEX
    var colors = ["#ABC8E4","#628CB6","#003366","#001948","#001948","#001948","#001948"];

    /*
     * If you want to have the names show up on the page without entering them into
     * the text field, you can define them here. There is an option to give names
     * points, if you don't then it defaults to one point.
     */
    var imported = false;


    /**
     * Raffle
     * 2012
     * https://github.com/stringham/raffle
     * Copyright Ryan Stringham
     */

    //set the colors for each life, in HEX
    var colors = ["#ABC8E4","#628CB6","#003366","#001948","#001948","#001948","#001948"];

    /*
     * If you want to have the names show up on the page without entering them into
     * the text field, you can define them here. There is an option to give names
     * points, if you don't then it defaults to one point.
     */
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
      this.dom = $("<div class='ticket badge badge-pill badge-success'>").text(name);

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
          if(font <=40){

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
