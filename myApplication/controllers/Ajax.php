<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Ajax extends CI_Controller {

        public function __construct()
        {
            parent::__construct();
            if (!$this->input->is_ajax_request()) {
                show_404();
                exit;
            }
        }

        public function index()
        {
            if (!$this->input->is_ajax_request()) {
                show_404();
                exit;
            }
        }

        public function contactCom()
        {
            if (!$this->input->is_ajax_request()) {
                show_404();
                exit;
            }

            $this->load->helper('email');

            $name = $this->input->post('txtName', true, true);
            $email = $this->input->post('txtEmail', true, true);
            $content = $this->input->post('txtContent', true, true) ? $this->input->post('txtContent', true, true) : '-';
            $site = $this->input->post('txtSite', true, true);
            $qs = $this->input->post('txtQs', true, true);
            $qsKey = $this->input->post('txtQsKey', true, true);
            $qsTarget = $this->input->post('txtQsTarget', true, true);
            $result = '';

            if(strlen($name) > 3 AND strlen($content) > 10 AND valid_email($email) AND securityQuestion($qs, $qsKey, TRUE, $qsTarget))
            {
                $data = array(
                    'name' => htmlCoding($name),
                    'email' => $email,
                    'site' => $site,
                    'content' => htmlCoding($content),
                    'status' => 1,
                    'time' => time()
                );
                $this->db->insert('contact', $data);
                if($this->db->affected_rows() > 0)
                {
                    $result['contactStatus'] = 1;
                }
                else
                {
                    $result['contactStatus'] = 2;
                }
            }
            else
            {
                $result['contactStatus'] = 3;
            }
            echo json_encode($result);
            exit;
        }

        public function loginFormDo()
        {
            if (!$this->input->is_ajax_request()) {
                show_404();
                exit;
            }

            $user = $this->input->post('txtUser', true, true);
            $pass = $this->input->post('txtPass', true, true);

            if($this->session->userdata('errUserLogin'))
            {
                if($this->session->userdata('errUserLogin') < 5)
                {
                    if($this->user_auth_model->userLogin(htmlCoding($user), hashStr(htmlCoding($pass))))
                    {
                        $res['doLogin'] = 1;
                    }
                    else
                    {
                        $res['doLogin'] = 2;
                        $this->session->set_userdata(array('errUserLogin' => ($this->session->userdata('errUserLogin') + 1)));
                    }
                }
                else
                {
                    $res['doLogin'] = 2;
                }
            }
            else
            {
                if($this->user_auth_model->userLogin(htmlCoding($user), hashStr(htmlCoding($pass))))
                {
                    $res['doLogin'] = 1;
                }
                else
                {
                    $res['doLogin'] = 2;
                    $this->session->set_userdata(array('errUserLogin' => 1));
                }
            }

            echo json_encode($res);
            exit;
        }

        public function userEditInfo()
        {
            $this->load->helper('email');

            $txtName = $this->input->post('txtName', TRUE, TRUE);
            $txtTel = $this->input->post('txtTel', TRUE, TRUE);
            $txtMob = $this->input->post('txtMob', TRUE, TRUE);
            $txtEmail = $this->input->post('txtEmail', TRUE, TRUE);
            $txtAddress = $this->input->post('txtAddress', TRUE, TRUE);
            $txtPostal = $this->input->post('txtPostal', TRUE, TRUE);
            $txtPass = $this->input->post('txtPass', TRUE, TRUE);
            $txtPassVerify = $this->input->post('txtPassVerify', TRUE, TRUE);

            $user = $this->user_auth_model->is_user();

            if($this->input->is_ajax_request() AND $user)
            {
                if(strlen($txtName) > 5 AND strlen($txtTel) == 11 AND is_numeric($txtTel) AND strlen($txtMob) == 11 AND is_numeric($txtMob) AND valid_email($txtEmail) AND strlen($txtAddress) > 10 AND strlen($txtPostal) == 10 AND is_numeric($txtPostal))
                {
                    $data = array(
                        'name' => htmlCoding($txtName),
                        'tel' => htmlCoding($txtTel),
                        'mobile' => htmlCoding($txtMob),
                        'email' => htmlCoding($txtEmail),
                        'address' => htmlCoding($txtAddress),
                        'postalCode' => htmlCoding($txtPostal),
                        'lastOnline' => time()
                    );
                    if($txtPass != 'notChange' AND strlen($txtPass) > 5 AND $txtPass == $txtPassVerify)
                    {
                        $data['password'] = hashStr($txtPass);
                    }

                    if($this->user_auth_model->user_edit_data($user['id'], $data))
                    {
                        $result['updateUserData'] = 1;
                    }
                    else
                    {
                        $result['updateUserData'] = 2;
                    }
                }
                else
                {
                    $result['updateUserData'] = 3;
                }

                echo json_encode($result);
            }
        }

        public function pageContetnt()
        {
            if( ! $this->user_auth_model->is_admin())
            {
                show_404();
            }
            else
            {
                $id = $this->input->post('pgId', TRUE, TRUE);
                $query = $this->db->select(array('id', 'title', 'content'))->from('pages')->where('id', $id)->get();

                if($query->num_rows() > 0)
                {
                    $data['page'] = $query->row_array();
                    $data['page']['content'] = htmlCoding($data['page']['content'], 2);
                    $data['havePage'] = 1;
                }
                else
                {
                    $data['havePage'] = 2;
                }

                echo json_encode($data);

            }
        }

        public function editPageContent()
        {
            if( ! $this->user_auth_model->is_admin())
            {
                show_404();
            }
            else
            {
                $id = $this->input->post('pgId', TRUE, TRUE);
                $data = array(
                    'content' => htmlCoding($this->input->post('pgContent', FALSE, FALSE)),
                    'update' => time()
                );

                $this->db->where('id', $id);
                $this->db->update('pages', $data);

                if($this->db->affected_rows() > 0)
                {
                    $dataL['success'] = 1;
                }
                else
                {
                    $dataL['success'] = 2;
                }

                echo json_encode($dataL);

            }
        }

        public function deleteOneCat()
        {
            if( ! $this->user_auth_model->is_admin())
            {
                show_404();
            }
            else
            {
                $id = $this->input->post('catId', TRUE, TRUE);
                $data = array(
                    'status' => 12
                );

                $this->db->where('id', $id);
                $this->db->update('categories', $data);

                if($this->db->affected_rows() > 0)
                {
                    $data = array(
                        'status' => 12
                    );

                    $this->db->where('categories', $id);
                    $this->db->update('product', $data);
                    $dataL['success'] = 1;
                }
                else
                {
                    $dataL['success'] = 2;
                }

                echo json_encode($dataL);

            }
        }

        public function getOneCat()
        {
            if( ! $this->user_auth_model->is_admin())
            {
                show_404();
            }
            else
            {
                $id = $this->input->post('catId', TRUE, TRUE);
                $query = $this->db->select('*')->from('categories')->where('id', $id)->get();

                if($query->num_rows() > 0)
                {
                    $data['success'] = 1;
                    $data['cat'] = $query->row_array();
                }
                else
                {
                    $data['success'] = 2;
                }

                echo json_encode($data);

            }
        }

        public function editOneCat()
        {
            if( ! $this->user_auth_model->is_admin())
            {
                show_404();
            }
            else
            {
                $id = $this->input->post('catId', TRUE, TRUE);
                $title = $this->input->post('catTitle', TRUE, TRUE);

                $data = array(
                    'title' => $title
                );

                $this->db->where('id', $id);
                $this->db->update('categories', $data);

                $data['success'] = 1;

                echo json_encode($data);

            }
        }

        public function addNewCat()
        {
            if( ! $this->user_auth_model->is_admin())
            {
                show_404();
            }
            else
            {
                $id = $this->input->post('catId', TRUE, TRUE);
                $title = $this->input->post('catTitle', TRUE, TRUE);

                $data = array(
                    'title' => $title,
                    'pId' => $id,
                    'status' => 1
                );

                $this->db->insert('categories', $data);

                if($this->db->affected_rows() > 0)
                {
                    $data['success'] = 1;
                }
                else
                {
                    $data['success'] = 2;
                }

                echo json_encode($data);

            }
        }

        public function catContetnt()
        {
            if( ! $this->user_auth_model->is_admin())
            {
                show_404();
            }
            else
            {
                if($this->input->post('catCont', TRUE, TRUE) == 1)
                {
                    // device
                    $query = $this->db->select(array('id', 'title'))->from('categories')->where(array(
                        'pId' => 4,
                        'status' => 1
                    ))->get();

                    if($query->num_rows() > 0)
                    {
                        $data['haveDevice'] = 1;
                        $data['device'] = $query->result_array();
                        for($i = 0; $i < count($data['device']); $i++)
                        {
                            $data['device'][$i]['pro'] = $this->db->select('id')->from('product')->where(array(
                                'categories' => $data['device'][$i]['id'],
                                'status' => 1
                            ))->get();
                            $data['device'][$i]['pro'] = $data['device'][$i]['pro']->num_rows();
                        }
                    }
                    else
                    {
                        $data['haveDevice'] = 2;
                    }

                    // kit
                    $query = $this->db->select(array('id', 'title'))->from('categories')->where(array(
                        'pId' => 3,
                        'status' => 1
                    ))->get();

                    if($query->num_rows() > 0)
                    {
                        $data['haveKit'] = 1;
                        $data['kit'] = $query->result_array();
                        for($i = 0; $i < count($data['kit']); $i++)
                        {
                            $data['kit'][$i]['pro'] = $this->db->select('id')->from('product')->where(array(
                                'categories' => $data['kit'][$i]['id'],
                                'status' => 1
                            ))->get();
                            $data['kit'][$i]['pro'] = $data['kit'][$i]['pro']->num_rows();
                        }
                    }
                    else
                    {
                        $data['haveKit'] = 2;
                    }

                    // chemical
                    $query = $this->db->select(array('id', 'title'))->from('categories')->where(array(
                        'pId' => 1,
                        'status' => 1
                    ))->get();

                    if($query->num_rows() > 0)
                    {
                        $data['haveChemical'] = 1;
                        $data['chemical'] = $query->result_array();
                        for($i = 0; $i < count($data['chemical']); $i++)
                        {
                            $data['chemical'][$i]['pro'] = $this->db->select('id')->from('product')->where(array(
                                'categories' => $data['chemical'][$i]['id'],
                                'status' => 1
                            ))->get();
                            $data['chemical'][$i]['pro'] = $data['chemical'][$i]['pro']->num_rows();
                        }
                    }
                    else
                    {
                        $data['haveChemical'] = 2;
                    }

                    // Consumable
                    $query = $this->db->select(array('id', 'title'))->from('categories')->where(array(
                        'pId' => 2,
                        'status' => 1
                    ))->get();

                    if($query->num_rows() > 0)
                    {
                        $data['haveConsumable'] = 1;
                        $data['consumable'] = $query->result_array();
                        for($i = 0; $i < count($data['consumable']); $i++)
                        {
                            $data['consumable'][$i]['pro'] = $this->db->select('id')->from('product')->where(array(
                                'categories' => $data['consumable'][$i]['id'],
                                'status' => 1
                            ))->get();
                            $data['consumable'][$i]['pro'] = $data['consumable'][$i]['pro']->num_rows();
                        }
                    }
                    else
                    {
                        $data['haveConsumable'] = 2;
                    }
                }

                echo json_encode($data);

            }
        }

        public function loadCat()
        {
            if( ! $this->user_auth_model->is_admin())
            {
                show_404();
            }
            else
            {
                if($this->input->post('ld', TRUE, TRUE) == 1)
                {
                    $op = '<option value="0" >انتخاب کنید...</option>';
                    // device
                    $query = $this->db->select('*')->from('categories')->where(array(
                        'status' => 1,
                        'pId' => 4
                    ))->order_by('title', 'ASC')->get();

                    if($query->num_rows() > 0)
                    {
                        $query = $query->result_array();
                        $op .= '<optgroup label="دستگاه">';
                        for($i = 0; $i < count($query); $i++)
                        {
                            $op .= '<option value="' . $query[$i]['id'] . '">' . $query[$i]['title'] . '</option>';
                        }
                        $op .= '</optgroup>';
                    }

                    // kit
                    $query = $this->db->select('*')->from('categories')->where(array(
                        'status' => 1,
                        'pId' => 3
                    ))->order_by('title', 'ASC')->get();

                    if($query->num_rows() > 0)
                    {
                        $query = $query->result_array();
                        $op .= '<optgroup label="کیت">';
                        for($i = 0; $i < count($query); $i++)
                        {
                            $op .= '<option value="' . $query[$i]['id'] . '">' . $query[$i]['title'] . '</option>';
                        }
                        $op .= '</optgroup>';
                    }

                    // chemical
                    $query = $this->db->select('*')->from('categories')->where(array(
                        'status' => 1,
                        'pId' => 1
                    ))->order_by('title', 'ASC')->get();

                    if($query->num_rows() > 0)
                    {
                        $query = $query->result_array();
                        $op .= '<optgroup label="مواد شیمیایی">';
                        for($i = 0; $i < count($query); $i++)
                        {
                            $op .= '<option value="' . $query[$i]['id'] . '">' . $query[$i]['title'] . '</option>';
                        }
                        $op .= '</optgroup>';
                    }

                    // Consumable
                    $query = $this->db->select('*')->from('categories')->where(array(
                        'status' => 1,
                        'pId' => 2
                    ))->order_by('title', 'ASC')->get();

                    if($query->num_rows() > 0)
                    {
                        $query = $query->result_array();
                        $op .= '<optgroup label="مواد مصرفی">';
                        for($i = 0; $i < count($query); $i++)
                        {
                            $op .= '<option value="' . $query[$i]['id'] . '">' . $query[$i]['title'] . '</option>';
                        }
                        $op .= '</optgroup>';
                    }

                    echo $op;
                }
                else
                {
                    echo $op = 'option value="0" >انتخاب کنید...</option>';
                }

            }
        }

        public function addNewPro()
        {
            if( ! $this->user_auth_model->is_admin())
            {
                show_404();
            }
            else
            {
                $txtProName = $this->input->post('txtProName', TRUE, TRUE);
                $txtProCat = $this->input->post('txtProCat', TRUE, TRUE);
                $txtProPrice = $this->input->post('txtProPrice', TRUE, TRUE);
                $txtProCPrice = $this->input->post('txtProCPrice', TRUE, TRUE);
                $txtProDetail = $this->input->post('txtProDetail', TRUE, TRUE);

                $data = array(
                    'name' => $txtProName,
                    'price' => $txtProPrice,
                    'cPrice' => $txtProCPrice,
                    'detail' => $txtProDetail,
                    'categories' => $txtProCat,
                    'status' => 1
                );

                $this->db->insert('product', $data);

                if($this->db->affected_rows() > 0)
                {
                    $data['success'] = 1;
                }
                else
                {
                    $data['success'] = 2;
                }

                echo json_encode($data);

            }
        }

        public function deleteOnePro()
        {
            if( ! $this->user_auth_model->is_admin())
            {
                show_404();
            }
            else
            {
                $id = $this->input->post('delId', TRUE, TRUE);

                $data = array(
                    'status' => 12
                );

                $this->db->where('id', $id);
                $this->db->update('product', $data);

                if($this->db->affected_rows() > 0)
                {
                    $data['success'] = 1;
                }
                else
                {
                    $data['success'] = 2;
                }

                echo json_encode($data);

            }
        }

        public function deleteOneContact()
        {
            if( ! $this->user_auth_model->is_admin())
            {
                show_404();
            }
            else
            {
                $id = $this->input->post('delId', TRUE, TRUE);

                $data = array(
                    'status' => 12
                );

                $this->db->where('id', $id);
                $this->db->update('contact', $data);

                if($this->db->affected_rows() > 0)
                {
                    $data['success'] = 1;
                }
                else
                {
                    $data['success'] = 2;
                }

                echo json_encode($data);

            }
        }

        public function loadOnePro()
        {
            if( ! $this->user_auth_model->is_admin())
            {
                show_404();
            }
            else
            {
                $id = $this->input->post('pId', TRUE, TRUE);

                $query = $this->db->select('*')->from('product')->where('id', $id)->get();

                if($query->num_rows() > 0)
                {
                    $data['pro'] = $query->row_array();
                    $data['success'] = 1;
                }
                else
                {
                    $data['success'] = 2;
                }

                echo json_encode($data);

            }
        }

        public function productList()
        {
            if( ! $this->user_auth_model->is_admin())
            {
                show_404();
            }
            else
            {
                $cat = $this->input->post('cat', TRUE, TRUE);
                $page = $this->input->post('page', TRUE, TRUE);
                $num = ($page * 100) - 100;

                $query = $this->db->select()->from('product');
                if($cat > 0)
                {
                    $query->where(array(
                        'categories' => $cat,
                        'status' => 1
                    ));
                }
                else
                {
                    $query->where(array(
                        'status' => 1
                    ));
                }
                $query = $query->order_by('name', 'ASC')->limit(100, $num)->get();

                if($query->num_rows() > 0)
                {
                    $data['pro'] = $query->result_array();
                    $data['success'] = 1;

                    for($i = 0; $i < count($data['pro']); $i++)
                    {
                        $data['pro'][$i]['price'] = $data['pro'][$i]['price'] ?  number_format($data['pro'][$i]['price']) : '-';
                        $data['pro'][$i]['cPrice'] = $data['pro'][$i]['cPrice'] ? number_format($data['pro'][$i]['cPrice']) : '-';
                        $data['pro'][$i]['cat'] = $this->db->select('title')->from('categories')->where('id', $data['pro'][$i]['categories'])->get();
                        if($data['pro'][$i]['cat']->num_rows() > 0)
                        {
                            $data['pro'][$i]['cat'] = $data['pro'][$i]['cat']->row_array();
                            $data['pro'][$i]['cat'] = $data['pro'][$i]['cat']['title'];
                        }
                        else
                        {
                            $data['pro'][$i]['cat'] = '-';
                        }
                    }

                    $query = $this->db->select('id')->from('product');
                    if($cat > 0)
                    {
                        $query->where(array(
                            'categories' => $cat,
                            'status' => 1
                        ));
                    }
                    else
                    {
                        $query->where(array(
                            'status' => 1
                        ));
                    }
                    $query = $query->get();
                    $data['total'] = $query->num_rows();
                    $data['total'] = ceil($data['total'] / 100);

                }
                else
                {
                    $data['success'] = 2;
                    $data['total'] = 0;
                }

                echo json_encode($data);

            }
        }

        public function editOnePro()
        {
            if( ! $this->user_auth_model->is_admin())
            {
                show_404();
            }
            else
            {
                $txtProName = $this->input->post('name', TRUE, TRUE);
                $txtProCat = $this->input->post('cat', TRUE, TRUE);
                $txtProPrice = $this->input->post('price', TRUE, TRUE);
                $txtProCPrice = $this->input->post('cPrice', TRUE, TRUE);
                $txtProDetail = $this->input->post('detail', TRUE, TRUE);
                $id = $this->input->post('pId', TRUE, TRUE);

                $data = array(
                    'name' => $txtProName,
                    'price' => $txtProPrice,
                    'cPrice' => $txtProCPrice,
                    'detail' => $txtProDetail,
                    'categories' => $txtProCat,
                    'status' => 1
                );

                $this->db->where('id', $id);
                $this->db->update('product', $data);

                $data['success'] = 1;

                echo json_encode($data);

            }
        }

        public function setting()
        {
            if( ! $this->user_auth_model->is_admin())
            {
                show_404();
            }
            else
            {
                if($this->input->post('ld', TRUE, TRUE) == 1)
                {
                    $query = $this->db->select(array(
                            'site_title',
                            'address',
                            'tel',
                            'fax',
                            'site_email',
                            'admin_email',
                            'about_us'
                        ))->from('setting')->get();
                    if($query->num_rows() > 0)
                    {
                        $data['success'] = 1;
                        $data['setting'] = $query->row_array();
                    }
                    else
                    {
                        $data['success'] = 2;
                    }
                }
                else
                {
                    $data['success'] = 2;
                }

                echo json_encode($data);

            }
        }

        public function editSetting()
        {
            if( ! $this->user_auth_model->is_admin())
            {
                show_404();
            }
            else
            {
                $site = $this->input->post('site', TRUE, TRUE);
                $email = $this->input->post('email', TRUE, TRUE);
                $aEmail = $this->input->post('aEmail', TRUE, TRUE);
                $address = $this->input->post('address', TRUE, TRUE);
                $tel = $this->input->post('tel', TRUE, TRUE);
                $fax = $this->input->post('fax', TRUE, TRUE);
                $about = $this->input->post('about', TRUE, TRUE);
                $pass = $this->input->post('pass', TRUE, TRUE);
                $passV = $this->input->post('passV', TRUE, TRUE);

                $data = array(
                    'site_title' => $site,
                    'address' => $address,
                    'tel' => $tel,
                    'fax' => $fax,
                    'site_email' => $email,
                    'admin_email' => $aEmail,
                    'about_us' => $about
                );

                if(strlen($pass) > 5 AND $pass == $passV)
                {
                    $data['admin_pass'] = hashStr($pass);
                }

                $this->db->where('id', 1);
                $this->db->update('setting', $data);

                $data['success'] = 1;

                echo json_encode($data);

            }
        }

        public function contactList()
        {
            if( ! $this->user_auth_model->is_admin())
            {
                show_404();
            }
            else
            {
                if($this->input->post('ld', TRUE, TRUE) == 1)
                {
                    $query = $this->db->select(array(
                        'id',
                        'name',
                        'email',
                        'site',
                        'content',
                        'time'
                    ))->from('contact')->where('status <', 12)->order_by('id', 'DESC')->get();
                    if($query->num_rows() > 0)
                    {
                        $data['success'] = 1;
                        $data['contact'] = $query->result_array();
                        for($i = 0; $i < count($data['contact']); $i++)
                        {
                            $data['contact'][$i]['time'] = pdate('Y/m/d', $data['contact'][$i]['time']);
                        }
                    }
                    else
                    {
                        $data['success'] = 2;
                    }
                }
                else
                {
                    $data['success'] = 2;
                }

                echo json_encode($data);

            }
        }

        public function addNewCooperator()
        {
            if( ! $this->user_auth_model->is_admin())
            {
                show_404();
            }
            else
            {
                $txtCooName = $this->input->post('txtCooName', TRUE, TRUE);
                $txtCooTel = $this->input->post('txtCooTel', TRUE, TRUE);
                $txtCooMob = $this->input->post('txtCooMob', TRUE, TRUE);
                $txtCooEmail = $this->input->post('txtCooEmail', TRUE, TRUE);
                $txtCooAddress = $this->input->post('txtCooAddress', TRUE, TRUE);
                $txtCooPostal = $this->input->post('txtCooPostal', TRUE, TRUE);
                $txtCooUser = $this->input->post('txtCooUser', TRUE, TRUE);
                $txtCooPass = $this->input->post('txtCooPass', TRUE, TRUE);

                $data = array(
                    'name' => $txtCooName,
                    'tel' => $txtCooTel,
                    'mobile' => $txtCooMob,
                    'email' => $txtCooEmail,
                    'address' => $txtCooAddress,
                    'postalCode' => $txtCooPostal,
                    'username' => $txtCooUser,
                    'password' => hashStr($txtCooPass),
                    'lastOnline' => time(),
                    'status' => 1
                );

                $this->db->insert('cooperator', $data);

                if($this->db->affected_rows() > 0)
                {
                    $data['success'] = 1;
                }
                else
                {
                    $data['success'] = 2;
                }

                echo json_encode($data);

            }
        }

        public function cooperatorList()
        {
            if( ! $this->user_auth_model->is_admin())
            {
                show_404();
            }
            else
            {
                if($this->input->post('ld', TRUE, TRUE) == 1)
                {
                    $query = $this->db->select(array(
                        'id',
                        'name',
                        'tel',
                        'mobile',
                        'email',
                        'address',
                        'postalCode',
                        'username'
                    ))->from('cooperator')->where('status <', 12)->order_by('name', 'ASC')->get();
                    if($query->num_rows() > 0)
                    {
                        $data['success'] = 1;
                        $data['cooperator'] = $query->result_array();
                    }
                    else
                    {
                        $data['success'] = 2;
                    }
                }
                else
                {
                    $data['success'] = 2;
                }

                echo json_encode($data);

            }
        }

        public function deleteOneCooperator()
        {
            if( ! $this->user_auth_model->is_admin())
            {
                show_404();
            }
            else
            {
                $id = $this->input->post('delId', TRUE, TRUE);

                $data = array(
                    'status' => 12
                );

                $this->db->where('id', $id);
                $this->db->update('cooperator', $data);

                if($this->db->affected_rows() > 0)
                {
                    $data['success'] = 1;
                }
                else
                {
                    $data['success'] = 2;
                }

                echo json_encode($data);

            }
        }

        public function loadOneCooperator()
        {
            if( ! $this->user_auth_model->is_admin())
            {
                show_404();
            }
            else
            {
                $id = $this->input->post('cId', TRUE, TRUE);

                $query = $this->db->select('*')->from('cooperator')->where('id', $id)->get();

                if($query->num_rows() > 0)
                {
                    $data['cooperator'] = $query->row_array();
                    $data['success'] = 1;
                }
                else
                {
                    $data['success'] = 2;
                }

                echo json_encode($data);

            }
        }

        public function editOneCooperator()
        {
            if( ! $this->user_auth_model->is_admin())
            {
                show_404();
            }
            else
            {
                $txtCooNameEdit = $this->input->post('txtCooNameEdit', TRUE, TRUE);
                $txtCooTelEdit = $this->input->post('txtCooTelEdit', TRUE, TRUE);
                $txtCooMobEdit = $this->input->post('txtCooMobEdit', TRUE, TRUE);
                $txtCooEmailEdit = $this->input->post('txtCooEmailEdit', TRUE, TRUE);
                $txtCooAddressEdit = $this->input->post('txtCooAddressEdit', TRUE, TRUE);
                $txtCooPostalEdit = $this->input->post('txtCooPostalEdit', TRUE, TRUE);
                $txtCooPassEdit = $this->input->post('txtCooPassEdit', TRUE, TRUE);
                $id = $this->input->post('cId', TRUE, TRUE);

                $data = array(
                    'name' => $txtCooNameEdit,
                    'tel' => $txtCooTelEdit,
                    'mobile' => $txtCooMobEdit,
                    'email' => $txtCooEmailEdit,
                    'address' => $txtCooAddressEdit,
                    'postalCode' => $txtCooPostalEdit,
                    'status' => 1
                );

                if($txtCooPassEdit > 5)
                {
                    $data['password'] = hashStr($txtCooPassEdit);
                }

                $this->db->where('id', $id);
                $this->db->update('cooperator', $data);

                $data['success'] = 1;

                echo json_encode($data);

            }
        }

        public function sliderList()
        {
            if( ! $this->user_auth_model->is_admin())
            {
                show_404();
            }
            else
            {
                if($this->input->post('ld', TRUE, TRUE) == 1)
                {
                    $query = $this->db->select()->from('slider')->where('status', 1)->order_by('id', 'ASC')->get();
                    if($query->num_rows() > 0)
                    {
                        $data['success'] = 1;
                        $data['slider'] = $query->result_array();
                    }
                    else
                    {
                        $data['success'] = 2;
                    }
                }
                else
                {
                    $data['success'] = 2;
                }

                echo json_encode($data);

            }
        }

        public function deleteOneSlide()
        {
            if( ! $this->user_auth_model->is_admin())
            {
                show_404();
            }
            else
            {
                $id = $this->input->post('delId', TRUE, TRUE);

                $data = array(
                    'status' => 12
                );

                $this->db->where('id', $id);
                $this->db->update('slider', $data);

                if($this->db->affected_rows() > 0)
                {
                    $data['success'] = 1;
                }
                else
                {
                    $data['success'] = 2;
                }

                echo json_encode($data);

            }
        }

        public function addNewSlide()
        {
            if( ! $this->user_auth_model->is_admin())
            {
                show_404();
            }
            else
            {
                $addSlideFile = $this->input->post('addSlideFile', TRUE, TRUE);
                $addSlideTitle = $this->input->post('addSlideTitle', TRUE, TRUE);
                $addSlideLink = $this->input->post('addSlideLink', TRUE, TRUE);
                $dir = FCPATH . 'assets/images/upload/';
                $tDir = $dir . 'thumb/';

                if(is_file($dir . $addSlideFile))
                {
                    $config['image_library'] = 'gd2';
                    $config['source_image']	= $dir . $addSlideFile;
                    $config['create_thumb'] = TRUE;
                    $config['maintain_ratio'] = TRUE;
                    $config['width']	= 273;
                    $config['height']	= 179;
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();

                    $file = explode('.', $addSlideFile);
                    $file = $file[0] . '_thumb.' . $file[1];
                    rename($dir . $file, $tDir . $addSlideFile);

                    $data = array(
                        'title' => $addSlideTitle,
                        'picture' => $addSlideFile,
                        'link' => $addSlideLink,
                        'status' => 1
                    );

                    $this->db->insert('slider', $data);

                    if($this->db->affected_rows() > 0)
                    {
                        $dataL['success'] = 1;
                    }
                    else
                    {
                        $dataL['success'] = 2;
                    }
                }
                else
                {
                    $dataL['success'] = 2;
                }

                echo json_encode($dataL);

            }
        }
    }
