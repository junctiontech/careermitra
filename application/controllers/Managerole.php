<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Managerole extends CI_Controller
 {

	
	 function __construct() {
		parent::__construct();
			
		$this->data[]="";
		$this->data['url'] = base_url();
		
		$this->load->model('Authority_model');
		$this->load->library('authority');
		$this->load->library('parser');
		
		$this->data['base_url']=base_url();
		
		$this->load->library('session');
		
	}
	
	
	function insert_role()
	{
		
		
		Authority::is_logged_in();
		if(Authority::checkAuthority('insert_role')==true)
		{
				redirect("index.php/Loginpg");
				}
			
				$role=array(
								'role_id'=>str_replace(" ","_",$this->input->post('role')),
								'role_description'=>$this->input->post('role_description')
							);
				//echo '<pre>';
				//print_r($role);
				//echo '</pre>';die;
		$data = $this->input->post();
		$value = "";
		  if($this->input->post('edit_costing')==1)
		   {	
				for($i=0;$i<=count($data['function'])-1; $i++)
				{
					$value .= "('".$data['role']."','".$data['function'][$i]."','".$data['read'][$i]."','".$data['execute'][$i]."')".",";
				}
				$id=$this->Authority_model->insert_role_table($role);
				if($this->Authority_model->insert_role(rtrim($value,",")))
				{
					
					$this->session->set_flashdata('message_type', 'Success message');
					$this->session->set_flashdata('message', $this->config->item("user").' Role Inserted successfully');
					redirect("index.php/Managerole/add_role");
				}
				else
				{
					echo "Error while Editing SubItem";
				}
			}
	
	}
	function add_role($info=false)
	{
		Authority::is_logged_in();
		if(Authority::checkAuthority('add_role')==true)
				{
					redirect('index.php/Loginpg');
				}
		$list_function=	$this->data['list_function']=$this->Authority_model->list_function();
		$this->parser->parse('Adminheader',$this->data);
		$this->load->view('Mngrole',$this->data);
		$this->parser->parse('Adminfooter',$this->data);
			
	}
	
	function Role_permission($info=false)
	{	
			Authority::is_logged_in();
		if(Authority::checkAuthority('Role_permission')==true)
				{
					redirect('index.php/Loginpg');
				}
			$functions_list=$this->data['functions_list']=$this->Authority_model->functions_list();
			$permissions=$this->data['permissions']=$this->Authority_model->permissions($info);
			$this->parser->parse('Adminheader',$this->data);
			$this->load->view('Role_permission',$this->data);
			$this->parser->parse('Adminfooter',$this->data);
	}
	
	
	function Role_management($info=false)
	{
			Authority::is_logged_in();
		if(Authority::checkAuthority('Role_management')==true)
				{
					redirect('index.php/Loginpg');
				}
		$list_permsn =$this->data['list_permsn']=$this->Authority_model->list_permsn();
		
	
		$this->parser->parse('Adminheader',$this->data);
			$this->load->view('Role_management');
			$this->parser->parse('Adminfooter',$this->data);
		
	
	}
	function update_Role_permission($info1)
		{	
			Authority::is_logged_in();
		if(Authority::checkAuthority('update_Role_permission')==true)
				{
					redirect('index.php/Loginpg');
				}
			$this->input->post('role');
			$filter = array('role_id'=>$info1);
			$data=$this->input->post();
			$value='';
			 if($this->input->post('role_permsn')==1)
			{	
				for($i=0;$i<=count($data['function'])-1; $i++)
				{
					$value .= "('".$data['role']."','".$data['function'][$i]."','".$data['read'][$i]."','".$data['execute'][$i]."')".",";
				}
				if($this->Authority_model->update_Role_permission(rtrim($value,","),$filter))
				{
					
					$this->session->set_flashdata('message_type', 'success message	');
					$this->session->set_flashdata('message', $this->config->item("user").' Role updated successfully');
					redirect("index.php/Managerole/Role_permission");
					
				}
				else
				{
					echo "Error while Editing SubItem";
				}
			}
		}
		
	/*function for delete role from role manager view*/
	function delete_role($role=false)
	{
		Authority::is_logged_in();
		if(Authority::checkAuthority('delete_role')==true)
				{
					redirect('index.php/Loginpg');
				}
		if($role){
			$this->Authority_model->delete_role($role);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("user").' Delete Successfully');
			redirect('index.php/Managerole/Role_management');
		}
	}
	
	
			/* Function for new user add in user management view  */
		function user_add($info=false)
		{	
			Authority::is_logged_in();
		if(Authority::checkAuthority('user_add')==true)
				{
					redirect('index.php/Loginpg');
				}
			$userdata = $this->session->userdata('user_data');
			$role=$userdata['role_id'];
			//$first_name=$this->input->post('first_name');
			
			$email=$this->input->post('usermailid');
			if($email!=='')
			{
				$data=array(
						
								'First_name'=>$this->input->post('First_name'),
								'usermailid'=>$this->input->post('usermailid'),
								'role_id'=>$this->input->post('role_id'),
								'password'=>md5($this->input->post('password'))
							);
				$qry = $this->Authority_model->user_add('users',$data,$email);
				
				if($qry)
				   {
						$this->session->set_flashdata('category_error', 'Error message');  
						$this->session->set_flashdata('message',$this->config->item("user").'email id already exist'); 
						   redirect('index.php/Managerole/Manage_users');
					  
				   }
				else
				   {
						$this->session->set_flashdata('category_success', 'success message	');        
						$this->session->set_flashdata('message', $this->config->item("user").' User Inserted successfully');
							redirect('index.php/Managerole/Manage_users');
				   }
					
			}
		
		}
		
		/*End function for updte role permission*/
	function manage_users($info=false)
	{
		Authority::is_logged_in();
	if(Authority::checkAuthority('manage_users')==true)
				{
					redirect('index.php/Loginpg');
				}
		
		$role_list=$this->data['role_list']=$this->Authority_model->role_list();	
	   
		$this->parser->parse('Adminheader',$this->data);
		$this->load->view('Manage_users',$this->data);
		$this->parser->parse('Adminfooter',$this->data);
		
		
	}
	
	
	/* function for user role view */
	function user_role()
	{	
				Authority::is_logged_in();
		if(Authority::checkAuthority('user_role')==true)
				{
					redirect('index.php/Loginpg');
				}
		$role_list=$this->data['role_list']=$this->Authority_model->role_list();
		//if($su!=='superuser')
		//{
			//$verify_list=$this->data['verify_list']=$this->Authority_model->verify_list();
	//}

		$su_verify_list=$this->data['su_verify_list']=$this->Authority_model->su_verify_list();
		
		
		$this->parser->parse('Adminheader',$this->data);
		$this->load->view('user_role',$this->data);
		$this->parser->parse('Adminfooter',$this->data);
	}
	
	function role_assign($info=false)
	{	
		Authority::is_logged_in();
		if(Authority::checkAuthority('role_assign')==true)
				{
					redirect('index.php/Loginpg');
				}
		$name= $this->input->post('role_id');
		if($name!=='')
		{
			$data=array('role_id'=>$name);
	
		}
		$role_assign=$this->data['role_assign']=$this->Authority_model->role_assign($data,$info);
		$this->session->set_flashdata('message_type', 'success');
		$this->session->set_flashdata('message', $this->config->item("user").' Role Assign Successfully');
		redirect('index.php/Managerole/user_role');
	}
	function delete_user($user=false)
	{
		Authority::is_logged_in();
		if(Authority::checkAuthority('delete_user')==true)
				{
					redirect('index.php/Loginpg');
				}
		if($user){
					  
						$filter = array('user_id'=>$user);
						$this->Authority_model->delete_user($filter,'users');
						$this->session->set_flashdata('message_type', 'success');        
                        $this->session->set_flashdata('message', $this->config->item("user").' Delete Successfully');
						redirect('index.php/Managerole/User_role');		
						}
	}	
	
	function blocked_user($user=false)
	{	
		Authority::is_logged_in();
		if(Authority::checkAuthority('blocked_user')==true)
				{
					redirect('index.php/Loginpg');
				}
		if($user)
		{
			$data = array('role_id'=>'blocked');
			
		$this->Authority_model->blocked_user($data,$user);
		
		}
		
		$this->session->set_flashdata('message_type', 'success');
		$this->session->set_flashdata('message',$this->config->item('user').'User Blocked Sucessfully');
		redirect('index.php/Managerole/user_role');
	}
	
	
	
	function edit_role_assign($user=false)
	{	
		
	
			//Authority::is_logged_in();
		//if(Authority::checkAuthority('edit_role_user')==true)
			//	{
					//redirect('index.php/Loginpg');
				//}
	if($user)
		{
			$data=array('role_id'=>$this->input->post('role_id'));
			
			$this->Authority_model->blocked_user($data,$user);
		}
		$this->session->set_flashdata('message_type', 'success');
		$this->session->set_flashdata('message',$this->config->item('user').'Role assigned Sucessfully');
		redirect('index.php/Managerole/user_role');
	
	}
 } 
 
 
 
 
 