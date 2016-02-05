<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class FAQpg extends CI_Controller
 {

	
	 function __construct() {
		parent::__construct();
			
		$this->data[]="";
		$this->data['url'] = base_url();
		
		$this->load->model('FAQpg_model');
		
		$this->load->library('parser');
		$this->load->model('Authority_model');
		$this->load->library('Authority');
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
	
	function index($id=false)
	{		
			if(!empty($id))
			{
			$this->data['info1']=$this->FAQpg_model->data1($id);
			
			}
		else{
			$this->data['info']=$this->FAQpg_model->data();
		}
			$this->parser->parse('Header',$this->data);
			$this->load->view('FAQ');
			$this->parser->parse('Footer',$this->data);
	}
	
	function index1($id=false)
	{		
	
			if(!empty($id))
			{
			$this->data['updatedata']=$this->FAQpg_model->get_forupdate3($id);
			
			}
			
			$this->data['notify']=$this->FAQpg_model->get_data4();
			
			$this->data['intro1']= $this->FAQpg_model->introget_data();
			$this->parser->parse('Adminheader',$this->data);
			$this->load->view('MngFAQ');
			$this->parser->parse('Adminfooter',$this->data);
			
		
		
	}

function insert($id=false)
{			
			
			
			$data=array('Ques'=>$this->input->post('Ques'),
			'Ans'=>$this->input->post('Ans'),
			'Type'=>$this->input->post('Type'));
			
			if(!empty($this->input->post('id')))
		
			{
				
			$filter=array('Faq_id'=>$this->input->post('id'));
			$this->FAQpg_model->update('faq',$data,$filter);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("index")." Data Updated Successfully!!");
			}
			else
			{
			
			$id=$this->FAQpg_model->insert('faq',$data);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("index")." Data Added Successfully!!");
			}
			$this->parser->parse('Adminheader',$this->data);
			$this->load->view('MngFAQ');
			$this->parser->parse('Adminfooter',$this->data);
			
			
			redirect('index.php/FAQpg/index1');
			
	
			
	}
	function delete($id=false)
	{
		$filter=array('Faq_id'=>$id);
		$this->FAQpg_model->delete1('faq',$filter);
		$this->session->set_flashdata('message_type', 'success');
		$this->session->set_flashdata('message', $this->config->item("index")." Data deleted Successfully!!");
		$this->parser->parse('Adminheader',$this->data);
		$this->load->view('MngFAQ');
		$this->parser->parse('Adminfooter',$this->data);
			
			redirect('index.php/FAQpg/index1');
	}
	
	
	
 }