<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		error_reporting(0);
	}
	public function index()
	{		
		$this->load->view("login");
	}
	public function checklogin()
	{
		if($this->session->userdata('admin') != ''){
			echo "<script> window.location.assign('".base_url()."dashboard');</script>";
		}
		$pass = md5($this->input->post('password'));		
		$q = $this->login_model->chck_login($this->input->post('username'),$pass);
		//print_r($q);
		if($q)
			{
				$usname = $this->input->post('username');
				$this->session->set_userdata('admin',$usname);
				echo "<script>window.location='".base_url()."dashboard';</script>";
			}
		else
			{
				echo "<script>alert('Username or Password is wrong');history.back();</script>";
			}
			

	}
	public function change()
	{
		$user = $this->session->userdata('admin');
		$oldpass =  md5($this->input->post('oldpass'));
		$q = $this->login_model->chck_login($user,$oldpass);
		if($q){
			$data = array('Password' => $pass,);
			$this->db->where('username', $user);
			$this->db->update('accountadmin', $data);
			echo "<script>alert('Success!!! Your password has been changed');history.back();</script>";
		}else{ echo "<script>alert('Username or Password is wrong');window.location.assign('".base_url()."dashboard');</script>"; }
		

		
	}
	public function Logout()
	{		
		$this->session->unset_userdata('admin');
		echo "<script>alert('Success');window.location.assign('".base_url()."login');</script>";
	}
	
}