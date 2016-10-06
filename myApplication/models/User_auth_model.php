<?php
    class User_auth_model extends CI_Model {

        public function __construct()
        {

        }

        public function userLogin($user, $pass, $status = 1)
        {
            $query = $this->db->select('id')->from('cooperator')->where(array(
                'username' => $user,
                'password' => $pass,
                'status' => $status
            ))->get();
            if($query->num_rows() > 0)
            {
                $query = $query->row_array();
                // update last login
                $data = array('lastOnline' => time());
                $this->db->where('id', $query['id']);
                $this->db->update('cooperator', $data);
                // set session data
                $data = array(
                    'uid' => $query['id'],
                    'role' => 'USER',
                    'auth' => hashStr($pass)
                );
                $this->session->set_userdata($data);

                if($this->session->userdata('errUserLogin'))
                {
                    $this->session->unset_userdata('errUserLogin');
                }

                return TRUE;
            }
            else
            {
                return FALSE;
            }
        }

        public function is_user()
        {
            if($this->session->userdata('uid'))
            {
                $uid = $this->session->userdata('uid');
                $role = $this->session->userdata('role');
                $auth = $this->session->userdata('auth');

                if($role == 'USER')
                {
                    $query = $this->db->select('*')->from('cooperator')->where(array(
                        'id' => $uid,
                        'status' => 1
                    ))->get();
                    if($query->num_rows() > 0)
                    {
                        $query = $query->row_array();
                        if(hashStr($query['password']) == $auth)
                        {
                            return $query;
                        }
                        else
                        {
                            $this->session->unset_userdata('uid');
                            $this->session->unset_userdata('role');
                            $this->session->unset_userdata('auth');
                            return FALSE;
                        }
                    }
                    else
                    {
                        $this->session->unset_userdata('uid');
                        $this->session->unset_userdata('role');
                        $this->session->unset_userdata('auth');
                        return FALSE;
                    }
                }
                else
                {
                    $this->session->unset_userdata('uid');
                    $this->session->unset_userdata('role');
                    $this->session->unset_userdata('auth');
                    return FALSE;
                }
            }
            else
            {
                return FALSE;
                exit;
            }
        }

        public function log_out()
        {
            $this->session->unset_userdata('uid');
            $this->session->unset_userdata('role');
            $this->session->unset_userdata('auth');
            return TRUE;
        }
        
        public function user_edit_data($id, $data)
        {
            $this->db->where('id', $id);
            $this->db->update('cooperator', $data);
            
            if($this->db->affected_rows() > 0)
            {
                return TRUE;
            }
            else
            {
                return FALSE;
            }
        }
        
        public function admin_login($user, $pass)
        {
            $query = $this->db->select('*')->from('setting')->where(array(
                'admin_email' => $user,
                'admin_pass' => hashStr($pass)
                ))->get();
            
            if($query->num_rows() > 0)
            {
                $query = $query->row_array();
                $data['admin'] = array(
                    'uid' => $query['id'],
                    'role' => 'ADMIN',
                    'auth' => hashStr(hashStr($pass))
                );
                $this->session->set_userdata($data);
                return TRUE;
                
            }
            else
            {
                return FALSE;
            }
        }
        
        public function is_admin()
        {
            if($this->session->userdata('admin'))
            {
                $ses = $this->session->userdata('admin');
                $uid = $ses['uid'];
                $role = $ses['role'];
                $auth = $ses['auth'];

                if($role == 'ADMIN')
                {
                    $query = $this->db->select('*')->from('setting')->where(array(
                        'id' => $uid
                    ))->get();
                    if($query->num_rows() > 0)
                    {
                        $query = $query->row_array();
                        if(hashStr($query['admin_pass']) == $auth)
                        {
                            return $query;
                        }
                        else
                        {
                            $this->session->unset_userdata('admin');
                            return FALSE;
                        }
                    }
                    else
                    {
                        $this->session->unset_userdata('admin');
                        return FALSE;
                    }
                }
                else
                {
                    $this->session->unset_userdata('admin');
                    return FALSE;
                }
            }
            else
            {
                return FALSE;
                exit;
            }
        }
}