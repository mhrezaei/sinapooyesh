<?php
class Header_model extends CI_Model {

    public function __construct()
    {
        
    }
    
    public function header_data()
    {
        $query = $this->db->select('*')->from('setting')->get();
        if($query->num_rows() > 0)
        {
            $query = $query->row_array();
        }
        else
        {
            $query = '';
        }
        return $query;
    }
    
    public function slider_data()
    {
        $query = $this->db->select('*')->from('slider')->where('status', 1)->get();
        
        if($query->num_rows() > 0)
        {
            $result['slider'] = $query->result_array();
        }
        else
        {
            $result['slider'] = FALSE;
        }
        
        return $result;
    }
}