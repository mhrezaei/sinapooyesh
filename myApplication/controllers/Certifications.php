<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Certifications extends CI_Controller {

    public function __construct()
    {
            parent::__construct();
            // Your own constructor code
    }
    public function index()
    {
        $this->load->model('templates/pages_model');
        $this->load->view('templates/header', $this->header_model->header_data());
        $this->load->view('templates/certifications', $this->pages_model->page_data(2));
        $this->load->view('templates/footer');
    }
}
