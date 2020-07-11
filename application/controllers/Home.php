<?php 
class Home extends CI_Controller{

	public function index(){

		$logged = $this->session->logged_in;
			$type=$this->session->type;
			if($logged){ // if true
				if($type==1){
					
					redirect('/dashboard');
				}else{
					
					redirect('/devcom');
				}
			}else{
				$this->session->sess_destroy();
				$array_items = array('username', 'type','logged_in'); //declaration of variable names is sessions
				$this->session->unset_userdata($array_items); // removing the set of sessions 
				
				$this->load->view('login/login.php');
	
			}



	}
	public function checkInput() //ajax function
	{

		$account=array(
		 'username'=>$this->input->post('username'), //getting the data from ajax where data = username 
		 'password'=>md5($this->input->post('password')),//getting the data from ajax where data = password 
		);


		 $this->load->model('home_model');
		 $data=$this->home_model->login_user($account);

		 if($data){ // calling the model register_user from Accounts_model 
		
			//print_r($data); // checker of result
			$info = array(
				'username'  => $data[0]->username, // setting session to $_SESSION['username']
				'type'     =>  $data[0]->type,
				'userID'     =>  $data[0]->id,
				'name'     =>  $data[0]->firstname ." ". $data[0]->lastname ,
				'logged_in' => TRUE
				);  
		
			$this->session->set_userdata($info);

			//echo $this->session->userdata('username');
			echo json_encode($info);
		 	//passing the result of model to view by this controller
		 }else{
		 	echo "false";
		 }


	}

	public function user_logout(){
	  
		$array_items = array('username', 'type','logged_in','name','registrationselectedEvent','userID'); //declaration of variable names is sessions
		$this->session->unset_userdata($array_items);
	  $this->session->sess_destroy();
	  redirect('home/index', 'refresh');
	}
	
}
?>