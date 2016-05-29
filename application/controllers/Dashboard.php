<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller
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
	}

	#----------------------------------------------------------------------------
	# KONSTRUKTOR
	#----------------------------------------------------------------------------
	# Deklarasi ATTRIBUT
	#----------------------------------------------------------------------------
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

		#--------------------------------------------------------------------------
		# Melakukan Pencarian apakah Menu terdapat pada session
		#--------------------------------------------------------------------------
				$p = function($ned, $has){ foreach ($has as $key) { if ($key['link'] == $ned) {return TRUE;}}return FALSE;};

				if ($p(strtolower(uri_string()), $this->user['menu']))
				{
		#--------------------------------------------------------------------------
		# Jika ID MENU ada pada ARRAY
		#--------------------------------------------------------------------------
					return call_user_func_array(array($this, $method), $param);
				}

				else
		#--------------------------------------------------------------------------
		# Jika ID MENU tidak ada pada ARRAY / Menu bukan haknya
		# Redirect ke DASHBOARD
		#--------------------------------------------------------------------------
				{
					redirect(base_url().'Dashboard/');
				}
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


	#----------------------------------------------------------------------------
	# Method init ($view , $data)
	#----------------------------------------------------------------------------
	# Berfungsi sebagai inisialisasi VIEW
	# Karena setiap kali akan me-load VIEW, beberapa komponen akan selalu di-load
	# terlebih dahulu seperti 'vheader', 'vsidebar', 'vfooter'.
	#
	# Memiliki 2 parameter: $view dan $data.
	# $view 	: Berisi VIEW yang akan diload
	# $data 	: Berisi data yang akan diparsing kedalam VIEW
	#
	# Parameter meiliki nilai default NULL
	#----------------------------------------------------------------------------
	private function init($view=NULL, $data=NULL)
	{
		#--------------------------------------------------------------------------
		# Mengambil list menu dari SESSION
		# List ini kemudian akan diparsing kedalam VIEW sidebar
		#--------------------------------------------------------------------------
		$data1['menu'] 	= $this->user['menu'];
		$header['nama'] = $this->session->userdata('user')['nama'];

		if ($this->user['level'] == 4)
		{
			$this->load->model('Mnotifikasi');
			$header['notifikasi'] = $this->Mnotifikasi->get_pesan($this->user['id']);
		}

		#--------------------------------------------------------------------------
		# Me-load VIEW header dan SIDEBAR
		# Data menu diparsing kedalam VIEW SIDEBAR
		#--------------------------------------------------------------------------

		$this->load->view('Dashboard/vheader', $header);
		$this->load->view('Dashboard/vsidebar', $data1);

		#--------------------------------------------------------------------------
		# Mengecek apakah parameter VIEW tidak bernilai NULL?
		#--------------------------------------------------------------------------
		if ($view !== NULL)
		{

		#--------------------------------------------------------------------------
		# Jika tidak bernilai NULL, maka VIEW spesifik di-load
		# Mengecek apakah parameter DATA tidak bernilai NULL?
		#--------------------------------------------------------------------------
			if ($data !== NULL)
			{

		#--------------------------------------------------------------------------
		# Jika tidak bernilai NULL, maka terdapat data yang akan diparsing
		# kedalam VIEW
		#--------------------------------------------------------------------------
				$this->load->view('Dashboard/'.$view, $data);
			}

			else
		#--------------------------------------------------------------------------
		# Jika bernilai NULL, maka VIEW di-load tanpa parsing data.
		#--------------------------------------------------------------------------
			{
				$this->load->view('Dashboard/'.$view);
			}
		}

		#--------------------------------------------------------------------------
		# Load FOOTER
		#--------------------------------------------------------------------------
		$this->load->view('Dashboard/vfooter');
	}


	#----------------------------------------------------------------------------
	# Method INDEX
	#----------------------------------------------------------------------------
	# Berfungsi untuk memulai halaman DASHBOARD.
	# Menu akan diload sesuai dengan data yang terdapat pada DATABASE
	#----------------------------------------------------------------------------
	public function index()
	{
		#--------------------------------------------------------------------------
		# Pengecekan jika TELAH LOGIN
		#--------------------------------------------------------------------------
		if ($this->session->user['level'] === '2' OR $this->session->user['level'] === '5')
		{
			$this->insight();
		}
		else
		{
			$this->init('vmenu-dash');
		}
	}

	#----------------------------------------------------------------------------
	# Method ADMIN
	#----------------------------------------------------------------------------
	# Berfungsi untuk memanggil data dari tabel 'tb_admin' dan 'tb_pegawai'
	#----------------------------------------------------------------------------
	public function admin()
	{
		#--------------------------------------------------------------------------
		# Mempersiapkan pengambilan data dari MODEL Mmember
		#--------------------------------------------------------------------------
		$this->load->model('Mmember');


		#--------------------------------------------------------------------------
		# Persiapan pengambilan data pada tabel 'tb_admin'
		#--------------------------------------------------------------------------
		$con['tabel'] 	= 'tb_admin';
		$con['select']	= 'tb_admin.nip, tb_pegawai.nama, tb_unitkerja.deskripsi, jabatan, tb_level.nama as level, is_pembina, status';
		$con['join'] 	= array('tb_pegawai'=>'tb_admin.nip = tb_pegawai.nip', 'tb_unitkerja'=>'tb_pegawai.id_unitkerja = tb_unitkerja.id', 'tb_level'=>'tb_admin.level = tb_level.level');
		$con['where']	= array('tb_admin.deleted'=>'0', 'tb_pegawai.deleted'=>'0');

		#--------------------------------------------------------------------------
		# Kemudian data hasil dimasukan kedalam var $dat
		#--------------------------------------------------------------------------
		$data['dat'] 	= $this->Mmember->get($con)->result();

		#--------------------------------------------------------------------------
		# Hasil pengambilan data di tampilkan ke Halaman ADMINISTRASI
		#--------------------------------------------------------------------------
		$this->init('vmenu-administrasi-read',$data);
	}


	#----------------------------------------------------------------------------
	# METHODE ADMIN_FORM
	#----------------------------------------------------------------------------
	# berfungsi untuk mengambil data 'tb_admin' dan 'tb_pegawai' dari database
	#--------------------------------------------------------------------------
	public function admin_form()
	{
		#--------------------------------------------------------------------------
		# Mempersiapkan pengambilan data dari MODEL Mmember
		#--------------------------------------------------------------------------
		$this->load->model('Mmember');

		#--------------------------------------------------------------------------
		# Pengecekan jika GET terkirim
		#--------------------------------------------------------------------------
		if (!empty($_GET))
		{

		#--------------------------------------------------------------------------
		# Melakukan pengecekan apakah GET terkirim
		# Data refrensi tidak kosong dan refrensi DIRECT sesuai.
		#--------------------------------------------------------------------------
			if (!empty($_GET['ref']) && !empty($_GET['id']) && $_GET['ref'] === md5('editAdmin')) {


		#--------------------------------------------------------------------------
		# Persiapan pengambilan data pada tabel 'tb_admin'
		#--------------------------------------------------------------------------
				$con['tabel'] 	= 'tb_admin';
				$con['join']	= array('tb_pegawai'=>'tb_admin.nip = tb_pegawai.nip');
				$con['where']	= array('tb_admin.nip'=>$_GET['id']);
				$dat['detail']	= $this->Mmember->get($con)->result();
				$dat['detail']	= $dat['detail'][0];
			}
		}

		#--------------------------------------------------------------------------
		# Kemudian data hasil dimasukan kedalam var $dat
		#--------------------------------------------------------------------------
		$dat['level']	= $this->Mmember->get(array('tabel'=>'tb_level'))->result();
		$dat['unit'] 	= $this->Mmember->get(array('tabel'=>'tb_unitkerja'))->result();
		$dat['captcha']	= $this->captcha();

		#--------------------------------------------------------------------------
		# Hasil pengambilan data di tampilkan ke Halaman ADMINISTRASI
		#--------------------------------------------------------------------------
		$this->init('vmenu-administrasi-form', $dat);
	}


	#--------------------------------------------------------------------------
	# METHODE LEVEL
	#--------------------------------------------------------------------------
	# berfungsi untuk mengambil data level
	#--------------------------------------------------------------------------
	public function level()
	{
		#--------------------------------------------------------------------------
		# Mempersiapkan pengambilan data dari MODEL Mlevel
		#--------------------------------------------------------------------------
		$this->load->model('Mlevel');

		#--------------------------------------------------------------------------
		# Proses pengambilan data ditampung dalam variabel $con
		#--------------------------------------------------------------------------
		$con['data']		= $this->Mlevel->get_data();
		$con['next_level']	= $this->Mlevel->get_next_level();

		#--------------------------------------------------------------------------
		# Hasil pengambilan data di tampilkan ke Halaman LEVEL
		#--------------------------------------------------------------------------
		$this->init('vlevel-add', $con);
	}

	#--------------------------------------------------------------------------
	# METHODE MASTER_MENU
	#--------------------------------------------------------------------------
	# berfungsi untuk memanggil Menu yang ada
	#--------------------------------------------------------------------------
	public function master_menu()
	{

		#--------------------------------------------------------------------------
		# Mempersiapkan pengambilan data dari MODEL Mmenu
		#--------------------------------------------------------------------------
		$this->load->model('Mmenu');

		#--------------------------------------------------------------------------
		# Proses pengambilan data ditampung dalam variabel $con
		#--------------------------------------------------------------------------
		$con['data']		= $this->Mmenu->get_data();
		$con['next_id']		= $this->Mmenu->get_next_id();

		#--------------------------------------------------------------------------
		# Hasil pengambilan data di tampilkan ke Halaman MENU MASTER
		#--------------------------------------------------------------------------
		$this->init('vmenu-master', $con);
	}

	#--------------------------------------------------------------------------
	# METHODE HAK_AKSES
	#--------------------------------------------------------------------------
	# berfungsi untuk memanggil menu yang bisa diakses sesuai dengan user
	#--------------------------------------------------------------------------
	public function hak_akses()
	{

		#--------------------------------------------------------------------------
		# Melakukan pengecekan apakah GET terkirim
		# Data refrensi tidak kosong dan refrensi DIRECT sesuai.
		#--------------------------------------------------------------------------
		if (!empty($_GET) && isset($_GET['ref']) && isset($_GET['level']) && isset($_GET['nama']))
		{

		#--------------------------------------------------------------------------
		# Mempersiapkan Pengambilan data dari Model Mmenu dan Makses
		#--------------------------------------------------------------------------
			$this->load->model('Mmenu');
			$this->load->model('Makses');

		#--------------------------------------------------------------------------
		# Proses Pengambilan data yang ditampung dalam variabel $con
		#--------------------------------------------------------------------------
			$con['par']  	= array('level'=>$_GET['level'], 'nama'=>$_GET['nama']);
			$con['hak'] 	= $this->Makses->get_hak_akses($_GET['level']);
			$con['master_menu']	= $this->Mmenu->get_data();

		#--------------------------------------------------------------------------
		# Hasil pengambilan data di tampilkan ke Halaman MENU PRIVILEGES
		#--------------------------------------------------------------------------
			$this->init('vmenu-privileges', $con);
		}

		else
		#--------------------------------------------------------------------------
		# Data refrensi kosong dan refrensi DIRECT tidak sesuai sesuai.
		# Akan diarahkan ke HALAMAN LEVEL
		#--------------------------------------------------------------------------
		{
			redirect(base_url().'dashboard/level');
		}
	}

	#--------------------------------------------------------------------------
	# METHODE BIDANG
	#--------------------------------------------------------------------------
	# berfungsi untuk memanggil bidang keahlian
	#--------------------------------------------------------------------------
	public function bidang()
	{
		#--------------------------------------------------------------------------
		# Mempersiapkan Pengambilan data dari Model Mmenu dan Mbidang
		#--------------------------------------------------------------------------
		$this->load->model('Mmenu');
		$this->load->model('Mbidang');

		#--------------------------------------------------------------------------
		# Proses Pengambilan data yang ditampung dalam variabel $con
		#--------------------------------------------------------------------------
		$con['bidang']	= $this->Mbidang->get_data();
		$con['id']		= $this->Mbidang->get_next_id();

		#--------------------------------------------------------------------------
		# Hasil pengambilan data di tampilkan ke Halaman MENU BIDANG
		#--------------------------------------------------------------------------
		$this->init('vmenu-bidang', $con);
	}

	#--------------------------------------------------------------------------
	# METHODE PROFIL
	#--------------------------------------------------------------------------
	# berfungsi untuk memanggil PROFIL dari USER
	#--------------------------------------------------------------------------
	public function profil()
	{
		#--------------------------------------------------------------------------
		# Persiapan pengambilan data dari Model Mlevel
		#--------------------------------------------------------------------------

		$this->load->model('Mlevel');
		$user 	= $this->session->userdata('user');
		$kat	= $this->Mlevel->get_kategori($user['level']);
		$kat 	= strtolower($kat);

		switch (strtolower($kat)) {
			case 'super':
			$this->load->model('Madmin');
			$data['profil'] = $this->Madmin->get_profil($this->user['nip'])[0];
			$data['unit']	= $this->Madmin->get(array('tabel'=>'tb_unitkerja'))->result_array();
			$this->init('vmenu-profil-super', $data);
			break;
			case 'diklat':
			$this->load->model('Madmin');
			$data['profil'] = $this->Madmin->get_profil($this->user['nip'])[0];
			$data['unit']	= $this->Madmin->get(array('tabel'=>'tb_unitkerja'))->result_array();
			$this->init('vmenu-profil-super', $data);
			break;
			case 'unit_kerja':
			$this->load->model('Madmin');
			$data['profil'] = $this->Madmin->get_profil($this->user['nip'])[0];
			$data['unit']	= $this->Madmin->get(array('tabel'=>'tb_unitkerja'))->result_array();
			$this->init('vmenu-profil-super', $data);
			break;
			case 'user':
			$this->load->model('Mmember');
			$data['profil'] = $this->Mmember->get_profil($user['id'])[0];
			$data['jenis']	= $this->Mmember->get(array('tabel'=>'tb_jenis'))->result_array();
			$this->init('vmenu-profil-'.$kat, $data);
			break;

			default:
			show_404();
			break;
		}
	}

	#--------------------------------------------------------------------------
	# METHODE MEMBER
	#--------------------------------------------------------------------------
	# berfungsi untuk memanggil data dari form member
	#--------------------------------------------------------------------------
	public function member()
	{
		#--------------------------------------------------------------------------
		# Persiapan pengambilan data dari Model Mmember
		#--------------------------------------------------------------------------
		$this->load->model('Mmember');

		#--------------------------------------------------------------------------
		# Proses pengambilan session user
		#--------------------------------------------------------------------------
		$id_user	 	= $this->session->userdata('user')['id'];

		#--------------------------------------------------------------------------
		# Proses pengambilan data
		#--------------------------------------------------------------------------
		$con['data'] 	= $this->Mmember->get_member($id_user);
		$con['berkas']	= $this->Mmember->get(array('tabel'=>'tb_berkas', 'where'=>array('id_user'=>$id_user, 'kategori'=>'proposal')))->result_array();

		$par = function($data)
		{
			foreach ($data as $key) {

		#--------------------------------------------------------------------------
		# Pengecekan jika 'status' lebih dari -1
		# Nilai pengembalian false
		#--------------------------------------------------------------------------
				if ($key['status'] > -1)
				{
					return FALSE;
				}
			}

		#--------------------------------------------------------------------------
		# Pengecekan jika 'status' kurang dari -1
		# Nilai pengembalian TRUE
		#--------------------------------------------------------------------------
			return TRUE;
		};

		#-------------------------------------------------------------------------------
		# Proses setelah pengecekan sebelumnya data yang didapat akan ditampung di $con
		#-------------------------------------------------------------------------------
		$con['param'] = ((empty($con['data']) || $par($con['data'])) && !empty($con['berkas']));

		#--------------------------------------------------------------------------
		# Hasil pengambilan data ditampilkan ke HALAMAN MEMBER
		#--------------------------------------------------------------------------
		$this->init('vmenu-member-user', $con);
	}

	#--------------------------------------------------------------------------
	# METHODE MEMBER_FORM
	#--------------------------------------------------------------------------
	# berfungsi untuk memanggil data dari form member
	#--------------------------------------------------------------------------
	public function member_form()
	{
		#--------------------------------------------------------------------------
		# Pengecekan JIKA GET TERKIRIM
		#--------------------------------------------------------------------------
		if (! empty($_GET))
		{

		#--------------------------------------------------------------------------
		# Pengecekan jika REFERENSI TIDAK KOSONG dan data DIRECT SESUAI
		#--------------------------------------------------------------------------
			if (!empty($_GET['ref']) && !empty($_GET['id']) && password_verify('editMember', $this->input->get('ref')))
			{
		#--------------------------------------------------------------------------
		# Persiapan pengambilan data dari model MMember
		#--------------------------------------------------------------------------
				$this->load->model('Mmember');

		#--------------------------------------------------------------------------
		# Pengambilan session dari user
		#--------------------------------------------------------------------------
				$id_user 		= $this->session->userdata('user')['id'];
				$id_member		= $this->input->get('id');

		#--------------------------------------------------------------------------
		# Proses Pengambilan data
		#--------------------------------------------------------------------------
				$data['detail'] = $this->Mmember->get_detail_member($id_user, $id_member);
				$data['id']		= $this->input->get('id');

		#--------------------------------------------------------------------------
		# Hasil pengambilan data ditampilkan dalam view MENU FORM MEMBER
		#--------------------------------------------------------------------------
				$this->init('vmenu-member-form', $data);
			}

			else
		#--------------------------------------------------------------------------
		# PENGECEKAN JIKA REFERENSI ILLEGAL
		# akan membuat pesan ERROR
		#--------------------------------------------------------------------------
			{
				echo "ERROR DISINI";
			//show_404();
			}
		}

		else
		#--------------------------------------------------------------------------
		# Pengecekan jika GET TIDAK TERKIRIM makan akan diarahkan ke view Member
		#--------------------------------------------------------------------------
		{
			$this->init('vmenu-member-form');
		}
	}

	#--------------------------------------------------------------------------
	# METHODE PERSETUJUAN_MAGANG
	#--------------------------------------------------------------------------
	# berfungsi untuk mengubah status data pengajuan magang
	#--------------------------------------------------------------------------
	public function persetujuan_magang()
	{
		#--------------------------------------------------------------------------
		# Persiapan pengambilan data dari model Mmember
		#--------------------------------------------------------------------------
		$this->load->model('Mmember');
		$this->load->model('Mkuota');

		#--------------------------------------------------------------------------
		# Proses Pengambilan data dari 'tb_bidang'
		#--------------------------------------------------------------------------
		$data['bidang'] = $this->Mmember->get(array('tabel'=>'tb_bidang'))->result_array();

		#--------------------------------------------------------------------------
		# Pengecekan jika GET TERKIRIM
		#--------------------------------------------------------------------------
		if (!empty($_GET))
		{

		#--------------------------------------------------------------------------
		# Proses mengolah inputan yang ditanpung dalam variabel $cari
		#--------------------------------------------------------------------------
			$cari = $this->input->get();

		#--------------------------------------------------------------------------
		# Penghapusan data pada 'tb' dan 'filter'
		#--------------------------------------------------------------------------
			unset($cari['tb']);
			unset($cari['filter']);

		#--------------------------------------------------------------------------
		# Melakukan pencarian data
		#--------------------------------------------------------------------------
			$data['member'] = $this->Mmember->get_pengajuan_member($cari);
			$data['cari']	= $cari;
		}

		else
		#--------------------------------------------------------------------------
		# Pengecekan jika GET tidak terkirim
		# data diproses sesuai dengan default
		#--------------------------------------------------------------------------
		{
			$data['member'] = $this->Mmember->get_pengajuan_member();
		}

		#--------------------------------------------------------------------------
		# Hasil pencarian/pengambilan data akan ditampilkan dalam View Persetujuan
		#--------------------------------------------------------------------------
		$this->load->model('Minsight');
		$data['total'] = array( 'terima' => $this->Minsight->total_magang_terima(),
								'tolak' => $this->Minsight->total_magang_tolak(),
								'pending'=>$this->Minsight->total_magang_pending()
							  );
		$data['tahun'] = $this->Mkuota->get_kuota();
		//print_r($data['member']);
		$this->init('vmenu-persetujuan', $data);
	}

	#--------------------------------------------------------------------------
	# METHODE PENGAJUAN_DIKLAT
	#--------------------------------------------------------------------------
	# berfungsi untuk memanggil data dari hasil Pengajuan
	#--------------------------------------------------------------------------
	public function pengajuan_unit()
	{
		#--------------------------------------------------------------------------
		# Persiapan pengambilan data dari model Mmember
		#--------------------------------------------------------------------------
		$this->load->model('Mmember');

		#--------------------------------------------------------------------------
		# Proses Pengambilan data dari 'tb_unit_keja'
		#--------------------------------------------------------------------------
		$data['data'] 		= $this->Mmember->get_pengajuan_unit();
		// print_r($data['data']);
		$data['revisi'] 	= $this->Mmember->get_revisi_unit();
		$data['unit_kerja']	= $this->Mmember->get(array('tabel'=>'tb_unitkerja'))->result_array();
		$this->init('vmenu-daftar-pengajuan-diklat', $data);
	}

	#--------------------------------------------------------------------------
	# METHODE DETAIL_PENGAJUAN_DIKLAT
	#--------------------------------------------------------------------------
	# berfungsi untuk memanggil data Pengajuan untuk diklat
	#--------------------------------------------------------------------------
	public function detail_pengajuan_unit()
	{
		#--------------------------------------------------------------------------
	    # Persiapan pengambilamn data pada Model Mmember
	    #--------------------------------------------------------------------------
		$this->load->model('Mmember');
		$data['rekap'] = $this->Mmember->get_pengajuan_unit_detail();

		$rekap = array();

		foreach ($data['rekap'] as $key)
		{
			array_push($rekap, $key['id']);
		}

		$this->session->set_userdata('rekap', $rekap);

		$this->init('vmenu-daftar-pengajuan-detail', $data);
	}


	#--------------------------------------------------------------------------
	# METHODE PERSETUJUAN_DIKLAT
	#--------------------------------------------------------------------------
	# berfungsi untuk memanggil data pengajuan diklat
	#--------------------------------------------------------------------------
	public function persetujuan_unit()
	{

	    #--------------------------------------------------------------------------
	    # Persiapan pengambilamn data pada Model Mmember
	    #--------------------------------------------------------------------------
		$this->load->model('Mmember');

		#--------------------------------------------------------------------------
	    # Proses pengambilamn data berdasar session user 'nip'
	    # Hasil pengambilan data akan ditampilkan pada view Persetujuan Diklat
	    #--------------------------------------------------------------------------
		$data['data'] 	= $this->Mmember->get_persetujuan_unit($this->session->userdata('user')['nip']);
		$this->init('vmenu-persetujuan-uk', $data);
	}
	public function nilai_teknis()
	{
		$this->load->model('Mnilai');
		$data['data'] = $this->Mnilai->get_nilai_teknis();
		$this->init('vmenu-penilaian', $data);
	}

	public function berkas_diklat()
	{
		$this->init('vmenu-berkas-diklat');
	}

	public function berkas_member()
	{
		$this->load->model('Mberkas');

		$data['berkas'] = $this->Mberkas->get_berkas($this->session->userdata('user')['id']);

		$this->init('vmenu-berkas-member', $data);
	}

	public function info_member()
	{
		if (! empty($_GET))
		{
			$this->load->model('Mmember');
			$data['detail'] = $this->Mmember->get_profil_member($this->input->get('id'));

			if (! empty($data['detail']))
			{
				//print_r($data['data']);
				$data['detail'] = $data['detail'][0];
				$this->init('vmenu-info-member', $data);
			}
			else
			{
				# data tidak ada
				show_404();
			}
		}
		else
		{
			show_404();
		}
	}

	public function insight()
	{
		$this->load->model("Minsight");
		$data['terima'] = $this->Minsight->total_magang_terima();
		$data['pending'] = $this->Minsight->total_magang_pending();
		$data['tolak'] = $this->Minsight->total_magang_tolak();
		$this->init('vmenu-insight', $data);
	}

	public function notifikasi()
	{
		$this->load->model("Mnotifikasi");
		$data['data'] = $this->Mnotifikasi->get_pesan();
		$this->init('vmenu-pesan', $data);
	}

	public function info_magang()
	{
		$this->init('vmenu-info-magang');
	}

	public function reset_password()
	{
		$this->init('vprofil-reset');
	}

	public function kuota()
	{
		$this->load->model("Mkuota");
		$data['data'] = $this->Mkuota->get_kuota();
		$this->init('vmenu-kuota-diklat', $data);
	}

	public function kuota_detail()
	{
		$this->load->model("Mkuota");
		$temp = $this->Mkuota->get_kuota_detail($_GET['tahun']);

		foreach ($temp as $key) {
			$data['data'][$key['bulan']] = $key['kuota'];
		}

		$temp = $this->Mkuota->get_kuota_tahun($_GET['tahun']);
		$data['jumlah'] = $temp['kuota'];
		$data['budget']	= $temp['budget'];
		$data['tahun']	= $_GET['tahun'];
		$this->init('vmenu-kuota-detail', $data);
	}

	public function kuota_bidang()
	{
		$b	   = date('m');
		$t 	   = date('Y');

		if (isset($_GET['tahun']) && ! empty($_GET['tahun']) && isset($_GET['bulan']) && ! empty($_GET['bulan']))
		{
			$b = $_GET['bulan'];
			$t = $_GET['tahun'];
		}

		$bulan = $t.''.$b;

		$this->load->model('Mkuota');
		$this->load->model('Mbidang');

		$bidang 	  = $this->Mbidang->get_data();
		$kuota_bidang = $this->Mkuota->get_kuota_bidang($bulan);
		$no = -1;

		foreach ($bidang as $bid)
		{
			$no++;
			$bidang[$no]['kuota'] = '0';
			$bidang[$no]['sisa']  = '0';

			foreach ($kuota_bidang as $kubid)
			{
				if (! empty($kubid) && $bid['id']==$kubid['id'])
				{
					$bidang[$no]['kuota'] = $kubid['kuota'];
					$bidang[$no]['sisa']  = $kubid['sisa'];
					break;
				}
			}
		}
		$data['total']	= $this->Mkuota->get_kuota_bulan($bulan);
		$data['total']	= (!empty($data['total']))?$data['total'][0]['kuota']:0;
		$data['bidang'] = $bidang;
		$data['filter'] = array('tahun'=>$t, 'bulan'=>$b);
		$this->init('vmenu-kuotab-bidang', $data);
	}

	public function kelompok_detail()
	{
		if (isset($_GET) && ! empty($_GET['id']))
		{
			$this->load->Model('Mmember');

			$data['biodata'] = $this->Mmember->get_profil($_GET['id']);

			if (empty($data['biodata'])) {
				 show_404();
			}

			$data['biodata'] = $data['biodata'][0];
			$data['anggota'] = $this->Mmember->get_member($_GET['id']);
			$data['unit']	 = $this->Mmember->get_member_magang($_GET['id']);

			$this->init('vmenu-kelompok-detail', $data);
		}
	}

	public function daftar_terima()
	{
		if (isset($_GET))
		{
			$this->load->model('Mmember');
			if ($this->Mmember->is_terima($_GET['id']))
			{
				$this->load->model('Mberkas');

				$data['biodata'] = $this->Mmember->get_profil_member($_GET['id']);
				$data['biodata'] = $data['biodata'][0];
				$data['magang']	 = $this->Mmember->get_data_idcard($_GET['id'])[0];
				$data['dokumen'] = $this->Mberkas->get_dokumen();
				$this->init('vmenu-pendaftar-terima', $data);
			}
			else
			{
				$this->pesan('pesan', 'Mohon maaf status anda belum diterima atau menunggu');
				redirect(base_url.'dashboard/member');
			}
		}
		else
		{
			show_404();
		}
	}

	public function report()
	{
		$this->load->model('Mmember');

		$data['filter'] = array('tahun'=>'all', 'bulan'=>'all', 'status'=>'all');

		if (! empty($_GET))
		{
			if (isset($_GET['tahun']) && !empty($_GET['tahun']) && $_GET['tahun'] != 'all')
			{
				$param['tahun'] 		 = $_GET['tahun'];
				$data['filter']['tahun'] = $param['tahun'];
			}

			if (isset($_GET['bulan']) && !empty($_GET['bulan']) && $_GET['bulan'] != 'all')
			{
				$param['bulan'] 		 = $_GET['bulan'];
				$data['filter']['bulan'] = $param['bulan'];
			}

			if (isset($_GET['status']) && $_GET['status'] != 'all')
			{
				$param['status'] 		  = $_GET['status'];
				$data['filter']['status'] = $param['status'];
			}

			$data['data'] 	= $this->Mmember->get_report($param);
		}
		else
		{
			$data['data'] = $this->Mmember->get_report();
		}

		$this->init('vmenu-laporan', $data);
	}
}

?>
