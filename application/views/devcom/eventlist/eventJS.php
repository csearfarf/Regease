
<script type="text/javascript" language="javascript" >  
  var year;
  var month;
  var startDays=01;
  var totalDaysInMonth;
  var base_url = "<?php echo base_url(); ?>";
  var url;


 $(document).ready(function(){

   



  $('#calendar').fullCalendar({


         viewRender: function(view) {
              var title = view.title;
              $("#titleMonth").html(title);

              var getDaysInMonth = function(month,year) {
              // Here January is 1 based
              //Day 0 is the last day in the previous month
             return new Date(year, month, 0).getDate();
            // Here January is 0 based
            // return new Date(year, month+1, 0).getDate();
            };


              var d = new Date( title );

                if ( !!d.valueOf() ) { // Valid date
                    year = d.getFullYear();
                    month = d.getMonth()+1;
      
                } else { /* Invalid date */ }


              
            // getting the total number of days based on month,year ex apr,2019
                totalDaysInMonth= getDaysInMonth(month, year);
            // year + month + startDays + totalDaysInMonth

              url = base_url + "devcom/fetch_user" + "/" + year + "/" + month + "/" +startDays + "/" + totalDaysInMonth;

            },
            header:false,
            eventLimit: true,
            editable: true,

          eventSources: [

          {
             events: function(start, end, timezone, callback) {
                 $.ajax({
                 url: '<?php echo base_url() ?>event/get_events',
                 dataType: 'json',
                 data: {
                 // our hypothetical feed requires UNIX timestamps
                 start: start.unix(),
                 end: end.unix()
                 },
                 success: function(msg) {
                     var events = msg.events;
                     callback(events);
                 }
                 });
             }
         },



          ],
          eventClick: function(event, jsEvent, view) {
                //$('#ename').val(event.title);

            
                $('#eeventname').val(event.title);
                $('#eeventLocation').val(event.eventLocation);
                $('#eeventPoints').val(event.points);
                $('#eeventStart').val($.fullCalendar.formatDate(event.start, "YYYY-MM-DD HH:mm:ss"));
                $('#eeventEnd').val($.fullCalendar.formatDate(event.end, "YYYY-MM-DD HH:mm:ss"));

                $('#eid').val(event.id);


                $('#editAccount').modal();
          },eventRender: function(event, element) {
         // alert(event.area);
        }
  });





  var dataTable = $('#events').DataTable({   
          dom: 'Brtip',
          lengthChange: false,
         
            buttons: [
            {extend:'copy',exportOptions: {
                        columns: ':visible'
                    },
                    exportOptions: {
                       columns: [0, 1]
                    }
            }, 
            {extend:'excel',exportOptions: {
                        columns: ':visible'
                    },
                    exportOptions: {
                       columns: [0, 1]
                    }
            },
            {extend:'print',exportOptions: {
                        columns: ':visible'
                    },
                    exportOptions: {
                       columns: [0, 1]
                    }
            }, 
                    ],
               "processing":true,  
               "serverSide":true,
               "responsive":true,
               "autoWidth": false,
               "ajax":{  
                    url:url,
                    // year + month + startDays + totalDaysInMonth  
                    type:"POST"  
               },
               columnDefs: [
            { responsivePriority: 1, targets: 0 },
            { responsivePriority: 2, targets: 1 }
          ]
               , 
            drawCallback: function() {
            var api = this.api();
            var num_rows = api.page.info().recordsTotal;
            var records_displayed = api.page.info().recordsDisplay;
            // now do something with those variables


            $("#totalEvent").html(num_rows);

        }    
               

          });  

          $('#dataTable').resize();


});


  function proceed(id){

  var base_url = "<?= base_url();?>";
  var url =  base_url +"devcom/proceed";

  if( id !=null || id !="" ){


 Swal({
      title: 'Proceed to Event?',
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, proceed!'
    }).then((result) => {
      if (result.value) {

       
     $.ajax({
              url: url, // Url to which the request is send
              type: "POST",             // Type of request to be send, called as method
              data: {id:id}, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
              dataType: 'json',
              success: function(data)   // A function to be called if request succeeds
              {
                 if(data){
                  window.location.href = base_url+"devcom/registration"

                 }else{
                  alert("error in selection of event");
                 }         
              }

          });

      
      }
    });

  }

}


</script>


<!-- calendar button -->
<script type="text/javascript">
  $('#prev').on('click', function() {
      $('#calendar').fullCalendar('prev'); // call method

      $('#events').DataTable().ajax.url(url).load();
    });

    $('#next').on('click', function() {
      $('#calendar').fullCalendar('next'); // call method

      $('#events').DataTable().ajax.url(url).load();
    });

</script>





