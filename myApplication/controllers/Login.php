<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
    {
            parent::__construct();
            $this->load->model('User_auth_model');
    }
    
    public function index()
	{
        
        if($this->User_auth_model->is_admin())
        {
            redirect(site_url() . 'admin');
            exit;
        }
        
        $data['err'] = '';        
        if($this->input->post('username'))
        {
            $user = $this->input->post('username', TRUE, TRUE);
            $pass = $this->input->post('password', TRUE, TRUE);
            $question = $this->input->post('question', TRUE, TRUE);
            $qsKey = $this->input->post('txtContactQsKey', TRUE, TRUE);
            if(strlen($user) > 5 AND strlen($pass) > 5 AND $question AND $qsKey)
            {
                if(securityQuestion($question, $qsKey, TRUE, 'loginPage'))
                {
                    if($this->User_auth_model->admin_login($user, $pass))
                    {
                        redirect(site_url() . 'admin');
                        exit;
                    }
                    else
                    {
                        $data['err'] = 3; // user or pass eshtebah ast.
                    }
                }
                else
                {
                    $data['err'] = 2; // qs eshtebah ast.
                }
            }
            else
            {
                $data['err'] = 1; // name karbari, pass va qs khali ast.
            }
        }
        
        $this->load->view('templates/login', $data);
        
	}

}
