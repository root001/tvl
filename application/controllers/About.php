<?php
defined('BASEPATH') OR exit("");


class About extends CI_Controller{
    public function __construct() {
        parent::__construct();
    }
    
    
    
    
    public function index(){
        $data['pageTitle'] = "About Us";
        
        $data['pageContent'] = $this->load->view('aboutus', '', TRUE);
        
        $this->load->view('main', $data);
    }
}