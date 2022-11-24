<?php

class AuthModel extends CI_Model{


    public function insert_item($table,$data)
    {    
        
        return $this->db->insert($table, $data);
    }

    public function userLogin($data){ 

        $this->db->select('*');
        $this->db->from('user_table');

        $this->db->where($data);
        $query = $this->db->get();
        
        return $query->row_array();
    }

    public function getDatabyId($user_id)
    {
        $this->db->select('*');
        $this->db->from('user_table');
        $this->db->where('user_id',$user_id);

        $query = $this->db->get();
       
        return $query->row_array();
    }

    public function update($user_id,$data)
    {
        $this->db->where('user_id',$user_id);

       return $this->db->update('user_table', $data);    
        
    }
    
}
?>