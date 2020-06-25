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
			'Nik' => $this->post('Nik'),
			'NamaUser' => $this->post('NamaUser'),
			'PasswordUser' => $this->post('PasswordUser'),
			'FotoUser' => $this->post('FotoUser'),
			'Subag' => $this->post('Subag'),
			'NoTelp' => $this->post('NoTelp'),
			'EmailUser' => $this->post('EmailUser'),
			'AlamatUser' => $this->post('PasswordUser')
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
			'Nik' => $this->put('Nik'),
			'NamaUser' => $this->put('NamaUser'),
			'PasswordUser' => $this->put('PasswordUser'),
			'FotoUser' => $this->put('FotoUser'),
			'Subag' => $this->put('Subag'),
			'NoTelp' => $this->put('NoTelp'),
			'EmailUser' => $this->put('EmailUser'),
			'AlamatUser' => $this->put('AlamatUser')
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
