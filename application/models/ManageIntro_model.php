<?php
class Manageintro_model extends CI_Model
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
	
	
	function get_data()
	{
		$qry=$this->db->query("select intro_master.Intro_id,intro_master.Type_id,Type,Description,Language_id 
						from intro_master,intro_detail,introtype1_master where intro_master.intro_id=intro_detail.intro_id and intro_master.Type_id=introtype1_master.Type_id");
		return $qry->result();
	}
	
	
	function get_forupdate($id=false)
	{
		$qry=$this->db->query("select intro_master.Intro_id,intro_master.Type_id,Type,Description,Language_id 
						from intro_master,intro_detail,introtype1_master where intro_master.intro_id=intro_detail.intro_id and 
						intro_master.Type_id=introtype1_master.Type_id and intro_master.Intro_id=$id");
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