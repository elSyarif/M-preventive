<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
        if($this->session->userdata('Login_in') != TRUE){
            redirect('admin/login');
        }
        $this->load->helper('url');
        $this->load->model('User_model');
        $this->data['pagetitle'] = $this->page_title->show();
         $this->data['data_user'] = $this->User_model->get_all_user();
        /* Breadcrumbs :: Common */
        $this->breadcrumbs->unshift(1, lang('menu_users'), 'admin/users');
	}

	public function index()
	{

            /* Title Page */
            $this->page_title->push(lang('menu_dashboard'));
           	$this->data['pagetitle'] = $this->page_title->show();

            /* Breadcrumbs */
            $this->data['breadcrumb'] = $this->breadcrumbs->show();

            /* Load Template */
            $this->load->view('admins/users/index', $this->data);
           // $this->view->admin_render('admin/dashboard', $this->data);
	}
    public function create()
    {
        $this->data['title'] = $this->lang->line('create_user_heading');

        // validate form input
        $this->form_validation->set_rules('NIP','NIP', 'required');

        if ($this->form_validation->run()) {
                $param = array(
                    'NIP'           => $this->input->post('NIP'),
                    'nama_lengkap'  => $this->input->post('nama'),
                    'username'      => $this->input->post('username'),
                    'Pass'          =>md5($this->input->post('pass')) ,
                    'Jabatan'       => $this->input->post('jabatan'),
                    'Hak_Akses'     => $this->input->post('Akses'),
                );
                $user_add = $this->User_model->add_user($param);

                if ($this->db->affected_rows()) {
                    $this->session->set_flashdata('success','Data user berhasil ditambah!');
                redirect('admin/user','refresh');
                }else {
                    $this->session->set_flashdata('warning','Gagal tambah data user!');
                    redirect('admin/user','refresh');
                }
        } else {
            // redirect('admin/user','refresh');
            $this->_render_page('admins/users' . DIRECTORY_SEPARATOR . 'create', $this->data);
        }   
            
    }
    public function edit($id)
    {
        $this->data['title'] = $this->lang->line('edit_user_heading');

        $this->data['data_user'] = $this->User_model->get_user($id);
        $this->load->view('admins/users/edit', $this->data);
        $this->form_validation->set_rules('NIP', 'No NIP', 'required');
        
        if ($this->form_validation->run()) {
            $param = array(
                'NIP'=>$this->input->post('NIP'),
                'nama_lengkap'=>$this->input->post('nama'),
                'username'=>$this->input->post('username'),
                'Jabatan'=>$this->input->post('Jabatan'),);
            $this->db->where('id_user', $id);
            $this->User_model->update_user($id,$param);
            if ($this->db->affected_rows()) {
                $this->session->set_flashdata('success','Data berhasil diupdate!');
                redirect('admin/user','refresh');
            }else {
                 $this->session->set_flashdata('warning','Data Gagal diupdate!');
                redirect('admin/user','refresh');
            }
        } else {
             $this->_render_page('admins/users' . DIRECTORY_SEPARATOR . 'edit', $this->data);
        }
    }
    public function delete($id)
    {
      $this->User_model->delete($id);
        if ($this->db->affected_rows()) {
            $this->session->set_flashdata('success','Berhasil hapus data!');
            redirect('admin/user/index','refresh');
        }else {
             $this->session->set_flashdata('warning','Gagal hapus data!');
            redirect('admin/user/index','refresh');
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

/* End of file user.php */
/* Location: ./application/controllers/user.php */