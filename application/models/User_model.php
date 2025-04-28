<?php 

class User_model extends CI_Model
{
// Insert a new user into the database
    function insertUser($data)
    {
// Insert the data into the 'users' table
        $this->db->insert('users',$data);
        if ($this->db->affected_rows() >= 0) {
            return true; 
        } else {
            return false; 
        }
    }

    function getUsers()
    {
        $query = $this->db->get('users');
        return $query->result_array();
    }
// Retrieve a single user based on the provided user ID
    function getUser($id)
    {
        $this->db->where('id',$id);
        $query=$this->db->get('users');
        return $query->row();
    }
 // Update an existing user's information
    function updateUser($data,$id)
    {
        $this->db->where('id',$id);
        $this->db->update('users',$data);
        if ($this->db->affected_rows() >= 0) {
            return true; 
        } else {
            return false; 
        }
    }
// Delete a user based on the provided user ID
    function deleteUser($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('users');
        if ($this->db->affected_rows() >= 0) 
        {
            return true; 
        } else {
            return false; 
        }
    }
}