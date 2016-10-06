<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    protected $user;
    
    public function __construct()
    {
            parent::__construct();
            
            $this->user = $this->user_auth_model->is_user();
            
            if( ! $this->user)
            {
                redirect(base_url());
                show_404();
                exit;
            }
    }
    public function index()
    {
        $this->load->model('templates/pages_model');
        $this->load->view('templates/header', $this->header_model->header_data());
        $this->load->view('templates/users', $this->user);
        $this->load->view('templates/footer');
    }
}
