<?php
class Mentorpg_model extends CI_Model
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
	
	
	
	
}