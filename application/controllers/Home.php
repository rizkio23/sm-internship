<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	private $user;

	public function __construct(){
		parent::__construct();

		$this->user = $this->session->userdata('user');
	}

	public function index()
	{
		#--------------------------------------------------------
		# Diarahkan ke tampilan halaman utama atau HOME
		#-------------------------------------------------------
		$this->load->model('Mbidang');
		$data['cap'] = $this->captcha(230,30);
		$data['bidang']	= $this->Mbidang->get_data();
		$this->load->view('home/vhome', $data);
	}

	#--------------------------------------------------------
	# METHOD LOGIN
	# berfungsi untuk memanggil halaman LOGIN
	#-------------------------------------------------------
	public function login()
	{
		#--------------------------------------------------------
		# Pengecekan jika SUDAH LOGIN maka akan diarahkan ke 
		# HALAMAN DASHBOARD
		#-------------------------------------------------------
		if ($this->isLogin())
		{
		redirect(base_url().'auth');
		}

		
		else
		#--------------------------------------------------------
		# Pengecekan jika BELUM LOGIN maka akan diarahkan ke 
		# HALAMAN LOGIN
		#-------------------------------------------------------
		{
		$data['cap'] = $this->captcha(300);
		$this->load->view('home/vlogin-Admin', $data);
        $ref = $this->input->get('ref');
		}
	}

	#--------------------------------------------------------
	# METHOD SIGNUP
	# berfungsi untuk memanggil halaman SIGN UP
	#-------------------------------------------------------
	public function signup()
	{
		#-----------------------------------------------------------------
		# Meload data dari model Mmember
		# Menampilkan captcha dan data dari 'tb_bagian' dan 'tb_jenis' 
		# yang ditampung dalam ARRAY $data 
		#-----------------------------------------------------------------
		$this->load->model('Mmember');
		$data['cap'] 	= $this->captcha();
		$data['jenis']	= $this->Mmember->get(array('tabel'=>'tb_jenis'))->result();
		$data['bidang']	= $this->Mmember->get(array('tabel'=>'tb_bidang', 'where'=>array('status'=>'1')))->result();

		#-----------------------------------------------------------------
		# Menampilkan halaman SIGN UP 
		#-----------------------------------------------------------------
		$this->load->view('home/vsignup',$data);
	}


	#--------------------------------------------------------
	# METHOD SIGNUP
	# berfungsi untuk memanggil dan menampilkan FORM
	#-------------------------------------------------------
	public function form()
	{

		$this->load->view('form');
	}
}

?>