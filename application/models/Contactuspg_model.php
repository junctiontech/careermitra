<?php
class Contactuspg_model extends CI_Model
{
	
	function __construct()
	{
		// Call the Model constructor
		parent::__construct();

		//Load database connection
		$this->load->database();
	}
	function get_data()
	{
		$qry=$this->db->query("select Contactus_id,Company_name,Company_address,Phone_no,Email_address from contactus_master");
		return $qry->result();
	}
}