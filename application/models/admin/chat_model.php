<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}

	function getMsg($limit= 10)
	{
		$sql = "SELECT * FORM tbl_emergency ORDER BY id DESC limit $limit";
		return $this->db->query)$sql;
	}
	function insertMsg($id_peng,$id_penerima, $Isipesan, $current)
	{
		$sql = "INSERT INTO tbl_emergency SET id_user_kirim ='$id_peng', id_user_pen='$id_penerima', pesan ='Isipesan', time='$current'";
	}


}

/* End of file chat_model.php */
/* Location: ./application/models/admin/chat_model.php */