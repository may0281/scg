<?php
class celebrate_model extends ci_model
	{
	public function __constuct()
	{
		parent::__construct();
	}

	public function all()
	{
		$sql ="select a.*,c.start_date,c.end_date from news a 
				left join news_type b on a.type_id = b.id 
				left join config_event c on a.id = c.event_id
				where type_id = 13 order by ID DESC LIMIT 500";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	
	public function insert($data)
	{
		$this->db->insert('news', $data);
		return $this->db->insert_id();
	}
	
	public function  InsertConfigEvent($data)
	{
		$this->db->insert('config_event', $data);
		return $this->db->insert_id();
		
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
	public function SelectConfigById($id)
	{
		$this->db->select('*');
		$this->db->from('config_event');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function update($id,$data)
	{
		$this->db->where('id', $id);
		$this->db->update('news', $data);
	}
	public function update_config($id,$data)
	{
		$this->db->where('id', $id);
		$this->db->update('config_event', $data);
	}
	
	

	
}