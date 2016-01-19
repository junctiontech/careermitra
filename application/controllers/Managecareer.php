<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Managecareer extends CI_Controller
 {

	
	 function __construct() {
		parent::__construct();
			
		$this->data[]="";
		$this->data['url'] = base_url();
		
		$this->load->model('Managecareer_model');
		$this->load->model('Authority_model');
		$this->load->library('parser');
		$this->load->library('Authority');
		$this->data['base_url']=base_url();
		
		$this->load->library('session');
		
	}
	
	function Index($id=false)
	{	Authority::is_logged_in();
		if(Authority::checkAuthority('Managecareer.Index')==true)
			{
				redirect('index.php/Loginpg');
			}
		if(!empty($id))
			{
				
				$this->data['updatedata']=$this->Managecareer_model->get_forupdate($id);
			}	
			{	
				$this->data['Lang']=$this->Managecareer_model->get_lang();
				$this->data['Career']=$this->Managecareer_model->get_data();
				$this->parser->parse('Adminheader',$this->data);
				$this->load->view('Mngcareer');
				$this->parser->parse('Adminfooter',$this->data);
			}
		
	}
	function insert()
	{ 
			Authority::is_logged_in();
		if(Authority::checkAuthority('Managecareer.insert')==true)
			{
				redirect('index.php/Loginpg');
			}
		$data=array('Alphabet_id'=>$this->input->post('Alphabet_id'),
		'Eligibility'=>$this->input->post('Eligibility'),
		'Min_salary'=>$this->input->post('Min_salary'),
		'Max_salary'=>$this->input->post('Max_salary'));
			
		
		if(!empty($this->input->post('id')))
		
			{
		$filter=array('career_id'=>$this->input->post('id'));
		$this->Managecareer_model->update('career_master',$data,$filter);
		
		$data=array(
		'Career_name'=>$this->input->post('Career_name'),
		'Introduction'=>$this->input->post('Introduction'),
		'Language_id'=>$this->input->post('Language_id'),
		'Job_prospects'=>$this->input->post('Job_prospects'));
		$this->Managecareer_model->update('career_detail',$data,$filter);
			}
			
			else
			{
				
		$id=$this->Managecareer_model->insert('career_master',$data);
		$this->session->set_flashdata('message_type', 'success');
		$this->session->set_flashdata('message', $this->config->item("index")." Data Added Successfully!!");
		
		$data=array('career_id'=>$id,
		'Career_name'=>$this->input->post('Career_name'),
		'Introduction'=>$this->input->post('Introduction'),
		'Language_id'=>$this->input->post('Language_id'),
		'Job_prospects'=>$this->input->post('Job_prospects'));
		
		$this->Managecareer_model->insert('career_detail',$data);
		$this->session->set_flashdata('message_type', 'success');
		$this->session->set_flashdata('message', $this->config->item("index")." Data Added Successfully!!");
		
			}
			
		
		redirect('index.php/managecareer');
	}
	
	
	function delete($id=false)
	{ 
		Authority::is_logged_in();
		if(Authority::checkAuthority('Managecareer.delete')==true)
			{
				redirect('index.php/Loginpg');
			}
		$filter=array('career_id'=>$id);
		$this->Managecareer_model->delete('career_detail','career_master',$filter);
		
		redirect('index.php/managecareer');
	}
		
	
	
 }
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 