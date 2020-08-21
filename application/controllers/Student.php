<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {

	public function __construct() 
    {
		parent::__construct();
		$this->load->library('wirecard');
		$this->load->library('aub');
	}
	public function index()
	{
		
		$this->Main();
		
	}
	
	public function Main()
	{
		$data['error'] = "";
		$data['logged'] = $this->session->userdata('logged_in');
		
		if($data['logged'] == 1){
			
			redirect(base_url().'index.php/Student/event');
			
			}
		else{
			
			$data['pass'] = "1";
			$this->load->view('Portalhome',$data);
			
		}
			
	}
	
	public function login()
	{
		$this->load->model('User_login');
		$data['pass'] = $this->User_login->U_Log();
		$data['error'] = "";

		if($data['pass'] == 1){
			
			
			redirect(base_url().'index.php/Student/event');

		}
		else{
			$this->session->unset_userdata('logged_in');
			$data['error'] = "Invalid ID or Password";
			$this->load->view('Portalhome',$data);
		}
	}
	
	//**************************PROFILE PAGE****************************///
	public function Profile()
	{	
		$this->load->model('User_login');
		$data['pass'] = $this->User_login->jumpcheck();
		$data['Output'] = $this->User_login->Profile();
		$data['error'] = "";
		$data['active'] = "1";
		if($data['pass'] == 1){
			
			$this->load->view('User_header',$data);
			$this->load->view('User_profile',$data);
			$this->load->view('User_footer');

		}
		else{
			$data['error'] = "You must Login first";
			$this->load->view('Portalhome',$data);
			}	
	}
	//**************************PROFILE PAGE****************************///
	
	//**************************GRADES****************************///
	public function grades()
	{
 		
		$this->load->model('Grades_model');
		$this->load->model('Balance_model');
		$this->load->model('User_login');
		$data['pass'] = $this->User_login->jumpcheck();
		$data['error'] = "";
		$data['active'] = "2";

		$legend = $this->Balance_model->getLegend();
		$data['Bal_Schoolyear'] = $legend[0]['School_Year'];
		$data['Bal_Semester'] = $legend[0]['Semester'];

			
			$data['resultSY'] = $this->Grades_model->getSY();
			/*
			$data['Grade_Output'] = $this->Grades_model->getGrades();
			$data['All_Grades'] = $this->Grades_model->AllGrades();
			*/
	
			if($data['pass'] == 1){
				
				$this->load->view('User_header',$data);
				$this->load->view('User_grades',$data);
				$this->load->view('User_footer');
				}
			else{
				$data['error'] = "You must Login first";
				$this->load->view('Portalhome',$data);
				}	
		
		
	}
	public function get_sem(){
		
		//AJAX
		$this->load->model('Grades_model');
		$this->Grades_model->getSem();
		
		
	}
	//**************************GRADES****************************///
	
	
	
	//**************************BALANCE****************************///
	public function balance_old()
	{
 		$this->load->model('User_login');
		$this->load->model('Balance_model');
		$data['pass'] = $this->User_login->jumpcheck();
		$rn = $this->session->userdata('Reference_Number');
		//echo 'RN: '.$rn;
		$latestbal = $this->Balance_model->GetLatestBalDate_query($rn);
		if($latestbal->num_rows() == 0){
			//echo 'no result';
			return;
		}
		foreach($latestbal->result_array() as $latestbal_row){
			$sy = $latestbal_row['schoolyear'];
			$sem = $latestbal_row['semester'];
		}
		//echo $sy.' '.$sem.'<br>';
		$outstanding = $this->Balance_model->check_Outstandingbal($rn,$sy,$sem);
		$totalpaid = $this->Balance_model->check_totalpaid($rn,$sy,$sem);
		foreach($outstanding->result_array() as $outstanding_row){
			$ob = $outstanding_row['Fees'];
		}
		foreach($totalpaid->result_array() as $totalpaid_row){
			$tp = $totalpaid_row['AmountofPayment'];
		}
		//echo $ob.' '.$tp.'<br>';
		$bal_check = $ob - $tp;
		if($bal_check <= 0){
			$bal_check = 0.00;
		}

		//Old Acquisition of 
		$data['Output'] = $this->Balance_model->getbal();
		//$data['Sem'] = $this->Balance_model->getSem();
		//echo $ob.'-'.$tp.':'.$bal_check;

		$data['tp'] = $tp;
		$data['ob'] = $ob;
		$data['bal_check'] = $bal_check;
		$data['error'] = "";
		$data['active'] = "3";
		if($data['pass'] == 1){
			$this->load->view('User_header',$data);
			$this->load->view('User_balance',$data);
			$this->load->view('User_footer');
			}
		else{
			$data['error'] = "You must Login first";
			$this->load->view('Portalhome',$data);
			}		
	}
	public function balance(){

		$this->load->model('User_login');
		$this->load->model('Balance_model');
		//$rn = $this->session->userdata('Reference_Number');
		$legend = $this->Balance_model->getLegend();
		$data['Bal_Schoolyear'] = $legend[0]['School_Year'];
		$data['Bal_Semester'] = $legend[0]['Semester'];

		//echo 'rn:'.$rn.'-sy:'.$sy.'-sem'.$sem;
		/*
		$outstanding = $this->Balance_model->getOutstandingbal($rn,$sy,$sem);
		$totalpaid = $this->Balance_model->gettotalpaid($rn,$sy,$sem);
		$sembalance = $this->Balance_model->semestralbalance($rn,$sy,$sem);
		$totalpaidsem = $this->Balance_model->gettotalpaidsemester($rn,$sy,$sem);
		foreach($outstanding->result_array() as $outstanding_row){
			$ob = $outstanding_row['Fees'];
		}
		foreach($totalpaid->result_array() as $totalpaid_row){
			$tp = $totalpaid_row['AmountofPayment'];
		}
		foreach($sembalance->result_array() as $sembalance_row){
			$sembal = $sembalance_row['Fees'];
		}
		foreach($totalpaidsem->result_array() as $totalpaidsem_row){
			$sempaid = $totalpaidsem_row['AmountofPayment'];
		}
		$data['Outstanding_Balance'] = $ob-$tp;
		$data['Semestral_Balance'] = $sembal;
		$data['Sem_total_Paid'] = $sempaid;
		$data['Total_Paid'] = $sembal - $sempaid;
		*/


		$this->load->model('User_login');
		$data['pass'] = $this->User_login->jumpcheck();
		$data['error'] = "";
		$data['active'] = "3";
		if($data['pass'] == 1){
			$this->load->view('User_header',$data);
			$this->load->view('User_balance',$data);
			$this->load->view('User_footer');
			}
		else{
			$data['error'] = "You must Login first";
			$this->load->view('Portalhome',$data);
			}	

	}
	//**************************BALANCE****************************///
	
	//**************************SCHEDULE****************************///
	public function schedule()
	{
 		$this->load->model('User_login');
		$data['pass'] = $this->User_login->jumpcheck();
		
		$this->load->model('Schedule_model');
		//$data['Schedule_Output'] = $this->Schedule_model->getsched();
		$data['SYlist'] = $this->Schedule_model->SYchoice();
		$data['error'] = "";
		$data['active'] = "4";
		if($data['pass'] == 1){
			
			$this->load->view('User_header',$data);
			$this->load->view('User_schedule',$data);
			$this->load->view('User_footer');

		}
		else{
			$data['error'] = "You must Login first";
			$this->load->view('Portalhome',$data);
		}		
	}
	public function sched_sem(){
		
		//Ajax
		$this->load->model('Schedule_model');
		$this->Schedule_model->Sem_ajax();
		
		
	}
	//**************************SCHEDULE****************************///
	
	
	//**************************EVENTS****************************///
	public function event()
	{
 		$this->load->model('User_login');
		$data['pass'] = $this->User_login->jumpcheck();
		
		$this->load->model('Events_model');
		
		$data['events'] = $this->Events_model->announcement();
		$data['error'] = "";
		$data['active'] = "";
		if($data['pass'] == 1){
			$this->load->view('User_header',$data);
			$this->load->view('User_events',$data);
			$this->load->view('User_footer');
			}
		else{
			$data['error'] = "You must Login first";
			$this->load->view('Portalhome',$data);
			}		
	}
	public function view_announcement(){

		$id = $this->input->get('announcement_id');
		$this->load->model('Events_model');
		$data['announcement_content'] = $this->Events_model->announcement_content($id);

		$this->load->view('Announcement',$data);

	}
	//**************************EVENTS****************************///
	
	
	
	//**************************AWARDS****************************///
	public function awards()
	{
 		$this->load->model('User_login');
		$data['pass'] = $this->User_login->jumpcheck();
		$this->load->model('Awards_model');
		$data['awards'] = $this->Awards_model->getlist();
		$data['error'] = "";
		$data['active'] = "5";
		if($data['pass'] == 1){
			
			$this->load->view('User_header',$data);
			$this->load->view('User_awards');
			$this->load->view('User_footer');
			}
		else{
			$data['error'] = "You must Login first";
			$this->load->view('Portalhome',$data);
			}		
	}
	//**************************AWARDS****************************///
	

	//**************************AWARDS****************************///
	public function Clearance()
	{
 		$this->load->model('User_login');
		$data['pass'] = $this->User_login->jumpcheck();
		$data['error'] = "";
		$data['active'] = "6";
		if($data['pass'] == 1){
			
			$this->load->view('User_header',$data);
			$this->load->view('User_Clearance');
			$this->load->view('User_footer');
			}
		else{
			$data['error'] = "You must Login first";
			$this->load->view('Portalhome',$data);
			}		
	}
	//**************************AWARDS****************************///
	
	
	public function requirements()
	{
 		$this->load->model('User_login');
		$data['pass'] = $this->User_login->jumpcheck();
		$data['error'] = "";
		$data['active'] = "7";
		if($data['pass'] == 1){
			
			$this->load->view('User_header',$data);
			$this->load->view('User_requirements');
			$this->load->view('User_footer');
			}
		else{
			$data['error'] = "You must Login first";
			$this->load->view('Portalhome',$data);
			}		
	}
	
	//**************************ACCOUNT SETTINGS****************************///
	public function User_settings()
	{
 		$this->load->model('User_login');
		$data['pass'] = $this->User_login->jumpcheck();
		
		$this->load->model('Settings');
		$data['PW'] = $this->Settings->change_password();
		$data['E'] = "";
		$data['P_on'] = $this->Settings->passwordshow();
		$data['E_on'] = "panel-collapse collapse";
		$data['error'] = "";
		$data['active'] = "";
		$data['show'] = "";
		if($data['pass'] == 1){
			
			$this->load->view('User_header',$data);
			$this->load->view('User_settings',$data);
			$this->load->view('User_footer');
			}
		else{
			$data['error'] = "You must Login first";
			$this->load->view('Portalhome',$data);
			}		
	}
	
	public function email_change(){
	
		$this->load->model('Settings');
		$this->load->model('User_login');
		$data['pass'] = $this->User_login->jumpcheck();
		$data['E'] = $this->Settings->change_email();
		$data['PW'] = "";
		$data['E_on'] = $this->Settings->emailshow();
		$data['P_on'] = "panel-collapse collapse";
		$data['error'] = "";
		$data['active'] = "6";
		$data['show'] = "";
		if($data['pass'] == 1){
			
			$this->load->view('User_header',$data);
			$this->load->view('User_settings',$data);
			$this->load->view('User_footer');
			}
		else{
			$data['error'] = "You must Login first";
			$this->load->view('Portalhome',$data);
			}	
	}
	
	public function changepic(){
		$this->load->model('login_check');
		$this->load->model('Settings');
		$data['pass'] = $this->login_check->jumpcheck();
		$data['PW'] = $this->Settings->change_password();
		$data['E'] = "";
		$data['P_on'] = $this->Settings->passwordshow();
		$data['E_on'] = "panel-collapse collapse";
		$data['error'] = "";
		$data['active'] = "";
		$data['show'] = 1;
		if($data['pass'] == 1){
			
		$data['up'] = $this->Settings->changepic();
			
			
				
			redirect(base_url().'index.php/Student/User_settings');
		

			
		}
		else{
			$data['error'] = "You must Login first";
			$this->load->view('Portalhome',$data);
			}		
		}
	//**************************ACCOUNT SETTINGS****************************///
	
		
	//**************************RESUME BUILDER****************************///
	public function Resume_form()
	{	
		$this->load->model('User_login');
		$data['pass'] = $this->User_login->jumpcheck();
		$this->load->model('Awards_model');
		$data['awards'] = $this->Awards_model->getlist();
		$data['error'] = "";
		$data['active'] = "";
		if($data['pass'] == 1){
			
			$this->load->view('User_header',$data);
			$this->load->view('User_resume_builder');
			$this->load->view('User_footer');
			}
		else{
			$data['error'] = "You must Login first";
			$this->load->view('Portalhome',$data);
			}	
	}
	
	public function Resume_display()
	{	
		$this->load->model('User_login');
		$data['pass'] = $this->User_login->jumpcheck();
		$data['error'] = "";
		$data['active'] = "";
		if($data['pass'] == 1){
			
			
			$this->load->view('Resume_page');
			
			}
		else{
			$data['error'] = "You must Login first";
			$this->load->view('Portalhome',$data);
			}	
	}
	//**************************RESUME BUILDER****************************///
	
	
	//**************************DIARY****************************///
	public function Diary()
	{	
		$this->load->model('User_login');
		$this->load->model('Diary_model');
		$data['Diary_Output'] = $this->Diary_model->getlist();
		$data['pass'] = $this->User_login->jumpcheck();
		$data['error'] = "";
		$data['active'] = "";
		if($data['pass'] == 1){
			
			$this->load->view('User_header',$data);
			$this->load->view('User_diary');
			$this->load->view('User_footer');
			}
		else{
			$data['error'] = "You must Login first";
			$this->load->view('Portalhome',$data);
			}	
	}
	public function Diary_entry(){
		
		$this->load->model('User_login');
		$this->load->model('Diary_model');
		$this->Diary_model->newEntry();
		$data['pass'] = $this->User_login->jumpcheck();
		$data['error'] = "";
		$data['active'] = "";
		
		if($data['pass'] == 1){
		redirect(base_url().'index.php/Student/Diary');
		}else{
			$data['error'] = "You must Login first";
			$this->load->view('Portalhome',$data);
			}
		}
	public function Diary_edit(){
		$this->load->model('Diary_model');
		$this->Diary_model->edit();
		redirect(base_url().'index.php/Student/Diary');
		}
	public function Diary_delete(){
		$this->load->model('Diary_model');
		$this->Diary_model->delete();
		redirect(base_url().'index.php/Student/Diary');
		}	
	public function Diary_load(){
		
		//AJAX
		
		$this->load->model('Diary_model');
		$this->Diary_model->load();
	
		
		}
	//**************************DIARY****************************///
	
	//**************************VIOLATIONS****************************///
	public function Sanctions(){
			
		$this->load->model('User_login');
		$this->load->model('Sanctions_model');
		$data['Sanction_Output'] = $this->Sanctions_model->getlist();
		$data['pass'] = $this->User_login->jumpcheck();
		$data['error'] = "";
		$data['active'] = "6";
		if($data['pass'] == 1){
			
			$this->load->view('User_header',$data);
			$this->load->view('User_sanction',$data);
			$this->load->view('User_footer');
			} 
		else{
			$data['error'] = "You must Login first";
			$this->load->view('Portalhome',$data);
			}	
			
	  }
	//**************************VIOLATIONS****************************///
	
	//**************************NOTIFICATIONS****************************///
	public function Notif(){
		
		//AJAX
		$this->load->model('Notif');
		$this->Notif->Notify();

	  }
	public function delete_selected()
		{
		 $this->load->model('Notif');
		 $this->Notif->delete_selected();
		 redirect(base_url().'index.php/Student/Notification');
		 
		}
	public function delete_all()
		{
		 $this->load->model('Notif');
		 $this->Notif->delete_all();
		 redirect(base_url().'index.php/Student/Notification');
		 
		}
	public function Notification(){
		
		$this->load->model('Notif');
		$this->load->model('User_login');
		$data['Notif_list'] = $this->Notif->getList();
		$data['pass'] = $this->User_login->jumpcheck();
		$data['error'] = "";
		$data['active'] = "";
		if($data['pass'] == 1){
			
			$this->load->view('User_header',$data);
			$this->load->view('User_notification',$data);
			$this->load->view('User_footer');
			} 
		else{
			$data['error'] = "You must Login first";
			$this->load->view('Portalhome',$data);
			}	
		
		}
		
		public function Notif_bell(){
		
			//AJAX
			
			$this->load->model('Notif');
			$this->Notif->notif_bell2();
			
		
		}	
		public function Notif_read(){
			
			$this->load->model('Notif');
			$this->Notif->read();
			$this->Notification();
			
			}
	//**************************NOTIFICATIONS****************************///
			
	
	//**************************CURRICULUM****************************///	
	public function Curriculum(){
			
			
			$this->load->model('User_login');
			$this->load->model('Curriculum_model');
			$data['Cur_list'] = $this->Curriculum_model->getlist();
			$data['pass'] = $this->User_login->jumpcheck();
			$data['error'] = "";
			$data['active'] = "";
			if($data['pass'] == 1){
			
				$this->load->view('User_header',$data);
				$this->load->view('Curriculum_list',$data);
				$this->load->view('User_footer');
			} 
			else{
				$data['error'] = "You must Login first";
				$this->load->view('Portalhome',$data);
			}		
	  }
	public function get_curriculum(){
			
			//AJAX
			$this->load->model('User_login');
			$this->load->model('Curriculum_model');
			$data['pass'] = $this->User_login->jumpcheck();
			$data['error'] = "";
			$data['active'] = "";
			if($data['pass'] == 1){
			
				$data['list'] = $this->Curriculum_model->getcur();
			} 
			else{
				$data['error'] = "You must Login first";
				$this->load->view('Portalhome',$data);
			}		
		
	  }
	  //**************************CURRICULUM****************************///	
	  
	 
	//**************************PASSWORD RESET****************************///	
	public function Reset_password()
	{
		$this->load->model('Reset_password_model');
		$data['Form'] = $this->Reset_password_model->Form();
		$this->load->view('Restore_Password',$data);
		
		
	}
	public function Confirm_code()
	{
		$this->load->model('Reset_password_model');
		$data['Form'] = $this->Reset_password_model->Confirmation();
		$this->load->view('Restore_Password',$data);
		
		
	}
	public function Reset_Form()
	{
		$this->load->model('Reset_password_model');
		$data['Form'] = $this->Reset_password_model->Change_Password();
		$this->load->view('Restore_Password',$data);
		
		
	}
	public function Reset()
	{
		$input = $this->session->userdata('reset_rn');
		$input = str_replace("'","\&#39;",$input);
		$input = stripslashes($input);
		
		if(!empty($input)){
			
			
			$this->load->model('Reset_password_model');
			$data['Form'] = $this->Reset_password_model->Reset();
			$this->load->view('Restore_Password',$data);
			
			
		}else{
			
			$this->Reset_password();
			
			}
		
		
	}
	//**************************PASSWORD RESET****************************///	
	
	
	//**************************LOGOUT****************************///	
	public function logout()
	{
		
		$this->load->model('User_login');
		$this->User_login->TimeOut();
		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('Reference_Number');
		redirect(base_url().'index.php/Student/Main');
	}
	//**************************LOGOUT****************************///
	
	
	
	
	////// FAC_EVAL CONTROLLER ////
	 public function User_Faculty_Eval()
	 
	 
	{ 
	
	//////  FACULTY EVAL  ////
	
	$this->load->model('User_login');
		$data['pass'] = $this->User_login->jumpcheck();
		$data['error'] = "";
		$data['active'] = "1";
		if($data['pass'] == 1){
	
	  $this->load->model('User_faculty_evaluation');
	    $data['geti'] = $this->User_faculty_evaluation->getinstructors();
		$this->load->view('User_header',$data);
		$this->load->view('User_Faculty_Eval',$data);
		$this->load->view('User_footer');
		}
		else{
			$data['error'] = "You must Login first";
			$this->load->view('Portalhome',$data);
			}			
		//////  FACULTY EVAL  ////
	}
	
	
	////// FAC_EVAL SATEFORM ////

	
	
	 public function  User_Sate_Form()
	 
	 
	{   
	
		$this->load->model('User_login');
		$data['pass'] = $this->User_login->jumpcheck();
		$data['error'] = "";
		$data['active'] = "1";
		if($data['pass'] == 1){
	
	
	
	   $this->load->model('user_sate_form_model');
	    $data['geta'] = $this->user_sate_form_model->getareas();
		$this->load->view('User_header',$data);
		$this->load->view('User_Sate_Form',$data);
		$this->load->view('User_footer');
		
		}
		else{
			$data['error'] = "You must Login first";
			$this->load->view('Portalhome',$data);
			}			
		
		////// FAC_EVAL SATEFORM ////
		
	}
	
	
	
	
	
        public function  Fac_Eval_Insert()
		{
		
	    
	    $this->load->model('User_sate_form_model');
	    $this->User_sate_form_model->Inserting();
		redirect(base_url().'index.php/Student/User_Faculty_Eval');
		//$this->User_Faculty_Eval();
	    	
		
		}
	
	////// FAC_EVAL CONTROLLER ////
	

	////// RMUSIC AND CUSTOM////
	
	public function  Customer_Satisfactory()
	{
	
		$this->load->model('User_login');
		$data['pass'] = $this->User_login->jumpcheck();
		$data['error'] = "";
		$data['active'] = "1";
		if($data['pass'] == 1){
		
		$this->load->model('User_cus_sat_model');
		$data['getform'] = $this->User_cus_sat_model->getform();
		$this->load->view('User_header',$data);
		$this->load->view('User_Customer_Eval',$data);
		$this->load->view('User_footer');
			
		}else{

			$data['error'] = "You must Login first";
			$this->load->view('Portalhome',$data);
			
		}
	}
	
	public function Insert_Answer()
                         {
                       
	                     $this->load->model('User_cus_sat_model');
				         $this->User_cus_sat_model->Evaluation_Insert();
				        redirect(base_url().'index.php/Student/Profile');
                         }
       
	   ////// RMUSIC AND CUSTOM////
	private function payreg(){

		$currency = 'USD';
		$amount = '1000';
		$paymentMethod = 'creditcard';
		$paymentdetails = '{
			"payment": {
			  "merchant-account-id": {
				"value": "53f2895a-e4de-4e82-a813-0d87a10e55e6"
			  },
			  "account-holder": {
				"first-name": "'.$this->session->userdata('First_Name').'",
				"last-name": "'.$this->session->userdata('Last_Name').'"
			  },
			  "request-id": "",
			  "requested-amount": {
				"value": '.$amount.',
				"currency": "'.$currency.'"
			  },
			  "transaction-type": "purchase",
			  "three-d": {
				"attempt-three-d": "true"
			  },
			  "notifications": {
				"format": "application/xml",
				"notification": [
				  {
					"url": "wpp-integration-demo-php/src/result/notify.php"
				  }
				]
			  },
			  "payment-methods": {
				"payment-method": [
				  {
					"name": "'.$paymentMethod.'"
				  }
				]
			  },
			  "success-redirect-url": "SDCAPORTAL/index.php/Student/PaymentStatusMessage/success",
			  "fail-redirect-url": "SDCAPORTAL/index.php/Student/PaymentStatusMessage/fail",
			  "cancel-redirect-url": "SDCAPORTAL/index.php/Student/PaymentStatusMessage/cancel"
			},
			"options": {
			  "frame-ancestor": ""
			}
		  }';
		$payload = $this->wirecard->modifyPayload($paymentdetails);//createPayload($paymentMethod);
		$payload['options']['frame-ancestor'] = getBaseUrl();
		$this->wirecard->retrievePaymentRedirectUrl($payload, $paymentMethod);

		//redirect(base_url().'src/register/embedded?method=creditcard');
		
	}
	public function Payment(){

		$this->load->model('User_login');
		$data['pass'] = $this->User_login->jumpcheck();
		$data['error'] = "";
		$data['active'] = "6";
		if($data['pass'] == 1){

		//Sets up the payment link
		$this->payreg();

		$this->load->view('User_header',$data);
		$this->load->view('User_payment',$data);
			
		}else{

			$data['error'] = "You must Login first";
			$this->load->view('Portalhome',$data);
			
		}

	}
	public function PaymentStatusMessage($status = ''){

		if($status == ''){
			return '';
		}
		if($status == 'success'){
			$this->session->set_flashdata('message','Payment was successful!');
		}
		if($status == 'fail'){
			$this->session->set_flashdata('message','Payment Failed and did not proceed');
			return 'Payment Failed and did not proceed';
		}
		if($status == 'cancel'){
			$this->session->set_flashdata('message','Payment was cancelled');
		}
		redirect(base_url().'index.php/Student/Payment');
		
	}
	public function paymentconfirm(){


		$this->load->model('User_login');
		$this->load->model('Balance_model');
		$data['pass'] = $this->User_login->jumpcheck();
		$data['error'] = "";
		$data['active'] = "3";
		$data['posts'] = "";

		$legend = $this->Balance_model->getLegend();
		$data['Bal_Schoolyear'] = $legend[0]['School_Year'];
		$data['Bal_Semester'] = $legend[0]['Semester'];
		if(empty($_REQUEST)){
			redirect(base_url().'index.php/Student/balance');
		}
		if($data['pass'] == 1){

			//Setup of POST requests
			foreach($_REQUEST as $name => $value){
				$params[$name] = $value;
			}
			foreach($params as $name => $value) {
				$data['posts'] .= "<input type=\"hidden\" id=\"" . $name . "\" name=\"" . $name . "\" value=\"" . $value . "\"/>\n";
			}
			$data['posts'] .= "<input type=\"hidden\" id=\"signature\" name=\"signature\" value=\"" . $this->aub->sign($params) . "\"/>\n";
			$data['amount'] = $params['amount'];
			//Sets up the payment link
			$this->load->view('User_header',$data);
			$this->load->view('User_aub_paymentconfirm',$data);
			
		}else{

			$data['error'] = "You must Login first";
			$this->load->view('Portalhome',$data);
			
		}

		

		/*
		echo '<fieldset id="confirmation"><legend>Review Payment Details</legend>';
		foreach($params as $name => $value){
			echo "<div>";
			echo "<b class=\"fieldName\">" . $name . "</b>: <span class=\"fieldValue\">" . $value . "</span>";
			echo "</div>\n";
		}
		echo '</fieldset>';
		*/
		/*
		echo '<form id="payment_confirmation" action="https://testsecureacceptance.cybersource.com/pay" method="post"/>';
		foreach($params as $name => $value) {
            echo "<input type=\"text\" id=\"" . $name . "\" name=\"" . $name . "\" value=\"" . $value . "\"/>\n";
			echo '<br>';
		}
        echo "<input type=\"text\" id=\"signature\" name=\"signature\" value=\"" . $this->aub->sign($params) . "\"/>\n";
		echo '<br>';
		echo '<button type="submit" id="submit" value="Confirm" class="btn btn-info btn-lg">PAY NOW</button>';
		echo '</form>';
		*/
		
	}

	
}
?>