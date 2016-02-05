<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Careermitra extends CI_Controller
 {

	
	 function __construct() {
		parent::__construct();
			
		$this->data[]="";
		$this->data['url'] = base_url();
		
		$this->load->model('Careermitra_model');
		$this->load->model('Authority_model');
		$this->load->library('Authority');
		
		$this->load->library('parser');
		
		$this->data['base_url']=base_url();
		
		$this->load->library('session');
		
		$user_session_data= $this->session->userdata('user_data');
			if(!empty($user_session_data))
		{
		$user_id=$user_session_data['user_id'];
		$this->load->model('Loginpg_model');
		$this->data['student']=$this->Loginpg_model->stupro($user_id);
		}else{
			$this->data['student']='';
		}
	}
	
/*----------------------------view for careermitra home pg-------------*/
	function index()
		{
		
		
		$this->parser->parse('Header',$this->data);
		$this->load->view('Home',$this->data);
		$this->parser->parse('Footer',$this->data);
		
		}
		
		
/*----------------------------view for Admin panel home pg-------------*/	
	function Adminindex()
		
		{	$this->parser->parse('Adminheader',$this->data);
			$this->load->view('Admin');
			$this->parser->parse('Adminfooter',$this->data);
		}
		
/*----------------------------view for Registration pg-------------*/
		
	function register()
		{
		
		$this->parser->parse('Header',$this->data);
		$this->load->view('Register',$this->data);
		$this->parser->parse('Footer',$this->data);
		
		}
		
/*----------------------------view for about us pg-------------*/		
	
	function index1()
	
		{
			$this->data['about']= $this->Careermitra_model->aboutusget_data();
		
			$this->parser->parse('Header',$this->data);
			$this->load->view('Aboutus');
			$this->parser->parse('Footer',$this->data);
		}

/*----------------------------view for contact us pg-------------*/		
	function index2()
		
		{	$this->data['contact']=$this->Careermitra_model->get_data();
		
			$this->parser->parse('Header',$this->data);
			$this->load->view('Contactus');
			$this->parser->parse('Footer',$this->data);
		}

/*----------------------------view for Manageabt us pg-------------*/		
		
	function index3($id=false)
		
	{	Authority::is_logged_in();
		if(Authority::checkAuthority('Manageaboutus.Index')==true)
			{
				redirect('index.php/Loginpg');
			}
		if(!empty ($id))
		{
			
			$this->data['updatedata']=$this->Careermitra_model->get_forupdate($id);
		}
		
			
			$this->data['about']=$this->Careermitra_model->get_data1();
			$this->parser->parse('Adminheader',$this->data);
			$this->load->view('Mngaboutus');
			$this->parser->parse('Adminfooter',$this->data);
		
	}
	
/*----------------------------insert function for about us-------------*/
	function insert()
		{	
			Authority::is_logged_in();
		if(Authority::checkAuthority('Manageaboutus.insert')==true)
			{
				redirect('index.php/Loginpg');
			}
			$data=array('Description'=>$this->input->post('Description'));
			
			if(!empty($this->input->post('id')))
		
			{
				
			$filter=array('Aboutus_id'=>$this->input->post('id'));
			$this->Careermitra_model->update('aboutus_master',$data,$filter);
		
			}
			else
			{
			
			$id=$this->Careermitra_model->insert('aboutus_master',$data);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("index")." Data Added Successfully!!");
			}
			
			$this->parser->parse('Adminheader',$this->data);
			$this->load->view('Mngaboutus');
			$this->parser->parse('Adminfooter',$this->data);
		redirect ('index.php/Careermitra/index3');
		}
		
/*----------------------------delete function for about us -------------*/	
	function delete($id=false)
	{	Authority::is_logged_in();
		if(Authority::checkAuthority('Manageaboutus.delete')==true)
			{
				redirect('index.php/Loginpg');
			}
		$filter=array('Aboutus_id'=>$id);
		$this->Careermitra_model->delete('aboutus_master',$filter);
		
		
		$this->session->set_flashdata('message_type', 'success');
		$this->session->set_flashdata('message', $this->config->item("index")." Data deleted Successfully!!");
		$this->parser->parse('Adminheader',$this->data);
			$this->load->view('Mngaboutus');
			$this->parser->parse('Adminfooter',$this->data);
		redirect ('index.php/Careermitra/index3');
	}
	
/*----------------------------view for manage contact us pg-------------*/	
	
	function index4($id=false)
		
	{	Authority::is_logged_in();
		if(Authority::checkAuthority('Managecontactus.Index')==true)
			{
				redirect('index.php/Loginpg');
			}
		if(!empty ($id))
		{
			
			$this->data['updatedata']=$this->Careermitra_model->get_forupdate1($id);
		}
		
			
			$this->data['contact']=$this->Careermitra_model->get_data2();
			$this->parser->parse('Adminheader',$this->data);
			$this->load->view('Mngcontactus');
			$this->parser->parse('Adminfooter',$this->data);
			
		
	}
	
/*----------------------------insert function for managecontact us-------------*/
	function insert1()
		{	
		Authority::is_logged_in();
		if(Authority::checkAuthority('Managecontactus.insert')==true)
			{
				redirect('index.php/Loginpg');
			}
			$data=array('Company_name'=>$this->input->post('Company_name'),
			'Company_address'=>$this->input->post('Company_address'),
			'Phone_no'=>$this->input->post('Phone_no'),
			'Email_address'=>$this->input->post('Email_address'));
			
			if(!empty($this->input->post('id')))
		
			{
				
			$filter=array('Contactus_id'=>$this->input->post('id'));
			$this->Careermitra_model->update('contactus_master',$data,$filter);
		
			}
			else
			{
			
			$id=$this->Careermitra_model->insert('contactus_master',$data);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("index")." Data Added Successfully!!");
			}
			
		$this->parser->parse('Adminheader',$this->data);
			$this->load->view('Mngcontactus');
			$this->parser->parse('Adminfooter',$this->data);	
		redirect ('index.php/Careermitra/index4');
		}
		
	/*----------------------------delete function for managecontact us-------------*/
	function delete1($id=false)
	{	
		Authority::is_logged_in();
		if(Authority::checkAuthority('Managecontactus.delete')==true)
			{
				redirect('index.php/Loginpg');
			}
		$filter=array('Contactus_id'=>$id);
		$this->Careermitra_model->delete('contactus_master',$filter);
		$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("index")." Data deleted Successfully!!");
		
		$this->parser->parse('Adminheader',$this->data);
			$this->load->view('Mngcontactus');
			$this->parser->parse('Adminfooter',$this->data);
		redirect('index.php/Careermitra/index4');
	}
	
	
	
	
	/*----------------------------view for manageintro-------------*/
	function index5($id=false)
		
	{	  Authority::is_logged_in();
		if(Authority::checkAuthority('Manageintro.Index')==true)
			{
				redirect('index.php/Loginpg');
			}
		if(!empty ($id))
		{
			
			$this->data['updatedata']=$this->Careermitra_model->get_forupdate2($id);
		}
			$this->data['intro1']=$this->Careermitra_model->introget_data();
			$this->data['lang']=$this->Careermitra_model->langget_data();
			$this->data['intro']=$this->Careermitra_model->get_data3();
			$this->parser->parse('Adminheader',$this->data);
			$this->load->view('Mngintro');
			$this->parser->parse('Adminfooter',$this->data);
		
	}
	
/*----------------------------insert function for manageintro-------------*/
	function insert2()
		{	  Authority::is_logged_in();
		if(Authority::checkAuthority('Manageintro.insert')==true)
			{
				redirect('index.php/Loginpg');
			}
			
			$data=array('Type_id'=>$this->input->post('Type_id'));
			
			if(!empty($this->input->post('id')))
		
			{
				
			$filter=array('Intro_id'=>$this->input->post('id'));
			$this->Careermitra_model->update('intro_master',$data,$filter);
		
			$data=array(
			'Intro_id'=>$this->input->post('id'),
			'Description'=>$this->input->post('Description'),
			'Language_id'=>$this->input->post('Language_id'));
			
			$this->Careermitra_model->update('intro_detail',$data,$filter);
			
			}
			else
			{
			
			$id=$this->Careermitra_model->insert('intro_master',$data);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("index")." Data Added Successfully!!");
			
			$data=array(
			'Intro_id'=>$id,
			'Description'=>$this->input->post('Description'),
			'Language_id'=>$this->input->post('Language_id'));
			
			$this->Careermitra_model->insert('intro_detail',$data);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("index")." Data Added Successfully!!");
			}
			
			
			$this->parser->parse('Adminheader',$this->data);
			$this->load->view('Mngintro');
			$this->parser->parse('Adminfooter',$this->data);
		redirect ('index.php/Careermitra/index5');
		}
		
/*----------------------------delete function for manageintro-------------*/
	function delete2($id=false)
	{	  Authority::is_logged_in();
		if(Authority::checkAuthority('Manageintro.delete')==true)
			{
				redirect('index.php/Loginpg');
			}
		$filter=array('Intro_id'=>$id);
		$this->Careermitra_model->delete2('intro_detail','intro_master',$filter);
		
		$this->parser->parse('Adminheader',$this->data);
		$this->load->view('Mngintro');
		$this->parser->parse('Adminfooter',$this->data);
		redirect ('index.php/Careermitra/index5');
	}
	
/*----------------------------view for managenotify pg-------------*/	
	function index6($id=false)
		
		{	  Authority::is_logged_in();
		if(Authority::checkAuthority('Managenotify.index')==true)
			{
				redirect('index.php/Loginpg');
			}
		if(!empty($id))
			{
			$this->data['updatedata']=$this->Careermitra_model->get_forupdate3($id);
			}
			{
			$this->data['intro1']=$this->Careermitra_model->introget_data1();
			$this->data['lang']=$this->Careermitra_model->langget_data();
			$this->data['notify']=$this->Careermitra_model->get_data4();
			
			$this->parser->parse('Adminheader',$this->data);
			$this->load->view('Mngnotify');
			$this->parser->parse('Adminfooter',$this->data);
			}
		}
/*----------------------------insert function for managenotify pg-------------*/
		
	function insert3()
	{ 
	  Authority::is_logged_in();
		if(Authority::checkAuthority('Managenotify.insert')==true)
			{
				redirect('index.php/Loginpg');
			}
		$data=array('Type_id'=>$this->input->post('Type_id'),
		'Link_url'=>$this->input->post('Link_url'),
		'Status'=>$this->input->post('Status'),
		'Rq_date'=>$this->input->post('Rq_date'));
		
	if(!empty($this->input->post('id')))
		{			
			$filter=array('Notify_id'=>$this->input->post('id'));
			$this->Careermitra_model->update('notify_master',$data,$filter);
		
			$data=array('Notify_id'=>$this->input->post('id'),
			'Description'=>$this->input->post('Description'),
			'Language_id'=>$this->input->post('Language_id'));
			$this->Careermitra_model->update('notify_detail',$data,$filter);
	
		}
		else
		{
			$id=$this->Careermitra_model->insert('notify_master',$data);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("index")." Data Added Successfully!!");
			
			$data=array('Notify_id'=>$id,
			'Description'=>$this->input->post('Description'),
			'Language_id'=>$this->input->post('Language_id'));
			$this->Careermitra_model->insert('notify_detail',$data);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("index")." Data Added Successfully!!");
		}
		
		
		
			$this->parser->parse('Adminheader',$this->data);
			$this->load->view('Mngnotify');
			$this->parser->parse('Adminfooter',$this->data);
			redirect('index.php/Careermitra/index6');
	}

/*----------------------------delete function for managenotify-------------*/	
	function delete3($id=false)
	{  
	Authority::is_logged_in();
		if(Authority::checkAuthority('Managenotify.delete')==true)
			{
				redirect('index.php/Loginpg');
			}
		$filter=array('Notify_id'=>$id);
		$this->Careermitra_model->delete3('notify_detail','notify_master',$filter);
		$this->session->set_flashdata('message_type', 'success');
		$this->session->set_flashdata('message', $this->config->item("index")." Data deleted Successfully!!");
		
		$this->parser->parse('Adminheader',$this->data);
			$this->load->view('Mngnotify');
			$this->parser->parse('Adminfooter',$this->data);
			redirect('index.php/Careermitra/index6');
	}
	
}