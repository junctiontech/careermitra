<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manageexam1 extends CI_Controller
 {

	
	 function __construct() {
		parent::__construct();
			
		$this->data[]="";
		$this->data['url'] = base_url();
		
		$this->load->model('Manageexam1_model');
		$this->load->model('Authority_model');
		$this->load->library('parser');
			$this->load->library('Authority');
		$this->data['base_url']=base_url();
		
		$this->load->library('session');
		
	}
	function Index($id=false)
		
	{	Authority::is_logged_in();
		if(Authority::checkAuthority('Manageexam1.Index')==true)
			{
				redirect('index.php/Loginpg');
			}
		if(!empty ($id))
		{
			
			$this->data['updatedata']=$this->Manageexam1_model->get_forupdate($id);
		}
		
			$this->data['Lang']=$this->Manageexam1_model->get_lang();
			$this->data['exam1']=$this->Manageexam1_model->get_data();
			$this->parser->parse('Adminheader',$this->data);
			$this->load->view('Mngexam1');
			$this->parser->parse('Adminfooter',$this->data);
		
	}
	function insert()
		{	
		Authority::is_logged_in();
		if(Authority::checkAuthority('Manageexam1.insert')==true)
			{
				redirect('index.php/Loginpg');
			}
			$data=array('created_by'=>$this->input->post('created_by'));
			
			if(!empty($this->input->post('id')))
		
			{
				
			$filter=array('type_id'=>$this->input->post('id'));
			$this->Manageexam1_model->update('examtype_master',$data,$filter);
		
			$data=array(
			'type_id'=>$this->input->post('id'),
			'description'=>$this->input->post('description'),
			'created_by'=>$this->input->post('created_by'),
			'Language_id'=>$this->input->post('Language_id'));
			
			$this->Manageexam1_model->update('examtype_detail',$data,$filter);
			
			}
			else
			{
			
			$id=$this->Manageexam1_model->insert('examtype_master',$data);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("index")." Data Added Successfully!!");
			
			$data=array(
			'type_id'=>$id,
			'description'=>$this->input->post('description'),
			'Language_id'=>$this->input->post('Language_id'));
			
			$this->Manageexam1_model->insert('examtype_detail',$data);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("index")." Data Added Successfully!!");
			}
		redirect ('index.php/Manageexam1');
		}
		
	
	function delete($id=false)
	{Authority::is_logged_in();
		if(Authority::checkAuthority('Manageexam1.delete')==true)
			{
				redirect('index.php/Loginpg');
			}
		$filter=array('type_id'=>$id);
		$this->Manageexam1_model->delete('examtype_detail','examtype_master',$filter);
		
		redirect('index.php/Manageexam1');
	}
	
	
 }