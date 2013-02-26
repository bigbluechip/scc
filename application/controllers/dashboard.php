<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
	public function index() //the dashboard, the first page every user sees.
	{
		if($this->session->userdata('isLoggedIn'))
		{
			$data['title'] = "Dashboard | Sharman's Cab Company";
			$data['menuIndex'] = 0;
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
		$this->session->sess_destroy(); //destroys the session and redirects to login
		redirect('main');
	}
	
}