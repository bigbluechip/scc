<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
	{
		if(!$this->session->userdata('isLoggedIn'))
		{
			$data['title'] = "Sharman's Cab Company";
			$this->load->view('site_header',$data);	
			$this->load->view('view_main');
		}
		else
			{
				redirect('dashboard');
			}
	}
	
	public function login()
	{
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules("email","email","required|valid_email|trim|xss_clean|callback_validate_credentials");
		$this->form_validation->set_rules("password","password","required|trim|md5");
		
		if($this->form_validation->run()){
			$email = $this->input->post('email');
			$query = $this->db->query("SELECT * FROM users WHERE email = '$email'");
			$row = $query->row();
			$type = $row->type;
			$firstName = $row->firstName;
			
			$data = array('email' => $email, 'type' => $type, 'firstName' => $firstName,'isLoggedIn' => 1);
			$this->session->set_userdata($data);
			redirect('dashboard/');
		}
		else {
			$data['title'] = "Sharman's Cab Company";
			$this->load->view('site_header', $data);
			$this->load->view('view_main');
		}
	}
	
	public function validate_credentials()
	{
		$this->load->model('model_users');
		
		if($this->model_users->can_log_in()){
			return true;
		}
		else {
			$this->form_validation->set_message('validate_credentials','Incorrect username or password.');
			return false;
		}
	}
}
