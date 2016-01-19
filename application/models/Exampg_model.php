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
}