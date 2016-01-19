<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Managejob extends CI_Controller
 {

	
	 function __construct() {
		parent::__construct();
			
		$this->data[]="";
		$this->data['url'] = base_url();
		
		$this->load->model('Managejob_model');
		$this->load->model('Authority_model');
		$this->load->library('parser');
			$this->load->library('Authority');
		$this->data['base_url']=base_url();
		
		$this->load->library('session');
		
	}

	function Index($id=false)
		
	{	  Authority::is_logged_in();
		if(Authority::checkAuthority('Managejob.Index')==true)
			{
				redirect('index.php/Loginpg');
			}
		if(!empty ($id))
		{
			
			$this->data['updatedata']=$this->Managejob_model->get_forupdate($id);
			
		}
			$this->data['lang']=$this->Managejob_model->langget_data();
			$this->data['career']=$this->Managejob_model->careerget_data();
			
			
			$this->data['job']=$this->Managejob_model->get_data();
			
			$this->parser->parse('Adminheader',$this->data);
			$this->load->view('Mngjob');
			$this->parser->parse('Adminfooter',$this->data);
		
	}
	
	function getexambycareer()
		
	{	
		if(!empty($this->input->post('careerid')))
		{
			
			$this->data['Exam']=$Exam=$this->Managejob_model->examget_data($this->input->post('careerid'));
			
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
			
			'No_of_vacancy'=>$this->input->post('No_of_vacancy'),
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
			$this->Managejob_model->update('job_master',$data,$filter);
		
			
			
			$data=array(
			'Job_id'=>$this->input->post('id'),
			'Company_name'=>$this->input->post('Company_name'),
			'Description'=>$this->input->post('Description'),
			'Post_name'=>$this->input->post('Post_name'),

			'Language_id'=>$this->input->post('Language_id'));
			
			$this->Managejob_model->update('job_detail',$data,$filter);
			
			}
			else
			{
			
			$id=$this->Managejob_model->insert('job_master',$data);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("index")." Data Added Successfully!!");
			
			$data=array(
			'Job_id'=>$id,
			'Company_name'=>$this->input->post('Company_name'),
			'Description'=>$this->input->post('Description'),
			'Post_name'=>$this->input->post('Post_name'),
			
			'Language_id'=>$this->input->post('Language_id'));
			
			$this->Managejob_model->insert('job_detail',$data);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("index")." Data Added Successfully!!");
			}
		redirect ('index.php/Managejob');
		}
		
	function delete($id=false)
	{  Authority::is_logged_in();
		if(Authority::checkAuthority('Managejob.delete')==true)
			{
				redirect('index.php/Loginpg');
			}
		$filter=array('Job_id'=>$id);
		$this->Managejob_model->delete('job_detail','job_master',$filter);
		
		redirect('index.php/Managejob');
	}
	
	
 }