<?php
  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
   class Confirmuser extends CI_Controller{
	public function __construct(){
	     parent::__construct();
			$this->load->model('user/M_user');
			 }

		public function index($confirm=''){
			if(!empty($confirm)){
				  $result=$this->M_user->confirmuser($confirm);
				$data['result']=$result;
				$this->load->view('confirm',$data);

			} 
		}	 

	}