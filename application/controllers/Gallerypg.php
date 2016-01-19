<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gallerypg extends CI_Controller
 {

	
	 function __construct()
	 {
		parent::__construct();
			
		$this->data[]="";
		$this->data['url'] = base_url();
		
		$this->load->model('Gallerypg_model');
		
		$this->load->library('parser');
		
		$this->data['base_url']=base_url();
		
		$this->load->library('session');
		
	}
	function Index()
		
		{	
			//$this->data['exam']=$this->Gallerypg_model->get_exam_data();
		
			$this->parser->parse('header',$this->data);
			$this->load->view('Gallery',$this->data);
			$this->parser->parse('footer',$this->data);
		}
 }