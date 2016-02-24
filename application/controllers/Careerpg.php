<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Careerpg extends CI_Controller
 {

	
	 function __construct() {
		parent::__construct();
			
		$this->data[]="";
		$this->data['url'] = base_url();
		
		$this->load->model('Careerpg_model');
		$this->load->library('parser');
		$this->load->model('Authority_model');
		$this->load->library('Authority');
		$this->load->library('upload');
		$this->data['base_url']=base_url();
		
		$this->load->library('session');
		
		$user_session_data= $this->session->userdata('user_data');
		
		if(!empty($user_session_data))
		{
		$user_id=$user_session_data['user_id'];
		$this->load->model('Loginpg_model');
		$this->data['student']=$this->Loginpg_model->stupro($user_id);
		}else{
			$this->data['student']='';
		}
		
	}
	/*-----------------------------Careerpg function-------------------------------*/
	function Index($id=false)
		
		{
			if(!empty($id))
			{
				$this->data['detail1']=$this->Careerpg_model->detail($id);
				$this->data['institute']=$this->Careerpg_model->institute($id);
			}
		 else
		 {	
						
			$this->data['intro']= $this->Careerpg_model->introget_data();
		
			$this->data['option']= $this->Careerpg_model->optionget_data();
			
			$this->data['notify']= $this->Careerpg_model->notifyget_data();
		 
		 }
		

			$this->parser->parse('Header',$this->data);
			$this->load->view('Career');
			$this->parser->parse('Footer',$this->data);
		}
		
		
	/*-------------------------------------------------Manage careerpg function-------------------------------------*/	
	function Mngcaindex($id=false)
	
	{	Authority::is_logged_in();
		if(Authority::checkAuthority('Managecareer.Index')==true)
			{
				redirect('index.php/Loginpg');
			}
		if(!empty($id))
			{
				
				$this->data['updatedata']=$this->Careerpg_model->get_forupdate($id);
			}	
			{	
				$this->data['Lang']=$this->Careerpg_model->get_lang();
				$this->data['Career']=$this->Careerpg_model->get_data();
				$this->parser->parse('Adminheader',$this->data);
				$this->load->view('Mngcareer');
				$this->parser->parse('Adminfooter',$this->data);
			}
		
	}
	/*----------------------------------------function for Inserting data through admin panel -------------------------*/
	function insert()
	{ 
			Authority::is_logged_in();
		if(Authority::checkAuthority('Managecareer.insert')==true)
			{
				redirect('index.php/Loginpg');
			}
			
			$image ="";
			$image1 ="";
			
			if($_FILES['file']['name']!='')
				{
					$data['image_z1']= $_FILES['file']['name'];
					$image=sha1($_FILES['file']['name']).time().rand(0, 9);
				
					if(!empty($_FILES['file']['name']))
					{
				
						$config =  array(
						'upload_path'	  => './uploaded_images/',
						'file_name'       => $image,
						'allowed_types'   => "gif|jpg|png|jpeg|JPG|jpe|JPEG|PNG|JPG",
						'overwrite'       => true,
						'max_size'        => '10');
							$this->upload->initialize($config);
							
				 
								if($this->upload->do_upload("file"))
								{
					
									$upload_data = $this->upload->data();
									$image=$upload_data['file_name'];
								}else
								{
										$this->upload->display_errors()."file upload failed";
										$image    ="";
								}
					}
				}
				
				
				if($_FILES['file1']['name']!='')
				{
					$data['image_z1']= $_FILES['file1']['name'];
					$image1=sha1($_FILES['file1']['name']).time().rand(0, 9);
				
					if(!empty($_FILES['file1']['name']))
					{
				
						$config =  array(
						'upload_path'	  => './uploaded_images/',
						'file_name'       => $image1,
						'allowed_types'   => "gif|jpg|png|jpeg|JPG|jpe|JPEG|PNG|JPG",
						'overwrite'       => true);
						
							$this->upload->initialize($config);
							
				 
								if($this->upload->do_upload("file1"))
								{
					
									$upload_data = $this->upload->data();
									$image1=$upload_data['file_name'];
								}else
								{
										$this->upload->display_errors()."file upload failed";
										$image1    ="";
								}
					}
				}
				
		$string = "$image1";
		$string1 = $_POST['Eligibility1'];
		$con= $string .','.$string1;
		
		$data=array('Alphabet_id'=>$this->input->post('Alphabet_id'),
		'Image'=>$image,
		'Eligibility'=>$con,
		'Min_salary'=>$this->input->post('Min_salary'),
		'Max_salary'=>$this->input->post('Max_salary'));
			
		
		if(!empty($this->input->post('id')))
		
			{
		$filter=array('career_id'=>$this->input->post('id'));
		$this->Careerpg_model->update('career_master',$data,$filter);
		
		$data=array(
		'Career_name'=>$this->input->post('Career_name'),
		'Introduction'=>$this->input->post('Introduction'),
		'Language_id'=>$this->input->post('Language_id'),
		'Job_prospects'=>$this->input->post('Job_prospects'));
		$this->Careerpg_model->update('career_detail',$data,$filter);
			}
			
			else
			{
				
		$id=$this->Careerpg_model->insert('career_master',$data);
		$this->session->set_flashdata('message_type', 'success');
		$this->session->set_flashdata('message', $this->config->item("index")." Data Added Successfully!!");
		
		$data=array('career_id'=>$id,
		'Career_name'=>$this->input->post('Career_name'),
		'Introduction'=>$this->input->post('Introduction'),
		'Language_id'=>$this->input->post('Language_id'),
		'Job_prospects'=>$this->input->post('Job_prospects'));
		
		$this->Careerpg_model->insert('career_detail',$data);
		$this->session->set_flashdata('message_type', 'success');
		$this->session->set_flashdata('message', $this->config->item("index")." Data Added Successfully!!");
		
			}
			
		$this->parser->parse('Adminheader',$this->data);
		$this->load->view('Mngcareer');
		$this->parser->parse('Adminfooter',$this->data);
		redirect('index.php/Careerpg/Mngcaindex');
	
		
	}
	
	/*-----------------------------function for deleting career---------------------*/
	function delete($id=false)
	{ 
		Authority::is_logged_in();
		if(Authority::checkAuthority('Managecareer.delete')==true)
			{
				redirect('index.php/Loginpg');
			}
		$filter=array('career_id'=>$id);
		$this->Careerpg_model->delete('career_detail','career_master',$filter);
		$this->session->set_flashdata('message_type', 'success');
		$this->session->set_flashdata('message', $this->config->item("index")." Data deleted Successfully!!");
		
		
		$this->parser->parse('Adminheader',$this->data);
		$this->load->view('Mngcareer');
		$this->parser->parse('Adminfooter',$this->data);
		redirect('index.php/Careerpg/Mngcaindex');
	}
	
	/*---------------------------function for restricting duplicate career name-----------------*/
	function Check_career($careername=false)
        {
               
                $careername = $this->input->post('Career_name');
				
             $career =$this->data['career']=$this->Careerpg_model->Check_career($careername);
			
			 
			 if (count($career)>0)
			 {
				  echo '0';
			 }
			else 
			{
				
					echo '1';
			}
        }
		
		
 }