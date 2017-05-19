<?php
class car_model extends ci_model
	{
	public function __constuct()
	{
		parent::__construct();
	}

    public function SelectModelByBrandID($id)
    {
        $this->db->select('Id_Type,Name_Type');
        $this->db->from('car_model');
        $this->db->where('Id_Brand', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

	public function BrandList()
	{
        $this->db->select('*');
        $this->db->from('car_brand');
        $query = $this->db->get();
        return $query->result_array();
	}
	public function ModelList()
	{
        $this->db->select('car_model.*,car_brand.Name_Brand as brand ');
        $this->db->from('car_model');
        $this->db->join('car_brand', 'car_model.Id_Brand = car_brand.Id_Brand','left');
        $query = $this->db->get();
        return $query->result_array();
	}
    public function CustomModelList()
	{
		$sql ="select model.*,brand.brand from model LEFT join brand on model.brand_id = brand.id order by id DESC LIMIT 500";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function addBrand($name)
	{
		$data = array(
		   'Name_Brand' => $name ,
		);

		$this->db->insert('car_brand', $data);
	}
	public function addModel($name,$id)
	{
		$data = array(
		   'Name_Type' => $name ,
		   'Id_Brand' => $id ,
		);
		$this->db->insert('car_model', $data);
	}
	public function enableBrand($id,$checked)
	{
		$data = array(
               'status' => $checked
            );
		$this->db->where('id', $id);
		$this->db->update('brand', $data);
	}
	public function enableModel($id,$checked)
	{
		$data = array(
               'status' => $checked
            );
		$this->db->where('id', $id);
		$this->db->update('model', $data);
	}
	public function editBrand($id,$name)
	{
		$data = array(
			'Name_Brand' => $name
		);
		$this->db->where('Id_Brand', $id);
		$this->db->update('car_brand', $data);
	}
	public function editModel($id,$name)
	{
		$data = array(
			'Name_Type' => $name
		);
		$this->db->where('Id_Type', $id);
		$this->db->update('car_model', $data);
	}
	public function NewCarList($type)
	{
        $this->db->select('car_all.Car_Status,car_all.Car_Id,car_all.Car_Condition,car_all.Car_Body,car_brand.Name_Brand,car_model.Name_Type as model');
        $this->db->from('car_all');
        $this->db->join('car_brand', 'car_all.Car_Brand = car_brand.Id_Brand','left');
        $this->db->join('car_model', 'car_all.Car_Model = car_model.Id_Type','left');
		$this->db->where('car_all.Car_Condition', $type);
		$this->db->order_by('car_all.Car_Id', 'desc');
		$query = $this->db->get();
		return $query->result_array();
	}
    public function loadMainImg($car_id){

        $this->db->select('Pic_Name');
        $this->db->from('car_pic');
        $this->db->where('Id_Car_All_Id', $car_id);
        $query = $this->db->get();
        $ret = $query->result_array();
        return $ret[0]['Pic_Name'];
    }
    public function insert($data)
    {
        $data = array_merge($data,array('Time_Add',date('Y-m-d')));
        $this->db->insert('car_all', $data);
        return $this->db->insert_id();
    }
	public function SelectCarById($car_id)
	{
		$this->db->select('car_all.*,car_brand.Name_Brand,car_model.Name_Type as model');
		$this->db->from('car_all');
		$this->db->join('car_brand', 'car_all.Car_Brand = car_brand.Id_Brand');
		$this->db->join('car_model', 'car_all.Car_Model = car_model.Id_Type');
		$this->db->where('car_all.Car_Id', $car_id);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function SelectGallery($id)
	{
		$sql ='select * from car_pic where Id_Car_All_Id = '.$id.' order by Id_Car_All_Id  asc';
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	public function insertgallery($data)
	{
		$this->db->insert('car_pic', $data);
	}
	public function updateCar($id,$data)
	{
		$this->db->where('Car_Id', $id);
		$this->db->update('car_all', $data);
	}
	
}