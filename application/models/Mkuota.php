<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mkuota extends MY_Model {

    private $user;

	public function __construct()
    {
        parent::__construct();
        $this->user = $this->session->userdata('user');
    }

    public function get_kuota()
    {
    	return $this->get(array('tabel'=>'tb_kuota', 'order_by'=>'tahun ASC'))->result_array();
    }

    public function get_kuota_detail($tahun, $id_bidang)
    {
        $con['tabel'] = 'tb_kuota_bidang';
        $con['where'] = array('id_bidang'=>$id_bidang);
        $con['like']  = array('bulan'=>$tahun);
        $con['order_by'] = "bulan ASC";

    	return $this->get($con)->result_array();
    }

    public function get_kuota_bulan($no)
    {
        return $this->get(array('tabel'=>'tb_kuota_bulan', 'where'=>array('no'=>$no)))->result_array();
    }

    public function get_kuota_tahun($tahun)
    {
        $data = $this->get(array('tabel'=>'tb_kuota', 'where'=>array('tahun'=>$tahun)));
        if ($data->num_rows() > 0) {
            return $data->result_array()[0];
        }

    	return FALSE;
    }

    public function get_kuota_bidang($bulan)
    {
        $con['tabel']  = 'tb_kuota_bidang';
        $con['join']   = array('tb_bidang'=>'tb_bidang.id = tb_kuota_bidang.id_bidang');
        $con['select'] = 'tb_bidang.id, bagian, kuota, sisa';
        $con['where']  = array('tb_kuota_bidang.bulan'=>$bulan);

        return $this->get($con)->result_array();
    }

    public function add_kuota($data)
    {
    	if ($this->get(array('tabel'=>'tb_kuota', 'where'=>array('tahun'=>$data['tahun'])))->num_rows() > 0) 
    	{
    		return FALSE;	
    	}

    	$con['tabel'] = 'tb_kuota';
    	$con['data'] = $data;

    	return $this->insert($con);
    }

    public function save_kuota($data)
    {  
        if ($this->get(array('tabel'=>'tb_kuota_bulan', 'where'=>array('no'=>$data['no'])))->num_rows() > 0) 
        {
            $con['tabel'] = 'tb_kuota_bulan';
            $con['where'] = array('no'=>$data['no']);
            unset($data['no']);
            $con['data']  = $data;

            $par = $this->update($con);
        }
        else
        {
            $con['tabel'] = 'tb_kuota_bulan';
            $con['data']  = $data;

            $par = $this->insert($con);
        }

        return $par;  
    }

    public function save_kuota_bidang($data)
    {  
        if ($this->get(array('tabel'=>'tb_kuota_bidang', 'where'=>array('id'=>$data['id'])))->num_rows() > 0) 
        {
            $con['tabel'] = 'tb_kuota_bidang';
            $con['where'] = array('id'=>$data['id']);
            unset($data['id']);
            $con['data']  = $data;

            $par = $this->update($con);
        }
        else
        {
            $con['tabel'] = 'tb_kuota_bidang';
            $con['data']  = $data;
            $con['data']['sisa'] = $data['kuota'];

            $par = $this->insert($con);
        }

        return $par;  
    }
}

?>