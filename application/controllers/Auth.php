<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller {

	public function index()
	{

		#------------------------------------------------------------------------------
		# Melakukan Pengecekan apakah user sudah LOGIN 
		#------------------------------------------------------------------------------
		if ($this->isLogin()) 
		{
			
		#------------------------------------------------------------------------------
		# Jika user SUDAH LOGIN 
		# Diarahkan ke Halaman DASHBOARD USER
		#------------------------------------------------------------------------------
			redirect(base_url().'dashboard/');
		}

		#------------------------------------------------------------------------------
		# Jika user BELUM LOGIN 
		# Diarahkan ke Halaman DASHBOARD USER
		#------------------------------------------------------------------------------

	    else
	    {	
		
		#------------------------------------------------------------------------------
		# Me-load Data referensi
		#------------------------------------------------------------------------------	
		$ref = $this->input->get('ref');

		#------------------------------------------------------------------------------
		# Pengecekan Data referensi tidak kosong dan refrensi DIRECT sesuai
		# Kemudian mengecek apakah data POST terkirim dari FORM yang sesuai.
		#------------------------------------------------------------------------------	

        if (!empty($ref) && !empty($_POST) && password_verify('loginAdmin', $ref)) 
        {
    	$nip			= $this->input->post('nip');
    	$password		= $this->input->post('password');
    	$captcha		= $this->input->post('captcha');
    	$caps			= $this->session->userdata('captcha');


    	#--------------------------------------------------------------------------
		# Mengambil CAPTCHA dari SESSION dan disimpan kedalam var $caps
		# Melakukan pengecekan apakah nilai CAPTCHA sama.
		#--------------------------------------------------------------------------

    	if ($captcha === $caps['word']) 
    	{

    	#--------------------------------------------------------------------------
		# Mempersiapkan pengambilan data dari MODEL
    	# Kemudian data hasil dimasukan kedalam var $dat 
		#--------------------------------------------------------------------------

		$this->load->model('Madmin'); 

		$con['tabel']	= 'tb_admin';
		$con['join']	= array('tb_pegawai'=>'tb_admin.nip = tb_pegawai.nip');
		$con['where']	= array('tb_admin.nip' => $nip);

		$dat = $this->Madmin->get($con);

		#--------------------------------------------------------------------------
		# Melakukan Pengecekan apakah data ada dalam DB
		#--------------------------------------------------------------------------

		if ($dat->num_rows() > 0) 
		{

		# Mengambil data dari DB
		# data ke 0 atau data pertama yang diambil
		$dat = $dat->result();
		$dat = $dat[0];
		
		# Cek password
		if (password_verify($password, $dat->password)) 
		{

		#-------------------------------------------------------------------------
		# Kemudian data dimasukkan kedalam ARRAY 'user'
		#-------------------------------------------------------------------------
		$user['nip'] 	 	= $nip;
		$user['nama']		= $dat->nama;
		$user['level']	 	= $dat->level;
		$user['auth']	 	= TRUE;

		#--------------------------------------------------------------------------
		# Persiapan pengambilan data pada tabel 'tb_hak_akses'
		#--------------------------------------------------------------------------

		$this->load->model('Makses');

		$user['menu'] = $this->Makses->get_menu($user['level']);

		#--------------------------------------------------------------------------
		# SET SESSION untuk data USER
		#--------------------------------------------------------------------------

		$this->session->set_userdata('user', $user);

		#--------------------------------------------------------------------------
		# UPDATE waktu login USER
		#--------------------------------------------------------------------------

		$this->Madmin->setLogtime($nip);

		#--------------------------------------------------------------------------
		# Diarahkan ke halaman DASHBOARD setelah proses LOGIN sukses
		#--------------------------------------------------------------------------
		
		redirect(base_url().'dashboard/');
		}
		else
		{
		$this->pesan('pesan', 'Password anda salah');
		redirect(base_url().'home/login');
		}

		}


		else
		#--------------------------------------------------------------------------
		# JIKA Pengecekan FORM salah
		# Membuat pesan Kesalahan dan diarahkan ke halaman LOGIN
		#--------------------------------------------------------------------------
		{
		$this->pesan('pesan', 'Username salah');
		redirect(base_url().'home/login');
		}
    	}
	    

		else
	    #--------------------------------------------------------------------------
		# JIKA Pengecekan CAPTCHA tidak sama
		# Membuat pesan Kesalahan dan diarahkan ke halaman LOGIN
		#--------------------------------------------------------------------------
    	{
		$this->pesan('pesan', 'Captcha tidak sama.');
		redirect(base_url().'home/login');
    	}
        }

        else
        #--------------------------------------------------------------------------
		# JIKA Pengecekan Data referensi kosong dan refrensi DIRECT tidak sesuai
		# Membuat pesan Kesalahan dan diarahkan ke halaman DASHBOARD
		#--------------------------------------------------------------------------

        {
    	redirect(base_url());
        }
    	}

	}


	
	#----------------------------------------------------------------------------
	# Method out
	#----------------------------------------------------------------------------
	# Berfungsi sebagai proses LOGOUT
	# Kemudian diarahkan ke halaman utama
	#----------------------------------------------------------------------------
	public function out()
	{
		#--------------------------------------------------------------------------
		# Menghapus/unset semua session yang ada dan dikembalikan 
		# ke halaman utama.
		#--------------------------------------------------------------------------
		$this->session->unset_userdata(array('user', 'captcha'));
		$this->session->sess_destroy();
		redirect(base_url());
	}


	#----------------------------------------------------------------------------
	# Method USER
	#----------------------------------------------------------------------------
	# Berfungsi sebagai proses USER melakukan AKTIVITAS 
	#----------------------------------------------------------------------------
	public function user()
	{
		#------------------------------------------------------------------------------
		# Melakukan Pengecekan apakah user sudah LOGIN 
		#------------------------------------------------------------------------------
		if ($this->isLogin()) 
		{
			
		#------------------------------------------------------------------------------
		# Jika user SUDAH LOGIN 
		# Diarahkan ke Halaman DASHBOARD USER
		#------------------------------------------------------------------------------
			redirect(base_url().'dashboard/');
		}

		#------------------------------------------------------------------------------
		# Jika user BELUM LOGIN 
		# Diarahkan ke Halaman DASHBOARD USER
		#------------------------------------------------------------------------------

	    else
	    {	
		#------------------------------------------------------------------------------
		# Me-load Data referensi
		#------------------------------------------------------------------------------	
		$ref = $this->input->get('ref');

		#------------------------------------------------------------------------------
		# Pengecekan Data referensi tidak kosong dan refrensi DIRECT sesuai
		# Kemudian mengecek apakah data POST terkirim dari FORM yang sesuai.
		#------------------------------------------------------------------------------	
        if (!empty($ref) && password_verify('loginUser', $ref) && !empty($_POST)) 
        {
    	$email			= $this->input->post('email');
    	$password		= $this->input->post('password');
    	$captcha		= $this->input->post('captcha');
    	$caps			= $this->session->userdata('captcha');


    	#--------------------------------------------------------------------------
		# Mengambil CAPTCHA dari SESSION dan disimpan kedalam var $caps
		# Melakukan pengecekan apakah nilai CAPTCHA sama.
		#--------------------------------------------------------------------------
    	if ($captcha === $caps['word']) 
    	{

    	#--------------------------------------------------------------------------
		# Mempersiapkan pengambilan data dari MODEL
    	# Kemudian data hasil dimasukan kedalam var $dat 
		#--------------------------------------------------------------------------

		$this->load->model('Mmember'); 

		$con['tabel']	= 'tb_member';
		$con['where']	= array('email' => $email, 'password' => $password);

		$dat = $this->Mmember->get($con);

		#--------------------------------------------------------------------------
		# Melakukan Pengecekan apakah data ada dalam DB
		#--------------------------------------------------------------------------
		if ($dat->num_rows() > 0) 
		{

		#--------------------------------------------------------------------------
		# Mengambil data dari DB
		# data ke 0 atau data pertama yang diambil
		# Kemudian data dimasukkan kedalam ARRAY 'user'
		#--------------------------------------------------------------------------
		$dat = $dat->result_array();
		$dat = $dat[0];
		$user['id'] 	 	= $dat['id'];
		$user['email']		= $dat['email'];
		$user['nama']		= $dat['nama'];
		$user['level']	 	= $dat['level'];
		$user['auth']	 	= TRUE;

		#--------------------------------------------------------------------------
		# Persiapan pengambilan data pada tabel 'tb_hak_akses'
		#--------------------------------------------------------------------------
		$this->load->model('Makses');
		$user['menu'] = $this->Makses->get_menu($user['level']);

		#--------------------------------------------------------------------------
		# SET SESSION untuk data USER
		#--------------------------------------------------------------------------
		$this->session->set_userdata('user', $user);

		#--------------------------------------------------------------------------
		# UPDATE waktu login USER
		#--------------------------------------------------------------------------

		# $this->Madmin->setLogtime($nip);
		#-------------------------------------------------------------------------
		# Diarahkan ke halaman DASHBOARD setelah proses LOGIN sukses
		#--------------------------------------------------------------------------
		
		redirect(base_url().'dashboard/');
		}


		else
		#--------------------------------------------------------------------------
		# JIKA Pengecekan FORM salah
		# Membuat pesan Kesalahan dan diarahkan ke halaman LOGIN
		#--------------------------------------------------------------------------
		{
		$this->pesan('pesan', 'Username atau Password anda salah');
		redirect(base_url());
		}
    	}
	    

		else
	    #--------------------------------------------------------------------------
		# JIKA Pengecekan CAPTCHA tidak sama
		# Membuat pesan Kesalahan dan diarahkan ke halaman LOGIN
		#--------------------------------------------------------------------------
    	{
		$this->pesan('pesan', 'Captcha tidak sama.');
		redirect(base_url());
    	}
        }

        else
        #--------------------------------------------------------------------------
		# JIKA Pengecekan Data referensi kosong dan refrensi DIRECT tidak sesuai
		# Membuat pesan Kesalahan dan diarahkan ke halaman DASHBOARD
		#--------------------------------------------------------------------------
        {
    	redirect(base_url());
        }
    	}
	}

}

?>
