<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
	public function index()
	{
		if($this->session->userdata('isLoggedIn'))
		{
			$data['title'] = "Dashboard | Sharman's Cab Company";
			$this->load->view('site_header', $data);
			$this->load->view('dashboard_header');
			$this->load->view('view_dashboard');
		}
		else {
			redirect('main');
		}
	}
	
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('main');
	}
	
}