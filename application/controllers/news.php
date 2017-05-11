<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class news extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		error_reporting(0);

		if ($this->session->userdata('admin') == '') {
			echo "<script> window.location.assign('" . base_url() . "login?ReturnUrl=" . $_SERVER['REQUEST_URI'] . "');</script>";
		}
		$this->load->library('resize');
		$this->load->model('news_model');
		$this->load->view('template/left');
        $this->type_news = array(
            1 => 'ป้ายแดงต่างประเทศ',
            2 => 'ข่าวสารรถยนต์',
            3 => 'กิจกรรมเพื่อสังคม',
            4 => 'ข่าวสาร Hot car',
        );
	}

	public function index()
	{
		$data['q'] = $this->news_model->all();
		$data['type'] = $this->type_news;
		$this->load->view('News',$data);
	}
    public function add($type)
    {

        $data['type_list'] = $this->type_news;
        $this->load->view('template/left');
        $this->load->view('NewsAdd',$data);
    }
    public function add_action()
    {
        $CoverImage = null;
        if($_FILES['coverimg']['name']) //check file upload
        {
            $dest = "../images/img_news/";
            $CoverImage = strtotime(date("Y-m-d H:i:s")) . '.' . $this->resize->filetype($_FILES['coverimg']['type']);
            $this->upload($dest, $CoverImage, 'coverimg');
        }
        $data = $this->input->post();
        $more = array(
            'photo_new'=> $CoverImage,
            'date_new' => date('Y-m-d'),
            'time_new' => date('H:i:s'),
            );
        $data = array_merge($data,$more);
        $this->news_model->insert($data);
        echo "<script>alert('Success!!');window.location.assign('".base_url()."news/');</script>";

    }
    public function edit($id)
    {
        if($id == null )
        {
            echo  "<script>alert('ระบบเกิดข้อผิดพลาด กรุณาลองไหม่อีกครั้ง');window.location.assign('".base_url()."news/');</script>";
        }
        $data['type_list'] = $this->type_news;
        $data['news'] = $this->news_model->SelectNewsById($id);
        if($data['news']){
            $this->load->view('template/left');
            $this->load->view('NewsEdit', $data);
        }else{
            echo "<script>alert('ระบบเกิดข้อผิดพลาด กรุณาลองไหม่อีกครั้ง');window.location.assign('".base_url()."news/');</script>";
        }
    }
    public function edit_action()
    {
        if($_FILES['coverimg']['name']) //check file upload
        {
            unlink("../images/img_news/".$this->input->post('coverimg_old'));
            $dest = "../images/img_news";
            $CoverImage = strtotime(date("Y-m-d H:i:s")).'.'.$this->resize->filetype($_FILES['coverimg']['type']);
            $this->upload($dest,$CoverImage,'coverimg');

        }else{
            $CoverImage = $this->input->post('coverimg_old');
        }
        $data = $this->input->post();
        $more = array(
            'photo_new'=> $CoverImage,
            'date_new' => date('Y-m-d'),
            'time_new' => date('H:i:s'),
        );
        $data = array_merge($data,$more);
        $this->news_model->updateNews($this->input->post('id_new'),$data);

        echo "<script>alert('Success!!');window.location.assign('".base_url()."news/');</script>";

    }

	public function del($id)
	{
		$sql ="select * from tb_new where id_new = '".$id."' ";
		$query = $this->db->query($sql);
		foreach($query->result_array() as $arr){
			unlink("../images/img_news/".$arr['photo_new']);
		}

		$this->db->delete('tb_new', array('id_new' => $id));
		echo "<script>window.location.assign('".base_url()."news/');</script>";
	}
    public function enable($checked,$id)
    {
        $this->db->update('news', array('status' => $checked), array('id' => $id));
        echo "<script>window.location.assign('".base_url()."news');</script>";
    }
    protected function upload($dest,$filename,$field)
    {
        $config['upload_path'] = $dest;
        $config['allowed_types'] = 'gif|jpg|png';
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
    protected function upload_pdf($pdf,$name) {
        $upload_path = "../pdf/".$name.".pdf";
        move_uploaded_file($pdf,$upload_path);
    }
    protected function resize($sourcefile,$width,$height,$destfile)
    {
        $this->load->library('image_lib');
        $config['image_library'] = 'gd2';
        $config['source_image'] = $sourcefile;
        $config['new_image']	= $destfile;
        $config['create_thumb'] = false;
        $config['maintain_ratio'] = TRUE;
        $config['width']     = $width;
        $config['height']   = $height;

        $this->image_lib->initialize($config);
        $this->image_lib->resize();
        $this->image_lib->clear();

    }
}
