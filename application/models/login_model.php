<?php
class login_model extends ci_model
	{
	public function __constuct()
	{
		parent::__construct();
	}
	

	public function chck_login($username,$password)
	  {
		
		$sql ="select * from accountadmin where username='$username' and Password='$password' and Enable = '1' ";
		$login = $this->db->query($sql);
		return $login->result_array();
      	
	  }
	public function chck_change()
	  {
		
		$sql ="select * from accountadmin where Enable = '1' ";
		$login = $this->db->query($sql);
		return $login->result_array();
      	
	  }

}

?>