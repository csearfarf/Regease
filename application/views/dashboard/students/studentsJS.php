<script type="text/javascript" language="javascript" >  

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



 // validator

      var dataTable = $('#accounts').DataTable({   
          dom: 'Brtip',
          lengthChange: false,
         buttons: [
        {extend:'copy',exportOptions: {
                    columns: ':visible'
                },
                exportOptions: {
                   columns: [0,1,2,3,4]
                }
        }, 
        {extend:'excel',exportOptions: {
                    columns: ':visible'
                },
                exportOptions: {
                   columns: [0,1,2,3,4]
                }
        },
        {extend:'print',exportOptions: {
                    columns: ':visible'
                },
                exportOptions: {
                   columns: [0,1,2,3,4]
                }
        }, 
                ],
           "processing":true,  
           "serverSide":true,
           "responsive":true,
           "autoWidth": false,
           "ajax":{  
                url:"<?php echo base_url(); ?>students/fetch_user",  
                type:"POST"  
           },
           columnDefs: [
        { responsivePriority: 1, targets: 1 },
        { responsivePriority: 2, targets: 5 }
]
           ,  language: {
          paginate: {
            next: '>', // or &#8594;
            previous: '<' // or &#8592;
          }
        },    
           

      });  

      $('#dataTable').resize();

         $('#searchBox').keyup(function(){
      dataTable.search($(this).val()).draw() ;
})






});




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
      var url =  base_url +"students/createSave";

      if( firstname !=null && lastname !=null && studentNumber!=null && program !=null && year !=null  && section!=null || firstname !="" && lastname !="" && studentNumber!="" && program !="" && year !="" && section!="" ){



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
                              'The Student record success saved',
                              'success'
                              )

                     
                        $('#accounts').DataTable().ajax.reload();//reload table
                        $('#createForm')[0].reset();// reset form
                        $('#createAccount').modal('hide'); // hide
                     }         
                  }

              });

          
            }
          });





  }

  }
  

 
  


 }

 function edit(id){


  var base_url = "<?= base_url();?>";
  var url =  base_url +"students/editPreview";

  if( id !=null || id !="" ){

     $.ajax({
              url: url, // Url to which the request is send
              type: "POST",             // Type of request to be send, called as method
              data: {id:id}, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
              dataType: 'json',
              success: function(data)   // A function to be called if request succeeds
              {
                 if(data){

                 
                  $('#efirstname').val(data[0].firstname);
                  $('#elastname').val(data[0].lastname);
                  $('#estudentNumber').val(data[0].studentNumber);

                  $('#econtact').val(data[0].contact);
                  $('#eemail').val(data[0].email);
                  
                  $('#eprogram').val(data[0].programsID);
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
                            $('#esection').val(data[0].sectionID);


                        }

                    }
                });

                  $('#eyear').val(data[0].yearID);
                  $('#eid').val(data[0].id);
                  $('#editAccount').modal('show');
                 }         
              }

          });

  }


  
 }

 function editSave(){
  if($("#editForm").valid()){
  var firstname = $('#efirstname').val();
  var lastname  = $('#elastname').val();
  var studentNumber  = $('#estudentNumber').val();
  var program  = $('#eprogram').val();
  var year  = $('#eyear').val();
  var section      = $('#esection').val();
  var contact      = $('#econtact').val();
  var email      = $('#eemail').val();

  var id = $('#eid').val();

  var base_url = "<?= base_url();?>";
  var url =  base_url +"students/editSave";


  if( id !=null && firstname !=null && lastname !=null && studentNumber!=null && program !=null && year !=null  && section!=null || firstname !="" && lastname !="" && studentNumber!="" && program !="" && year !="" && section  && id!=""){



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
                  data: {firstname:firstname,lastname:lastname,studentNumber:studentNumber,program:program,year:year,section:section,contact:contact,email:email,id:id}, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                  dataType: 'json',
                  success: function(data)   // A function to be called if request succeeds
                  {
                     if(data==1){

                       Swal(
                              'Updated!',
                              'The Student has been successfully updated',
                              'success'
                              )

                     
                        $('#accounts').DataTable().ajax.reload();//reload table
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
  var url =  base_url +"students/activate";

  if( id !=null || id !="" ){

      Swal({
      title: 'Are you sure?',
      text: "This might cause changes on this student!",
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
                              'The Student has been successfully activated',
                              'success'
                              )

                      $('#accounts').DataTable().ajax.reload();//reload table
                     
                     

                     
                     }         
                  }

              });

      
      }
    })

  }
  
 }

 function deactivate_account(id){

  var base_url = "<?= base_url();?>";
  var url =  base_url +"students/deactivate";

  if( id !=null || id !="" ){

     
      Swal({
      title: 'Are you sure?',
      text: "This might cause changes on this student!",
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
                              'The Student has been successfully deactivated',
                              'success'
                              )

                      $('#accounts').DataTable().ajax.reload();//reload table
                     
                     

                     
                     }         
                  }

              });

      
      }
    })

  }
  
 }

 function deleteAccount(id){

  var base_url = "<?= base_url();?>";
  var url =  base_url +"students/deleteAccount";

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
                              'The Student has been successfully deleted',
                              'success'
                              )

                      
                      $('#accounts').DataTable().ajax.reload();//
                     
                     }         
                  }

              });

          
          }
        });

  }
  
 }








</script>