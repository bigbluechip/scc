<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Drivers extends CI_Controller {
	
	public function add()
	{
		if($this->session->userdata('isLoggedIn'))
		{
			$data['title'] = "New Driver | Sharman's Cab Company";
			$data['message'] = "not added";
			$this->load->view('site_header', $data);
			$this->load->view('dashboard_header');
			$this->load->view('view_add_drivers');
		}
		else {
			redirect('main');
		}
	}
	
	public function manage()
	{
		if($this->session->userdata('isLoggedIn'))
		{
			$data['title'] = "Manage Drivers | Sharman's Cab Company";
			$this->load->view('site_header', $data);
			$this->load->view('dashboard_header');
			$this->load->view('view_manage_drivers');
		}
		else {
			redirect('main');
		}
	}
	
	public function add_driver_validate()
	{
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules("firstName","first name","required|trim|xss_clean");
		$this->form_validation->set_rules("lastName","last name","required|trim|xss_clean");
		$this->form_validation->set_rules("dob","date of birth","required|trim|xss_clean");
		$this->form_validation->set_rules("address_1","address line 1","required|trim|xss_clean");
		$this->form_validation->set_rules("address_2","address line 2","required|trim|xss_clean");
		$this->form_validation->set_rules("mobile","mobile","required|trim|xss_clean");
		$this->form_validation->set_rules("dlNum","driving license number","required|trim|xss_clean");
		$this->form_validation->set_rules("dlExpiry","driving license expiry","required|trim|xss_clean");
		$this->form_validation->set_rules("carType","car type","required|trim|xss_clean");
		$this->form_validation->set_rules("regNum","registration number","required|trim|xss_clean");
		
		if($this->form_validation->run())
		{
			$this->load->model('model_drivers');
			
			if($this->model_drivers->add_driver())
			{
				$data['title'] = "New Driver | Sharman's Cab Company";
				$data['message'] = "added";
				$this->load->view('site_header', $data);
				$this->load->view('dashboard_header');
				$this->load->view('view_add_drivers');
			}
			else
			{
				$data['title'] = "New Driver | Sharman's Cab Company";
				$data['message'] = "error";
				$this->load->view('site_header', $data);
				$this->load->view('dashboard_header');
				$this->load->view('view_add_drivers');
			}
		}
		else
		{
				$data['title'] = "New Driver | Sharman's Cab Company";
				$data['message'] = "not added";
				$this->load->view('site_header', $data);
				$this->load->view('dashboard_header');
				$this->load->view('view_add_drivers');
		}
		
	}
	
}