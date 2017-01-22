<?php

/**
 * Created by PhpStorm.
 * User: cham11ng
 * Date: 9/25/16
 * Time: 2:32 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Image_manipulate extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        $config = array(
            'image_library'     => 'ImageMagick',
            'source_image'      => '/ci_tutorial/uploads/profile.jpg',
            'create_thumb'      => TRUE,
            'maintain_ratio'    => TRUE,
            'width'             => 75,
            'height'            => 50
        );
        $this->load->library('image_lib', $config);

        if ( ! $this->image_lib->resize()) {
            echo $this->image_lib->display_errors('<div class="alert alert-danger">', '</div>');
        }
    }
}

