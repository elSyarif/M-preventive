<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mesin extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();

         $this->load->model('Mesin_model');
         $this->load->helper('form','url');
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
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            $this->data['data_mesin'] = $this->Mesin_model->get_all_mesin();

            // foreach ($this->data['mesin'] as $k => $mesin)
            // {
            //     $this->data['mesin'][$k]->groups = $this->ion_auth->get_mesin_groups($mesin->id)->result();
            // }
            /* Load Template */
            $this->load->view('admins/mesin/index', $this->data);
           // $this->view->admin_render('admin/dashboard', $this->data);
        }
	}
    public function create()
    {
        if($this->session->userdata('Login_in') != TRUE){
            redirect('admin/login');
        }
        $this->form_validation->set_rules('No_Mesin', 'No Mesin', 'required');
        if ($this->form_validation->run()) {
            $params = array(
                'No_Mesin' => $this->input->post('No_Mesin'),
                'Nama_Mesin' => $this->input->post('Nama_Mesin'),
                'Area' => $this->input->post('Area'),);
            $mesin_id = $this->Mesin_model->add_mesin($params);

            if ($this->db->affected_rows()) {
                $this->session->set_flashdata('success','Data user berhasil ditambah!');
                redirect('admin/mesin','refresh');
            }else {
                 $this->session->set_flashdata('warning','Gagal tambah data user!');
                redirect('admin/mesin','refresh');
            }
        } else {

            $this->_render_page('admins/mesin' . DIRECTORY_SEPARATOR . 'create', $this->data);
        }
        
    }
    public function create_action()
    {
        

        // 
        $config['upload_path'] = './upload/images';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['file_name'] = date('YmdHis');
        $config['max_size']  = '50000';
        $config['max_width']  = '5000';
        $config['max_height']  = '5000';
        
        $this->load->library('upload', $config);
        

        if ( ! $this->upload->do_upload('Gambar')){
            $this->session->set_flashdata('warning','Gagal tambah data mesin!');
                redirect('admin/mesin','refresh');
        }
        else{
            $img = $this->upload->data();
            $gambar = $img['file_name'];
            $this->form_validation->set_rules('No_Mesin', 'No Mesin', 'required');
                if ($this->form_validation->run()) {
                    $params = array(
                        'No_Mesin' => $this->input->post('No_Mesin'),
                        'Nama_Mesin' => $this->input->post('Nama_Mesin'),
                        'Area' => $this->input->post('Area'),
                        'Gambar' => $gambar);
                    $mesin_id = $this->Mesin_model->add_mesin($params);

            if ($this->db->affected_rows()) {
               $this->session->set_flashdata('success','Data user berhasil ditambah!');
                redirect('admin/mesin','refresh');
            }
            
        }
    }
}
    public function edit($id)
    {   
        $this->data['data_mesin'] = $this->Mesin_model->get_mesin($id);
        $this->load->view('admins/mesin/edit', $this->data);
        $this->form_validation->set_rules('No_Mesin', 'No Mesin', 'required');

        if ($this->form_validation->run() == TRUE) {
            $params = array(
                'No_Mesin' => $this->input->post('No_Mesin'),
                'Nama_Mesin' => $this->input->post('Nama_Mesin'),
                'Area' => $this->input->post('Area'),);
            $this->db->where('id', $id);
            $this->Mesin_model->update_mesin($id,$params);

            if ($this->db->affected_rows()) {
                $this->session->set_flashdata('success','Data berhasil diupdate!');
                redirect('admin/mesin','refresh');
            }else {
                 $this->session->set_flashdata('warning','Data Gagal diupdate!');
                redirect('admin/mesin','refresh');
            }
            
        } else {
           $this->_render_page('admins/Mesin' . DIRECTORY_SEPARATOR . 'index', $this->data);
        }
    }
    public function edit_action($id)
    {
        $data = $this->Mesin_model->get_mesin($id);

       
        $this->load->view('admins/mesin/edit', $this->data);
        if ($_FILES AND $_FILES['Gambar']) {
            $config = array(
                'upload_path' => './upload/images',
                'allowed_types' => 'gif|jpg|png',
                'file_name' => date('YmdHis'),
                'max_size'  => '50000',
                'max_width'  => '5000',
                'max_height'  => '5000');

        $this->load->library('upload', $config);   

        if ( ! $this->upload->do_upload('Gambar')){
            $this->session->set_flashdata('warning','Gagal tambah data mesin!');
                redirect('admin/mesin','refresh');
        }
        else{
            
            // unlink('upload/images/'.$data->Gambar);
            $img = $this->upload->data();

            $gambar = $img['file_name'];
        
            $this->form_validation->set_rules('No_Mesin', 'No Mesin', 'required');
                if ($this->form_validation->run()) {
                     $params = array(
                            'No_Mesin' => $this->input->post('No_Mesin'),
                            'Nama_Mesin' => $this->input->post('Nama_Mesin'),
                            'Area' => $this->input->post('Area'),
                            'Gambar' =>$gambar);
                            $this->db->where('id', $id);
                            $this->Mesin_model->update_mesin($id,$params);

            if ($this->db->affected_rows()) {
               $this->session->set_flashdata('success','Data user berhasil ditambah!');
                redirect('admin/mesin','refresh');
            }
            
        }
    }
}
        }
    public function delete($id)
    {   
        $this->Mesin_model->delete_mesin($id);
        if ($this->db->affected_rows()) {
            $this->session->set_flashdata('success','Berhasil hapus data!');
            redirect('admin/mesin/index','refresh');
        }else {
             $this->session->set_flashdata('warning','Gagal hapus data!');
            redirect('admin/mesin/index','refresh');
        }
    }
    public function _render_page($view, $data = NULL, $returnhtml = FALSE)//I think this makes more sense
    {

        $this->viewdata = (empty($data)) ? $this->data : $data;

        $view_html = $this->load->view($view, $this->viewdata, $returnhtml);

        // This will return html on 3rd argument being true
        if ($returnhtml)
        {
            return $view_html;
        }
    }

}

/* End of file mesin.php */
/* Location: ./application/controllers/mesin.php */