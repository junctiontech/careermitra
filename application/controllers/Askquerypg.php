<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Askquerypg extends CI_Controller
 {

	
	 function __construct() {
		parent::__construct();
			
		$this->data[]="";
		$this->data['url'] = base_url();
		
		//$this->load->model('Askquerypg_model');
		
		$this->load->library('parser');
		
		$this->data['base_url']=base_url();
		
		$this->load->library('session');
		
	}
	function Index()
		
		{	$this->parser->parse('header',$this->data);
			$this->load->view('Askquery');
			$this->parser->parse('footer',$this->data);
		}
 }