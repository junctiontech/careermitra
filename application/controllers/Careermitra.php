<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Careermitra extends CI_Controller
 {

	
	 function __construct() {
		parent::__construct();
			
		$this->data[]="";
		$this->data['url'] = base_url();
		
		//$this->load->model('Careermitra_model');
		
		$this->load->library('parser');
		
		$this->data['base_url']=base_url();
		
		$this->load->library('session');
		
	}
	function index()
		{
		
		//$this->data['examtype']=$this->Careermitra_model->get_data('exam');
		
		$this->parser->parse('header',$this->data);
		$this->load->view('Home',$this->data);
		$this->parser->parse('footer',$this->data);
		
		}
	function register()
		{
		
		$this->parser->parse('header',$this->data);
		$this->load->view('Register',$this->data);
		$this->parser->parse('footer',$this->data);
		
		}
	
	
}