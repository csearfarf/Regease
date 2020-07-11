<?php 
class Devcom extends CI_Controller{


	public function index(){

		$logged = $this->session->logged_in;
		$type=$this->session->type;
		if($logged){ // if true
		if($type==1){
			 redirect('dashboard/', 'refresh');
		
		} else if($type==2){

	 	$this->load->view('devcom/devcomTemplate/header.php');
		$this->load->view('devcom/eventlist/eventContent.php');
		$this->load->view('devcom/devcomTemplate/footer.php');
		$this->load->view('devcom/eventlist/eventJS.php');
		$this->load->view('devcom/devcomTemplate/footerJS.php');


		}
		}else{

	  	redirect('home/user_logout', 'refresh');
		}



		


	}

	public function registration(){



		$selectedEvent = $this->session->registrationselectedEvent;

		$logged = $this->session->logged_in;
		$type=$this->session->type;
		if($logged){ // if true
		if($type==1){
			 redirect('dashboard/', 'refresh');
		
		} else if($type==2){
			if($selectedEvent){

				$event =array ('id' =>$selectedEvent);
				$this->load->model("registration_model");  
      			$fetch_data['event'] = $this->registration_model->selectedEvent($event); 
      			$this->load->model('students_model');
				$fetch_data['section']=$this->students_model->section_list();
				$fetch_data['year']=$this->students_model->year_list();
				$fetch_data['program']=$this->students_model->program_list();


					$this->load->view('devcom/devcomTemplate/header.php');
					$this->load->view('devcom/registration/registrationContent.php',$fetch_data);
					//$this->load->view('dashboard/dashboard/dashboardModal.php'); Modal
					$this->load->view('devcom/devcomTemplate/footer.php');
					$this->load->view('devcom/registration/registrationJS.php');
					$this->load->view('devcom/devcomTemplate/footerJS.php');

			}else{

			 		redirect('devcom/', 'refresh');
			}


	 


		}
		}else{

	  	redirect('home/user_logout', 'refresh');
		}

	




	}


	

	function fetch_user($year,$month,$startDays,$totalDaysInMonth){
      // adjustable data base on current month and year 
      $start = $year."-".$month."-"."0".$startDays;
      $end   = $year."-".$month."-".$totalDaysInMonth;

      $this->load->model("events_model");  
      $fetch_data = $this->events_model->make_datatables($start,$end); 
      $data = array();  
      foreach($fetch_data as $row)  
      {  
          $sub_array = array();
          
          $sub_array[] =$row->eventName;
         
          $sub_array[] =($row->status==1)? 
          ' <button type="button" rel="tooltip" title="Proceed to event" class="btn btn-info btn-link btn-sm" id="'.$row->id.'" onclick="proceed('.$row->id.')">
                                <i class="material-icons">send</i>
                              </button>
                            
                              '
                :
                '<button type="button" rel="tooltip" title="Proceed to Event" class="btn btn-info btn-link btn-sm" id="'.$row->id.'" onclick="proceed('.$row->id.')">
                                <i class="material-icons">send</i>
                              </button>
                              
                              ';

          $data[] = $sub_array;  
      }  
      $output = array(  
          "draw"                    =>     intval($_POST["draw"]),  
          "recordsTotal"          =>      $this->events_model->get_all_data(),  
          "recordsFiltered"     =>     $this->events_model->get_filtered_data(),  
          "data"                    =>     $data  
      );



      echo json_encode($output);
   }

  public function proceed(){


   	$id = $this->input->post('id');
   	$result="";
   	if($id){

   		$info = array(
				'registrationselectedEvent'  => $id, // setting session to $_SESSION['username']
				);  
		
			$this->session->set_userdata($info);

			$result=true;

   		
   	}else{
   		$result =false;
   	}

   	echo json_encode($result);

   }


	
}
?>