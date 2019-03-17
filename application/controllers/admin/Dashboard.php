<?php

class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('admin'))
            redirect('admin');
    }

    public function index($page = 'home')
    {
//        if (!file_exists(APPPATH . 'views/admin/pages/' . $page . '.php')) {
//            show_404();
//        }
//        $data['title'] = ucfirst($page);
        $this->load->view('admin/header');
        $this->load->view('admin/dashboard');
        $this->load->view('templates/footer');
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect('admin');
    }
}