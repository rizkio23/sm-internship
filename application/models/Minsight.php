<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Minsight extends MY_Model {

    private $user;

	public function __construct()
    {
        parent::__construct();
        $this->user = $this->session->userdata('user');
    }

    public function total_magang_tolak()
    {
    	$con['tabel'] = 'tb_member_user';
    	$con['join']  =  array('tb_member'=>'tb_member.id= tb_member_user.id_user');
    	// $con['where'] = 'MONTH(bulan_pengajuan) <= MONTH(CURDATE() - INTERVAL 3 MONTH) AND tb_member_user.status = 0';
        $con['where'] = 'tb_member_user.status = 0';
        $con['group_by'] = 'id_user';
        $result = $this->get($con);

        return $result->num_rows();
    }

    public function total_magang_terima()
    {
    	$con['tabel'] = 'tb_member_user';
    	$con['join']  =  array('tb_member'=>'tb_member.id= tb_member_user.id_user');
    	// $con['where'] = 'MONTH(bulan_pengajuan) <= MONTH(CURDATE() - INTERVAL 3 MONTH) AND tb_member_user.status = 3';
        $con['where'] = 'tb_member_user.status = 3';
        $con['group_by'] = 'id_user';
        $result = $this->get($con);

        return $result->num_rows();
    }

    public function total_magang_pending()
    {
        $con['tabel'] = 'tb_member_user';
        $con['join']  =  array('tb_member'=>'tb_member.id= tb_member_user.id_user');
        // $con['where'] = 'MONTH(bulan_pengajuan) <= MONTH(CURDATE() - INTERVAL 3 MONTH) AND tb_member_user.status = 1';
        $con['where'] = 'tb_member_user.status = 1';
        $con['group_by'] = 'id_user';
        $result = $this->get($con);

        return $result->num_rows();
    }
}

?>