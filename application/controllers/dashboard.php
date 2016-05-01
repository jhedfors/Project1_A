<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		$this->load->model('dashboard_model');
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
			if($this->dashboard_model->login($post)){
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
			if($this->dashboard_model->register($post) && $this->dashboard_model->login($post)){
				redirect('travels');
			}
			redirect('unanticipated_error');
		}
	}

	public function check_preexisting_username($post_username){
		$record = $this->dashboard_model->show_by_username($post_username);
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
	public function travels_page(){
		$active_id = $this->session->userdata('active_id');
		$trips = $this->dashboard_model->get_all_trips($active_id);
		$this->load->view('travels_view',['trips'=> $trips]);
	}
	public function destination_page($id){
		$destination['details'] = $this->dashboard_model->show_destination_details($id);
		$destination['attendees'] = $this->dashboard_model->show_all_going_to_destination($id);
		$this->load->view('destination_view',['destination'=> $destination]);
	}
	public function join_trip($id){
		$this->dashboard_model->join_trip($id);
		redirect('travels');
	}
	public function add_destination_page(){
			$this->load->view('add_destination_view');
	}
	public function add_destination(){
		$post = $this->input->post();
		$this->form_validation->set_rules("destination", "Destination", "trim|required");
		$this->form_validation->set_rules("description", "Description", "trim|required");
		$this->form_validation->set_rules("start_date", "Date From", "trim|required|callback_future_date_check");
		$this->form_validation->set_rules("end_date", "Date To", "trim|required|callback_return_date_check");
		if($this->form_validation->run() === FALSE)		{
			$this->session->set_userdata('errors',[validation_errors()]);
			$this->load->view('add_destination_view');
		}
		else {
			die('valid date');
			$this->dashboard_model->add_destination($post);
			redirect('/travels');
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('/');
	}
}
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
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */


/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
