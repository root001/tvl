<?php
defined('BASEPATH') OR exit("");


class Project extends CI_Controller{
    public function __construct() {
        parent::__construct();
    }
    
    
    
    
    public function index(){
        $data['pageTitle'] = "The Professionals";
        
        $data['pageContent'] = $this->load->view('gallery', '', TRUE);
        
        $this->load->view('main', $data);
    }
}