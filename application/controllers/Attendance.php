<?php 
class Attendance extends CI_Controller{

function fetch_user($data){  
		$eventID=$data;
		$this->load->model("attendance_model");  
		$fetch_data = $this->attendance_model->make_datatables($eventID); 
		$data = array();  
		foreach($fetch_data as $row)  
		{  
			 $sub_array = array();
			 $sub_array[] =$row->studentNumber;
			 $sub_array[] =$row->firstname." ". $row->lastname ;
			 $sub_array[] =$row->yearName;
			 $sub_array[] =$row->sectionName;

			 $sub_array[] =$row->email;

			 $sub_array[] =$row->ufirstname." ". $row->ulastname;
			 $sub_array[] =date("g:i a",strtotime($row->time_in));

			 


			
			 $data[] = $sub_array;  
		}  
		$output = array(  
			 "draw"                    =>     intval($_POST["draw"]),  
			 "recordsTotal"          =>      $this->attendance_model->get_all_data(),  
			 "recordsFiltered"     =>     $this->attendance_model->get_filtered_data(),  
			 "data"                    =>     $data  
		);



		echo json_encode($output);
 	}





}
?>