<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Managedegree extends CI_Controller
 {

	
	 function __construct() {
		parent::__construct();
			
		$this->data[]="";
		$this->data['url'] = base_url();
		
		$this->load->model('Managedegree_model');
		$this->load->model('Authority_model');
		$this->load->library('parser');
			$this->load->library('Authority');
		$this->data['base_url']=base_url();
		
		$this->load->library('session');
		
	}
	function Index($id=false)
		
	{	Authority::is_logged_in();
		if(Authority::checkAuthority('Managedegree.Index')==true)
			{
				redirect('index.php/Loginpg');
			}
		if(!empty ($id))
		{
			
			$this->data['updatedata']=$this->Managedegree_model->get_forupdate($id);
		}
			$this->data['Degree']=$this->Managedegree_model->get_data();
			
			
			
			$this->parser->parse('Adminheader',$this->data);
			$this->load->view('Mngdegree');
			$this->parser->parse('Adminfooter',$this->data);
		
	}
	function insert()
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
			$this->Managedegree_model->update('degree_master',$data,$filter);
	
			}
			else
			{
			
			$id=$this->Managedegree_model->insert('degree_master',$data);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("index")." Data Added Successfully!!");
			}
		redirect ('index.php/Managedegree');
		}
	
	function delete($id=false)
	{	
		Authority::is_logged_in();
		if(Authority::checkAuthority('Managedegree.delete')==true)
			{
				redirect('index.php/Loginpg');
			}
		$filter=array('Degree_id'=>$id);
		$this->Managedegree_model->delete('degree_master',$filter);
		
		redirect('index.php/Managedegree');
	}
	
	
 }