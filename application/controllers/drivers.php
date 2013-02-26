<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Drivers extends CI_Controller {
	
	public function add()
	{
		if($this->session->userdata('isLoggedIn')) //check if the user's logged in
		{
			$data['title'] = "New Driver | Sharman's Cab Company";
			$data['message'] = "not added";
			$data['menuIndex'] = 1;
			$this->load->view('site_header', $data);
			$this->load->view('dashboard_header');
			$this->load->view('view_add_drivers');
		}
		else {
			redirect('main');
		}
	}
	
	public function manage() //returns a list of drivers and options to manage them
	{
		if($this->session->userdata('isLoggedIn'))
		{
			$this->load->library('pagination');
			
			$config['base_url'] = base_url() . "drivers/manage";
			$config['total_rows'] = $this->db->get('drivers')->num_rows();
			$config['per_page'] = 10;
			$config['num_links'] = 10;
			$config['full_tag_open'] = '<div class="pagination">';
			$config['full_tag_close'] = '</div>';
			
			$this->pagination->initialize($config);
			$this->db->order_by("firstName", "asc");
			$data['records'] = $this->db->get('drivers',$config['per_page'],$this->uri->segment(3));
							
			$data['title'] = "Manage Drivers | Sharman's Cab Company";
			$data['menuIndex'] = 1;
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
		//some validation rules
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
			
			if($this->model_drivers->add_driver()) //add the driver
			{
				$data['title'] = "New Driver | Sharman's Cab Company";
				$data['message'] = "added";
				$data['menuIndex'] = 1;
				$this->load->view('site_header', $data);
				$this->load->view('dashboard_header');
				$this->load->view('view_add_drivers');
			}
			else
			{
				$data['title'] = "New Driver | Sharman's Cab Company";
				$data['message'] = "error";
				$data['menuIndex'] = 1;
				$this->load->view('site_header', $data);
				$this->load->view('dashboard_header');
				$this->load->view('view_add_drivers');
			}
		}
		else
		{
				$data['title'] = "New Driver | Sharman's Cab Company";
				$data['message'] = "not added";
				$data['menuIndex'] = 1;
				$this->load->view('site_header', $data);
				$this->load->view('dashboard_header');
				$this->load->view('view_add_drivers');
		}
		
	}

	public function details($id)
	{
		$id = trim($id);
		
		$this->db->where('id',$id);
		$query = $this->db->get('drivers');
		if($query->num_rows())
		{
			$driver = $query->row();
			
			$response['message'] = "true";
			$response['id'] = $id;
			$response['name'] = $driver->firstName . ' ' . $driver->lastName;
			$response['address'] = $driver->address;
			$response['mobile'] = $driver->mobile;
			$response['carType'] = $driver->carType;
			$response['regNum'] = $driver->regNum;
		}
		else
		{
			$response['message'] = "false";
		}
		 
		$this->load->view('overlay_header',$response); //loads the overlay view as this is viewed from within a facebox
		$this->load->view('overlay_driver_details', $response);
	}
	
	public function edit($id) //provides the page to edit a driver
	{
		if($this->session->userdata('isLoggedIn'))
		{
			$id = trim($id); //gets the ID
			$this->db->where('id',$id);
			$query = $this->db->get('drivers'); //fetches the driver using the ID
			
			if($query->num_rows() == 1) //if we get exactly ONE row
			{
				$driver = $query->row(); //get that row into an object
				
				//use an array called data, load all the properties of the driver into this array
				$data['id'] = $id;
				$data['firstName'] = $driver->firstName;
				$data['lastName'] = $driver->lastName;
				$data['sex'] = $driver->sex;
				$data['dob'] = $driver->dob;
				$data['mobile'] = $driver->mobile;
				$data['address'] = $driver->address;
				$data['dlNum'] = $driver->dlNum;
				$data['dlExpiry'] = $driver->dlExpiry;
				$data['carType'] = $driver->carType;
				$data['regNum'] = $driver->regNum;
				$data['message'] = "edit";
				$data['menuIndex'] = 1;
				$data['title'] = "Edit Driver | Sharman's Cab Company";
				$this->load->view('site_header', $data); //send this array to the view, use this info to populate the fields
				$this->load->view('dashboard_header');
				$this->load->view('view_add_drivers');
			}
			else {
				$data['message'] = "editNotFound";
				$data['menuIndex'] = 1;
				$data['title'] = "Edit Driver | Sharman's Cab Company";
				$this->load->view('site_header', $data);
				$this->load->view('dashboard_header');
				$this->load->view('view_add_drivers');
			}
		}
		else {
			redirect('main');
		}
	}
	
	public function edit_driver_validate() //the edit driver form posts back here
	{
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules("id","id","required|trim|xss_clean");
		$this->form_validation->set_rules("firstName","first name","required|trim|xss_clean");
		$this->form_validation->set_rules("lastName","last name","required|trim|xss_clean");
		$this->form_validation->set_rules("dob","date of birth","required|trim|xss_clean");
		$this->form_validation->set_rules("address","address","required|trim|xss_clean");
		$this->form_validation->set_rules("mobile","mobile","required|trim|xss_clean");
		$this->form_validation->set_rules("dlNum","driving license number","required|trim|xss_clean");
		$this->form_validation->set_rules("dlExpiry","driving license expiry","required|trim|xss_clean");
		$this->form_validation->set_rules("carType","car type","required|trim|xss_clean");
		$this->form_validation->set_rules("regNum","registration number","required|trim|xss_clean");
		
		if($this->form_validation->run())
		{
			$this->load->model('model_drivers');
			
			if($this->model_drivers->edit_driver()) //edit the driver
			{
				$data['title'] = "Edit Driver | Sharman's Cab Company";
				$data['message'] = "edited";
				$data['menuIndex'] = 1;
				$this->load->view('site_header', $data);
				$this->load->view('dashboard_header');
				$this->load->view('view_add_drivers');
			}
			else
			{
				$data['title'] = "Edit Driver | Sharman's Cab Company";
				$data['message'] = "editError";
				$data['menuIndex'] = 1;
				$this->load->view('site_header', $data);
				$this->load->view('dashboard_header');
				$this->load->view('view_add_drivers');
			}
		}
		else
		{
				$data['title'] = "Edit Driver | Sharman's Cab Company";
				$data['message'] = "edit";
				$data['menuIndex'] = 1;
				$this->load->view('site_header', $data);
				$this->load->view('dashboard_header');
				$this->load->view('view_add_drivers');
		}
		
	}
	
}