<?php  

use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

header('Access-Control-Allow-Origin: *');

if($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
	header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
	header('Access-Control-Allow-Headers: Content-Type');
	exit;
}

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

/**
 * 
 */
class IzinController extends Rest_Controller
{
	
	public function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->model('ModelMaster','Model');
	}

	public function index_get()
	{
		$id = $this->get('id');
		if ($id == "") {
			$query = $this->Model->get_izin();
		} else {
			$query = $this->Model->get_izin($id);
		}

		if ($query) {
			$this->response([
				'status' => 1,
				'data' => $query
			]);
		} else {
			$this->response([
				'status' => 1,
				'data' => 'Id Not Found'
			]);
		}
	}

	public function index_post()
	{
		$data = [
			'idUser' => $this->post('idu'),
			'JenisIzin' => $this->post('jenis'),
			'Detail' => $this->post('detail'),
			'FotoIzin' => $this->post('foto'),
			'TanggalIzin' => $this->post('tgl'),
			'Keterangan' => $this->post('ket'),
		];
		$query = $this->Model->post_izin($data);
		if ($query) {
			$this->response([
				'status' => 1,
				'data' => 'Success Input Izin'
			]);
		} else {
			$this->response([
				'status' => 0,
				'data' => 'Failed Input Izin'
			]);
		}
	}
 
	public function index_put()
	{
		$id = $this->put('id');
		$data = [
			'idUser' => $this->put('idu'),
			'JenisIzin' => $this->put('jenis'),
			'Detail' => $this->put('detail'),
			'FotoIzin' => $this->put('foto'),
			'TanggalIzin' => $this->put('tgl'),
			'Keterangan' => $this->put('ket'),
		];
		$query = $this->Model->put_izin($id,$data);
		if ($query) {
			$this->response([
				'status' => 1,
				'data' => 'Success Update Izin'
			]);
		} else {
			$this->response([
				'status' => 0,
				'data' => 'Failed Update Izin'
			]);
		}
	}


	public function index_delete()
	{
		$id = $_GET['id'];
		if ($id == null) {
			$this->response([
				'status' => 0,
				'data' => 'Failed Id Or Id Null'
			]);
		} else {
			$query = $this->Model->delete_izin($id);
			if ($query) {
				$this->response([
					'status' => 1,
					'data' => 'Success Delete Izin'
				]);
			} else {
				$this->response([
					'status' => 0,
					'data' => 'Failed Delete Izin'
				]);
			}
		}
	}
}