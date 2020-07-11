<script >  

 $(document).ready(function(){

      var dataTable = $('#accounts').DataTable({   
          dom: 'Brtip',
          lengthChange: false,
          paging:true,
          "pageLength":1200,
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
                url:"<?php echo base_url(); ?>attendance/fetch_user/<?php echo $_SESSION['eventID'];?>",  
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


 





</script>