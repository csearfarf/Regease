





<script type="text/javascript" language="javascript" >  
  var year;
  var month;
  var startDays=01;
  var totalDaysInMonth;
  var base_url = "<?php echo base_url(); ?>";
  var url;


 $(document).ready(function(){


   

   

 // validate signup form on keyup and submit
   setFormValidation('#createForm');
   setFormValidation('#editForm');
   $("#createForm").submit(function(e) {
    e.preventDefault(); // [prevents submitting form to do ajax]
});
   $("#editForm").submit(function(e) {
    e.preventDefault();// [prevents submitting form to do ajax]
});

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

              url = base_url + "event/fetch_user" + "/" + year + "/" + month + "/" +startDays + "/" + totalDaysInMonth;

            },
            header:false,
            eventLimit: true,
            editable: true,
            eventResize:function(event)
              {
               

                  var eventName = event.title;
                  var eventLocation  = event.eventLocation;
                  var eventPoints  = event.points;
                  var eventStart  = event.start;
                  var eventEnd  = event.end;

                  var id = event.id;

                var baseURL= "<?= base_url();?>";
                var url=baseURL + "event/editSave";
                  $.ajax({
                  url: url, // Url to which the request is send
                    type: "POST",             // Type of request to be send, called as method
                    data: {id:id,eventName:eventName,eventLocation:eventLocation,eventPoints:eventPoints,eventStart:eventStart,eventEnd:eventEnd}, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                    dataType: 'json',
                    success: function(data)   // A function to be called if request succeeds
                    {
                         if(data==1){
                              Swal(
                          'Updated!',
                          'The Task has been successfully save',
                          'success'
                          )
                          //refresh calendar
                          $('#calendar').fullCalendar('refetchEvents');

                         }
                         else{
                           alert(data);
                         }              
                      }
        
                  });
        

              },

              eventDrop:function(event)
              {
               
                 var eventName = event.title;
                  var eventLocation  = event.eventLocation;
                  var eventPoints  = event.points;
                  var eventStart  =  $.fullCalendar.formatDate(event.start, "YYYY-MM-DD HH:mm:ss");
                  var eventEnd  = $.fullCalendar.formatDate(event.end, "YYYY-MM-DD HH:mm:ss");

                  var id = event.id;

                var baseURL= "<?= base_url();?>";
                var url=baseURL + "event/editSave";
                  $.ajax({
                  url: url, // Url to which the request is send
                    type: "POST",             // Type of request to be send, called as method
                    data: {id:id,eventName:eventName,eventLocation:eventLocation,eventPoints:eventPoints,eventStart:eventStart,eventEnd:eventEnd}, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                    dataType: 'json',
                    success: function(data)   // A function to be called if request succeeds
                    {
                         if(data==1){
                              Swal(
                          'Updated!',
                          'The Task has been successfully save',
                          'success'
                        )
                        
                          //refresh calendar
                          $('#calendar').fullCalendar('refetchEvents');

                          $('#events').DataTable().ajax.reload();//reload table

                         }
                         else{
                           alert(data);
                         }              
                      }
        
                  });
              },

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
          dayClick: function(date, jsEvent, view) {
              date_last_clicked = $(this);
              alert(date)

              var eventStart  =  $.fullCalendar.formatDate(date, "YYYY-MM-DD HH:mm:ss");

              $('#eventStart').val(eventStart);
              $('#createAccount').modal();
          },
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
        { responsivePriority: 2, targets: 2 }
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

</script>

 <!-- ajax script -->
<script type="text/javascript">


 function createSave(){

  if($("#createForm").valid()){

  var eventName = $('#eventname').val();
  var eventLocation  = $('#eventLocation').val();
  var eventPoints  = $('#eventPoints').val();
  var eventStart  = $('#eventStart').val();

  var eventEnd  = $('#eventEnd').val();

  var base_url = "<?= base_url();?>";
  var url =  base_url +"event/createSave";


  if(eventName !=null && eventLocation !=null && eventPoints!=null && eventStart !=null && eventEnd !=null || eventName !="" && eventLocation !="" && eventPoints!="" && eventStart !=""  && eventEnd !=""){

     $.ajax({
              url: url, // Url to which the request is send
              type: "POST",             // Type of request to be send, called as method
              data: {eventName:eventName,eventLocation:eventLocation,eventPoints:eventPoints,eventStart:eventStart,eventEnd:eventEnd}, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
              dataType: 'json',
              success: function(data)   // A function to be called if request succeeds
              {
                 if(data==1){
                   Swal(
                          'Created!',
                          'The Event has been successfully save',
                          'success'
                          )
                  $('#events').DataTable().ajax.reload();//reload table
                  $('#createForm')[0].reset();// reset form

                  $('#calendar').fullCalendar('refetchEvents'); // reload calendar
                  $('#createAccount').modal('hide'); // hide
                 }         
              }

          });

    }
  

  }


 
  


 }

 function edit(id){


  var base_url = "<?= base_url();?>";
  var url =  base_url +"event/editPreview";

  if( id !=null || id !="" ){

     $.ajax({
              url: url, // Url to which the request is send
              type: "POST",             // Type of request to be send, called as method
              data: {id:id}, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
              dataType: 'json',
              success: function(data)   // A function to be called if request succeeds
              {
                 if(data){
                  $('#eeventname').val(data[0].eventName);
                  $('#eeventLocation').val(data[0].eventLocation);
                  $('#eeventPoints').val(data[0].eventPoints);
                  $('#eeventStart').val(data[0].eventStart);
                  $('#eeventEnd').val(data[0].eventEnd);
                  $('#eid').val(data[0].id);
                  $('#editAccount').modal('show');
                 }         
              }

          });

  }


  
 }

 function editSave(){

  if($("#editForm").valid()){

  var eventName = $('#eeventname').val();
  var eventLocation  = $('#eeventLocation').val();
  var eventPoints  = $('#eeventPoints').val();
  var eventStart  = $('#eeventStart').val();

  var eventEnd  = $('#eeventEnd').val();

  var id = $('#eid').val();

  var base_url = "<?= base_url();?>";
  var url =  base_url +"event/editSave";


  if(id !=null && eventName !=null && eventLocation !=null && eventPoints!=null && eventStart !=null && eventEnd !=null || eventName !="" && eventLocation !="" && eventPoints!="" && eventStart !=""  && eventEnd !="" && id !=""){


      Swal({
            title: 'Save Changes?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Update it!'
          }).then((result) => {
            if (result.value) {
                $.ajax({
                  url: url, // Url to which the request is send
                  type: "POST",             // Type of request to be send, called as method
                  data: {id:id,eventName:eventName,eventLocation:eventLocation,eventPoints:eventPoints,eventStart:eventStart,eventEnd:eventEnd}, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                  dataType: 'json',
                  success: function(data)   // A function to be called if request succeeds
                  {
                     if(data==1){

                       Swal(
                              'Updated!',
                              'The Event has been successfully updated',
                              'success'
                              )

                      $('#events').DataTable().ajax.reload();//reload table
                      $('#calendar').fullCalendar('refetchEvents'); // reload calendar
                      $('#editForm')[0].reset();// reset form
                      $('#editAccount').modal('hide'); // hide
                     }         
                  }

              });

          
            }
          });
     

    }

  }

  

 }

 function activate_account(id){

  var base_url = "<?= base_url();?>";
  var url =  base_url +"event/activate";

  if( id !=null || id !="" ){

    Swal({
      title: 'Are you sure?',
      text: "This might cause changes on this event!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, activate it!'
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

                
                       Swal(
                              'Activated!',
                              'The Event has been successfully activated',
                              'success'
                              )

                      $('#events').DataTable().ajax.reload();//reload table
                      $('#calendar').fullCalendar('refetchEvents'); // reload calendar
                     

                     
                     }         
                  }

              });

      
      }
    })









  }
  
 }

 function deactivate_account(id){

  var base_url = "<?= base_url();?>";
  var url =  base_url +"event/deactivate";

  if( id !=null || id !="" ){


   
    Swal({
      title: 'Are you sure?',
      text: "This might cause changes on this event!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, deactivate it!'
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


                   Swal(
                          'Deactivated!',
                          'The Event has been successfully deactivated',
                          'success'
                          )


                  $('#events').DataTable().ajax.reload();//reload table
                  $('#calendar').fullCalendar('refetchEvents'); // reload calendar
                  
                 
                 }         
              }

          });

      
      }
    });






    

  }
  
 }

  function deleteAccount(id){

  var base_url = "<?= base_url();?>";
  var url =  base_url +"event/deleteAccount";

  if( id !=null || id !="" ){



 Swal({
      title: 'Are you sure?',
      text: "You wont able to revert this!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
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

                  Swal(
                          'Deleted!',
                          'The Event has been successfully deleted',
                          'success'
                          )

                  $('#events').DataTable().ajax.reload();//reload table
                  $('#calendar').fullCalendar('refetchEvents'); // reload calendar
                  
                 
                 }         
              }

          });

      
      }
    });






  }
  
 }


 function attendance(id){

  var base_url = "<?= base_url();?>";
  var url =  base_url +"dashboard/selectattendance";

  if( id !=null || id !="" ){


 Swal({
      title: 'View Registered Students?',
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
                  window.location.href = base_url+"dashboard/attendance"

                  
                  
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

<script type="text/javascript">


    $(function () {
               
                $('.datetimepicker').datetimepicker({
                  debug:true,
                  format: 'YYYY-MM-DD HH:mm:ss',
                  icons: {
                      time: "fa fa-clock-o",
                      date: "fa fa-calendar",
                      up: "fa fa-chevron-up",
                      down: "fa fa-chevron-down",
                      previous: 'fa fa-chevron-left',
                      next: 'fa fa-chevron-right',
                      today: 'fa fa-screenshot',
                      clear: 'fa fa-trash',
                      close: 'fa fa-remove'
                  },
                    defaultDate: null

              }).on('change', function() {
                  $(this).valid();  // triggers the validation test
                  // '$(this)' refers to '$("#datepicker")'
              });
            });

 </script>
