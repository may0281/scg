<?php
class slide_model extends ci_model
	{
	public function __constuct()
	{
		parent::__construct();
	}
	
	public function listSlide()
	{
		$this->db->select('*');
		$this->db->from('tb_slide');

		$query = $this->db->get();

		return $query->result_array();
	}

	public function selectSlideById($id)
	{
		$this->db->select('*');
		$this->db->from('tb_slide');
		$this->db->where('id', $id);
		$query = $this->db->get();

		return $query->result_array();
	}
	public function insertData($data)
	{
		$this->db->insert('tb_slide', $data);
	}
	public function updateSlide($id,$data)
	{
		$this->db->where('id', $id);
		$this->db->update('tb_slide', $data);
	}
	
}