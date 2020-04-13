<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('Login_in') != TRUE){
            redirect('admin/login');
        }
        
			$this->load->model('admin/dashboard_model');
	}

	public function index()
	{
		/* Title Page */
            $this->page_title->push(lang('menu_dashboard'));
           	$this->data['pagetitle'] = $this->page_title->show();

            /* Breadcrumbs */
            $this->data['breadcrumb'] = $this->breadcrumbs->show();

            /* Data */
            $this->data['count_users']       = $this->dashboard_model->get_count_record('tbl_user');
            $this->data['count_mesin']       = $this->dashboard_model->get_count_record('mesin');
            $this->data['count_inspeksi']    = $this->dashboard_model->get_count_record('inspeksi');
            $this->data['count_jadwal']      = $this->dashboard_model->get_count_record('jadwal');


           	$this->load->view('admins/dashboard', $this->data);
	}
	function data_user(){

	}
	function data_jadwal(){

	}
	function data_mesin(){

	}
	function data_history(){

	}
	function data_Laporan(){
		
	}

}

/* End of file  */
/* Location: ./application/controllers/ */