<?php
class Manageexam3_model extends CI_Model
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
	
	function subexamget_data()
	{
		$qry=$this->db->query("Select exam_id,description as examsubtype from exam_detail");
		return $qry->result();
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
	function Jobget_data()
	{  
		$qry=$this->db->query("select job_master.Job_id, Company_name from job_master,job_detail
								 where job_master.Job_id=job_detail.Job_id");
		return $qry->Result();
		
	}
	function get_data()
	{
		$qry=$this->db->query("select subtype_master.Examdetail_id,examtype_detail.description as examtype, exam_detail.description as examsubtype, Exam_name, career_detail.Career_name,job_detail.Company_name,
								subtype_detail.Description,subtype_master.Eligibility,Syllabus,Date_of_exam,Startdate_of_formsubmission,Lastdate_of_formsubmission,subtype_master.Official_link,
								subtype_detail.Language_id,Institute_master.Institute_id,Institute_name from examtype_detail,examtype_master,exam_detail,exam_master,subtype_detail,
								subtype_master,career_detail,career_master,job_detail,job_master,institute_master,institute_detail where subtype_master.type_id=examtype_master.type_id and
								examtype_master.type_id=examtype_detail.type_id and subtype_master.exam_id=exam_master.exam_id and exam_master.exam_id=exam_detail.exam_id
								and subtype_master.Examdetail_id=subtype_detail.Examdetail_id and subtype_master.Career_id=career_master.Career_id 
								and  career_master.Career_id = career_detail.Career_id and subtype_master.Job_id=job_master.Job_id and subtype_master.Institute_id=Institute_master.Institute_id and 
								institute_master.Institute_id=institute_detail.Institute_id and job_master.Job_id=job_detail.Job_id");
																			
		return $qry->result();
	}
	
	function get_forupdate($id=false)
	{
		$qry=$this->db->query("select subtype_master.Examdetail_id,examtype_detail.description as examtype, exam_detail.description as examsubtype, Exam_name, career_detail.Career_name,job_detail.Company_name,
								subtype_detail.Description,subtype_master.Eligibility,Syllabus,Date_of_exam,Startdate_of_formsubmission,Lastdate_of_formsubmission,subtype_master.Official_link,
								subtype_detail.Language_id,Institute_master.Institute_id,Institute_name from examtype_detail,examtype_master,exam_detail,exam_master,subtype_detail,
								subtype_master,career_detail,career_master,job_detail,job_master,institute_master,institute_detail where subtype_master.type_id=examtype_master.type_id and
								examtype_master.type_id=examtype_detail.type_id and subtype_master.exam_id=exam_master.exam_id and exam_master.exam_id=exam_detail.exam_id
								and subtype_master.Examdetail_id=subtype_detail.Examdetail_id and subtype_master.Career_id=career_master.Career_id 
								and  career_master.Career_id = career_detail.Career_id and subtype_master.Job_id=job_master.Job_id and subtype_master.Institute_id=Institute_master.Institute_id and 
								institute_master.Institute_id=institute_detail.Institute_id and job_master.Job_id=job_detail.Job_id  and subtype_master.Examdetail_id=$id");
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