
<?php
class FAQpg_model extends CI_Model
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
		$qry=$this->db->query("Select Type_id,Type from introtype1_master");
		return $qry->result();
	}
	
	function insert($table=false,$data=false)
	{
		$this->db->insert($table,$data);
		$last_id=$this->db->insert_id();
		return $last_id;
	}
	
	function get_data4()
	{
		$qry=$this->db->query("select faq.Faq_id,introtype1_master.Type_id,introtype1_master.Type,Ques,Ans from faq,introtype1_master where faq.Type=introtype1_master.Type_id");
		return $qry->result();
	}
	
	function get_forupdate3($id=false)
	{
		$qry=$this->db->query("select faq.Faq_id,introtype1_master.Type_id,introtype1_master.Type,Ques,Ans from faq,introtype1_master where  faq.Type=introtype1_master.Type_id and faq.Faq_id=$id");

		return $qry->Result();	
	}
	function update($table=false,$data=false,$filter=false)
	{
		$this->db->where($filter);
		$this->db->update($table,$data);
	}
	
	
	function delete1($table1=false,$filter=false)
	{
		$this->db->delete($table1,$filter);
		
	}
	
	function data()
	{
		$qry=$this->db->query("Select Type_id,Type from introtype1_master where Type !='Home'");
		return $qry->Result();	
	}
	function data1($id=false)
	{
		$qry=$this->db->query("Select Ques,Ans,faq.Type,introtype1_master.Type_id from introtype1_master,faq where faq.Type=introtype1_master.Type_id
								and faq.Type=$id" );
		return $qry->Result();	
	}
	
}
