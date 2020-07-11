

<script >  
    
  

 $(document).ready(function(){


  setFormValidation('#registerForm');

   $("#registerForm").submit(function(e) {
    e.preventDefault(); // [prevents submitting form to do ajax]
});

   


    setFormValidation('#createForm');
   $("#createForm").submit(function(e) {
    e.preventDefault(); // [prevents submitting form to do ajax]
});


     setFormValidation('#eupdateForm');
   $("#eupdateForm").submit(function(e) {
    e.preventDefault(); // [prevents submitting form to do ajax]
});


      setFormValidation('#manualForm');
   $("#manualForm").submit(function(e) {
    e.preventDefault(); // [prevents submitting form to do ajax]
});
   

      function setFormValidation(id) {
        $(id).validate({
          highlight: function(element) {
            $(element).closest('.form-group').removeClass('has-success').addClass('has-danger');
          },
          success: function(element) {
            $(element).closest('.form-group').removeClass('has-danger').addClass('has-success');
          },
          errorPlacement: function(error, element) {
            $(element).closest('.form-group').append(error);
          },
        });
      }



     // selection by section
      $("#program").change(function(){
        var id = $(this).val();

        $.ajax({
            url: '<?php echo base_url(); ?>students/selectByProgram',
            type: 'post',
            data: {id:id},
            dataType: 'json',
            success:function(response){

                var len = response.length;

                $("#section").empty();
                for( var i = 0; i<len; i++){
                    var id = response[i]['id'];
                    var name = response[i]['sectionName'];
                    
                    $("#section").append("<option value='"+id+"'>"+name+"</option>");

                }
            }
        });
    });


     // selection by section
      $("#eprogram").change(function(){
        var id = $(this).val();

        $.ajax({
            url: '<?php echo base_url(); ?>students/selectByProgram',
            type: 'post',
            data: {id:id},
            dataType: 'json',
            success:function(response){

                var len = response.length;

                $("#esection").empty();
                for( var i = 0; i<len; i++){
                    var id = response[i]['id'];
                    var name = response[i]['sectionName'];
                    
                    $("#esection").append("<option value='"+id+"'>"+name+"</option>");

                }
            }
        });
    });


      // selection by section
      $("#mprogram").change(function(){
        var id = $(this).val();

        $.ajax({
            url: '<?php echo base_url(); ?>students/selectByProgram',
            type: 'post',
            data: {id:id},
            dataType: 'json',
            success:function(response){

                var len = response.length;

                $("#msection").empty();
                for( var i = 0; i<len; i++){
                    var id = response[i]['id'];
                    var name = response[i]['sectionName'];
                    
                    $("#msection").append("<option value='"+id+"'>"+name+"</option>");

                }
            }
        });
    });


      var dataTable = $('#accounts').DataTable({   
          dom: 'Bfrtip',
          lengthChange: false,
         buttons: [
        {extend:'copy',exportOptions: {
                    columns: ':visible'
                },
                exportOptions: {
                   columns: [0,1,2,3,5]
                }
        }, 
        {extend:'excel',exportOptions: {
                    columns: ':visible'
                },
                exportOptions: {
                   columns: [0,1,2,3,5]
                }
        },
        {extend:'print',exportOptions: {
                    columns: ':visible'
                },
                exportOptions: {
                   columns: [0,1,2,3,5]
                }
        }, 
                ],
           "processing":true,  
           "serverSide":true,
           "responsive":true,
           "autoWidth": false,
           "ajax":{  
                url:"<?php echo base_url(); ?>registration/fetch_user/<?php echo $_SESSION['registrationselectedEvent'];?>",  
                type:"POST"  
           },
           columnDefs: [
        { responsivePriority: 1, targets: 1 },
        { responsivePriority: 2, targets: 4 }
]
           ,    
           

      });  

      $('#dataTable').resize();





});






function register(){
  // check first if student number is already registered
  // 1. check if student data is incomplete  
  // register

  if($("#registerForm").valid()){

  var studentNumber = $('#searchstudentNumber').val();
  var base_url = "<?= base_url();?>";
  var url =  base_url +"registration/checkStudent";
  if(studentNumber !=null || studentNumber!="" ){
       $.ajax({
                  url: url, // Url to which the request is send
                  type: "POST",             // Type of request to be send, called as method
                  data: {studentNumber:studentNumber}, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                  dataType: 'json',
                  success: function(data)   // A function to be called if request succeeds
                  {
                     if(data){
                     if(data.type==1){
                        Swal(
                              'Ops!',
                              data.message,
                              'warning'
                              )
                        $('#studentNumber').val("");
                        $('#studentNumber').focus();



                      }else if(data.type==2){
                          


                        $('#efirstname').val(data.firstname);
                          $('#elastname').val(data.lastname);
                          $('#estudentNumber').val(data.studentNumber);
                          
                          $('#eprogram').val(data.programsID);
                          $('#econtact').val(data.contact);
                          $('#eemail').val(data.email);
                          var id=$('#eprogram').val();

                          $.ajax({
                            url: '<?php echo base_url(); ?>students/selectByProgram',
                            type: 'post',
                            data: {id:id},
                            dataType: 'json',
                            success:function(response){

                                var len = response.length;

                                $("#esection").empty();
                                for( var i = 0; i<len; i++){
                                    var id = response[i]['id'];
                                    var name = response[i]['sectionName'];
                                    
                                    $("#esection").append("<option value='"+id+"'>"+name+"</option>");
                                    $('#esection').val(data.sectionID);


                                }

                            }
                        });
                          $('#eyear').val(data.yearID);
                          $('#eid').val(data.studentID);
                          
                          $('#eupdateStudent').modal('show');
                          $("#eupdateStudent").appendTo("body");


                      }else if(data.type==3){
                         // new student
                          $('#studentNumber').val(studentNumber);
                          $('#createStudent').modal('show');
                          $("#createStudent").appendTo("body");


                      }
                     




                     
                     
                     }         
                  }

  });

  }




  }


 




  

}

 function createSave(){

  if($("#createForm").valid()){

      var firstname = $('#firstname').val();
      var lastname  = $('#lastname').val();
      var studentNumber  = $('#studentNumber').val();
      var program  = $('#program').val();
      var year  = $('#year').val();
      var section      = $('#section').val();

      var contact      = $('#contact').val();
      var email      = $('#email').val();

      var base_url = "<?= base_url();?>";
      var url =  base_url +"registration/createSave";

      if(firstname !=null && lastname !=null && studentNumber!=null && program !=null && year !=null  && section!=null || firstname !="" && lastname !="" && studentNumber!="" && program !="" && year !="" && section){



    Swal({
            title: 'Save Changes?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, save it!'
          }).then((result) => {
            if (result.value) {
                $.ajax({
                  url: url, // Url to which the request is send
                  type: "POST",             // Type of request to be send, called as method
                  data: {firstname:firstname,lastname:lastname,studentNumber:studentNumber,program:program,year:year,section:section,contact:contact,email:email}, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                  dataType: 'json',
                  success: function(data)   // A function to be called if request succeeds
                  {
                     if(data==1){

                       Swal(
                              'Success!',
                              'New student record successfully saved & registered to this event',
                              'success'
                              )

                     
                        $('#accounts').DataTable().ajax.reload();//reload table
                        $('#createForm')[0].reset();// reset form
                        $('#createStudent').modal('hide'); // hide



                        $('#searchstudentNumber').val("");
                        $('#searchstudentNumber').focus();
                     }         
                  }

              });

          
            }
          });





  }

  }


  

 }
 function updateSave(){
  if($("#eupdateForm").valid()){

      var firstname = $('#efirstname').val();
      var lastname  = $('#elastname').val();
      var studentNumber  = $('#estudentNumber').val();
      var program  = $('#eprogram').val();
      var year  = $('#eyear').val();
      var section = $('#esection').val();
      var id= $('#eid').val();

      var contact      = $('#econtact').val();
      var email      = $('#eemail').val();



      if(section==27 || program==9 || year==5){
         Swal(
                              'Invalid!',
                              'Please Complete Fields',
                              'warning'
        )

      }
      else{


             var base_url = "<?= base_url();?>";
            var url =  base_url +"registration/updateSave";

            if(firstname !=null && lastname !=null && studentNumber!=null && program !=null && year !=null  && section!=null || firstname !="" && lastname !="" && studentNumber!="" && program !="" && year !="" && section!="" && id!=""){



          Swal({
                  title: 'Save Changes?',
                  type: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, save it!'
                }).then((result) => {
                  if (result.value) {
                      $.ajax({
                        url: url, // Url to which the request is send
                        type: "POST",             // Type of request to be send, called as method
                        data: {firstname:firstname,lastname:lastname,studentNumber:studentNumber,program:program,year:year,section:section,contact:contact,email:email,id:id}, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                        dataType: 'json',
                        success: function(data)   // A function to be called if request succeeds
                        {
                           if(data==1){

                             Swal(
                                    'Success!',
                                    'Student record successfully updated & registered to this event',
                                    'success'
                                    )

                           
                              $('#accounts').DataTable().ajax.reload();//reload table
                              $('#eupdateForm')[0].reset();// reset form
                              $('#eupdateStudent').modal('hide'); // hide



                              $('#searchstudentNumber').val("");
                              $('#searchstudentNumber').focus();
                           }         
                        }

                    });

                
                  }
                });





        }

      }
  

     
    

  }
}




function attend(){


  if($("#eupdateForm").valid()){

   
      var id= $('#eid').val();
  

      var base_url = "<?= base_url();?>";
      var url =  base_url +"registration/attend";

      if(firstname !=null || id!=""){

         $.ajax({
                  url: url, // Url to which the request is send
                  type: "POST",             // Type of request to be send, called as method
                  data: {id:id}, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                  dataType: 'json',
                  success: function(data)   // A function to be called if request succeeds
                  {
                     if(data==1){

                       Swal(
                              'Success!',
                              'Student record successfully registered to this event',
                              'success'
                              )

                     
                        $('#accounts').DataTable().ajax.reload();//reload table
                        $('#eupdateForm')[0].reset();// reset form
                        $('#eupdateStudent').modal('hide'); // hide



                        $('#searchstudentNumber').val("");
                        $('#searchstudentNumber').focus();
                     }         
                  }

              });



  
  }
    

  }



}



function updateManual(){
  if($("#manualForm").valid()){

      var firstname = $('#mfirstname').val();
      var lastname  = $('#mlastname').val();
      var studentNumber  = $('#mstudentNumber').val();
      var program  = $('#mprogram').val();
      var year  = $('#myear').val();
      var section = $('#msection').val();

      var contact      = $('#mcontact').val();
      var email      = $('#memail').val();

      var id= $('#mid').val();

      if(section==27 || program==9 || year==5){
         Swal(
                              'Invalid!',
                              'Please Complete Fields',
                              'warning'
        )

      }
      else{

              var base_url = "<?= base_url();?>";
                var url =  base_url +"registration/manualUpdate";

                if(firstname !=null && lastname !=null && studentNumber!=null && program !=null && year !=null  && section!=null || firstname !="" && lastname !="" && studentNumber!="" && program !="" && year !="" && section!="" && id!=""){



              Swal({
                      title: 'Save Changes?',
                      type: 'warning',
                      showCancelButton: true,
                      confirmButtonColor: '#3085d6',
                      cancelButtonColor: '#d33',
                      confirmButtonText: 'Yes, save it!'
                    }).then((result) => {
                      if (result.value) {
                          $.ajax({
                            url: url, // Url to which the request is send
                            type: "POST",             // Type of request to be send, called as method
                            data: {firstname:firstname,lastname:lastname,studentNumber:studentNumber,program:program,year:year,section:section,contact:contact,email:email,id:id}, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                            dataType: 'json',
                            success: function(data)   // A function to be called if request succeeds
                            {
                               if(data==1){

                                 Swal(
                                        'Success!',
                                        'Student record successfully updated & registered to this event',
                                        'success'
                                        )

                               
                                  $('#accounts').DataTable().ajax.reload();//reload table
                                  $('#manualForm')[0].reset();// reset form
                                  $('#manualStudent').modal('hide'); // hide



                                  $('#searchstudentNumber').val("");
                                  $('#searchstudentNumber').focus();
                               }         
                            }

                        });

                    
                      }
                    });





            }



      }
   

    
    

  }
}

function cancelRegistration(){

    var id= $('#mid').val();
    var base_url = "<?= base_url();?>";
    var url =  base_url +"registration/cancelRegistration";
    if(id!=null && id!=""){

       Swal({
                      title: 'Cancel Registration?',
                      type: 'warning',
                      showCancelButton: true,
                      confirmButtonColor: '#3085d6',
                      cancelButtonColor: '#d33',
                      confirmButtonText: 'Yes, cancel it!'
                    }).then((result) => {
                      if (result.value) {
                          $.ajax({
                            url: url, // Url to which the request is send
                            type: "POST",             // Type of request to be send, called as method
                            data: {id:id}, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                            dataType: 'json',
                            success: function(data)   // A function to be called if request succeeds
                            {
                               if(data==1){

                                 Swal(
                                        'Success!',
                                        'Student record successfully cancelled',
                                        'success'
                                        )

                               
                                  $('#accounts').DataTable().ajax.reload();//reload table
                                  $('#manualForm')[0].reset();// reset form
                                  $('#manualStudent').modal('hide'); // hide



                                  $('#searchstudentNumber').val("");
                                  $('#searchstudentNumber').focus();
                               }         
                            }

                        });

                    
                      }
                    });


    }

}



</script>

<!--TRICKY-->

<script>
          $(document).ready(function(){
              /////

              function getManual(view = ''){


            var base_url = "<?= base_url();?>";
            var url =  base_url +"registration/manualRegistration";
            var view=true;
            $.ajax({
                          url: url, // Url to which the request is send
                          type: "POST",
                          data:{view:view},             // Type of request to be send, called as method
                
                          dataType: 'json',
                          success: function(data)   // A function to be called if request succeeds
                          {
                             if(data){

                                if(data[0].firstname ==null || data[0].lastname ==null  || data[0].studentNumber==null || data[0].programsID==null || data[0].sectionID ==27 || data[0].yearID==null || data[0].contact==null || data[0].email==""  || data[0].contact==""){


                                  $('#mfirstname').val(data[0].firstname);
                                  $('#mlastname').val(data[0].lastname);
                                  $('#mstudentNumber').val(data[0].studentNumber);
                                  $('#mprogram').val(data[0].programsID);
                                  $('#mcontact').val(data[0].contact);
                                  $('#memail').val(data[0].email);
                                  var id=$('#mprogram').val();

                                  $.ajax({
                                    url: '<?php echo base_url(); ?>students/selectByProgram',
                                    type: 'post',
                                    data: {id:id},
                                    dataType: 'json',
                                    success:function(response){

                                        var len = response.length;

                                        $("#msection").empty();
                                        for( var i = 0; i<len; i++){
                                            var id = response[i]['id'];
                                            var name = response[i]['sectionName'];
                                            
                                            $("#msection").append("<option value='"+id+"'>"+name+"</option>");
                                            $('#msection').val(data[0].sectionID);


                                        }

                                    }
                                });
                                  $('#myear').val(data[0].yearID);
                                  $('#mid').val(data[0].id);
                                  $('#manualStudent').modal('show');
                                  $("#manualStudent").appendTo("body");
                                  myStopFunction();

                                }




                             }         
                          }

                      });





            }

              $('#manualStudent').on('hidden.bs.modal', function () {
                  // do something…
                  myStartFunction();
              });


              var myVar;
              function myTimer() {
                   getManual();
              }

              function myStopFunction() {
                  clearInterval(myVar);
              }
              function myStartFunction() {
                  myVar = setInterval(myTimer, 2000);
              }
              myStartFunction();




          });


</script>
  <script type="text/javascript">
    $(document).ready(function(){
      $('.customer-logos').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 700, //7 millisecons
        arrows: false,
        dots: false,
          pauseOnHover: true,
          responsive: [{
          breakpoint: 768,
          settings: {
            slidesToShow: 4
          }
        }, {
          breakpoint: 520,
          settings: {
            slidesToShow: 3
          }
        }]
      });
    });
  </script>


