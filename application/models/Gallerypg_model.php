<?php
class Gallerypg_model extends CI_Model
{
	
	function __construct()
	{
		// Call the Model constructor
		parent::__construct();

		//Load database connection
		$this->load->database();
	}
	
	
	function get_exam_data()
   {	
		$qry=$this->db->query("select typeid,description 
								from examtype-detail,examtype-master 
								where examtype-master.typeid=examtype-detail.typeid" );
		return $qry->Result();			
	}
}