<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function get_default_token() {
    return '0_20_0';
}

function unserialize_token($token) {
    $params = explode('_', $token);
    return array(
        'page' => $params[0],
        'limit' => $params[1],
        'skip' => $params[2],
    );
}
