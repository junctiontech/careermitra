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
	
	function insert($table=false,$data=false)
	{
		$this->db->insert($table,$data);
		$last_id=$this->db->insert_id();
		return $last_id;
	}
	
	function langet_data()
	{  
		$qry=$this->db->query("select language_master.Language_id from language_master");
								
		return $qry->Result();
	}
	
	
	function get_data()
	{
		$qry=$this->db->query("select Alphabet_id,institute_master.Institute_id,Group1,Institute_name,Description,Image,Address,Official_link,Contact_no,Language_id from institute_detail, institute_master
								where institute_master.Institute_id=institute_detail.Institute_id");
		return $qry->result();
	}
	
	function get_forupdate($id=false)
	{
		$qry=$this->db->query("select Alphabet_id,institute_master.Institute_id,Institute_name,Group1,Description,Image,Address,Official_link,Contact_no,Language_id from institute_detail, institute_master
								where institute_master.Institute_id=institute_detail.Institute_id and institute_master.Institute_id=$id");
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
	
	
	function Deginsert($table=false,$data=false)
	{
		$this->db->insert($table,$data);
		$last_id=$this->db->insert_id();
		return $last_id;
	}
	
	
	function Degget_data()
	{
		$qry=$this->db->query("select Degree_id,Degree_name,Term,Eligibility from degree_master ");
		return $qry->result();
	}
	
	function Degget_forupdate($id=false)
	{
		$qry=$this->db->query("select Degree_id,Degree_name,Term,Eligibility from degree_master where degree_master.Degree_id =$id");
		return $qry->Result();	
	}
	
	
	function Degdelete($table1=false,$filter=false)
	{
		$this->db->delete($table1,$filter);
		
	}
	
	
	function Mainsert($table=false,$data=false)
	{
		$this->db->insert($table,$data);
		$last_id=$this->db->insert_id();
		return $last_id;
	}
	
	function Maget_data()
	{
		$qry=$this->db->query("select career_inst_mapping.Career_id,career_inst_mapping.Institute_id,Career_name,Institute_name,Mapping_id from career_inst_mapping,career_master,career_detail,institute_master,institute_detail
									where career_inst_mapping.Career_id=career_master.Career_id and career_master.Career_id=career_detail.Career_id and career_inst_mapping.Institute_id=institute_master.Institute_id and institute_master.Institute_id=institute_detail.Institute_id");
		return $qry->result();
	}
	
	function Maget_forupdate($id=false)
	{
		$qry=$this->db->query("select career_inst_mapping.Career_id,career_inst_mapping.Institute_id,Career_name,Institute_name,Mapping_id from career_inst_mapping,career_master,career_detail,institute_master,institute_detail
									where career_inst_mapping.Career_id=career_master.Career_id and career_master.Career_id=career_detail.Career_id and career_inst_mapping.Institute_id=institute_master.Institute_id and
									institute_master.Institute_id=institute_detail.Institute_id and career_inst_mapping.Mapping_id=$id");
		return $qry->result();
		return $qry->Result();	
	}
	
	function Macareerget_data()
	{  
		$qry=$this->db->query("select career_master.Career_id, Career_name from career_master,
								career_detail where career_master.Career_id=career_detail.Career_id");
		return $qry->Result();	
	}
	
	function Mainstituteget_data()
	{  
		$qry=$this->db->query("select institute_master.Institute_id, Institute_name from institute_master,
								institute_detail where institute_master.Institute_id=institute_detail.Institute_id");
		return $qry->Result();
		
	}
	
	function Madelete($table1=false,$filter=false)
	{
		$this->db->delete($table1,$filter);
	
	}
	
	function Mainsert1($table=false,$data=false)
	{
		$this->db->insert($table,$data);
		$last_id=$this->db->insert_id();
		return $last_id;
	}
	
	function Maget_data1()
	{
		$qry=$this->db->query("select degree_inst_mapping.Degree_id,degree_inst_mapping.Institute_id,Degree_name,Institute_name,Mapping_id from degree_inst_mapping,degree_master,institute_master,institute_detail
									where degree_inst_mapping.Degree_id=degree_master.Degree_id and degree_inst_mapping.Institute_id=institute_master.Institute_id and institute_master.Institute_id=institute_detail.Institute_id");
		return $qry->result();
	}
	
	function Maget_forupdate1($id=false)
	{
		$qry=$this->db->query("select degree_inst_mapping.Degree_id,degree_inst_mapping.Institute_id,Degree_name,Institute_name,Mapping_id from degree_inst_mapping,degree_master,institute_master,institute_detail
									where degree_inst_mapping.Degree_id=degree_master.Degree_id and degree_inst_mapping.Institute_id=institute_master.Institute_id and 
									institute_master.Institute_id=institute_detail.Institute_id and degree_inst_mapping.Mapping_id=$id");
		return $qry->Result();	
	}
	
	function Madegreeget_data1()
	{  
		$qry=$this->db->query("select degree_master.Degree_id, Degree_name from degree_master");
								
		return $qry->Result();	
	}
	
	function Mainstituteget_data1()
	{  
		$qry=$this->db->query("select institute_master.Institute_id, Institute_name from institute_master,
								institute_detail where institute_master.Institute_id=institute_detail.Institute_id");
		return $qry->Result();
		
	}
	
	function Madelete1($table1=false,$filter=false)
	{
		$this->db->delete($table1,$filter);
	
	}
	
}