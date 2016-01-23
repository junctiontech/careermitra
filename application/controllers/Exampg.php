<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Exampg extends CI_Controller
 {

	
	 function __construct() {
		parent::__construct();
			
		$this->data[]="";
		$this->data['url'] = base_url();
		
		$this->load->model('Exampg_model');
		
		$this->load->library('parser');
		$this->load->model('Authority_model');
		$this->data['base_url']=base_url();
		$this->load->library('Authority');
		$this->load->library('session');
		$this->load->library('upload');
		
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
		
		if($action=="Exam" && !empty($id))
			{
					$this->data['examdetail']=$this->Exampg_model->get_subexamdetail($id);
					
			}
			elseif($action=="ExamSubtype" && !empty($id))
			{
			 $this->data['examsubdetail']=$this->Exampg_model->get_subexamdata($id);
			 
			$this->data['examsub']=$this->Exampg_model->subexamdata($id);	
			
			}
			
			
			else{
				
				$this->data['exam']=$this->Exampg_model->get_exam_data();
			
			
				$this->data['notify']=$this->Exampg_model->notifyget_data();
				
				$this->data['intro']=$this->Exampg_model->introget_data();				
			}
			
			$this->parser->parse('Header',$this->data);
			$this->load->view('Exam',$this->data);
			$this->parser->parse('Footer',$this->data);
			
	}


	function Quepaper($Subject_id=false,$Examdetail_id)
	{
		if (!empty($Subject_id) && !empty($Examdetail_id))
		{    
	
			$this->data['paper']=$this->Exampg_model->paperdetail($Subject_id,$Examdetail_id);
			
			$this->parser->parse('Header',$this->data);
			$this->load->view('Magazine',$this->data);
			$this->parser->parse('Footer',$this->data);
		}

			
	}
	
	function Mngexindex($id=false)
		
	{	Authority::is_logged_in();
		if(Authority::checkAuthority('Manageexam1.Index')==true)
			{
				redirect('index.php/Loginpg');
			}
		if(!empty ($id))
		{
			
			$this->data['updatedata']=$this->Exampg_model->get_forupdate($id);
		}
		
			$this->data['Lang']=$this->Exampg_model->get_lang();
			$this->data['exam1']=$this->Exampg_model->get_data();
			$this->parser->parse('Adminheader',$this->data);
			$this->load->view('Mngexam1');
			$this->parser->parse('Adminfooter',$this->data);
		
	}
	function insert()
		{	
		Authority::is_logged_in();
		if(Authority::checkAuthority('Manageexam1.insert')==true)
			{
				redirect('index.php/Loginpg');
			}
			$data=array('created_by'=>$this->input->post('created_by'));
			
			if(!empty($this->input->post('id')))
		
			{
				
			$filter=array('type_id'=>$this->input->post('id'));
			$this->Exampg_model->update('examtype_master',$data,$filter);
		
			$data=array(
			'type_id'=>$this->input->post('id'),
			'description'=>$this->input->post('description'),
			'created_by'=>$this->input->post('created_by'),
			'Language_id'=>$this->input->post('Language_id'));
			
			$this->Exampg_model->update('examtype_detail',$data,$filter);
			
			}
			else
			{
			
			$id=$this->Exampg_model->insert('examtype_master',$data);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("index")." Data Added Successfully!!");
			
			$data=array(
			'type_id'=>$id,
			'description'=>$this->input->post('description'),
			'Language_id'=>$this->input->post('Language_id'));
			
			$this->Exampg_model->insert('examtype_detail',$data);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("index")." Data Added Successfully!!");
			}
			
		$this->parser->parse('Adminheader',$this->data);
		$this->load->view('Mngexam1');
		$this->parser->parse('Adminfooter',$this->data);
		redirect ('index.php/Exampg/Mngexindex');
		}
		
	
	function delete($id=false)
	{Authority::is_logged_in();
		if(Authority::checkAuthority('Manageexam1.delete')==true)
			{
				redirect('index.php/Loginpg');
			}
		$filter=array('type_id'=>$id);
		$this->Exampg_model->delete('examtype_detail','examtype_master',$filter);
		$this->session->set_flashdata('message_type', 'success');
		$this->session->set_flashdata('message', $this->config->item("index")." Data deleted Successfully!!");
		
		
		$this->parser->parse('Adminheader',$this->data);
		$this->load->view('Mngexam1');
		$this->parser->parse('Adminfooter',$this->data);
		redirect('index.php/Exampg/Mngexindex');
	}
	
	
	function Mngexindex1($id=false)
		
	{	Authority::is_logged_in();
		if(Authority::checkAuthority('Manageexam2.Index')==true)
			{
				redirect('index.php/Loginpg');
			}
		if(!empty ($id))
		{
			
			$this->data['updatedata']=$this->Exampg_model->exget_forupdate($id);
		}
			$this->data['lang']=$this->Exampg_model->langget_data();
			$this->data['exam']=$this->Exampg_model->examget_data();
			$this->data['exam2']=$this->Exampg_model->exget_data();
			$this->parser->parse('Adminheader',$this->data);
			$this->load->view('Mngexam2');
			$this->parser->parse('Adminfooter',$this->data);
		
	}
	function exinsert()
		{	Authority::is_logged_in();
		if(Authority::checkAuthority('Manageexam2.insert')==true)
			{
				redirect('index.php/Loginpg');
			}
			$data=array('type_id'=>$this->input->post('type_id'));
			
			if(!empty($this->input->post('id')))
		
			{
				
			$filter=array('exam_id'=>$this->input->post('id'));
			$this->Exampg_model->update('exam_master',$data,$filter);
		
			$data=array(
			'exam_id'=>$this->input->post('id'),
			'description'=>$this->input->post('description'),
			
			'Language_id'=>$this->input->post('Language_id'));
			
			$this->Exampg_model->update('exam_detail',$data,$filter);
			
			}
			else
			{
			
			$id=$this->Exampg_model->insert('exam_master',$data);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("index")." Data Added Successfully!!");
			
			$data=array(
			'exam_id'=>$id,
			'description'=>$this->input->post('description'),
			'Language_id'=>$this->input->post('Language_id'));
			
			$this->Exampg_model->insert('exam_detail',$data);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("index")." Data Added Successfully!!");
			}
			
		$this->parser->parse('Adminheader',$this->data);
		$this->load->view('Mngexam2');
		$this->parser->parse('Adminfooter',$this->data);
		redirect ('index.php/Exampg/Mngexindex1');
		}
		
	
	function exdelete($id=false)
	{
		Authority::is_logged_in();
		if(Authority::checkAuthority('Manageexam2.delete')==true)
			{
				redirect('index.php/Loginpg');
			}
		$this->Exampg_model->exdelete($id);
		$this->session->set_flashdata('message_type', 'success');
		$this->session->set_flashdata('message', $this->config->item("index")." Data deleted Successfully!!");
		
		$this->parser->parse('Adminheader',$this->data);
		$this->load->view('Mngexam2');
		$this->parser->parse('Adminfooter',$this->data);
		redirect('index.php/Exampg/Mngexindex1');
	}
	
	
	
	function Mngexindex2($id=false)
		
	{	Authority::is_logged_in();
		if(Authority::checkAuthority('Manageexam3.Index')==true)
			{
				redirect('index.php/Loginpg');
			}
		if(!empty ($id))
		{
			
			$this->data['updatedata']=$this->Exampg_model->exget_forupdate1($id);
		}
			$this->data['Inst']=$this->Exampg_model->Instituteget_data();
			$this->data['lang']=$this->Exampg_model->langget_data();
			$this->data['exam']=$this->Exampg_model->examget_data1();
			$this->data['exam4']=$this->Exampg_model->subexamget_data1();
			$this->data['exam3']=$this->Exampg_model->exget_data1();
			$this->data['career']=$this->Exampg_model->careerget_data();
			$this->data['job']=$this->Exampg_model->jobget_data();
			$this->parser->parse('Adminheader',$this->data);
			$this->load->view('Mngexam3');
			$this->parser->parse('Adminfooter',$this->data);
		
	}
	function exinsert1()
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
			$this->Exampg_model->update('subtype_master',$data,$filter);
		
			$data=array(
			'Examdetail_id'=>$this->input->post('id'),
			'Exam_name'=>$this->input->post('Exam_name'),
			'Description'=>$this->input->post('Description'),
			'Syllabus'=>$this->input->post('Syllabus'),
			'Previous_papers'=>$this->input->post('Previous_papers'),
			'Language_id'=>$this->input->post('Language_id'));
			
			$this->Exampg_model->update('subtype_detail',$data,$filter);
			
			}
			else
			{
			
			$id=$this->Exampg_model->insert('subtype_master',$data);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("index")." Data Added Successfully!!");
			
			$data=array(
			'examdetail_id'=>$id,
			'Exam_name'=>$this->input->post('Exam_name'),
			'Description'=>$this->input->post('Description'),
			'Syllabus'=>$this->input->post('Syllabus'),
			'Previous_papers'=>$this->input->post('Previous_papers'),
			'Language_id'=>$this->input->post('Language_id'));
			
			$this->Exampg_model->insert('subtype_detail',$data);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("index")." Data Added Successfully!!");
			}
			
		$this->parser->parse('Adminheader',$this->data);
		$this->load->view('Mngexam3');
		$this->parser->parse('Adminfooter',$this->data);
		redirect ('index.php/Exampg/Mngexindex2');
		}
		
	
	function exdelete1($id=false)
	{	Authority::is_logged_in();
		if(Authority::checkAuthority('Manageexam1.delete')==true)
			{
				redirect('index.php/Loginpg');
			}
		$filter=array('Examdetail_id'=>$id);
		$this->Exampg_model->exdelete1('subtype_detail','subtype_master',$filter);
		$this->session->set_flashdata('message_type', 'success');
		$this->session->set_flashdata('message', $this->config->item("index")." Data deleted Successfully!!");
		
		$this->parser->parse('Adminheader',$this->data);
		$this->load->view('Mngexam3');
		$this->parser->parse('Adminfooter',$this->data);
		redirect('index.php/Exampg/Mngexindex2');
	}
		
	
	function index3($id=false)
		
	{	  Authority::is_logged_in();
		if(Authority::checkAuthority('Managepapers.index')==true)
			{
				redirect('index.php/Loginpg');
			}
		if(!empty ($id))
		{
			
			$this->data['updatedata']=$this->Exampg_model->get_forupdate1($id);
			
		}
		
			$this->data['exam']=$this->Exampg_model->examget_data2();
			
			$this->data['exam1']=$this->Exampg_model->subexamget_data2();
			
			$this->data['exam2']=$this->Exampg_model->exam();
			$this->data['paper']=$this->Exampg_model->get_data1();
			
			$this->data['sub']=$this->Exampg_model->subget_data();
			$this->parser->parse('Adminheader',$this->data);
			$this->load->view('Mngpapers');
			$this->parser->parse('Adminfooter',$this->data);
		
	}
	function insert3()
	{
		  Authority::is_logged_in();
		if(Authority::checkAuthority('Managepapers.insert')==true)
			{
				redirect('index.php/Loginpg');
			}	
			
			$image ="";
	
		if($_FILES['file']['name']!='')
				{
					$data['image_z1']= $_FILES['file']['name'];
					$image=sha1($_FILES['file']['name']).time().rand(0, 9);
				
					if(!empty($_FILES['file']['name']))
					{
				
						$config =  array(
						'upload_path'	  => './uploaded_papers/',
						'file_name'       => $image,
						'allowed_types'   => "gif|jpg|png|jpeg|JPG|JPEG|PNG|JPG|pdf",
						'overwrite'       => true);
						
							$this->upload->initialize($config);
							
				 
								if($this->upload->do_upload("file"))
								{
					
									$upload_data = $this->upload->data();
									$image=$upload_data['file_name'];
								}else
								{
										$this->upload->display_errors()."file upload failed";
										$image ="";
								}
					}
				}
			
			$data=array('Subject_id'=>$this->input->post('Subject_id'),
			'exam_id'=>$this->input->post('exam_id'),
			'type_id'=>$this->input->post('type_id'),
			'Paper_name'=>$image,
			'Examdetail_id'=>$this->input->post('Examdetail_id'));
			
			if(!empty($this->input->post('id')))
		
			{
				
			$filter=array('Paper_id'=>$this->input->post('id'));
			$this->Exampg_model->update('paper_master',$data,$filter);
		
			}
			else
			{
			
			$id=$this->Exampg_model->insert('paper_master',$data);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("index")." Data Added Successfully!!");
			}
			
		$this->parser->parse('Adminheader',$this->data);
		$this->load->view('Mngpapers');
		$this->parser->parse('Adminfooter',$this->data);
		redirect ('index.php/Exampg/index3');
		}
		
	
	function delete3($id=false)
	{    Authority::is_logged_in();
		if(Authority::checkAuthority('Managepapers.delete')==true)
			{
				redirect('index.php/Loginpg');
			}
		$filter=array('Paper_id'=>$id);
		$this->Exampg_model->delete3('paper_master',$filter);
		$this->session->set_flashdata('message_type', 'success');
		$this->session->set_flashdata('message', $this->config->item("index")." Data deleted Successfully!!");
		
		$this->parser->parse('Adminheader',$this->data);
			$this->load->view('Mngpapers');
			$this->parser->parse('Adminfooter',$this->data);
		redirect('index.php/Exampg/index3');
	}
	
	
	
	function index4($id=false)
		
	{	  Authority::is_logged_in();
		if(Authority::checkAuthority('Managesubject.Index')==true)
			{
				redirect('index.php/Loginpg');
			}
		if(!empty ($id))
		{
			
			$this->data['updatedata']=$this->Exampg_model->get_forupdate4($id);
		}
		
			
			$this->data['sub']=$this->Exampg_model->get_data4();
			$this->parser->parse('Adminheader',$this->data);
			$this->load->view('Mngsubject');
			$this->parser->parse('Adminfooter',$this->data);
		
	}
	function insert4()
		{  Authority::is_logged_in();
		if(Authority::checkAuthority('Managesubject.insert')==true)
			{
				redirect('index.php/Loginpg');
			}
			$data=array('Subject'=>$this->input->post('Subject'));
			
			if(!empty($this->input->post('id')))
		
			{
				
			$filter=array('Subject_id'=>$this->input->post('id'));
			$this->Exampg_model->update('subject_master',$data,$filter);
		
			}
			else
			{
			
			$id=$this->Exampg_model->insert('subject_master',$data);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("index")." Data Added Successfully!!");
			}
			
			$this->parser->parse('Adminheader',$this->data);
			$this->load->view('Mngsubject');
			$this->parser->parse('Adminfooter',$this->data);
		redirect ('index.php/Exampg/index4');
		}
		
	
	function delete4($id=false)
	{  Authority::is_logged_in();
		if(Authority::checkAuthority('Managesubject.delete')==true)
			{
				redirect('index.php/Loginpg');
			}
		$filter=array('Subject_id'=>$id);
		$this->Exampg_model->delete3('subject_master',$filter);
		$this->session->set_flashdata('message_type', 'success');
		$this->session->set_flashdata('message', $this->config->item("index")." Data deleted Successfully!!");
		
		
		$this->parser->parse('Adminheader',$this->data);
			$this->load->view('Mngsubject');
			$this->parser->parse('Adminfooter',$this->data);
		redirect('index.php/Exampg/index4');
	}
 }