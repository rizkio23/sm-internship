<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notifikasi extends MY_Controller 
{

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

	public function add()
	{
		$this->load->model("Mnotifikasi");

		$data = $this->input->post();
		
		if (isset($data['semua'])) 
		{
			$data['penerima'] = '0';
			unset($data['semua']);
		}

		$data['no'] = date("Ymdhis");
		$data['status'] = '1';

		unset($data['tb']);

		if ($this->Mnotifikasi->add($data)) 
		{
			$this->pesan("pesan", "Pesan berhasil dikirim");
			redirect(base_url().'dashboard/notifikasi');
		}
		else
		{
			$this->pesan("pesan", "Terjadi kesalahan");
			redirect(base_url().'dashboard/notifikasi');
		}

	}
}
?>