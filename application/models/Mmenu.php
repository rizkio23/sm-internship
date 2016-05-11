<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mmenu extends MY_Model {

    private $user;

	public function __construct()
    {
        parent::__construct();
        $this->user = $this->session->userdata('user');
    }

    #--------------------------------------------------------------------------
    # METHOD GET_DATA
    #--------------------------------------------------------------------------
    # Berfungsi sebagai mengambil data menu dari 'tb_menu'
    #--------------------------------------------------------------------------
    public function get_data()
    {
    	$con['tabel']		= 'tb_menu';
    	$con['select']		= 'id, menu, link, deskripsi, icon, visible';
        $con['where']       = array('deleted'=>'0');
 		$con['order_by']	= 'id ASC';

 		return $this->get($con)->result_array();
    }

    #--------------------------------------------------------------------------
    # METHOD get_next_id
    #--------------------------------------------------------------------------
    # Berfungsi sebagai mengambil data menu selanjutnya dari 'tb_menu'
    #--------------------------------------------------------------------------
    public function get_next_id()
    {
    	$con['tabel']		= 'tb_menu';
    	$con['select']		= 'id';
 		$con['order_by']	= 'id DESC';
 		$con['limit']		= '1';
 		$result 				= $this->get($con)->result_array();

        #--------------------------------------------------------------------------
        # Penambahan untuk pengambilan data menu selanjutnya
        #--------------------------------------------------------------------------
 		if (count($result)>0)
        {
        return $result[0]['id']+1;
        }

        return '1';
    }

    #--------------------------------------------------------------------------
    # METHOD add_menu
    #--------------------------------------------------------------------------
    # Berfungsi sebagai mengambil data yang dimasukkan dan 
    # disimpan dalam database
    #--------------------------------------------------------------------------
    public function add_menu($get)
    {
        #--------------------------------------------------------------------------
        # Menghapus nilai GET 'tb'
        #--------------------------------------------------------------------------
        unset($get['tb']);

        #--------------------------------------------------------------------------
        # Proses pengambilan data yang ditampung dalam array $con
        # Disimpan dalam 'tb_menu'
        #--------------------------------------------------------------------------
        $con['tabel']                = 'tb_menu';
        $con['data']                 = $get;
        $con['data']['created_by']   = $this->user['nip'];
        $con['data']['created_date'] = date('Y-m-d h:i:s');

        return $this->insert($con);
    }


    #--------------------------------------------------------------------------
    # METHOD delete_menu
    #--------------------------------------------------------------------------
    # Berfungsi sebagai mengambil data dari id yang didapat 
    # Mengubah status deleted dalam 'tb_menu'
    #--------------------------------------------------------------------------
    public function delete_menu($id)
    {
        #--------------------------------------------------------------------------
        # Proses Pengambilan data pada 'tb_menu'
        #--------------------------------------------------------------------------
        $con['tabel']        = 'tb_menu';
        $con['where']        = array('id'=>$id);
        $con['data']         = array('deleted'=>'1', 'updated_by'=> $this->user['nip'], 'updated_date'=>date('Y-m-d h:i:s'));

        return $this->update($con);
    }
}

?>