<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manageintro extends CI_Controller
 {

	
	 function __construct() {
		parent::__construct();
			
		$this->data[]="";
		$this->data['url'] = base_url();
		
		$this->load->model('Manageintro_model');
		$this->load->model('Authority_model');
		$this->load->library('parser');
			$this->load->library('Authority');
		$this->data['base_url']=base_url();
		
		$this->load->library('session');
		
	}
	function Index($id=false)
		
	{	  Authority::is_logged_in();
		if(Authority::checkAuthority('Manageintro.Index')==true)
			{
				redirect('index.php/Loginpg');
			}
		if(!empty ($id))
		{
			
			$this->data['updatedata']=$this->Manageintro_model->get_forupdate($id);
		}
			$this->data['intro1']=$this->Manageintro_model->introget_data();
			$this->data['lang']=$this->Manageintro_model->langget_data();
			$this->data['intro']=$this->Manageintro_model->get_data();
			$this->parser->parse('Adminheader',$this->data);
			$this->load->view('Mngintro');
			$this->parser->parse('Adminfooter',$this->data);
		
	}
	function insert()
		{	  Authority::is_logged_in();
		if(Authority::checkAuthority('Manageintro.insert')==true)
			{
				redirect('index.php/Loginpg');
			}
			
			$data=array('Type_id'=>$this->input->post('Type_id'));
			
			if(!empty($this->input->post('id')))
		
			{
				
			$filter=array('Intro_id'=>$this->input->post('id'));
			$this->Manageintro_model->update('intro_master',$data,$filter);
		
			$data=array(
			'Intro_id'=>$this->input->post('id'),
			'Description'=>$this->input->post('Description'),
			'Language_id'=>$this->input->post('Language_id'));
			
			$this->Manageintro_model->update('intro_detail',$data,$filter);
			
			}
			else
			{
			
			$id=$this->Manageintro_model->insert('intro_master',$data);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("index")." Data Added Successfully!!");
			
			$data=array(
			'Intro_id'=>$id,
			'Description'=>$this->input->post('Description'),
			'Language_id'=>$this->input->post('Language_id'));
			
			$this->Manageintro_model->insert('intro_detail',$data);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("index")." Data Added Successfully!!");
			}
		redirect ('index.php/Manageintro');
		}
		
	function delete($id=false)
	{	  Authority::is_logged_in();
		if(Authority::checkAuthority('Manageintro.delete')==true)
			{
				redirect('index.php/Loginpg');
			}
		$filter=array('Intro_id'=>$id);
		$this->Manageintro_model->delete('intro_detail','intro_master',$filter);
		
		redirect('index.php/Manageintro');
	}
	
	
 }
 
	
 
 
 