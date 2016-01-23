<?php
class Careermitra_model extends CI_Model
{
	
	function __construct()
	{
		// Call the Model constructor
		parent::__construct();

		//Load database connection
		$this->load->database();
	}
	function aboutusget_data()
   {	
		$qry=$this->db->query("Select Description from aboutus_master");
		return $qry->Result();			
	}
	
	function get_data()
	{
		$qry=$this->db->query("select Contactus_id,Company_name,Company_address,Phone_no,Email_address from contactus_master");
		return $qry->result();
	}
	
	function insert($table=false,$data=false)
	{
		$this->db->insert($table,$data);
		$last_id=$this->db->insert_id();
		return $last_id;
	}
	function get_data1()
	{
		$qry=$this->db->query("select Aboutus_id,Description from aboutus_master");
		return $qry->result();
	}
	function get_forupdate($id=false)
	{
		$qry=$this->db->query("select Aboutus_id,Description from aboutus_master where Aboutus_id=$id");
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
	
		function insert1($table=false,$data=false)
	{
		$this->db->insert($table,$data);
		$last_id=$this->db->insert_id();
		return $last_id;
	}
	function get_data2()
	{
		$qry=$this->db->query("select Contactus_id,Company_name,Company_address,Phone_no,Email_address from contactus_master");
		return $qry->result();
	}
	function get_forupdate1($id=false)
	{
		$qry=$this->db->query("select Contactus_id,Company_name,Company_address,Phone_no,Email_address from contactus_master where Contactus_id=$id");
		return $qry->Result();	
	}
		
	
	function insert2($table=false,$data=false)
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
	
	
	function get_data3()
	{
		$qry=$this->db->query("select intro_master.Intro_id,intro_master.Type_id,Type,Description,Language_id 
						from intro_master,intro_detail,introtype1_master where intro_master.intro_id=intro_detail.intro_id and intro_master.Type_id=introtype1_master.Type_id");
		return $qry->result();
	}
	
	
	function get_forupdate2($id=false)
	{
		$qry=$this->db->query("select intro_master.Intro_id,intro_master.Type_id,Type,Description,Language_id 
						from intro_master,intro_detail,introtype1_master where intro_master.intro_id=intro_detail.intro_id and 
						intro_master.Type_id=introtype1_master.Type_id and intro_master.Intro_id=$id");
		return $qry->Result();	
	}
		
	
	function delete2($table1=false,$table2=false,$filter=false)
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
	
	function get_data4()
	{
		$qry=$this->db->query("select notify_master.Notify_id,introtype1_master.Type_id,Type,Description,Language_id ,Link_url,Status,Rq_date
						from notify_master,notify_detail,introtype1_master where notify_master.Notify_id=notify_detail.Notify_id and notify_master.Type_id=introtype1_master.Type_id");
		return $qry->result();
	}
	
	
	function introget_data1()
	{
		$qry=$this->db->query("Select Type_id,Type from introtype1_master");
		return $qry->result();
	}
	
	function delete3($table1=false,$table2=false,$filter=false)
	{
		$this->db->delete($table1,$filter);
		$this->db->delete($table2,$filter);	
	}
	
	function get_forupdate3($id=false)
	{
		$qry=$this->db->query("select notify_master.Notify_id,notify_master.Type_id,Type,Description,Language_id ,Link_url,Status,Rq_date
						from notify_master,notify_detail,introtype1_master where notify_master.Notify_id=notify_detail.Notify_id and notify_master.Type_id=introtype1_master.Type_id and 
						   notify_master.Notify_id=$id");
		return $qry->Result();	
	}
	
	
	
}