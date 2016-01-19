<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mentorpg extends CI_Controller
 {

	
	 function __construct() {
		parent::__construct();
			
		$this->data[]="";
		$this->data['url'] = base_url();
		
		$this->load->model('Mentorpg_model');
		
		$this->load->library('parser');
		
		$this->data['base_url']=base_url();
		
		$this->load->library('session');
		$this->load->library('upload');
	}
	function index()
		
	{	
		
			
		
			$this->parser->parse('header',$this->data);
			$this->load->view('Mentor');
			$this->parser->parse('footer',$this->data);
		
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
			'Email'=>$this->input->post('Email'),
			'Qualification'=>$this->input->post('Qualification'),
			'Current_job'=>$this->input->post('Current_job'),
			'More_info'=>$this->input->post('More_info'),
			'usermailid'=>$this->input->post('usermailid'),
			'Password'=>md5($this->input->post('password')),
			'Confirm_password'=>md5($this->input->post('Confirm_password')));
		
		
			$this->Mentorpg_model->insert('users',$data);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("index")." Registration Successful!!");
		
			redirect ('index.php/Loginpg');
	}
 }