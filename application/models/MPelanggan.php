<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MPelanggan extends CI_Model
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

    public function get_by_kode_obat($kode_obat)
    {
        $this->db->select('obat.*, unit.nama_unit');
        $this->db->from('obat');
        $this->db->join('unit', 'obat.id_unit = unit.id_unit');
        $this->db->where('obat.kode_obat', $kode_obat);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_user_item($idUser, $kodeObat)
    {
        $this->db->where('id_user', $idUser);
        $this->db->where('kode_obat', $kodeObat);
        return $this->db->get('keranjang')->row();
    }

    public function get_keranjang_user($id_user)
    {
        $this->db->select('keranjang.*, obat.nama_obat, obat.harga, users.name');
        $this->db->from('keranjang');
        $this->db->join('obat', 'keranjang.kode_obat = obat.kode_obat', 'left');
        $this->db->join('users', 'keranjang.id_user = users.id_user', 'left'); // Menambahkan relasi dengan tabel users
        $this->db->where('keranjang.id_user', $id_user);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function add_item($data)
    {
        $this->db->insert('keranjang', $data);
    }

    public function update_item($idUser, $kodeObat, $jumlah)
    {
        $this->db->set('jumlah', $jumlah);
        $this->db->where('id_user', $idUser);
        $this->db->where('kode_obat', $kodeObat);
        $this->db->update('keranjang');
    }

    public function count_item_cart($idUser)
    {
        $this->db->select_sum('jumlah');
        $this->db->where('id_user', $idUser);
        $query = $this->db->get('keranjang');
        return $query->row()->jumlah ?? 0; // Jika tidak ada item, kembalikan 0
    }

    public function hapus_keranjang_user($id_user)
    {
        $this->db->where('id_user', $id_user);
        $this->db->delete('keranjang');
    }

    public function update_bukti_pembayaran($id_transaksi, $data)
    {
        $this->db->where('id_transaksi', $id_transaksi);
        return $this->db->update('transaksi', $data); // 'transaksi' adalah nama tabel
    }

    // public function add_to_cart($kode_obat, $jumlah)
    // {
    //     // Mengecek apakah produk sudah ada dalam keranjang
    //     $this->db->where('kode_obat', $kode_obat);
    //     $query = $this->db->get('keranjang');

    //     if ($query->num_rows() > 0) {
    //         // Jika sudah ada, update jumlahnya
    //         $this->db->set('jumlah', 'jumlah + ' . (int)$jumlah, FALSE);
    //         $this->db->where('kode_obat', $kode_obat);
    //         $this->db->update('keranjang');
    //     } else {
    //         // Jika belum ada, insert data baru
    //         $data = [
    //             'kode_obat' => $kode_obat,
    //             'jumlah' => $jumlah,
    //             'tanggal' => date('Y-m-d H:i:s')
    //         ];
    //         $this->db->insert('keranjang', $data);
    //     }
    // }


    // public function remove_from_cart($kode_obat)
    // {
    //     $this->db->where('kode_obat', $kode_obat);
    //     $this->db->delete('keranjang');
    // }



    // public function get_all_cart($user_id)
    // {
    //     $this->db->select('role_id');
    //     $this->db->from('users');  // Menggunakan tabel 'users' bukan 'user'
    //     $this->db->where('id', $user_id);
    //     $query = $this->db->get();

    //     if ($query->num_rows() > 0) {
    //         return $query->row()->role_id;
    //     }

    //     return NULL; // Jika tidak ditemukan
    // }
}
