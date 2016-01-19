<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contactuspg extends CI_Controller
 {

	
	 function __construct() {
		parent::__construct();
			
		$this->data[]="";
		$this->data['url'] = base_url();
		
		$this->load->model('Contactuspg_model');
		
		$this->load->library('parser');
		
		$this->data['base_url']=base_url();
		
		$this->load->library('session');
		
	}
	function Index()
		
		{	$this->data['contact']=$this->Contactuspg_model->get_data();
		
			$this->parser->parse('header',$this->data);
			$this->load->view('Contactus');
			$this->parser->parse('footer',$this->data);
		}
 }