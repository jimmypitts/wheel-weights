<?php

class Migrate extends CI_Controller {
    public function current() {
        $this->load->library('migration');
        if (!$this->migration->current()) {
            show_error($this->migration->error_string());
        }
        echo 'complete';
    }

    public function reset() {
        $this->load->library('migration');
        if (!$this->migration->version(0)) {
            show_error($this->migration->error_string());
        }
        echo 'complete';      
    }
}
