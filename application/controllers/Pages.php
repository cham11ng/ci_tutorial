<?php
class Pages extends CI_Controller {

    public function __construct() {
        // it calls the constructor of its parent class (CI_Controller)
        parent::__construct();
    }

    public function view($page = 'home') {
        if (! file_exists(APPPATH.'views/pages/'.$page.'.php')) {
            show_404();
        }

        $preferences = array(
            'start_day'         => 'sunday',
            'month_type'        => 'long',      // long|short
            'day_type'          => 'short',     // long|short|abr
            'show_other_days'    => TRUE,       // not of this month
            'show_next_prev'    => TRUE,
            'next_prev_url'     => 'home',
            'template'          => array(
                'table_open'            => "<table class='table table-bordered'>",
                'cal_cell_start_today'  => "<td class='success'>"
            )

        );
        $this->load->library('calendar', $preferences);

        $data = array(
            3   => site_url('news/article/2006/06/03/'),
            7   => site_url('news/article/2006/06/07/'),
            13  => site_url('news/article/2006/06/13/'),
            25  => site_url('news/article/2006/06/26/'),
        );

        $data['calender'] = $this->calendar->generate(2016, 9, $data, $this->uri->segment(2), $this->uri->segment(3));

        // Capitalize the first letter
        $data['title'] = ucfirst($page);

        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
    }
}