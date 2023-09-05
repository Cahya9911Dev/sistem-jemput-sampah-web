<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Transaksi extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Transaksi_model');
    }

    public function index_get($id)
    {
        $data = $this->Transaksi_model->get_data_id($id);

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

    public function index_post()
    {
        $params = array(
            'pemesanan_masyarakat' => $this->post('pemesanan_masyarakat'),
            'pemesanan_sampah' => $this->post('pemesanan_sampah'),
            'pemesanan_beratsampah' => $this->post('pemesanan_beratsampah'),
            'pemesanan_status' => $this->post('pemesanan_status')
        );

        $transaksi = $this->Transaksi_model->input_transaksi($params);

        if ($transaksi) {
            $this->response(
                [
                    'payload' => "sukses"
                ],
                200
            );
        } else {

            $this->response([
                'payload' => null
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function uploadBukti_post()
    {
        $filename = $_FILES["foto"]["name"];
        if ($filename) {
            $foto = $this->_uploadImagep();
        } else {
            $foto = "";
        }

        $params = array(
            'pemesanan_foto' => $foto,
            'pemesanan_masyarakat' => $this->post('pemesanan_masyarakat'),
            'pemesanan_sampah' => $this->post('pemesanan_sampah'),
            'pemesanan_beratsampah' => $this->post('pemesanan_beratsampah'),
            'pemesanan_status' => $this->post('pemesanan_status')
        );

        $transaksi = $this->Transaksi_model->input_transaksi($params);

        if ($transaksi) {
            $this->response([
                'payload' => "sukses"
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'payload' => null
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    private function _uploadImagep()
    {
        $id_user = str_replace("-", "", $this->uuid->v4());
        $config['upload_path']          = 'image';
        $config['allowed_types']        = 'jpg|png|jpeg';
        $config['max_size']             = 2000000;
        $config['overwrite'] = TRUE;
        $filename = $_FILES["foto"]["name"];
        $file_ext = pathinfo($filename, PATHINFO_EXTENSION);
        $config['file_name'] = $id_user . '.' . 'jpg';

        $this->upload->initialize($config);
        $this->load->library('upload');

        if (!$this->upload->do_upload('foto')) {
            $data['error'] = array('error' => $this->upload->display_errors());
            var_dump($data['error']);
            die();
        } else {
            return $this->upload->data('file_name');
        }
    }
}
