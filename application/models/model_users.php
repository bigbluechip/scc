<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_users extends CI_Model {
	
	public function can_log_in() //validate the username password combo
	{
		$this->db->where('email',$this->input->post('email'));
		$this->db->where('password',md5($this->input->post('password')));
		$query = $this->db->get('users');
		
		if($query->num_rows() == 1){
			return TRUE;
		}
		else
			return FALSE;
	}
}