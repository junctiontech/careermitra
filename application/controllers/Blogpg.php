<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blogpg extends CI_Controller
 {

	
	 function __construct() {
		parent::__construct();
			
		$this->data[]="";
		$this->data['url'] = base_url();
		
		//$this->load->model('Blogpg_model');
		
		$this->load->library('parser');
		
		$this->data['base_url']=base_url();
		
		$this->load->library('session');
		
	}
	function Index()
		
		{	$this->parser->parse('header',$this->data);
			$this->load->view('Blog');
			$this->parser->parse('footer',$this->data);
		}
 }