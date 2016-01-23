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
		$this->load->library('Authority');
		$this->load->model('Authority_model');
		$this->load->library('Upload');
		
		$user_session_data= $this->session->userdata('user_data');
		
		if(!empty($user_session_data))
		{
		$user_id=$user_session_data['user_id'];
		$this->role_id=$user_session_data['role_id'];
		$this->load->model('Loginpg_model');
		$this->data['student']=$this->Loginpg_model->stupro($user_id);
		}
		else
		{
			$this->data['student']='';
		}
		
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
				
				foreach ($row as $row)
				
			
				{
						$user_data = array(
											 'usermailid' => $row->usermailid,
											 'user_id' => $row->user_id,
											 'role_id' => $row->role_id,
											 'First_name'=>$row->First_name
											 );
											 
					
						
						$this->session->set_userdata('user_data',$user_data);
						$user_session_data= $this->session->userdata('user_data');
						
						
				}	
						
				
					
					$this->session->set_flashdata('message_type', 'success');
					$this->session->set_flashdata('message', $this->config->item("login").' Login Successfully!!');
					
			
						
						
					if($user_data[role_id]=="student" )
						
					
					{
					redirect("index.php/Loginpg/stpro/".$user_data[user_id]);
					}
					
					elseif( $user_data[role_id]=="mentor")
					
					
					{
					redirect("index.php/Loginpg/mtpro/".$user_data[user_id]);	
					}
					
					elseif($user_data[role_id] !="student" || $user_data[role_id] !="mentor")
					{
					redirect('index.php/Careermitra/Adminindex');
					}
					
					else
					{	
				
				$this->session->set_flashdata('message_type', 'error');
				$this->session->set_flashdata('message', $this->config->item("login").' Invalid User Name Or Password!!');
				  redirect('index.php/Loginpg/index');
					}
																	
	}
			
				{	
				
				$this->session->set_flashdata('message_type', 'error');
				$this->session->set_flashdata('message', $this->config->item("login").' Invalid User Name Or Password!!');
				  redirect('index.php/Loginpg/index');
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
		
/* function for mentor registration page */	

function mtview()
{
	$this->parser->parse('Header',$this->data);
			$this->load->view('Mentor');
			$this->parser->parse('Footer',$this->data);
			}




function insert()
	
	{ $image ="";
	
	if($_FILES['file']['name']!='')
				{
					$data['image_z1']= $_FILES['file']['name'];
					$image=sha1($_FILES['file']['name']).time().rand(0, 9);
				
					if(!empty($_FILES['file']['name']))
					{
				
						$config =  array(
						'upload_path'	  => './uploaded_images/',
						'file_name'       => $image,
						'allowed_types'   => "gif|jpg|png|jpeg|JPG|JPEG|PNG|JPG",
						'overwrite'       => true);
						
							$this->upload->initialize($config);
							
				 
								if($this->upload->do_upload("file"))
								{
					
									$upload_data = $this->upload->data();
									$image=$upload_data['file_name'];
								}else
								{
										$this->upload->display_errors()."file upload failed";
										$image ="";
								}
					}
				}
				
				
			$data=array('First_name'=>$this->input->post('First_name'),
			'Last_name'=>$this->input->post('Last_name'),
			'Image'=>$image,
			'role_id'=>$this->input->post('role_id'),
			'Gender'=>$this->input->post('Gender'),
			'Contact_no'=>$this->input->post('Contact_no'),
			//'Email'=>$this->input->post('Email'),
			'Qualification'=>$this->input->post('Qualification'),
			'Current_job'=>$this->input->post('Current_job'),
			'More_info'=>$this->input->post('More_info'),
			'usermailid'=>$this->input->post('usermailid'),
			'Password'=>md5($this->input->post('password')),
			'Confirm_password'=>md5($this->input->post('Confirm_password')));
		
			if(!empty($this->input->post('id')))
		
			{
				
			$filter=array('user_id'=>$this->input->post('id'));
			$this->Loginpg_model->update('users',$data,$filter);
			redirect ('index.php/Loginpg/editprofile/'.$this->input->post('id'));
			}
		else		
			{
			$this->Loginpg_model->insert('users',$data);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("index")." Registration Successful!!");
		
		
			$this->parser->parse('Header',$this->data);
			$this->load->view('Mentor');
			$this->parser->parse('Footer',$this->data);
			redirect ('index.php/Loginpg');
	}	
}	

function stview()
{	
			$this->data['state']=$this->Loginpg_model->stateget_data();
			$this->parser->parse('Header',$this->data);
			$this->load->view('Student');
			$this->parser->parse('Footer',$this->data);
			}


function insert1()
	
	{ $image ="";
			
		if($_FILES['file']['name']!='')
				{
					$data['image_z1']= $_FILES['file']['name'];
					$image=sha1($_FILES['file']['name']).time().rand(0, 9);
				
					if(!empty($_FILES['file']['name']))
					{
				
						$config =  array(
						'upload_path'	  => './uploaded_images/',
						'file_name'       => $image,
						'allowed_types'   => "gif|jpg|png|jpeg|JPG|JPEG|PNG|JPG",
						'overwrite'       => true);
						
							$this->upload->initialize($config);
							
				 
								if($this->upload->do_upload("file"))
								{
					
									$upload_data = $this->upload->data();
									$image=$upload_data['file_name'];
								}else
								{
										$this->upload->display_errors()."file upload failed";
										$image ="";
								}
					}
				}
				
				
			$data=array('First_name'=>$this->input->post('First_name'),
			'Last_name'=>$this->input->post('Last_name'),
			'Image'=>$image,
			'role_id'=>$this->input->post('role_id'),
			'Gender'=>$this->input->post('Gender'),
			'DOB'=>$this->input->post('DOB'),
			'Contact_no'=>$this->input->post('Contact_no'),
			'House_no'=>$this->input->post('House_no'),
			'Street'=>$this->input->post('Street'),
			'Line2'=>$this->input->post('Line2'),
			'City'=>$this->input->post('City'),
			'State'=>$this->input->post('State'),
			'Zip'=>$this->input->post('Zip'),
			'PG_subject'=>$this->input->post('PG_subject'),
			'PG_university'=>$this->input->post('PG_university'),
			'G_subject'=>$this->input->post('G_subject'),
			'G_university'=>$this->input->post('G_university'),
			'School_subject'=>$this->input->post('School_subject'),
			'School_name'=>$this->input->post('School_name'),
			'Other'=>$this->input->post('Other'),
			'usermailid'=>$this->input->post('usermailid'),
			'password'=>md5($this->input->post('password')),
			'Confirm_password'=>md5($this->input->post('Confirm_password')));
			
			
			if(!empty($this->input->post('id')))
		
			{
				
			$filter=array('user_id'=>$this->input->post('id'));
			$this->Loginpg_model->update('users',$data,$filter);
			redirect ('index.php/Loginpg/editprofile/'.$this->input->post('id'));
			}
		else		
			{
		
			$this->Loginpg_model->insert('users',$data);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("index")." Registration Successful!!");
			redirect('index.php/Loginpg');
			
			$this->parser->parse('Header',$this->data);
			$this->load->view('Student');
			$this->parser->parse('Footer',$this->data);
			
	
			}

}
	function Check_email($Username=false)
        {
               
                $Username = $this->input->post('email');
				//echo $Username;die;
             $email_id =$this->data['email_id']=$this->Loginpg_model->Check_email($Username);
			
			 
			 if (count($email_id)>0)
			 {
				  echo '0';
			 }
			else 
			{
				
					echo '1';
			}
        }
		
	function stpro($user_id=false)
	
	{
		
		if(!empty($user_id))
			
		{
			
		$data=$this->data['student']=$this->Loginpg_model->stupro($user_id);

		}
		$this->parser->parse('Header',$this->data);
		$this->load->view('Stprofile');
		$this->parser->parse('Footer',$this->data);
	}
	
	
	function mtpro($user_id=false)
	
	{
		
		if(!empty($user_id))
			
		{
			
		$this->data['student']=$this->Loginpg_model->stupro($user_id);
		}
		$this->parser->parse('Header',$this->data);
		$this->load->view('Mtprofile');
		$this->parser->parse('Footer',$this->data);
	}
	
	
	function editprofile($user_id=false)
	{	
		if($this->role_id=='student'){
	
		$this->data['state']=$this->Loginpg_model->stateget_data();
		if(!empty($user_id))
			
		{
			
		$this->data['student']=$this->Loginpg_model->stupro($user_id);

		}
		$this->parser->parse('Header',$this->data);
		$this->load->view('Editprofile');
		$this->parser->parse('Footer',$this->data);
		
		}
		elseif($this->role_id=='mentor'){ 

				if(!empty($user_id))
				{
			
			
		$this->data['student']=$this->Loginpg_model->stupro($user_id);
				}
		
		$this->parser->parse('Header',$this->data);
		$this->load->view('Editprofile1');
		$this->parser->parse('Footer',$this->data);
		
		}
	}
	
	

}
