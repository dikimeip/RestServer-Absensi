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

class UserController extends REST_Controller {

    public function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->model('ModelMaster','Model');
	}

	public function index_get()
	{
		$id = $this->get('id');
		if ($id == "") {
			$query = $this->Model->get_user();
		} else {
			$query = $this->Model->get_user($id);
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
			'Nik' => $this->post('nik'),
			'NamaUser' => $this->post('nama'),
			'PasswordUser' => $this->post('password'),
			'FotoUser' => $this->post('foto'),
			'Subag' => $this->post('subag'),
			'NoTelp' => $this->post('nomer'),
			'EmailUser' => $this->post('email'),
			'AlamatUser' => $this->post('alamat')
		];
		$query = $this->Model->post_user($data);
		if ($query) {
			$this->response([
				'status' => 1,
				'data' => 'Success Input User'
			]);
		} else {
			$this->response([
				'status' => 0,
				'data' => 'Failed Input User'
			]);
		}
	}
 
	public function index_put()
	{
		$id = $this->put('id');
		$data = [
			'Nik' => $this->put('nik'),
			'NamaUser' => $this->put('nama'),
			'PasswordUser' => $this->put('password'),
			'FotoUser' => $this->put('foto'),
			'Subag' => $this->put('subag'),
			'NoTelp' => $this->put('nomer'),
			'EmailUser' => $this->put('email'),
			'AlamatUser' => $this->put('alamat')
		];
		$query = $this->Model->put_user($id,$data);
		if ($query) {
			$this->response([
				'status' => 1,
				'data' => 'Success Update User'
			]);
		} else {
			$this->response([
				'status' => 0,
				'data' => 'Failed Update User'
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
			$query = $this->Model->delete_user($id);
			if ($query) {
				$this->response([
					'status' => 1,
					'data' => 'Success Delete User'
				]);
			} else {
				$this->response([
					'status' => 0,
					'data' => 'Failed Delete User'
				]);
			}
		}
	}

}
