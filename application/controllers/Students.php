
<?php 

class Students extends CI_Controller {

	//DATATABLE SCRIPT API
function fetch_user(){  
		$this->load->model("students_model");  
		$fetch_data = $this->students_model->make_datatables(); 
		$data = array();  
		foreach($fetch_data as $row)  
		{  
			 $sub_array = array();
			 $sub_array[] =$row->studentNumber;
			 $sub_array[] =$row->lastname." ". $row->firstname ;
			 $sub_array[] =$row->yearName;
			 $sub_array[] =$row->sectionName;

			 $sub_array[] =$row->email;
			 $sub_array[] =$row->contact;


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
			 "recordsTotal"          =>      $this->students_model->get_all_data(),  
			 "recordsFiltered"     =>     $this->students_model->get_filtered_data(),  
			 "data"                    =>     $data  
		);



		echo json_encode($output);
 	}

 	function selectByProgram(){

 		$section = array('programID' => $this->input->post('id'));

		$this->load->model("students_model"); 
		$fetch_data = $this->students_model->selectedSection($section); 
		
		$data = array();  
		foreach($fetch_data as $row)  
		{  

		$sub_array = array(
		'id'=>$row->id,
		'programID'=>$row->programID,
		'sectionName'=>$row->sectionName
		);


		$data[] = $sub_array;  
		}



		echo json_encode($data);

 	}


 	 public function createSave()
   {
	   	// call the ajax pass data into array
	   	$account = array(
	   		'firstname' => $this->input->post('firstname'),
	   		'lastname' => $this->input->post('lastname'), 
	   		'studentNumber' => $this->input->post('studentNumber'), 
	   		'programsID' => $this->input->post('program'),
	   		'yearID' => $this->input->post('year'),
	   		'sectionID' => $this->input->post('section'),
	   		'contact' => $this->input->post('contact'),
	   		'email' => $this->input->post('email'),  
			'active' => 1   
	   	);
	   	 // load model
		$this->load->model('students_model'); 
	   	$data = $this->students_model->createSave($account);
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
	   		'studentNumber' => $this->input->post('studentNumber'), 
	   		'programsID' => $this->input->post('program'),
	   		'yearID' => $this->input->post('year'),
	   		'sectionID' => $this->input->post('section'),  
	   		'contact' => $this->input->post('contact'),
	   		'email' => $this->input->post('email'),  
			'active' => 1   
	   	);
		   	$id = $this->input->post('id');
		   	 // load model
			$this->load->model('students_model'); 
		   	$data = $this->students_model->editSave($account,$id);
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
		$this->load->model('students_model'); 
	   	$data = $this->students_model->editPreview($id);
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
		$this->load->model('students_model'); 
	   	$data = $this->students_model->changeStatus($account,$id);
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
		$this->load->model('students_model'); 
	   	$data = $this->students_model->changeStatus($account,$id);
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

		 $this->load->model('students_model');
		 
		 $data=$this->students_model->delete_account($account);
		 if($data){ // calling the model register_user from Accounts_model 
			echo "1";
		 	//passing the result of model to view by this controller
		 }else{
		 	echo "0";
		 }


	}




}
?>