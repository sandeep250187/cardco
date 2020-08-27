<?php
  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
   class Cart extends CI_Controller{
	public function __construct(){
	     parent::__construct();
			$this->load->model('hotels/M_hotels');
			$this->load->helper("url");
			$this->load->library("pagination");
	      
	}
	public function index()
	{
		$data=array();
		if(!empty($this->session->userdata('hotel_cart')))
		{
		$data['items'] = array_values(unserialize($this->session->userdata('hotel_cart')));
        $data['total'] = $this->total();
		}
		if(!empty($this->session->userdata('tour_cart')))
		{
		$data['tour_items'] = array_values(unserialize($this->session->userdata('tour_cart')));
        //$data['tour_total'] = $this->tour_total();
		}
		
		if(!empty($this->session->userdata('ticket_cart')))
		{
		$data['ticket_items'] = array_values(unserialize($this->session->userdata('ticket_cart')));
        //$data['tour_total'] = $this->tour_total();
		}
		//pr($data['ticket_items']);
        $this->load->view('hotel_cart', $data);
	}
	
	

    private function total() {
		if(!empty($this->session->userdata('hotel_cart')))
		{
        $items = array_values(unserialize($this->session->userdata('hotel_cart')));
		
        $s = 0;
        foreach ($items as $item) {
            $s += $item['room_price'];
        }
        return $s;
		}
    }
	private function tour_total() {
		if(!empty($this->session->userdata('hotel_cart')))
		{
        $items = array_values(unserialize($this->session->userdata('hotel_cart')));
		
        $s = 0;
        foreach ($items as $item) {
            $s += $item['room_price'];
        }
        return $s;
		}
    }
	
}
   
?>