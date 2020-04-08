<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Activate_Account extends CI_Controller {


	public function index()
	{
		$this->load->model('Activate_account_model');
		$data['Form'] = $this->Activate_account_model->Form();
		$this->load->view('activate_account',$data);
		
	}
	public function confirm()
	{
		$this->load->model('Activate_account_model');
		$data['Form'] = $this->Activate_account_model->Confirmation();
		$this->load->view('activate_account',$data);
		
	}
	
}
