<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jobpg extends CI_Controller
 {

	
	 function __construct() {
		parent::__construct();
			
		$this->data[]="";
		$this->data['url'] = base_url();
		
		$this->load->model('Jobpg_model');
		$this->load->model('Authority_model');
		$this->load->library('parser');
		$this->load->library('Authority');
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
	
	
		function Index($action=false,$id=false)
		
		{
		if( $action=="Job" && !empty($id))
			{	
				
			$this->data['job1']=$this->Jobpg_model->jobget_data($id);	
			$this->data['job2']=$this->Jobpg_model->career($id);	
			
			}
			
		
		elseif( $action=="Data" && !empty($id))
			{
				
			$this->data['detail1']=$this->Jobpg_model->detail($id);
				
			}
		 else
		 {	
						
			$this->data['intro']= $this->Jobpg_model->introget_data();
		
			$this->data['option']= $this->Jobpg_model->optionget_data();
			
			$this->data['notify']= $this->Jobpg_model->notifyget_data();
		 
		 }
		
			$this->parser->parse('Header',$this->data);
			$this->load->view('Job');
			$this->parser->parse('Footer',$this->data);
		}
		 
  
		 function Mngjbindex($id=false)
		
	{	  Authority::is_logged_in();
		if(Authority::checkAuthority('Managejob.Index')==true)
			{
				redirect('index.php/Loginpg');
			}
		if(!empty ($id))
		{
			
			$this->data['updatedata']=$this->Jobpg_model->get_forupdate($id);
			
		}
			$this->data['lang']=$this->Jobpg_model->langget_data();
			$this->data['career']=$this->Jobpg_model->careerget_data();
			
			
			$this->data['job']=$this->Jobpg_model->get_data();
			
			$this->parser->parse('Adminheader',$this->data);
			$this->load->view('Mngjob');
			$this->parser->parse('Adminfooter',$this->data);
		
	}
	
	function getexambycareer()
		
	{	
		if(!empty($this->input->post('careerid')))
		{
			
			$this->data['Exam']=$Exam=$this->Jobpg_model->examget_data($this->input->post('careerid'));
			
			echo'<label class="col-sm-3 control-label" style="margin-top:10px" for="field-1">Select Exam</label>
									
								<div class="col-sm-9" style="margin-top:10px" >
									<select class="form-control"  name="Detail" >
									<option value="">Select</option>';
									foreach($Exam as $Examshow){
									
									echo"<Option value= \"$Examshow->Examdetail_id\">
										$Examshow->Exam_name</option> ";
									 } 
									
								echo'</select>								
								</div>';
			
		}
		
	}
	
	function insert()
		{	
		  Authority::is_logged_in();
		if(Authority::checkAuthority('Managejob.insert')==true)
			{
				redirect('index.php/Loginpg');
			}
			if(!empty($this->input->post('Detail')))
			{
				$Detail=$this->input->post('Detail');
			}
			elseif(!empty($this->input->post('Detail1')))
			{
				$Detail=$this->input->post('Detail1');
			}
			else{
				$Detail="";
			}
			
			$data=array('Career_id'=>$this->input->post('Career_id'),
			
			
			'Pay_scale'=>$this->input->post('Pay_scale'),
			'Qualification'=>$this->input->post('Qualification'),
			'Nationality'=>$this->input->post('Nationality'),
			'Age_limit'=>$this->input->post('Age_limit'),
			'Job_location'=>$this->input->post('Job_location'),
			
			'Selection_process'=>$this->input->post('Selection_process'),
			
			'Detail'=>$Detail);
		
			
			if(!empty($this->input->post('id')))
		
			{
				
			$filter=array('Job_id'=>$this->input->post('id'));
			$this->Jobpg_model->update('job_master',$data,$filter);
		
			
			
			$data=array(
			'Job_id'=>$this->input->post('id'),
			'Company_name'=>$this->input->post('Company_name'),
			'Description'=>$this->input->post('Description'),
			'Post_name'=>$this->input->post('Post_name'),

			'Language_id'=>$this->input->post('Language_id'));
			
			$this->Jobpg_model->update('job_detail',$data,$filter);
			
			}
			else
			{
			
			$id=$this->Jobpg_model->insert('job_master',$data);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("index")." Data Added Successfully!!");
			
			$data=array(
			'Job_id'=>$id,
			'Company_name'=>$this->input->post('Company_name'),
			'Description'=>$this->input->post('Description'),
			'Post_name'=>$this->input->post('Post_name'),
			
			'Language_id'=>$this->input->post('Language_id'));
			
			$this->Jobpg_model->insert('job_detail',$data);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("index")." Data Added Successfully!!");
			}
			
			$this->parser->parse('Adminheader',$this->data);
			$this->load->view('Mngjob');
			$this->parser->parse('Adminfooter',$this->data);
			
			
		redirect ('index.php/Jobpg/Mngjbindex');
		}
		
	function delete($id=false)
	{  Authority::is_logged_in();
		if(Authority::checkAuthority('Managejob.delete')==true)
			{
				redirect('index.php/Loginpg');
			}
		$filter=array('Job_id'=>$id);
		$this->Jobpg_model->delete('job_detail','job_master',$filter);
		$this->session->set_flashdata('message_type', 'success');
		$this->session->set_flashdata('message', $this->config->item("index")." Data deleted Successfully!!");
		
		
		$this->parser->parse('Adminheader',$this->data);
		$this->load->view('Mngjob');
		$this->parser->parse('Adminfooter',$this->data);
		redirect('index.php/Jobpg/Mngjbindex');
	}
		
 }