<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mnilai extends MY_Model {

    private $user;

	public function __construct()
    {
        parent::__construct();
        $this->user = $this->session->userdata('user');
    }


    #--------------------------------------------------------------------------
    # METHOD GET_NILAI_NONTEKNIS
    #--------------------------------------------------------------------------
    # Berfungsi untuk mengambil dan menyimpan data member ke 'tb_member_user' 
    #--------------------------------------------------------------------------
    public function get_nilai_nonteknis()
    {
    	$this->db->from('tb_magang');
    	$this->db->select('tb_member_user.nama, tb_member_user.id, tb_unitkerja.deskripsi, bagian,  disiplin, kerjasama, inisiatif, tanggung_jawab, keberhasilan');
    	$this->db->join('tb_member_user', 'tb_magang.id_member = tb_member_user.id');
    	$this->db->join('tb_member', 'tb_member_user.id_user = tb_member.id');
    	$this->db->join('tb_jenis', 'tb_member.id_jenis = tb_jenis.id');
        $this->db->join('tb_pegawai', 'tb_magang.pembina = tb_pegawai.nip');
        $this->db->join('tb_unitkerja', 'tb_pegawai.id_unitkerja = tb_unitkerja.id');
        $this->db->join('tb_bidang', 'tb_member.id_bidang = tb_bidang.id');
    	$this->db->join('tb_nilai_nteknis', 'tb_member_user.id = tb_nilai_nteknis.id_member', 'left');
    	$this->db->like('tb_jenis.jenis', 'SMK');

    	return $this->db->get()->result_array();
    }



    #--------------------------------------------------------------------------
    # METHOD IS_INPUT
    #--------------------------------------------------------------------------
    # Berfungsi untuk mengambil dan menyimpan data member ke 'tb_member_user' 
    #--------------------------------------------------------------------------
    public function is_input_nonteknis($id)
    {
    	return ($this->get(array('tabel'=>'tb_nilai_nteknis', 'where'=>array('id_member'=>$id)))->num_rows() > 0);
    }


    #--------------------------------------------------------------------------
    # METHOD ADD_NONTEKNIS
    #--------------------------------------------------------------------------
    # Berfungsi untuk mengambil dan menyimpan data member ke 'tb_member_user' 
    #--------------------------------------------------------------------------
    public function add_nonteknis($data)
    {
    	$con['tabel'] = 'tb_nilai_nteknis';
    	$con['data']  = $data;
    	$con['data']['created_date'] = date('Y-m-d h:i:s');
    	$con['data']['created_by']	 = $this->session->userdata('user')['nip'];

    	return $this->insert($con);
    }


    #--------------------------------------------------------------------------
    # METHOD UPDATE_NONTEKNIS
    #--------------------------------------------------------------------------
    # Berfungsi untuk mengambil dan menyimpan data member ke 'tb_member_user' 
    #--------------------------------------------------------------------------
    public function update_nonteknis($data)
    {
    	$con['tabel'] = 'tb_nilai_nteknis';
    	$con['where'] = array('id_member'=>$data['id_member']);
    	
    	unset($data['id_member']);
    	
    	$con['data']  = $data;
    	$con['data']['updated_date'] = date('Y-m-d h:i:s');
    	$con['data']['updated_by']	 = $this->session->userdata('user')['nip'];

    	return $this->update($con);
    }

    #--------------------------------------------------------------------------
    # METHOD GET_NILAI_NONTEKNIS
    #--------------------------------------------------------------------------
    # Berfungsi untuk mengambil dan menyimpan data member ke 'tb_member_user' 
    #--------------------------------------------------------------------------
    public function get_nilai_teknis()
    {
    	$con['tabel']	= 'tb_nilai_teknis';
    	$con['select']	= 'tb_member_user.id, tb_member_user.nama, tb_unitkerja.deskripsi, bagian, jenis_kegiatan, jumlah_jam, nilai';
    	$con['join']	= array('tb_magang'   =>'tb_nilai_teknis.id_member = tb_magang.id_member', 
                                'tb_member_user'   =>'tb_nilai_teknis.id_member = tb_member_user.id',
                                'tb_member'   =>'tb_member_user.id_user = tb_member.id',
                                'tb_bidang'   =>'tb_member.id_bidang = tb_bidang.id', 
                                'tb_pegawai'  =>'tb_magang.pembina = tb_pegawai.nip',
                                'tb_unitkerja'=>'tb_pegawai.id_unitkerja = tb_unitkerja.id');
    	$con['order_by']= 'id';

    	return $this->get($con)->result_array();
    }

    #--------------------------------------------------------------------------
    # METHOD IS_INPUT
    #--------------------------------------------------------------------------
    # Berfungsi untuk mengambil dan menyimpan data member ke 'tb_member_user' 
    #--------------------------------------------------------------------------
    public function is_input_teknis($id, $jenis_kegiatan)
    {
    	return ($this->get(array('tabel'=>'tb_nilai_teknis', 'where'=>array('id_member'=>$id, 'jenis_kegiatan'=>$jenis_kegiatan)))->num_rows() > 0);
    }

    #--------------------------------------------------------------------------
    # METHOD ADD_NONTEKNIS
    #--------------------------------------------------------------------------
    # Berfungsi untuk mengambil dan menyimpan data member ke 'tb_member_user' 
    #--------------------------------------------------------------------------
    public function add_teknis($data)
    {
    	unset($data['tb']);

    	$con['tabel'] = 'tb_nilai_teknis';
    	$con['data']  = $data;
    	$con['data']['created_date'] = date('Y-m-d h:i:s');
    	$con['data']['created_by']	 = $this->session->userdata('user')['nip'];

    	return $this->insert($con);
    }


    #--------------------------------------------------------------------------
    # METHOD UPDATE_NONTEKNIS
    #--------------------------------------------------------------------------
    # Berfungsi untuk mengambil dan menyimpan data member ke 'tb_member_user' 
    #--------------------------------------------------------------------------
    public function update_teknis($data)
    {
    	unset($data['tb']);
    	
    	$con['tabel'] = 'tb_nilai_teknis';
    	$con['where'] = array('id_member'=>$data['id_member']);
    	
    	unset($data['id_member']);
    	
    	$con['data']  = $data;
    	$con['data']['updated_date'] = date('Y-m-d h:i:s');
    	$con['data']['updated_by']	 = $this->session->userdata('user')['nip'];

    	return $this->update($con);
    }
}

?>