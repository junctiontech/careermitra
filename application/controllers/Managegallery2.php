<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Managegallery2 extends CI_Controller
 {

	
	 function __construct() {
		parent::__construct();
			
		$this->data[]="";
		$this->data['url'] = base_url();
		
		//$this->load->model(' Managegallery2_model');
		
		$this->load->library('parser');
		
		$this->data['base_url']=base_url();
		
		$this->load->library('session');
		
	}
	function Index()
		
		{	$this->parser->parse('Adminheader',$this->data);
			$this->load->view('Mnggallery2');
			$this->parser->parse('Adminfooter',$this->data);
		}
 }