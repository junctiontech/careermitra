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
   
}