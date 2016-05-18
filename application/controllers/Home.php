<?php
defined('BASEPATH') OR exit("");


class Home extends CI_Controller{
    public function __construct() {
        parent::__construct();
    }
    
    
    
    
    public function index(){
        $data['pageTitle'] = "Home";
        
        $data['pageContent'] = $this->load->view('home', '', TRUE);
        
        $this->load->view('main', $data);
    }
}