<?php
class Managecareer_model extends CI_Model
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
		$last_id = $this->db->insert_id();
		return $last_id;
	}
	function get_lang()
	{
		$qry=$this->db->query("select Language_id from language_master ");
		return $qry->Result();
	}
	
	function get_data()
   {	
		$qry=$this->db->query("select career_master.career_id, Alphabet_id,Eligibility,Min_salary,Max_salary,Career_name,
								Introduction,Job_prospects,Language_id from career_master,
								career_detail where career_master.Career_id=career_detail.Career_id");
		return $qry->Result();			
	}
	
	
	function delete($table1=false,$table2=false,$filter=false)
	{
		$this->db->delete($table1,$filter);	
		$this->db->delete($table2,$filter);	
	}
	
	function get_forupdate($id=false)
	{
		$qry=$this->db->query("select career_master.career_id, Alphabet_id,Eligibility,Min_salary,Max_salary,Career_name,
								Introduction,Job_prospects,Language_id from career_master,
								career_detail where career_master.Career_id=career_detail.Career_id and career_master.career_id=$id");
		return $qry->Result();	
	}
	
	
	function update($table=false,$data=false,$filter=false)
	{
		$this->db->where($filter);
		$this->db->update($table,$data);
	}
	
	
}