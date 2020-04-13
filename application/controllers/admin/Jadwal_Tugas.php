<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jadwal_Tugas extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('admins/jadwals/tugas', $this->data);
	}

}

/* End of file Jadwal_Tugas.php */
/* Location: ./application/controllers/Jadwal_Tugas.php */