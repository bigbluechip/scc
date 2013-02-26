<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bookings extends CI_Controller {
	//the add bookings function
	public function add()
	{
		//checking if the user has logged in else redirecting to main page
		if($this->session->userdata('isLoggedIn'))
		{
			$data['title'] = "New Booking | Sharman's Cab Company";
			$data['message'] = "toadd"; //the status message used to decide whether to show a form or a message
			$data['menuIndex'] = 0; //to define which portion of the sidebar is active
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
			//loading the pagination class - CodeIgniter is so cool!
			$this->load->library('pagination');
			//base url is set in the config section
			$config['base_url'] = base_url() . "bookings/active";
			$config['total_rows'] = $this->db->get('bookings')->num_rows();
			$config['per_page'] = 10; //number of results per page
			$config['num_links'] = 10; //number of links to show per page
			$config['full_tag_open'] = '<div class="pagination">';
			$config['full_tag_close'] = '</div>';
			
			$this->pagination->initialize($config);
			$this->db->order_by("bookingDate", "asc");
			$data['records'] = $this->db->get('bookings',$config['per_page'],$this->uri->segment(3));
							
			$data['title'] = "Active bookings | Sharman's Cab Company";
			$data['menuIndex'] = 0;
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
		//loading the form validation library
		$this->load->library('form_validation');
		//some validation rules
		$this->form_validation->set_rules("carType","car type","required|trim");
		$this->form_validation->set_rules("driver","driver","required|trim|callback_driver_validate"); //note the callback to the function driver_validate below
		$this->form_validation->set_rules("customer","customer","required|trim");
		$this->form_validation->set_rules("endpoint","endpoint","trim");
		$this->form_validation->set_rules("distance","estimated distance","required|trim|numeric");
		$this->form_validation->set_rules("bookingDate","booking date","required|trim");
		
		if($this->form_validation->run()){ //if validation succeeds
				
			$this->load->model('model_bookings'); //load a model
			
			if($this->model_bookings->add_booking()) //call a model function
			{
				$data['title'] = "New Booking | Sharman's Cab Company";
				$data['message'] = "added";
				$data['menuIndex'] = 0;
				$this->load->view('site_header', $data);
				$this->load->view('dashboard_header');
				$this->load->view('view_add_bookings');
			}
			else 
			{
				$data['title'] = "New Booking | Sharman's Cab Company";
				$data['message'] = "error";
				$data['menuIndex'] = 0;
				$this->load->view('site_header', $data);
				$this->load->view('dashboard_header');
				$this->load->view('view_add_bookings');
			}				
		}
		else 
		{
				$data['title'] = "New Booking | Sharman's Cab Company";
				$data['message'] = "toadd";
				$data['menuIndex'] = 0;
				$this->load->view('site_header', $data);
				$this->load->view('dashboard_header');
				$this->load->view('view_add_bookings');
		}
	}
	
	public function driver_validate() //callback from form validation rules, checks if the driver's available
	{
		$this->load->model('model_drivers');
		if($this->model_drivers->driver_exists() == 'Success') //yahoo! driver's there
			return true;
		elseif($this->model_drivers->driver_exists() == 'Driver missing') //oops, driver's not thee in the DB
		{
			$this->form_validation->set_message('driver_validate','Driver does not exist. Please add the driver before making the booking.');
			return false;
		}
		elseif($this->model_drivers->driver_exists() == 'Car mismatch') //the car type for the booking and the one this driver drives are different!
		{
			$this->form_validation->set_message('driver_validate','The car type of this booking and the car type of the driver do not match.');
			return false;
		}
	}
	
	public function endpoint_needed($name) //this function is called using AJAX from the add booking page
	{
		//this decides if a customer is a corporate customer and if it needs an endpoint
		//returns the reply in JSON
		$name = urldecode($name); //decodes all the URL entities to characters e.g. %20 to space
		$this->db->where('name',$name);
		$query = $this->db->get('customers');
		if($query->num_rows == 1)
		{
			$customer = $query->row();
			if($customer->type == "corporate")
			{
				header('Content-type: application/json');
				echo json_encode(array("name" => $name, "needed" => "yes")); //reply in JSON
			}
		}
		else
		{
			header('Content-type: application/json');
			echo json_encode(array("name" => $name, "needed" => "no"));
		}
		
	}
}