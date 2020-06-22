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
class AdminController extends Rest_Controller
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
			$query = $this->Model->get_admin();
		} else {
			$query = $this->Model->get_admin($id);
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
			'Username' => $this->post('uname'),
			'Password' => $this->post('password'),
			'Nama' => $this->post('nama'),
		];
		$query = $this->Model->post_admin($data);
		if ($query) {
			$this->response([
				'status' => 1,
				'data' => 'Success Input Admin'
			]);
		} else {
			$this->response([
				'status' => 0,
				'data' => 'Failed Input Admin'
			]);
		}
	}
 
	public function index_put()
	{
		$id = $this->put('id');
		$data = [
			'Username' => $this->put('uname'),
			'Password' => $this->put('password'),
			'Nama' => $this->put('nama'),
		];
		$query = $this->Model->put_admin($id,$data);
		if ($query) {
			$this->response([
				'status' => 1,
				'data' => 'Success Update Admin'
			]);
		} else {
			$this->response([
				'status' => 0,
				'data' => 'Failed Update Admin'
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
			$query = $this->Model->delete_admin($id);
			if ($query) {
				$this->response([
					'status' => 1,
					'data' => 'Success Delete Admin'
				]);
			} else {
				$this->response([
					'status' => 0,
					'data' => 'Failed Delete Admin'
				]);
			}
		}
	}

}