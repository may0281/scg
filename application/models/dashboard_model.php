<?php
class dashboard_model extends ci_model
	{
	public function __constuct()
	{
		parent::__construct();
	}
	

	public function ads($type)
	{
		$sql ="select * from ads where Type = '".$type."' order by ID DESC ";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	public function chooses($id)
	{
		$sql ="select * from ads where ID = '".$id."' ";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function insertads($Company,$Link,$StartDate,$EndDate,$Type,$Image,$Width,$Height)
	{
		
		$data = array(
		   'Company' => $Company,
		   'Link' => $Link,
		   'StartDate' => $StartDate,
		   'EndDate' => $EndDate,
		   'Type' => $Type,
		   'Image' => $Image,
		   'Width' => $Width,
		   'Height' => $Height,
		   'Enable' => '1'
		);

		$this->db->insert('ads', $data); 
	}
	public function editads($Company,$Link,$StartDate,$EndDate,$id,$Image)
	{
		
		$data = array(
		   'Company' => $Company,
		   'Link' => $Link,
		   'StartDate' => $StartDate,
		   'EndDate' => $EndDate,
		   'Image' => $Image,
		   
		);

		$this->db->where('ID', $id);
		$this->db->update('ads', $data); 
	}
	
	
}