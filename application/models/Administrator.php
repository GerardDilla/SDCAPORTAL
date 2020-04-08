<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->model('admin_login');
		$data['pass'] = $this->admin_login->jumpcheck();
		
		if($data['pass'] == 1){
			
			$this->Admin();
			
			}
		else{
			
			$this->Main();
			
			}
		
	}
	
	public function Main()
	{	
		$data['error'] = "";
		$data['pass'] = "1";
		$this->load->view('Admin_login',$data);	
	}
	
	public function login()
	{
		$this->load->model('admin_login');
		$data['pass'] = $this->admin_login->A_Log();
		$data['error'] = "";
		
		if($data['pass'] == 1){
			
			$this->admin_login->admin_menu();
			
			$this->Admin();
			
			}
		else{
			$this->session->unset_userdata('logged_in');
			$data['error'] = "Invalid ID or Password";
			$this->load->view('Admin_login',$data);
			}	
	}
	
	public function Admin()
	{	
		$this->load->model('admin_login');
		$data['pass'] = $this->admin_login->jumpcheck();
		$data['error'] = "";
		
		if($data['pass'] == 1){
			
			$this->load->view('admin_header');
			$this->load->view('admin_welcome');
			$this->load->view('admin_footer');
			
			
			}
		else{
			$data['error'] = "You must Login first";
			$this->load->view('Portalhome',$data);
			}
	}
	
	public function admin_settings()
	{
		
 		$this->load->model('admin_login');
		$data['pass'] = $this->admin_login->jumpcheck();
		$data['error'] = "";
		$data['active'] = "6";
		if($data['pass'] == 1){
			
			$this->load->view('admin_header',$data);
			$this->load->view('admin_settings');
			$this->load->view('admin_footer');
			
			}
		else{
			$data['error'] = "You must Login first";
			$this->load->view('Admin_login',$data);
			}		
	}
	
	public function change_PW(){
		
		$this->load->model('settings');
		$this->settings->admin_change_password();
		redirect('index.php/administrator/admin_settings');
		
		}
	
	public function admin_registration_form()
	{
 		$this->load->model('admin_login');
		$data['pass'] = $this->admin_login->jumpcheck();
		
		$data['error'] = "";
		$data['active'] = "6";
		if($data['pass'] == 1){
			
			$this->load->view('admin_header',$data);
			$this->load->view('admin_registration',$data);
			$this->load->view('admin_footer');
			
			}
		else{
			$data['error'] = "You must Login first";
			$this->load->view('Admin_login',$data);
			}		
	}
	
	public function admin_register()
	{	
		$this->load->model('admin_login');
		$this->admin_login->register();
		redirect('index.php/administrator/admin_registration_form');
	}
	
	public function event_registration()
	{
 		$this->load->model('admin_login');
		$data['pass'] = $this->admin_login->jumpcheck();
		
		$this->load->model('events_model');
		$data['msg'] = $this->events_model->event_register();
		$data['error'] = "";
		$data['active'] = "6";
		if($data['pass'] == 1){
			
			$this->load->view('admin_header',$data);
			$this->load->view('event_registration',$data);
			$this->load->view('admin_footer');
			
			}
		else{
			$data['error'] = "You must Login first";
			$this->load->view('Admin_login',$data);
			}		
	}
	
	public function event_category()
	{
 		$this->load->model('admin_login');
		$data['pass'] = $this->admin_login->jumpcheck();
		
		$this->load->model('events_model');
		$data['events_list'] = $this->events_model->category();
		$data['error'] = "";
		$data['active'] = "6";
		if($data['pass'] == 1){
			
			$this->load->view('admin_header',$data);
			$this->load->view('admin_events',$data);
			$this->load->view('admin_footer');
			
			}
		else{
			$data['error'] = "You must Login first";
			$this->load->view('Admin_login',$data);
			}		
	}
	
	public function awards()
	{
 		$this->load->model('admin_login');
		$data['pass'] = $this->admin_login->jumpcheck();
		
		$this->load->model('awards_model');
		$data['Awards_list'] = $this->awards_model->getall_list();
		$data['error'] = "";
		$data['active'] = "6";
		if($data['pass'] == 1){
			
			$this->load->view('admin_header',$data);
			$this->load->view('admin_awards',$data);
			$this->load->view('admin_footer');
			
			}
		else{
			$data['error'] = "You must Login first";
			$this->load->view('Admin_login',$data);
			}		
	}
	
	public function award_delete()
	{
		$this->load->model('awards_model');
		$this->awards_model->delete();
		redirect('index.php/administrator/awards');
	}
	
	public function award_form()
	{
 		$this->load->model('admin_login');
		$data['pass'] = $this->admin_login->jumpcheck();
		
		$this->load->model('awards_model');
		$data['awards_options'] = $this->awards_model->getall();
		$data['error'] = "";
		$data['active'] = "6";
		if($data['pass'] == 1){
			
			$this->load->view('admin_header',$data);
			$this->load->view('admin_submit_award',$data);
			$this->load->view('admin_footer');
			}
		else{
			$data['error'] = "You must Login first";
			$this->load->view('Admin_login',$data);
			}		
	}
	
	public function search_student()
	{
		
		$this->load->model('awards_model');
		$this->awards_model->student_list();
		
	}
	
	public function submit_award()
	{
 		$this->load->model('admin_login');
		$data['pass'] = $this->admin_login->jumpcheck();	
		$this->load->model('awards_model');
		$data['awards'] = $this->awards_model->getall();
		$data['msg'] = $this->awards_model->submit();
		$data['error'] = "";
		$data['active'] = "6";
		if($data['pass'] == 1){
			
			redirect('index.php/administrator/award_form');
			
			}
		else{
			$data['error'] = "You must Login first";
			$this->load->view('Admin_login',$data);
			}		
	}
	
	public function award_manage()
	{
 		$this->load->model('Awards_model');
		$this->Awards_model->award_modal();	
		
	}
	
	public function update_award()
	{
		$this->load->model('awards_model');
		$this->awards_model->update();
		redirect('index.php/administrator/awards');
	}
				
	public function event_search()
	{
 		$this->load->model('admin_login');
		$data['pass'] = $this->admin_login->jumpcheck();
		
		$this->load->model('events_model');
		$data['events'] = $this->events_model->category();
		$data['error'] = "";
		$data['active'] = "6";
		if($data['pass'] == 1){
			
			$this->load->view('admin_header',$data);
			$this->load->view('admin_events',$data);
			$this->load->view('admin_footer');
			
			}
		else{
			$data['error'] = "You must Login first";
			$this->load->view('Admin_login',$data);
			}		
	}
	
	public function event_form()
	{
 		$this->load->model('admin_login');
		$data['pass'] = $this->admin_login->jumpcheck();
		
		$this->load->model('events_model');
		$data['msg'] = "";
		$data['error'] = "";
		$data['active'] = "6";
		if($data['pass'] == 1){
			
			$this->load->view('admin_header',$data);
			$this->load->view('event_registration',$data);
			$this->load->view('admin_footer');
			
			}
		else{
			$data['error'] = "You must Login first";
			$this->load->view('Admin_login',$data);
			}		
	}
	
	public function account_list()
	{
 		$this->load->model('admin_login');
		$this->load->model('account_list');
		$data['pass'] = $this->admin_login->jumpcheck();
		$data['active'] = 0;
		if($data['pass'] == 1){
			
			$this->load->library('pagination');
			$config['base_url'] = base_url()."index.php/administrator/account_search";
			$config['per_page'] = 5;
			$config['num_links'] = 5;
			$config['total_rows'] = 0;
			$config['reuse_query_string'] = TRUE;
			$config['uri_segment'] = 3;
			$this->pagination->initialize($config);
			$this->load->view('admin_header',$data);
			$this->load->view('admin_account_list',$data);
			$this->load->view('admin_footer');
			
			}
		else{
			$data['error'] = "You must Login first";
			$this->load->view('Admin_login',$data);
			}		
	}
	
	public function admin_list2()
	{
 		$this->load->model('admin_login');
		$data['pass'] = $this->admin_login->jumpcheck();
		$data['activate'] = 0;
		$data['active'] = "6";
		if($data['pass'] == 1){
			
			$this->load->library('pagination');
			
			
			$this->db->where('active', '1');
			$data['search'] = $this->db->get('admin_accounts', 5, $this->uri->segment(3));
			
			$config['base_url'] = base_url()."index.php/administrator/admin_search";
			$config['per_page'] = 5;
			$config['num_links'] = $data['search']->num_rows()/5;
			$config['total_rows'] = $this->db->get('admin_accounts')->num_rows();
			//$config['use_page_numbers'] = TRUE;
			//$config['page_query_string'] = TRUE;
			//$config['query_string_segment'] = 'offset';
			$config['reuse_query_string'] = TRUE;
			$config['uri_segment'] = 3;
			$this->pagination->initialize($config);

			
			
			$this->load->view('admin_header',$data);
			$this->load->view('admin_moderator_list',$data);
			$this->load->view('admin_footer');			
			}
		else{
			$data['error'] = "You must Login first";
			$this->load->view('Admin_login',$data);
			}		
	}
	
	public function deactivate_admin()
	{
			$this->load->model('account_list');
			$this->account_list->admin_deactivate();
			redirect('index.php/administrator/admin_list');
	}
	
	public function admin_p_reset()
	{
			$this->load->model('account_list');
			$this->account_list->admin_P_reset();
			redirect('index.php/administrator/admin_list');
	}
	
	public function admin_list()
	{
 		$this->load->model('admin_login');
		$this->load->model('Account_list');
		$data['Admin_list'] = $this->Account_list->admin_moderator_list();
		$data['pass'] = $this->admin_login->jumpcheck();
		$data['error'] = "";
		if($data['pass'] == 1){
			
			$this->load->view('admin_header',$data);
			$this->load->view('admin_moderator_list',$data);
			$this->load->view('admin_footer');
			}
		else{
			$data['error'] = "You must Login first";
			$this->load->view('Admin_login',$data);
			}		
	}
	
	public function account_manage()
	{
 		$this->load->model('Account_list');
		$this->Account_list->profile_modal();
	}
	
	public function account_search()
	{
 		$this->load->model('admin_login');
		$data['pass'] = $this->admin_login->jumpcheck();
		$this->load->model('Account_list');
		$data['Account_list'] = $this->Account_list->admin_account_search();
		$data['error'] = "";
		$data['active'] = 1;
		if($data['pass'] == 1){
				
			$this->load->view('admin_header',$data);
			$this->load->view('admin_account_list',$data);
			$this->load->view('admin_footer');
			
			}
		else{
			$data['error'] = "You must Login first";
			$this->load->view('Admin_login',$data);
			}		
	}
	
	public function event()
	{
 		$this->load->model('admin_login');
		$data['pass'] = $this->admin_login->jumpcheck();
		
		$this->load->model('Events_model');
		$data['events_list'] = $this->Events_model->admin_event();
		$data['error'] = "";
		$data['active'] = "";
		if($data['pass'] == 1){
			
			$this->load->view('admin_header',$data);
			$this->load->view('admin_events',$data);
			$this->load->view('admin_footer');
			}
		else{
			$data['error'] = "You must Login first";
			$this->load->view('Admin_login',$data);
			}		
	}
	
	public function event_delete()
	{
		$this->load->model('events_model');
		$this->events_model->delete();
		redirect('index.php/administrator/event');
	}
		
	public function event_manage()
	{
 		$this->load->model('Events_model');
		$this->Events_model->event_modal();
	}
	
	public function edit_event()
	{
		$this->load->model('events_model');
		$this->events_model->eventEdit();
		redirect('index.php/administrator/event');
	}
	
	public function award_give()
	{
		$this->load->model('awards_model');
		$this->awards_model->give();
		redirect('index.php/administrator/award_form');
	}
	
	public function reset_password()
	{
		$this->load->model('account_list');
		$this->account_list->P_reset();
		redirect('index.php/administrator/account_search');
		
	}
	
	public function reset_email()
	{
		$this->load->model('account_list');
		$this->account_list->E_reset();
		redirect('index.php/administrator/account_search');
	}
	
	public function reset_picture()
	{
		$this->load->model('account_list');
		$this->account_list->pic_reset();
		redirect('index.php/administrator/account_search');
	}
	
	public function logout()
	{
		$this->load->model('admin_login');
		$this->admin_login->TimeOut();
		$this->session->unset_userdata('admin_logged_in');
		redirect('index.php/administrator');
	}
	
	
		public function eval_searchstudent()
	{
 		$this->load->model('admin_login');
		$data['pass'] = $this->admin_login->jumpcheck();
		$this->load->model('Admin_rmusic_studentsearch_model');
		$data['Student_Monitoring'] = $this->Admin_rmusic_studentsearch_model->searchstudent();
		$data['error'] = "";
		$data['active'] = 1;
		if($data['pass'] == 1){
				
			$this->load->view('admin_header',$data);
			$this->load->view('admin_rmusic_student',$data);
			$this->load->view('admin_footer');
			
			}
		else{
			$data['error'] = "You must Login first";
			$this->load->view('Admin_login',$data);
			}		
	}

		public function eval_results()
	{
 		$this->load->model('admin_login');
		$data['pass'] = $this->admin_login->jumpcheck();
		//$this->load->model('Admin_rmusic_studentsearch_model');
		//$data['Student_Monitoring'] = $this->Admin_rmusic_studentsearch_model->searchstudent();
		$data['error'] = "";
		$data['active'] = 1;
		if($data['pass'] == 1){
				
			$this->load->view('admin_header',$data);
			$this->load->view('admin_rmusic_result');
			$this->load->view('admin_footer');
			
			}
		else{
			$data['error'] = "You must Login first";
			$this->load->view('Admin_login',$data);
			}		
	}

	//HR MODULE 


		public function hr_student()
	{
 		$this->load->model('admin_login');
		$data['pass'] = $this->admin_login->jumpcheck();
		$this->load->model('Admin_student_hr_model');
		$data['Student_Monitoring'] = $this->Admin_student_hr_model->getstudentstatus();
		$data['error'] = "";
		$data['active'] = 1;
		if($data['pass'] == 1){
				
			$this->load->view('admin_header',$data);
			$this->load->view('admin_student_hr',$data);
			$this->load->view('admin_footer');
			
			}
		else{
			$data['error'] = "You must Login first";
			$this->load->view('Admin_login',$data);
			}		
	}


	//HR MODULE
	
}
