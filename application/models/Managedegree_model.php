<?php
class Managedegree_model extends CI_Model
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
		$qry=$this->db->query("select Degree_id,Degree_name,Term,Eligibility from degree_master ");
		return $qry->result();
	}
	
	function get_forupdate($id=false)
	{
		$qry=$this->db->query("select Degree_id,Degree_name,Term,Eligibility from degree_master where degree_master.Degree_id =$id");
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