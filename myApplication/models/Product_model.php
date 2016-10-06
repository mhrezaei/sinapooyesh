<?php
    class Product_model extends CI_Model 
    {

        public function __construct()
        {

        }

        public function is_categories($id)
        {
            $query = $this->db->select('*')->from('categories')->where(array(
                'id' => $id,
                'status' => 1
            ))->get();

            if($query->num_rows() > 0)
            {
                return $query->row_array();
                exit;
            }
            else
            {
                return FALSE;
                exit;
            }
        }

        public function have_child($pId)
        {
            $query = $this->db->select('*')->from('categories')->where(array(
                'pId' => $pId,
                'status' => 1
            ))->order_by('title', 'ASC')->get();

            if($query->num_rows() > 0)
            {
                return $query->result_array();
                exit;
            }
            else
            {
                return FALSE;
                exit;
            }
        }
        
        public function all_categories_product($pId, $status)
        {
            $query = $this->db->select('*')->from('product')->where(array(
            'categories' => $pId,
            'status' => $status
            ))->order_by('name', 'ASC')->get();
            
            if($query->num_rows() > 0)
            {
                return $query->result_array();
                exit;
            }
            else
            {
                return FALSE;
                exit;
            }
        }
        
        public function one_product($id)
        {
            $query = $this->db->select('*')->from('product')->where('id', $id)->get();
            if($query->num_rows() > 0)
            {
                return $query->row_array();
            }
            else
            {
                return FALSE;
            }
        }


    }

?>