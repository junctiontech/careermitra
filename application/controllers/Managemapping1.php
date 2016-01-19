<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Managemapping1 extends CI_Controller
 {

	
	 function __construct() {
		parent::__construct();
			
		$this->data[]="";
		$this->data['url'] = base_url();
		
		$this->load->model('Managemapping1_model');
		
		$this->load->library('parser');
			$this->load->library('Authority');
		$this->data['base_url']=base_url();
		$this->load->model('Authority_model');
		$this->load->library('session');
		
	}
	function Index($id=false)
		
	{	  Authority::is_logged_in();
		if(Authority::checkAuthority('Managemapping1.Index')==true)
			{
				redirect('index.php/Loginpg');
			}
		if(!empty ($id))
		{
			
			$this->data['updatedata']=$this->Managemapping1_model->get_forupdate($id);
		}
			$this->data['Degree']=$this->Managemapping1_model->Degreeget_data();
			
			$this->data['Inst']=$this->Managemapping1_model->Instituteget_data();
			$this->data['data1']=$this->Managemapping1_model->get_data();
			$this->parser->parse('Adminheader',$this->data);
			$this->load->view('Mngmapping1');
			$this->parser->parse('Adminfooter',$this->data);
		
	}
	function insert()
		{
			Authority::is_logged_in();
		if(Authority::checkAuthority('Managemapping1.insert')==true)
			{
				redirect('index.php/Loginpg');
			}
			
		if(!empty($this->input->post('Degree_id')) && !empty($this->input->post('Institute_id')))
		{
			$Degree=$this->input->post('Degree_id');
			$Deg_length=count($Degree);
			
			$Institute=$this->input->post('Institute_id');
			$Inst_length=count($Institute);
			
			for($i=0;$i<$Deg_length;$i++)
			{
				for($j=0;$j<$Inst_length;$j++)
				{
					
				$data=array('Degree_id'=>$Degree[$i],
				'Institute_id'=>$Institute[$j]);	
			
				
				$id=$this->Managemapping1_model->insert('degree_inst_mapping',$data);
				$this->session->set_flashdata('message_type', 'success');
				$this->session->set_flashdata('message', $this->config->item("index")." Data Added Successfully!!");				
				}
			}
			
		}
		else
		{
			
		}
		redirect ('index.php/Managemapping1');
		}
		
	
	function delete($id=false)
	{	  
	Authority::is_logged_in();
		if(Authority::checkAuthority('Managemapping1.delete')==true)
			{
				redirect('index.php/Loginpg');
			}
		$filter=array('Mapping_id'=>$id);
		$this->Managemapping1_model->delete('degree_inst_mapping',$filter);
		
		redirect('index.php/Managemapping1');
	}
	
	
 }