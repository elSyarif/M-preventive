<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Laporan_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
		
	}
	function get_data()
	{
		$this->db->select('*');
		$this->db->from('inspeksi');
		$this->db->join('mesin', 'mesin.ID = inspeksi.id_mesin');
		$this->db->join('tbl_user', 'tbl_user.id_user = inspeksi.id_user');
		$query =$this->db->get();

		return $query->result_array();
	}
	function get_all_data($aktif)
	{
		$this->db->select('*');
		$this->db->from('inspeksi');
		$this->db->join('mesin', 'mesin.ID = inspeksi.id_mesin');
		$this->db->join('tbl_user', 'tbl_user.id_user = inspeksi.id_user');
		$this->db->where($aktif);
		$query =$this->db->get();

		return $query->result_array();
	}

}

/* End of file laporan_model.php */
/* Location: ./application/models/laporan_model.php */