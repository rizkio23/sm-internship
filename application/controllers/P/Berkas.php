<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berkas extends MY_Controller
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


	function upload()
	{
		#--------------------------------------------------------------------------
		# Melakukan pengecekan apakah POST terkirim
		# Data refrensi tidak kosong dan refrensi DIRECT sesuai.
		#--------------------------------------------------------------------------
		if (!empty($_POST))
		{

		#--------------------------------------------------------------------------
		# Melakukan pengecekan jika VALUE dari tombol 'TB' memiliki nilai
		# Kemudian mengecek jika data POST terkirim dari FORM yang sesuai.
		#--------------------------------------------------------------------------
		if (!empty($_POST['tb']) && $_POST['tb'] === 'Simpan')
		{
		#--------------------------------------------------------------------------
		# Persiapan pengambilan data untuk upload
		#--------------------------------------------------------------------------
		$id_user				 = $this->session->userdata('user')['id'];
		$config['upload_path']   = './Documents/'.$id_user.'/';
        $config['allowed_types'] = 'pdf';
        $config['max_size']      = 3000;
        $config['file_name']	 = $id_user.'_'.$this->input->post('kategori').'.pdf';
        $config['overwrite']	 = TRUE;

        $this->load->library('upload', $config);

        #--------------------------------------------------------------------------
		# Pengecekan Untuk proses Upload jika berhasil
		#--------------------------------------------------------------------------
        if ($this->upload->do_upload('file'))
        {
        #--------------------------------------------------------------------------
		# Proses Penyimpanan data kedalam Model Mberkas
		#--------------------------------------------------------------------------
    	$this->load->model('Mberkas');

    	#--------------------------------------------------------------------------
		# Proses pengambilan data untuk disimpan
		#--------------------------------------------------------------------------
    	$data['nama_berkas'] = $this->input->post('nama_berkas');
    	$data['kategori']	 = $this->input->post('kategori');
    	$data['file']		 = $id_user.'_'.$this->input->post('kategori').'.pdf';

    	#--------------------------------------------------------------------------
		# Pengecekan jika data yang akan disimpan sesuai
		# Membuat pesan KEBERHASILAN dan diarahkan ke HALAMAN PENGAJUAN MAGANG
		#--------------------------------------------------------------------------
    	if ($this->Mberkas->save_berkas($data))
    	{
		$this->pesan('pesan', 'Berkas berhasil diunggah');
		redirect(base_url().'dashboard/berkas_member');
        }

    	else
    	#--------------------------------------------------------------------------
		# Pengecekan jika data yang akan disimpan tidak sesuai
		# Membuat pesan KESALAHAN dan diarahkan ke HALAMAN PENGAJUAN MAGANG
		#--------------------------------------------------------------------------
    	{
		$this->pesan('pesan', 'Terdapat kesalahan data');
		redirect(base_url().'dashboard/berkas_member');
        }
        }

        else
        #--------------------------------------------------------------------------
		# Pengecekan Untuk proses Upload jika GAGAL UPLOAD
        # Membuat PESAN ERROR dan diarahkan ke HALAMAN PENGAJUAN MAGANG
		#--------------------------------------------------------------------------
        {
		$this->pesan('pesan', $this->upload->display_errors());
    	redirect(base_url().'dashboard/berkas_member');
        }
		}

		else
		#--------------------------------------------------------------------------
		# Pengecekan jika POST ILLEGAL
		# Membuat PESAN KESALAHAN dan diarahkan ke halaman PENGAJUAN MAGANG
		#--------------------------------------------------------------------------
		{
		$this->pesan('pesan', 'Terjadi kesalahan');
	    redirect(base_url().'dashboard/berkas_member');
		}
		}

		else
		#--------------------------------------------------------------------------
		# Pengecekan JIKA DATA REFERENSI ILLEGAL
		# Membuat PESAN ERROR
		#--------------------------------------------------------------------------
		{
		show_404();
		}
	}
}
?>
