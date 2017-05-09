<?php
class news_model extends ci_model
	{
	public function __constuct()
	{
		parent::__construct();
	}

	public function all()
	{
		$sql ="select a.*,b.title as type from news a left join news_type b on a.type_id = b.id where type_id != 13 order by ID DESC LIMIT 500";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	public function getNewsType()
	{
		$this->db->select('*');
		$this->db->from('news_type');
		$this->db->where('status', 1);
		$this->db->where('id !=', 13);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function insert($data)
	{
		$this->db->insert('news', $data);
		return $this->db->insert_id();
	}
	public function SelectGallery($id)
	{
		$this->db->select('*');
		$this->db->from('gallery');
		$this->db->where('new_id', $id);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function SelectNewsById($id)
	{
		$this->db->select('news.*,news_type.title as type');
		$this->db->from('news');
		$this->db->join('news_type', 'news.type_id = news_type.id','left');
		$this->db->where('news.id', $id);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function updateNews($id,$data)
	{
		$this->db->where('id', $id);
		$this->db->update('news', $data);
	}

	
}