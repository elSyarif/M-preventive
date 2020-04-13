<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Group extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();

        $this->load->helper('url');
        $this->data['pagetitle'] = $this->page_title->show();

        /* Breadcrumbs :: Common */
        $this->breadcrumbs->unshift(1, lang('menu_users'), 'admin/users');
	}

	public function index()
	{
		if ( ! $this->ion_auth->logged_in() OR ! $this->ion_auth->is_admin())
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
            $this->data['groups'] = $this->ion_auth->groups()->result();
            /* Data */
       
            /* Load Template */
            $this->load->view('admins/group/index', $this->data);
           // $this->view->admin_render('admin/dashboard', $this->data);
        }
	}
	public function create_group()
	{
		$this->data['title'] = $this->lang->line('create_group_title');

		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('admin/auth', 'refresh');
		}

		// validate form input
		$this->form_validation->set_rules('group_name', $this->lang->line('create_group_validation_name_label'), 'trim|required|alpha_dash');

		if ($this->form_validation->run() === TRUE)
		{
			$new_group_id = $this->ion_auth->create_group($this->input->post('group_name'), $this->input->post('description'));
			if ($new_group_id)
			{
				// check to see if we are creating the group
				// redirect them back to the admin page
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect("admin/group", 'refresh');
			}
		}
		else
		{
			// display the create group form
			// set the flash data error message if there is one
			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->data['group_name'] = array(
				'name'  => 'group_name',
				'id'    => 'group_name',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('group_name'),
			);
			$this->data['description'] = array(
				'name'  => 'description',
				'id'    => 'description',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('description'),
			);

			$this->_render_page('admins/group' . DIRECTORY_SEPARATOR . 'create_group', $this->data);
		}
	}
	// public function edit($id)
	// {
	// 	if ( ! $this->ion_auth->logged_in() OR ! $this->ion_auth->is_admin() OR ! $id OR empty($id))
	// 	{
	// 		redirect('auth', 'refresh');
	// 	}

 //        /* Breadcrumbs */
 //        $this->breadcrumbs->unshift(2, lang('menu_groups_edit'), 'admin/groups/edit');
 //        $this->data['breadcrumb'] = $this->breadcrumbs->show();

 //        /* Variables */
	// 	$group = $this->ion_auth->group($id)->row();

	// 	/* Validate form input */
 //        $this->form_validation->set_rules('group_name', $this->lang->line('edit_group_validation_name_label'), 'required|alpha_dash');

	// 	if (isset($_POST) && ! empty($_POST))
	// 	{
	// 		if ($this->form_validation->run() == TRUE)
	// 		{
	// 			$group_update = $this->ion_auth->update_group($id, $_POST['group_name'], $_POST['group_description']);

	// 			if ($group_update)
	// 			{
	// 				$this->session->set_flashdata('message', $this->lang->line('edit_group_saved'));

 //                    /* IN TEST */
 //                    $this->db->update('groups', array('bgcolor' => $_POST['group_bgcolor']), 'id = '.$id);
	// 			}
	// 			else
	// 			{
	// 				$this->session->set_flashdata('message', $this->ion_auth->errors());
	// 			}

	// 			redirect('admin/groups', 'refresh');
	// 		}
	// 	}

 //        $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
 //        $this->data['group']   = $group;

	// 	$readonly = $this->config->item('admin_group', 'ion_auth') === $group->name ? 'readonly' : '';

	// 	$this->data['group_name'] = array(
	// 		'type'    => 'text',
	// 		'name'    => 'group_name',
	// 		'id'      => 'group_name',
	// 		'value'   => $this->form_validation->set_value('group_name', $group->name),
 //            'class'   => 'form-control',
	// 		$readonly => $readonly
	// 	);
	// 	$this->data['group_description'] = array(
	// 		'type'  => 'text',
	// 		'name'  => 'group_description',
	// 		'id'    => 'group_description',
	// 		'value' => $this->form_validation->set_value('group_description', $group->description),
 //            'class' => 'form-control'
	// 	);
	// 	$this->data['group_bgcolor'] = array(
	// 		'type'     => 'text',
	// 		'name'     => 'group_bgcolor',
	// 		'id'       => 'group_bgcolor',
	// 		'value'    => $this->form_validation->set_value('group_bgcolor', $group->bgcolor),
	// 		'data-src' => $group->bgcolor,
 //            'class'    => 'form-control'
	// 	);

 //        /* Load Template */
 //        $this->template->admin_render('admin/groups/edit', $this->data);
	// }
	public function edit_group($id)
	{
		// bail if no group id given
		if (!$id || empty($id))
		{
			redirect('admin/group', 'refresh');
		}

		$this->data['title'] = $this->lang->line('edit_group_title');

		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('admin/group/edit_group', 'refresh');
		}

		$group = $this->ion_auth->group($id)->row();

		// validate form input
		$this->form_validation->set_rules('group_name', $this->lang->line('edit_group_validation_name_label'), 'required|alpha_dash');

		if (isset($_POST) && !empty($_POST))
		{
			if ($this->form_validation->run() === TRUE)
			{
				$group_update = $this->ion_auth->update_group($id, $_POST['group_name'], $_POST['group_description']);

				if ($group_update)
				{
					$this->session->set_flashdata('message', $this->lang->line('edit_group_saved'));
				}
				else
				{
					$this->session->set_flashdata('message', $this->ion_auth->errors());
				}
				redirect("admin/user", 'refresh');
			}
		}

		// set the flash data error message if there is one
		$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

		// pass the user to the view
		$this->data['group'] = $group;

		$readonly = $this->config->item('admin_group', 'ion_auth') === $group->name ? 'readonly' : '';

		$this->data['group_name'] = array(
			'name'    => 'group_name',
			'id'      => 'group_name',
			'type'    => 'text',
			'value'   => $this->form_validation->set_value('group_name', $group->name),
			$readonly => $readonly,
		);
		$this->data['group_description'] = array(
			'name'  => 'group_description',
			'id'    => 'group_description',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('group_description', $group->description),
		);

		$this->_render_page('admins/group' . DIRECTORY_SEPARATOR . 'edit_group', $this->data);
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

/* End of file group.php */
/* Location: ./application/controllers/group.php */