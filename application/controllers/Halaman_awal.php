<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Halaman_awal extends CI_Controller {

	public function index()
	{
		$this->load->view('halaman_awal/header');
		$this->load->view('halaman_awal/index');
		$this->load->view('halaman_awal/footer');
	}
}
