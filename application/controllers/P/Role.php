<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role extends MY_Controller 
{

	public function _remap($method, $param = array())
	{
		#--------------------------------------------------------------------------
		# Mengambil list menu dari SESSION
		# List ini kemudian akan diparsing kedalam VIEW sidebar	
		#--------------------------------------------------------------------------

		if (method_exists($this, $method)) 
		{
		#--------------------------------------------------------------------------
		# Mengambil list menu dari SESSION
		# List ini kemudian akan diparsing kedalam VIEW sidebar	
		#--------------------------------------------------------------------------
		if ($this->isLogin())
		{
		
		#--------------------------------------------------------------------------
		# Mengambil list menu dari SESSION
		# List ini kemudian akan diparsing kedalam VIEW sidebar	
		#--------------------------------------------------------------------------
		return call_user_func_array(array($this, $method), $param);
		}

		else
		#--------------------------------------------------------------------------
		# Jika belum login
		#--------------------------------------------------------------------------
		{
		redirect(base_url().'home/login');
		}
		}

		else
		#--------------------------------------------------------------------------
		# Pengecekan pengambilan list menu dari SESSION tidak sesuai
		# Akan membuat peringatan error
		#--------------------------------------------------------------------------
		{
		show_404();
		}
	}


	#--------------------------------------------------------------------------
	# METHODE LEVEL_ADD
	#--------------------------------------------------------------------------
	# berfungsi untuk menambah data level kedalam 'tb_level'
	#--------------------------------------------------------------------------
	public function level_add()
	{
		#--------------------------------------------------------------------------
		# Melakukan pengecekan apakah POST terkirim
		# Data refrensi tidak kosong dan refrensi DIRECT sesuai.
		#--------------------------------------------------------------------------
		if (!empty($_POST) && !empty($_GET) && password_verify('tambahLevel', $_GET['ref']) && $_POST['tb']==='add') 
		{

		#--------------------------------------------------------------------------
		# Meload data dari model Mlevel
		#--------------------------------------------------------------------------
		$this->load->model('Mlevel');
		
		#---------------------------------------------------------------------------------
		# Melakukan pengecekan data yang dimasukkan sesuai dengan data 'tb_level'
		# Membuat pesan keberhasilan dan diarahkan ke halaman LEVEL
		#---------------------------------------------------------------------------------
		if ($this->Mlevel->add_level($_POST)) 
		{
		$this->pesan('pesan', 'Data berhasil ditambah');
		redirect(base_url().'dashboard/level');
		}

		#-----------------------------------------------------------------------------------
		# Melakukan pengecekan data yang dimasukkan tidaksesuai dengan data 'tb_level'
		# Membuat pesan kesalahan dan diarahkan ke halaman LEVEL
		#-----------------------------------------------------------------------------------
		else
		{
		$this->pesan('pesan', 'Terdapat data yang salah');
		redirect(base_url().'dashboard/level');
		}
		}

		#--------------------------------------------------------------------------
		# Melakukan pengecekan POST tidak terkirim
		# Data refrensi kosong dan refrensi DIRECT tidak sesuai.
		# Kemudian diarahkan ke halaman LEVEL
		#--------------------------------------------------------------------------
		else
		{
		redirect(base_url().'dashboard/level');
		}
	}


	#--------------------------------------------------------------------------
	# METHODE LEVEL_DELETE
	#--------------------------------------------------------------------------
	# berfungsi untuk menghapus data level dari 'tb_level'
	#--------------------------------------------------------------------------
	public function level_delete()
	{
		#--------------------------------------------------------------------------
		# Melakukan pengecekan apakah POST terkirim
		# Data refrensi tidak kosong dan refrensi DIRECT sesuai.
		#--------------------------------------------------------------------------
		if (!empty($_GET) && !empty($_GET['level']) && !empty($_GET['ref']) && password_verify('hapusLevel', $_GET['ref'])) 
		{

		#--------------------------------------------------------------------------
		# Meload data dari model Mlevel
		#--------------------------------------------------------------------------
		$this->load->model('Mlevel');
		
		#--------------------------------------------------------------------------
		# Melakukan pengecekan data sesuai dengan data 'tb_level'
		# Membuat pesan keberhasilan dan diarahkan ke halaman LEVEL
		#--------------------------------------------------------------------------
		if ($this->Mlevel->delete_level($_GET['level'])) 
		{
		$this->pesan('pesan', 'Data berhasil dihapus');
		redirect(base_url().'dashboard/level');
		}

		else
		#--------------------------------------------------------------------------
		# Melakukan pengecekan data tidak sesuai dengan data 'tb_level'
		# Membuat pesan kesalahan dan diarahkan ke halaman LEVEL
		#--------------------------------------------------------------------------
		{
		$this->pesan('pesan', 'Terdapat kesalahan');
		redirect(base_url().'dashboard/level');
		}
		}

		else
		#--------------------------------------------------------------------------
		# Melakukan pengecekan POST tidak terkirim
		# Data refrensi kosong dan refrensi DIRECT tidak sesuai.
		# Kemudian diarahkan ke halaman LEVEL
		#--------------------------------------------------------------------------
		{
		redirect(base_url().'dashboard/level');
		}
	}


	#--------------------------------------------------------------------------
	# METHODE MENU_ADD
	#--------------------------------------------------------------------------
	# berfungsi untuk menambah data menu kedalam 'tb_menu'
	#--------------------------------------------------------------------------
	public function menu_add()
	{
		#--------------------------------------------------------------------------
		# Melakukan pengecekan apakah POST terkirim
		# Data refrensi tidak kosong dan refrensi DIRECT sesuai.
		#--------------------------------------------------------------------------
		if (!empty($_POST) && !empty($_GET) && password_verify('tambahMenu', $_GET['ref']) && $_POST['tb']==='add') 
		{

		#--------------------------------------------------------------------------
		# Meload data dari model Mlevel
		#--------------------------------------------------------------------------
		$this->load->model('Mmenu');
		
		#---------------------------------------------------------------------------------
		# Melakukan pengecekan data yang dimasukkan sesuai dengan data 'tb_level'
	 	# Membuat pesan keberhasilan dan diarahkan ke halaman LEVEL
		#---------------------------------------------------------------------------------
		if ($this->Mmenu->add_menu($_POST)) 
		{
		$this->pesan('pesan', 'Data berhasil ditambah');
		redirect(base_url().'dashboard/master_menu');
		}

		#-----------------------------------------------------------------------------------
		# 4.	Melakukan pengecekan data yang dimasukkan tidaksesuai dengan data 'tb_level'
		#		Membuat pesan kesalahan dan diarahkan ke halaman LEVEL
		#-----------------------------------------------------------------------------------
		else
		{
		$this->pesan('pesan', 'Terdapat data yang salah');
		redirect(base_url().'dashboard/master_menu');
		}
		}

		#--------------------------------------------------------------------------
		# 5.	Melakukan pengecekan POST tidak terkirim
		# 		Data refrensi kosong dan refrensi DIRECT tidak sesuai.
		#		Kemudian diarahkan ke halaman LEVEL
		#--------------------------------------------------------------------------
		else
		{
		redirect(base_url().'dashboard/master_menu');
		}
	}

	#--------------------------------------------------------------------------
	# METHODE LEVEL_DELETE
	#--------------------------------------------------------------------------
	# berfungsi untuk menghapus data level dari 'tb_level'
	#--------------------------------------------------------------------------
	public function menu_delete()
	{
		#--------------------------------------------------------------------------
		# Melakukan pengecekan apakah POST terkirim
		# Data refrensi tidak kosong dan refrensi DIRECT sesuai.
		#--------------------------------------------------------------------------
		if (!empty($_GET) && !empty($_GET['id']) && !empty($_GET['ref']) && password_verify('hapusMenu', $_GET['ref'])) 
		{

		#--------------------------------------------------------------------------
		# Meload data dari model Mlevel
		#--------------------------------------------------------------------------
		$this->load->model('Mmenu');
		
		#--------------------------------------------------------------------------
		# Melakukan pengecekan data sesuai dengan data 'tb_level'
		# Membuat pesan keberhasilan dan diarahkan ke halaman LEVEL
		#--------------------------------------------------------------------------
		if ($this->Mmenu->delete_menu($_GET['id'])) 
		{
		$this->pesan('pesan', 'Data berhasil dihapus');
		redirect(base_url().'dashboard/master_menu');
		}

		else
		#--------------------------------------------------------------------------
		# Melakukan pengecekan data tidak sesuai dengan data 'tb_level'
		# Membuat pesan kesalahan dan diarahkan ke halaman LEVEL
		#--------------------------------------------------------------------------
		{
		$this->pesan('pesan', 'Terdapat kesalahan');
		redirect(base_url().'dashboard/master_menu');
		}
		}

		else
		#--------------------------------------------------------------------------
		# Melakukan pengecekan POST tidak terkirim
		# Data refrensi kosong dan refrensi DIRECT tidak sesuai.
		# Kemudian diarahkan ke halaman LEVEL
		#--------------------------------------------------------------------------
		{
		redirect(base_url().'dashboard/master_menu');
		}
	}
}
?>