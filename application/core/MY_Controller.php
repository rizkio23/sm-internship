<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller 
{

	public function captcha($width=330,$height=40 )
	{
        $prevCap = $this->session->userdata('captcha');
        
        if(!empty($prevCap))
        {
            if(file_exists('Assets/captcha/'.$prevCap['filename']))
            {
                $this->hapusBerkas('Assets/captcha/'.$prevCap['filename']);
            }
            
            $this->session->unset_userdata('captcha');
        }
            
		$this->load->helper('captcha');
		$vals = array(
		    'word'	       => rand(1001,9999),
		    'img_path'	   => './Assets/captcha/',
		    'img_url'	   => base_url().'Assets/captcha/',
		    'img_width'	   => $width,
		    'img_height'   => $height,
		    'expiration'   => 7200,
		    'font_size'	   => 50,
		    'colors'       => array(
            'background' => array(255, 255, 255),
            'border'     => array(255, 255, 255),
            'text'       => array(0, 0, 0),
            'grid'       => array(255, 140, 40))
		    );

		$cap = create_captcha($vals);
        
        $this->session->set_userdata('captcha', array('word'=>$cap['word'], 'filename'=>$cap['filename']));

        return $cap;
	}
	
	public function hapusBerkas($path)
	{
		unlink($path);
	}

    public function isLogin()
    {
    	$user = $this->session->userdata('user');
    	return (!empty($user) && $user['auth'] === TRUE);
    }

	public function pesan($nama,$pesan)
	{
		$this->session->set_flashdata($nama,$pesan);
	}
}