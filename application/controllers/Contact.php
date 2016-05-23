<?php
defined('BASEPATH') OR exit("");


class Contact extends CI_Controller{
    public function __construct() {
        parent::__construct();
    }
    
    
    
    
    public function index(){
        $data['pageTitle'] = "Contact Us";
        
        $data['pageContent'] = $this->load->view('contact', '', TRUE);
        
        $this->load->view('main', $data);
    }
}