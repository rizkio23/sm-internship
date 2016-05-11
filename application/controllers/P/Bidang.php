<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bidang extends MY_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mbidang');
	}

	public function _remap($method, $param = array())
	{
		#--------------------------------------------------------------------------
		# Mengambil list menu dari SESSION
		# List ini kemudian akan diparsing kedalam VIEW sidebar	
		#--------------------------------------------------------------------------

		if (method_exists($this, $method) && $method !== 'index') 
		{
		#--------------------------------------------------------------------------
		# Pengecekan user sudah melakukan login 
		#--------------------------------------------------------------------------
		if ($this->isLogin())
		{
			
		#-------------------------------------------------------------------------------------
		# Jika sudah LOGIN maka List dari SESSION kemudian akan diparsing kedalam VIEW sidebar	
		#-------------------------------------------------------------------------------------
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
		# Pengecekan belum Mengambil list menu dari SESSION 
		# AKan menampilkan pesan ERROR	
		#--------------------------------------------------------------------------
		{
		show_404();
		}
	}



	#--------------------------------------------------------------------------
	# METHODE BIDANG_DELETE
	#--------------------------------------------------------------------------
	# berfungsi untuk menambah data BIDANG kedalam 'tb_bidang'
	#--------------------------------------------------------------------------
	public function bidang_add()
	{
		#--------------------------------------------------------------------------
		# Melakukan pengecekan apakah POST terkirim
		# Data refrensi tidak kosong dan refrensi DIRECT sesuai.
		#--------------------------------------------------------------------------
		if (!empty($_POST) && !empty($_GET) && password_verify('tambahBidang', $_GET['ref']) && $_POST['tb']==='add') 
		{
		
		#---------------------------------------------------------------------------------
		# Melakukan pengecekan data yang dimasukkan sesuai dengan data 'tb_bidang'
	 	# Membuat pesan keberhasilan dan diarahkan ke halaman BIDANG
		#---------------------------------------------------------------------------------
		if ($this->Mbidang->add_bidang($_POST)) 
		{
		$this->pesan('pesan', 'Data berhasil ditambah');
		redirect(base_url().'dashboard/bidang');
		}

		#-----------------------------------------------------------------------------------
		# Melakukan pengecekan data yang dimasukkan tidaksesuai dengan data 'tb_bidang'
		# Membuat pesan kesalahan dan diarahkan ke halaman BIDANG
		#-----------------------------------------------------------------------------------
		else
		{
		$this->pesan('pesan', 'Terdapat data yang salah');
		redirect(base_url().'dashboard/bidang');
		}
		}

		#--------------------------------------------------------------------------
		# Data refrensi kosong dan refrensi DIRECT tidak sesuai.
		# Kemudian diarahkan ke halaman BIDANG
		#--------------------------------------------------------------------------
		else
		{
		redirect(base_url().'dashboard/bidang');
		}
	}



	#--------------------------------------------------------------------------
	# METHODE BIDANG_DELETE
	#--------------------------------------------------------------------------
	# berfungsi untuk mengubah status delete BIDANG dari 'tb_bidang'
	#--------------------------------------------------------------------------
	public function bidang_delete()
	{
		#--------------------------------------------------------------------------
		# Melakukan pengecekan apakah POST terkirim
		# Data refrensi tidak kosong dan refrensi DIRECT sesuai.
		#--------------------------------------------------------------------------
		if (!empty($_GET) && !empty($_GET['id']) && !empty($_GET['ref']) && password_verify('hapusBidang', $_GET['ref'])) 
		{
		
		#--------------------------------------------------------------------------
		# Melakukan pengecekan data sesuai dengan data 'tb_bidang'
		# Membuat pesan keberhasilan dan diarahkan ke halaman BIDANG
		#--------------------------------------------------------------------------
		if ($this->Mbidang->delete_bidang($_GET['id'])) 
		{
		$this->pesan('pesan', 'Data berhasil dihapus');
		redirect(base_url().'dashboard/bidang');
		}

		else
		#--------------------------------------------------------------------------
		# Melakukan pengecekan data tidak sesuai dengan data 'tb_bidang'
		# Membuat pesan kesalahan dan diarahkan ke halaman BIDANG
		#--------------------------------------------------------------------------
		{
		$this->pesan('pesan', 'Terdapat kesalahan');
		redirect(base_url().'dashboard/bidang');
		}
		}

		else
		#--------------------------------------------------------------------------
		# Data refrensi kosong dan refrensi DIRECT tidak sesuai.
		# Kemudian diarahkan ke halaman BIDANG
		#--------------------------------------------------------------------------
		{
		redirect(base_url().'dashboard/bidang');
		}
	}



	#--------------------------------------------------------------------------
	# METHODE CHANGE_STATUS
	#--------------------------------------------------------------------------
	# berfungsi untuk mengubah status valaibdata BIDANG dari 'tb_bidang'
	#--------------------------------------------------------------------------
	public function change_status()
	{

		#--------------------------------------------------------------------------
		# Pengecekan POST terkirim 
		#--------------------------------------------------------------------------
		if (! empty($_POST)) 
		{

		#--------------------------------------------------------------------------
		# Persiapan pengambilan data dari Model Mbidang
		#--------------------------------------------------------------------------
		$this->load->model('Mbidang');
			
		#--------------------------------------------------------------------------
		# Pengecekan data jika data kosong akan membuat pesan ERROR
		#--------------------------------------------------------------------------
		if (! $this->Mbidang->change_status($_POST)) 
		{
		show_404();
		}
		}

		else
		#--------------------------------------------------------------------------
		# Pengecekan POST terkirim / illegal akan membuat pesan ERROR
		#--------------------------------------------------------------------------
		{
		show_404();
		}
	}
}

?>