<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa_Model extends CI_Model
{
    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getMhs() {
        $this->db->select('mahasiswa.id, mahasiswa.nama, mahasiswa.nim, mahasiswa.prodi');
        $this->db->from('mahasiswa');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function insertMhs($data) {
        $this->db->insert('mahasiswa', $data);
        $insert_id = $this->db->insert_id();
        $result = $this->db->get_where('mahasiswa', array('id' => $insert_id));
        return $result->row_array();
    }

    public function updateMhs($data,$id) {
        $this->db->where('id', $id);
        $this->db->update('mahasiswa', $data);

        $result = $this->db->get_where('mahasiswa', array('id' => $id));
        return $result->row_array();
    }

    public function deleteMhs($id) {
        $result = $this->db->get_where('mahasiswa', array('id' => $id));

        $this->db->where('id',$id);
        $this->db->delete('mahasiswa');

        return $result->row_array();
    }
}