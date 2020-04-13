<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}

	function getMsg()
	{
		$this->db->select('tbl_user.*, tbl_emergency.*');
		$this->db->from('tbl_emergency');
		$this->db->join('tbl_user', 'tbl_user.id_user = tbl_emergency.id_pengirim','left');
		$this->db->order_by('time', 'DESC');
		// $this->db->limit(6);
		
		$query =$this->db->get();

		return $query->result();


	}
	function insertMsg($id_peng,$Isipesan, $current)
	{	
		

		$sql = "INSERT INTO tbl_emergency SET id_pengirim ='$id_peng',pesan ='$Isipesan', time='$current'";
	}


}

/* End of file chat_model.php */
/* Location: ./application/models/admin/chat_model.php */