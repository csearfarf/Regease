<?php 
class Home_model extends CI_Model{
	
	public function login_user($data){
	$query=$this->db->get_where('users', $data);
	if($query->num_rows() > 0){
		return $query->result();
	}else{
		return false; 
	}
		// passing the result in controller
	}


}

?>