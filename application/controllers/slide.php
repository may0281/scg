<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class slide extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        $lang = $this->session->userdata("lang")==null?"thailand":$this->session->userdata("lang");
        $this->lang->load($lang,$lang);
        date_default_timezone_set('Asia/Bangkok');
    }

    public function index()
    {
        $this->load->model('slide_model');
        $data['q'] = $this->slide_model->listSlide();
        $this->load->view('template/left');
        $this->load->view("slide",$data);

    }
    public function add()
    {
        $data['q'] = array();
        $data['action'] = 'add_action';
        $this->load->view('template/left');
        $this->load->view("slideAdd",$data);

    }
    public function edit($id)
    {
        $this->load->model('slide_model');
        $data['q'] = $this->slide_model->selectSlideById($id);
        $data['action'] = 'edit_action';
        $this->load->view('template/left');
        $this->load->view("slideAdd",$data);

    }
    public function add_action()
    {
        if($_FILES['coverimg']['name'] == null)
        {
            echo "<script>alert('กรุณาเลือกไฟล์');window.location.assign('".base_url()."slide/add');</script>";
            exit();
        }
        if($_FILES['coverimg']['type'] != 'image/jpeg' and $_FILES['img']['type'] != 'image/png'){
            echo "<script>alert('ใช้ได้เฉพาะไฟล์ JPG และ  PNG เท่านั้น');window.location.assign('".base_url()."slide/add');</script>";
            exit();
        }

        if($_FILES['coverimg']['name']) //check file upload
        {
            $CoverImage = strtotime(date("Y-m-d H:i:s")).$_FILES['coverimg']['name'];
            $fileupload = $_FILES['coverimg']["tmp_name"];
            copy($fileupload,"../images/slide/".$CoverImage);
        }

        $data = array(
            'image'=> $CoverImage,
            'url' => $this->input->post('url') ,
            'special_txt_1' => $this->input->post('special_txt_1'),
            'special_txt_2' => $this->input->post('special_txt_2'),
            'special_txt_3' => $this->input->post('special_txt_3'),
            'special_txt_4' => $this->input->post('special_txt_4'),
            'special_txt_5' => $this->input->post('special_txt_5'),
            'design' => $this->input->post('type'),
        );
        $this->db->insert('tb_slide', $data);

        echo "<script>alert('Success!!');window.location.assign('".base_url()."slide/');</script>";
    }
    public function action()
    {
        if($_FILES['img']['type'] != 'image/jpeg' and $_FILES['img']['type'] != 'image/png'){
            echo "<script>alert('ใช้ได้เฉพาะไฟล์ JPG และ  PNG เท่านั้น');window.location.assign('".base_url()."slide/add');</script>";
        }

        if($_FILES['img']['name']) //check file upload
        {
            $dest = "images/slide/";
            $CoverImage = strtotime(date("Y-m-d H:i:s")).$_FILES['img']['name'];
            $this->upload($dest,$CoverImage,'img');
        }


        $data = array(
            'image'=> $CoverImage,
            'url' => $this->input->post('url') ,
            'special_txt_1' => $this->input->post('s_txt_1'),
            'special_txt_2' => $this->input->post('s_txt_2'),
            'special_txt_3' => $this->input->post('s_txt_3'),
            'special_txt_4' => $this->input->post('s_txt_4'),
            'special_txt_5' => $this->input->post('s_txt_5'),

        );
        $this->db->insert('tb_slide', $data);

        echo "<script>alert('Success!!');window.location.assign('".base_url()."slide/');</script>";

    }
    protected function upload($dest,$filename,$field)
    {
        $config['upload_path'] = $dest;
        $config['allowed_types'] = 'jpg|png';
        $config['max_size']	= '100000';
        $config['max_width']  = '3000';
        $config['max_height']  = '3000';
        $config['file_name']  = $filename;
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload($field))
        {
            return array('error' => $this->upload->display_errors());

        }
        else
        {
            return  array('upload_data' => $this->upload->data());

        }
        $this->image_lib->clear();
    }

    public function example($id){
        if($id > 5){
            redirect(base_url());
        }
        $this->load->view('example/ex_'.$id);
    }

    public function del($id){
        if($id == null){
            redirect(base_url());
        }
        $sql ="select * from tb_slide where id = '".$id."' ";
        $query = $this->db->query($sql);
        foreach($query->result_array() as $arr){
            unlink("images/slide/".$arr['image']);
        }

        $this->db->delete('tb_slide', array('id' => $id));
        echo "<script>window.location.assign('".base_url()."slide/');</script>";
    }

}