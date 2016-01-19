<?php
class Adminpg_model extends CI_Model
{
	
	function __construct()
	{
		// Call the Model constructor
		parent::__construct();

		//Load database connection
		$this->load->database();
	}
	function get_data($table=false)
   {	
		$qry=$this->db->get($table);
		return $qry->Result();			
	}
}