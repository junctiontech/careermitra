<?php
/* Model for login and sign up   */

class Loginpg_model extends CI_Model 
{
	//variable initialize
    var $title   = '';
    var $content = '';
    var $date    = '';
	
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		
		//Load database connection
		$this->load->database();
    }
    
  
  function login_check($table=false,$data=false)
   {
				   $this->db->select('*');
		  $query = $this->db->get_where($table,$data);
		  return $query->result();
		  
   }
   
   function insert($table=false,$data=false)
	{
		$this->db->insert($table,$data);
		
		//$last_id=$this->db->insert_id();
		//return $last_id;
	}
	
	
	function insert1($table=false,$data=false)
	{
		$this->db->insert($table,$data);
		
		//$last_id=$this->db->insert_id();
		//return $last_id;
	}
	
	function stateget_data()
	{  
		$qry=$this->db->query("select State_id,State_name from state_master");
								
		return $qry->Result();
	}
	 
	 function Check_email($Username=false)
	 {
		 $qry=$this->db->query("select usermailid from users where usermailid='$Username'");
		 return $qry->Result();
	 }
	 
	 
	 function stupro($user_id=false)
	 {
		 $qry=$this->db->query("select user_id,First_name, Last_name,Image,role_id,Gender,DOB,Contact_no,House_no,street,Line2,City,State,ZIP,PG_subject,
									PG_university,G_subject,G_university,School_subject,School_name,Qualification,Current_job,More_info,Other,usermailid from users where users.user_id=$user_id 
											");
		return $qry->Result();
	 }
	
	function update($table=false,$data=false,$filter=false)
	{
		$this->db->where($filter);
		$this->db->update($table,$data);
		
	}
	
	/* function for Get Data Organization And Application Admin */
	function get_reset_password($table=false,$filter=false)
	{
		$this->db->select('*');
		$qry=$this->db->get_where($table,$filter);
		return $qry->result();
	}
	
	/* function for update Password Organization And Application Admin */
	function set_reset_password($table=false,$filter=false,$data=false)
	{
		$this->db->where($filter);
		$qry=$this->db->update($table,$data);
		return true;
	}
		/* function for update application status by gmail 
	function activate_org($table=false,$filter=false)
	{
		$this->db->where($filter);
		$qry=$this->db->update($table,array('status'=>'active'));
		return true;
	}*/
	
   
}