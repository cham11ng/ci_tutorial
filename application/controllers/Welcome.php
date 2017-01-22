<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->output->cache(2); // 2 is minute
        $this->load->helper('date');
    }

    public function index() {
        $datestring = 'Year: %Y Month: %M Day: %d - %h:%i %a';
        $data['date'] = time().' '.mdate($datestring, time('Asia/Kathmandu'));

        if(function_exists('eval'))
            echo "TRUE";
        else
            echo "False";

        $data['title'] = 'Home Page';
        $this->load->view('templates/header', $data);
        $this->load->view('index_page');
        $this->load->view('templates/footer');

        //$this->load->library('encryption');
        //$data['key'] = $this->encryption->create_key(16);
        //$data['key'] = bin2hex($this->encryption->create_key(16));
	}

}
