<?php
class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }


    // Function to Add a New User
    function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') 
        {
            $username = $this->input->post('username');
            $email = $this->input->post('email');
            $mobile = $this->input->post('mobile');
            $address = $this->input->post('address');
            $created_at = $this->input->post('created_at');
            $created_by = $this->input->post('created_by');

            $data = array(
                'username' => $username,
                'email' => $email,
                'mobile' => $mobile,
                'address' => $address,
                'created_at' => $created_at,
                'created_by' => $created_by,
            );
            
 // Validation if insert was successful
            $status =  $this->user_model->insertUser($data);
            if ($status == true) 
            {
                $this->session->set_flashdata('success', 'successfully Added');
                redirect(base_url('user/add'));
            } else 
            {
                $this->session->set_flashdata('error', 'Error');
                $this->load->view('user/add_user');
            }
        } else {
            $this->load->view('user/add_user');
        }
    }
    function index()
    {
        $data['users'] = $this->user_model->getUsers();
        $this->load->view('user/index', $data);
    } 

   // Function to update a data
    function edit($id)
{
  // Get the user data by ID
        $data['user'] = $this->user_model->getUser($id);
        $data['id'] = $id;

   if ($_SERVER['REQUEST_METHOD'] == 'POST')
 {
    $username    = $this->input->post('username');
    $email       = $this->input->post('email');
    $mobile      = $this->input->post('mobile');
    $address     = $this->input->post('address');
    $created_at  = $this->input->post('created_at'); 
    $created_by  = $this->input->post('created_by');

    $update_data = array(

        'username'    => $username,
        'email'       => $email,
        'mobile'      => $mobile,
        'address'     => $address,
        'created_at'  => $created_at,
        'created_by'  => $created_by,
    );

    $status = $this->user_model->updateUser($update_data, $id);
    if ($status) 
  {
        $this->session->set_flashdata('success', 'Successfully updated');
        redirect(base_url('user/edit/' . $id));
    } 
        else 
    {
        $this->session->set_flashdata('error', 'Update failed');
        $this->load->view('user/edit_user', $data);
}

    } 
    else 
    {
    $this->load->view('user/edit_user', $data);
 }
}
// Delete function: Deletes a user from the database
function delete($id)
    {
        if(is_numeric($id))
        {
            $status =$this->user_model->deleteUser($id);
            if ($status == true) {
                $this->session->set_flashdata('deleted', 'successfully Deleted');
                redirect(base_url('user/index/'));
            } else {
                $this->session->set_flashdata('error', 'Error');
                redirect(base_url('user/index/'));
      }
      
    }
}
}

