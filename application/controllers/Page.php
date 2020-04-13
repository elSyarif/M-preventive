<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('masuk') != TRUE){
            $url=base_url();
           		 redirect($url);
        }
	}

	public function index()
	{
		$this->load->view('welcome_message');
	}
	function data_user(){

	}
	function data_jadwal(){

	}
	function data_mesin(){

	}
	function data_history(){

	}
	function data_laporan(){
		
	}

}

/* End of file Page.php */
/* Location: ./application/controllers/Page.php */