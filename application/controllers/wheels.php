<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Wheels extends CI_Controller {

    function __construct(){
        parent::__construct();
    }

	public function index() {

        $this->load->helper('url');
        $this->load->helper('pagination');
        $this->load->model('Wheel');

        $num_rows = $this->Wheel->get_count();
        $current_page = array(
            'page' => isset($_GET['page']) ? intval($_GET['page']) : get_default_page(),
            'limit' => isset($_GET['limit']) ? intval($_GET['limit']) : get_default_limit(),
            'skip' => isset($_GET['skip']) ? intval($_GET['skip']) : get_default_skip(),
            'num_rows' => $num_rows,
        );

        if (isset($_GET['submit'])) {
            $current_page = get_default_links() + $current_page;
        }

        $query_data = array(
            'name' => isset($_GET['name']) ? $_GET['name'] : '',
            'height' => isset($_GET['height']) ? $_GET['height'] : array(),
            'width' => isset($_GET['width']) ? $_GET['width'] : array(),
        ) + $current_page;

        $result = $this->Wheel->get_rows($query_data);

        $data['heights'] = $this->Wheel->get_heights();
        $data['widths'] = $this->Wheel->get_widths();
        $data['pagination_links'] = get_pagination_links($current_page);
        $data['query_data'] = $query_data;
        $data['wheels'] = $result;

        $this->load->view('header', $data);
        $this->load->view('index', $data);
        $this->load->view('footer', $data);
	}

	public function show($id) {
        // $w = new Wheel($id);

        // var_dump($w->stored);
	}
}

