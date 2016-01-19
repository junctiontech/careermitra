<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Managepapers extends CI_Controller
 {

	
	 function __construct() {
		parent::__construct();
			
		$this->data[]="";
		$this->data['url'] = base_url();
		
		$this->load->model('Managepapers_model');
			$this->load->library('Authority');
		$this->load->library('parser');
		$this->load->model('Authority_model');
		$this->data['base_url']=base_url();
		
		$this->load->library('session');
		$this->load->library('upload');
	}
	function index($id=false)
		
	{	  Authority::is_logged_in();
		if(Authority::checkAuthority('Managepapers.index')==true)
			{
				redirect('index.php/Loginpg');
			}
		if(!empty ($id))
		{
			
			$this->data['updatedata']=$this->Managepapers_model->get_forupdate($id);
			
		}
		
			$this->data['exam']=$this->Managepapers_model->examget_data();
			
			$this->data['exam1']=$this->Managepapers_model->subexamget_data();
			
			$this->data['exam2']=$this->Managepapers_model->exam();
			$this->data['paper']=$this->Managepapers_model->get_data();
			
			$this->data['sub']=$this->Managepapers_model->subget_data();
			$this->parser->parse('Adminheader',$this->data);
			$this->load->view('Mngpapers');
			$this->parser->parse('Adminfooter',$this->data);
		
	}
	function insert()
	{
		  Authority::is_logged_in();
		if(Authority::checkAuthority('Managepapers.insert')==true)
			{
				redirect('index.php/Loginpg');
			}	
			
			$image ="";
	
		if($_FILES['file']['name']!='')
				{
					$data['image_z1']= $_FILES['file']['name'];
					$image=sha1($_FILES['file']['name']).time().rand(0, 9);
				
					if(!empty($_FILES['file']['name']))
					{
				
						$config =  array(
						'upload_path'	  => './uploaded_papers/',
						'file_name'       => $image,
						'allowed_types'   => "gif|jpg|png|jpeg|JPG|JPEG|PNG|JPG|pdf",
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
			
			$data=array('Subject_id'=>$this->input->post('Subject_id'),
			'exam_id'=>$this->input->post('exam_id'),
			'type_id'=>$this->input->post('type_id'),
			'Paper_name'=>$image,
			'Examdetail_id'=>$this->input->post('Examdetail_id'));
			
			if(!empty($this->input->post('id')))
		
			{
				
			$filter=array('Paper_id'=>$this->input->post('id'));
			$this->Managepapers_model->update('paper_master',$data,$filter);
		
			}
			else
			{
			
			$id=$this->Managepapers_model->insert('paper_master',$data);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("index")." Data Added Successfully!!");
			}
		redirect ('index.php/Managepapers');
		}
		
	
	function delete($id=false)
	{    Authority::is_logged_in();
		if(Authority::checkAuthority('Managepapers.delete')==true)
			{
				redirect('index.php/Loginpg');
			}
		$filter=array('Paper_id'=>$id);
		$this->Managepapers_model->delete('paper_master',$filter);
		
		redirect('index.php/Managepapers');
	}
	
	
 }