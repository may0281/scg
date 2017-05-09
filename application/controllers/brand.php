<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class brand extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
	
	}
	public function index()
	{
		$data['q'] = $this->car_model->BrandList();
		$data['model'] = $this->car_model->ModelList();
		$data['brand'] = $data['q'];
		$this->load->view('template/left');
		$this->load->view('brand_list',$data);

	}
	public function add()
	{
		$this->car_model->addBrand($this->input->post('name'));
		echo "<script>alert('Success!!');window.location.assign('".base_url()."car/brand');</script>";
	}
	public function addModel()
	{
		$this->car_model->addModel($this->input->post('name'),$this->input->post('brand_id'));
		echo "<script>alert('Success!!');window.location.assign('".base_url()."car/brand');</script>";
	}

	public function del($checked,$id)
	{
		$this->db->delete('car_brand', array('Id_Brand' => $id));
		echo "<script>window.location.assign('".base_url()."car/brand');</script>";

	}
	public function ModelDel($checked,$id)
	{
		$this->db->delete('car_model', array('Id_Type' => $id));
		echo "<script>window.location.assign('".base_url()."car/brand');</script>";

	}
	public function edit()
	{
		$this->car_model->editBrand($this->input->post('id'),$this->input->post('name'));
		echo "<script>alert('Success!!');window.location.assign('".base_url()."car/brand');</script>";
	}
	public function editModel()
	{
		$this->car_model->editModel($this->input->post('id'),$this->input->post('name'));
		echo "<script>alert('Success!!');window.location.assign('".base_url()."car/brand');</script>";
	}
	public function CustomModelList($id)
	{
		$this->car_model->CustomModelList($id);
		echo "<script>alert('Success!!');window.location.assign('".base_url()."car/brand');</script>";
	}

    public function selectModel($id)
    {
        $q = $this->car_model->SelectModelByBrandID($id);
        $data = array(
            'code' => 200,
            'data' =>  $q
        );
        echo json_encode($data);

    }
    public function checkImage()
    {
        echo '<pre>';
        $this->db->select('*');
        $this->db->from('car_pic');
        $query_pix = $this->db->get();
        foreach ($query_pix->result_array() as $allPic)
        {
            echo $allPic['Id_Pic'];
            $sql ="select count('Car_Id') as cc  from car_all  where Car_Id = ".$allPic['Id_Car_All_Id'];
            $query = $this->db->query($sql);
            foreach ($query->result_array() as $vc)
            {
                echo ' is ';
                print($vc['cc']);
                echo "<br>";
                if($vc['cc'] == 0)
                {
                    $this->db->delete('car_pic', array('Id_Pic' => $allPic['Id_Pic']));
                }
            }

        }

        foreach(glob('../images/img_car/*.*') as $filename){
            $dub = explode('/',$filename);
            $sql = "select count('Id_Pic') as cc  from car_pic  where Pic_Name = '".$dub[3]."'";
            $query_pixi = $this->db->query($sql);
            foreach ($query_pixi->result_array() as $allPixi)
            {
                if($allPixi['cc'] == 0)
                {
                    echo $dub[3]. ' IS NULL';
                    echo '<br>';
                    unlink("../images/img_car/".$dub[3]);
                }
                else{
                    echo $dub[3];
                    echo '<br>';
                }
            }
        }

    }
	
}
