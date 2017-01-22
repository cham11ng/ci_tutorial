<?php

/**
 * Created by PhpStorm.
 * User: cham11ng
 * Date: 9/21/16
 * Time: 9:58 PM
 */
class Member extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('users_model', '', TRUE);
        $this->load->helper('form');
        $this->output->enable_profiler(TRUE);

    }

    public function sign_up() {
        //phpinfo();

        if($this->session->has_userdata('is_logged_in'))
            redirect('home');

        $data['title'] = 'Sign Up';
        $this->load->library('form_validation');

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

        $this->load->view('templates/header', $data);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('forms/sign_up', $data);
        }
        else {
            if ($this->users_model->register_user()) {
                $data['message'] = "Successfully Registered !";
            }
            else {
                $data['message'] = "Not Registered !";
            }
            $this->load->view('templates/unsuccess', $data);
        }

        $this->load->view('templates/footer', $data);
    }

    public function login() {
        if($this->session->has_userdata('is_logged_in'))
            redirect('home');

        $data['title'] = 'Login';
        $this->load->library('form_validation');

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

        $this->form_validation->set_rules(
            'password', 'Password',
            array('required',
                array(
                    'login_validate',                           // for error message
                    array($this->users_model, 'user_validate')  // calling user_validate method from users_model
                )
            ),
            array(
                'required'      => '{field} field empty.',
                'login_validate'=> 'Username or Password not matched.'
            )
        );

        $this->load->view('templates/header', $data);
        if ($this->form_validation->run('login') == FALSE) {
            $this->load->view('forms/login', $data);
        }
        else {
            $data['message'] = "You are Logged in !";
            $this->load->view('templates/unsuccess', $data);
        }

        $this->load->view('templates/footer', $data);
    }

    public function logout () {
        $this->session->unset_userdata('is_logged_in');
        redirect('home');
    }

}