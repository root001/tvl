<?php
defined('BASEPATH') OR exit("");


class Blog extends CI_Controller{
    public function __construct() {
        parent::__construct();
    }
    
    
    public function index(){
        $data['pageTitle'] = "Our Blog";
        
        $data['pageContent'] = $this->load->view('blogs/blog', '', TRUE);
        
        $this->load->view('main', $data);
    }
    
    public function post(){
        $data['pageTitle'] = "Our Blog";
        
        $data['pageContent'] = $this->load->view('blogs/blog_post', '', TRUE);
        
        $this->load->view('main', $data);
    }
}