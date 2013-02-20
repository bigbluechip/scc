<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_users extends CI_Model {
	
	public function can_log_in()
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
	
	public function add_temp_user($key)
	{
		$data = array(
			'id' => null,
			'email' => $this->input->post('email'),
			'firstName' => $this->input->post('firstName'),
			'lastName' => $this->input->post('lastName'),
			'type' => $this->input->post('userType'),
			'key' => $key
		);
		
		$query = $this->db->insert('temp_users', $data);
		
		if($query){
			return true;
		}
		else {
			return false;
		}
			
	}
	
	public function add_user()
	{
		$data = array(
			'id' => NULL,
			'email' => $this->input->post('email'),
			'firstName' => $this->input->post('firstName'),
			'lastName' => $this->input->post('lastName'),
			'password' => md5($this->input->post('password')),
			'type' => $this->input->post('type')
		);
		
		$query = $this->db->insert('users', $data);
		$key = $this->input->post('key');
		
		$this->db->where('key',$key);
		$this->db->delete('temp_users');
		
		if($query)
			return true;
		else
			return false;
	}	
}