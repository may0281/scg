<?php
class service_model extends ci_model
	{
	public function __constuct()
	{
		parent::__construct();
	}

	

	public function SelectGallery($id)
	{
		$sql ='select * from gallery where service_id = '.$id.' order by id asc';
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	public function SelectByType($type)
	{
		$this->db->select('*');
		$this->db->from('service');
		$this->db->where('type', $type);
		$query = $this->db->get();
		return $query->result_array();
	}



	public function update($type,$data)
	{
		$this->db->where('type', $type);
		$this->db->update('service', $data);
	}
	
}