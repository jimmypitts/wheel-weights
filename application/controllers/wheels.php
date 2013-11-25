<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Wheels extends CI_Controller {

	public function index() {
        $this->load->database();
        $this->load->helper('pagination');

        $query = $this->db->query('SELECT height FROM height ORDER BY height ASC');
        $data['heights'] = array_map(function($row) {
            return $row['height'];
        }, $query->result_array());

        $query = $this->db->query('SELECT width FROM width ORDER BY width ASC');
        $data['widths'] = array_map(function($row) {
            return $row['width'];
        }, $query->result_array());

        $name = isset($_GET['name']) ? $_GET['name'] : '';
        $height = isset($_GET['height']) ? $_GET['height'] : 0;
        $width = isset($_GET['width']) ? $_GET['width'] : 0;

        $token = isset($_GET['token']) ? $_GET['token'] : get_default_token();
        $token_params = unserialize_token($token);

        var_dump($token_params);

        $query = 'SELECT name, method, height, width, weight,
            MATCH (name) AGAINST ("' . $name . '")
            FROM wheels ';

        if ($height) {
            $query .= 'WHERE height IN (' . implode(",", $height) . ') ';
        }

        if ($width) {
            $query .= $height ? 'AND' : 'WHERE';
            $query .= ' width IN (' . implode(",", $width) . ') ';
        }

        $query .= 'ORDER BY 5 DESC 
            LIMIT ' . ($token_params['page'] * $token_params['skip']) . ', ' . $token_params['limit'] . ';';

        $data['selected_heights'] = $height;
        $data['selected_widths'] = $width;
        $data['token_params'] = $token_params;

        $query = $this->db->query($query);
        $result = $query->result_array();

        var_dump($result);


        $this->load->view('index', $data);
	}

	public function show($id) {
        // $w = new Wheel($id);

        // var_dump($w->stored);
	}
}

