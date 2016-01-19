<?php
class Careerpg_model extends CI_Model
{
	
	function __construct()
	{
		// Call the Model constructor
		parent::__construct();

		//Load database connection
		$this->load->database();
	}
	
	function introget_data()
   {	
		$qry=$this->db->query("Select Description from intro_detail,intro_master where intro_master.intro_id=intro_detail.intro_id and intro_master.Type_id=1");
		return $qry->Result();			
	}
	
	
	function optionget_data()
	{
		$qry=$this->db->query("Select Alphabet_id,Career_name,career_master.Career_id from career_master,career_detail where career_master.Career_id=career_detail.Career_id order by Alphabet_id ASC");
		return $qry->Result();
	}
	function notifyget_data()
	{
		$qry=$this->db->query("Select Description,Link_url from notify_master,notify_detail where notify_master.Notify_id=notify_detail.Notify_id and notify_master.Type_id=1 and notify_master.Status='Active'
								");
		return $qry->Result();
	}
	
	function detail($id=false)
	{
		$qry=$this->db->query("Select Career_name,Introduction,Job_prospects,Eligibility,Min_salary,Max_salary 
						from career_master,career_detail where career_master.Career_id=career_detail.Career_id and career_master.Career_id=$id");
		return $qry->Result();
	}
}