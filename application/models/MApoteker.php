<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MApoteker extends CI_Model
{

    public function get_all_obat()
    {
        // Mengambil data obat dan relasi dengan unit
        $this->db->select('obat.*, unit.nama_unit');
        $this->db->from('obat');
        $this->db->join('unit', 'obat.id_unit = unit.id_unit', 'left');
        return $this->db->get()->result_array();
    }

    public function get_obat_by_id($id_obat)
    {
        // Mengambil satu data obat berdasarkan id
        $this->db->select('obat.*, unit.nama_unit');
        $this->db->from('obat');
        $this->db->join('unit', 'obat.id_unit = unit.id_unit', 'left');
        $this->db->where('obat.id_obat', $id_obat);
        return $this->db->get()->row_array();
    }

    public function insert_obat($data)
    {
        // Menambahkan data obat baru
        return $this->db->insert('obat', $data);
    }

    public function update_obat($id_obat, $data)
    {
        // Memperbarui data obat berdasarkan id
        $this->db->where('id_obat', $id_obat);
        return $this->db->update('obat', $data);
    }

    public function delete_obat($id_obat)
    {
        // Menghapus data obat berdasarkan id
        $this->db->where('id_obat', $id_obat);
        return $this->db->delete('obat');
    }

    public function get_all_units()
    {
        // Mengambil semua data unit
        return $this->db->get('unit')->result_array();
    }
}
