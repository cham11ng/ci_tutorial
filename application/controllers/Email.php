<?php

/**
 * Created by PhpStorm.
 * User: cham11ng
 * Date: 9/25/16
 * Time: 12:49 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class Email Extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    function index() {
        $this->load->library('email');

        $this->email->from('raechams@live.com', 'Sagar Chamling');
        $this->email->to('sgr.raee@gmail.com');
        $this->email->cc('harmonyboymanis@gmail.com');
        $this->email->bcc('cmurae@gmail.com');

        $this->email->subject('Email Test');
        $this->email->message('Testing the email class.');

        if ( ! $this->email->send()) {
            echo "Mail Not Sent";
        }
    }
}