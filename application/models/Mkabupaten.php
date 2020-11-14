<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mkabupaten extends CI_Model {

	public function getKabupaten($id = null)
	{
		if($id == null)
		{	
			return $this->db->get('kabupaten')->result_array();
		}
		else
		{
			return $this->db->get_where('kabupaten',['id_provinsi' => $id])->result_array();
		}
	}

	public function getKabupatenById($id)
	{
		return $this->db->get_where('kabupaten',['id_kabupaten' => $id])->result_array();
	}

	public function createKabupaten($data)
	{
		$this->db->insert('kabupaten', $data);
		return $this->db->affected_rows();
	}
	

}

/* End of file Mkabupaten.php */
/* Location: ./application/models/Mkabupaten.php */