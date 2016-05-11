<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Makses extends MY_Model {

    private $user;

	public function __construct()
    {
        parent::__construct();
        $this->user = $this->session->userdata('user');
    }

    #--------------------------------------------------------------------------
    # METHOD GET_HAK_AKSES
    #--------------------------------------------------------------------------
    # Berfungsi untuk mengambil data hak akses tiap level dari 'tb_hak_akses' 
    #--------------------------------------------------------------------------
    public function get_hak_akses($level)
    {

        #--------------------------------------------------------------------------
        # Proses pengambilan data melalui query pada 'tb_akses'
        #--------------------------------------------------------------------------
        $con['tabel']   = 'tb_hak_akses';
        $con['select']  = 'tb_hak_akses.no, id_menu, menu, level, priv';
        $con['join']    = array('tb_menu'=>'tb_hak_akses.id_menu = tb_menu.id');
        $con['where']   = array('level'=>$level);

        #--------------------------------------------------------------------------
        # Hasil pengambilan data di kembalikan dalam bentuk array
        #--------------------------------------------------------------------------
        return $this->get($con)->result_array();
    }

     #--------------------------------------------------------------------------
    # METHOD GET_menu
    #--------------------------------------------------------------------------
    # Berfungsi untuk mengambil data menu melalui tiap level dari 'tb_hak_akses' 
    #--------------------------------------------------------------------------
    public function get_menu($level)
    {
        #--------------------------------------------------------------------------
        # Proses pengambilan data melalui query pada 'tb_akses'
        #------------------------------------------------------
        $con['tabel']   = 'tb_hak_akses';
        $con['select']  = 'menu, level, priv, link, icon, visible';
        $con['join']    = array('tb_menu'=>'tb_hak_akses.id_menu = tb_menu.id');
        $con['where']   = array('level'=>$level);
        $con['order_by']= 'menu ASC';

        #--------------------------------------------------------------------------
        # Hasil pengambilan data di kembalikan dalam bentuk array
        #--------------------------------------------------------------------------
        return $this->get($con)->result_array();
    }
}

?>