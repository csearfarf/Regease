<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {


	public function index()
	{

		$logged = $this->session->logged_in;
		$type=$this->session->type;
		if($logged){ // if true
		if($type==1){
		$this->load->view('dashboard/dashboardTemplate/header.php');
		$this->load->view('dashboard/dashboard/dashboardContent.php'); //content
		//$this->load->view('dashboard/dashboard/dashboardModal.php'); Modal
		$this->load->view('dashboard/dashboardTemplate/footer.php');
		//$this->load->view('dashboard/dashboard/dashboardModal.php'); JS
		$this->load->view('dashboard/dashboardTemplate/footerJS.php');
		} else if($type==2){

	  	redirect('devcom/', 'refresh');


		}
		}else{

	  	redirect('home/user_logout', 'refresh');
		}

	}


	public function events(){

		$logged = $this->session->logged_in;
		$type=$this->session->type;
		if($logged){ // if true
		if($type==1){
		// events
	    $this->load->helper('url');
		$this->load->view('dashboard/dashboardTemplate/header.php');
		$this->load->view('dashboard/events/eventsContent.php');
		//$this->load->view('dashboard/dashboard/dashboardModal.php'); Modal
		$this->load->view('dashboard/dashboardTemplate/footer.php');

		$this->load->view('dashboard/events/eventsJS.php');
		$this->load->view('dashboard/dashboardTemplate/footerJS.php');
		} else if($type==2){
			
	  	redirect('devcom/', 'refresh');

		}
		}else{

	  		redirect('home/user_logout', 'refresh');
		}


	}

	public function students(){

		// students

		$logged = $this->session->logged_in;
		$type=$this->session->type;
		if($logged){ // if true
		if($type==1){
	    $this->load->helper('url');
		$this->load->model('students_model');
		$data['section']=$this->students_model->section_list();
		$data['year']=$this->students_model->year_list();
		$data['program']=$this->students_model->program_list();
		$this->load->view('dashboard/dashboardTemplate/header.php');
		$this->load->view('dashboard/students/studentsContent.php',$data);
		//$this->load->view('dashboard/dashboard/dashboardModal.php'); Modal
		$this->load->view('dashboard/dashboardTemplate/footer.php');

		$this->load->view('dashboard/students/studentsJS.php');
		$this->load->view('dashboard/dashboardTemplate/footerJS.php');
		} else if($type==2){
			
	  	redirect('devcom/', 'refresh');

		}
		}else{

	  		redirect('home/user_logout', 'refresh');
		}
	}


	public function users(){

		$logged = $this->session->logged_in;
		$type=$this->session->type;
		if($logged){ // if true
		if($type==1){
		// users
	    $this->load->helper('url');
		$this->load->view('dashboard/dashboardTemplate/header.php');
		$this->load->view('dashboard/users/usersContent.php');
		//$this->load->view('dashboard/dashboard/dashboardModal.php'); Modal
		$this->load->view('dashboard/dashboardTemplate/footer.php');

		$this->load->view('dashboard/users/usersJS.php');
		$this->load->view('dashboard/dashboardTemplate/footerJS.php');
		} else if($type==2){
			
	  	redirect('devcom/', 'refresh');

		}
		}else{

	  		redirect('home/user_logout', 'refresh');
		}
	}

	public function selectattendance(){


		// events
	    $this->load->helper('url');
	    $id=array('id'=>$this->input->post('id'));

		$this->load->model('events_model');
		$data=$this->events_model->attendanceInEvent($id);
		

		if($data){ // calling the model register_user from Accounts_model 
		
			if($data[0]->status==1){ // if accounts is activated

			$info = array(
				'eventID'  => $data[0]->id, // setting session to $_SESSION['eventID']
				);  
			$this->session->set_userdata($info);
			//echo json_encode($info);
			echo $_SESSION['eventID'];

			


			}

		}

		
	}


	public function attendance(){

		$logged = $this->session->logged_in;
		$type=$this->session->type;
		if($logged){ // if true
		if($type==1){
		// events
		    $this->load->helper('url');
		    if($this->session->eventID){
	    

			$this->load->view('dashboard/dashboardTemplate/header.php');
			$this->load->view('dashboard/attendance/attendanceContent.php');
			//$this->load->view('dashboard/dashboard/dashboardModal.php'); Modal
			$this->load->view('dashboard/dashboardTemplate/footer.php');

			$this->load->view('dashboard/attendance/attendanceJS.php');
			$this->load->view('dashboard/dashboardTemplate/footerJS.php');

			}else{

			 	redirect('/events');
			}
		} else if($type==2){
			
	  	redirect('devcom/', 'refresh');

		}
		}else{
			
	  	redirect('home/user_logout', 'refresh');
		}

		
	}


}
