<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pdf extends MY_Controller
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
		redirect();
	}

	public function report()
	{
		// PERSIAPAN HEADER & DATA
		$this->load->model('Mmember');

		$header  = array('ID PESERTA', 'NAMA', 'INSTANSI', 'JENIS', 'BIDANG', 'TUJUAN', 'STATUS');
		$colSize = array(40, 60, 40, 30, 60, 20, 25);

		$param = NULL;

		if (! empty($_GET))
		{
			if (isset($_GET['tahun']) && !empty($_GET['tahun']) && $_GET['tahun'] != 'all')
			{
				$param['tahun'] = $_GET['tahun'];
			}

			if (isset($_GET['bulan']) && !empty($_GET['bulan']) && $_GET['bulan'] != 'all')
			{
				$param['bulan'] = $_GET['bulan'];
			}

			if (isset($_GET['status']) && $_GET['status'] != 'all')
			{
				$param['status'] = $_GET['status'];
			}
		}

		$result = $this->Mmember->get_report($param);

		$no=0;

		foreach ($result as $key)
		{
			$data[$no++] = array($key['id_user'], $key['nama'], $key['instansi'], $key['jenis'].'('.$key['durasi'].' Bulan)', $key['bagian'], $key['tujuan'], $this->getStatus($key['status']));
		}

	    // MULAI MEMBUAT PDF
	    $no = 0;

	    $this->load->library('fpdf', array('orientation'=>'L','size'=>'A4'));
	    $this->fpdf->AddPage();
	    $this->fpdf->header();

		// Tittle
		$this->fpdf->SetFont('Arial','B', 16);
		$this->fpdf->Cell(40, 20, "REPORT PENDAFTAR", 0);
		$this->fpdf->Ln(15);
		$this->fpdf->SetFont('Arial','B', 12);
		$this->fpdf->Cell(20, 6, "Bulan", 0);
		$this->fpdf->Cell(20, 6, (isset($_GET['bulan']) && $_GET['bulan']!='all')?': '.date('F', strtotime('2000-'.$_GET['bulan'].'-1')):': Semua', 0);
		$this->fpdf->Ln();
		$this->fpdf->Cell(20, 6, "Tahun", 0);
		$this->fpdf->Cell(20, 6, (isset($_GET['tahun']) && $_GET['tahun']!='all')?': '.date('Y', strtotime($_GET['tahun'])):': Semua', 0);
		$this->fpdf->Ln();
		$this->fpdf->Cell(20, 6, "Status", 0);
		$this->fpdf->Cell(20, 6, (isset($_GET['status']) && $_GET['status']!='all')?': '.$this->getStatus($_GET['status']):': Semua', 0);
		$this->fpdf->Ln(15);
		$this->fpdf->SetFont('Arial','', 11);

	    // Header
	    foreach($header as $index=>$col)
	    {
	        $this->fpdf->Cell($colSize[$index],10,$col,1);
	    }

	    $this->fpdf->Ln();

	    // Data
	    if (! empty($data))
	    {
	    	foreach($data as $row)
		    {
		        foreach($row as $index=>$col)
		        {
		            $this->fpdf->Cell($colSize[$index],6,$col,1);
		        }

		        $this->fpdf->Ln();
		    }
	    }

	    $this->fpdf->footer();
	    $this->fpdf->Output();
	}

	public function idcard()
	{
		// PERSIAPAN DATA
		if (isset($_GET) && ! empty($_GET['id']))
		{
			$this->load->model('Mmember');
			$result = $this->Mmember->get_data_idcard($_GET['id']);

			if ($result != 0)
			{
				$result = $result[0];
			}
			else
			{
				$this->pesan('pesan', 'Anda belum terdaftar atau status anda belum disetujui');
				redirect(base_url().'dashboard/member');
			}
		}
		else
		{
			show_404();
		}

		$this->load->library('fpdf', array('orientation'=>'P', 'size'=>'A4', 'unit'=>'mm'));
		$this->fpdf->AddPage();

		// BEGRON + LOGO
		$this->fpdf->Image('./assets/img/bgid.jpg',5,5,80,100);
		// FOTO
		$this->fpdf->Image('./Documents/'.$result['id_user'].'/'.$result['foto'],35, 33, 20, 25);
		//NAMA
		$this->fpdf->Ln(53);
		$this->fpdf->SetFont('Times','B', 10);
		$this->fpdf->setX(15);
		$this->fpdf->Cell(20, 5, "Nama", 0, 0,'L');
		$this->fpdf->SetFont('Times','', 10);
		$this->fpdf->Cell(40, 5, ": $result[nama]", 0, 0,'L');
		$this->fpdf->Ln(7);
		//NO IDENTITAS
		$this->fpdf->SetFont('Times','B', 10);
		$this->fpdf->setX(15);
		$this->fpdf->Cell(20, 5, "No. Identitas", 0, 0,'L');
		$this->fpdf->SetFont('Times','', 10);
		$this->fpdf->Cell(40, 5, ": $result[id]", 0, 0,'L');
		$this->fpdf->Ln(7);
		//INSTANSI
		$this->fpdf->SetFont('Times','B', 10);
		$this->fpdf->setX(15);
		$this->fpdf->Cell(20, 5, "Instansi", 0, 0,'L');
		$this->fpdf->SetFont('Times','', 10);
		$this->fpdf->Cell(40, 5, ": $result[instansi]", 0, 0,'L');
		$this->fpdf->Ln(7);
		//UNIT KERJA
		$this->fpdf->SetFont('Times','B', 10);
		$this->fpdf->setX(15);
		$this->fpdf->Cell(20, 5, "Unit Kerja", 0, 0,'L');
		$this->fpdf->SetFont('Times','', 10);
		$this->fpdf->Cell(40, 5, ": ".ucwords(strtolower($result['deskripsi']))."", 0, 0,'L');
		$this->fpdf->Ln(5);

		$this->fpdf->Output();
	}

	private function getStatus($st)
	{
		switch ($st) {
			case '0':
				return 'Ditolak';
				break;
			case '1':
				return 'Menunggu';
				break;
			case '2':
				return 'Menunggu';
				break;
			case '3':
				return 'Diterima';
				break;
			case 'all':
				return 'Semua';
				break;
			default:
				return 'Error';
				break;
		}
	}
}
?>
