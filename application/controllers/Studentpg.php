<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Studentpg extends CI_Controller
 {

	
	 function __construct() {
		parent::__construct();
			
		$this->data[]="";
		$this->data['url'] = base_url();
		
		$this->load->model('Studentpg_model');
		
		$this->load->library('parser');
		
		$this->data['base_url']=base_url();
		
		$this->load->library('session');
		$this->load->library('upload');
	}
	function index()
		
	{	
		
			$this->data['state']=$this->Studentpg_model->stateget_data();
		
			$this->parser->parse('header',$this->data);
			$this->load->view('Student');
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
			'DOB'=>$this->input->post('DOB'),
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
			'password'=>($this->input->post('password')),
			'Confirm_password'=>($this->input->post('Confirm_password')));
			
		
			$this->Studentpg_model->insert('users',$data);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("index")." Registration Successful!!");
			redirect ('index.php/Loginpg');
	}
	
	public function check_email($edit_mode=false)
        {
                //print_r($edit_mode);die;
                $Username = $this->input->post('usermailid');
                $this->Studentpg_model->check_email($Username);
        }
 }