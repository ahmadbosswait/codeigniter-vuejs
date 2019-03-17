<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('admin'))
            redirect('admin');
        $this->load->model('user_model', 'user');
        $this->load->helper(array('form', 'url'));
    }

    public function index()
    {
        $this->load->view('admin/header');
        $this->load->view('admin/user');
        $this->load->view('admin/footer');
    }
}
    
