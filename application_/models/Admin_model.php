<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model{
    function adminListing(){
        $this->db->select('*');
        $this->db->from('admin');
        $query = $this->db->get();
        $user = $query->result();
		
        return $user;
    }
	
    function getUserRoles(){
        $this->db->select('ID, role');
        $this->db->from('role');
        $this->db->where('ID !=', 1);
        $query = $this->db->get();

        return $query->result();
    }
	
    function addNewUser($userInfo){
        $this->db->trans_start();
        $this->db->insert('user', $userInfo);
        $insert_id = $this->db->insert_id();

        $this->db->trans_complete();
        return $insert_id;
    }
}