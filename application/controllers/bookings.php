<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bookings extends CI_Controller {
	
	public function add()
	{
		if($this->session->userdata('isLoggedIn'))
		{
			$data['title'] = "New Booking | Sharman's Cab Company";
			$this->load->view('site_header', $data);
			$this->load->view('dashboard_header');
			$this->load->view('view_add_bookings');
		}
		else {
			redirect('main');
		}
	}
	
	public function active()
	{
		if($this->session->userdata('isLoggedIn'))
		{
			$data['title'] = "Active Bookings | Sharman's Cab Company";
			$this->load->view('site_header', $data);
			$this->load->view('dashboard_header');
			$this->load->view('view_active_bookings');
		}
		else {
			redirect('main');
		}
	}
	
	public function add_booking_validate()
	{
		
	}
	
}