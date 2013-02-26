<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_bookings extends CI_Model {
	
	public function add_booking() //function to add a booking
	{
		//fetch all the variables from post, don't worry, you'll reach this function only after they're cleaned and validated
		$carType = $this->input->post('carType');
		$driver = $this->input->post('driver');
		$customer = $this->input->post('customer');
		$endpoint = $this->input->post('endpoint');
		$distance = $this->input->post('distance');
		$bookingDate = $this->input->post('bookingDate');
		$hours = $this->input->post('hours');
		$minutes = $this->input->post('minutes');
		
		list($day,$month,$year) = explode('-',$bookingDate);
		//explode the booking date using the delimiter as '-'. jQuery gives you dates like 28-02-2013
		//but we need something like 2013-02-28 18:15:00
		
		$bookingDate = $year . '-' . $month . '-' . $day . ' ' . $hours . ':' . $minutes . ':00';
		
		$this->db->where('name',$customer);
		$query = $this->db->get('customers');
		
		if($query->num_rows() == 1)
		{
			$row = $query->row();
			$customerId = $row->id;
			
			if($row->type == "corporate")
				$endpoint = $this->input->post('endpoint'); //if the customer is corporate, use the endpoint entered
			else
				$endpoint = $customer; //else the endpoint is set to the customer's name
		}
		else 
		{
			$customerId = 0; //means the customer is a new customer, will be added later
		}
		
		list($firstName,$lastName) = explode(' ',$driver); //autocomplete provides a full name, explode it into two parts
		
		$this->db->where('firstName',$firstName);
		$this->db->where('lastName',$lastName);
		$query = $this->db->get('drivers');
		
		if($query->num_rows() == 1)
		{
			$row = $query->row();
			$driverId = $row->id;
		}
		
		$timestamp = date("Y-m-d H:i:s"); //timestamp when the booking's made
		
		$data = array(
			'id' => null,
			'timestamp' => $timestamp,
			'driverId' => $driverId,
			'carType' => $carType,
			'customerId' => $customerId,
			'endpoint' => $endpoint,
			'estimatedDistance' => $distance,
			'bookingDate' => $bookingDate
		);
		
		if($query = $this->db->insert('bookings', $data)) //insert into DB
			return true;
		else
			return false;
	}
	
}