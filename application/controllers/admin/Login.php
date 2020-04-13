<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends Admin_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
		$this->load->library('session');
	}

	function index()
	{	
		$this->data['title'] = $this->lang->line('login_heading');
		$this->load->view('admins/v_login',$this->data);
	}
	function auth()
	{	
			$username = $this->input->post('user_name',TRUE);
			$password = md5($this->input->post('pass',TRUE));
			// $password = $this->input->post('pass',TRUE);

			$cek_user = $this->User_model->auth_user($username,$password);
			$hasil = count($cek_user);
			if ($hasil == 1) {

					$data = $this->User_model->auth_user($username,$password);
					$this->session->set_userdata('Login_in',TRUE);

					if ($data->Hak_Akses == 1 ) {
						$this->session->set_userdata('Akses','1');
						$this->session->set_userdata('ses_Id',$data->id_user);
						$this->session->set_userdata('ses_Nama',$data->nama_lengkap);
						$this->session->set_userdata('ses_Username',$data->username);
						$this->session->set_userdata('ses_Jabatan',$data->Jabatan);
						
						redirect('admin/Dashboard','refresh');
					}else {
						$this->session->set_userdata('Akses','2');
						$this->session->set_userdata('ses_Id',$data->id_user);
						$this->session->set_userdata('ses_Nama',$data->nama_lengkap);
						$this->session->set_userdata('ses_Username',$data->username);
						$this->session->set_userdata('ses_Jabatan',$data->Jabatan);
						redirect('admin/Dashboard','refresh');
					}
			}else {
				echo $this->session->set_flashdata('msg','Username Atau Password Salah');
				redirect('admin/login','refresh');
			}
	}
	function logout(){
		$this->data['title'] = "Logout";
        $this->session->sess_destroy();

        echo $this->session->set_flashdata('msg','Logout Berhasil');
        redirect('admin/login');
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */