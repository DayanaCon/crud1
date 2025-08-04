<?php 

class Admin_model extends CI_Model
   {

	function insertuser($data)
	{
	$this->db->insert('admins',$data);
	}
function checkPassword($email, $password)
{
    $this->db->select("
        admins.id as id,
        admins.email as email,
        admins.password as password,
        user_access.id as access_id,
        user_access.name as access_name");
    $this->db->from('crudci3112.admins as admins');
    $this->db->join('crudci3112.user_access as user_access','user_access.id = admins.user_access_id','left');
    $this->db->where('email' ,$email);
    $this->db->where('password' ,$password);
    $query=$this->db->get();
    return $query->row();
/*

    //$this->db->join('attachments.lists as attachment_lists','attachment_lists.'

    // Multiple database
    //$this->db->join('database.tablename')

    // default
    //$this->db->join('talbename')

    // not default database

   /*$variableName = $this->load->database('databaseName', TRUE);
    $variableName->action();
    $variableName->select('tablename.id as tbl_id, tablename1.i_id as tbl1_id, tablename2.i_id as tbl2_id');
    $variableName->from('tablename');
    $variableName->join('tablename1', 'tablename1.i_id = tablename.id', 'left);
    $variableName->join('tablename2,'tablename2.i_id = tablename.id,'left');*/
}

   }
function getUsers($id, $name)
    {
        $this->db->select('id','name');
        $this->db->from('user_access');
        $this->db->where('id', $id);
        $this->db->where('name', $name);
        $query = $this->db->get();
        return $query->row();
    }

//function query_data() {
   // $this->db->select();
  // $this->db->from('user_access');
  //  $this->db->where();
 //   $this->db->order_by()
  //  $query = $this->db->get();
  //  return $query->result();
  //  return $query->row();
//}
