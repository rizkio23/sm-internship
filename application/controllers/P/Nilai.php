<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai extends MY_Controller 
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

	public function index()
	{
		
	}



	#--------------------------------------------------------------------------
	# METHOD SAVE_NONTEKNIS
	#--------------------------------------------------------------------------
	# berfungsi untuk mengambil data nilai NTEKNIS dan dilanjutkan model Mnilai
	# untuk menyimpan data pada db
	#--------------------------------------------------------------------------
	public function save_nonteknis()
	{

		#--------------------------------------------------------------------------
		# Pengecekan POST terkirim
		#--------------------------------------------------------------------------
		if (! empty($_POST)) 
		{

		#--------------------------------------------------------------------------
		# Persiapan pengambilan data pada Model Mnilai
		#--------------------------------------------------------------------------
		$this->load->model('Mnilai');

		#--------------------------------------------------------------------------
		# Pengecekan data 'ID_MEMBER' belum ada
		#--------------------------------------------------------------------------
		if ($this->Mnilai->is_input_nonteknis($this->input->post('id_member'))) 
		{

		#--------------------------------------------------------------------------
		# Pengecekan JIKA NILAI SUDAH PERNAH DIINPUT MAKA UPDATE
		#--------------------------------------------------------------------------
		if (! $this->Mnilai->update_nonteknis($this->input->post())) 
		{

		#--------------------------------------------------------------------------
		# Pengecekan JIKA UPDATE GAGAL maka muncul Pesan ERROR
		#--------------------------------------------------------------------------
		show_404();
		}
		}
				
		else
		#--------------------------------------------------------------------------
		# Pengecekan JIKA NILAI ID_MEMBER BELUM ADA
		#--------------------------------------------------------------------------
		{

		#--------------------------------------------------------------------------
		# Pengecekan JIKA NILAI SUDAH PERNAH DIINPUT MAKA UPDATE
		#--------------------------------------------------------------------------	
		if (! $this->Mnilai->add_nonteknis($this->input->post())) 
		{
		
		#--------------------------------------------------------------------------
		# Pengecekan JIKA GAGAL UPDATE maka MUNCUL PESAN ERROR
		#--------------------------------------------------------------------------	
		show_404();
		}
		}
		}

		else
		#--------------------------------------------------------------------------
		# Pengecekan POST TIDAK TERKIRIM / ILLEGAL maka MUNCUL PESAN ERROR
		#--------------------------------------------------------------------------	
		{
		show_404();
		}
	}



	#--------------------------------------------------------------------------
	# METHOD SAVE_TEKNIS
	#--------------------------------------------------------------------------
	# berfungsi untuk mengambil data nilai TEKNIS dan dilanjutkan model Mnilai
	# untuk menyimpan data pada db
	#--------------------------------------------------------------------------
	public function save_teknis()
	{

		#--------------------------------------------------------------------------
		# Pengecekan POST terkirim
		#--------------------------------------------------------------------------
		if (! empty($_POST)) 
		{

		#--------------------------------------------------------------------------
		# Persiapan pengambilan data dari model Mnilai
		#--------------------------------------------------------------------------
		$this->load->model('Mnilai');

		#--------------------------------------------------------------------------
		# Pengecekan data ID_MEMBER dan JENIS_KEGIATAN sesuai dengan data
		#--------------------------------------------------------------------------
		if ($this->Mnilai->is_input_teknis($this->input->post('id_member'), $this->input->post('jenis_kegiatan'))) 
		{

		#--------------------------------------------------------------------------
		# Pengecekan JIKA NILAI SUDAH PERNAH DIINPUT MAKA UPDATE
		#--------------------------------------------------------------------------
		if (! $this->Mnilai->update_teknis($this->input->post())) 
		{
		
		#--------------------------------------------------------------------------
		# Pengecekan JIKA NILAI GAGAL UPDATE 
		#--------------------------------------------------------------------------
		$this->pesan('pesan', 'Terjadi kesalahan');
		redirect(base_url().'dashboard/nilai_teknis');
		}

		else
		#--------------------------------------------------------------------------
		# Pengecekan JIKA NILAI BERHASIL UPDATE 
		#--------------------------------------------------------------------------
		{
		$this->pesan('pesan', 'Data berhasil diupdate');
		redirect(base_url().'dashboard/nilai_teknis');
		}
		}
			
		else
		#--------------------------------------------------------------------------
		# Pengecekan JIKA ID_MEMBER NILAI GAGAL UPDATE 
		#--------------------------------------------------------------------------
			{

				# JIKA NILAI SUDAH PERNAH DIINPUT MAKA UPDATE
				if (! $this->Mnilai->add_teknis($this->input->post())) 
				{
					# JIKA INSERT GAGAL
					$this->pesan('pesan', 'Terjadi kesalahan');
					redirect(base_url().'dashboard/nilai_teknis');
				}
				else
				{
					$this->pesan('pesan', 'Data berhasil ditambah');
					redirect(base_url().'dashboard/nilai_teknis');
				}
			}
		}
		else
		{
			show_404();
		}
	}
}
?>