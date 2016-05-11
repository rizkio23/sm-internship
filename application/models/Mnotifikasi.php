<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mnotifikasi extends MY_Model {

    private $user;

	public function __construct()
    {
        parent::__construct();
        $this->user = $this->session->userdata('user');
    }

    public function get_pesan($id = '')
    {
    	$con['tabel'] 		= 'tb_notifikasi';
    	$con['order_by']	= "no DESC";

        if (!empty($id)) 
        {
            $con['where'] = array('penerima'=>$id);
            $con['where_or'] = array('penerima'=>'0');
        }

    	return $this->get($con)->result_array();
    }

    public function add($data)
    {
    	$con['tabel'] 	= 'tb_notifikasi';
    	$con['data']	= $data;

    	return $this->insert($con);
    }
}

?>