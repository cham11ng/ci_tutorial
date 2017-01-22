<?php
/**
 * Created by PhpStorm.
 * User: cham11ng
 * Date: 9/27/16
 * Time: 11:44 PM
 */
class users_model extends CI_Model {
    public $username;
    public $password;
    public $email;

    public function __construct() {
        parent::__construct();
    }

    public function register_user() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        if ($this->db->table_exists('users')) {
            $this->username = $username;

            $hash = password_hash($password, PASSWORD_DEFAULT);
            $this->password = $hash;

            $this->email    = $this->input->post('email');
            return $this->db->insert('users', $this);
        }
        else {
            echo show_error('We have encountered some problem. Visit site later.', 500, 'Opps! Something went wrong');
        }
    }

    public function user_validate () {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $query = $this->db->get('users');
        foreach ($query->result() as $row) {
            if($username == $row->username) {
                if (password_verify($password, $row->password)) {
                    $user_session = array(
                        'username'  => $row->username,
                        'id'        => $row->user_id,
                        'logged_in' => TRUE
                    );
                    $this->session->set_userdata('is_logged_in', $user_session);
                    return TRUE;
                }
            }
        }

        return FALSE;
    }
}