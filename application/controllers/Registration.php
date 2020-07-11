<?php 
class Registration extends CI_Controller{


function fetch_user($data){  
		$eventID=$data;
		$this->load->model("registration_model");  
		$fetch_data = $this->registration_model->make_datatables($eventID); 
		$data = array();  
		foreach($fetch_data as $row)  
		{  
			 $sub_array = array();
			 $sub_array[] =$row->studentNumber;
			 $sub_array[] =$row->firstname." ". $row->lastname ;
			 $sub_array[] =$row->yearName;
			 $sub_array[] =$row->sectionName;
			 $sub_array[] =$row->ufirstname." ". $row->ulastname;
			 $sub_array[] =date("g:i a",strtotime($row->time_in));

			 
				
			 $data[] = $sub_array;  
		}  
		$output = array(  
			 "draw"                    =>     intval($_POST["draw"]),  
			 "recordsTotal"          =>      $this->registration_model->get_all_data(),  
			 "recordsFiltered"     =>     $this->registration_model->get_filtered_data(),  
			 "data"                    =>     $data  
		);



		echo json_encode($output);
 	}

 public function checkStudent(){
  // check first if student number is already registered
  // 1. check if student data is incomplete  
  // register


 	$userID = $this->session->userID;
 	$studentNumber=$this->input->post('studentNumber'); // student number of student
	$selectedEvent = $this->session->registrationselectedEvent; //selected event

 	$student = array('studentNumber' => $studentNumber);
	$this->load->model("registration_model");
	$current_time = date('H:i:s');


	$studentID="";
	$studentNumber="";
	$firstname="";
	$lastname="";
	$middlename="";
	$sectionID="";
	$yearID="";
	$programsID="";
	$email="";
	$contact="";
	$data = $this->registration_model->getID($student);
	if($data){
		// id already existing 
		foreach ($data as $row) {
		$studentID=$row->id;
		$studentNumber=$row->studentNumber;
		$firstname=$row->firstname;
		$lastname=$row->lastname;
		$middlename=$row->middlename;
		$sectionID=$row->sectionID;
		$yearID=$row->yearID;
		$programsID=$row->programsID;
		$email=$row->email;
		$contact=$row->contact;

		}

		//echo $studentID;
		$eventstudent=array('studentID'=>$studentID,'eventID'=>$selectedEvent);
		$data = $this->registration_model->checkStudent($eventstudent);
		if($data){
			//already registered to event
			$response['type']="1"; 
			$response['message']="Student is already registered in this event";


		}else{
			// registration in attendance
	
			$response['type']="2";
			$response['studentNumber']=$studentNumber;
			$response['lastname']=$lastname;
			$response['firstname']=$firstname;
			$response['middlename']=$middlename;
			$response['sectionID']=$sectionID;
			$response['yearID']=$yearID;
			$response['programsID']=$programsID;
			$response['studentID']=$studentID ;
			$response['email']=$email;
			$response['contact']=$contact ;
		

			
			
		}


	}else{
		// student number added to attendance & student table
		$response['type']="3"; 
		$response['message']="Doesnt Exist";






		 
	} 

	echo json_encode($response);

 }

 public function createSave()
 {

		$current_time = date('H:i:s');
		$selectedEvent = $this->session->registrationselectedEvent; //selected event
 	    $userID = $this->session->userID;
   	
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
		$this->load->model('registration_model'); 
	   	$data = $this->registration_model->createSave($account);

	   	if($data){
	   		
	   		$studentID=$data;

	   		$registerStudent= array(
										'eventID'=>$selectedEvent,
										'studentID'=>$studentID, // last inserted id
										'time_in'=>$current_time,
										'registratorID'=>$userID
									);


			$this->load->model("mobile_model");
			$status=$this->mobile_model->registerStudent($registerStudent);
			if($status){
				echo "1";
			}else{
				echo "0";
			}

	   	}
	   	else{
	   		echo "0";
	   	}

 }



  public function updateSave()
 {

		$current_time = date('H:i:s');
		$selectedEvent = $this->session->registrationselectedEvent; //selected event
 	    $userID = $this->session->userID;
   	
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

	   	$studentID=$this->input->post('id');
	   	 // load model
		$this->load->model('registration_model'); 
	   	$data = $this->registration_model->editSave($account,$studentID);

	   	if($data){
	   		

	   		$registerStudent= array(
										'eventID'=>$selectedEvent,
										'studentID'=>$studentID, // last inserted id
										'time_in'=>$current_time,
										'registratorID'=>$userID
									);


			$this->load->model("mobile_model");
			$status=$this->mobile_model->registerStudent($registerStudent);
			if($status){
				echo "1";
			}else{
				echo "0";
			}

	   	}
	   	else{
	   		echo "0";
	   	}

 }


 public function attend(){


 		$studentID=$this->input->post('id');


 		$current_time = date('H:i:s');
		$selectedEvent = $this->session->registrationselectedEvent; //selected event
 	    $userID = $this->session->userID;



 	    $registerStudent= array(
										'eventID'=>$selectedEvent,
										'studentID'=>$studentID, // last inserted id
										'time_in'=>$current_time,
										'registratorID'=>$userID
									);


			$this->load->model("mobile_model");
			$status=$this->mobile_model->registerStudent($registerStudent);
			if($status){
				echo "1";
			}else{
				echo "0";
			}





 }


  public function manualUpdate()
 {

		$current_time = date('H:i:s');
		$selectedEvent = $this->session->registrationselectedEvent; //selected event
 	    $userID = $this->session->userID;
   	
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

	   	$studentID=$this->input->post('id');
	   	 // load model
		$this->load->model('registration_model'); 
	   	$data = $this->registration_model->editSave($account,$studentID);

	   	if($data){
	   		
			echo "1";

	   	}
	   	else{
	   		echo "0";
	   	}

 }


  public function cancelRegistration()
 {

	   	$account=array(
		 'id'=>$this->input->post('id')
		);

		 //$this->load->model('students_model');
		 
		// $data=$this->students_model->delete_account($account);
		 //if($data){ // calling the model register_user from Accounts_model 


			$selectedEvent = $this->session->registrationselectedEvent; //selected event
		 	$this->load->model('registration_model');
		 	$student=array(
				 'studentID'=>$this->input->post('id'),
				 'eventID'=>$selectedEvent
				);
		 	$data1=$this->registration_model->delete_account($student);
		 	if($data1){
		 		echo "1";
		 	}

			
		 	//passing the result of model to view by this controller
		 //}
		 	else{
		 	echo "0";
		 }





 }









 public function manualRegistration(){
	$tick = $this->input->post('view');

	
	if($tick){

	$userID = $this->session->userID;
	$selectedEvent = $this->session->registrationselectedEvent; //selected event
	//$userID = $this->input->post('user');
    //$selectedEvent = $this->input->post('event');

	$this->load->model("registration_model");

	$data = $this->registration_model->getManual($selectedEvent,$userID);

	foreach ($data as $row) {
		$student=array();
		$student[]=$row->firstname;
		$student[]=$row->lastname;
		$student[]=$row->studentNumber;
		$student[]=$row->email;
		$student[]=$row->contact;

	}

	if($data){
	   		echo json_encode($data);

	   	}else{
	   		echo "0";
	   	}

	}


 	




 }



}

?>