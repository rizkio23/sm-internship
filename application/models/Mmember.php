<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mmember extends MY_Model {

	public function __construct()
    {
        parent::__construct();
    }

    public function get_profil($id)
    {
        $con['tabel']  = 'tb_member';
        $con['join']   = array('tb_jenis'=>'tb_member.id_jenis = tb_jenis.id', 'tb_bidang'=>'tb_member.id_bidang = tb_bidang.id');
        $con['select'] = "tb_member.id, nama, instansi, alamat, jurusan, bagian, jenis, durasi, tujuan, bulan_pengajuan, email, hp";
        $con['where']  = array('tb_member.id'=>$id);
        
        return $this->get($con)->result_array();
    }

    public function get_profil_member($id_member)
    {

        #--------------------------------------------------------------------------
        # Proses Pengambilan data pada 'tb_member_user'
        #--------------------------------------------------------------------------
        $con['tabel']   = 'tb_member_user';
        $con['select']  = "id_user, tb_member_user.id, foto, tb_member_user.nama, jk, instansi, tgl_lahir, email, tb_member_user.hp, tb_member_user.alamat, jurusan, jenis, durasi, tujuan, bagian, tb_member_user.status";
        $con['join']    = array('tb_member'=>'tb_member_user.id_user = tb_member.id', 'tb_jenis'=>'tb_member.id_jenis = tb_jenis.id', 'tb_bidang'=>'tb_member.id_bidang = tb_bidang.id');
        $con['order_by']= "id_user ASC";

        $con['where']['tb_member_user.status>'] = '-1';
        $con['where']['tb_member_user.id'] = $id_member;

        return $this->get($con)->result_array();
    }

    public function get_report($param=NULL)
    {
        $con['tabel']   = 'tb_member_user';
        $con['select']  = "id_user, foto, tb_member_user.nama, jk, instansi, tgl_lahir, email, tb_member_user.hp, tb_member_user.alamat, jurusan, jenis, durasi, tujuan, bagian, tb_member_user.status";
        $con['join']    = array('tb_member'=>'tb_member_user.id_user = tb_member.id', 'tb_jenis'=>'tb_member.id_jenis = tb_jenis.id', 'tb_bidang'=>'tb_member.id_bidang = tb_bidang.id');
        $con['order_by']= "id_user ASC";
        $con['where']   = "tb_member_user.status > -1 ";

        if (!empty($param) && $param!== NULL) 
        {
            if (isset($param['tahun']) && ! empty($param['tahun'])) 
            {
                $con['where'] .= "AND EXTRACT(YEAR from bulan_pengajuan) = ".$param['tahun']." ";
            }

            if (isset($param['bulan']) && ! empty($param['bulan'])) 
            {
                $con['where'] .= "AND EXTRACT(MONTH from bulan_pengajuan) = ".$param['bulan']." ";
            }

            if (isset($param['status']) && ! empty($param['status'])) 
            {
                $con['where'] .= "AND tb_member_user.status = ".$param['status']." ";
            }
        }

        return $this->get($con)->result_array();
    }

    #--------------------------------------------------------------------------
    # METHOD GET_MEMBER
    #--------------------------------------------------------------------------
    # Berfungsi untuk mengambil dan menyimpan data member ke 'tb_member_user' 
    #--------------------------------------------------------------------------
    public function get_member($id)
    {

        #--------------------------------------------------------------------------
        # Proses Pengambilan data pada 'tb_member_user'
        #--------------------------------------------------------------------------
        $con['tabel']   = 'tb_member_user';
        $con['where']   = array('id_user'=>$id, 'deleted'=>'0');

        return $this->get($con)->result_array();
    }

    public function get_member_magang($id)
    {
        $con['tabel']   = 'tb_magang';
        $con['join']    = array('tb_member_user'=>'tb_magang.id_member = tb_member_user.id', 'tb_member'=>'tb_member_user.id_user = tb_member.id', 'tb_pegawai'=>'tb_magang.pembina = tb_pegawai.nip', 'tb_unitkerja'=>'tb_pegawai.id_unitkerja = tb_unitkerja.id');
        $con['select']  = "tb_member_user.nama, tb_member_user.id, tb_member.id as id_member, tb_member.instansi, tb_unitkerja.deskripsi, tb_pegawai.nama as pegawai";
        $con['where']   = array('tb_member.id'=>$id);

        $result = $this->get($con);

        if ($result->num_rows() > 0) {
            return $result->result_array();
        }
        return 0;
    }

    public function get_data_idcard($id)
    {
        $con['tabel']   = 'tb_magang';
        $con['join']    = array('tb_member_user'=>'tb_magang.id_member = tb_member_user.id', 'tb_member'=>'tb_member_user.id_user = tb_member.id', 'tb_pegawai'=>'tb_magang.pembina = tb_pegawai.nip', 'tb_unitkerja'=>'tb_pegawai.id_unitkerja = tb_unitkerja.id', 'tb_jenis'=>'tb_jenis.id = tb_member.id_jenis');
        $con['select']  = "tb_member_user.nama, tb_member_user.id as id, id_user, tb_member.instansi, tb_unitkerja.deskripsi, foto, bulan_pengajuan, durasi, tb_pegawai.nama as pembina";
        $con['where']   = array('tb_member_user.id'=>$id);

        $result = $this->get($con);

        if ($result->num_rows() > 0) {
            return $result->result_array();
        }
        return 0;
    }

    public function get_detail_member($id_user, $id_member)
    {

        #--------------------------------------------------------------------------
        # Proses Pengambilan data pada 'tb_member_user'
        #--------------------------------------------------------------------------
        $con['tabel']   = 'tb_member_user';
        $con['where']   = array('id'=>$id_member, 'id_user'=>$id_user, 'deleted'=>'0');

        return $this->get($con)->result_array()[0];
    }


    #--------------------------------------------------------------------------
    # METHOD ADD_SIGNUP
    #--------------------------------------------------------------------------
    # Berfungsi untuk mengambil dan menyimpan data ke 'tb_member' 
    #--------------------------------------------------------------------------
    public function add_signup($data)
    {

        #--------------------------------------------------------------------------
        # Prose Pengambilan data dari 'tb_member'
        #--------------------------------------------------------------------------
        $con['tabel']  = 'tb_member';
        $data['level'] = '4';
        $con['data']   = $data;

        return $this->insert($con);
    }

    #--------------------------------------------------------------------------
    # METHOD ADD_MEMBER
    #--------------------------------------------------------------------------
    # Berfungsi untuk mengambil dan menyimpan data member ke 'tb_member_user' 
    #--------------------------------------------------------------------------
    public function add_member($data)
    {

        #--------------------------------------------------------------------------
        # Proses Pengambilan data dalam bentuk array
        #--------------------------------------------------------------------------
        $id = $this->get(array('tabel'=>'tb_member_user', 'select'=>'id', 'order_by'=>'id DESC', 'limit'=>'1'))->result_array();
        $id = $id[0]['id'];


        $data['id']             = $id + 1;
        $data['id_user']        = $this->session->userdata('user')['id'];
        $data['tgl_lahir']      = date('Y-m-d', strtotime($data['tgl_lahir']));
        $data['foto']           = $data['id_user'].'_foto_'.$data['no_induk'].'.jpg';
        $data['deleted']        = 0;
        $data['created_date']   = date('Y-m-d h:i:s');

        $con['tabel']   = 'tb_member_user';
        $con['data']    = $data;

        return $this->insert($con);
    }

    #--------------------------------------------------------------------------
    # METHOD EDIT_MEMBER
    #--------------------------------------------------------------------------
    # Berfungsi untuk mengubah dan menyimpan data member ke 'tb_member_user' 
    #--------------------------------------------------------------------------
    public function edit_member($id_member, $data)
    {

        #--------------------------------------------------------------------------
        # Proses Pengambilan data pada 'tb_member_user'
        #--------------------------------------------------------------------------
        $data['tgl_lahir']      = date('Y-m-d', strtotime($data['tgl_lahir']));
        $data['foto']           = 'foto_'.$data['id_user'].'_'.$data['no_induk'].'.jpg';
        $data['deleted']        = 0;
        $data['created_date']   = date('Y-m-d h:i:s');

        $con['tabel']   = 'tb_member_user';
        $con['where']   = array('id'=>$id_member);
        $con['data']    = $data;

        return $this->update($con);
    }

    #-----------------------------------------------------------------------------------
    # METHOD IS_REGISTERED
    #-----------------------------------------------------------------------------------
    # Berfungsi untuk mengambil dan menyimpan data user yang terdaftar ke 'tb_member_user' 
    #-----------------------------------------------------------------------------------
    public function is_registered($id_user, $ni)
    {

        #--------------------------------------------------------------------------
        # Proses Pengambilan data dari 'tb_member_user'
        #--------------------------------------------------------------------------
        $con['tabel']   = 'tb_member_user';
        $con['select']  = 'no_induk';
        $con['where']   = array('id_user'=>$id_user, 'no_induk'=>$ni);

        $result = $this->get($con);

        #--------------------------------------------------------------------------
        # Pengembalian nilai bahwa data ada dalam DB 
        #--------------------------------------------------------------------------
        return ($result->num_rows() > 0);
    }

    public function is_terima($id_member)
    {
        $con['tabel'] = 'tb_magang';
        $con['where'] = array('id_member'=>$id_member, 'status'=>'0');

        $result = $this->get($con);

        return ($result->num_rows() > 0);
    }

    #--------------------------------------------------------------------------
    # METHOD UPDATE_PROFIL
    #--------------------------------------------------------------------------
    # Berfungsi untuk mengambil dan mengupdate data profil ke 'tb_member' 
    #--------------------------------------------------------------------------
    public function update_profil($data)
    {
        #--------------------------------------------------------------------------
        # Proses Pengambilan data kedalam 'tb_member'
        #--------------------------------------------------------------------------
        $con['tabel']   = 'tb_member';
        $con['where']   = array('id'=>$data['id']);

        #--------------------------------------------------------------------------
        # Menghapus data 'id' dan 'tb' yang ada
        #--------------------------------------------------------------------------
        unset ($data['id']);
        unset($data['tb']);
        
        $data['updated_date']   = date('Y-m-d h:i:s');
        $con['data']    = $data;

        return $this->update($con);
    }

     #--------------------------------------------------------------------------
    # METHOD FINALIZE
    #--------------------------------------------------------------------------
    # Berfungsi untuk mengambil dan menupdate data ke 'tb_member' 
    #--------------------------------------------------------------------------
    public function finalize()
    {

        #--------------------------------------------------------------------------
        # Pengambilan session untuk user
        #--------------------------------------------------------------------------
        $id_user        = $this->session->userdata('user')['id'];

        #--------------------------------------------------------------------------
        # Proses Pengambilan data pada 'tb_member_user'
        #--------------------------------------------------------------------------
        $con['tabel']        = 'tb_member_user';
        $con['where']        = array('id_user'=>$id_user);
        $con['data']         = array('status'=>1);
        $con['updated_date'] = date('Y-m-d h:i:s');

        return $this->update($con);
    }

    # MILIKI ADMIN ###########################

    // public function get_pending_member()
    // {
    //     $con['tabel']   = 'tb_member_user';
        
    // }


    #----------------------------------------------------------------------
    # METHOD GET_PENGAJUAN_MEMBER
    #----------------------------------------------------------------------
    # Parameter memilik nilai Default NULL
    # Berfungsi untuk mengambil data pada 'tb_member_user'
    #----------------------------------------------------------------------
    public function get_pengajuan_member($search=NULL)
    {

        #----------------------------------------------------------------------
        # Pengambilan data pada 'tb_member_user'
        #----------------------------------------------------------------------
        $con['tabel']    = 'tb_member_user';
        $con['join']     = array('tb_member'=>'tb_member.id = tb_member_user.id_user', 'tb_bidang'=>'tb_member.id_bidang = tb_bidang.id', 'tb_jenis'=>'tb_member.id_jenis = tb_jenis.id');
        $con['select']   = "tb_member.id, instansi, bagian, jenis, durasi, tujuan, tb_member_user.status, bulan_pengajuan, COUNT(*) as jumlah, tb_member.deleted";
        $con['where']    = "tb_member_user.status > 0";
        $con['group_by'] = "tb_member_user.id_user";
        
        #--------------------------------------------------------------------------
        # Pengecekan jika Yang dicari TIDAK KOSONG
        #--------------------------------------------------------------------------
        if ($search !== NULL)
        {
        #--------------------------------------------------------------------------
        # Pengecekan jika yang dicari berdasar Instansi
        # hasil pengambilan/pencarian data ditampung dalam variabel $con
        #--------------------------------------------------------------------------
        if (!empty($search['instansi'])) {
        $con['like']['instansi'] = $search['instansi'];
        }

        #--------------------------------------------------------------------------
        # Pengecekan jika yang dicari berdasar bidang
        # hasil pengambilan/pencarian data ditampung dalam variabel $con
        #--------------------------------------------------------------------------
        if ($search['bidang'] !== '0') {
        $con['where'] = $con['where'].' AND id_bidang = '.$search['bidang'];
        }

        #--------------------------------------------------------------------------
        # Pengecekan jika yang dicari berdasar Tujuan
        # hasil pengambilan/pencarian data ditampung dalam variabel $con
        #--------------------------------------------------------------------------
        if ($search['tujuan'] !== '0') {
        $con['like']['tujuan'] = $search['tujuan'];
        }

        #--------------------------------------------------------------------------
        # Pengecekan jika yang dicari berdasar Tahun Pengajuan
        # hasil pengambilan/pencarian data ditampung dalam variabel $con
        #--------------------------------------------------------------------------
        if ($search['tahun'] !== '0') {
        $con['where'] = $con['where'].' AND EXTRACT(YEAR FROM tb_member.bulan_pengajuan) = '.$search['tahun'];
        }

        #--------------------------------------------------------------------------
        # Pengecekan jika yang dicari berdasar Bulan Pengajuan
        # hasil pengambilan/pencarian data ditampung dalam variabel $con
        #--------------------------------------------------------------------------
        if ($search['bulan'] !== '0') {
        $con['where'] = $con['where'].' AND MONTH(tb_member.bulan_pengajuan) = '.$search['bulan'];
        }
        }

        #--------------------------------------------------------------------------
        # Hasil Pengambilan data berdasarkan uodated_date secara DESC
        #--------------------------------------------------------------------------
        $con['order_by'] = "tb_member_user.status";

        #--------------------------------------------------------------------------
        # Hasil pengambilan data dikembalikan dalam bentuk array
        #--------------------------------------------------------------------------
        return $this->get($con)->result_array();
    }



    #--------------------------------------------------------------------------
    # METHOD GET_PENGAJUAN_DIKLAT
    #--------------------------------------------------------------------------
    # hasil pengambilan/pencarian data ditampung dalam variabel $con
    #--------------------------------------------------------------------------
public function get_pengajuan_unit()
    {
        #--------------------------------------------------------------------------
        # Proses Pengambilan data pada 'tb_member_user'
        #--------------------------------------------------------------------------
        $con['tabel']   = 'tb_member_user';
        $con['join']    = array('tb_member'=>'tb_member_user.id_user = tb_member.id', 'tb_bidang'=>'tb_member.id_bidang = tb_bidang.id', 'tb_jenis'=>'tb_member.id_jenis = tb_jenis.id');
        $con['select']  = 'tb_member_user.id, no_induk, tb_member_user.nama, instansi, id_bidang, bagian, tujuan, jenis, tb_member_user.status, tb_member_user.updated_date';
        // $con['where']   = "tb_member_user.status >= 2";
        $con['where']   = "tb_member_user.status = 2 AND tb_member_user.id NOT IN(SELECT id_member FROM tb_pengajuan_pembina)";
        $con['order_by'] = 'tb_member_user.status ASC, updated_date ASC, instansi, nama';

        #--------------------------------------------------------------------------
        # hasil pengambilan data dikembalikan dalam  bentuk array
        #--------------------------------------------------------------------------
        return $this->get($con)->result_array();
    }

    public function get_revisi_unit()
    {
        #--------------------------------------------------------------------------
        # Proses Pengambilan data pada 'tb_member_user'
        #--------------------------------------------------------------------------
        // $con['tabel']   = 'tb_pengajuan_pembina';
        // $con['join']    = array('tb_member_user'=>'tb_pengajuan_pembina.id_member = tb_member_user.id', 'tb_member'=>'tb_member_user.id_user = tb_member.id', 'tb_pegawai'=>'tb_pengajuan_pembina.pembina = tb_pegawai.nip', 'tb_unitkerja'=>'tb_pegawai.id_unitkerja = tb_unitkerja.id');
        // $con['select']  = 'tb_member_user.id, tb_member_user.nama, instansi, deskripsi, alasan';
        // $con['where']   = 'tb_pengajuan_pembina.status = -1 AND tb_member_user.id NOT IN(SELECT id_member FROM tb_pengajuan_pembina WHERE status > 0) AND tb_member_user.status != 0';
        // $con['order_by'] = 'tb_pengajuan_pembina.updated_date ASC, instansi, nama';

        // return $this->get($con)->result_array();

        #---------- VERSI QUERY

        $query = "SELECT `tb_member_user`.`id`, `tb_member_user`.`nama`, `instansi`, `deskripsi`, `alasan` 
                  FROM `tb_pengajuan_pembina` 
                  JOIN `tb_member_user` ON `tb_pengajuan_pembina`.`id_member` = `tb_member_user`.`id` JOIN `tb_member` ON `tb_member_user`.`id_user` = `tb_member`.`id` 
                  JOIN `tb_pegawai` ON `tb_pengajuan_pembina`.`pembina` = `tb_pegawai`.`nip` 
                  JOIN `tb_unitkerja` ON `tb_pegawai`.`id_unitkerja` = `tb_unitkerja`.`id` 
                  WHERE 
                    `tb_pengajuan_pembina`.`created_date` IN (SELECT MAX(created_date) FROM tb_pengajuan_pembina GROUP BY  id_member) 
                  AND 
                    `tb_pengajuan_pembina`.`status` = -1 
                  AND 
                    `tb_member_user`.`id` NOT IN(SELECT id_member FROM tb_pengajuan_pembina WHERE status > 0) 
                  AND 
                    `tb_member_user`.`status` != 0 
                  ORDER BY `tb_pengajuan_pembina`.`updated_date` ASC, `instansi`, `nama`";

        return $this->query($query)->result_array();
    }



    #--------------------------------------------------------------------------
    # METHOD GET_PENGAJUAN_DIKLAT_DETAIL
    #--------------------------------------------------------------------------
    # Parameter memiliki Nilai awal
    # Berfungsi untuk memanggil data pada 'tb_pengajuan_pembina'
    #--------------------------------------------------------------------------
    public function get_pengajuan_unit_detail()
    {
        #--------------------------------------------------------------------------
        # Proses Pengambilan data pada 'tb_pengajuan_pembina'
        #--------------------------------------------------------------------------
        $con['tabel']    = 'tb_pengajuan_pembina';
        $con['select']   = 'tb_pengajuan_pembina.id as id_pengajuan, tb_member_user.id, tb_member_user.no_induk, tb_member_user.nama, tb_unitkerja.deskripsi, bagian, tb_pegawai.nama as pembina, tb_member.instansi';
        $con['join']     = array('tb_member_user'=>'tb_pengajuan_pembina.id_member = tb_member_user.id', 'tb_member'=>'tb_member_user.id_user = tb_member.id', 'tb_bidang'=>'tb_member.id_bidang = tb_bidang.id' ,'tb_pegawai'=>'tb_pengajuan_pembina.pembina = tb_pegawai.nip', 'tb_unitkerja'=>'tb_pegawai.id_unitkerja = tb_unitkerja.id');
        $con['where']    = array('tb_pengajuan_pembina.status'=>'0');
        
        
        #--------------------------------------------------------------------------
        # Hasil Pengambilan data diurutkan
        #--------------------------------------------------------------------------
        $con['order_by'] = 'instansi, tb_pegawai.nama, tb_member_user.nama';

        #--------------------------------------------------------------------------
        # hasil pengambilan data dikembalikan dalam  bentuk array
        #--------------------------------------------------------------------------
        return $this->get($con)->result_array();
    }

    public function get_persetujuan_unit($pembina)
    {

        #--------------------------------------------------------------------------
        # Proses Pengambilan data pada 'tb_pengajuan_pembina'
        #--------------------------------------------------------------------------
        $con['tabel']    = 'tb_pengajuan_pembina';
        $con['select']   = 'tb_pengajuan_pembina.id as id_pengajuan, tb_member.instansi, tb_member_user.no_induk, tb_member_user.nama, bagian, tb_pengajuan_pembina.status';
        $con['join']     = array('tb_member_user'=>'tb_pengajuan_pembina.id_member = tb_member_user.id', 'tb_member'=>'tb_member_user.id_user = tb_member.id', 'tb_bidang'=>'tb_member.id_bidang = tb_bidang.id');
        $con['where']    = array('pembina'=>$pembina, 'tb_pengajuan_pembina.status >'=>'0');
        
        #--------------------------------------------------------------------------
        # Hasil Pengambilan data diurutkan
        #--------------------------------------------------------------------------
        $con['order_by'] = 'tb_pengajuan_pembina.status, instansi, tb_member_user.nama';

        #--------------------------------------------------------------------------
        # hasil pengambilan data dikembalikan dalam  bentuk array
        #--------------------------------------------------------------------------
        return $this->get($con)->result_array();
    }


    #--------------------------------------------------------------------------
    # METHOD FINALIZE_DIKLAT
    #--------------------------------------------------------------------------
    # hasil pengambilan/pencarian data ditampung dalam variabel $con
    #--------------------------------------------------------------------------
    public function finalize_diklat($id)
    {
        #--------------------------------------------------------------------------
        # hasil pengambilan data dikembalikan dalam  bentuk array
        #--------------------------------------------------------------------------
        $this->db->where_in($id);
        $this->db->where('status', '0');
        return $this->db->update('tb_pengajuan_pembina', array('status'=>'1'));
    }


    #--------------------------------------------------------------------------
    # METHOD VERIFIKASI
    #--------------------------------------------------------------------------
    # Memilik 2 Parameter berupa $id dan $stat
    # Berfungsi untuk mengubah status pada 'tb_member_user' berdasarkan id user
    #--------------------------------------------------------------------------
    public function verifikasi($id, $stat, $kelompok=FALSE)
    {
        #--------------------------------------------------------------------------
        # Proses pengambilan data pada 'tb_member_user'
        #--------------------------------------------------------------------------
        $con['tabel'] = 'tb_member_user';
        if ($kelompok) 
        {
             $con['where'] = array('id_user'=>$id);
        }
        else
        {
            $con['where'] = array('id'=>$id);
        }
       
        $con['data']  = array('status'=>$stat, 'updated_date'=>date('Y-m-d h:i:s'), 'updated_by'=>$this->session->userdata('user')['id']);
        return $this->update($con);
    }


    #--------------------------------------------------------------------------
    # METHOD VERIFIKASI_DIKLAT
    #--------------------------------------------------------------------------
    # Memilik 2 Parameter berupa $id dan $stat
    # Berfungsi untuk mengubah status pada 'tb_pengajuan_pembina' berdasarkan id user
    #--------------------------------------------------------------------------
    public function verifikasi_diklat($data)
    {
        #--------------------------------------------------------------------------
        # Proses Pengambilan data pada 'tb_pengajuan_pembina'
        #--------------------------------------------------------------------------
        $con['tabel'] = 'tb_pengajuan_pembina';
        $con['where'] = array('id'=>$data['id_pengajuan']);
        $con['data']  = array('status'=>$data['status'], 'alasan'=>$data['alasan'], 'updated_date'=>date('Y-m-d h:i:s'), 'updated_by'=>$this->session->userdata('user')['id']);
        
        if ($this->update($con)) 
        {
            if ($data['status'] === '2') 
            {
                unset($con['data']);

                $con['select']= 'id_member, pembina';
                $result = $this->get($con)->result_array()[0];

                unset($con['where']);
                unset($con['select']);

                $con['tabel']   = 'tb_magang';
                $con['data']    = $result;
                $con['data']['created_date'] = date('Y-m-d h:i:s');
                $con['data']['created_by']   = $this->session->userdata('user')['nip'];

                if ($this->insert($con)) 
                {
                    $con['tabel'] = 'tb_member_user';
                    unset($con['data']);
                    $con['data']  = array('status'=>"3");
                    $con['data']['updated_date'] = date('Y-m-d h:i:s');
                    $con['data']['updated_by']   = $this->session->userdata('user')['nip'];
                    $con['where'] = array('id'=>$result['id_member']);

                    return $this->update($con);
                }
                else
                {
                    return FALSE;
                }

            }
            else
            {
                return TRUE;
            }
        }
        else
        {
            return FALSE;
        }
    }

    public function get_email($id_pengajuan)
    {
        $con['tabel']  = 'tb_magang';
        $con['join']   = array('tb_member_user'=>'tb_magang.id_user = tb_member_user.id', 'tb_member'=>'tb_member_user.id_user = tb_member.id');
        $con['select'] = 'email';

        return $this->get($con)->result_array()[0];
    }

    public function cek_email($email='')
    {
        if (! empty($email)) 
        {
            $con['tabel'] = 'tb_member';
            $con['where'] = array('email'=>$email);

            return $this->get($con)->num_rows()>0;
        }

        return 1;
    }

}

?>