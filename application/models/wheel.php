<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Wheel extends CI_Model {
    function __construct() {
        parent::__construct();
    }

    static $default_data = array(
        'name' => '',
        'height' => array(),
        'width' => array(),
    );

    function get_rows($data) {
        $query = 'SELECT name, method, height, width, weight,
            MATCH (name) AGAINST ("' . $data['name'] . '")
            FROM wheels ';

        if ($data['height']) {
            $query .= 'WHERE height IN (' . implode(",", $data['height']) . ') ';
        }

        if ($data['width']) {
            $query .= $data['height'] ? 'AND' : 'WHERE';
            $query .= ' width IN (' . implode(",", $data['width']) . ') ';
        }

        $query .= 'ORDER BY 6 DESC 
            LIMIT ' . $data['skip'] . ', ' . $data['limit'] . ';';

        try {
            return $this->db->query($query)->result_array();
        } catch (Exception $e) {
            return array();
        }
    }

    function get_count() {
        $query = "SELECT COUNT(*) AS num_rows FROM wheels;";
        $result = $this->db->query($query)->row();
        return intval($result->num_rows);
    }

    function get_heights() {
        $query = $this->db->query('SELECT height FROM height ORDER BY height ASC');
        return array_map(function($row) {
            return $row['height'];
        }, $query->result_array());        
    }

    function get_widths() {
        $query = $this->db->query('SELECT width FROM width ORDER BY width ASC');
        return array_map(function($row) {
            return $row['width'];
        }, $query->result_array());        
    }
}
