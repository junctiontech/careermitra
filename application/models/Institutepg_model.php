<?php
class Institutepg_model extends CI_Model
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
		$qry=$this->db->query("Select Description from intro_detail,intro_master where intro_master.intro_id=intro_detail.intro_id and intro_master.Type_id=4");
		return $qry->Result();			
	}
	
	
	function optionget_data()
	{
		$qry=$this->db->query("Select Alphabet_id,Institute_name,institute_master.Institute_id from institute_master,institute_detail where institute_master.Institute_id=institute_detail.Institute_id order by Alphabet_id ASC");
		return $qry->Result();
	}
	function notifyget_data()
	{
		$qry=$this->db->query("Select Description,Link_url from notify_master,notify_detail where notify_master.Notify_id=notify_detail.Notify_id and notify_master.Type_id=4 and notify_master.Status='Active'
								");
		return $qry->Result();
	}
	
	function detail($id=false)
	{
		$qry=$this->db->query("Select Institute_name,Image,Description,Group1,Official_link,Address,Contact_no
						from institute_master,institute_detail where institute_master.Institute_id=institute_detail.Institute_id and institute_master.Institute_id=$id");
		return $qry->Result();
	}
}