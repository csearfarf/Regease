<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Events_model extends CI_Model{


		//DATATABLE SCRIPT API 

	  var $table = "events";  
	  var $select_column = array("events.id","events.eventName","events.status");  
	  var $order_column = array( null,"events.eventName","events.status");  
	  var $date1='';
	  var $date2='';
	  
	  function getdates($date11,$date22){
	  	$this->date1= $date11;
	  	$this->date2= $date22;
	  }   
	  function make_query($start_date,$end_date) 
	  {   
	     $this->db->select($this->select_column);
	     $this->db->from($this->table);
	     $this->db->where(array('events.eventStart >='=>$start_date));
		 $this->db->where( array('events.eventStart <='=>$end_date));
	     if(isset($_POST["search"]["value"]))  
	     {  
	        $this->db->group_start();
	        $this->db->like("events.eventName", $_POST["search"]["value"]);   
	        $this->db->or_like("events.status", $_POST["search"]["value"]);
	        $this->db->group_end();
	     }  
	     if(isset($_POST["order"]))  
	     {  
	        $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
	     }  
	     else  
	     {  
	        $this->db->order_by('events.id', 'DESC');  
	     }  
	   }  
	   
	   
	  function make_datatables($start_date,$end_date){
	
	  	 $this->getdates($start_date,$end_date);

	     $this->make_query($this->date1,$this->date2);  
	     if(isset($_POST["length"]) && $_POST["length"] != -1)  
	     {  
	        $this->db->limit($_POST['length'], $_POST['start']);  
	     }  
	     $query = $this->db->get();  
	     return $query->result();  
	  }  
	  function get_filtered_data(){  
	     $this->make_query($this->date1,$this->date2);  
	     $query = $this->db->get();  
	     return $query->num_rows();  
	  }       
	  function get_all_data()  
	  {  
	     $this->db->select("*");  
	     $this->db->from($this->table);
	     $this->db->where(array('events.eventStart >='=>$this->date1));
		 $this->db->where( array('events.eventStart <='=>$this->date2));
	     return $this->db->count_all_results();  
	  } 


	 /////// 

	public function get_events()
	{
	    return $this->db->get("events");
	}


  public function createSave($data){
    // pass $data to insert query
    $this->db->insert('events',$data);
    return ($this->db->affected_rows() != 1) ? false : true; // passing the result in controller
  }


  public function editPreview($data){
    // pass $data to insert query
    $query=$this->db->get_where('events', $data);
    return $query->result_array(); // passing the result in controller
  }


  public function editSave($data,$id){
    // pass $data to insert query
    $this->db->where('id', $id);
    $this->db->update('events',$data);  

    return ($this->db->affected_rows() >= 0) ? true : false; // passing the result to controller
  }

  public function changeStatus($data,$id){
    // pass $data to insert query
    $this->db->where('id', $id);
    $this->db->update('events',$data);  

    return ($this->db->affected_rows() >= 0) ? true : false; // passing the result to controller
  }


   public function delete_account($data){
     $this->db->delete('events', $data);
      return ($this->db->affected_rows() != 1) ? false : true; // passing the result in controller
  }

   public function attendanceInEvent($data){

   	  // pass $data to insert query
    $query=$this->db->get_where('events', $data);
    if($query->num_rows() > 0){
  		return $query->result();
  	}else{
  		return false; 
  	}


  }

}
?>