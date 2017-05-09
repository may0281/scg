<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class celebrate extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		error_reporting(0);

		if ($this->session->userdata('admin') == '') {
            echo "<script> window.location.assign('" . base_url() . "login?ReturnUrl=" . $_SERVER['REQUEST_URI'] . "');</script>";
        }
        $this->load->model('celebrate_model');
		$this->load->library('resize');


	}

	public function index()
	{
        $cele = $this->celebrate_model->SelectNewsById(8);
        $con = $this->celebrate_model->SelectConfigById(1);
        $data['celebrate'] = $cele[0];
        $data['con'] = $con[0];
        $this->load->view('template/left');
		$this->load->view('celebrateAdd',$data);
	}


    public function add_action()
    {
        $data_celebrate = array(
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'created_at' => date('Y-m-d H:i:s'),
            'status'=> 1
        );
        $data_event = array(
            'event_id' => 8,
            'start_date' => date("Y-m-d 00:00:00",strtotime($this->input->post('start_date'))) ,
            'end_date' => date("Y-m-d 23:59:59",strtotime($this->input->post('end_date'))) ,
            'status'=> 1
        );
        $this->celebrate_model->update(8,$data_celebrate);
        $this->celebrate_model->update_config(1,$data_event);

        echo "<script>alert('Success!!');window.location.assign('".base_url()."celebrate/');</script>";

    }
    

}
