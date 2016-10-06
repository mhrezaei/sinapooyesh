<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
        $this->load->view('templates/header', $this->header_model->header_data());
        $this->load->view('templates/slider', $this->header_model->slider_data());
        $this->load->view('templates/main');
        $this->load->view('templates/footer');
	}
    public function logOut()
    {
        if($this->user_auth_model->log_out())
        {
            redirect(base_url());
            exit;
        }
        else
        {
            show_404();
        }
    }
}
