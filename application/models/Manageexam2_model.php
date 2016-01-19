<?php
class Manageexam2_model extends CI_Model
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
	
	function examget_data()
	{
		$qry=$this->db->query("Select type_id,description as examtype from examtype_detail");
		return $qry->result();
		
	}
	function langget_data()
	{
		$qry=$this->db->query("Select Language_id from language_master");
		return $qry->result();
	}
	
	function get_data()
	{
		$qry=$this->db->query("select exam_master.exam_id,examtype_detail.description as examtype1,exam_detail.description,exam_detail.Language_id
								from exam_master,exam_detail,examtype_detail where
								exam_master.type_id=examtype_detail.type_id and
								exam_master.exam_id=exam_detail.exam_id" );
		return $qry->result();
	}
	
	function get_forupdate($id=false)
	{
		$qry=$this->db->query("select exam_master.exam_id,examtype_detail.description as examtype,exam_detail.description,exam_detail.Language_id
								from exam_master,exam_detail,examtype_detail where
								exam_master.type_id=examtype_detail.type_id and
								exam_master.exam_id=exam_detail.exam_id and exam_master.exam_id=$id");
		return $qry->Result();	
	}
	
	
	function delete($id=false)
	{
		$this->db->query("Delete exam_detail,exam_master from exam_detail,exam_master where exam_master.exam_id=exam_detail.exam_id and 
		exam_master.exam_id=$id");
		
			
	}
	function update($table=false,$data=false,$filter=false)
	{
		$this->db->where($filter);
		$this->db->update($table,$data);
	}
}