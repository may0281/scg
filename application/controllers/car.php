<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class car extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		error_reporting(0);
		
		if($this->session->userdata('admin') == ''){
			echo "<script> window.location.assign('".base_url()."login?ReturnUrl=".$_SERVER['REQUEST_URI']."');</script>";
		}
		$lang = $this->session->userdata("lang")==null?"thailand":$this->session->userdata("lang");
		$this->lang->load($lang,$lang);
		$this->load->library('resize');

	}
	public function CarList($type)
	{
		$data['type'] = $type;
        $data['q'] = $this->car_model->NewCarList($type);
        $this->load->view('template/left');
		$this->load->view('Car',$data);
	}
    public function add($type)
    {
        $data['type'] = $type;
        $data['brand_list'] = $this->car_model->BrandList();
        $data['model_list'] = $this->car_model->ModelList();
        $data['action'] = 'add';
        $this->load->view('template/left');
        $this->load->view('CarAdd',$data);
    }
    public function add_action()
    {

        if($_FILES['pdf']['name']) //check file upload
        {
            $file_name = strtotime(date('Y-m-d')).'.pdf';
            $this->upload_pdf($_FILES['pdf']['tmp_name'],$file_name);
        }
        $data = $this->input->post();
        $data = array_merge($data,array('Car_acc_crouse'=>$file_name));
        $car_id = $this->car_model->insert($data);
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
                    copy($fileupload,"../images/img_car/".$img);
                }
                $data = array(
                    'Id_Car_All_Id' => $car_id ,
                    'Pic_Name' => $img,
                );
                $this->car_model->insertgallery($data);
            }
        }
        echo "<script>alert('Success!!');window.location.assign('".base_url()."car/list/".$this->input->post('Car_Condition')."');</script>";
    }

	public function edit($car_id)
	{
		$data['brand_list'] = $this->car_model->BrandList();
		$data['model_list'] = $this->car_model->ModelList();
		$data['car_pic'] = $this->car_model->SelectGallery($car_id);
		$car = $this->car_model->SelectCarById($car_id);
        $data['car'] = $car[0];
        $data['action'] = 'edit';

		$this->load->view('template/left');
		$this->load->view('CarAdd',$data);
	}
	

	public function edit_action()
	{

		if($_FILES['pdf']) //check file upload
        {
        	unlink("../brochure/".$this->input->post('old_pdf'));
            $this->upload_pdf($_FILES['pdf']['tmp_name'],$_FILES['pdf']['name']);
            $pdf = $_FILES['pdf']['name'];
        }else
        {
        	$pdf = $this->input->post('old_pdf');
        }


		$data = $this->input->post();
		$data = array_merge($data,array('Car_acc_crouse'=>$pdf,'Time_Edit'=> date('Y-m-d')));
		$id = $this->input->post('id');
		unset($data['old_pdf']);
		unset($data['id']);
		unset($data['del']);

		$this->car_model->updateCar($id,$data);

				
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
							copy($fileupload,"../images/img_car/".$img);
							$data_gallery = array(
			                    'Id_Car_All_Id' => $this->input->post('id') ,
			                    'Pic_Name' => $img,
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
					$this->db->delete('car_pic', array('Id_Pic' => $exp[0]));
					unlink("../images/img_car/".$exp[1]);

				}
		}
		echo "<script>alert('Success!!');window.location.assign('".base_url()."car/list/".$this->input->post('Car_Condition')."');</script>";
	}
	
	public function Enable($checked,$id,$type)
	{
		$this->db->update('car_all', array('Car_Status' => $checked), array('Car_Id' => $id));
		echo "<script>window.location.assign('".base_url()."car/CarList/".$type."');</script>";
	}
	public function del($type,$id)
	{
		$sql ="select * from car_all where Car_Id = '".$id."' ";
		$query = $this->db->query($sql);
		foreach($query->result_array() as $arr){
			unlink("../brochure/".$arr['Car_acc_crouse']);
		}
		$sqlgallery ="select * from car_pic where Id_Car_All_Id = '".$id."' ";
		$query_gallery = $this->db->query($sqlgallery);
		foreach($query_gallery->result_array() as $arr_gallery){
			unlink("../images/img_car/".$arr_gallery['Pic_Name']);
		}
		$this->db->delete('car_all', array('Car_Id' => $id));
		$this->db->delete('car_pic', array('Id_Car_All_Id' => $id));
		echo "<script>window.location.assign('".base_url()."car/list/".$type."');</script>";
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
        $upload_path = "../brochure/".$name;
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