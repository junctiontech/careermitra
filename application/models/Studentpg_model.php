<?php
class Studentpg_model extends CI_Model
{
	
	function __construct()
	{
		// Call the Model constructor
		parent::__construct();

		//Load database connection
		$this->load->database();
	}
	
	
	function insert($table=false,$data=false)
	{
		$this->db->insert($table,$data);
		
		//$last_id=$this->db->insert_id();
		//return $last_id;
	}
	
	function stateget_data()
	{  
		$qry=$this->db->query("select State_id,State_name from state_master");
								
		return $qry->Result();
	}
	
	
}