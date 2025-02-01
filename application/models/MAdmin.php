<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MAdmin extends CI_Model
{
    public function get_all_drugs()
    {
        $query = $this->db->get('drugs');
        return $query->result_array();
    }

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

    public function get_all_transaksi()
    {
        $this->db->select('transaksi.*, users.name AS nama_user, obat.nama_obat');
        $this->db->from('transaksi');
        $this->db->join('users', 'transaksi.id_user = users.id_user', 'left'); // Join dengan tabel users
        $this->db->join('obat', 'transaksi.kode_obat = obat.kode_obat', 'left'); // Join dengan tabel obat
        $this->db->order_by('transaksi.created_at', 'DESC');
        return $this->db->get()->result_array();
    }

    // Mengupdate status pembayaran transaksi
    public function update_status_pembayaran($id_transaksi, $status)
    {
        $this->db->where('id_transaksi', $id_transaksi);
        return $this->db->update('transaksi', ['status_pembayaran' => $status]);
    }

    public function get_laporan($start_date = null, $end_date = null)
    {
        // Ambil data transaksi dengan filter periode
        $this->db->select('t.id_transaksi, t.id_user, t.kode_obat, t.jumlah, t.total_harga, t.status_pembayaran, t.bukti_pembayaran, t.created_at, u.name AS nama_user, o.nama_obat');
        $this->db->from('transaksi t');
        $this->db->join('users u', 'u.id_user = t.id_user', 'left');
        $this->db->join('obat o', 'o.kode_obat = t.kode_obat', 'left'); // Menyambung dengan tabel obat (kode_obat)

        // Filter berdasarkan tanggal jika disediakan
        if ($start_date && $end_date) {
            $this->db->where('t.created_at >=', $start_date . ' 00:00:00');
            $this->db->where('t.created_at <=', $end_date . ' 23:59:59');
        }

        // Menambahkan pengurutan berdasarkan tanggal transaksi
        $this->db->order_by('t.created_at', 'DESC');

        // Ambil hasil query
        $query = $this->db->get();
        return $query->result_array();
    }


    // public function get_laporan($start_date, $end_date)
    // {
    //     $this->db->select('transaksi.*, users.name AS nama_user, obat.nama_obat');
    //     $this->db->from('transaksi');
    //     $this->db->join('users', 'transaksi.id_user = users.id_user', 'left');
    //     $this->db->join('obat', 'transaksi.kode_obat = obat.kode_obat', 'left');
    //     $this->db->where('DATE(transaksi.created_at) >=', $start_date);
    //     $this->db->where('DATE(transaksi.created_at) <=', $end_date);
    //     $this->db->order_by('transaksi.created_at', 'DESC');
    //     return $this->db->get()->result_array();
    // }
}
