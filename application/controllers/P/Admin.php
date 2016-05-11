<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller 
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
		# Mengambil list menu dari SESSION
		# List ini kemudian akan diparsing kedalam VIEW sidebar	
		#--------------------------------------------------------------------------
		{
		#Show error
		show_404();
		}
	}

	#----------------------------------------------------------------------------
	# Method add
	#----------------------------------------------------------------------------
	# Berfungsi sebagai mengambil data dari FORM TAMBAH ADMIN
	# Kemudian dilanjutkan kepada model Mmember untuk disimpan kedalam database.
	#----------------------------------------------------------------------------
	public function add()
	{
		#--------------------------------------------------------------------------
		# Melakukan pengecekan apakah POST terkirim
		# Data refrensi tidak kosong dan refrensi DIERCT sesuai.
		#--------------------------------------------------------------------------
		if (!empty($_POST) && !empty($_GET['ref']) && $_GET['ref'] === md5('tambahAdmin'))
		{

		#--------------------------------------------------------------------------
		# Melakukan pengecekan apakah VALUE dari tombol 'TB' memiliki nilai
		# Kemudian mengecek apakah data POST terkirim dari FORM yang sesuai.
		#--------------------------------------------------------------------------
		if (!empty($_POST['tb']) && $_POST['tb'] === 'Add')
		{

		#--------------------------------------------------------------------------
		# Mengambil CAPTCHA dari SESSION dan disimpan kedalam var $caps
		# Melakukan pengecekan apakah nilai CAPTCHA sama.
		#--------------------------------------------------------------------------
		$caps = $this->session->userdata('captcha');

		if($_POST['captcha'] === $caps['word'])
		{

		#--------------------------------------------------------------------------
		# Mengambil data-data dari FORM dan disimpan dalam sebuah array
		# Karena data disimpan pada dua tabel yang berbeda maka
		# data dipisah pada dua ARRAY yang berbeda yaitu pada ARRAY $con1
		# dan ARRAY $con2. Data disimpan pada 'tb_admin' dan 'tb_pegawai'
		#--------------------------------------------------------------------------
		$con1['data']['nip'] 	  		= $this->input->post('nip');
		$con1['data']['nama']	  		= $this->input->post('nama');
		$con1['data']['id_unitkerja'] 	= $this->input->post('unit');
		$con1['data']['jabatan']		= $this->input->post('jabatan');
		$con1['data']['hp']				= $this->input->post('hp');
		$con1['data']['alamat']			= $this->input->post('alamat');
		$con1['data']['is_pembina']		= $this->input->post('pembina');
		$con1['tabel']					= 'tb_pegawai';

		$con2['data']['nip']  			= $this->input->post('nip');
		$con2['data']['password']		= password_hash($con1['data']['nip'].''.substr($con1['data']['hp'], -3), PASSWORD_BCRYPT);
		$con2['data']['level']  		= $this->input->post('level');
		$con2['data']['status']			= 1;
		$con2['data']['created_date']	= date('Y-m-d h:i:s');
		$con2['data']['updated_date']	= NULL;
		$con2['data']['created_by']		= $this->session->userdata('user')['nip'];
		$con2['data']['updated_by']		= NULL;
		$con2['tabel']					= 'tb_admin';

		#--------------------------------------------------------------------------
		# Meload data dari FORM kedalam model Mmember
		# Melakukan pengecekan apakah INSERT pada tb_pegawai sesuai dengan tabel
		#--------------------------------------------------------------------------
		$this->load->model('Mmember');

		if($this->Mmember->insert($con1))
		{

		#--------------------------------------------------------------------------
		# Melakukan pengecekan apakah INSERT pada tb_admin sesuai dengan tabel
		#--------------------------------------------------------------------------
		if ($this->Mmember->insert($con2)) {

		#--------------------------------------------------------------------------
		# Jika data yang dimasukkan sesuai maka insert data berhasil dimasukkan
		# Dan akan berpindah ke dashboard administrasi
		#--------------------------------------------------------------------------
		$this->pesan('pesan', 'Data berhasil dimasukkan');
		redirect(base_url().'dashboard/admin');
		}


		else
		#--------------------------------------------------------------------------
		# Jika proses INSERT pada TABEL 'tb_pegawai' tidak berhasil
		#--------------------------------------------------------------------------
		{

		#--------------------------------------------------------------------------
		# Membuat pesan kesalahan
		# Kemudian halaman diarahkan ke halaman INPUT ADMIN
		#--------------------------------------------------------------------------
		$this->pesan('pesan', 'Terdapat data yang salah');
		redirect(base_url().'admin/dashboard/admin_form');
		}
		}


		else
		#--------------------------------------------------------------------------
		# Jika proses INSERT pada TABEL 'tb_admin' tidak berhasil
		#--------------------------------------------------------------------------
		{

		#--------------------------------------------------------------------------
		# Membuat pesan kesalahan
		# Kemudian halaman diarahkan ke halaman INPUT ADMIN
		#--------------------------------------------------------------------------

		$this->pesan('pesan', 'Terdapat data yang salah');
		redirect(base_url().'admin/dashboard/admin_form');
		}
		}


		else
		#--------------------------------------------------------------------------
		# Pengecekan jika nilai CAPTCHA tidak sama.
		#--------------------------------------------------------------------------
		{
		#--------------------------------------------------------------------------
		# Membuat pesan kesalahan
		# Kemudian halaman diarahkan ke halaman INPUT ADMIN 
		#--------------------------------------------------------------------------

		$this->pesan('pesan', 'Captcha tidak match');
		redirect(base_url().'admin/dashboard/admin_form');
		}
		}


		else
		#--------------------------------------------------------------------------
		# Melakukan pengecekan apakah VALUE dari tombol 'TB' tidak memiliki 
		# nilai. Mengecek jika data POST tidak terkirim dari FORM. 
		#--------------------------------------------------------------------------
		{
		#--------------------------------------------------------------------------
		# Kemudian halaman diarahkan ke halaman DASHBOARD ADMIN
		#--------------------------------------------------------------------------
		redirect(base_url().'admin/dashboard/');
		}
		}


		else
		#--------------------------------------------------------------------------
		# Melakukan pengecekan jika POST tidak terkirim
		# Data refrensi  kosong dan refrensi DIERCT tidak sesuai. 
		#--------------------------------------------------------------------------
		{
		#--------------------------------------------------------------------------
		# Kemudian halaman diarahkan ke halaman DASHBOARD ADMIN
		#--------------------------------------------------------------------------

		redirect(base_url().'admin/dashboard/');
		}
	}



	#----------------------------------------------------------------------------------------
	# Method update
	#----------------------------------------------------------------------------------------
	# Berfungsi sebagai mengambil data dari FORM TAMBAH ADMIN
	# Kemudian dilanjutkan kepada model Mmember untuk diupdate dan disimpan kedalam database.
	#----------------------------------------------------------------------------------------
	public function update()
	{
		#--------------------------------------------------------------------------
		# Melakukan pengecekan apakah POST terkirim
		# Data refrensi tidak kosong dan refrensi DIRECT sesuai.
		#--------------------------------------------------------------------------
		if (!empty($_POST) && !empty($_GET['ref']) && $_GET['ref'] === md5('updateAdmin'))
    	{
    	
    	#--------------------------------------------------------------------------
		# Melakukan pengecekan apakah VALUE dari tombol 'TB' memiliki nilai
		# Kemudian mengecek apakah data POST terkirim dari FORM yang sesuai.
		#--------------------------------------------------------------------------
    	if (!empty($_POST['tb']) && $_POST['tb'] === 'Add')
    	{

    	#--------------------------------------------------------------------------
		# Mengambil CAPTCHA dari SESSION dan disimpan kedalam var $caps
		# Melakukan pengecekan apakah nilai CAPTCHA sama.
		#--------------------------------------------------------------------------
    		
    	$caps = $this->session->userdata('captcha');
    			
    	if($_POST['captcha'] === $caps['word'])
    	{

    	#--------------------------------------------------------------------------
		# Mengambil data-data dari FORM dan disimpan dalam sebuah array
		# Karena data disimpan pada dua tabel yang berbeda maka
		# data dipisah pada dua ARRAY yang berbeda yaitu pada ARRAY $con1
		# dan ARRAY $con2. Data disimpan pada 'tb_admin' dan 'tb_pegawai'
		#--------------------------------------------------------------------------
	    $con1['data']['nama']	  		= $this->input->post('nama');
	    $con1['data']['id_unitkerja'] 	= $this->input->post('unit');
	    $con1['data']['jabatan']		= $this->input->post('jabatan');
	   	$con1['data']['hp']				= $this->input->post('hp');
	    $con1['data']['alamat']			= $this->input->post('alamat');
	    $con1['tabel']					= 'tb_pegawai';
	    $con1['where']					= array('nip'=>$this->input->post('nip'));

	    $con2['data']['level']  		= $this->input->post('level');
	    $con2['data']['status']			= 1;
	    $con2['data']['created_date']	= date('Y-m-d h:i:s');
	    $con2['data']['updated_date']	= $con2['data']['created_date'];
	    $con2['data']['updated_by']		= $this->session->userdata('user')['nip'];
	    $con2['tabel']					= 'tb_admin';
	    $con2['where']					= array('nip'=>$this->input->post('nip'));

	    #--------------------------------------------------------------------------
		# Meload data dari FORM kedalam model Mmember
		# Melakukan pengecekan apakah UPDATE pada tb_pegawai sesuai dengan tabel
		#--------------------------------------------------------------------------
	    $this->load->model('Mmember');

	    #--------------------------------------------------------------------------
		# Melakukan pengecekan apakah UPDATE pada tb_pegawai sesuai dengan tabel
		#--------------------------------------------------------------------------
	    if($this->Mmember->update($con1))
	    {
	    
	    #--------------------------------------------------------------------------
		# Melakukan pengecekan apakah UPDATE pada tb_admin sesuai dengan tabel
		#--------------------------------------------------------------------------
	    if ($this->Mmember->update($con2)) 
	    {

	    #--------------------------------------------------------------------------
	    # Membuat pesan data berhasil diubah
		# Dan akan berpindah ke DASHBOARD ADMIN
		#--------------------------------------------------------------------------
		$this->pesan('pesan', 'Data berhasil diubah');
	    redirect(base_url().'dashboard/admin');
	    }
	    
	    else
	    #--------------------------------------------------------------------------
		# Melakukan pengecekan jika UPDATE pada tb_pegawai tidak sesuai dengan tabel
		#--------------------------------------------------------------------------
		{
		#--------------------------------------------------------------------------
	    # Membuat pesan kesalahan
		# Kemudian halaman diarahkan ke halaman INPUT ADMIN
		#--------------------------------------------------------------------------
		$this->pesan('pesan', 'Terdapat data yang salah');
		redirect(base_url().'dashboard/admin_form?id='.$this->input->post('nip').'&ref='.md5('editAdmin'));
		}
	   	}
	    	
	    else
	   	#--------------------------------------------------------------------------
		# Melakukan pengecekan jika UPDATE pada tb_admin tidak sesuai dengan tabel
		#--------------------------------------------------------------------------
	    {

	    #--------------------------------------------------------------------------
		# Membuat pesan kesalahan
		# Kemudian halaman diarahkan ke halaman INPUT ADMIN
		#--------------------------------------------------------------------------

	    $this->pesan('pesan', 'Terdapat data yang salah');
	    redirect(base_url().'dashboard/admin_form?id='.$this->input->post('nip').'&ref='.md5('editAdmin'));
	    }
    	}


    	else
    	#--------------------------------------------------------------------------
    	# Pengecekan jika nilai CAPTCHA tidak sama.
		#--------------------------------------------------------------------------
		{

		#--------------------------------------------------------------------------
		# Membuat pesan kesalahan
		# Kemudian halaman diarahkan ke halaman INPUT ADMIN
		#--------------------------------------------------------------------------

		$this->pesan('pesan', 'Captcha tidak match');
		redirect(base_url().'dashboard/admin_form?id='.$this->input->post('nip').'&ref='.md5('editAdmin'));
		}
		}


		else
		#--------------------------------------------------------------------------
		# Melakukan pengecekan apakah VALUE dari tombol 'TB' tidak memiliki nilai
		# Mengecek jika data POST tidak terkirim dari FORM. 
		#--------------------------------------------------------------------------
		{

		#--------------------------------------------------------------------------
		# Diarahkan ke halaman DASHBOARD ADMIN
		#--------------------------------------------------------------------------

		redirect(base_url().'admin/dashboard/');
		}
    	}


    	else
    	#--------------------------------------------------------------------------
		# Melakukan pengecekan jika POST tidak terkirim
		# Data refrensi  kosong dan refrensi DIERCT tidak sesuai. 
		#--------------------------------------------------------------------------
    	{

    	#--------------------------------------------------------------------------
		# Diarahkan ke halaman DASHBOARD ADMIN
		#--------------------------------------------------------------------------

		redirect(base_url().'admin/dashboard/');
    	}
	}

	public function update_profil()
	{
		if (isset($_POST) && ! empty($_POST)) 
		{
			$data 	= $this->input->post();
			$nip 	= $data['nip'];

			unset($data['nip']);
			unset($data['btn']);

			$this->load->model('Madmin');

			if ($this->Madmin->update_profil($nip, $data)) 
			{
				$this->pesan('pesan', 'Data berhasil diganti');
				redirect(base_url().'dashboard/profil');
			}
			else
			{
				$this->pesan('pesan', 'Data gagal diganti');
				redirect(base_url().'dashboard/profil');
			}
		}
		else
		{
			$this->pesan('pesan', 'Kosong');
			redirect(base_url().'dashboard/profil');
		}
	}



	#----------------------------------------------------------------------------------
	# Method delete
	#----------------------------------------------------------------------------------
	# Berfungsi sebagai mengubah status delete data dari tabel pegawai dan tabel admin
	# Kemudian dilanjutkan kepada model Mmember untuk dihapus dari database.
	#---------------------------------------------------------------------------------
	public function delete()
	{
	#----------------------------------------------------------------------------
	# Pengecekan jika GET terkirim 
	#----------------------------------------------------------------------------
	if (!empty($_GET)) 
	{

	#--------------------------------------------------------------------------
	# Melakukan pengecekan apakah GET terkirim
	# Data refrensi tidak kosong dan refrensi DIRECT sesuai.
	#--------------------------------------------------------------------------
	if (!empty($_GET['ref']) && !empty($_GET['id']) && $_GET['ref'] === md5('deleteAdmin')) 
	{

	#------------------------------------------------------------------------------
	# Meload data dari tabel pegawai dan tabel admin kedalam model Mmember
	#------------------------------------------------------------------------------
	$this->load->model('Mmember');

	$con1['tabel'] 	= 'tb_admin';
	$con1['where']	= array('nip'=>$_GET['id']);
	$con1['data']	= array('deleted'=>'1');

	$con2['tabel'] 	= 'tb_pegawai';
	$con2['where']	= array('nip'=>$_GET['id']);
	$con2['data']	= array('deleted'=>'1');

	#------------------------------------------------------------------------------
	# Melakukan pengecekan apakah UPDATE pada tb_admin sesuai dengan tabel
	#------------------------------------------------------------------------------

	if ($this->Mmember->update($con1)) 
	{

	#------------------------------------------------------------------------------
	# Melakukan pengecekan apakah UPDATE pada tb_pegawai sesuai dengan tabel
	#------------------------------------------------------------------------------

	if ($this->Mmember->update($con2)) 
	{

	#------------------------------------------------------------------------------
	# Membuat pesan Berhasil
	# Kemudian diarahkan ke halaman DASHBOARD ADMIN
	#------------------------------------------------------------------------------

	$this->session->set_flashdata('pesan', 'Data berhasil dihapus');
	redirect(base_url().'dashboard/admin');
	}
	}
	}


	else
	#--------------------------------------------------------------------------
	# Melakukan pengecekan jika Data refrensi kosong dan 
	# refrensi DIRECT tidak sesuai.
	#--------------------------------------------------------------------------
	{
	
	#------------------------------------------------------------------------------
	# Kemudian diarahkan ke halaman DASHBOARD ADMIN
	#------------------------------------------------------------------------------
	redirect(base_url().'dashboard/admin');
	}
	}	


	else
	#----------------------------------------------------------------------------
	# Pengecekan jika GET belum terkirim
	#----------------------------------------------------------------------------
	{

	#----------------------------------------------------------------------------
	# Diarahkan ke halaman DASHBOARD ADMIN
	#----------------------------------------------------------------------------

	redirect(base_url().'dashboard/admin');
	}
	}



	#----------------------------------------------------------------------------------
	# Method delete
	#----------------------------------------------------------------------------------
	# Berfungsi untuk mengambil dan mengecek data (NIP) database
	# Kemudian dilanjutkan kepada model Mmember untuk dihapus dari database.
	#---------------------------------------------------------------------------------
	public function cek_nip()
	{

		#----------------------------------------------------------------------------------
		# Pengecekan data POST terkirim
		#----------------------------------------------------------------------------------
		if (isset($_POST) && ! empty($_POST)) 
		{

		#----------------------------------------------------------------------------------
		# Persiapan pengambilan data dari Model Madmin
		#----------------------------------------------------------------------------------
		$this->load->model('Madmin');

		#----------------------------------------------------------------------------------
		# Pengecekan NIP ada dan membuat pesan ERROR
		#----------------------------------------------------------------------------------
		if ($this->Madmin->is_registered($this->input->post('nip')))
		{
		show_404();
		}
		}

		else
		#----------------------------------------------------------------------------------
		# Pengecekan data POST tidak terkirim dan membuat pesan ERROR
		#----------------------------------------------------------------------------------
		{
		show_404();
		}
	}

	public function reset_password()
	{
		$data = $this->input->post();
		$user = $this->session->userdata('user');

		if ($data['nik'] == $user['nip']) 
		{
			$this->load->model('Madmin');

			if ($this->Madmin->match_password($data['oldpassword'], $data['nik'])) 
			{
				if ($this->Madmin->reset_password($data['newpassword'], $data['nik'])) 
				{
					$this->pesan("pesan", "Password berhasil diubah");
					redirect(base_url().'dashboard/reset_password');
				}
				else
				{
					$this->pesan("pesan", "Terjadi kesalahan");
					redirect(base_url().'dashboard/reset_password');
				}
			}
			else
			{
				$this->pesan("pesan", "Password lama salah");
				redirect(base_url().'dashboard/reset_password');
			}
		}
		else
		{
			$this->pesan("pesan", "NIK salah");
			redirect(base_url().'dashboard/reset_password');
		}
	}
}
?>
