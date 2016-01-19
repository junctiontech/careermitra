<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manageaboutus extends CI_Controller
 {

	
	 function __construct() {
		parent::__construct();
			
		$this->data[]="";
		$this->data['url'] = base_url();
		
		$this->load->model('Manageaboutus_model');
		$this->load->model('Authority_model');
		$this->load->library('parser');
		$this->load->library('Authority');
		$this->data['base_url']=base_url();
		
		$this->load->library('session');
		
	}
	function Index($id=false)
		
	{	Authority::is_logged_in();
		if(Authority::checkAuthority('Manageaboutus.Index')==true)
			{
				redirect('index.php/Loginpg');
			}
		if(!empty ($id))
		{
			
			$this->data['updatedata']=$this->Manageaboutus_model->get_forupdate($id);
		}
		
			
			$this->data['about']=$this->Manageaboutus_model->get_data();
			$this->parser->parse('Adminheader',$this->data);
			$this->load->view('Mngaboutus');
			$this->parser->parse('Adminfooter',$this->data);
		
	}
	function insert()
		{	
			Authority::is_logged_in();
		if(Authority::checkAuthority('Manageaboutus.insert')==true)
			{
				redirect('index.php/Loginpg');
			}
			$data=array('Description'=>$this->input->post('Description'));
			
			if(!empty($this->input->post('id')))
		
			{
				
			$filter=array('Aboutus_id'=>$this->input->post('id'));
			$this->Manageaboutus_model->update('aboutus_master',$data,$filter);
		
			}
			else
			{
			
			$id=$this->Manageaboutus_model->insert('aboutus_master',$data);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("index")." Data Added Successfully!!");
			}
		redirect ('index.php/Manageaboutus');
		}
		
	
	function delete($id=false)
	{	Authority::is_logged_in();
		if(Authority::checkAuthority('Manageaboutus.delete')==true)
			{
				redirect('index.php/Loginpg');
			}
		$filter=array('Aboutus_id'=>$id);
		$this->Manageaboutus_model->delete('aboutus_master',$filter);
		
		redirect('index.php/Manageaboutus');
	}
 }