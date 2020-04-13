
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class History extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();

        /* Load :: Common */
         $this->load->helper('form');
         $this->load->model('History_model');
         $this->data['data_history'] = $this->History_model->get_data();
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
            
            

            /* Load Template */
            $this->load->view('admins/historys/index', $this->data);
           // $this->view->admin_render('admin/dashboard', $this->data);
        }
	}
    public function detail($param)
    {  

        if($this->session->userdata('Login_in') != TRUE){
            redirect('admin/login');
        }            

        $this->data['detail_history'] =$this->History_model->get_all_data_mesin($param);
        $dataChart = array();
        $dataT_Chart= array();
           foreach ($this->data['detail_history'] as $D) {
            $dataChart[] = array(
                'date'=> $D->Tgl_inspeksi,
                'value'=> $D->Drive_end_OV_H,
                'value2'=> $D->Drive_end_OV_V,
                'value3'=> $D->Drive_end_BV_H,
                'value4'=> $D->Drive_end_BV_V,
                'value5'=> $D->Non_Drive_end_OV_H,
                'value6'=> $D->Non_Drive_end_OV_V,
                'value7'=> $D->Non_Drive_end_BV_H,
                'value8'=> $D->Non_Drive_end_BV_V,
            );
        }
        foreach ($this->data['detail_history'] as $DT) {
            $dataT_Chart[] = array(
                'date'=> $DT->Tgl_inspeksi,
                'item'=> $DT->Temperatur_Drive,
                'item2'=>$DT->Temperatur_Non_Drive,
            );           
        }

        $ChartData = array();
        $Tem_Chart= array();

        $this->data['ChartData'] = json_encode($dataChart);
        $this->data['Tem_Chart'] = json_encode($dataT_Chart);        

        $this->load->view('admins/historys/detail', $this->data);
    }

}

/* End of file history.php */
/* Location: ./application/controllers/admin/history.php */

?>