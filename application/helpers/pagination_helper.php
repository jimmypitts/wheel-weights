<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function get_default_page() {
    return 1;
}

function get_default_skip() {
    return 0;
}

function get_default_limit() {
    return 20;
}

function get_default_links() {
    return array(
        'page'  => get_default_page(),
        'limit' => get_default_limit(),
        'skip'  => get_default_skip(),
    );
}

function get_pagination_links($data) {
    return array(
        'first' => get_first_link($data),
        'prev'  => get_prev_link($data),
        'next'  => get_next_link($data),
        'last'  => get_last_link($data),
    );
}

function get_first_link($data) {
    if ($data['skip'] == 0) {
        return NULL;
    }

    return array(
        'page'  => get_default_page(),
        'limit' => get_default_limit(),
        'skip'  => get_default_skip(),
    );
}

function get_prev_link($data) {
    if ($data['skip'] == 0) {
        return NULL;
    }

    $data['page'] -= 1;
    if ($data['page'] < 1) {
        $data['page'] = 1;
    }

    $data['skip'] -= $data['limit'];
    if ($data['skip'] < 0) {
        $data['skip'] = 0;
    }

    return array(
        'page'  => $data['page'],
        'limit' => $data['limit'],
        'skip'  => $data['skip'],
    );
}

function get_next_link($data) {
    $data['skip'] += $data['limit'];
    if ($data['skip'] >= $data['num_rows']) {
        return NULL;
    }

    $data['page'] += 1;
    return array(
        'page'  => $data['page'],
        'limit' => $data['limit'],
        'skip'  => $data['skip'],
    );    
}

function get_last_link($data) {
    if ($data['skip'] >= $data['num_rows'] - $data['limit']) {
        return NULL;
    }

    return array(
        'page'  => (int)(($data['num_rows'] - $data['limit']) / $data['limit']),
        'limit' => $data['limit'],
        'skip'  => ($data['num_rows'] - $data['limit']),
    );        
}
