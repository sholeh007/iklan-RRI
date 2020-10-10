<?php

class Model_pesan extends CI_Model

{
    public function getKode($table = null, $field = null)
    {
        $this->db->select_max($field);
        return $this->db->get($table)->row_array()[$field];
    }

    public function addPesan($kode, $history)
    {

        $pengumuman = $this->input->post('pengumuman');
        $jumlah = $this->input->post('jumlah');
        if ($pengumuman === "Non Komersial") {
            if ($jumlah <= 20) {
                $harga = $jumlah * 40000;
            } else if ($jumlah >= 21 || $jumlah <= 50) {
                $harga = $jumlah * 36000;
            } else if ($jumlah >= 51 || $jumlah <= 100) {
                $harga = $jumlah * 32000;
            } else {
                $harga = $jumlah * 28000;
            }
        } else if ($pengumuman === "Komersial") {
            if ($jumlah <= 20) {
                $harga = $jumlah * 80000;
            } else if ($jumlah >= 21 || $jumlah <= 50) {
                $harga = $jumlah * 72000;
            } else if ($jumlah >= 51 || $jumlah <= 100) {
                $harga = $jumlah * 64000;
            } else {
                $harga = $jumlah * 56000;
            }
        };
        $data = [
            "idpelanggan" => $history,
            "kode_pesan" => $kode,
            "nmPemesan" => htmlspecialchars($this->input->post('nama'), true),
            "nmPesanan" => htmlspecialchars($this->input->post('pengumuman'), true),
            "jenis_siaran" => htmlspecialchars($this->input->post('jenis'), true),
            "jumlah" => htmlspecialchars($this->input->post('jumlah'), true),
            "no_telp" => htmlspecialchars($this->input->post('telpon'), true),
            "tgl_pesan" => htmlspecialchars($this->input->post('tanggal', true)),
            "tgl_pemesanan" => time(),
            "jadwal" => htmlspecialchars($this->input->post('waktu', true)),
            "harga" => $harga
        ];

        $this->db->insert('pesan', $data);
    }

    public function getOrder()
    {
        $this->db->order_by('kode_pesan', 'DESC');
        $query = $this->db->get('pesan')->row_array();
        return $query;
    }

    public function getHistory($riwayat)
    {
        return $this->db->get_where('pesan', ['idpelanggan' => $riwayat])->result();
    }
}