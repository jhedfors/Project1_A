<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {
	public function __construct(){
		$this->load->helper('security');
	}
	public function login($post){
		$record = $this->show_by_username($post['username']);
		if($record['password'] == do_hash($post['password'])){
			$first_name = '';
			$name = $record['name'];
			for ($i=0; $i < strlen($name); $i++) {
				if ($name[$i] == ' ') {
					break;
				}
				else {
					$first_name.=$name[$i];
				}
			}
			$this->session->set_userdata('active_id' ,$record['id']);
			$this->session->set_userdata('first_name' ,$first_name);
			return true;
		}
		else{
			die('do we get here?');
		return false;
		}
	}
	public function register($post){
		$pw_hash = do_hash($post['password']);
		$query = "insert into users (name, username, password,created_at, modified_at) values(?,?,?,NOW(),NOW())";
		$values =
			 ["{$post['name']}","{$post['username']}","{$pw_hash}"];
		$this->db->query($query, $values);
		return true;
	}
	public function show_all_users(){
		$query = "SELECT * FROM users";
		return $this->db->query($query)->result_array();
	}
	public function show_by_username($username){
		$query =
			"SELECT * FROM users WHERE username = ?";
		$values = [$username];
		return $this->db->query($query,$values)->row_array();
	}
}
