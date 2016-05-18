<?php
defined('BASEPATH') OR exit("");


class User extends CI_Controller{
    public function __construct() {
        parent::__construct();
    }
    
    
    
    
    public function index(){
        $data['pageTitle'] = "Profile";
        
        $data['pageContent'] = $this->load->view('profile', '', TRUE);
        
        $this->load->view('main', $data);
    }
    
    public function portfolio(){
        $data['pageTitle'] = "Porfolio";
        
        $data['pageContent'] = $this->load->view('portfolio', '', TRUE);
        
        $this->load->view('main', $data);
    }
}