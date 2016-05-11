<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Memail extends MY_Model {

    private $user;

	public function __construct()
    {
        parent::__construct();
        $this->user = $this->session->userdata('user');
    }

    
}

?>