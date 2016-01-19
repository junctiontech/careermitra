<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Managesubject extends CI_Controller
 {

	
	 function __construct() {
		parent::__construct();
			
		$this->data[]="";
		$this->data['url'] = base_url();
		
		$this->load->model('Managesubject_model');
			$this->load->library('Authority');
		$this->load->library('parser');
		$this->load->model('Authority_model');
		$this->data['base_url']=base_url();
		
		$this->load->library('session');
		
	}
	function Index($id=false)
		
	{	  Authority::is_logged_in();
		if(Authority::checkAuthority('Managesubject.Index')==true)
			{
				redirect('index.php/Loginpg');
			}
		if(!empty ($id))
		{
			
			$this->data['updatedata']=$this->Managesubject_model->get_forupdate($id);
		}
		
			
			$this->data['sub']=$this->Managesubject_model->get_data();
			$this->parser->parse('Adminheader',$this->data);
			$this->load->view('Mngsubject');
			$this->parser->parse('Adminfooter',$this->data);
		
	}
	function insert()
		{  Authority::is_logged_in();
		if(Authority::checkAuthority('Managesubject.insert')==true)
			{
				redirect('index.php/Loginpg');
			}
			$data=array('Subject'=>$this->input->post('Subject'));
			
			if(!empty($this->input->post('id')))
		
			{
				
			$filter=array('Subject_id'=>$this->input->post('id'));
			$this->Managesubject_model->update('subject_master',$data,$filter);
		
			}
			else
			{
			
			$id=$this->Managesubject_model->insert('subject_master',$data);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("index")." Data Added Successfully!!");
			}
		redirect ('index.php/Managesubject');
		}
		
	
	function delete($id=false)
	{  Authority::is_logged_in();
		if(Authority::checkAuthority('Managesubject.delete')==true)
			{
				redirect('index.php/Loginpg');
			}
		$filter=array('Subject_id'=>$id);
		$this->Managesubject_model->delete('subject_master',$filter);
		
		redirect('index.php/Managesubject');
	}
	
	
 }