<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manageexam2 extends CI_Controller
 {

	
	 function __construct() {
		parent::__construct();
			
		$this->data[]="";
		$this->data['url'] = base_url();
		
		$this->load->model('Manageexam2_model');
		$this->load->model('Authority_model');
		$this->load->library('parser');
		$this->load->library('Authority');
		$this->data['base_url']=base_url();
		
		$this->load->library('session');
		
	}
	function Index($id=false)
		
	{	Authority::is_logged_in();
		if(Authority::checkAuthority('Manageexam2.Index')==true)
			{
				redirect('index.php/Loginpg/login_user');
			}
		if(!empty ($id))
		{
			
			$this->data['updatedata']=$this->Manageexam2_model->get_forupdate($id);
		}
			$this->data['lang']=$this->Manageexam2_model->langget_data();
			$this->data['exam']=$this->Manageexam2_model->examget_data();
			$this->data['exam2']=$this->Manageexam2_model->get_data();
			$this->parser->parse('Adminheader',$this->data);
			$this->load->view('Mngexam2');
			$this->parser->parse('Adminfooter',$this->data);
		
	}
	function insert()
		{	Authority::is_logged_in();
		if(Authority::checkAuthority('Manageexam2.insert')==true)
			{
				redirect('index.php/Loginpg/login_user');
			}
			$data=array('type_id'=>$this->input->post('type_id'));
			
			if(!empty($this->input->post('id')))
		
			{
				
			$filter=array('exam_id'=>$this->input->post('id'));
			$this->Manageexam2_model->update('exam_master',$data,$filter);
		
			$data=array(
			'exam_id'=>$this->input->post('id'),
			'description'=>$this->input->post('description'),
			
			'Language_id'=>$this->input->post('Language_id'));
			
			$this->Manageexam2_model->update('exam_detail',$data,$filter);
			
			}
			else
			{
			
			$id=$this->Manageexam2_model->insert('exam_master',$data);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("index")." Data Added Successfully!!");
			
			$data=array(
			'exam_id'=>$id,
			'description'=>$this->input->post('description'),
			'Language_id'=>$this->input->post('Language_id'));
			
			$this->Manageexam2_model->insert('exam_detail',$data);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("index")." Data Added Successfully!!");
			}
		redirect ('index.php/Manageexam2');
		}
		
	
	function delete($id=false)
	{
		Authority::is_logged_in();
		if(Authority::checkAuthority('Manageexam2.delete')==true)
			{
				redirect('index.php/Loginpg/login_user');
			}
		$this->Manageexam2_model->delete($id);

		redirect('index.php/Manageexam2');
	}
	
 }