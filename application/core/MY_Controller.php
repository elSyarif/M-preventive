<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        /* COMMON :: ADMIN & PUBLIC */
        /* Load */
        // $this->load->database();
        $this->load->add_package_path(APPPATH . 'third_party/ion_auth/');
        $this->load->config('common/dp_config');
        $this->load->library(array('form_validation', 'ion_auth'));
        $this->load->helper(array('array', 'language', 'url'));
        $this->load->model('common/prefs_model');

        /* Data */
        $this->data['charset']        = $this->config->item('charset');
        $this->data['frameworks_dir'] = $this->config->item('frameworks_dir');
        $this->data['plugins_dir']    = $this->config->item('plugins_dir');
        $this->data['avatar_dir']     = $this->config->item('avatar_dir');

    }
}


class Admin_Controller extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        // if ( ! $this->ion_auth->logged_in())
        // {
        //     redirect('admin/auth/login', 'refresh');
        // }
        // else
        // {
            /* Load */
            $this->load->config('admin/dp_config');
            $this->load->library('admin/page_title');
            $this->load->library('admin/breadcrumbs');
            $this->load->model('admin/core_model');
            $this->load->helper('menu');
        

            /* Data */
            $this->data['title']       = $this->config->item('title');
            $this->data['title_lg']    = $this->config->item('title_lg');
            $this->data['title_mini']  = $this->config->item('title_mini');
            // $this->data['admin_prefs'] = $this->prefs_model->admin_prefs();
            // $this->data['user_login']  = $this->prefs_model->user_info_login($this->ion_auth->user()->row()->id);
        // }
    }
}


class Public_Controller extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->ion_auth->logged_in() && $this->ion_auth->is_admin())
        {
            $this->data['admin_link'] = TRUE;
        }
        else
        {
            $this->data['admin_link'] = FALSE;
        }

        if ($this->ion_auth->logged_in())
        {
            $this->data['logout_link'] = TRUE;
        }
        else
        {
            $this->data['logout_link'] = FALSE;
        }
    }
}
