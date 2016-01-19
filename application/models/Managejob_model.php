<?php
class Managejob_model extends CI_Model
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
	
	function careerget_data()
	{  
		$qry=$this->db->query("select career_master.Career_id, Career_name from career_master,
								career_detail where career_master.Career_id=career_detail.Career_id");
		return $qry->Result();
		
	}
	
	function examget_data($careerid=false)
	{
		$qry=$this->db->query("select subtype_master.Examdetail_id, Exam_name from subtype_master,subtype_detail where
									subtype_master.Examdetail_id=subtype_detail.Examdetail_id and
										subtype_master.Career_id=$careerid");
			return $qry->Result();						
	}
	function examname_data($Detail=false)
	{
		$qry=$this->db->query("select subtype_master.Examdetail_id, Exam_name from subtype_master,subtype_detail where
									subtype_master.Examdetail_id=subtype_detail.Examdetail_id and
										subtype_master.Examdetail_id=$Detail");
			return $qry->Result();						
	}
	function langget_data()
	{
		$qry=$this->db->query("Select Language_id from language_master");
		return $qry->result();
	}
	
	function get_data()
	{
		$qry=$this->db->query("select job_master.Job_id,job_master.Career_id,career_detail.Career_name,Company_name,Description,Post_name,No_of_vacancy,Pay_scale,Qualification,Nationality,
								Age_limit,Job_location,Selection_process,Detail ,job_detail.Language_id
								from job_master,job_detail,career_master,career_detail where job_master.Job_id=job_detail.Job_id and job_master.Career_id=career_master.Career_id
								and career_master.Career_id=career_detail.Career_id  ");
		return $qry->result();
	}
	
	function get_forupdate($id=false)
	{
		$qry=$this->db->query("select job_master.Job_id,job_master.Career_id,career_detail.Career_name,Company_name,Description,Post_name,No_of_vacancy,Pay_scale,Qualification,Nationality,
								Age_limit,Job_location,Selection_process,Detail,job_detail.Language_id
								from job_master,job_detail,career_master,career_detail where job_master.Job_id=job_detail.Job_id and job_master.Career_id=career_master.Career_id
								and career_master.Career_id=career_detail.Career_id and job_master.Job_id=$id");
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