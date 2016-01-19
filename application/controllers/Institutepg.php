<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Institutepg extends CI_Controller
 {

	
	 function __construct()
	 {
		parent::__construct();
			
		$this->data[]="";
		$this->data['url'] = base_url();
		
		$this->load->model('Institutepg_model');
		
		$this->load->library('parser');
		
		$this->data['base_url']=base_url();
		
		$this->load->library('session');
		
	}
	function Index($id=false)
		
		{	
			if(!empty($id))
			{
				$this->data['detail1']=$this->Institutepg_model->detail($id);
				
			}
		 else
		 {	
						
			$this->data['intro']= $this->Institutepg_model->introget_data();
		
			$this->data['option']= $this->Institutepg_model->optionget_data();
			$this->data['notify']= $this->Institutepg_model->notifyget_data();
		 
		 }
			$this->parser->parse('header',$this->data);
			$this->load->view('Institute',$this->data);
			$this->parser->parse('footer',$this->data);
		}
 }