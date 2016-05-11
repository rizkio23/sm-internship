<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mbidang extends MY_Model {

	private $user;

	public function __construct()
    {
        parent::__construct();
        $this->user = $this->session->userdata('user');
    }
    
	#--------------------------------------------------------------------------
    # METHOD GET_DATA
    #--------------------------------------------------------------------------
    # Berfungsi untuk mengambil data bidang dari 'tb_bidang' 
    #--------------------------------------------------------------------------
	public function get_data()
	{
		#--------------------------------------------------------------------------
    	#  Proses pengambilan data yang disimpan dalam variabel $con
    	#--------------------------------------------------------------------------
		$con['tabel']	= 'tb_bidang';
		$con['select']	= 'id,bagian, deskripsi, status';
		$con['where']	= array('deleted'=>'0');
		return $this->get($con)->result_array();
	}


	#--------------------------------------------------------------------------
    # METHOD GET_NEXT_ID
    #--------------------------------------------------------------------------
    # Berfungsi untuk mengambil data bidang selanjutnya dari 'tb_bagian' 
    #--------------------------------------------------------------------------
	public function get_next_id()
	{

        #--------------------------------------------------------------------------
        # Proses Pengambilan data pada 'tb_bagian' 
        #--------------------------------------------------------------------------
		$con['tabel']	= 'tb_bidang';
		$con['select']	= 'id';
		$con['order_by']= 'id DESC';
		$con['limit']	= '1';

        #--------------------------------------------------------------------------
        # Hasil pengambilan data akan ditampilkan dalam bentuk array
        #--------------------------------------------------------------------------
		$result = $this->get($con)->result_array();
		
		#--------------------------------------------------------------------------
    	# Penambahan untuk pengambilan data selanjutnya
   		#--------------------------------------------------------------------------
		if (count($result)>0)
		{
		return $result[0]['id']+1;
		}
		return '1';
	}



    #--------------------------------------------------------------------------
    # METHOD CHANGE_STATUS
    #--------------------------------------------------------------------------
    # Berfungsi untuk mengambil dan mnegubah ststus data dari 'tb_bagian' 
    #--------------------------------------------------------------------------
	public function change_status($get)
    {

        #--------------------------------------------------------------------------
        # Proses Pengambilan data pada 'tb_bidang'
        #--------------------------------------------------------------------------
    	$con['data']['status'] 	= $get['status'];
        $con['data']['updated_date']= date('Y-m-d h:i:s');
    	$con['tabel']			= 'tb_bidang';
    	$con['where']			= array('id'=>$get['id']);

        #--------------------------------------------------------------------------
        # Hasil pengambilan data akan dibungkus dalam fungsi update
        #--------------------------------------------------------------------------
    	return $this->update($con);
	}


    #--------------------------------------------------------------------------
    # METHOD ADD_BIDANG
    #--------------------------------------------------------------------------
    # Berfungsi untuk mengambil dan menyimpan data ke 'tb_bagian' 
    #--------------------------------------------------------------------------
	public function add_bidang($get)
    {
        #--------------------------------------------------------------------------
        # Menghapus nilai GET 'tb'
        #--------------------------------------------------------------------------
        unset($get['tb']);

        #--------------------------------------------------------------------------
        # Proses Pengambilan data kedalam 'tb_bidang'
        #--------------------------------------------------------------------------
        $con['tabel']                = 'tb_bidang';
        $con['data']                 = $get;
        $con['data']['created_by']   = $this->user['nip'];
        $con['data']['created_date'] = date('Y-m-d h:i:s');

        return $this->insert($con);
    }


    #--------------------------------------------------------------------------
    # METHOD delete_id 
    #--------------------------------------------------------------------------
    # Berfungsi sebagai mengubah status data id dari database [dari 'tb_bidang']
    #--------------------------------------------------------------------------
    public function delete_bidang($id)
    {
        #--------------------------------------------------------------------------
        # Proses pengambilan data untuk diubah status delete dalam 'tb_bidang'
        #--------------------------------------------------------------------------
        $con['tabel']        = 'tb_bidang';
        $con['where']        = array('id'=>$id);
        $con['data']         = array('deleted'=>'1', 'updated_by'=> $this->user['nip'], 'updated_date'=>date('Y-m-d h:i:s'));

        return $this->update($con);
    }
}

?>