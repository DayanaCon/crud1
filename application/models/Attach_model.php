<?php 

class Attach_model extends CI_Model
{
    public function __construct() {
        parent::__construct();
        // Load the other database and assign it
        $this->attachments_db = $this->load->database('attachments', TRUE);
    }

    public function get_all_users() {
        // Since crudci3112 is default, just use $this->db
        return $this->db->get('users')->result();
    }
    public function get_user_id_by_username($username) {
        $this->db->where('username', $username);
        $query = $this->db->get('users');
        if ($query->num_rows() > 0) {
            return $query->row()->id;
        }
        return null;
    }
    public function insertAttachment($data) {
        // Use the correct database connection ($this->attachments_db)
        // code by diana consulta
        return $this->attachments_db->insert('lists', $data);
    }
    public function attach_view()
    {
    $this->load->database('attachments', TRUE);
    $this->db->select("
        attachment_list.user_id as us_id,
        attachment_list.attachment_file as att_file,
        attachment_list.created_at as cre_at,
        attachment_list.created_by as cre_by,
        crud_user.username as urs_name,
        crud_user.address as adds");
    $this->db->from('attachments.lists as attachment_list');
    $this->db->join('crudci3112.users as crud_user','attachment_list.user_id = crud_user.id','left');
    $query = $this->db->get();
    return $query->result();
    }
    public function deleteUser($id)
    {
        $this->attachments_db->where('id', $id);
        $this->attachments_db->delete('lists');

        if ($this->attachments_db->affected_rows() >= 0) {
            return true;
        } else {
            return false;
        }
    }
}

