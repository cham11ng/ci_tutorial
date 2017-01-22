<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controls extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //$this->load->library('dataclass');
    }

    //CodeIgniter permits you to override this behavior through the use of the _remap()
    public function _remap($method) {
        if($method === "nokia" || $method === "samsung")
            $this->$method();
        else
            $this->not_available();
    }

    public function not_available(){
        $data = array( // dynamic view
            'title' => 'Sorry, Page Not Found',
            'content' => 'You are Remapped | Available section <a href="nokia">Nokia</a> And <a href="samsung">Samsung</a>'
        );
        //$this->_print(); // private function call

        //$data = new Dataclass('Sorry, Page Not Found', 'You are Remapped');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/content', $data);
        $this->load->view('templates/footer');
    }

    public function nokia() {
        $data['title'] = 'Nokia Section';

        // it returns data as a string rather than sending it to your browser
        $string = $this->load->view('templates/header', $data, TRUE);
        echo $string;
        $this->load->view('templates/footer');

    }

    public function samsung() {
        $data['title'] = 'Samsung Section';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/footer');
    }

    //Prefixing method names with an underscore will also prevent them from being called.
    private function _print() {
        echo "cham11ng printed";
        //echo show_error("Sorry, Server Down");
        //echo show_404();
        $some_var = '';
        if ($some_var == '') {
            log_message('error', 'Some variable did not contain a value.');
        }
        else {
            log_message('debug', 'Some variable was correctly set');
        }

        log_message('info', 'The purpose of some variable is to provide some value.');
    }

    /*
    // Not Overided
    public function show_404() {
        echo "show_404() function Overided";
    }*/

}