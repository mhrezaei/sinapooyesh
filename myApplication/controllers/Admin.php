<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
    {
            parent::__construct();
            if( ! $this->user_auth_model->is_admin())
            {
                redirect(site_url() . 'login');
                exit;
            }
    }
    
    public function index()
	{
        
        $this->load->view('admin/header');
        $this->load->view('admin/home');
        $this->load->view('admin/footer');
    }
    
    public function uploadImages()
    {
        if($this->input->post('uploadFile') AND $this->input->post('uploadFile') == 'yes')
        {
            $config['upload_path'] = './assets/images/upload';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']    = '2000';
            $config['max_width']  = '2048';
            $config['max_height']  = '1536';
            $config['file_name']  = md5(sha1(time()));

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload())
            {
                $data['error'] = array('error' => $this->upload->display_errors());
                $data['success'] = '';
                $data['status'] = 1;
            }
            else
            {
                $data['success'] = array('upload_data' => $this->upload->data());
                $data['error'] = '';
                $data['status'] = 2;
            }
        }
        else
        {
            $data['status'] = 1;
            $data['error'] = '';
            $data['success'] = '';
        }
        
        $this->load->view('admin/uploadImages', $data);
    }

    public function log_out()
    {
        $this->session->unset_userdata('admin');
        redirect(site_url() . 'login');
        exit;
    }

}
