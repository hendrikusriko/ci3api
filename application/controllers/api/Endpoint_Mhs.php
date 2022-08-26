<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;


class Endpoint_Mhs extends REST_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model("Mahasiswa_Model");
    }

    public function mhs_get() {
        $result = $this->Mahasiswa_Model->getMhs();
        $data_json = array(
            "success" => true,
            "message" => "data mahasiswa",
            "data" => array(
                "mahasiswa" => $result
            )
        );
        $this->response($data_json,REST_CONTROLLER::HTTP_OK);
    }

    public function mhs_post() {
        $data = array(
            "nama" => $this->input->post("nama"),
            "nim" => $this->input->post("nim"),
            "prodi" => $this->input->post("prodi")
        );
        $result = $this->Mahasiswa_Model->insertMhs($data);

        $data_json = array(
            "success" => true,
            "message" => "data berhasil ditambahkan",
            "data" => array(
                "mahasiswa" => $result
            )
        );
        $this->response($data_json,REST_CONTROLLER::HTTP_OK);
    }

    public function mhs_put() {
        $id = $this->put("id");

        $data = array(
            "nama" => $this->put("nama"),
            "nim" => $this->put("nim"),
            "prodi" => $this->put("prodi")
        );

        $result = $this->Mahasiswa_Model->updateMhs($data,$id);

        $data_json = array(
            "success" => true,
            "message" => "data berhasil diupdate",
            "data" => array(
                "mahasiswa" => $result
            )
        );
        $this->response($data_json,REST_CONTROLLER::HTTP_OK);
    }

    public function mhs_delete() {
        $id = $this->delete("id");
        $result = $this->Mahasiswa_Model->deleteMhs($id);

        $data_json = array(
            "success" => true,
            "message" => "hapus data berhasil",
            "data" => array(
                "produk" => $result
            )
        );
        $this->response($data_json,REST_CONTROLLER::HTTP_OK);
    }
}