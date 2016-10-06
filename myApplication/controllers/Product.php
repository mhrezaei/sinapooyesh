<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {
    
    public $is_cat;
    
    public function __construct()
    {
            parent::__construct();
    }
    public function index()
    {
        //
    }
    
    public function plist($id, $title = NULL)
    {
        $this->load->model('Product_model');
        
        $this->is_cat = $this->Product_model->is_categories($id);
        if($id AND is_numeric($id) AND $this->is_cat)
        {
            $data['cat'] = $this->is_cat;
            $data['child'] = $this->Product_model->have_child($id);
            
            if($data['child'])
            {
                for($i = 0; $i < count($data['child']); $i++)
                {
                    $data['child'][$i]['products'] = $this->Product_model->all_categories_product($data['child'][$i]['id'], 1);
                }
            }
            $this->load->view('templates/header', $this->header_model->header_data());
            $this->load->view('templates/product_list', $data);
            $this->load->view('templates/footer');
        }
        else
        {
            show_404();
            exit;
        }
    }
}
