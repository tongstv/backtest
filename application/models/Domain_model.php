<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Domain_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get domains by id
     */
    function get_domains($id)
    {
        return $this->db->get_where('tb_domains',array('id'=>$id))->row_array();
    }
        
    /*
     * Get all domains
     */
    function get_all_domains()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get('tb_domains')->result_array();
    }
        
    /*
     * function to add new domains
     */
    function add_domains($params)
    {
        $this->db->insert('tb_domains',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update domains
     */
    function update_domains($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('tb_domains',$params);
    }
    
    /*
     * function to delete domains
     */
    function delete_domains($id)
    {
        return $this->db->delete('tb_domains',array('id'=>$id));
    }
}
