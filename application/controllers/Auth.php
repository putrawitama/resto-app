<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	/**
	 * Default method
	 */

	public function __construct()
	{
	    parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('allmodels');
        $this->load->library('session');
    }

    public function getUser()
    {
        if(!$this->session->userdata('logged_in')){
			redirect(base_url("login"));
		}
        $data = [
            'success' => $this->session->flashdata('success'),
            'user' => $this->allmodels->getAll('user')->result()
        ];

        return view('auth.user', $data);
    }
    
    public function loginForm()
    {
        $data = [
            'error' => $this->session->flashdata('error')
        ];
        return view('auth.login', $data);
    }

    public function postLogin()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->allmodels->getData('user', ['username' => $username])->row();

        if ($user == null) {
            $this->session->set_flashdata('error', 'User Tidak Terdaftar');
            redirect('login', 'refresh');
        }
        
        if (!(password_verify($password, $user->password))) {
            $this->session->set_flashdata('error', 'Password Salah');
            redirect('login', 'refresh');
        }

        if (!$user->status) {
            $this->session->set_flashdata('error', 'Akun diblokir');
            redirect('login', 'refresh');
        }

        if ($user->role) {
            $data = array(
                'name'  => $user->nama,
                'admin' => TRUE,
                'logged_in' => TRUE,
                'id' => $user->id
            );

            $this->session->set_userdata($data);
            redirect('admin' , 'refresh');
        } else {
            $data = array(
                'name'  => $user->nama,
                'admin' => FALSE,
                'logged_in' => TRUE,
                'id' => $user->id
            );
            $this->session->set_userdata($data);
            redirect('transaksi' , 'refresh');
        }
    }

    public function registerForm()
    {
        if(!$this->session->userdata('logged_in')){
			redirect(base_url("login"));
		}
        $data = [
            'error' => $this->session->flashdata('error')
        ];
        return view('auth.register', $data);
    }

    public function postRegister()
    {
        $this->load->library('form_validation');

        $rules = [
            [
                'field' => 'name',
                'label' => 'Name',
                'rules' => 'required'
            ],[
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'required|min_length[5]|max_length[12]|is_unique[user.username]|alpha_dash'
            ],[
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'trim|required|min_length[8]'
            ],[
                'field' => 'role',
                'label' => 'Lavel',
                'rules' => 'required'
            ]

        ];

        $this->form_validation->set_rules($rules);

        if (!$this->form_validation->run()){
            $this->session->set_flashdata('error', 'Inputan Tidak Valid');
            redirect('register', 'refresh');
        }

        $data = [
            'username' => $this->input->post('username'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'nama' => $this->input->post('name'),
            'role' => $this->input->post('role')
        ];

        $this->allmodels->storeData('user', $data);

        $this->session->set_flashdata('success', 'User Berhasil Dibuat');
        redirect('admin/user' , 'refresh');
    }

    public function getChangePassword()
    {
        if(!$this->session->userdata('logged_in')){
			redirect(base_url("login"));
        }
        
        $data = [
            'user' => $this->allmodels->getData('user', ['id' => $this->session->userdata('id')])->row(),
            'error' => $this->session->flashdata('error')
        ];

        return view('auth.password', $data);
    }

    public function postChangePassword($id)
    {
        $user = $this->allmodels->getData('user', ['id' => $id])->row();
        $role = $this->session->userdata('admin');
        $this->load->library('form_validation');

        $rules = [
            [
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'trim|required|min_length[8]'
            ],[
                'field' => 'passconf',
                'label' => 'Password Confirmation',
                'rules' => 'required'
            ]

        ];

        $this->form_validation->set_rules($rules);

        if ((!$this->form_validation->run()) || ($this->input->post('passconf') != $this->input->post('password'))){
            $this->session->set_flashdata('error', 'Inputan Tidak Valid');
            redirect('change-password', 'refresh');
        }

        $data = [
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
        ];

        $this->allmodels->updateData('user', ['id' => $user->id], $data);

        if(!$role) {
            $this->session->set_flashdata('success', 'Password berhasil di ubah');
			redirect('waitress', 'refresh');
		} else {
            $this->session->set_flashdata('success', 'Password berhasil di ubah');
            redirect('admin', 'refresh');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
		redirect(base_url('login'));
    }

    public function changeStatus($id)
    {
        $user = $this->allmodels->getData('user', ['id' => $id])->row();

        if ($user == null) {
            show_404();
        }

        if ($user->status) {
            $this->allmodels->updateData('user', ['id' => $id], ['status'=>0]);
        } else {
            $this->allmodels->updateData('user', ['id' => $id], ['status'=>1]);
        }

        redirect('admin/user', 'refresh');
    }
}
