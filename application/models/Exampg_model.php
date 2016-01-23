<?php
class Exampg_model extends CI_Model
{
	
	function __construct()
	{
		// Call the Model constructor
		parent::__construct();

		//Load database connection
		$this->load->database();
	}
	
	function notifyget_data()
	{
		$qry=$this->db->query("Select Description,Link_url from notify_master,notify_detail where notify_master.Notify_id=notify_detail.Notify_id and notify_master.Type_id=2 and notify_master.Status='Active'
								");
		return $qry->Result();
	}
	
	function introget_data()
   {	
		$qry=$this->db->query("Select Description from intro_detail,intro_master where intro_master.intro_id=intro_detail.intro_id and intro_master.Type_id=2");
		return $qry->Result();			
	}
	
	function get_exam_data()
   {	
		$qry=$this->db->query("select examtype_master.type_id,description 
								from examtype_detail,examtype_master 
								where examtype_master.type_id=examtype_detail.type_id" );
		return $qry->Result();	

			
	}
	
	function get_examdetails($typeid=false)
   {	
		$qry=$this->db->query("select exam_master.exam_id,description 
								from exam_master,exam_detail where
								exam_master.type_id=$typeid and
								exam_master.exam_id=exam_detail.exam_id and
								exam_detail.Language_id='1'" );
		return $qry->Result();	

			
	}
	
	function get_subexamdetail($examid=false)
	{
		$qry=$this->db->query("select subtype_master.Examdetail_id,Exam_name
								from subtype_master,subtype_detail where
								subtype_master.exam_id=$examid and
								subtype_master.Examdetail_id=subtype_detail.Examdetail_id and
								subtype_detail.Language_id='1'" );
		return $qry->Result();
	}
	
	
	function get_subexamdata($Examdetail_id=false)
	{
		$qry=$this->db->query("select subtype_master.Examdetail_id,Exam_name,Description,Syllabus,Date_of_exam,Official_link,Startdate_of_formsubmission,Lastdate_of_formsubmission from subtype_detail,subtype_master
								where subtype_master.Examdetail_id=subtype_detail.Examdetail_id and subtype_master.Examdetail_id=$Examdetail_id and subtype_detail.Language_id=1");
							
		return $qry->Result();
	}
	
	function subexamdata($Examdetail_id=false)
	{
		$qry=$this->db->query("select DISTINCT paper_master.Examdetail_id,paper_master.Subject_id,Subject from paper_master,Subject_master,subtype_master where paper_master.Examdetail_id='27' and paper_master.Subject_id=Subject_master.Subject_id 
									and paper_master.Examdetail_id=subtype_master.Examdetail_id");
							
		return $qry->Result();
	}
	
	function paperdetail($Subject_id=false,$Examdetail_id=false)
	{
		$qry=$this->db->query("select DISTINCT Paper_name from paper_master
								where paper_master.Examdetail_id=$Examdetail_id and paper_master.subject_id=$Subject_id");
							
		return $qry->Result();
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
	
	
	
	function exinsert($table=false,$data=false)
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
	
	
	function exget_data()
	{
		$qry=$this->db->query("select exam_master.exam_id,examtype_detail.description as examtype1,exam_detail.description,exam_detail.Language_id
								from exam_master,exam_detail,examtype_detail where
								exam_master.type_id=examtype_detail.type_id and
								exam_master.exam_id=exam_detail.exam_id" );
		return $qry->result();
	}
	
	function exget_forupdate($id=false)
	{
		$qry=$this->db->query("select exam_master.exam_id,examtype_detail.description as examtype,exam_detail.description,exam_detail.Language_id
								from exam_master,exam_detail,examtype_detail where
								exam_master.type_id=examtype_detail.type_id and
								exam_master.exam_id=exam_detail.exam_id and exam_master.exam_id=$id");
		return $qry->Result();	
	}
	
	
	function exdelete($id=false)
	{
		$this->db->query("Delete exam_detail,exam_master from exam_detail,exam_master where exam_master.exam_id=exam_detail.exam_id and 
		exam_master.exam_id=$id");
		
			
	}
	
	
	function exinsert1($table=false,$data=false)
	{
		$this->db->insert($table,$data);
		$last_id=$this->db->insert_id();
		return $last_id;
	}
	
	function examget_data1()
	{
		$qry=$this->db->query("Select type_id,description as examtype from examtype_detail");
		return $qry->result();
	}
	
	function langget_data()
	{
		$qry=$this->db->query("Select Language_id from language_master");
		return $qry->result();
	}
	
	function subexamget_data1()
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
	function exget_data1()
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
	
	function exget_forupdate1($id=false)
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
	
	
	function exdelete1($table1=false,$table2=false,$filter=false)
	{
		$this->db->delete($table1,$filter);
		$this->db->delete($table2,$filter);	
	}
	

	function insert3($table=false,$data=false)
	{
		$this->db->insert($table,$data);
		$last_id=$this->db->insert_id();
		return $last_id;
	}
	function examget_data2()
	{
		$qry=$this->db->query("Select examtype_master.type_id,description as examtype from examtype_master,examtype_detail
		where examtype_master.type_id=examtype_detail.type_id ");
		return $qry->result();
	}
	
	function subexamget_data2()
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
	function get_data1()
	{
		$qry=$this->db->query("Select Paper_id,Paper_name,paper_master.Subject_id,Subject,examtype_master.type_id,examtype_detail.description as examtype,exam_master.exam_id,exam_detail.description as examsubtype ,paper_master.Examdetail_id,Exam_name from
								paper_master,subject_master,examtype_master,examtype_detail,exam_master,exam_detail,subtype_master,subtype_detail where 
							paper_master.Subject_id=subject_master.Subject_id and paper_master.type_id=examtype_master.type_id and examtype_master.type_id=examtype_detail.type_id and paper_master.exam_id=exam_master.exam_id
										and exam_master.exam_id=exam_detail.exam_id and paper_master.Examdetail_id=subtype_master.Examdetail_id and subtype_master.Examdetail_id=subtype_detail.Examdetail_id");
		return $qry->result();
	}
	function get_forupdate1($id=false)
	{
		$qry=$this->db->query("Select Paper_id,Paper_name,paper_master.Subject_id,Subject,examtype_master.type_id,examtype_detail.description as examtype,exam_master.exam_id,exam_detail.description as examsubtype ,paper_master.Examdetail_id,Exam_name from
								paper_master,subject_master,examtype_master,examtype_detail,exam_master,exam_detail,subtype_master,subtype_detail where 
							paper_master.Subject_id=subject_master.Subject_id and paper_master.type_id=examtype_master.type_id and examtype_master.type_id=examtype_detail.type_id and paper_master.exam_id=exam_master.exam_id
										and exam_master.exam_id=exam_detail.exam_id and paper_master.Examdetail_id=subtype_master.Examdetail_id and subtype_master.Examdetail_id=subtype_detail.Examdetail_id and Paper_id=$id");
		return $qry->Result();	
	}
	
	function delete3($table1=false,$filter=false)
	{
		$this->db->delete($table1,$filter);
		
	}
	
	
	function insert4($table=false,$data=false)
	{
		$this->db->insert($table,$data);
		$last_id=$this->db->insert_id();
		return $last_id;
	}
	function get_data4()
	{
		$qry=$this->db->query("select Subject, Subject_id from subject_master");
		return $qry->result();
	}
	function get_forupdate4($id=false)
	{
		$qry=$this->db->query("select Subject, Subject_id from subject_master where Subject_id=$id");
		return $qry->Result();	
	}
	
	
}