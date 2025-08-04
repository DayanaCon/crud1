<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Attach extends CI_Controller

{
    public function create_view() {
        $data['users'] = $this->attach_model->get_all_users();
        $this->load->view('attachment_list/create', $data);
    }

    public function create_() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username       = $this->input->post('username');
            $user_id        = $this->attach_model->get_user_id_by_username($username);
            $attachment_name = $this->input->post('attachment_name');
            $created_at      = $this->input->post('created_at');
            $created_by      = $this->input->post('created_by');
            $processed_by    = $this->input->post('processed_by');
            $processed_date  = $this->input->post('processed_date');

            $config['upload_path']   = './uploads/';
            $config['allowed_types'] = 'pdf|doc|docx|txt';
            $config['max_size']      = 2048;
            $this->load->library('upload', $config);
            $attachment_file = '';

            if (!empty($_FILES['attachment_file']['name'])) {
                if (!$this->upload->do_upload('attachment_file')) {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    return redirect('attach/create');
                } else {
                    $uploadData = $this->upload->data();
                    $attachment_file = $uploadData['file_name'];
                }
            }

            $data = array(
                'user_id'          => $user_id,
                'attachment_name'  => $attachment_name,
                'created_at'       => $created_at,
                'created_by'       => $created_by,
                'processed_by'     => $processed_by,
                'processed_date'   => $processed_date,
                'attachment_file'  => $attachment_file
            );

            if ($this->attach_model->insertAttachment($data)) {
                $this->session->set_flashdata('success', 'Successfully Added');
                redirect('attach/view_page');
            } else {
                $this->session->set_flashdata('error', 'Error adding record');
                redirect('attach/create');
            }
        } else {
            redirect('attach/create');
        }
     }
     
    public function view_page() 
        {
        $data['lists'] = $this->attach_model->attach_view();
            if (!empty($data['lists'])) {
                $data['lists'][0]->us_id;
                $data['lists'][0]->att_file  ;
                $data['lists'][0]->cre_at;
                $data['lists'][0]->cre_by;
                $data['lists'][0]->urs_name;
                $data['lists'][0]->adds;
            } else {
                 "No attachments found.";
            }
            $this->load->view('attachment_list/view', $data);
    }

    public function delete($id)
{
    if (!is_numeric($id)) {
        show_error('Invalid ID');
        return;
    }

    $status = $this->attach_model->deleteUser($id);

    if ($status) {
        $this->session->set_flashdata('deleted', 'Successfully deleted.');
    } else {
        $this->session->set_flashdata('error', 'Failed to delete the record.');
    }
    redirect(site_url('attach/view_page/'));
}
    }
   

 
    


            



