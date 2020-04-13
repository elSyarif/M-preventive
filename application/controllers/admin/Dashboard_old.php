<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();

        /* Load :: Common */
        $this->load->helper('number');
        $this->load->model('admin/dashboard_model');
	}

	public function index()
	{
		if ( ! $this->ion_auth->logged_in())
        {
            redirect('admin/auth/login', 'refresh');
        }
         else
        {
            /* Title Page */
            $this->page_title->push(lang('menu_dashboard'));
           	$this->data['pagetitle'] = $this->page_title->show();

            /* Breadcrumbs */
            $this->data['breadcrumb'] = $this->breadcrumbs->show();

            /* Data */
            $this->data['count_users']       = $this->dashboard_model->get_count_record('users');
            $this->data['count_mesin']       = $this->dashboard_model->get_count_record('mesin');
            $this->data['count_inspeksi']    = $this->dashboard_model->get_count_record('inspeksi');
            $this->data['count_jadwal']      = $this->dashboard_model->get_count_record('jadwal');

            /* Load Template */
            $this->load->view('admins/dashboard', $this->data);
           // $this->view->admin_render('admin/dashboard', $this->data);
        }
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */