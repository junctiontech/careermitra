<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Institutepg extends CI_Controller
 {

	
	 function __construct()
	 {
		parent::__construct();
			
		$this->data[]="";
		$this->data['url'] = base_url();
		
		$this->load->model('Institutepg_model');
		$this->load->model('Authority_model');
		$this->load->library('Authority');
		$this->load->library('parser');
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
	function Index($id=false)
		
		{	
			if(!empty($id))
			{
				$this->data['detail1']=$this->Institutepg_model->detail($id);
				
			}
		 else
		 {	
						
			$this->data['intro']= $this->Institutepg_model->introget_data();
		
			$this->data['option']= $this->Institutepg_model->optionget_data();
			$this->data['notify']= $this->Institutepg_model->notifyget_data();
		 
		 }
			$this->parser->parse('Header',$this->data);
			$this->load->view('Institute',$this->data);
			$this->parser->parse('Footer',$this->data);
		}
		
		
		
		
		
		function Mnginsindex($id=false)
		
	{	Authority::is_logged_in();
		if(Authority::checkAuthority('Manageinstitute.Index')==true)
			{
				redirect('index.php/Loginpg');
			}
		if(!empty ($id))
		{
			
			$this->data['updatedata']=$this->Institutepg_model->get_forupdate($id);
			
		}
			
			$this->data['Lang']=$this->Institutepg_model->langet_data();
			$this->data['institute']=$this->Institutepg_model->get_data();
			
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
			$image ="";
		
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
						'max_size'        => '50',
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
			'Contact_no'=>$this->input->post('Contact_no'));
			
			
			if(!empty($this->input->post('id')))
		
			{
				
			$filter=array('Institute_id'=>$this->input->post('id'));
			$this->Institutepg_model->update('institute_master',$data,$filter);
		
			$data=array(
			'Institute_id'=>$this->input->post('id'),
			'Institute_name'=>$this->input->post('Institute_name'),
			'Address'=>$this->input->post('Address'),
			'Description'=>$this->input->post('Description'),
			
			'Language_id'=>$this->input->post('Language_id'));
			
			$this->Institutepg_model->update('institute_detail',$data,$filter);
			
			}
			else
			{
			
			$id=$this->Institutepg_model->insert('institute_master',$data);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("index")." Data Added Successfully!!");
			
			$data=array(
			'Institute_id'=>$id,
			'Institute_name'=>$this->input->post('Institute_name'),
			'Address'=>$this->input->post('Address'),
			'Description'=>$this->input->post('Description'),
			
			'Language_id'=>$this->input->post('Language_id'));
			
			$this->Institutepg_model->insert('institute_detail',$data);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("index")." Data Added Successfully!!");
			}
			
		$this->parser->parse('Adminheader',$this->data);
		$this->load->view('Mnginstitute');
		$this->parser->parse('Adminfooter',$this->data);
		redirect ('index.php/Institutepg/Mnginsindex');
		}
		
	function delete($id=false)
	{ 
		  Authority::is_logged_in();
		if(Authority::checkAuthority('Manageinstitute.delete')==true)
			{
				redirect('index.php/Loginpg');
			}
		$filter=array('Institute_id'=>$id);
		$this->Institutepg_model->delete('institute_detail','institute_master',$filter);
		$this->session->set_flashdata('message_type', 'success');
		$this->session->set_flashdata('message', $this->config->item("index")." Data deleted Successfully!!");
		
		$this->parser->parse('Adminheader',$this->data);
		$this->load->view('Mnginstitute');
		$this->parser->parse('Adminfooter',$this->data);
		redirect('index.php/Institutepg/Mnginsindex');
	}
	
	
	
	function Degindex($id=false)
		
	{	Authority::is_logged_in();
		if(Authority::checkAuthority('Managedegree.Index')==true)
			{
				redirect('index.php/Loginpg');
			}
		if(!empty ($id))
		{
			
			$this->data['updatedata']=$this->Institutepg_model->Degget_forupdate($id);
		}
			$this->data['Degree']=$this->Institutepg_model->Degget_data();
			
			
			
			$this->parser->parse('Adminheader',$this->data);
			$this->load->view('Mngdegree');
			$this->parser->parse('Adminfooter',$this->data);
		
	}
	function Deginsert()
		{	Authority::is_logged_in();
		if(Authority::checkAuthority('Managedegree.insert')==true)
			{
				redirect('index.php/Loginpg');
			}
			$data=array('Degree_name'=>$this->input->post('Degree_name'),
			'Term'=>$this->input->post('Term'),
			'Eligibility'=>$this->input->post('Eligibility'));
			
			
			
			if(!empty($this->input->post('id')))
		
			{
				
			$filter=array('Degree_id'=>$this->input->post('id'));
			$this->Institutepg_model->update('degree_master',$data,$filter);
	
			}
			else
			{
			
			$id=$this->Institutepg_model->insert('degree_master',$data);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("index")." Data Added Successfully!!");
			}
		$this->parser->parse('Adminheader',$this->data);
		$this->load->view('Mngdegree');
		$this->parser->parse('Adminfooter',$this->data);
		redirect ('index.php/Institutepg/Degindex');
		}
	
	function Degdelete($id=false)
	{	
		Authority::is_logged_in();
		if(Authority::checkAuthority('Managedegree.delete')==true)
			{
				redirect('index.php/Loginpg');
			}
		$filter=array('Degree_id'=>$id);
		$this->Institutepg_model->Degdelete('degree_master',$filter);
		$this->session->set_flashdata('message_type', 'success');
		$this->session->set_flashdata('message', $this->config->item("index")." Data deleted Successfully!!");
		
		$this->parser->parse('Adminheader',$this->data);
		$this->load->view('Mngdegree');
		$this->parser->parse('Adminfooter',$this->data);
		redirect('index.php/Institutepg/Degindex');
	}
	
	
	
	function Maindex($id=false)
		
	{	  Authority::is_logged_in();
		if(Authority::checkAuthority('Managemapping.Index')==true)
			{
				redirect('index.php/Loginpg');
			}
		if(!empty ($id))
		{
			
			$this->data['updatedata']=$this->Institutepg_model->Maget_forupdate($id);
		}
			$this->data['Career']=$this->Institutepg_model->Macareerget_data();
			
			$this->data['Inst']=$this->Institutepg_model->Mainstituteget_data();
			$this->data['data1']=$this->Institutepg_model->Maget_data();
			$this->parser->parse('Adminheader',$this->data);
			$this->load->view('Mngmapping');
			$this->parser->parse('Adminfooter',$this->data);
		
	}
	function Mainsert()
		{	 
		Authority::is_logged_in();
		if(Authority::checkAuthority('Managemapping.insert')==true)
			{
				redirect('index.php/Loginpg');
			}
			
			if(!empty($this->input->post('Career_id')) && !empty($this->input->post('Institute_id')))
		{
			$Career=$this->input->post('Career_id');
			$Crr_length=count($Career);
			
			$Institute=$this->input->post('Institute_id');
			$Inst_length=count($Institute);
			
			for($i=0;$i<$Crr_length;$i++)
			{
				for($j=0;$j<$Inst_length;$j++)
				{
					
				$data=array('Career_id'=>$Career[$i],
				'Institute_id'=>$Institute[$j]);	
			
				
				$id=$this->Institutepg_model->insert('career_inst_mapping',$data);	
				$this->session->set_flashdata('message_type', 'success');
				$this->session->set_flashdata('message', $this->config->item("index")." Data Added Successfully!!");
				}
			}
		}
		else{
			
		}
		$this->parser->parse('Adminheader',$this->data);
		$this->load->view('Mngmapping');
		$this->parser->parse('Adminfooter',$this->data);
		redirect ('index.php/Institutepg/Maindex');
		}
		
	
	function Madelete($id=false)
	{	  
	Authority::is_logged_in();
		if(Authority::checkAuthority('Managemapping.delete')==true)
			{
				redirect('index.php/Loginpg');
			}
		$filter=array('Mapping_id'=>$id);
		$this->Institutepg_model->Madelete('career_inst_mapping',$filter);
		$this->session->set_flashdata('message_type', 'success');
		$this->session->set_flashdata('message', $this->config->item("index")." Data deleted Successfully!!");
		
		$this->parser->parse('Adminheader',$this->data);
		$this->load->view('Mngmapping');
		$this->parser->parse('Adminfooter',$this->data);
		redirect('index.php/Institutepg/Maindex');
	}
	
	
	function Maindex1($id=false)
		
	{	  Authority::is_logged_in();
		if(Authority::checkAuthority('Managemapping1.Index')==true)
			{
				redirect('index.php/Loginpg');
			}
		if(!empty ($id))
		{
			
			$this->data['updatedata']=$this->Institutepg_model->Maget_forupdate1($id);
		}
			$this->data['Degree']=$this->Institutepg_model->Madegreeget_data1();
			
			$this->data['Inst']=$this->Institutepg_model->Mainstituteget_data1();
			$this->data['data1']=$this->Institutepg_model->Maget_data1();
			$this->parser->parse('Adminheader',$this->data);
			$this->load->view('Mngmapping1');
			$this->parser->parse('Adminfooter',$this->data);
		
	}
	function Mainsert1()
		{
			Authority::is_logged_in();
		if(Authority::checkAuthority('Managemapping1.insert')==true)
			{
				redirect('index.php/Loginpg');
			}
			
		if(!empty($this->input->post('Degree_id')) && !empty($this->input->post('Institute_id')))
		{
			$Degree=$this->input->post('Degree_id');
			$Deg_length=count($Degree);
			
			$Institute=$this->input->post('Institute_id');
			$Inst_length=count($Institute);
			
			for($i=0;$i<$Deg_length;$i++)
			{
				for($j=0;$j<$Inst_length;$j++)
				{
					
				$data=array('Degree_id'=>$Degree[$i],
				'Institute_id'=>$Institute[$j]);	
			
				
				$id=$this->Institutepg_model->insert('degree_inst_mapping',$data);
				$this->session->set_flashdata('message_type', 'success');
				$this->session->set_flashdata('message', $this->config->item("index")." Data Added Successfully!!");				
				}
			}
			
		}
		else
		{
			
		}
		$this->parser->parse('Adminheader',$this->data);
		$this->load->view('Mngmapping1');
		$this->parser->parse('Adminfooter',$this->data);
		redirect ('index.php/Institutepg/Maindex1');
		}
		
	
	function Madelete1($id=false)
	{	  
	Authority::is_logged_in();
		if(Authority::checkAuthority('Managemapping1.delete')==true)
			{
				redirect('index.php/Loginpg');
			}
		$filter=array('Mapping_id'=>$id);
		$this->Institutepg_model->Madelete1('degree_inst_mapping',$filter);
		
		$this->session->set_flashdata('message_type', 'success');
		$this->session->set_flashdata('message', $this->config->item("index")." Data deleted Successfully!!");				
		$this->parser->parse('Adminheader',$this->data);
		$this->load->view('Mngmapping1');
		$this->parser->parse('Adminfooter',$this->data);
		redirect ('index.php/Institutepg/Maindex1');
	}
	
 }