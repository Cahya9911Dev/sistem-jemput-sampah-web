<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Sampah extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Sampah_model');
    }

    public function index_get()
    {
        $data = $this->Sampah_model->get_data();

        if ($data) {
            $this->response(
                [
                    'payload' => $data
                ],
                200
            );
        } else {

            $this->response([
                'status' => true,
                'message' => 'gagal menampilkan data',
                'payload' => null
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
}
