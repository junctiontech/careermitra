<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Exampg extends CI_Controller
 {

	
	 function __construct() {
		parent::__construct();
			
		$this->data[]="";
		$this->data['url'] = base_url();
		
		$this->load->model('Exampg_model');
		
		$this->load->library('parser');
		
		$this->data['base_url']=base_url();
		
		$this->load->library('session');
		
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
			
			$this->parser->parse('header',$this->data);
			$this->load->view('Exam',$this->data);
			$this->parser->parse('footer',$this->data);
			
	}


	function Quepaper($Subject_id=false,$Examdetail_id)
	{
		if (!empty($Subject_id) && !empty($Examdetail_id))
		{    
	
			$this->data['paper']=$this->Exampg_model->paperdetail($Subject_id,$Examdetail_id);
			
			$this->parser->parse('header',$this->data);
			$this->load->view('Magazine',$this->data);
			$this->parser->parse('footer',$this->data);
		}

			
	}
 }