<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Students_model extends CI_Model{

//DATATABLE SCRIPT API 

  var $table = "students";  
  var $select_column = array("students.id","students.studentNumber","students.contact","students.email","students.firstname","students.lastname","programs.programName","yearsection.yearName","sections.sectionName","students.active");  
  var $order_column = array( null,"students.studentNumber","students.firstname","students.lastname","programs.programName","yearsection.yearName","sections.sectionName","students.active");  

     
  function make_query() 
  {   
     $this->db->select($this->select_column);
     $this->db->from($this->table);
     $this->db->join('programs','programs.id=students.programsID');
     $this->db->join('yearsection','yearsection.id=students.yearID');
     $this->db->join('sections','sections.id=students.sectionID');

     if(isset($_POST["search"]["value"]))  
     {  
        $this->db->group_start();
        $this->db->like("students.studentNumber", $_POST["search"]["value"]);   
        $this->db->or_like("students.firstname", $_POST["search"]["value"]);
        $this->db->or_like("students.lastname", $_POST["search"]["value"]);   
        $this->db->or_like("programs.programName", $_POST["search"]["value"]);
        $this->db->or_like("yearsection.yearName", $_POST["search"]["value"]);   
        $this->db->or_like("sections.sectionName", $_POST["search"]["value"]);
        $this->db->or_like("students.active", $_POST["search"]["value"]);

        $this->db->group_end();
     }  
     if(isset($_POST["order"]))  
     {  
        $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
     }  
     else  
     {  
        $this->db->order_by('students.id', 'DESC');  
     }  
   }  
   
   
  function make_datatables(){  
     $this->make_query();  
     if(isset($_POST["length"]) && $_POST["length"] != -1)  
     {  
        $this->db->limit($_POST['length'], $_POST['start']);  
     }  
     $query = $this->db->get();  
     return $query->result();  
  }  
  function get_filtered_data(){  
     $this->make_query();  
     $query = $this->db->get();  
     return $query->num_rows();  
  }       
  function get_all_data()  
  {  
     $this->db->select("*");  
     $this->db->from($this->table);
     return $this->db->count_all_results();  
  } 

////

  public function createSave($data){
    // pass $data to insert query
    $this->db->insert('students',$data);
    return ($this->db->affected_rows() != 1) ? false : true; // passing the result in controller
  }


  public function editPreview($data){
    // pass $data to insert query
    $query=$this->db->get_where('students', $data);
    return $query->result_array(); // passing the result in controller
  }


  public function editSave($data,$id){
    // pass $data to insert query
    $this->db->where('id', $id);
    $this->db->update('students',$data);  

    return ($this->db->affected_rows() >= 0) ? true : false; // passing the result to controller
  }

  public function changeStatus($data,$id){
    // pass $data to insert query
    $this->db->where('id', $id);
    $this->db->update('students',$data);  

    return ($this->db->affected_rows() >= 0) ? true : false; // passing the result to controller
  }

  public function year_list(){

    $query=$this->db->get('yearsection');
    return $query->result();

  }

  public function section_list(){

    $query=$this->db->get('sections');
    return $query->result();

  }

  public function program_list(){

    $query=$this->db->get('programs');
    return $query->result();

  }

  public function selectedSection($data){

	$query=$this->db->get_where('sections', $data);
    return $query->result();

  }

   public function delete_account($data){
     $this->db->delete('students', $data);
      return ($this->db->affected_rows() != 1) ? false : true; // passing the result in controller
    }




}
?>
