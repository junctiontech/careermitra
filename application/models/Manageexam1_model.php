<?php
class Manageexam1_model extends CI_Model
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
	function get_lang()
	{
		$qry=$this->db->query("select Language_id from language_master ");
		return $qry->Result();
	}
	
	function get_data()
	{
		$qry=$this->db->query("select examtype_master.type_id,description,Language_id,examtype_master.created_by
								from examtype_detail,examtype_master 
								where examtype_master.type_id=examtype_detail.type_id");
		return $qry->result();
	}
	
	function get_forupdate($id=false)
	{
		$qry=$this->db->query("select examtype_master.type_id,description,Language_id,examtype_master.created_by
								from examtype_detail,examtype_master 
								where examtype_master.type_id=examtype_detail.type_id and examtype_master.type_id =$id");
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