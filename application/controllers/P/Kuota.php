<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kuota extends MY_Controller 
{

	public function _remap($method, $param = array())
	{
		#--------------------------------------------------------------------------
		# Mengambil list menu dari SESSION
		# List ini kemudian akan diparsing kedalam VIEW sidebar	
		#--------------------------------------------------------------------------

		if (method_exists($this, $method) && $method !== 'index') 
		{
		#--------------------------------------------------------------------------
		# Pengecekan user sudah melakukan login 
		#--------------------------------------------------------------------------
		if ($this->isLogin())
		{
			
		#-------------------------------------------------------------------------------------
		# Jika sudah LOGIN maka List dari SESSION kemudian akan diparsing kedalam VIEW sidebar	
		#-------------------------------------------------------------------------------------
		return call_user_func_array(array($this, $method), $param);
		}

		else
		#--------------------------------------------------------------------------
		# Jika belum login maka akan diarahkan ke halaman LOGIN 
		#--------------------------------------------------------------------------
		{
		redirect(base_url().'home/login');
		}
		}

		else
		#--------------------------------------------------------------------------
		# Pengecekan belum Mengambil list menu dari SESSION 
		# AKan menampilkan pesan ERROR	
		#--------------------------------------------------------------------------
		{
		show_404();
		}
	}

	public function index()
	{
		
	}

	public function add_kuota()
	{
		$data = $this->input->post();
		unset($data['tb']);

		if (isset($data) && isset($data['tahun']) && isset($data['kuota']) && !empty($data['tahun']) && !empty($data['kuota'])) 
		{
			$this->load->model("Mkuota");
			
			if ($this->Mkuota->add_kuota($data)) 
			{
				$this->pesan('pesan', 'Data berhasil diinputkan');
				redirect(base_url().'dashboard/kuota');
			}
			else
			{
				$this->pesan('pesan', 'terjadi kesalahan');
				redirect(base_url().'dashboard/kuota');
			}
		}
		else
		{
			$this->pesan('pesan', 'Data tidak boleh kosong');
			redirect(base_url().'dashboard/kuota');
		}
	}

	public function save_kuota()
	{
		$data = $this->input->post();

		foreach ($data['kuota'] as $key=>$value)
		{
			$con[$key]['no']	= $data['tahun'].''.$key;
			$con[$key]['bulan'] = $key;
			$con[$key]['tahun'] = $data['tahun'];
			$con[$key]['kuota']	= $value;
		}

		$this->load->model("Mkuota");
		
		$par = TRUE;

		foreach ($con as $key)
		{
			if (! $this->Mkuota->save_kuota($key)) 
			{
				$par = FALSE;
				break;
			}
		}

		if ($par)
		{
			$this->pesan("Pesan", "Kuota berhasil disimpan");
			redirect(base_url().'dashboard/kuota');
		}
		else
		{
			$this->pesan("Pesan", "Terjadi kesalahan");
			redirect(base_url().'dashboard/kuota_detail');
		}
	}

	public function get_data()
	{
		if (isset($_GET['bidang']) && ! empty($_GET['bidang']) && isset($_GET['tahun']) && ! empty($_GET['tahun'])) 
		{
			$this->load->model("Mkuota");
			$data[0] = $this->Mkuota->get_kuota_tahun($_GET['tahun']);
			$data[1] = $this->Mkuota->get_kuota_detail($_GET['tahun'], $_GET['bidang']);

			// print_r($data[1]);
			echo json_encode($data);
		}
		else
		{
			show_404();
		}
	}

	public function add_kuota_bidang()
	{
		$this->load->model('Mkuota');

		foreach ($_POST['bidang'] as $key => $value)
		{
			if (! $this->Mkuota->save_kuota_bidang(array('id'=>$_POST['bulan'].''.$key, 'id_bidang'=>$key, 'kuota'=>$value, 'bulan'=>$_POST['bulan'])))
			{
				$this->pesan('pesan', 'Terjadi kesalahan');
				redirect(base_url().'dashboard/kuota_bidang?tahun='.$_POST['tahun'].'&bulan='.$_POST['bulan']);
				break;
			}
		}

		$this->pesan('pesan', 'Data tersimpan');
		redirect(base_url().'dashboard/kuota_bidang?tahun='.$_POST['tahun'].'&bulan='.$_POST['bulan']);
	}
}
?>