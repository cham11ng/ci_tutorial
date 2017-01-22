<?php
class News extends CI_Controller {

    public function __construct() {
        parent::__construct();                      //  it calls the constructor of its parent class (CI_Controller)
        $this->load->helper('date');
        $this->load->model('news_model', '', TRUE); // TRUE connects database defined in config file
        $this->output->enable_profiler(TRUE);
    }

    public function index($page_number = 1) {
        $this->load->library('pagination');
        $total_rows = $this->news_model->total_article();
        $per_page = 3;

        if ($page_number>0) {
            $config['total_rows'] = $total_rows;
            $config['per_page'] = $per_page;
            $this->pagination->initialize($config);
            $data['page_links'] = $this->pagination->create_links();

            $this->benchmark->mark('getnews_start');
            $data['news'] = $this->news_model->get_some_article($per_page, ($page_number-1)*$per_page);

            if($data['news'] == NULL) {
                redirect('news/post');
            }
            $this->benchmark->mark('getnews_end');

            $data['title'] = 'News Archive';
            $this->load->helper('text');

            $data = $this->security->xss_clean($data);
            $this->load->view('templates/header', $data);
            $this->load->view('news/news_feed', $data);
            $this->load->view('templates/footer');
        }
        else
            echo show_404();
    }

    public function post() {
        $this->load->helper('form');                // available in this function only
        $this->load->library('form_validation');

        $data['title'] = 'Write news article';

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        $this->load->view('templates/header', $data);

        if ($this->form_validation->run('article') === FALSE) {
            $this->load->view('news/post');
        }
        else {
            $this->news_model->post_article();
            $data['message'] = "Successfully Posted !";
            $this->load->view('templates/success', $data);
        }

        $this->load->view('templates/footer');
    }

    public function view($slug = NULL) {
        $this->load->helper('form');                // available in this function only
        $data['title'] = 'News Archive';

        $data['news_item'] = $this->news_model->get_article($slug);

        if (empty($data['news_item'])) {
            show_404();
        }

        $data = $this->security->xss_clean($data);
        $this->load->view('templates/header', $data);
        $this->load->view('news/view', $data);
        $this->load->view('templates/footer');
    }

    public function modify($slug) {
        $this->load->helper('form');                // available in this function only
        $this->load->library('form_validation');

        $data['title'] = 'Edit Section';
        $data['news_item'] = $this->news_model->get_article($slug);

        $this->load->view('templates/header', $data);
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

        if ($this->form_validation->run('article') === FALSE) {
            $data = $this->security->xss_clean($data);
            $this->load->view('news/modify', $data);
        }
        else {
            $this->news_model->update_article();
            $data['message'] = "Successfully Edited !";
            $this->load->view('templates/success', $data);
        }

        $this->load->view('templates/footer');
    }
}