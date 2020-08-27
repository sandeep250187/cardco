<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller {
    public function __construct(){
	     parent::__construct();
	     is_logged_in();
	     $this->load->model('admin/Ad_admin');
	}
	
	public function index(){
		$data=array();
		$this->load->view(ADMIN_FOLDER.'/home/view_home',$data);
	}
	
}
