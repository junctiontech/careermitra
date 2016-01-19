<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manageinstitute extends CI_Controller
 {

	
	 function __construct() {
		parent::__construct();
			
		$this->data[]="";
		$this->data['url'] = base_url();
		
		$this->load->model('Manageinstitute_model');
		$this->load->model('Authority_model');
		$this->load->library('parser');
		
		$this->data['base_url']=base_url();
			$this->load->library('Authority');
		$this->load->library('session');
		$this->load->library('upload');
	}

	function Index($id=false)
		
	{	Authority::is_logged_in();
		if(Authority::checkAuthority('Manageinstitute.Index')==true)
			{
				redirect('index.php/Loginpg');
			}
		if(!empty ($id))
		{
			
			$this->data['updatedata']=$this->Manageinstitute_model->get_forupdate($id);
			
		}
			
			$this->data['Lang']=$this->Manageinstitute_model->langet_data();
			$this->data['institute']=$this->Manageinstitute_model->get_data();
			
			$this->parser->parse('Adminheader',$this->data);
			$this->load->view('Mnginstitute');
			$this->parser->parse('Adminfooter',$this->data);
		
	}
	function insert()
	{    Authority::is_logged_in();
		if(Authority::checkAuthority('Manageinstitute.insert')==true)
			{
				redirect('index.php/Loginpg');
			}
			
		
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
										$image    ="";
								}
					}
				}
			$data=array('Alphabet_id'=>$this->input->post('Alphabet_id'),
			
			'Image'=>$image,
			'Official_link'=>$this->input->post('Official_link'),
			'Group1'=>$this->input->post('Group1'),
			'Contact_no'=>$this->input->post('Contact_no'),
			'Longitude'=>$this->input->post('Longitude'),
			'Latitude'=>$this->input->post('Latitude'));
			
			if(!empty($this->input->post('id')))
		
			{
				
			$filter=array('Institute_id'=>$this->input->post('id'));
			$this->Manageinstitute_model->update('institute_master',$data,$filter);
		
			$data=array(
			'Institute_id'=>$this->input->post('id'),
			'Institute_name'=>$this->input->post('Institute_name'),
			'Address'=>$this->input->post('Address'),
			'Description'=>$this->input->post('Description'),
			
			'Language_id'=>$this->input->post('Language_id'));
			
			$this->Manageinstitute_model->update('institute_detail',$data,$filter);
			
			}
			else
			{
			
			$id=$this->Manageinstitute_model->insert('institute_master',$data);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("index")." Data Added Successfully!!");
			
			$data=array(
			'Institute_id'=>$id,
			'Institute_name'=>$this->input->post('Institute_name'),
			'Address'=>$this->input->post('Address'),
			'Description'=>$this->input->post('Description'),
			
			'Language_id'=>$this->input->post('Language_id'));
			
			$this->Manageinstitute_model->insert('institute_detail',$data);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("index")." Data Added Successfully!!");
			}
		redirect ('index.php/Manageinstitute');
		}
		
	function delete($id=false)
	{ 
		  Authority::is_logged_in();
		if(Authority::checkAuthority('Manageinstitute.delete')==true)
			{
				redirect('index.php/Loginpg');
			}
		$filter=array('Institute_id'=>$id);
		$this->Manageinstitute_model->delete('institute_detail','institute_master',$filter);
		
		redirect('index.php/Manageinstitute');
	}
 }