<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manageexam3 extends CI_Controller
 {

	
	 function __construct() {
		parent::__construct();
			
		$this->data[]="";
		$this->data['url'] = base_url();
		
		$this->load->model('Manageexam3_model');
		$this->load->model('Authority_model');
		$this->load->library('parser');
			$this->load->library('Authority');
		$this->data['base_url']=base_url();
		
		$this->load->library('session');
		
	}
	function Index($id=false)
		
	{	Authority::is_logged_in();
		if(Authority::checkAuthority('Manageexam3.Index')==true)
			{
				redirect('index.php/Loginpg');
			}
		if(!empty ($id))
		{
			
			$this->data['updatedata']=$this->Manageexam3_model->get_forupdate($id);
		}
			$this->data['Inst']=$this->Manageexam3_model->Instituteget_data();
			$this->data['lang']=$this->Manageexam3_model->langget_data();
			$this->data['exam']=$this->Manageexam3_model->examget_data();
			$this->data['exam4']=$this->Manageexam3_model->subexamget_data();
			$this->data['exam3']=$this->Manageexam3_model->get_data();
			$this->data['career']=$this->Manageexam3_model->careerget_data();
			$this->data['job']=$this->Manageexam3_model->jobget_data();
			$this->parser->parse('Adminheader',$this->data);
			$this->load->view('Mngexam3');
			$this->parser->parse('Adminfooter',$this->data);
		
	}
	function insert()
		{Authority::is_logged_in();
		if(Authority::checkAuthority('Manageexam1.insert')==true)
			{
				redirect('index.php/Loginpg');
			}
			$data=array('type_id'=>$this->input->post('type_id'),
			'exam_id'=>$this->input->post('exam_id'),
			'Career_id'=>$this->input->post('Career_id'),
			'Job_id'=>$this->input->post('Job_id'),
			'Institute_id'=>$this->input->post('Institute_id'),
			'Date_of_exam'=>$this->input->post('Date_of_exam'),
			'Startdate_of_formsubmission'=>$this->input->post('Startdate_of_formsubmission'),
			'Lastdate_of_formsubmission'=>$this->input->post('Lastdate_of_formsubmission'),
			'Official_link'=>$this->input->post('Official_link'),
			'Eligibility'=>$this->input->post('Eligibility'));
			
			if(!empty($this->input->post('id')))
		
			{
				
			$filter=array('Examdetail_id'=>$this->input->post('id'));
			$this->Manageexam3_model->update('subtype_master',$data,$filter);
		
			$data=array(
			'Examdetail_id'=>$this->input->post('id'),
			'Exam_name'=>$this->input->post('Exam_name'),
			'Description'=>$this->input->post('Description'),
			'Syllabus'=>$this->input->post('Syllabus'),
			'Previous_papers'=>$this->input->post('Previous_papers'),
			'Language_id'=>$this->input->post('Language_id'));
			
			$this->Manageexam3_model->update('subtype_detail',$data,$filter);
			
			}
			else
			{
			
			$id=$this->Manageexam3_model->insert('subtype_master',$data);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("index")." Data Added Successfully!!");
			
			$data=array(
			'examdetail_id'=>$id,
			'Exam_name'=>$this->input->post('Exam_name'),
			'Description'=>$this->input->post('Description'),
			'Syllabus'=>$this->input->post('Syllabus'),
			'Previous_papers'=>$this->input->post('Previous_papers'),
			'Language_id'=>$this->input->post('Language_id'));
			
			$this->Manageexam3_model->insert('subtype_detail',$data);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("index")." Data Added Successfully!!");
			}
		redirect ('index.php/Manageexam3');
		}
		
	
	function delete($id=false)
	{	Authority::is_logged_in();
		if(Authority::checkAuthority('Manageexam1.delete')==true)
			{
				redirect('index.php/Loginpg');
			}
		$filter=array('Examdetail_id'=>$id);
		$this->Manageexam3_model->delete('subtype_detail','subtype_master',$filter);
		
		redirect('index.php/Manageexam3');
	}
	
	
 }