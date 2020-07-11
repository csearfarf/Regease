<?php 
class Registration_model extends CI_Model{

//DATATABLE SCRIPT API 
var $table = "students";  
  var $select_column = array("students.id","students.studentNumber","students.firstname","students.lastname","programs.programName","yearsection.yearName","sections.sectionName","users.firstname as ufirstname","users.firstname as ufirstname","users.lastname as ulastname","attendance.time_in");  
  var $order_column = array( null,"students.studentNumber","students.firstname","students.lastname","programs.programName","yearsection.yearName","sections.sectionName","users.firstname as ufirstname","users.firstname as ufirstname","users.lastname as ulastname","attendance.time_in");  

    
  var $select_column1 = array("students.id","students.studentNumber","students.firstname","students.lastname","students.contact","students.email","students.sectionID","students.yearID","students.programsID","programs.programName","yearsection.yearName","sections.sectionName","students.active");  
  var $event1='';

  function getEventID($data){
	  	$this->event1= $data;
  }   

  function make_query($id) 
  {   
     $this->db->select($this->select_column);
     $this->db->from($this->table);
     $this->db->join('attendance','attendance.studentID=students.id');
     $this->db->join('programs','programs.id=students.programsID');
     $this->db->join('yearsection','yearsection.id=students.yearID');
     $this->db->join('sections','sections.id=students.sectionID');
     $this->db->join('users','users.id=attendance.registratorID');
	 $this->db->where(array('attendance.eventID ='=>$id));

     if(isset($_POST["search"]["value"]))  
     {  
        $this->db->group_start();
        $this->db->like("students.studentNumber", $_POST["search"]["value"]);   
        $this->db->or_like("students.firstname", $_POST["search"]["value"]);
        $this->db->or_like("students.lastname", $_POST["search"]["value"]);
        $this->db->or_like("yearsection.yearName", $_POST["search"]["value"]);
        $this->db->or_like("sections.sectionName", $_POST["search"]["value"]);
        $this->db->group_end();
     }  
     if(isset($_POST["order"]))  
     {  
        $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
     }  
     else  
     {  
        $this->db->order_by('atteandance.id', 'ASC');  
     }  
   }  
   
   
  function make_datatables($data){  
  	 $this->getEventID($data);
     $this->make_query($this->event1);  
     if(isset($_POST["length"]) && $_POST["length"] != -1)  
     {  
        $this->db->limit($_POST['length'], $_POST['start']);  
     }  
     $query = $this->db->get();  
     return $query->result();  
  }  
  function get_filtered_data(){  
     $this->make_query($this->event1);  
     $query = $this->db->get();  
     return $query->num_rows();  
  }       
  function get_all_data()  
  {  
     $this->db->select("*");  
     $this->db->from("attendance");
     $this->db->where(array('attendance.eventID ='=>$this->event1));
     return $this->db->count_all_results();  
  } 

////







public function selectedEvent($data){

	$query=$this->db->get_where('events', $data);
    return $query->result();

}


public function getID($data){ // getting id of student

	$query=$this->db->get_where('students', $data);
    return $query->result();

}

public function checkStudent($data){ // checking atteandance in selected event
	$query=$this->db->get_where('attendance', $data);
	if($query->num_rows() > 0){
		return $query->result();
	}else{
		return false; 
	}
		// passing the result in controller
}



public function createSave($data){
    // pass $data to insert query
    $this->db->insert('students',$data);
	return $this->db->insert_id(); // passing the result in controller
}



public function getManual($eventID,$userID){

    $this->db->select($this->select_column1);
     $this->db->from($this->table);
     $this->db->join('attendance','attendance.studentID=students.id');
     $this->db->join('programs','programs.id=students.programsID');
     $this->db->join('yearsection','yearsection.id=students.yearID');
     $this->db->join('sections','sections.id=students.sectionID');
     $this->db->join('users','users.id=attendance.registratorID');
    $this->db->where(array('attendance.eventID ='=>$eventID));
   $this->db->where(array('attendance.registratorID ='=>$userID));


     $query= $this->db->order_by('attendance.id', 'DESC')->get();

    return $query->result();




}


 public function editSave($data,$id){
    // pass $data to insert query
    $this->db->where('id', $id);
    $this->db->update('students',$data);  

    return ($this->db->affected_rows() >= 0) ? true : false; // passing the result to controller
  }



     public function delete_account($data){
     $this->db->delete('attendance', $data);
      return ($this->db->affected_rows() != 1) ? false : true; // passing the result in controller
    }


	

} ?>