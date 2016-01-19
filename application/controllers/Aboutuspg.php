<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Aboutuspg extends CI_Controller
 {

	
	 function __construct() {
		parent::__construct();
			
		$this->data[]="";
		$this->data['url'] = base_url();
		
		$this->load->model('Aboutuspg_model');
		
		$this->load->library('parser');
		
		$this->data['base_url']=base_url();
		
		$this->load->library('session');
		
	}
	function Index()
	
		{
			$this->data['about']= $this->Aboutuspg_model->aboutusget_data();
		
			$this->parser->parse('header',$this->data);
			$this->load->view('Aboutus');
			$this->parser->parse('footer',$this->data);
		}
 }