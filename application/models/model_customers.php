<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_customers extends CI_Model {
		
		public function add_customer() //function to add a customer
		{
			$data = array(
				'id' => null,
				'name' => $this->input->post('name'),
				'type' => $this->input->post('type'),
				'mobile' => $this->input->post('mobile'),
				'email' => $this->input->post('email'),
				'address' => $this->input->post('address_1') . ', ' . $this->input->post('address_2')
			);
			
			$this->db->where('name',$this->input->post('name'));
			$ifExists = $this->db->get('customers');
			if($ifExists->num_rows() == 0)
			{
				$query = $this->db->insert('customers', $data);
				
				if($query)
				{
					return true;
				}
				else
				{
					return false;
				}
			}
			else
				return false;
		}	
		
		public function edit_customer() //function to edit drivers
		{
			$data = array(
				'name' => $this->input->post('name'),
				'type' => $this->input->post('type'),
				'mobile' => $this->input->post('mobile'),
				'email' => $this->input->post('email'),
				'address' => $this->input->post('address_1') . ', ' . $this->input->post('address_2')
				
			);
			$this->db->where('id', $this->input->post('id'));
			
			if($this->db->update('customers', $data))
				return true;
			else
				return false;
		}
}