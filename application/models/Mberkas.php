<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mberkas extends MY_Model {

    private $user;

	public function __construct()
    {
        parent::__construct();
        $this->user = $this->session->userdata('user');
    }

    public function get_berkas($id)
    {
        $con['tabel'] = 'tb_berkas';
        $con['where'] = array('id_user'=>$id);
        $con['order_by']='created_date DESC';

        return $this->get($con)->result_array();
    }

    #--------------------------------------------------------------------------
    # METHOD SAVE_BERKAS
    #--------------------------------------------------------------------------
    # Berfungsi untuk mengambil data berkas kedalam 'tb_berkas'
    #--------------------------------------------------------------------------
    public function save_berkas($data)
    {

        #--------------------------------------------------------------------------
        # Pengecekan jika data file sudah ada
        #--------------------------------------------------------------------------
    	if ($this->is_created($data['file']))
    	{

        #--------------------------------------------------------------------------
        # Proses Pengambilan data 
        #--------------------------------------------------------------------------
		$con['data']['updated_date'] = date('Y-m-d h:i:s');
		$con['tabel']	= 'tb_berkas';
		$con['where']	= array('file'=>$data['file']);

        #--------------------------------------------------------------------------
        # hasil pengambilan data akan dikembalikan  melalui fungsi update
        #--------------------------------------------------------------------------
		return $this->update($con);
    	}

    	else
        #--------------------------------------------------------------------------
        # Pengecekan Jika data/file belum ada  
        #--------------------------------------------------------------------------
    	{

        #--------------------------------------------------------------------------
        # Proses Pengambilan data 
        #--------------------------------------------------------------------------
		$con['data']				= $data;
		$con['data']['id'] 		  	= 'ber'.date('Ymdhis');
		$con['data']['id_user']		= $this->session->userdata('user')['id'];
    	$con['data']['deleted']	  	= '0';
    	$con['data']['created_date']= date('Y-m-d h:i:s');
    	$con['data']['updated_date']= date('Y-m-d h:i:s');
    	$con['tabel']				= 'tb_berkas';

         #--------------------------------------------------------------------------
        # hasil pengambilan data akan dikembalikan  melalui fungsi insert
        #--------------------------------------------------------------------------
    	return $this->insert($con);
    	}
    }

    #--------------------------------------------------------------------------
    # METHOD IS_CREATED
    #--------------------------------------------------------------------------
    # Berfungsi untuk mengambil data berupa file
    #--------------------------------------------------------------------------
    private function is_created($file)
    {
    	$con['tabel']	= 'tb_berkas';
    	$con['where']	= array('file'=>$file);

    	$result = $this->get($con);

    	return($result->num_rows() > 0);
    }

    public function get_dokumen()
    {
        $con['tabel'] = 'tb_dokumen';
        $con['where'] = array('deleted'=>'0');

        return $this->get($con)->result_array();
    }
}

?>