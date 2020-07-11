<script >  

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
  


      var dataTable = $('#accounts').DataTable({   
          dom: 'Brtip',
          lengthChange: false,
        /*buttons: [ 
        {extend: 'copy', exportOptions: {
                    columns: ':visible'
                }},
        {extend:'excel',exportOptions: {
                    columns: ':visible'
                }},{extend:'pdf',exportOptions: {
                    columns: ':visible'
                }}, 'colvis' ],*/
           "processing":true,  
           "serverSide":true,
           "responsive":true,
           "autoWidth": false,
           "ajax":{  
                url:"<?php echo base_url(); ?>users/fetch_user",  
                type:"POST"  
           },
           columnDefs: [
        { responsivePriority: 1, targets: 1 },
        { responsivePriority: 2, targets: 4 }
]
           ,    
           

      });  

      $('#dataTable').resize();
    $('#searchBox').keyup(function(){
      dataTable.search($(this).val()).draw() ;
})




});

//done
 function createSave(){
  if($("#createForm").valid()){
  var firstname = $('#firstname').val();
  var lastname  = $('#lastname').val();
  var username  = $('#username').val();
  var password  = $('#password').val();
  var repassword  = $('#repassword').val();
  var type      = $('#type').val();

  var base_url = "<?= base_url();?>";
  var url =  base_url +"users/createSave";


  if(firstname !=null && lastname !=null && username!=null && password !=null && type !=null || firstname !="" && lastname !="" && username!="" && password !="" && type !="" ){

     $.ajax({
              url: url, // Url to which the request is send
              type: "POST",             // Type of request to be send, called as method
              data: {firstname:firstname,lastname:lastname,username:username,password:password,type:type}, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
              dataType: 'json',
              success: function(data)   // A function to be called if request succeeds
              {
                 if(data==1){
                      Swal(
                          'Created!',
                          'The User has been successfully save',
                          'success'
                          )
                  $('#accounts').DataTable().ajax.reload();//reload table
                  $('#createForm')[0].reset();// reset form
                  $('#createAccount').modal('hide'); // hide
                 }         
              }

          });

  }

 
  
  }

 }

 function edit(id){


  var base_url = "<?= base_url();?>";
  var url =  base_url +"users/editPreview";

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
                  $('#eusername').val(data[0].username);
                  $('#epassword').val(data[0].password);
                  $('#erepassword').val(data[0].password);
                  $('#etype').val(data[0].type);
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
  var username  = $('#eusername').val();
  var password  = $('#epassword').val();
  var type      = $('#etype').val();

  var id = $('#eid').val();

  var base_url = "<?= base_url();?>";
  var url =  base_url +"users/editSave";


  if( eid !=null && firstname !=null && lastname !=null && username!=null && password !=null && type !=null || firstname !="" && lastname !="" && username!="" && password !="" && type !="" && eid!=""){


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
                  data: {firstname:firstname,lastname:lastname,username:username,password:password,type:type,id:id}, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                  dataType: 'json',
                  success: function(data)   // A function to be called if request succeeds
                  {
                     if(data==1){

                       Swal(
                              'Updated!',
                              'The User has been successfully updated',
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
  var url =  base_url +"users/activate";

  if( id !=null || id !="" ){

      Swal({
      title: 'Are you sure?',
      text: "This might cause changes on this user!",
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
                              'The User has been successfully activated',
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
  var url =  base_url +"users/deactivate";

  if( id !=null || id !="" ){

     
      Swal({
      title: 'Are you sure?',
      text: "This might cause changes on this User!",
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
                              'The User has been successfully deactivated',
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
  var url =  base_url +"users/deleteAccount";

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
                              'The User has been successfully deleted',
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