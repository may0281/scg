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

	}

	public function index()
	{
		$data['q'] = $this->news_model->all();
		$this->load->view('News',$data);
	}
    public function add($type)
    {
        $data['type_list'] = $this->news_model->getNewsType();
        $this->load->view('template/left');
        $this->load->view('NewsAdd',$data);
    }
    public function edit($id)
    {
        if($id) {
            $data['type_list'] = $this->news_model->getNewsType();
            $data['gallery'] = $this->news_model->SelectGallery($id);
            $data['news'] = $this->news_model->SelectNewsById($id);
            if($data['news']){
                $this->load->view('template/left');
                $this->load->view('NewsEdit', $data);
            }else{
                echo "<script>alert('ระบบเกิดข้อผิดพลาด กรุณาลองไหม่อีกครั้ง');window.location.assign('".base_url()."news/');</script>";
            }
        }else{
            echo "<script>alert('ระบบเกิดข้อผิดพลาด กรุณาลองไหม่อีกครั้ง');window.location.assign('".base_url()."news/');</script>";

        }
    }
    public function edit_action()
    {
        if($_FILES['coverimg']['name']) //check file upload
        {
            unlink("../images/".$this->input->post('coverimg_old'));
            unlink("../images/Thumbnails/".$this->input->post('coverimg_old'));
            $dest = "../images/";
            $CoverImage = strtotime(date("Y-m-d H:i:s")).'.'.$this->resize->filetype($_FILES['coverimg']['type']);
            $this->upload($dest,$CoverImage,'coverimg');
            $sourcefile = $dest.$CoverImage;
            $destfile = $dest.'Thumbnails/'.$CoverImage;
            $this->resize($sourcefile,800,600,$destfile);
        }else{
            $CoverImage = $this->input->post('coverimg_old');
        }



        $data = array(
            'type_id' => $this->input->post('type'),
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'video' => $this->input->post('video'),
            'image' => $CoverImage,
        );
        $this->news_model->updateNews($this->input->post('id'),$data);
        if (isset($_FILES['my_file'])) {
            $myFile = $_FILES['my_file'];
            $fileCount = count($myFile["name"]);
            for ($j = 0; $j < $fileCount; $j++) {
                $array_last=explode(".",$myFile["name"][$j]);
                $c=count($array_last)-1;
                $lastname=strtolower($array_last[$c]) ;
                $img =  $j.strtotime(date("Y-m-d H:i:s")).".".$lastname;
                $fileupload=$myFile["tmp_name"][$j];
                if ($lastname=="jpg" or $lastname=="png" or $lastname=="gif") //จำกัดนามสกุลไฟล์ที่จะ upload ได้
                {
                    copy($fileupload,"../images/".$img);
                    $data_gallery = array(
                        'new_id' => $this->input->post('id') ,
                        'image' => $img,
                        'created_at' => date('Y-m-d H:i:s'),
                    );
                    $this->car_model->insertgallery($data_gallery);
                }
            }
        }
        $del = $this->input->post('del');
        if($del){
            foreach($del as $d)
            {
                $exp = explode('&', $d);
                $this->db->delete('gallery', array('id' => $exp[0]));
                unlink("../images/".$exp[1]);

            }
        }
        echo "<script>alert('Success!!');window.location.assign('".base_url()."news/');</script>";

    }
    public function add_action()
    {
        if($_FILES['coverimg']['name']) //check file upload
        {
            $dest = "../images/";
            $CoverImage = strtotime(date("Y-m-d H:i:s")) . '.' . $this->resize->filetype($_FILES['coverimg']['type']);
            $this->upload($dest, $CoverImage, 'coverimg');
            $sourcefile = $dest . $CoverImage;
            $destfile = $dest . 'Thumbnails/' . $CoverImage;
            $this->resize($sourcefile, 800, 600, $destfile);
        }

        $data = array(
            'type_id' => $this->input->post('type'),
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'video' => $this->input->post('video'),
            'image' => $CoverImage,
            'created_at' => date('Y-m-d H:i:s'),
            'status'=> 1
        );
        $news_id = $this->news_model->insert($data);
        if (isset($_FILES['my_file'])) {
            $myFile = $_FILES['my_file'];
            $fileCount = count($myFile["name"]);
            for ($j = 0; $j < $fileCount; $j++) {
                $array_last=explode(".",$myFile["name"][$j]);
                $c=count($array_last)-1;
                $lastname=strtolower($array_last[$c]) ;
                $img =  $j.strtotime(date("Y-m-d H:i:s")).".".$lastname;
                $fileupload=$myFile["tmp_name"][$j];
                if ($lastname=="jpg" or $lastname=="png" or $lastname=="gif") //จำกัดนามสกุลไฟล์ที่จะ upload ได้
                {
                    copy($fileupload,"../images/".$img);
                    $data_gallery = array(
                        'new_id' => $news_id ,
                        'image' => $img,
                        'created_at' => date('Y-m-d H:i:s'),
                    );
                    $this->car_model->insertgallery($data_gallery);
                }
            }
        }
        
        echo "<script>alert('Success!!');window.location.assign('".base_url()."news/');</script>";

    }
	public function del($id)
	{
		$sql ="select * from news where id = '".$id."' ";
		$query = $this->db->query($sql);
		foreach($query->result_array() as $arr){
			unlink("../images/".$arr['image']);
			unlink("../images/Thumbnails/".$arr['image']);
		}
		$sqlgallery ="select * from gallery where new_id = '".$id."' ";
		$query_gallery = $this->db->query($sqlgallery);
		foreach($query_gallery->result_array() as $arr_gallery){
			unlink("../images/".$arr_gallery['image']);
		}
		$this->db->delete('news', array('id' => $id));
		$this->db->delete('gallery', array('new_id' => $id));
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
