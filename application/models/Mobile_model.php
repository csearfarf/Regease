<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Mobile_model extends CI_Model{

	public function loginDeviceID($data){ // getting the data in array and the specific  id
     
		$query=$this->db->get_where('users', $data);
		return $query; // passing the result in controller
	}
	
	public function getActiveEvents($data){

		$query=$this->db->get_where('events', $data);
		return $query->result_array(); // passing the result in controller

	}

	public function checkIfExisting($data){

		$query=$this->db->get_where('students', $data);
		return $query; // passing the result in controller

	}



	public function checkIfAlreadyRegistered($data){

		$query=$this->db->get_where('attendance', $data);
		return $query->num_rows(); // passing the result in controller

	}

	public function registerStudent($data){

	    // pass $data to insert query
	    $this->db->insert('attendance',$data);
	    return ($this->db->affected_rows() != 1) ? false : true; // passing the result in controller

  	}

  	public function insertStudent($data){

	    // pass $data to insert query
	    $this->db->insert('students',$data);
	    return $this->db->insert_id(); // passing the result in controller


  	}


  	public function checkEvent($data){ // getting the data in array and the specific  id
     
		$query=$this->db->get_where('events', $data);
		return $query; // passing the result in controller
	}
	

  	  	






}
?>