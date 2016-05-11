<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mlevel extends MY_Model {

    private $user;

	public function __construct()
    {
        parent::__construct();
        $this->user = $this->session->userdata('user');
    }

    #--------------------------------------------------------------------------
    # METHOD GET_DATA
    #--------------------------------------------------------------------------
    # Berfungsi sebagai mengambil data dari tabel level yang disimpan dalam 
    # ARRAY $con kemudian ditampilkan 
    #--------------------------------------------------------------------------
    public function get_data()
    {
        #--------------------------------------------------------------------------
        # Proses Pengambilan data pada 'tb_level'
        #--------------------------------------------------------------------------
    	$con['tabel']		= 'tb_level';
        $con['where']       = array('deleted'=>'0');
 		$con['order_by']	= 'level ASC';

        #--------------------------------------------------------------------------
        # Hasil pengambilan data akan ditampilkan dalam bentuk array
        #--------------------------------------------------------------------------
 		return $this->get($con)->result_array();
    }


    #--------------------------------------------------------------------------
    # METHOD GET_NEXT_LEVEL
    #--------------------------------------------------------------------------
    # Berfungsi sebagai mengambil data level selanjutnya
    #--------------------------------------------------------------------------
    public function get_next_level()
    {
        #--------------------------------------------------------------------------
        # Proses Pengambilan data pada 'tb_level'
        #--------------------------------------------------------------------------
    	$con['tabel']		= 'tb_level';
    	$con['select']		= 'level';
 		$con['order_by']	= 'level DESC';
 		$con['limit']		= '1';
 		$level 				= $this->get($con)->result_array();

        #--------------------------------------------------------------------------
        # Penambahan untuk pengambilan data selanjutnya
        #--------------------------------------------------------------------------
        if (count($level)>0)
        {
        return ($level['0']['level']+1);
        }
        return '1';
    }
    

    #--------------------------------------------------------------------------
    # METHOD GET_KATEGORI
    #--------------------------------------------------------------------------
    # Berfungsi sebagai mengambil data kategori dari level 
    #--------------------------------------------------------------------------
    public function get_kategori($level)
    {

        #--------------------------------------------------------------------------
        # Proses Pengambilan data pada 'tb_level'
        #--------------------------------------------------------------------------
        $con['tabel']   = 'tb_level';
        $con['where']   = array('level'=>$level);
        $con['select']  = 'kategori';

        #--------------------------------------------------------------------------
        # Pengembalian hasil data dalam bentuk array
        #--------------------------------------------------------------------------
        return $this->get($con)->result_array()[0]['kategori'];
    }
    


    #--------------------------------------------------------------------------
    # METHOD add_level 
    #--------------------------------------------------------------------------
    # Berfungsi sebagai menambah data level kedalam database
    #--------------------------------------------------------------------------
    public function add_level($get)
    {
        #--------------------------------------------------------------------------
        # Menghapus nilai GET 'tb'
        #--------------------------------------------------------------------------
        unset($get['tb']);

        #--------------------------------------------------------------------------
        # Proses Pengambilan data dan disimpan kedalam 'tb_level'
        #--------------------------------------------------------------------------
        $con['tabel']                = 'tb_level';
        $con['data']                 = $get;
        $con['data']['created_by']   = $this->user['nip'];
        $con['data']['created_date'] = date('Y-m-d h:i:s');

        return $this->insert($con);
    }


    #--------------------------------------------------------------------------
    # METHOD delete_level 
    #--------------------------------------------------------------------------
    # Berfungsi sebagai mengubah status delete data level dari database [tb_level]
    #--------------------------------------------------------------------------
    public function delete_level($level)
    {
        #--------------------------------------------------------------------------
        # Proses pengambilan data untuk diubah status delete dalam 'tb_level'
        #--------------------------------------------------------------------------
        $con['tabel']        = 'tb_level';
        $con['where']        = array('level'=>$level);
        $con['data']         = array('deleted'=>'1', 'updated_by'=> $this->user['nip'], 'updated_date'=>date('Y-m-d h:i:s'));

        return $this->update($con);
    }

}

?>