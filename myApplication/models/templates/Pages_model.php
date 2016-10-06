<?php
class Pages_model extends CI_Model {

    public function __construct()
    {
        
    }
    
    public function page_data($id)
    {
        $query = $this->db->select(array('id', 'title', 'content', 'update'))->from('pages')->where(array('id' => $id, 'status' => 1))->get();
        if($query->num_rows() > 0)
        {
            $query = $query->row_array();
            $query['update'] = pdate('Y/m/d', $query['update']);
            $query['content'] = htmlCoding($query['content'], 2);
        }
        else
        {
            $query = '';
            show_404();
        }
        return $query;
    }
}