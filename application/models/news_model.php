<?php
class news_model extends ci_model
	{
	public function __constuct()
	{
		parent::__construct();
        $this->db->query('SET character_set_connection=\'tis620\'');
        $this->db->query('SET character_set_results=\'tis620\'');
        $this->db->query('SET character_set_client=\'tis620\'');
	}

	public function all()
	{
        $this->db->query('SET character_set_connection=\'tis620\'');
        $this->db->query('SET character_set_results=\'tis620\'');
        $this->db->query('SET character_set_client=\'tis620\'');
        $this->db->select('*');
        $this->db->from('tb_new');
        $this->db->order_by('id_new','desc');
        $query = $this->db->get();
        return $query->result_array();
	}

	public function insert($data)
	{
		$this->db->insert('tb_new', $data);
		return $this->db->insert_id();
	}

	public function SelectNewsById($id)
	{
		$this->db->select('*');
		$this->db->from('tb_new');
		$this->db->where('id_new', $id);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function updateNews($id,$data)
	{
		$this->db->where('id_new', $id);
		$this->db->update('tb_new', $data);
	}

	
}