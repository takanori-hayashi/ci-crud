<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('users_model');

        $this->form_validation->set_error_delimiters('<div class="uk-alert-danger uk-alert"><p>', '</p></div>');
        $this->form_validation->set_rules(
            'name',
            'ユーザー名',
            'required',
            ['required' => 'ユーザー名を入力してください']
        );

        $this->form_validation->set_rules(
            'email',
            'メールアドレス',
            'required|valid_email',
            [
              'required' => 'メールアドレスを入力してください',
              'valid_email' => 'メールアドレスの形式が正しくありません'
            ]
        );
    }
	
    public function index()
    {
        $data['users'] = $this->users_model->get_users();
      
        $this->load->view('layout/header');
        $this->load->view('users/index', $data);
        $this->load->view('layout/footer');
    }

    public function show(int $id)
    {   
        $data['user'] = $this->users_model->get_user($id);

        $this->load->view('layout/header');
        $this->load->view('users/show', $data);
        $this->load->view('layout/footer');
    }

    public function create()
    {   

        if ($this->form_validation->run() === false) {
            $this->load->view('layout/header');
            $this->load->view('users/create');
            $this->load->view('layout/footer');
        } else {
            $user = [
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
            ];
            $this->users_model->create($user);
            $this->session->set_flashdata('create', '新規ユーザーを作成しました');
            redirect('/');
        }

    }

    public function edit($id)
    {
        $data['user'] = $this->users_model->get_user($id);
        $this->load->view('layout/header');
        $this->load->view('users/edit', $data);
        $this->load->view('layout/footer');
    }

    public function update()
    {   
        if ($this->form_validation->run() === false) {
            $data['user'] = (object) $this->input->post();
            $this->load->view('layout/header');
            $this->load->view('users/edit', $data);
            $this->load->view('layout/footer');
        } else {
            $user = $this->input->post(['id', 'name', 'email', 'age', 'memo']);
            $this->users_model->update($user);
            $this->session->set_flashdata('update', '保存しました');
            redirect('/users/show/' . $user['id']);
        }
    }

    public function delete($id)
    {
        $this->users_model->delete($id);
        $this->session->set_flashdata('delete', 'ユーザーを削除しました');
        redirect('/');
    }
}
