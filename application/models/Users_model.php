<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model{


//DATATABLE SCRIPT API 

  var $table = "users";  
  var $select_column = array("users.id","users.firstname","users.lastname","users.username","users.password","users.active","users.type");  
  var $order_column = array( null,"users.id","users.firstname","users.lastname","users.username","users.password","users.active","users.type");  

     
  function make_query() 
  {   
     $this->db->select($this->select_column);
     $this->db->from($this->table);
     if(isset($_POST["search"]["value"]))  
     {  
        $this->db->group_start();
        $this->db->like("users.username", $_POST["search"]["value"]);   
        $this->db->or_like("users.firstname", $_POST["search"]["value"]);
        $this->db->group_end();
     }  
     if(isset($_POST["order"]))  
     {  
        $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
     }  
     else  
     {  
        $this->db->order_by('users.id', 'DESC');  
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
    $this->db->insert('users',$data);
    return ($this->db->affected_rows() != 1) ? false : true; // passing the result in controller
  }


  public function editPreview($data){
    // pass $data to insert query
    $query=$this->db->get_where('users', $data);
    return $query->result_array(); // passing the result in controller
  }


  public function editSave($data,$id){
    // pass $data to insert query
    $this->db->where('id', $id);
    $this->db->update('users',$data);  

    return ($this->db->affected_rows() >= 0) ? true : false; // passing the result to controller
  }

  public function changeStatus($data,$id){
    // pass $data to insert query
    $this->db->where('id', $id);
    $this->db->update('users',$data);  

    return ($this->db->affected_rows() >= 0) ? true : false; // passing the result to controller
  }

 
    public function delete_account($data){
     $this->db->delete('users', $data);
      return ($this->db->affected_rows() != 1) ? false : true; // passing the result in controller
    }



  





}
?>