<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mmagang extends MY_Model {

    private $user;

	public function __construct()
    {
        parent::__construct();
        $this->user = $this->session->userdata('user');
    }

    public function get_data_pembina($tanggal)
    {
    	$query = "SELECT p.nip, p.nama, jabatan, deskripsi, bulan_pengajuan, COUNT(*) as jumlah FROM tb_magang mg
					JOIN tb_member_user u ON mg.id_member = u.id
					JOIN tb_member me ON u.id_user = me.id
					JOIN tb_pegawai p ON mg.pembina = p.nip
					JOIN tb_unitkerja uk ON p.id_unitkerja = uk.id
					WHERE EXTRACT(month FROM me.bulan_pengajuan) = EXTRACT(month FROM $tanggal)
					GROUP BY pembina";

		return $this->query($query)->result_array();
    }

    
}

?>