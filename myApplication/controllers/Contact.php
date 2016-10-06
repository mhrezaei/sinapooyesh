<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

    public function __construct()
    {
            parent::__construct();
            // Your own constructor code
    }
    public function index($pId = FALSE)
    {
        $product['name'] = '';
        
        if($pId AND is_numeric($pId))
        {
            $this->load->model('Product_model');
            $product = $this->Product_model->one_product($pId);
            if( ! $product)
            {
                redirect(site_url());
                exit;
            }
        }
        
        $this->load->model('templates/pages_model');
        
        $data['page'] = $this->pages_model->page_data(3);
        $data['product'] = $product;
        
        $this->load->view('templates/header', $this->header_model->header_data());
        $this->load->view('templates/contact', $data);
        $this->load->view('templates/footer');
    }
}
