<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Managecontactus extends CI_Controller
 {

	
	 function __construct() {
		parent::__construct();
			
		$this->data[]="";
		$this->data['url'] = base_url();
		
		$this->load->model('Managecontactus_model');
		$this->load->model('Authority_model');
		$this->load->library('parser');
			$this->load->library('Authority');
		$this->data['base_url']=base_url();
		
		$this->load->library('session');
		
	}
	function Index($id=false)
		
	{	Authority::is_logged_in();
		if(Authority::checkAuthority('Managecontactus.Index')==true)
			{
				redirect('index.php/Loginpg');
			}
		if(!empty ($id))
		{
			
			$this->data['updatedata']=$this->Managecontactus_model->get_forupdate($id);
		}
		
			
			$this->data['contact']=$this->Managecontactus_model->get_data();
			$this->parser->parse('Adminheader',$this->data);
			$this->load->view('Mngcontactus');
			$this->parser->parse('Adminfooter',$this->data);
			
		
	}
	function insert()
		{	
		Authority::is_logged_in();
		if(Authority::checkAuthority('Managecontactus.insert')==true)
			{
				redirect('index.php/Loginpg');
			}
			$data=array('Company_name'=>$this->input->post('Company_name'),
			'Company_address'=>$this->input->post('Company_address'),
			'Phone_no'=>$this->input->post('Phone_no'),
			'Email_address'=>$this->input->post('Email_address'));
			
			if(!empty($this->input->post('id')))
		
			{
				
			$filter=array('Contactus_id'=>$this->input->post('id'));
			$this->Managecontactus_model->update('contactus_master',$data,$filter);
		
			}
			else
			{
			
			$id=$this->Managecontactus_model->insert('contactus_master',$data);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("index")." Data Added Successfully!!");
			}
		redirect ('index.php/Managecontactus');
		}
		
	
	function delete($id=false)
	{	
		Authority::is_logged_in();
		if(Authority::checkAuthority('Managecontactus.delete')==true)
			{
				redirect('index.php/Loginpg');
			}
		$filter=array('Contactus_id'=>$id);
		$this->Managecontactus_model->delete('contactus_master',$filter);
		
		redirect('index.php/Managecontactus');
	}
	
 }