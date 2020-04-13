<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
         $this->load->helper('form');
         $this->load->model('laporan_model');
         
		
	}
	public function index()
	{
		if($this->session->userdata('Login_in') != TRUE){
            redirect('admin/login');
        }
         else
        {
            /* Title Page */
            $this->page_title->push(lang('menu_dashboard'));
           	$this->data['pagetitle'] = $this->page_title->show();

            /* Breadcrumbs */
            $this->data['breadcrumb'] = $this->breadcrumbs->show();

            /* Data */
            $this->data['data_laporan'] = $this->laporan_model->get_data();
            /* Load Template */
            $this->load->view('admins/laporan/index', $this->data);
           // $this->view->admin_render('admin/dashboard', $this->data);
        }
	}
    public function detail_laporan($id)
    {      
        if($this->session->userdata('Login_in') != TRUE){
            redirect('admin/login');
        }
        
        $aktif = array('inspeksi.Id' =>$id);
        $this->data['data_laporan'] = $this->laporan_model->get_all_data($aktif);
        $this->load->view('admins/laporan/laporan', $this->data);
    }
    public function laporan_print($id)
    {   
         $aktif = array('inspeksi.Id' =>$id);
         $this->data['data_laporan'] = $this->laporan_model->get_all_data($aktif);
         $this->load->view('admins/laporan/laporan-print', $this->data);
    }
    function generate_pdf($id){}
    // {       $this->load->library("pdf");

    //         $aktif = array('inspeksi.Id' =>$id);
    //         $this->data['data_laporan'] = $this->laporan_model->get_all_data($aktif);

    //         $this->load->view('admins/laporan/laporan-print', $this->data);
    //         $this->pdf->load_view('admins/laporan/laporan-print', $this->data);
    //         $this->pdf->render();
    //         $this->pdf->stream("inspeksi.pdf");
            

}

/* End of file laporan.php */
/* Location: ./application/controllers/admin/laporan.php */