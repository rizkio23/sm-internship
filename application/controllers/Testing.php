<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testing extends MY_Controller {

	private $user;

	public function __construct(){
		parent::__construct();

		$this->user = $this->session->userdata('user');
	}

	public function index(){
		$this->load->view('home/vhome');
	}

	public function mytest()
	{
		$this->load->view('example/head');
		$this->load->view('example/side');
		$this->load->view('dashboard/vmenu-penilaian-detail');
		$this->load->view('example/foot');
	}


}
?>
