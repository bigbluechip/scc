<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customers extends CI_Controller {
	
	public function add()
	{
		if($this->session->userdata('isLoggedIn'))
		{
			$data['title'] = "New Customer | Sharman's Cab Company";
			$data['message'] = "not added";
			$this->load->view('site_header', $data);
			$this->load->view('dashboard_header');
			$this->load->view('view_add_customer');
		}
		else {
			redirect('main');
		}
	}
	
	public function manage()
	{
		if($this->session->userdata('isLoggedIn'))
		{
			$data['title'] = "Manage Customers | Sharman's Cab Company";
			$this->load->view('site_header', $data);
			$this->load->view('dashboard_header');
			$this->load->view('view_manage_customers');
		}
		else {
			redirect('main');
		}
	}
	
	public function add_customer_validate()
	{
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules("name","name","required|trim|xss_clean");
		$this->form_validation->set_rules("address_1","address line 1","required|trim|xss_clean");
		$this->form_validation->set_rules("address_2","address line 2","required|trim|xss_clean");
		$this->form_validation->set_rules("mobile","mobile","required|trim|xss_clean");
		$this->form_validation->set_rules("email","email","required|trim|valid_email|xss_clean");
		
		if($this->form_validation->run())
		{
			$this->load->model('model_customers');
			
			if($this->model_customers->add_customer())
			{
				$data['title'] = "New Customer | Sharman's Cab Company";
				$data['message'] = "added";
				$this->load->view('site_header', $data);
				$this->load->view('dashboard_header');
				$this->load->view('view_add_customer');
			}
			else
			{
				$data['title'] = "New Customer | Sharman's Cab Company";
				$data['message'] = "error";
				$this->load->view('site_header', $data);
				$this->load->view('dashboard_header');
				$this->load->view('view_add_customer');
			}
		}
		else
		{
				$data['title'] = "New Customer | Sharman's Cab Company";
				$data['message'] = "not added";
				$this->load->view('site_header', $data);
				$this->load->view('dashboard_header');
				$this->load->view('view_add_customer');
		}
		
	}
	
}