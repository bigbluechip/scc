<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_drivers extends CI_Model {
		
		public function add_driver() //adds a driver
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
			
			//check if the driver already exists
			$this->db->where('firstName',$this->input->post('firstName'));
			$this->db->where('lastName',$this->input->post('lastName'));
			$ifExists = $this->db->get('drivers');
			
			if($ifExists->num_rows() == 0) //if there's no one
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
		
		public function edit_driver() //function to edit drivers
		{
			$data = array(
				'firstName' => $this->input->post('firstName'),
				'lastName' => $this->input->post('lastName'),
				'sex' => $this->input->post('sex'),
				'dob' => $this->input->post('dob'),
				'address' => $this->input->post('address'),
				'mobile' => $this->input->post('mobile'),
				'dlNum' => $this->input->post('dlNum'),
				'dlExpiry' => $this->input->post('dlExpiry'),
				'carType' => $this->input->post('carType'),
				'regNum' => $this->input->post('regNum')
			);
			$this->db->where('id', $this->input->post('id'));
			
			if($this->db->update('drivers', $data))
				return true;
			else
				return false;
		}
		
		public function driver_exists() //function to validate if a driver exists while making a booking
		{
			$driver = $this->input->post('driver');
			list($firstName,$lastName) = explode(' ',$driver);
			
			$this->db->where('firstName',$firstName);
			$this->db->where('lastName',$lastName);
			$query = $this->db->get('drivers');
			
			if($query->num_rows() == 1)
			{
				$row = $query->row();
				if($this->input->post('carType') == $row->carType)
				{
					return 'Success';
				}
				else 
				{
					return 'Car mismatch';
				}
			}
			else 
			{
				return 'Driver missing';
			}
		}	
}