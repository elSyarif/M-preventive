<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// require 'vendor/autoload.php';
class Chat extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
         $this->load->helper('form','url'); 
          $this->load->model('chat_model');
		
	}

	public function index()
	{
       $this->data['getPesan'] =$this->chat_model->getMsg();

    //    $this->data['json']= array();
    //    foreach($this->data['getPesan'] as $data){
    //         array_push($this->data['json'],array(
    //            'id_peng'=>$data->id_user_kirim,
    //            'id_pen'=>$data->id_user_pen,
    //            'nama'=>$data->nama_lengkap,
    //            'pesan'=>$data->pesan,
    //            'time'=>$data->time,
    //         ));
    //    }

       $this->_render_page('admins/chat' . DIRECTORY_SEPARATOR . 'index', $this->data);
	 
    }
    public function add_pesan(){
        // $options = array(
        //     'cluster' => 'ap1',
        //     'useTLS' => true
        //   );
        //   $pusher = new Pusher\Pusher(
        //     '6aca76fcd033f964372b',
        //     '04b9006f0cb846cb5ba1',
        //     '609519',
        //     $options
        //   );
        //   $push = $this->db->order_by('id', 'desc');
        //   $push = $this->db->get('tbl_emergency');
          
        //   foreach ($push as $key => $value) {
        //       $data_push[] = $value;
        //   }
        //   $pusher->trigger('my-channel', 'my-event', $data_push);

        $data = array(
            'id' => null,
            'id_pengirim' =>$this->input->post('user'),
            'pesan'=>$this->input->post('message'),
            'time'=>null);

          $this->db->insert('tbl_emergency', $data);
            
            
                  
            
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

/* End of file chat.php */
/* Location: ./application/controllers/admin/chat.php */