<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jobpg extends CI_Controller
 {

	
	 function __construct() {
		parent::__construct();
			
		$this->data[]="";
		$this->data['url'] = base_url();
		
		$this->load->model('Jobpg_model');
		
		$this->load->library('parser');
		
		$this->data['base_url']=base_url();
		
		$this->load->library('session');
		
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
		
			$this->parser->parse('header',$this->data);
			$this->load->view('Job');
			$this->parser->parse('footer',$this->data);
		 }
		
 }