<?php
class Manageinstitute_model extends CI_Model
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
	
	function langet_data()
	{  
		$qry=$this->db->query("select language_master.Language_id from language_master");
								
		return $qry->Result();
	}
	
	
	function get_data()
	{
		$qry=$this->db->query("select Alphabet_id,institute_master.Institute_id,Group1,Institute_name,Description,Image,Address,Official_link,Contact_no,Longitude,Latitude,Language_id from institute_detail, institute_master
								where institute_master.Institute_id=institute_detail.Institute_id");
		return $qry->result();
	}
	
	function get_forupdate($id=false)
	{
		$qry=$this->db->query("select Alphabet_id,institute_master.Institute_id,Institute_name,Group1,Description,Image,Address,Official_link,Contact_no,Longitude,Latitude,Language_id from institute_detail, institute_master
								where institute_master.Institute_id=institute_detail.Institute_id and institute_master.Institute_id=$id");
		return $qry->Result();	
	}
	
	
	function delete($table1=false,$table2=false,$filter=false)
	{
		$this->db->delete($table1,$filter);
		$this->db->delete($table2,$filter);	
	}
	function update($table=false,$data=false,$filter=false)
	{
		$this->db->where($filter);
		$this->db->update($table,$data);
	}
}