<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Kabupaten extends REST_Controller {

	public function __construct()
	{
		parent:: __construct();
		$this->load->model('Mkabupaten');
	}

	public function index_get()
	{
		$id = $this->get('id_provinsi');
		$idkab = $this->get('id_kabupaten');

		if($id == null && $idkab == null)
		{
			$getKabupaten = $this->Mkabupaten->getKabupaten();			
		}
		else if($id == null && $idkab != null)
		{
			$getKabupaten = $this->Mkabupaten->getKabupatenById($idkab);
		}
		else
		{
			$getKabupaten = $this->Mkabupaten->getKabupaten($id);
		}


		if($getKabupaten)
		{
			$this->response([
				'status' => true,
				'data' => $getKabupaten
			], REST_Controller::HTTP_OK);
		}
		else
		{
			$this->response([
				'status' => false,
				'message' => 'id not found'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}

	public function index_post()
	{
		$data=[
			'id_provinsi' => $this->post('id_provinsi'),
			'nama_kabupaten' => $this->post('nama_kabupaten'),
			'jumlah_penduduk' => $this->post('jumlah_penduduk')
		];

		$insertKabupaten = $this->Mkabupaten->createKabupaten($data);

		if($insertKabupaten > 0)
		{
			$this->response([
				'status'=> true,
				'message'=> 'data berhasil ditambahkan'
			], REST_Controller::HTTP_CREATED);
		}
		else
		{
			$this->response([
				'status'=> false,
				'message' => 'data gagal ditambahkan'
			], REST_Controller::HTTP_BAD_REQUEST);
		}

	}

}

/* End of file kabupaten.php */
/* Location: ./application/controllers/api/kabupaten.php */