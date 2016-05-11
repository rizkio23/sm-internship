<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends MY_Controller
{
	public function index()
	{
		redirect(base_url().'login');
	}

	private function generatePass($p)
	{
		return substr(md5(microtime()), rand(0,26), $p);
	}

	#--------------------------------------------------------------------------
	# METHOD SIGNUP
	#--------------------------------------------------------------------------
	# Berfungsi sebagai mengambil data dari FORM DAFTAR MEMBER
	# Kemudian dilanjutkan kepada model Mmember untuk disimpan kedalam database.
	#--------------------------------------------------------------------------
	public function signup()
	{
		#--------------------------------------------------------------------------
		# Melakukan pengecekan apakah POST terkirim
		# Data refrensi tidak kosong dan refrensi DIRECT sesuai.
		#--------------------------------------------------------------------------
		if (!empty($_POST) && !empty($_GET['ref']) && password_verify('daftarMember', $_GET['ref']))
		{

		#--------------------------------------------------------------------------
		# Melakukan pengecekan apakah VALUE dari tombol 'TB' memiliki nilai
		# Kemudian mengecek apakah data POST terkirim dari FORM yang sesuai.
		#--------------------------------------------------------------------------
		if (!empty($_POST['tb']) && $_POST['tb'] === 'Sign Up')
		{

		#--------------------------------------------------------------------------
		# Mengambil CAPTCHA dari SESSION dan disimpan kedalam var $caps
		# Melakukan pengecekan apakah nilai CAPTCHA sama.
		#--------------------------------------------------------------------------
		$caps = $this->session->userdata('captcha');

		if($_POST['captcha'] === $caps['word'])
		{

		#--------------------------------------------------------------------------
		# Mengambil data-data dari FORM dan disimpan dalam sebuah array $config
		# Data disimpan pada 'tb_user'
		#--------------------------------------------------------------------------
		$data				= $this->input->post();
		$data['id'] 	  	= 'u'.date('Ymdhis');
		$data['password']	= substr(md5(microtime()), rand(0,26), 5);

		#--------------------------------------------------------------------------
		# Menghilangkan data pada array $config
		#--------------------------------------------------------------------------
		unset($data['tb']);
		unset($data['captcha']);
		unset($data['setuju']);

		$data['bulan_pengajuan'] = date('Y-m-d', strtotime($data['bulan_pengajuan']));

		$this->load->model('Mmember');
			#--------------------------------------------------------------------------
		# Meload data dari FORM kedalam model Mmember
		# Melakukan pengecekan apakah INSERT pada 'tb_user' sesuai dengan tabel
		# Jika sesuai maka muncul notif SUKSES
		#--------------------------------------------------------------------------
		if (mkdir('./Documents/'.$data['id']))
		{
		if($this->Mmember->add_signup($data))
		{

		// KIRIM EMAIL
		$this->load->library('mail');

		$param['alamat'] = $data['email'];
		$param['judul']  = 'Password anda';
		$param['isi'] 	 = "Email anda: ".$data['email']."\nPassword anda: ".$data['password'];

		$this->mail->kirim($param);

		$this->pesan('pesan', 'Signup SUKSES');
		redirect(base_url().'home');

		}

		#--------------------------------------------------------------------------
		# Pengecekan apakah INSERT pada 'tb_user' tidak sesuai dengan tabel
		# Membuat pesan Kesalahan dan diarahkan ke halaman SIGNUP
		#--------------------------------------------------------------------------
		else
		{
		$this->pesan('pesan', 'Terdapat data yang salah');
		redirect(base_url().'home/signup');
		}
		}
		else
		{
			#JIKA TIDAK BISA MEMBUAT FOLDER
			$this->pesan('pesan', 'Terdapat data yang salah');
			redirect(base_url().'home/signup');
		}
		}

		#--------------------------------------------------------------------------
		# Pengecekan jika nilai CAPTCHA tidak sama.
		# Membuat pesna Kesalahan dan diarahkan ke halaman SIGNUP
		#--------------------------------------------------------------------------
		else
		{
		$this->pesan('pesan', 'Captcha tidak match');
		redirect(base_url().'home/signup');
		}
		}

		#--------------------------------------------------------------------------
		# Pengecekan VALUE dari tombol 'TB' tidak memiliki nilai
		# dan data POST terkirim dari FORM tidak sesuai.
		# Diarahkan ke halaman utama atau HOME
		#--------------------------------------------------------------------------
		else
		{
		redirect(base_url());
		}
		}

		#--------------------------------------------------------------------------
		# Data refrensi kosong dan refrensi DIRECT tidak sesuai.
		# Diarahkan ke halaman utama atau HOME
		#--------------------------------------------------------------------------
		else
		{
		redirect(base_url());
		}
	}


	#--------------------------------------------------------------------------
	# METHOD update
	#--------------------------------------------------------------------------
	# Berfungsi sebagai mengambil data dan memperbarui data dari FORM DAFTAR MEMBER
	# Kemudian dilanjutkan kepada model Mmember untuk disimpan kedalam database.
	#--------------------------------------------------------------------------
	public function update()
	{

		#--------------------------------------------------------------------------
		# Melakukan pengecekan apakah POST terkirim
		# Data refrensi tidak kosong dan refrensi DIRECT sesuai.
		#--------------------------------------------------------------------------
		if (!empty($_POST) && !empty($_GET['ref']) && password_verify('editProfil', $_GET['ref']))
		{

		#--------------------------------------------------------------------------
		# Melakukan pengecekan jika VALUE dari tombol 'TB' memiliki nilai
		# Kemudian mengecek jika data POST terkirim dari FORM yang sesuai.
		#--------------------------------------------------------------------------
		if (!empty($_POST['tb']) && $_POST['tb'] === 'Save')
		{

		#--------------------------------------------------------------------------
		# Mempersiapkan pengambilan data dari Mmember
		#--------------------------------------------------------------------------
		$this->load->model('Mmember');

		$data = $this->input->post();

		#--------------------------------------------------------------------------
		# pengecekan jika data yang dipost sesuai dengan 'tb_member'
		# Membuat pesan KEBERHASILAN dan akan diarahkan ke halaman PROFIL
		#--------------------------------------------------------------------------
		if ($this->Mmember->update_profil($data))
		{
		$this->pesan('pesan', 'Data profil berhasil diupdate');
		redirect(base_url().'dashboard/profil');
		}

		else
		#--------------------------------------------------------------------------
		# pengecekan jika data yang dipost tidak sesuai dengan 'tb_member'
		# Membuat pesan KESALAHAN dan akan diarahkan ke halaman PROFIL
		#--------------------------------------------------------------------------
		{
		$this->pesan('pesan', 'Terdapat data yang salah');
		redirect(base_url().'dashboard/profil');
		}
		}

		else
		#--------------------------------------------------------------------------
		# Melakukan pengecekan jika VALUE dari tombol 'TB' tidak memiliki nilai
		# Kemudian mengecek jika data POST terkirim dari FORM yang tidak sesuai.
		# Membuat pesan Kesalahan dan diarahkan ke HALAMAN PROFIL
		#--------------------------------------------------------------------------
		{
		$this->pesan('pesan', 'Terdapat kesalahan');
		redirect(base_url().'dashboard/profil');
		}
		}

		else

		#--------------------------------------------------------------------------
		# Pengecekan Data refrensi kosong dan refrensi DIRECT tidak sesuai.
		# Membuat pesan KESALAHAN dan akan diarahkan ke HALAMAN PROFIL
		#--------------------------------------------------------------------------
		{
		$this->pesan('pesan', 'Terdapat kesalahan');
		redirect(base_url().'dashboard/profil');
		}
	}


	#--------------------------------------------------------------------------
	# METHOD UPLOAD_PROPOSAL
	#--------------------------------------------------------------------------
	# Berfungsi sebagai mengambil data PROPOSAL
	# Kemudian dilanjutkan kepada model Mmember untuk disimpan kedalam database.
	#--------------------------------------------------------------------------
	public function upload_proposal()
	{
		#--------------------------------------------------------------------------
		# Melakukan pengecekan apakah POST terkirim
		# Data refrensi tidak kosong dan refrensi DIRECT sesuai.
		#--------------------------------------------------------------------------
		if (!empty($_POST) && !empty($_GET['ref']) && password_verify('uploadProposal', $_GET['ref']))
		{

		#--------------------------------------------------------------------------
		# Melakukan pengecekan jika VALUE dari tombol 'TB' memiliki nilai
		# Kemudian mengecek jika data POST terkirim dari FORM yang sesuai.
		#--------------------------------------------------------------------------
		if (!empty($_POST['tb_upload']) && $_POST['tb_upload'] === 'Upload')
		{
		#--------------------------------------------------------------------------
		# Persiapan pengambilan data untuk upload
		#--------------------------------------------------------------------------
		$id_user				 = $this->session->userdata('user')['id'];
		$config['upload_path']   = './Documents/'.$id_user.'/';
        $config['allowed_types'] = 'pdf';
        $config['max_size']     = 700;
        $config['file_name']	 = $id_user.'_proposal_magang.pdf';
        $config['overwrite']	 = TRUE;

        $this->load->library('upload', $config);

        #--------------------------------------------------------------------------
		# Pengecekan Untuk proses Upload jika berhasil
		#--------------------------------------------------------------------------
        if ($this->upload->do_upload('proposal'))
        {
        #--------------------------------------------------------------------------
		# Proses Penyimpanan data kedalam Model Mberkas
		#--------------------------------------------------------------------------
    	$this->load->model('Mberkas');

    	#--------------------------------------------------------------------------
		# Proses pengambilan data untuk disimpan
		#--------------------------------------------------------------------------
    	$data['nama_berkas'] = "Proposal Pengajuan Magang";
    	$data['kategori']	 = 'proposal';
    	$data['file']		 = $id_user.'_Proposal_magang.pdf';

    	#--------------------------------------------------------------------------
		# Pengecekan jika data yang akan disimpan sesuai
		# Membuat pesan KEBERHASILAN dan diarahkan ke HALAMAN PENGAJUAN MAGANG
		#--------------------------------------------------------------------------
    	if ($this->Mberkas->save_berkas($data))
    	{
		$this->pesan('pesan', 'Berkas berhasil diunggah');
		redirect(base_url().'dashboard/member');
        }

    	else
    	#--------------------------------------------------------------------------
		# Pengecekan jika data yang akan disimpan tidak sesuai
		# Membuat pesan KESALAHAN dan diarahkan ke HALAMAN PENGAJUAN MAGANG
		#--------------------------------------------------------------------------
    	{
		$this->pesan('pesan', 'Terdapat kesalahan data');
		redirect(base_url().'dashboard/member');
        }
        }

        else
        #--------------------------------------------------------------------------
		# Pengecekan Untuk proses Upload jika GAGAL UPLOAD
        # Membuat PESAN ERROR dan diarahkan ke HALAMAN PENGAJUAN MAGANG
		#--------------------------------------------------------------------------
        {
		$this->pesan('pesan', $this->upload->display_errors());
    	redirect(base_url().'dashboard/member');
        }
		}

		else
		#--------------------------------------------------------------------------
		# Pengecekan jika POST ILLEGAL
		# Membuat PESAN KESALAHAN dan diarahkan ke halaman PENGAJUAN MAGANG
		#--------------------------------------------------------------------------
		{
		$this->pesan('pesan', 'Terjadi kesalahan');
	    redirect(base_url().'dashboard/member');
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


	#--------------------------------------------------------------------------
	# METHOD ADD_MEMBER
	#--------------------------------------------------------------------------
	# Berfungsi sebagai mengambil dan menyimpan data dari FORM DAFTAR MEMBER
	# Kemudian dilanjutkan kepada model Mmember untuk disimpan kedalam database.
	#--------------------------------------------------------------------------
	public function add_member()
	{
		#--------------------------------------------------------------------------
		# Melakukan pengecekan apakah POST terkirim
		# Data refrensi tidak kosong dan refrensi DIRECT sesuai.
		#--------------------------------------------------------------------------
		if (!empty($_POST) && !empty($_GET['ref']) && password_verify('tambahMember', $_GET['ref']))
		{

		#--------------------------------------------------------------------------
		# Melakukan pengecekan jika VALUE dari tombol 'TB' memiliki nilai
		# Kemudian mengecek jika data POST terkirim dari FORM yang sesuai.
		#--------------------------------------------------------------------------
		if (!empty($_POST['tb']) && $_POST['tb'] === 'Add')
		{

		#--------------------------------------------------------------------------
		# Persiapan pengambilan data dari Model Mmember
		#--------------------------------------------------------------------------
		$this->load->model('Mmember');

		#--------------------------------------------------------------------------
		# Pengambilan session
		#--------------------------------------------------------------------------
		$id_user = $this->session->userdata('user')['id'];

		#--------------------------------------------------------------------------
		# Pengecekan Jika User belum terdaftar
		#--------------------------------------------------------------------------
		if (! $this->Mmember->is_registered($id_user, $this->input->post('no_induk')))
		{

		#--------------------------------------------------------------------------
		# Proses Pengambilan data untuk upload foto
		#--------------------------------------------------------------------------
		$config['upload_path']   = './Documents/'.$id_user.'/';
    $config['allowed_types'] = 'jpg|jpeg';
    $config['max_size']      = 300;
    $config['max_height']    = 600;
    $config['max_width']     = 400;
    $config['file_name']	 = $id_user.'_foto_'.$this->input->post('no_induk').'.jpg';
    $config['overwrite']	 = TRUE;

	    #--------------------------------------------------------------------------
		# Pengambilan data dari direktori
		#--------------------------------------------------------------------------
	    $this->load->library('upload', $config);

	    #--------------------------------------------------------------------------
		# Pengecekan Untuk proses Upload jika BERHASIL
		#--------------------------------------------------------------------------
        if($this->upload->do_upload('foto'))
        {

    	#--------------------------------------------------------------------------
		# Proses Penyimpanan data
		#--------------------------------------------------------------------------
    	$data = $this->input->post();

    	#--------------------------------------------------------------------------
		# Menghapus data 'tb'
		#--------------------------------------------------------------------------
    	unset($data['tb']);

    	#--------------------------------------------------------------------------
		# Pengecekan Untuk penambahan data member BERHASIL
		# Membuat PESAN KEBERHASILAN dan diarahkan ke HALAMAN MEMBER
		#--------------------------------------------------------------------------
    	if ($this->Mmember->add_member($data))
    	{
		$this->pesan('pesan', 'Member berhasil ditambah');
		redirect(base_url().'dashboard/member');
    	}

    	else
    	#--------------------------------------------------------------------------
		# Pengecekan Untuk penambahan data member GAGAL
    	# Membuat pesan KESALAHAN dan diarahkan ke HALAMAN MEMBER
		#--------------------------------------------------------------------------
    	{
		$this->pesan('pesan', 'Terdapat data yang salah');
		redirect(base_url().'dashboard/member');
    	}
	    }

        else
        #--------------------------------------------------------------------------
		# Pengecekan  Untuk proses Upload jika GAGAL
        # Membuat Pesan ERROR dan diarahkan ke HALAMAN MEMBER
		#--------------------------------------------------------------------------
        {
    	$this->pesan('pesan', $this->upload->display_errors());
    	redirect(base_url().'dashboard/member');
	    }
		}

		else
		#--------------------------------------------------------------------------
		# Pengecekan Jika User SUDAH terdaftar
		# Membuat PESAN TERDAFTAR dan diarahkan ke HALAMAN MEMBER
		#--------------------------------------------------------------------------
		{
		$this->pesan('pesan', 'Member sudah terdaftar');
		redirect(base_url().'dashboard/member');
		}
		}

		else
		#--------------------------------------------------------------------------
		# Pengecekan Jika POST ILLEGAL
		# Membuat Pesan KESALAHAN dan diarahkan ke HALAMAN MEMBER
		#--------------------------------------------------------------------------
		{
		$this->pesan('pesan', 'Terjadi kesalahan');
		redirect(base_url().'dashboard/member');
		}
		}

		else
		#--------------------------------------------------------------------------
		# PENGECEKAN JIKA DATA REFERENSI ILLEGAL
		# Membuat PESAN ERROR
		#--------------------------------------------------------------------------
		{
		show_404();
		}
	}


	#--------------------------------------------------------------------------
	# METHOD EDIT_MEMBER
	#--------------------------------------------------------------------------
	# Berfungsi sebagai mengambil dan mengubah data dari FORM  MEMBER
	# Kemudian dilanjutkan kepada model Mmember untuk disimpan kedalam database.
	#--------------------------------------------------------------------------
	public function edit_member()
	{
		#--------------------------------------------------------------------------
		# Melakukan pengecekan apakah POST terkirim
		# Data refrensi tidak kosong dan refrensi DIRECT sesuai.
		#--------------------------------------------------------------------------
		if (!empty($_POST) && !empty($_GET['ref']) && password_verify('editMember', $_GET['ref']))
		{

		#--------------------------------------------------------------------------
		# Melakukan pengecekan jika VALUE dari tombol 'TB' memiliki nilai
		# Kemudian mengecek jika data POST terkirim dari FORM yang sesuai.
		#--------------------------------------------------------------------------
		if (!empty($_POST['tb']) && $_POST['tb'] === 'Edit')
		{

		#--------------------------------------------------------------------------
		# Mempersiapkan pengambilan data dari Model Mmember
		#--------------------------------------------------------------------------
		$this->load->model('Mmember');
		#--------------------------------------------------------------------------
		# Pengambilan session
		#--------------------------------------------------------------------------
		$id_user = $this->session->userdata('user')['id'];

		#--------------------------------------------------------------------------
		# Pengecekan jika user sudah mendaftar
		#--------------------------------------------------------------------------
		if ($_FILES['error']==0)
		{

		#--------------------------------------------------------------------------
		# Pengambilan data (foto) [# Jika belum, upload foto dulu.]
		#--------------------------------------------------------------------------
		$config['upload_path']   = './Documents/'.$id_user.'/';
        $config['allowed_types'] = 'jpg|jpeg';
        $config['max_size']      = 300;
        $config['max_height']    = 600;
        $config['max_width']     = 400;
        $config['file_name']	 = $id_user.'_foto_'.$this->input->post('no_induk').'.jpg';
        $config['overwrite']	 = TRUE;

        #--------------------------------------------------------------------------
		# Persiapan pengambilan foto dari directory
		#--------------------------------------------------------------------------
        $this->load->library('upload', $config);

        #--------------------------------------------------------------------------
		# Pengecekan untuk upload foto
		# Menampilkan pesan dan diarahkan ke HALAMAN MEMBER
		#--------------------------------------------------------------------------
        if(! $this->upload->do_upload('foto'))
        {
    	$this->pesan('pesan', $this->upload->display_errors());
    	redirect(base_url().'dashboard/member');
        }
		}

		#--------------------------------------------------------------------------
		# Proses simpan data
		#--------------------------------------------------------------------------
		$data = $this->input->post();

		#--------------------------------------------------------------------------
		# Menghapus data
		#--------------------------------------------------------------------------
    	unset($data['tb']);

    	#--------------------------------------------------------------------------
		# Pengecekan jika data yang diubah sesuai dengan id user
		# Menampilkan pesan KEBERHASILAN dan diarahkan ke HALAMAN MEMBER
		#--------------------------------------------------------------------------
    	if ($this->Mmember->edit_member($this->input->get('id'), $data))
    	{
		$this->pesan('pesan', 'Data berhasil disimpan');
		redirect(base_url().'dashboard/member');
    	}

    	else
    	#--------------------------------------------------------------------------
		# Pengecekan jika data yang diubah tidak sesuai dengan id user
		# Menampilkan pesan KESALAHAN dan diarahkan ke HALAMAN MEMBER
		#--------------------------------------------------------------------------
    	{
		$this->pesan('pesan', 'Terdapat data yang salah');
		redirect(base_url().'dashboard/member');
    	}
		}

		else
		#--------------------------------------------------------------------------
		# Pengecekan jika POST ILLEGAL
		# Menampilkan pesan KESALAHAN dan diarahkan ke HALAMAN MEMBER
		#--------------------------------------------------------------------------
		{
		$this->pesan('pesan', 'Terjadi kesalahan');
		redirect(base_url().'dashboard/member');
		}
		}

		else
		#--------------------------------------------------------------------------
		# Pengecekan jika REFERENSI ILLEGAL
		# Menampilkan pesan ERROR
		#--------------------------------------------------------------------------
		{
		show_404();
		}
	}


	#--------------------------------------------------------------------------
	# METHOD PENGAJUAN
	#--------------------------------------------------------------------------
	# Berfungsi sebagai mengambil data pengajuan
	# Kemudian dilanjutkan kepada model Mmember untuk disimpan kedalam database.
	#--------------------------------------------------------------------------
	public function pengajuan()
	{
		#--------------------------------------------------------------------------
		# Pengecekan GET TERKIRIM
		#--------------------------------------------------------------------------
		if (! empty($_GET))
		{
		#--------------------------------------------------------------------------
		# Pengecekan DATA REFERENSI TIDAK KOSONG
		#--------------------------------------------------------------------------
		if (!empty($_GET['ref']) && password_verify('ajukanMagang', $this->input->get('ref')))
		{

		#--------------------------------------------------------------------------
		# Mempersiapkan pengambilan data dari Mmember
		#--------------------------------------------------------------------------
		$this->load->model('Mmember');

		#--------------------------------------------------------------------------
		# Pengecekan jika data SESUAI
		# Membuat PESAN KEBERHASILAN dan diarahkan ke HALAMAN MEMBER
		#--------------------------------------------------------------------------
		if ($this->Mmember->finalize())
		{
		$this->pesan('pesan', 'Member telah diajukan. Harap menunggu selama proses persetujuan');
		redirect(base_url().'dashboard/member');
		}

		else
		#--------------------------------------------------------------------------
		# Pengecekan jika data TIDAK SESUAI
		# Membuat PESAN KESALAHAN dan diarahkan ke HALAMAN MEMBER
		#--------------------------------------------------------------------------
		{
		$this->pesan('pesan', 'Terjadi kesalahan dalam proses pengajuan');
		redirect(base_url().'dashboard/member');
		}
		}

		else
		#--------------------------------------------------------------------------
		# Pengecekan jika DATA REFERENSI ILLEGAL
		# Membuat PESAN ERROR
		#--------------------------------------------------------------------------
		{
		show_404();
		}
		}

		else
		#--------------------------------------------------------------------------
		# Pengecekan jika GET ILLEGAL
		# Membuat PESAN KESALAHAN dan diarahkan ke HALAMAN MEMBER
		#--------------------------------------------------------------------------
		{
		$this->pesan('pesan', 'Terjadi kesalahan');
		redirect(base_url().'dashboard/member');
		}
	}


	public function verifikasi()
	{
		if (isset($_GET))
		{
			$this->load->model("Mmember");

			if ($this->Mmember->verifikasi($_GET['id'], $_GET['status'], TRUE))
			{
				redirect(base_url().'dashboard/persetujuan_magang');
			}
			else
			{
				$this->pesan("pesan", "Terjadi kesalahan");
			}
		}
	}

	########## JSON #############


	#--------------------------------------------------------------------------
	# METHOD GET_PEMBINA
	#--------------------------------------------------------------------------
	# Parameter berdasarkan id_unit
	# Berfungsi sebagai mengambil data pembina
	# Kemudian dilanjutkan kepada model Mmember untuk disimpan kedalam database.
	#--------------------------------------------------------------------------
	public function get_pembina($id_unit)
	{
		#--------------------------------------------------------------------------
		# Persiapan Pengambilan data dariModel Mmember
		#--------------------------------------------------------------------------
		$this->load->model('Mmember');

		#--------------------------------------------------------------------------
		# Proses Pengambilan data ditampung dalam variabel $result
		#--------------------------------------------------------------------------
		$result = $this->Mmember->get(array('tabel'=>'tb_pegawai', 'where'=>array('id_unitkerja'=>$id_unit, 'is_pembina'=>'1')))->result_array();

		$data = array();

		#--------------------------------------------------------------------------
		#
		#--------------------------------------------------------------------------
		foreach ($result as $key) {
			$data[$key['nip']] = $key['nama'];
		}

		echo json_encode($data);
	}


	#--------------------------------------------------------------------------
	# METHOD AJUKAN_PEMBINA
	#--------------------------------------------------------------------------
	# Berfungsi sebagai mengambil data pembina
	# Kemudian dilanjutkan kepada model Mmember untuk disimpan kedalam database.
	#--------------------------------------------------------------------------
	public function ajukan_pembina()
	{
		#--------------------------------------------------------------------------
		# Pengecekan Apakah POST terkirim
		#--------------------------------------------------------------------------
		if(!empty($_POST))
		{

		#--------------------------------------------------------------------------
		# Jika terkirim , Persiapan pengambilan data dari Model Mmember
		#--------------------------------------------------------------------------
		$this->load->model('Mmember');

		#--------------------------------------------------------------------------
		# Proses Pengambilan data ditampung dalam variabel $result
		#--------------------------------------------------------------------------
		$result = $this->Mmember->get(array('tabel'=>'tb_pengajuan_pembina', 'where'=>array('id_member'=>$_POST['id_member'], 'status>='=>'0')));

		#--------------------------------------------------------------------------
		# Pengecekan apakah data result ada dalam DB
		#--------------------------------------------------------------------------
		if ($result->num_rows() > 0)
		{
		#--------------------------------------------------------------------------
		# Jika tidak ada membuat PESAN ERROR
		#--------------------------------------------------------------------------
		show_404();
		}

		else
		#--------------------------------------------------------------------------
		# Jika Ada maka data diambil dan dimasukkan dalam Model Mmember
		#--------------------------------------------------------------------------
		{
		$con['data']  = array('id'=>date('Ymdhis'), 'id_member'=>$_POST['id_member'], 'pembina'=>$_POST['nip'], 'status'=>'0', 'created_date'=>date('Y-m-d h:i:s'));
		$con['tabel'] = 'tb_pengajuan_pembina';
		$this->load->model('Mmember');
		$this->Mmember->insert($con);
		}
		}

		else
		#--------------------------------------------------------------------------
		# Pengecekan JIKA POST TIDAK TERKIRIM
		# Membuat PESAN ERROR
		#--------------------------------------------------------------------------
		{
		show_404();
		}
	}



	#--------------------------------------------------------------------------
	# METHOD AJUKAN_FINAL
	#--------------------------------------------------------------------------
	# Berfungsi sebagai mengambil data pembina
	# Kemudian dilanjutkan kepada model Mmember untuk disimpan kedalam database.
	#--------------------------------------------------------------------------
	public function ajukan_final()
	{
		#--------------------------------------------------------------------------
		# Pengambilan session dari user
		#--------------------------------------------------------------------------
		$id = $this->session->userdata('rekap');

		#--------------------------------------------------------------------------
		# Pengecekan apakah terdapat ID
		#--------------------------------------------------------------------------
		if (!empty($id))
		{
		# step 1: Ubah ID menjadi 1
		# step 2: Kirim email
		$this->load->model('Mmember');

		if ($this->Mmember->finalize_diklat($id))
		{
		$this->session->unset_userdata('rekap');

		$this->pesan('pesan', 'Data berhasil diajukan');
		redirect(base_url().'dashboard/pengajuan_unit');
		# KIRIM EMAIL
		###
		}
		else
		{
		$this->pesan('pesan', 'Terjadi kesalahan');
		redirect(base_url().'dashboard/detail_pengajuan_diklat');
		}

		}
		else
		{
		# Jika belum FINAL/data tidak ada
		$this->pesan('pesan', 'Data kosong atau terjadi kesalahan');
		redirect(base_url().'dashboard/pengajuan_diklat');
		}
	}



	#--------------------------------------------------------------------------
	# METHOD VERIFIKASI_DIKLAT
	#--------------------------------------------------------------------------
	# Berfungsi sebagai mengambil
	# Kemudian dilanjutkan kepada model Mmember untuk disimpan kedalam database.
	#--------------------------------------------------------------------------
	public function verifikasi_diklat()
	{

		#--------------------------------------------------------------------------
		# Pengecekan jika POST TERKIRIM
		#--------------------------------------------------------------------------
		if (! empty($_POST))
		{
		#--------------------------------------------------------------------------
		# Persiapan pengambilan data dari model Mmember
		#--------------------------------------------------------------------------
		$this->load->model('Mmember');

		if ($this->Mmember->verifikasi_diklat($_POST))
		{
			// KIRIM NOTIF
			if ($_POST['status']!=-1) {
				$this->load->library('mail');

				$param['alamat'] = $this->Mmember->get_email($_POST['id_pengajuan']);
				$param['judul']	 = 'Notifikasi pemberitahuan';

				if ($_POST['status'] == '3')
				{
					$param['isi'] = 'Selamat status anda telah disetujui, silahkan mengunjungi portal untuk info lebih lanjut';
				}
				elseif($_POST['status'] == '0')
				{
					$param['isi'] = 'Mohon maaf anda tidak diterima';
				}

				$this->mail->kirim($param);
			}

		}
		else
		{
			show_404();
		}
		}

		else
		#--------------------------------------------------------------------------
		# Pengecekan jika POST TIDAK TERKIRIM
		# Membuat Pesan ERROR
		#--------------------------------------------------------------------------
		{
		show_404();
		}
	}

	public function alternatif()
	{
		if (! empty($_POST))
		{
			$data = $this->input->post();

			$data['alasan_penolakan'] = $data['alasan_penolakan'].' Tanggal alternatif: '.$data['tanggal'];
			$data['status'] = '0';
			$id = $data['id_mem'];

			unset($data['tb']);
			unset($data['id_mem']);
			unset($data['id_mem']);
			unset($data['tanggal']);

			$this->load->model('Mmember');

			$con['tabel'] = 'tb_member';
			$con['data']  = $data;
			$con['where'] = array('id'=>$id);

			$result = $this->Mmember->update($con);

			if ($result) {
				$this->pesan('pesan', 'Berhasil diajukan');
				redirect(base_url().'dashboard/pengajuan_unit');
			}
			else
			{
				$this->pesan('pesan', 'Terjadi kesalahan');
				redirect(base_url().'dashboard/pengajuan_unit');
			}
		}
	}

	public function cek_email()
	{
		$mail = '';
		$mail = $_POST['mail'];

		if (! empty($mail))
		{
			$this->load->model("Mmember");

			if ($this->Mmember->cek_email($mail))
			{
				show_404();
			}
		}
		else
		{
			show_404();
		}
	}
}

?>
