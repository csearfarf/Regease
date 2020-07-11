

 $(document).ready(function(){

 // validator

      var dataTable = $('#accounts').DataTable({   
          dom: 'Bfrtip',
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




});


 function createSave(){
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
                  alert("Successfully Save ! ");
                  $('#accounts').DataTable().ajax.reload();//reload table
                  $('#createForm')[0].reset();// reset form
                  $('#createAccount').modal('hide'); // hide
                 }         
              }

          });

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
  var firstname = $('#efirstname').val();
  var lastname  = $('#elastname').val();
  var username  = $('#eusername').val();
  var password  = $('#epassword').val();
  var type      = $('#etype').val();

  var id = $('#eid').val();

  var base_url = "<?= base_url();?>";
  var url =  base_url +"users/editSave";


  if( eid !=null && firstname !=null && lastname !=null && username!=null && password !=null && type !=null || firstname !="" && lastname !="" && username!="" && password !="" && type !="" && eid!=""){

     $.ajax({
              url: url, // Url to which the request is send
              type: "POST",             // Type of request to be send, called as method
              data: {firstname:firstname,lastname:lastname,username:username,password:password,type:type,id:id}, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
              dataType: 'json',
              success: function(data)   // A function to be called if request succeeds
              {
                 if(data==1){
                  alert("Successfully Updated ! ");

                  $('#accounts').DataTable().ajax.reload();//reload table
                  $('#editForm')[0].reset();// reset form
                  $('#editAccount').modal('hide'); // hide
                 }         
              }

          });

  }

 
  


 }

 function activate_account(id){

  var base_url = "<?= base_url();?>";
  var url =  base_url +"users/activate";

  if( id !=null || id !="" ){

     $.ajax({
              url: url, // Url to which the request is send
              type: "POST",             // Type of request to be send, called as method
              data: {id:id}, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
              dataType: 'json',
              success: function(data)   // A function to be called if request succeeds
              {
                 if(data){

                  alert("Activated !");

                  $('#accounts').DataTable().ajax.reload();//reload table
                 

                 
                 }         
              }

          });

  }
  
 }

 function deactivate_account(id){

  var base_url = "<?= base_url();?>";
  var url =  base_url +"users/deactivate";

  if( id !=null || id !="" ){

     $.ajax({
              url: url, // Url to which the request is send
              type: "POST",             // Type of request to be send, called as method
              data: {id:id}, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
              dataType: 'json',
              success: function(data)   // A function to be called if request succeeds
              {
                 if(data){

                  alert("Deactivated !");
                  
                 
                 }         
              }

          });

  }
  
 }



