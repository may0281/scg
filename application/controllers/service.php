<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class service extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		error_reporting(0);

		if ($this->session->userdata('admin') == '') {
			echo "<script> window.location.assign('" . base_url() . "login?ReturnUrl=" . $_SERVER['REQUEST_URI'] . "');</script>";
		}
		$this->load->library('resize');
		$this->load->model('service_model');
		$this->load->view('template/left');

	}

	public function index()
	{
		$data['q'] = $this->service_model->SelectByType('service');
        $data['gallery'] = $this->service_model->SelectGallery(1);
        $data['type'] = 'service';
        $this->load->view('service',$data);
	}

    public function edit()
    {
        
        $data = array(
            'description' => $this->input->post('description'),
            'video' => $this->input->post('video'),

        );
        $this->service_model->update($this->input->post('type'),$data);


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
                        'service_id' => '1' ,
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
        echo "<script>alert('Success!!');window.location.assign('".base_url()."service');</script>";

    }
    

}
