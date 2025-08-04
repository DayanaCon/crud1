<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct()
	{
	 parent::__construct();
	// $this->load->model('admin_model');
	}
	public function index()
	{
		$this->load->view('home');
	}
	function registerNow()
	{
		if($_SERVER['REQUEST_METHOD']=='POST')
		{
			$this->form_validation->set_rules('username','User Name','required');
			$this->form_validation->set_rules('email','Email','required');
			$this->form_validation->set_rules('password','Password','required');

			if($this->form_validation->run()==TRUE)
			{
				$username = $this->input->post('username');
				$email = $this->input->post('email');
				$password = $this->input->post('password');

				$data = array(
					'username'=>$username,
					'email'=>$email,
					'password'=>sha1($password),
					'status'=>'1'
				);
				$this->load->model('admin_model');
				$this->admin_model->insertuser($data);
				$this->session->set_flashdata('success','Successfully User Created');
				redirect(base_url('admin/login'));
			}
		}
	}
	function login()
	{
		$this->load->view('login_page');
	}

	public function loginnow()
	{
		if($_SERVER['REQUEST_METHOD']=='POST')
		{
			$this->form_validation->set_rules('email','Email','required');
			$this->form_validation->set_rules('password','Password','required');

			if($this->form_validation->run()==TRUE)
			{
				$email = $this->input->post('email');
				$password = $this->input->post('password');
				$password = sha1($password);

			//	$this->load->model('admin_model');
				$status = $this->admin_model->checkPassword($email,$password);
				if($status!=false)
				{
					$email = $status->email;
					$password = $status->password;
					$user_access = $status->access_name;
					$access_id = $status->access_id;

					$session_data = array(
						'email'=>$email,
						'password' => $password,
						'user_access' => $user_access,
						'access_id' => $access_id,
					);
					$this->session->set_userdata($session_data);
					redirect(base_url('user/index'));
				}
				else
				{
					$this->session->set_flashdata('error','Email or Password is Wrong');
					redirect(base_url('admin/login'));
				}
			}
			else
			{
				$this->session->set_flashdata('error','Fill all the required fields');
				redirect(base_url('admin/login'));
			}
		}
	}
	function dashboard()
	{
	$this->load->view('dashboard');
	}
	function logout()
	{
		session_destroy();
		redirect(base_url('admin/login'));
	}

	  //function user_access_page()
     //  {
    // $this->load->model('admin_model');
    //	 $data['admin'] = $this->admin_model->getUsers();0
   // 	 $this->load->view('admin/user_access_page');
   //    } 

 function user_access_page()
    {  
        $this->load->view('user_access_page'); // out of the folder
}
}

