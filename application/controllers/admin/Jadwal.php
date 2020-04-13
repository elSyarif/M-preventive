<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jadwal extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->table        = 'jadwal';
        $this->load->model('jadwal_model');
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
            $this->data['data_calendar'] = $this->jadwal_model->get_list($this->table);
            $calendar = array();
            foreach ($this->data['data_calendar'] as $key => $val) 
            {
                $calendar[] = array(
                                'id'    => intval($val->id), 
                                'title' => $val->title, 
                                'description' => trim($val->description), 
                                'start' => date_format( date_create($val->start) ,"Y-m-d H:i:s"),
                                'end'   => date_format( date_create($val->end) ,"Y-m-d H:i:s"),
                                'color' => $val->color,
                                );
            }
            $this->data['data_List'] = $this->jadwal_model->data_List();
            $get_data = array();
            $this->data['get_data']           = json_encode($calendar);
           // $this->load->view('admins/jadwals/index', $this->data);
         }
                $this->load->view('admins/jadwals/index', $this->data);
            /* Load Template */
            
           // $this->view->admin_render('admin/dashboard', $this->data);
        }
    /*Get all Events */
    public function save()
    {
        $response = array();
        $this->form_validation->set_rules('title', 'Title cant be empty ', 'required');
        if ($this->form_validation->run() == TRUE)
        {
            $param = $this->input->post();
            $calendar_id = $param['calendar_id'];
            unset($param['calendar_id']);

            if($calendar_id == 0)
            {
                
                $insert = $this->jadwal_model->insert($this->table, $param);

                if ($insert > 0) 
                {
                    $response['status'] = TRUE;
                    $response['notif']  = 'Success add calendar';
                    $response['id']     = $insert;
                }
                else
                {
                    $response['status'] = FALSE;
                    $response['notif']  = 'Server wrong, please save again';
                }
            }
            else
            {   
                $where      = [ 'id'  => $calendar_id];
                // $param['modified_at']       = date('Y-m-d H:i:s');
                $update = $this->jadwal_model->update($this->table, $param, $where);

                if ($update > 0) 
                {
                    $response['status'] = TRUE;
                    $response['notif']  = 'Success add calendar';
                    $response['id']     = $calendar_id;
                }
                else
                {
                    $response['status'] = FALSE;
                    $response['notif']  = 'Server wrong, please save again';
                }

            }
        }
        else
        {
            $response['status'] = FALSE;
            $response['notif']  = validation_errors();
        }

        echo json_encode($response);
    }
    public function delete()
    {
        $response       = array();
        $calendar_id    = $this->input->post('id');
        if(!empty($calendar_id))
        {
            $where = ['id' => $calendar_id];
            $delete = $this->jadwal_model->delete($this->table, $where);

            if ($delete > 0) 
            {
                $response['status'] = TRUE;
                $response['notif']  = 'Success delete calendar';
            }
            else
            {
                $response['status'] = FALSE;
                $response['notif']  = 'Server wrong, please save again';
            }
        }
        else
        {
            $response['status'] = FALSE;
            $response['notif']  = 'Data not found';
        }

        echo json_encode($response);
    }
    


}

/* End of file jadawal.php */
/* Location: ./application/controllers/jadwal.php */