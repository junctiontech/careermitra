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
		
		$last_id=$this->db->insert_id();
		return $last_id;
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
		 $qry=$this->db->query("select user_id,Myself,First_name, Last_name,Image,role_id,Status,Gender,DOB,Contact_no,Bgimg,House_no,street,Line2,City,State,ZIP,PG_subject,
									PG_university,G_subject,G_university,School_subject,School_name,Qualification,Current_job,More_info,Other,usermailid from users where users.user_id=$user_id 
											");
		return $qry->Result();
	 }
	
	function update($table=false,$data=false,$filter=false)
	{
		$this->db->where($filter);
		$this->db->update($table,$data);
		
	}
	
	/* function for reset of password */
	function get_reset_password($table=false,$filter=false)
	{
		$this->db->select('*');
		$qry=$this->db->get_where($table,$filter);
		return $qry->result();
	}
	
	/* function for update Password Organization  */
	function set_reset_password($table=false,$filter=false,$data=false)
	{
		$this->db->where($filter);
		$qry=$this->db->update($table,$data);
		return true;
	}
/*---	function for update user profie by gmail ---*/
	function activate_org($table=false,$filter=false)
	{
		$this->db->where($filter);
		$qry=$this->db->update($table,array('Status'=>'Active'));
		return true;
	}
	/*---------------------------------------------------Fetch data for activation of admin ---------------------*/
   function result_application($user_id=false)
   {
	   $qry=$this->db->query("Select * from users where user_id=$user_id");
	   return $qry->result();
   }
   
	/*---------------------------------------------------Fetch data for activation of mentor---------------------*/  
    function activation($user_id=false)
   {
	   $qry=$this->db->query("Select * from users where user_id=$user_id");
	   return $qry->result();
   }

   
   /*---------------------------------------------------Fetch data for admin ---------------------*/
 function admin()
   {
	   $qry=$this->db->query("Select usermailid from users where role_id='Admin'");
	   return $qry->result();
   }

   
  /*--------------------------------------------------Fetch data for mentor---------------------*/
function mentoractive()
{
   $qry=$this->db->query("Select user_id,First_name,Last_name,Status from users where role_id='Mentor'");
	   return $qry->result();


}



  /*--------------------------------------------------Fetch data for student profile---------------------*/
function stu_role($user_id=false)
{
   $qry=$this->db->query("Select user_id,First_name,Last_name,role_id from users where user_id='$user_id'");
	   return $qry->result();


}

/*--------------------------------------------------------Update status of mentor---------------------*/
function mentor_activate($table=false,$filter=false)
{
	
	$this->db->where($filter);
		$qry=$this->db->update($table,array('Status'=>'Active'));
		return true;
}



function mentor_deactivate($table=false,$filter=false)
{
	
	$this->db->where($filter);
		$qry=$this->db->update($table,array('Status'=>'Inactive'));
		return true;
}

/*--------------------------------------------------------Update status of mentor---------------------*/

function mentor_profile($user_id=false)
{
	 $qry=$this->db->query("Select * from users where user_id=$user_id and role_id='Mentor'");
	    return $qry->result();
	  
	  
}
/*--------------------------------------------------------Delete mentors profile---------------------*/
function delete1($table1=false,$filter=false)
	{
		$this->db->delete($table1,$filter);
		
	}
	
/* Function for Verify user id and password.......................................................................*/
	function verify_admin($table,$data)
	{
		$qry=$this->db->get_where($table,$data);
		return $qry->result();
	}
	
	
/* Function for update information for  users application.......................................................................*/
	function set_update_org_app_info($table,$data,$filter)
	{
		$this->db->where($filter);
		$this->db->update($table,$data);
		return true;
	}
	
}