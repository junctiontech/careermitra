<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Managemapping extends CI_Controller
 {

	
	 function __construct() {
		parent::__construct();
			
		$this->data[]="";
		$this->data['url'] = base_url();
		
		$this->load->model('Managemapping_model');
			$this->load->library('Authority');
		$this->load->library('parser');
		$this->load->model('Authority_model');
		$this->data['base_url']=base_url();
		
		$this->load->library('session');
		
	}
	function Index($id=false)
		
	{	  Authority::is_logged_in();
		if(Authority::checkAuthority('Managemapping.Index')==true)
			{
				redirect('index.php/Loginpg');
			}
		if(!empty ($id))
		{
			
			$this->data['updatedata']=$this->Managemapping_model->get_forupdate($id);
		}
			$this->data['Career']=$this->Managemapping_model->Careerget_data();
			
			$this->data['Inst']=$this->Managemapping_model->Instituteget_data();
			$this->data['data1']=$this->Managemapping_model->get_data();
			$this->parser->parse('Adminheader',$this->data);
			$this->load->view('Mngmapping');
			$this->parser->parse('Adminfooter',$this->data);
		
	}
	function insert()
		{	 
		Authority::is_logged_in();
		if(Authority::checkAuthority('Managemapping.insert')==true)
			{
				redirect('index.php/Loginpg');
			}
			
			if(!empty($this->input->post('Career_id')) && !empty($this->input->post('Institute_id')))
		{
			$Career=$this->input->post('Career_id');
			$Crr_length=count($Career);
			
			$Institute=$this->input->post('Institute_id');
			$Inst_length=count($Institute);
			
			for($i=0;$i<$Crr_length;$i++)
			{
				for($j=0;$j<$Inst_length;$j++)
				{
					
				$data=array('Career_id'=>$Career[$i],
				'Institute_id'=>$Institute[$j]);	
			
				
				$id=$this->Managemapping_model->insert('career_inst_mapping',$data);	
				$this->session->set_flashdata('message_type', 'success');
				$this->session->set_flashdata('message', $this->config->item("index")." Data Added Successfully!!");
				}
			}
		}
		else{
			
		}
	
		redirect ('index.php/Managemapping');
		}
		
	
	function delete($id=false)
	{	  
	Authority::is_logged_in();
		if(Authority::checkAuthority('Managemapping.delete')==true)
			{
				redirect('index.php/Loginpg');
			}
		$filter=array('Mapping_id'=>$id);
		$this->Managemapping_model->delete('career_inst_mapping',$filter);
		
		redirect('index.php/Managemapping');
	}
	
	
 }