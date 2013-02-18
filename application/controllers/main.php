<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
	{
		$data['title'] = "Sharman's Cab Company";
		$this->load->view('site_header',$data);	
		$this->load->view('view_main');
	}
}
