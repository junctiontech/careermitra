<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* Controller for login Functionality */
class Loginpg extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->data[]="";
		$this->data['user_data']="";
		$this->data['url'] = base_url();
		$this->load->model('Loginpg_model');
		$this->load->library('parser');
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->data['base_url']=base_url();
		$this->load->library('session');
	}
	public function index()
	{
		
		$this->parser->parse('Header',$this->data);
		$this->parser->parse('Login',$this->data);
		$this->parser->parse('Footer',$this->data);
	}
	
	
	
	
/* Function for login and create session */	
	function login_user($info=false)
	{	$data=array(
						'usermailid'=>$this->input->post('usermailid'),
						'password'=>md5($this->input->post('password'))
						);	//print_r($data);die;
						
			 $row=$this->Loginpg_model->login_check('users',$data);
			 	
	if($row){
				
				foreach ($row as $row){
						$user_data = array(
											 'usermailid' => $row->usermailid,
											 'user_id' => $row->user_id,
											 'role_id' => $row->role_id,
											 'First_name'=>$row->First_name
											 );
											 
					
						
						$this->session->set_userdata('user_data',$user_data);
						$user_session_data = $this->session->userdata('user_data');
						
				}	
						
				
					
					$this->session->set_flashdata('message_type', 'success');
					$this->session->set_flashdata('message', $this->config->item("login").' Login Successfully!!');
					
					if($user_data[role_id]=="student" || $user_data[role_id]=="mentor")
					{
					redirect('index.php/Careermitra');
					}
					elseif($user_data[role_id] !="student" || $user_data[role_id] !="mentor")
					{
					redirect('index.php/adminpg');
					}
					else
					{	
				
				$this->session->set_flashdata('message_type', 'error');
				$this->session->set_flashdata('message', $this->config->item("login").' Invalid User Name Or Password!!');
				  redirect('index.php/Loginpg');
				}
			}
		

	}/* End of login controller */
	
	
	/*Function logout*/
	
	
		
	function logout()
	{
		
		$this->data['user_data']=$this->session->userdata('user_data');
		$userdata=$this->session->userdata('user_data');
		$unset_userdata=$this->session->unset_userdata($userdata);
		$this->session->sess_destroy();
		redirect('index.php/Loginpg/index');
	}
		
		
		
	
}
