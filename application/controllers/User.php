<?php
class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }
    // Function to Add a New User
    public function add()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') 
    {
        $username    = $this->input->post('username');
        $email       = $this->input->post('email');
        $mobile      = $this->input->post('mobile');
        $address     = $this->input->post('address');
        $created_at  = $this->input->post('created_at');
        $created_by  = $this->input->post('created_by');

        // Set common upload config
        $config['upload_path'] = './uploads/';
        $config['max_size'] = 2048; 
        $this->load->library('upload');
        
        $photo = '';
        if (!empty($_FILES['photo']['name'])) {
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('photo')) {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                return $this->load->view('user/add_user');
            } else {
                $uploadData = $this->upload->data();
                $photo = $uploadData['file_name'];
            }
        }
        $attachment = '';
        if (!empty($_FILES['attachment']['name'])) {
            $config['allowed_types'] = 'pdf|doc|docx';
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('attachment')) {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                return $this->load->view('user/add_user');
            } else {
                $uploadData = $this->upload->data();
                $attachment = $uploadData['file_name'];
            }
        }
        $data = array(

            'username'    => $username,
            'email'       => $email,
            'mobile'      => $mobile,
            'address'     => $address,
            'created_at'  => $created_at,
            'created_by'  => $created_by,
            'photo'       => $photo,
            'attachment'  => $attachment
        );

        $status = $this->user_model->insertUser($data);
        if ($status === true) {
            $this->session->set_flashdata('success', 'Successfully Added');
            redirect(base_url('user/index'));
        } else {
            $this->session->set_flashdata('error', 'Error adding user');
            $this->load->view('user/add_user');
        }
        } else {
        $this->load->view('user/add_user');
    }
}
    // Resume Download
    public function download($filename) {
        $filePath = FCPATH . 'uploads/' . $filename;

        if (file_exists($filePath)) {
            force_download($filePath, NULL);
        } else {
            $this->session->set_flashdata('error', 'Resume not found.');
            redirect('user/index');
        }
    }
   public function index()
    {
        $data['users'] = $this->user_model->getUsers();
        $data['expiring_vehicles'] = $this->user_model->get_vehicles_expiring_soon();

        //echo "<pre>";
     //   print_r($data['expiring_vehicles']);
       // echo "</pre>";


        $this->load->view('user/index', $data);
    }  
  // Function to update a data

   public function edit($id)
   {
       // Get the existing user data
       $data['user'] = $this->user_model->getUser($id);
       $data['id'] = $id;
   
    if ($_SERVER['REQUEST_METHOD'] == 'POST') 
      {     
    $user_id     = $this->input->post('user_id');
    $username    = $this->input->post('username');
    $email       = $this->input->post('email');
    $mobile      = $this->input->post('mobile');
    $address     = $this->input->post('address');
    $created_at  = $this->input->post('created_at'); 
    $created_by  = $this->input->post('created_by');

    $config['upload_path']   = './uploads/';
    $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|doc|docx';
    $config['max_size']      = 2048;

    $this->load->library('upload', $config);

    // Default to old photo and resume
    $photo = $data['user']->photo;
    $attachment = $data['user']->attachment;

    // Upload new photo if provided
    if (!empty($_FILES['photo']['name'])) {
        $config['file_name'] = time() . '_photo_' . $_FILES['photo']['name'];
        $this->upload->initialize($config);
        if ($this->upload->do_upload('photo')) {
            $uploadData = $this->upload->data();
            $photo = $uploadData['file_name'];

     // Delete old photo
            if (!empty($data['user']->photo) && file_exists('./uploads/' . $data['user']->photo)) {
                unlink('./uploads/' . $data['user']->photo);
            }
        } else {
            $this->session->set_flashdata('error', $this->upload->display_errors());
            return $this->load->view('user/edit_user', $data);
        }
    }

    // Upload new resume if provided
    if (!empty($_FILES['attachment']['name'])) {
        $config['file_name'] = time() . '_attachment_' . $_FILES['attachment']['name'];
        $this->upload->initialize($config);
        if ($this->upload->do_upload('attachment')) {
            $uploadData = $this->upload->data();
            $attachment = $uploadData['file_name'];

    // Delete old resume attachment
        if (!empty($data['user']->attachment) && file_exists('./uploads/' . $data['user']->attachment)) {
                unlink('./uploads/' . $data['user']->attachment);
            }
        } else {
            $this->session->set_flashdata('error', $this->upload->display_errors());
            return $this->load->view('user/edit_user', $data);
        }
    }
    $update_data = array(

        'user_id'    => $user_id,
        'username'    => $username,
        'email'       => $email,
        'mobile'      => $mobile,
        'address'     => $address,
        'created_at'  => $created_at,
        'created_by'  => $created_by,
        'photo'       => $photo,
        'attachment'  => $attachment
    );

    $status = $this->user_model->updateUser($update_data, $id);
    if ($status) {
        $this->session->set_flashdata('success', 'Successfully updated');
        redirect(base_url('user/index'));
    } else {
        $this->session->set_flashdata('error', 'Update failed');
        $this->load->view('user/edit_user', $data);
    }

} else {
    $this->load->view('user/edit_user', $data);
}
   }
// Delete function: Deletes a user from the database

 public function delete($id)
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

