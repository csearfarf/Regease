<?php 

class Users extends CI_Controller {

//DATATABLE SCRIPT API
function fetch_user(){  
		$this->load->model("users_model");  
		$fetch_data = $this->users_model->make_datatables(); 
		$data = array();  
		foreach($fetch_data as $row)  
		{  
			 $sub_array = array();
			 
			 $sub_array[] =$row->firstname." ". $row->lastname;
			 $sub_array[] =$row->username;
			 if($row->type==1){
			 	$sub_array[] = "Admin";
			 }
			 else if($row->type==2){
			 	$sub_array[] = "Devcom";
			 }
			 else{
			    $sub_array[] = "Alien";
			 }

			 $sub_array[] =($row->active==1)? "Activated":"Deactivated";
 			 $sub_array[] =($row->active==1)? 
 			 '		<button type="button" rel="tooltip" title="Update" class="btn btn-info btn-link btn-sm" id="'.$row->id.'" onclick="edit('.$row->id.')">
                                <i class="material-icons">edit</i>
                              </button>
                              <button type="button" rel="tooltip" title="Disable" class="btn btn-danger btn-link btn-sm" id="'.$row->id.'" onclick="deactivate_account('.$row->id.')">
                                <i class="material-icons">close</i>
                              </button>
                              <button type="button" rel="tooltip" title="Delete" class="btn btn-warning btn-link btn-sm" id="'.$row->id.'" onclick="deleteAccount('.$row->id.')">
                                <i class="material-icons">delete</i>
                              </button>
'
                :
                '<button type="button" rel="tooltip" title="Update" class="btn btn-info btn-link btn-sm" id="'.$row->id.'" onclick="edit('.$row->id.')" >
                                <i class="material-icons">edit</i>
                              </button>
                              <button type="button" rel="tooltip" title="Activate" class="btn btn-primary btn-link btn-sm" id="'.$row->id.'" onclick="activate_account('.$row->id.')">
                                <i class="material-icons">check</i>
                              </button>
                               <button type="button" rel="tooltip" title="Delete" class="btn btn-warning btn-link btn-sm" id="'.$row->id.'" onclick="deleteAccount('.$row->id.')">
                                <i class="material-icons">delete</i>
                              </button>
                              ';




				


                	
				
			 $data[] = $sub_array;  
		}  
		$output = array(  
			 "draw"                    =>     intval($_POST["draw"]),  
			 "recordsTotal"          =>      $this->users_model->get_all_data(),  
			 "recordsFiltered"     =>     $this->users_model->get_filtered_data(),  
			 "data"                    =>     $data  
		);



		echo json_encode($output);
 	}



   public function createSave()
   {
	   	// call the ajax pass data into array
	   	$account = array(
	   		'firstname' => $this->input->post('firstname'),
	   		'lastname' => $this->input->post('lastname'), 
	   		'username' => $this->input->post('username'), 
	   		'password' => md5($this->input->post('password')),
	   		'active' => 1 ,
	   		'type' =>  $this->input->post('type')   
	   	);
	   	 // load model
		$this->load->model('users_model'); 
	   	$data = $this->users_model->createSave($account);
	   	if($data){
	   		echo "1";
	   	}
	   	else{
	   		echo "0";
	   	}

   }

   public function editSave()
   {
	   		// call the ajax pass data into array
	   	$account = array(
	   		'firstname' => $this->input->post('firstname'),
	   		'lastname' => $this->input->post('lastname'), 
	   		'username' => $this->input->post('username'), 
	   		'password' => md5($this->input->post('password')),
	   		'active' => 1 ,
	   		'type' =>  $this->input->post('type')   
	   	);
	   	$id = $this->input->post('id');
	   	 // load model
		$this->load->model('users_model'); 
	   	$data = $this->users_model->editSave($account,$id);
	   	if($data){
	   		echo "1";
	   	}
	   	else{
	   		echo "0";
	   	}

   }

   public function editPreview()
   {
		$id = array('id'=>$this->input->post('id'));
	   	 // load model
		$this->load->model('users_model'); 
	   	$data = $this->users_model->editPreview($id);
	   	if($data){
	   		echo json_encode($data);
	   	}else{
	   		echo "0";
	   	}

   }

   public function activate()
   {

	   	// call the ajax pass data into array
	   	$account = array(
	   		'active' => 1 ,
	   	);
	   	$id = $this->input->post('id');
	   	 // load model
		$this->load->model('users_model'); 
	   	$data = $this->users_model->changeStatus($account,$id);
	   	if($data){
	   		echo "1";
	   	}
	   	else{
	   		echo "0";
	   	}

   	
   }

   public function deactivate()
   {

	   		// call the ajax pass data into array
	   	$account = array(
	   		'active' => 0 ,
	   	);
	   	$id = $this->input->post('id');
	   	 // load model
		$this->load->model('users_model'); 
	   	$data = $this->users_model->changeStatus($account,$id);
	   	if($data){
	   		echo "1";
	   	}
	   	else{
	   		echo "0";
	   	}

   	
   }

   public function deleteAccount() //ajax function
	{
		$account=array(
		 'id'=>$this->input->post('id')
		);

		 $this->load->model('users_model');
		 
		 $data=$this->users_model->delete_account($account);
		 if($data){ // calling the model register_user from Accounts_model 
			echo "1";
		 	//passing the result of model to view by this controller
		 }else{
		 	echo "0";
		 }


	}


}
?>