<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {


	function auth_user($username,$password)
	{
		$this->db->where('username', $username);
		$this->db->where('pass', $password);
		return $this->db->get('tbl_user')->row();


		// $query=$this->db->query("SELECT * FROM tbl_user WHERE username='$username' AND pass=MD5('$password')");
  //       return $query;
		
	}
	function get_user($ID)
    {
        return $this->db->get_where('tbl_user',array('id_user'=>$ID))->row_array();
    }
	function get_all_user(){

	$this->db->order_by('id_user');
            return $this->db->get('tbl_user')->result_array();

	}
	function add_user($params)
	{
		$this->db->insert('tbl_user',$params);
        return $this->db->insert_id();
	}
	function update_user($ID,$params)
	{
		$this->db->where('id_user',$ID);
        return $this->db->update('tbl_user',$params);
	}
	function delete($ID)
	{
		return $this->db->delete('tbl_user',array('id_user'=>$ID));
	}

	}

/* End of file  */
/* Location: ./application/models/ */