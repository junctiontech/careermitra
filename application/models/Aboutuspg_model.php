<?php
class Aboutuspg_model extends CI_Model
{
	
	function __construct()
	{
		// Call the Model constructor
		parent::__construct();

		//Load database connection
		$this->load->database();
	}
	function aboutusget_data()
   {	
		$qry=$this->db->query("Select Description from aboutus_master");
		return $qry->Result();			
	}
	
}