<?php
class Managenotify_model extends CI_Model
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
		$qry=$this->db->query("select notify_master.Notify_id,introtype1_master.Type_id,Type,Description,Language_id ,Link_url,Status,Rq_date
						from notify_master,notify_detail,introtype1_master where notify_master.Notify_id=notify_detail.Notify_id and notify_master.Type_id=introtype1_master.Type_id");
		return $qry->result();
	}
	function langget_data()
	{
		$qry=$this->db->query("Select Language_id from language_master");
		return $qry->result();
	}
	
	function introget_data()
	{
		$qry=$this->db->query("Select Type_id,Type from introtype1_master");
		return $qry->result();
	}
	
	function delete($table1=false,$table2=false,$filter=false)
	{
		$this->db->delete($table1,$filter);
		$this->db->delete($table2,$filter);	
	}
	
	function get_forupdate($id=false)
	{
		$qry=$this->db->query("select notify_master.Notify_id,notify_master.Type_id,Type,Description,Language_id ,Link_url,Status,Rq_date
						from notify_master,notify_detail,introtype1_master where notify_master.Notify_id=notify_detail.Notify_id and notify_master.Type_id=introtype1_master.Type_id and 
						   notify_master.Notify_id=$id");
		return $qry->Result();	
	}
	
	function update($table=false,$data=false,$filter=false)
	{
		$this->db->where($filter);
		$this->db->update($table,$data);
	}
	
}	
	