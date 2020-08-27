<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Pages extends CI_Controller {
	
	function __construct(){
         parent::__construct();
		 $this->load->model('pages/M_pages');
		 $this->load->library('form_validation');
		 $page_name = $this->uri->segment(2);
	}
	
	function index($page_slug=''){
		$data=array();
		$data['pageData'] = $this->M_pages->get_pages($page_slug);
		
		if(empty($data['pageData'])){
		 $data['pageData'] = $this->M_pages->get_pages('notfound');
		 $data['title'] = $data['pageData']->meta_title;
		 $data['metadesc'] =$data['pageData']->meta_description;
		 $data['metakey'] =$data['pageData']->meta_keyword;
		 $this->load->view('pages/view_page',$data);
		}
		else {
			if($page_slug=='contact-us'){				
			$data['title'] = $data['pageData']->meta_title;
			$data['metadesc'] =$data['pageData']->meta_description;
			$data['metakey'] =$data['pageData']->meta_keyword;
			
			$this->load->view('pages/contact-us',$data);	
			
			}	
			else {
			$data['title'] = $data['pageData']->meta_title;
			$data['metadesc'] =$data['pageData']->meta_description;
			$data['metakey'] =$data['pageData']->meta_keyword;
			$this->load->view('pages/view_page',$data);
			}
		
		
		}
		
	
	}
	
}	
?>