<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Mail
{
	private $alamatku = "internship@semenindonesia.com";
	private $namaku	  = "Internship Semen Indonesia";

	public function kirim($param=NULL)
	{
		$CI =& get_instance();
		$CI->load->library('email');

		if ($param !== NULL && ! empty($param) && isset($param['alamat']) && isset($param['judul']) && isset($param['isi'])) 
		{
			$CI->email->from($this->alamatku, $this->namaku);
			$CI->email->to($param['alamat']);

			$CI->email->subject($param['judul']);
			$CI->email->message($param['isi']);

			return $CI->email->send();
		}
		else
		{
			return FALSE;
		}
	}
}