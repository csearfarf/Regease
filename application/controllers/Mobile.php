<?php 

class Mobile extends CI_Controller {

	public function login() //ajax function
	{
	
		$response = array(); // for the response in

		
		// User has already request and check if the request is already approved or not
		$account=array(
			'username'=>$this->input->post('username'),
			'password'=>md5($this->input->post('password'))
		);
		
		 $this->load->model('mobile_model');
		
		$data=$this->mobile_model->loginDeviceID($account);
	
		if($data->num_rows()==1){
			$identity =$data->result();
			$username;
			$id;
			$name;
			$active;
			foreach ($identity as $row) {
				
				$username=$row->username;
				$id=$row->id;
				$name = $row->firstname . " " . $row->lastname ;
				$active = $row->active;
			}
			if($active==0){

			$response['error']=false;
			$response['response']="Your Account is inactive !";

			}else{
			$response['error']=true;
			$response['response']="Welcome ".$name." !";
			$response['username']=$username;
			$response['id']=$id;
			$response['name']=$name;
				  
			}
		}else{
			$response['error']=false;
			$response['response']="Your Account Doesnt Exist";
		}
		

		
		 echo json_encode($response);


	}


	public function getEvents() //ajax function
	{
	
		$response = array(); // for the response in

		
		// User has already request and check if the request is already approved or not
		$account=array(
			'status'=>1
		);
		
		 $this->load->model('mobile_model');
		
		$data=$this->mobile_model->getActiveEvents($account);
	
		 if($data){
		 	echo json_encode($data);
		 }

		

	}

		public function register() //ajax function
	{
		


		$current_time = date('H:i:s');

		$this->load->model('mobile_model');

		$response = array(); // for the response in
		$studentNumber=$this->input->post('studentNumber');
		$registratorID=$this->input->post('registratorID');
		$eventID=$this->input->post('eventID');
		$eventstat= array('id'=>$eventID);

		$eventStatus=$this->mobile_model->checkEvent($eventstat);
		if($eventStatus->num_rows()==1){
			$confirmedEvent =$eventStatus->result();
			$active;
			foreach ($confirmedEvent as $row) {
				$active=$row->status;
			}
			if($active==1){
					//1. check if student number exist else do insert in student table
						$studentAccount=array(
							'studentNumber'=>$studentNumber
						);

						$studentStatus=$this->mobile_model->checkIfExisting($studentAccount);

						/// check if existing 
						if($studentStatus->num_rows()==1){
							$identity =$studentStatus->result();
							$studentID;
							foreach ($identity as $row) {
								$studentID=$row->id;
							}


							// check whether its already registered
							$studentAccount=array(
								'studentID'=>$studentID,
								'eventID'=>$eventID,
							);


							$checkRegistered=$this->mobile_model->checkIfAlreadyRegistered($studentAccount);

							if($checkRegistered==1){

								$response['error']=false;
								$response['response']=$studentNumber." is already registered to this event";


							}else{

								$registerStudent= array(
									'eventID'=>$eventID,
									'studentID'=>$studentID,
									'time_in'=>$current_time,
									'registratorID'=>$registratorID
								);

								$status=$this->mobile_model->registerStudent($registerStudent);

								if($status){

							   		$response['error']=true;
									$response['response']=$studentNumber." is now Registered!";

							   	}
							   	else{

							   		$response['error']=false;
									$response['response']=$studentNumber."(Error in registration)";

							   	}


							}

						}else{ //insert into db

								$student= array(
									'studentNumber'=>$studentNumber,
									'sectionID'=>"27",
									'programsID'=>"9",
									'yearID'=>"5",
									'active'=>1
								);

								$status=$this->mobile_model->insertStudent($student);

								if($status){

									$newregisterStudent= array(
										'eventID'=>$eventID,
										'studentID'=>$status, // last inserted id
										'time_in'=>$current_time,
										'registratorID'=>$registratorID
									);

									$status=$this->mobile_model->registerStudent($newregisterStudent);

								   		$response['error']=true;
										$response['response']=$studentNumber." Manual !";

							   	}



						}

			}else{

				   		$response['error']=false;
						$response['response']="Event ".$eventID." is deactivated .";
			}
			
		}else{

				   		$response['error']=false;
						$response['response']="Event ".$eventID." is doesnt Exist !";
		}





	
		

		
		 echo json_encode($response);


	}



}
?>  