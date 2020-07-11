<?php 
class Raffle extends CI_Controller{

	public function custom(){


		$logged = $this->session->logged_in;
		$type=$this->session->type;
		if($logged){ // if true
		if($type==1){
			


		$this->load->view('dashboard/raffle/raffleCustomize.php');
		
		} else if($type==2){

 		redirect('devcom/', 'refresh');
	


		}
		}else{

	  	redirect('home/user_logout', 'refresh');
		}



	}
	public function index(){

		$eventID =$this->session->eventID;
		$this->load->model("attendance_model");  

		
		$data1['students']=$this->attendance_model->raffle($eventID); 
		$this->load->view('dashboard/raffle/raffle.php',$data1);

		

	

	}


	
}
?>