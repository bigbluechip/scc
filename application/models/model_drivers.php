<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_drivers extends CI_Model {
		
		public function add_driver()
		{
			$data = array(
				'id' => null,
				'firstName' => $this->input->post('firstName'),
				'lastName' => $this->input->post('lastName'),
				'sex' => $this->input->post('sex'),
				'dob' => $this->input->post('dob'),
				'address' => $this->input->post('address_1') . ', ' . $this->input->post('address_2'),
				'mobile' => $this->input->post('mobile'),
				'dlNum' => $this->input->post('dlNum'),
				'dlExpiry' => $this->input->post('dlExpiry'),
				'carType' => $this->input->post('carType'),
				'regNum' => $this->input->post('regNum')
			);
			
			$this->db->where('firstName',$this->input->post('firstName'));
			$this->db->where('lastName',$this->input->post('lastName'));
			$ifExists = $this->db->get('drivers');
			if($ifExists->num_rows() == 0)
			{
				$query = $this->db->insert('drivers', $data);
				
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
}