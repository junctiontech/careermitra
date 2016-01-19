<?php
class Managecontactus_model extends CI_Model
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
		$last_id=$this->db->insert_id();
		return $last_id;
	}
	function get_data()
	{
		$qry=$this->db->query("select Contactus_id,Company_name,Company_address,Phone_no,Email_address from contactus_master");
		return $qry->result();
	}
	function get_forupdate($id=false)
	{
		$qry=$this->db->query("select Contactus_id,Company_name,Company_address,Phone_no,Email_address from contactus_master where Contactus_id=$id");
		return $qry->Result();	
	}
	
	function delete($table1=false,$filter=false)
	{
		$this->db->delete($table1,$filter);
		
	}
	function update($table=false,$data=false,$filter=false)
	{
		$this->db->where($filter);
		$this->db->update($table,$data);
	}
}