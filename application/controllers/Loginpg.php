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
		$this->load->library('email');
		
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
	/*----------------Function for login view----------------------------*/
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
											 'First_name'=>$row->First_name,
											 'Status'=>$row->Status
											 );
					if($user_data[Status]=="Inactive" )
					{
						
					$this->session->set_flashdata('message_type', 'error');
					$this->session->set_flashdata('message', $this->config->item("login").' Your status is Inactive .
					Please activate by clicking on link  provided on your Registered Email!!');
					redirect('index.php/Loginpg/index');	

					}
					else
					{ 
	
										
					
						
						$this->session->set_userdata('user_data',$user_data);
						$user_session_data= $this->session->userdata('user_data');
						
						
					$this->session->set_flashdata('message_type', 'success');
					$this->session->set_flashdata('message', $this->config->item("login").' Login Successfully!!');
				}
			
				}		
						
					if($user_data[role_id]=="student" )
						
					
					{
					redirect("index.php/Loginpg/stpro/".$user_data[user_id]);
					}
					
					elseif( $user_data[role_id]=="mentor" && $user_data[Status]=="Active")
				
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
		
/*----------------------- function for mentor registration page -----------------------*/	

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
			'Status'=>$this->input->post('Status'),
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
			redirect('index.php/Loginpg/activation/'.$user_id);
		
			$this->parser->parse('Header',$this->data);
			$this->load->view('Mentor');
			$this->parser->parse('Footer',$this->data);
			redirect ('index.php/Loginpg');
	}	
}	


/*----------------------- function for student registration page -----------------------*/
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
			'Status'=>$this->input->post('Status'),
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
		
			$id=$this->Loginpg_model->insert('users',$data);
			
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("index")." Registration Successful!!");
			
			redirect('index.php/Loginpg/result_application/'.$id);
			
			$this->parser->parse('Header',$this->data);
			$this->load->view('Student');
			$this->parser->parse('Footer',$this->data);
			
	
			}

}


/*---------------function for restricting duplicate email-------------------*/
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
		
		
		/*---------------------------Student profile------------*/
		
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
	
	
	
	
		/*---------------------------Mentor profile------------*/
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
	
	
	
	/*----------------------function for student /mentor edit profile------------------*/
	
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
	
	
	/*------------------function for forget password-------------------*/
	
	function reset_password_view()
	{
		$this->parser->parse('Header',$this->data);
		$this->load->view('Password',$this->data);
		$this->parser->parse('Footer',$this->data);
	}
	
	function reset_password()
	{
		$UserEmail=$this->input->post('usermailid');
		
		$code=substr(md5(microtime()),rand(0,26),5);
		
		{
			$EmailRegApp=$this->Loginpg_model->get_reset_password('users',array('usermailid'=>$UserEmail));
			if($EmailRegApp)
			{
				
				$updatePassword=$this->Loginpg_model->set_reset_password('users',array('usermailid'=>$UserEmail),array('password'=>md5($code)));
			}
			else
			{
				  ?><script> alert('Email Id Does Not Exist');</script><?php
				  redirect('http://junctiondev.cloudapp.net/careermitra','refresh');
			}
		}
		if($updatePassword)
		{
			$subject=" CareerMitra:- Reset Your Password ";
			$message= " <html><body><h3>Hello </h3><p> Please Use This Temporary Password And Reset Your Password <br> Temporary Password:- <b>$code  </b><br> </p><p><h3>Please Click In This Link And Login   :)</h3></p><p> http://junctiondev.cloudapp.net/careermitra/index.php/Loginpg/index</p></body></html>";
			$name='Junction Software Pvt Ltd';
			/*
			 This example shows settings to use when sending via Google's Gmail servers.
			 */
			//SMTP needs accurate times, and the PHP time zone MUST be set
			//This should be done in your php.ini, but this is how to do it if you don't have access to that
			date_default_timezone_set('Etc/UTC');
				
			require 'PHPMailer/PHPMailerAutoload.php';
				
			//Create a new PHPMailer instance
			$mail = new PHPMailer;
				
			//Tell PHPMailer to use SMTP
			$mail->isSMTP();
				
			//Enable SMTP debugging
			// 0 = off (for production use)
			// 1 = client messages
			// 2 = client and server messages
			$mail->SMTPDebug = 0;
				
			//Ask for HTML-friendly debug output
			$mail->Debugoutput = 'html';
				
			//Set the hostname of the mail server
			$mail->Host = 'smtp.gmail.com';
				
			//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
			$mail->Port = 587;
				
			//Set the encryption system to use - ssl (deprecated) or tls
			$mail->SMTPSecure = 'tls';
				
			//Whether to use SMTP authentication
			$mail->SMTPAuth = true;
				
			//Username to use for SMTP authentication - use full email address for gmail
			$mail->Username = "dev4junction@gmail.com";
				
			//Password to use for SMTP authentication
			$mail->Password = 'initial1$';
				
			//Set who the message is to be sent from
			$mail->setFrom($UserEmail,$name);
				
			//Set an alternative reply-to address
			$mail->addReplyTo('dev4junction@gmail.com', $name);
				
			//Set who the message is to be sent to
			$mail->addAddress($UserEmail);
				
			//Set the subject line
			$mail->Subject = $subject;
				
			//Read an HTML message body from an external file, convert referenced images to embedded,
			//convert HTML into a basic plain-text alternative body
			$mail->msgHTML($message);
				
			//Replace the plain text body with one created manually
			$mail->AltBody = 'This is a plain-text message body';
				
			//Attach an image file
			//$mail->addAttachment($uploadfile,$filename);
				
			//send the message, check for errors
			if (!$mail->send())
			{
				print "We encountered an error sending your mail";
					
			}
				?><script> alert('Please Check Your Registered Email');</script><?php
				redirect('http://junctiondev.cloudapp.net/careermitra','refresh');
		}
		else 
		{
			?><script> alert('Email Id Does Not Exist');</script><?php
			 redirect('http://junctiondev.cloudapp.net/careermitra','refresh');
		}
			
	}
	

	/*------- Function For Activation account of user and Show Message If Success Or Not--------------------- */
	
	function result_application($user_id=false)
	{
		
		$result=$this->Loginpg_model->result_application($user_id);
			
			$subject="CareerMitra:-  Please Activate Your Account ";
			$message= " <html><body><h3>Hello: ($result[0]->First_name) </h3><p> You are Successfully Registered <br><h3>Please Click In This Link And Activate Your Account  :)</h3></p><p> http://junctiondev.cloudapp.net/careermitra/index.php/Loginpg/activate_org/$user_id</p></body></html>";
			$name='Junction Software Pvt Ltd';
			/*
			 This example shows settings to use when sending via Google's Gmail servers.
			 */
			
			//SMTP needs accurate times, and the PHP time zone MUST be set
			//This should be done in your php.ini, but this is how to do it if you don't have access to that
			date_default_timezone_set('Etc/UTC');
			
			require 'PHPMailer/PHPMailerAutoload.php';
			
			//Create a new PHPMailer instance
			$mail = new PHPMailer;
			
			//Tell PHPMailer to use SMTP
			$mail->isSMTP();
			
			//Enable SMTP debugging
			// 0 = off (for production use)
			// 1 = client messages
			// 2 = client and server messages
			$mail->SMTPDebug = 0;
			
			//Ask for HTML-friendly debug output
			$mail->Debugoutput = 'html';
			
			//Set the hostname of the mail server
			$mail->Host = 'smtp.gmail.com';
			
			//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
			$mail->Port = 587;
			
			//Set the encryption system to use - ssl (deprecated) or tls
			$mail->SMTPSecure = 'tls';
			
			//Whether to use SMTP authentication
			$mail->SMTPAuth = true;
			
			//Username to use for SMTP authentication - use full email address for gmail
			$mail->Username = "dev4junction@gmail.com";
			
			//Password to use for SMTP authentication
			$mail->Password = 'initial1$';
			
			//Set who the message is to be sent from
			//$mail->setFrom($result->,$name);
			
			//Set an alternative reply-to address
			$mail->addReplyTo('dev4junction@gmail.com', $name);
			
			//Set who the message is to be sent to
			$mail->addAddress($result[0]->usermailid);
			
			//Set the subject line
			$mail->Subject = $subject;
			
			//Read an HTML message body from an external file, convert referenced images to embedded,
			//convert HTML into a basic plain-text alternative body
			$mail->msgHTML($message);
			
			//Replace the plain text body with one created manually
			$mail->AltBody = 'This is a plain-text message body';
			
			//Attach an image file
			//$mail->addAttachment($uploadfile,$filename);
			
			//send the message, check for errors
			
			
				if (!$mail->send()) 
				{
					print "We encountered an error sending your mail";
						
				}
				else
				{
					?><script> alert('Your Application Registered Successfully Please Activate Your Application with the Help Of Registered Email !!!!');</script><?php
					redirect('http://junctiondev.cloudapp.net/careermitra','refresh');
				}
			}
			
			/* function for activate account with help of mail  */
	function activate_org($id=false)
	{
		$activate_org=$this->data['activate_org']=$this->Loginpg_model->activate_org('users',array('user_id'=>$id));
		if($activate_org)
		{
			?><script>alert('Your Application Activate Please Login With Your Credentials');</script><?php
			redirect('http://junctiondev.cloudapp.net/appmanager','refresh');
		}
	}
	
		
	/*------- Function For Activation account of mentor and Show Message If Success Or Not--------------------- 
	
	function activation($user_id=false)
	{
		
		$result=$this->Loginpg_model->activation($user_id);
			
			$subject="CareerMitra:-  Welcome to CareerMitra ";
			$message= " <html><body><h3>Hello:$result[First_name] </h3><p> You are Successfully Registered <br><p>Kindly wait till your account is verified from our admin. We will shortly inform you</p></body></html>";
			$name='Junction Software Pvt Ltd';
			/*
			 This example shows settings to use when sending via Google's Gmail servers.
			 */
			
			//SMTP needs accurate times, and the PHP time zone MUST be set
			//This should be done in your php.ini, but this is how to do it if you don't have access to that
			/*date_default_timezone_set('Etc/UTC');
			
			require 'PHPMailer/PHPMailerAutoload.php';
			
			//Create a new PHPMailer instance
			$mail = new PHPMailer;
			
			//Tell PHPMailer to use SMTP
			$mail->isSMTP();
			
			//Enable SMTP debugging
			// 0 = off (for production use)
			// 1 = client messages
			// 2 = client and server messages
			$mail->SMTPDebug = 0;
			
			//Ask for HTML-friendly debug output
			$mail->Debugoutput = 'html';
			
			//Set the hostname of the mail server
			$mail->Host = 'smtp.gmail.com';
			
			//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
			$mail->Port = 587;
			
			//Set the encryption system to use - ssl (deprecated) or tls
			$mail->SMTPSecure = 'tls';
			
			//Whether to use SMTP authentication
			$mail->SMTPAuth = true;
			
			//Username to use for SMTP authentication - use full email address for gmail
			$mail->Username = "dev4junction@gmail.com";
			
			//Password to use for SMTP authentication
			$mail->Password = 'initial1$';
			
			//Set who the message is to be sent from
			$mail->setFrom($result->organization_admin_email,$name);
			
			//Set an alternative reply-to address
			$mail->addReplyTo('dev4junction@gmail.com', $name);
			
			//Set who the message is to be sent to
			$mail->addAddress($json->organization_admin_email);
			
			//Set the subject line
			$mail->Subject = $subject;
			
			//Read an HTML message body from an external file, convert referenced images to embedded,
			//convert HTML into a basic plain-text alternative body
			$mail->msgHTML($message);
			
			//Replace the plain text body with one created manually
			$mail->AltBody = 'This is a plain-text message body';
			
			//Attach an image file
			//$mail->addAttachment($uploadfile,$filename);
			
			//send the message, check for errors
			if (!$mail->send())
			{
				print "We encountered an error sending your mail";
					
			}
			else
			{
				$subjects=" Zero ERP :- Your Application Registered Successfully ";
				$messages= " <html><body><h3>Hello: Application Administrator </h3><p>A mentor is registered on Careermitra .Kindly verify his account and activate his/her account.</p></body></html>";
				$names='Junction Software Pvt Ltd';
					
				/*
				 This example shows settings to use when sending via Google's Gmail servers.
				 */
			
				//SMTP needs accurate times, and the PHP time zone MUST be set
				//This should be done in your php.ini, but this is how to do it if you don't have access to that
				//	date_default_timezone_set('Etc/UTC');
			
				//require 'PHPMailer/PHPMailerAutoload.php';
			
				//Create a new PHPMailer instance
				//$mail = new PHPMailer;
			
				//Tell PHPMailer to use SMTP
				//$mail->isSMTP();
			
				//Enable SMTP debugging
				// 0 = off (for production use)
				// 1 = client messages
				// 2 = client and server messages
				//$mail->SMTPDebug = 0;
			
				//Ask for HTML-friendly debug output
				//	$mail->Debugoutput = 'html';
			
				//Set the hostname of the mail server
				//$mail->Host = 'smtp.gmail.com';
			
				//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
				//	$mail->Port = 587;
			
				//Set the encryption system to use - ssl (deprecated) or tls
				//$mail->SMTPSecure = 'tls';
			
				//Whether to use SMTP authentication
				//$mail->SMTPAuth = true;
			
				//Username to use for SMTP authentication - use full email address for gmail
				//$mail->Username = "dev4junction@gmail.com";
			
				//Password to use for SMTP authentication
				//	$mail->Password = 'initial1$';
			
				//Set who the message is to be sent from
			/*	$mail->setFrom($result->application_admin_email,$names);
					
				//Set an alternative reply-to address
				$mail->addReplyTo('dev4junction@gmail.com', $names);
			
				//Set who the message is to be sent to
				$mail->addAddress($result->application_admin_email);
			
				//Set the subject line
				$mail->Subject = $subjects;
			
				//Read an HTML message body from an external file, convert referenced images to embedded,
				//convert HTML into a basic plain-text alternative body
				$mail->msgHTML($messages);
			
				//Replace the plain text body with one created manually
				$mail->AltBody = 'This is a plain-text message body';
			
				//Attach an image file
				//$mail->addAttachment($uploadfile,$filename);
			
				//send the message, check for errors
				if (!$mail->send()) 
				{
					print "We encountered an error sending your mail";
						
				}
				else
				{
					?><script> alert('Your Application Registered Successfully Please Activate Your Application With Help Of Registered Email !!!!');</script><?php
					redirect('http://junctiondev.cloudapp.net/appmanager','refresh');
				}
			}
			
			/* function for activate account with help of mail  */
	//function activate_org($id=false)
	//{
		//$activate_org=$this->data['activate_org']=$this->Loginpg->activate_org('users',array('user_id'=>$id));
		//if($activate_org)
		//{
			//
			//redirect('http://junctiondev.cloudapp.net/appmanager','refresh');
	//	}
	//}*/
	

}
