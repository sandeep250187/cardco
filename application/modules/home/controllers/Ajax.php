<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Ajax extends CI_Controller {
	
	public function __construct()
    {
		parent::__construct();
		$this->load->model('api/M_ajax');
		$this->load->library('session');
    }
	
	function buycredit()
	{
		$userId = getfrontCurUserID(); 
		$this->M_ajax->buycredit($userId);
		echo "updated";
	}
	function check_email_exist() {
                echo $res=$this->M_ajax->check_exist($this->input->post('email'));
               
        }
	
}
