<?php
class Managemapping_model extends CI_Model
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
		$qry=$this->db->query("select career_inst_mapping.Career_id,career_inst_mapping.Institute_id,Career_name,Institute_name,Mapping_id from career_inst_mapping,career_master,career_detail,institute_master,institute_detail
									where career_inst_mapping.Career_id=career_master.Career_id and career_master.Career_id=career_detail.Career_id and career_inst_mapping.Institute_id=institute_master.Institute_id and institute_master.Institute_id=institute_detail.Institute_id");
		return $qry->result();
	}
	
	function get_forupdate($id=false)
	{
		$qry=$this->db->query("select career_inst_mapping.Career_id,career_inst_mapping.Institute_id,Career_name,Institute_name,Mapping_id from career_inst_mapping,career_master,career_detail,institute_master,institute_detail
									where career_inst_mapping.Career_id=career_master.Career_id and career_master.Career_id=career_detail.Career_id and career_inst_mapping.Institute_id=institute_master.Institute_id and
									institute_master.Institute_id=institute_detail.Institute_id and career_inst_mapping.Mapping_id=$id");
		return $qry->result();
		return $qry->Result();	
	}
	
	function careerget_data()
	{  
		$qry=$this->db->query("select career_master.Career_id, Career_name from career_master,
								career_detail where career_master.Career_id=career_detail.Career_id");
		return $qry->Result();	
	}
	
	function instituteget_data()
	{  
		$qry=$this->db->query("select institute_master.Institute_id, Institute_name from institute_master,
								institute_detail where institute_master.Institute_id=institute_detail.Institute_id");
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