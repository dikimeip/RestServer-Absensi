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
class GajiController extends Rest_Controller
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
			$query = $this->Model->get_gaji();
		} else {
			$query = $this->Model->get_gaji($id);
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
			'Bulan' => $this->post('bulan'),
			'Tahun' => $this->post('tahun'),
			'Total' => $this->post('total'),
			'Created_at' => $this->post('buat'),
		];
		$query = $this->Model->post_gaji($data);
		if ($query) {
			$this->response([
				'status' => 1,
				'data' => 'Success Input Gaji'
			]);
		} else {
			$this->response([
				'status' => 0,
				'data' => 'Failed Input Gaji'
			]);
		}
	}
 
	public function index_put()
	{
		$id = $this->put('id');
		$data = [
			'idUser' => $this->put('idu'),
			'Bulan' => $this->put('bulan'),
			'Tahun' => $this->put('tahun'),
			'Total' => $this->put('total'),
			'Created_at' => $this->put('buat'),
		];
		$query = $this->Model->put_gaji($id,$data);
		if ($query) {
			$this->response([
				'status' => 1,
				'data' => 'Success Update Gaji'
			]);
		} else {
			$this->response([
				'status' => 0,
				'data' => 'Failed Update Gaji'
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
			$query = $this->Model->delete_Gaji($id);
			if ($query) {
				$this->response([
					'status' => 1,
					'data' => 'Success Delete Gaji'
				]);
			} else {
				$this->response([
					'status' => 0,
					'data' => 'Failed Delete Gaji'
				]);
			}
		}
	}
}