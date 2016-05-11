<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Madmin extends MY_Model {

	public function __construct()
    {
        parent::__construct();
    }


    #--------------------------------------------------------------------------
	# UPDATE waktu login USER
	#--------------------------------------------------------------------------
    public function setLogtime($nip)
    {
    	$this->update(array('tabel'=>'tb_admin', 'where'=>array('nip'=>$nip), 'data'=>array('logtime'=>date('Y-m-d h:i:s'))));
    }

    public function is_registered($id=0)
    {
        $result = $this->get(array('tabel'=>'tb_pegawai', 'where'=>array('nip'=>$id)));
        return $result->num_rows() > 0;
    }

    public function get_profil($nip)
    {
        $con['tabel'] = 'tb_pegawai';
        $con['where'] = array('nip'=>$nip);

        return $this->get($con)->result_array();
    }

    public function update_profil($nip, $data)
    {
        $con['tabel']   = 'tb_pegawai';
        $con['where']   = array('nip'=>$nip);
        $con['data']    = $data;

        return $this->update($con);
    }

    public function match_password($password, $nip)
    {
        $con['tabel']  = 'tb_admin';
        $con['select'] = "password";
        $con['where']  = array('nip'=>$nip);

        $result = $this->get($con);

        if ($result->num_rows() > 0) 
        {
            $result = $result->result_array()[0];

            return password_verify($password, $result['password']);
        }
        else
        {
            return FALSE;
        }

    }

    public function reset_password($password, $nip)
    {
        $con['tabel'] = 'tb_admin';
        $con['where'] = array('nip'=>$nip);
        $con['data']  = array('password'=> password_hash($password, PASSWORD_BCRYPT));

        return $this->update($con);
    }
}

?>