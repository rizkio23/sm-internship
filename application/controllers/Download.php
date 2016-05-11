<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Download extends MY_Controller 
{
	#----------------------------------------------------------------------------
	# ATRIBUT
	#----------------------------------------------------------------------------
	# * USER
	# 	Berisi data-data USER yang diambil dari SESSION
	#----------------------------------------------------------------------------
	private $user;


	#----------------------------------------------------------------------------
	# KONSTRUKTOR
	#----------------------------------------------------------------------------
	# Deklarasi ATTRIBUT
	#----------------------------------------------------------------------------
	public function __construct()
	{
		parent::__construct();

		$this->user = $this->session->userdata('user');
		$this->load->helper('download');
	}

	# ----------------------------------------------------------------------------
	# KONSTRUKTOR
	# ----------------------------------------------------------------------------
	# Deklarasi ATTRIBUT
	# ----------------------------------------------------------------------------
	public function _remap($method, $param = array())
	{

		#--------------------------------------------------------------------------
		# Pengecekan Untuk Mengambil list menu dari SESSION
		# List ini kemudian akan diparsing kedalam VIEW sidebar	
		#--------------------------------------------------------------------------
		if (method_exists($this, $method) && $method != 'index') 
		{

		#--------------------------------------------------------------------------
		# Melakukan Pengecekan apakah user sudah login 
		#--------------------------------------------------------------------------
		if ($this->isLogin())
		{

		return call_user_func_array(array($this, $method), $param);
		
		}

		else
		#--------------------------------------------------------------------------
		# Jika belum login maka akan diarahkan ke halaman LOGIN
		#--------------------------------------------------------------------------
		{
		redirect(base_url().'home/login');
		}
		}

		else
		#--------------------------------------------------------------------------
		# Pengecekan pengambilan list menu tidak sesuai SESSION
		#--------------------------------------------------------------------------
		{
		$this->index();
		}
	}


	# ----------------------------------------------------------------------------
	# USER
	# ----------------------------------------------------------------------------
	# Berfungsi untuk proses pengambilan data file untuk user dari database
	# ----------------------------------------------------------------------------
	public function user($file=NULL)
	{

		# ----------------------------------------------------------------------------
		# Pengecekan GET TERKIRIM dan DATA REFERENSI TIDAK KOSONG
		# ----------------------------------------------------------------------------
		if (!empty($_GET) && password_verify(date('dmYh'), $_GET['ref'])) 
		{

		# ----------------------------------------------------------------------------
		# Pengecekan jika FILE TIDAK KOSONG
		# ----------------------------------------------------------------------------
		if (isset($file) && !empty($file) && $file !== NULL)
		{
		# ----------------------------------------------------------------------------
		# Proses download
		# ----------------------------------------------------------------------------
		force_download('./Documents/'.$this->user['id'].'/'.$file, NULL);
		}

		else
		# ----------------------------------------------------------------------------
		# Pengecekan jika FILE KOSONG
		# Menampilkan pesan ERROR
		# ----------------------------------------------------------------------------
		{
		show_404();
		}
		}

		else
		# ----------------------------------------------------------------------------
		# Pengecekan GET ILLEGAL dan DATA REFERENSI KOSONG
		# Menampilkan PESAN ERROR
		# ----------------------------------------------------------------------------
		{
		show_404();
		}
	}

	public function proposal($id)
	{

		# ----------------------------------------------------------------------------
		# Pengecekan GET TERKIRIM dan DATA REFERENSI TIDAK KOSONG
		# ----------------------------------------------------------------------------
		if (!empty($_GET) && password_verify(date('dmYh'), $_GET['ref'])) 
		{

		# ----------------------------------------------------------------------------
		# Pengecekan jika FILE TIDAK KOSONG
		# ----------------------------------------------------------------------------
		force_download('./Documents/'.$id.'/'.$id.'_Proposal_magang.pdf', NULL);
		}

		else
		# ----------------------------------------------------------------------------
		# Pengecekan GET ILLEGAL dan DATA REFERENSI KOSONG
		# Menampilkan PESAN ERROR
		# ----------------------------------------------------------------------------
		{
		show_404();
		}
	}

	public function dokumen()
	{
		# ----------------------------------------------------------------------------
		# Pengecekan GET TERKIRIM dan DATA REFERENSI TIDAK KOSONG
		# ----------------------------------------------------------------------------
		if (! empty($_GET) && ! empty($_GET['fname']) && password_verify(date('dmYh'), $_GET['ref'])) 
		{

		# ----------------------------------------------------------------------------
		# Pengecekan jika FILE TIDAK KOSONG
		# ----------------------------------------------------------------------------
		force_download('./Assets/documents/'.$_GET['fname'], NULL);
		}

		else
		# ----------------------------------------------------------------------------
		# Pengecekan GET ILLEGAL dan DATA REFERENSI KOSONG
		# Menampilkan PESAN ERROR
		# ----------------------------------------------------------------------------
		{
		show_404();
		}
	}
}
?>