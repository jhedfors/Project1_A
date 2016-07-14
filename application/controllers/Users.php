<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		$this->load->model('user_model');
	}
	public function index()
	{
		$this->load->view('login_reg_view');
	}
	public function login(){
		$this->form_validation->set_rules("username", "User Name", "trim|required");
		$this->form_validation->set_rules("password", "Password", "trim|required");
		if($this->form_validation->run() === FALSE)		{
			$this->session->set_userdata('errors_login',[validation_errors()]);
			$this->load->view('login_reg_view');
		}
		else{
			$post = $this->input->post();
			if($this->user_model->login($post)){
				redirect('travels');
			}
			redirect('unanticipated_error');
		}
	}
	public function register(){
		$this->form_validation->set_rules("name", "Name", "trim|required|min_length[3]");
		$this->form_validation->set_rules("username", "Username", "trim|required|min_length[3]|callback_check_preexisting_username");
		$this->form_validation->set_rules("password", "Password", "trim|required|min_length[8]");
		$this->form_validation->set_rules("confirm_pw", "Confirmed Password", "trim|required|matches[password]");
		if($this->form_validation->run() === FALSE)		{
			$this->session->set_userdata('errors_reg',[validation_errors()]);
			$this->load->view('login_reg_view');
		}
		else{
			$post = $this->input->post();
			if($this->user_model->register($post) && $this->user_model->login($post)){
				redirect('travels');
			}
			redirect('unanticipated_error');
		}
	}

	public function check_preexisting_username($post_username){
		$record = $this->user_model->show_by_username($post_username);
		if($record){
			$this->form_validation->set_message('check_preexisting_username', '%s is already in use');
			return FALSE;
		}
		else {
			return TRUE;
		}
	}
	public function future_date_check($str){
		if($str< date("Y-m-d")){
			$this->form_validation->set_message('date_check', '%s must be in the future');
			return FALSE;
		}
		else {
			return TRUE;
		}
	}
	public function return_date_check($end){
		$start = $this->input->post('start_date');
		if(date($end)< date($start)){
			$this->form_validation->set_message('return_date_check', '%s must be after Date From');
			return FALSE;
		}
		else {
			return TRUE;
		}
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect('/');
	}
}
