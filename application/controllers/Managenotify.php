<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Managenotify extends CI_Controller
 {

	
	 function __construct() {
		parent::__construct();
			
		$this->data[]="";
		$this->data['url'] = base_url();
		
		$this->load->model('Managenotify_model');
		$this->load->model('Authority_model');
		$this->load->library('parser');
			$this->load->library('Authority');
		$this->data['base_url']=base_url();
		
		$this->load->library('session');
		
	}
	
	function index($id=false)
		
		{	  Authority::is_logged_in();
		if(Authority::checkAuthority('Managenotify.index')==true)
			{
				redirect('index.php/Loginpg');
			}
		if(!empty($id))
			{
			$this->data['updatedata']=$this->Managenotify_model->get_forupdate($id);
			}
			{
			$this->data['intro1']=$this->Managenotify_model->introget_data();
			$this->data['lang']=$this->Managenotify_model->langget_data();
			$this->data['notify']=$this->Managenotify_model->get_data();
			
			$this->parser->parse('Adminheader',$this->data);
			$this->load->view('Mngnotify');
			$this->parser->parse('Adminfooter',$this->data);
			}
		}
		
	function insert()
	{ 
	  Authority::is_logged_in();
		if(Authority::checkAuthority('Managenotify.insert')==true)
			{
				redirect('index.php/Loginpg');
			}
		$data=array('Type_id'=>$this->input->post('Type_id'),
		'Link_url'=>$this->input->post('Link_url'),
		'Status'=>$this->input->post('Status'),
		'Rq_date'=>$this->input->post('Rq_date'));
		
	if(!empty($this->input->post('id')))
		{			
			$filter=array('Notify_id'=>$this->input->post('id'));
			$this->Managenotify_model->update('notify_master',$data,$filter);
		
			$data=array('Notify_id'=>$this->input->post('id'),
			'Description'=>$this->input->post('Description'),
			'Language_id'=>$this->input->post('Language_id'));
			$this->Managenotify_model->update('notify_detail',$data,$filter);
	
		}
		else
		{
			$id=$this->Managenotify_model->insert('notify_master',$data);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("index")." Data Added Successfully!!");
			
			$data=array('Notify_id'=>$id,
			'Description'=>$this->input->post('Description'),
			'Language_id'=>$this->input->post('Language_id'));
			$this->Managenotify_model->insert('notify_detail',$data);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("index")." Data Added Successfully!!");
		}
			redirect('index.php/Managenotify');
	}
	
	function delete($id=false)
	{  
	Authority::is_logged_in();
		if(Authority::checkAuthority('Managenotify.delete')==true)
			{
				redirect('index.php/Loginpg');
			}
		$filter=array('Notify_id'=>$id);
		$this->Managenotify_model->delete('notify_detail','notify_master',$filter);
		
		redirect('index.php/Managenotify');
	}
	
	
 }