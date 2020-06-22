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


class AbsenController extends Rest_Controller
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
			$query = $this->Model->get_absen();
		} else {
			$query = $this->Model->get_absen($id);
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
			'NikAbsen' => $this->post('nik'),
			'FotoAbsen' => $this->post('foto'),
			'TanggalAbsen' => $this->post('tgl'),
			'JamAbsen' => $this->post('jam'),
			'LatAbsen' => $this->post('lat'),
			'LongAbsen' => $this->post('long')
		];
		$query = $this->Model->post_absen($data);
		if ($query) {
			$this->response([
				'status' => 1,
				'data' => 'Success Input Absensi'
			]);
		} else {
			$this->response([
				'status' => 0,
				'data' => 'Failed Input Absensi'
			]);
		}
	}
 
	public function index_put()
	{
		$id = $this->put('id');
		$data = [
			'idUser' => $this->put('idu'),
			'NikAbsen' => $this->put('nik'),
			'FotoAbsen' => $this->put('foto'),
			'TanggalAbsen' => $this->put('tgl'),
			'JamAbsen' => $this->put('jam'),
			'LatAbsen' => $this->put('lat'),
			'LongAbsen' => $this->put('long')
		];
		$query = $this->Model->put_absen($id,$data);
		if ($query) {
			$this->response([
				'status' => 1,
				'data' => 'Success Update Absen'
			]);
		} else {
			$this->response([
				'status' => 0,
				'data' => 'Failed Update Absen'
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
			$query = $this->Model->delete_absen($id);
			if ($query) {
				$this->response([
					'status' => 1,
					'data' => 'Success Delete Absensi'
				]);
			} else {
				$this->response([
					'status' => 0,
					'data' => 'Failed Delete Absensi'
				]);
			}
		}
	}
}