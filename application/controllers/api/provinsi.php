<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';


class Provinsi extends REST_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Mprovinsi');
		// $this->methods['index_get']['limit'] = 2;
		// $this->methods['index_post']['limit'] = 2;
		// $this->methods['index_put']['limit'] = 2;
		// $this->methods['index_delete']['limit'] = 2;
	}
	}
	}

	public function index_get()
	{
		$id = $this->get('id_provinsi');

		if ($id == null) {
			$provinsi = $this->Mprovinsi->getProvinsi();
		} else {
			$provinsi = $this->Mprovinsi->getProvinsi($id);
		}

		if ($provinsi) {
			$this->response([
				'status' => true,
				'data' => $provinsi
			], REST_Controller::HTTP_OK);
		} else {
			$this->response([
				'status' => false,
				'message' => 'id not found'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}

	public function index_delete()
	{
		$id = $this->delete('id_provinsi');
		$deleteProvinsi = $this->Mprovinsi->deleteProvinsi($id);

		if ($id == null) {
			$this->response([
				'status' => false,
				'message' => 'Provide ID'
			], REST_Controller::HTTP_BAD_REQUEST);
		} else {
			if ($deleteProvinsi > 0) {
				$this->response([
					'status' => true,
					'id' => $id,
					'message' => 'deleted'
				], REST_Controller::HTTP_OK);
			} else {
				$this->response([
					'status' => false,
					'message' => 'id not found'
				], REST_Controller::HTTP_BAD_REQUEST);
			}
		}
	}

	public function index_post()
	{
		$data = [
			'nama_provinsi' => $this->post('nama_provinsi')
		];

		$insertProvinsi = $this->Mprovinsi->createProvinsi($data);

		if ($insertProvinsi > 0) {
			$this->response([
				'status' => true,
				'message' => 'data telah ditambahkan'
			], REST_Controller::HTTP_CREATED);
		} else {
			$this->response([
				'status' => false,
				'message' => 'data gagal ditambahkan'
			], REST_Controller::HTTP_BAD_REQUEST);
		}
	}

	public function index_put()
	{
		$id = $this->put('id_provinsi');
		$data = [
			'nama_provinsi' => $this->put('nama_provinsi')
		];
		$ubahProvinsi = $this->Mprovinsi->updateProvinsi($data, $id);
		if ($ubahProvinsi > 0) {
			$this->response([
				'status' => true,
				'message' => 'data berhasil dirubah'
			], REST_Controller::HTTP_OK);
		} else {
			$this->response([
				'status' => false,
				'message' => 'data gagal dirubah'
			], REST_Controller::HTTP_BAD_REQUEST);
		}
	}
}
