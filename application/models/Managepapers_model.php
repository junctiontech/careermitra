<?php
class Managepapers_model extends CI_Model
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
		$qry=$this->db->query("Select examtype_master.type_id,description as examtype from examtype_master,examtype_detail
		where examtype_master.type_id=examtype_detail.type_id ");
		return $qry->result();
	}
	
	function subexamget_data()
	{
		$qry=$this->db->query("Select exam_master.exam_id,description as examsubtype from exam_master,exam_detail
								where exam_master.exam_id=exam_detail.exam_id");
		return $qry->result();
	}
	function exam()
	{
		$qry=$this->db->query("select subtype_master.Examdetail_id, Exam_name from subtype_master,subtype_detail 
								where subtype_master.Examdetail_id=subtype_detail.Examdetail_id");
		return $qry->result();
	}
	
	function subget_data()
	{
		$qry=$this->db->query("select Subject, Subject_id from subject_master");
		return $qry->result();
	}
	function get_data()
	{
		$qry=$this->db->query("Select Paper_id,Paper_name,paper_master.Subject_id,Subject,examtype_master.type_id,examtype_detail.description as examtype,exam_master.exam_id,exam_detail.description as examsubtype ,paper_master.Examdetail_id,Exam_name from
								paper_master,subject_master,examtype_master,examtype_detail,exam_master,exam_detail,subtype_master,subtype_detail where 
							paper_master.Subject_id=subject_master.Subject_id and paper_master.type_id=examtype_master.type_id and examtype_master.type_id=examtype_detail.type_id and paper_master.exam_id=exam_master.exam_id
										and exam_master.exam_id=exam_detail.exam_id and paper_master.Examdetail_id=subtype_master.Examdetail_id and subtype_master.Examdetail_id=subtype_detail.Examdetail_id");
		return $qry->result();
	}
	function get_forupdate($id=false)
	{
		$qry=$this->db->query("Select Paper_id,Paper_name,paper_master.Subject_id,Subject,examtype_master.type_id,examtype_detail.description as examtype,exam_master.exam_id,exam_detail.description as examsubtype ,paper_master.Examdetail_id,Exam_name from
								paper_master,subject_master,examtype_master,examtype_detail,exam_master,exam_detail,subtype_master,subtype_detail where 
							paper_master.Subject_id=subject_master.Subject_id and paper_master.type_id=examtype_master.type_id and examtype_master.type_id=examtype_detail.type_id and paper_master.exam_id=exam_master.exam_id
										and exam_master.exam_id=exam_detail.exam_id and paper_master.Examdetail_id=subtype_master.Examdetail_id and subtype_master.Examdetail_id=subtype_detail.Examdetail_id and Paper_id=$id");
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