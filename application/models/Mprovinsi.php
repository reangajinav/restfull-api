<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mprovinsi extends CI_Model {

	public function getProvinsi($id = null)
	{
		if($id == null)
		{
			return $this->db->get('provinsi')->result_array();
		}
		else
		{

			return $this->db->get_where('provinsi',['id_provinsi' => $id])->result_array();
		}
	}

	public function deleteProvinsi($id)
	{
		$this->db->delete('provinsi', ['id_provinsi' => $id]);
		return $this->db->affected_rows();
	}

	public function createProvinsi($data)
	{
		$this->db->insert('provinsi', $data);
		return $this->db->affected_rows();
	}
	
	public function updateProvinsi($data,$id)
	{
		$this->db->update('provinsi', $data, ['id_provinsi' => $id]);
		return $this->db->affected_rows();
	}	

}

/* End of file Mprovinsi.php */
/* Location: ./application/models/Mprovinsi.php */