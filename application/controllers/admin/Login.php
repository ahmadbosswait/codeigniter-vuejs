<?php
class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if($this->session->userdata('admin'))
            redirect('admin/dashboard');
    }
    function index()
    {
        $this->load->view('templates/header');

        $this->load->view('admin/login');
    }
    function verify()
    {
        //username:admin password:123456
        $this->load->model('admin_model');
        $check = $this->admin_model->validate();
        if($check)
        {
            $this->session->set_userdata('admin','1');
            redirect('admin/dashboard');
        }
        else
        {
            redirect('admin');
        }
    }
}