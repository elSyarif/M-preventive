<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class History_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}
	function get_data()
	{
		$this->db->select('inspeksi.*, mesin.*');
		$this->db->from('mesin');
		$this->db->join('inspeksi', 'inspeksi.id_mesin = mesin.ID','inner');
		$this->db->order_by('Tgl_inspeksi', 'DESC');
		$query =$this->db->get();

		return $query->result_array();
	}
	function get_all_data_mesin($param){

		$this->db->select('inspeksi.id, inspeksi.id_mesin, inspeksi.id_user, inspeksi.Tgl_inspeksi, inspeksi.Drive_end_OV_H, inspeksi.Drive_end_OV_V, inspeksi.Drive_end_BV_H, inspeksi.Drive_end_BV_V, inspeksi.Temperatur_Drive, inspeksi.Non_Drive_end_OV_H, inspeksi.Non_Drive_end_OV_V, inspeksi.Non_Drive_end_BV_H, inspeksi.Non_Drive_end_BV_V, inspeksi.Temperatur_Non_Drive, mesin.*');
		$this->db->from('inspeksi'); 
		$this->db->join('mesin', 'mesin.ID = inspeksi.id_mesin');
		$this->db->where('inspeksi.id_mesin', $param);


		$query =$this->db->get();
	//	return $query->result_array();
		
		If($query->num_rows() > 0){
			            foreach($query->result() as $data){
			                $hasil[] = $data;
			            }
			            return $hasil;
			        }
		}
		

}

/* End of file History_model.php */
/* Location: ./application/models/History_model.php */