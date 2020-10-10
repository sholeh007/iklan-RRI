<?php

class Model_admin extends CI_Model

{
    public function getCount($limit, $start, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('nama', $keyword);
        }

        $this->db->order_by('nama', 'ASC');

        $this->db->select('*, user_role.role');
        $this->db->from('user');
        $this->db->join('user_role', 'user_role.iduser_role = user.role_id', 'left');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result();
    }

    public function addPengguna()
    {
        $email = $this->input->post('email', true);
        $data = [
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'username' => htmlspecialchars($this->input->post('username', true)),
            'email' => htmlspecialchars($email),
            'image' => 'default.svg',
            'password' => password_hash(
                $this->input->post('password'),
                PASSWORD_DEFAULT
            ),
            'role_id' => 1,
            'aktif' => 1,
            'date_created' => time()
        ];
        $this->db->insert('user', $data);
    }

    public function getOrderan($limit, $start, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('kode_pesan', $keyword);
            $this->db->or_like('nmPemesan', $keyword);
        }

        $this->db->order_by('kode_pesan', 'ASC');
        $this->db->select('*, siar.waktu,jenis_siaran.jasaSiaran');
        $this->db->from('pesan');
        $this->db->join('siar', 'siar.idsiar = pesan.jadwal', 'left');
        $this->db->join('jenis_siaran', 'jenis_siaran.idjenis_siaran = pesan.jenis_siaran', 'left');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result();
    }

    public function deleteDataOrder($id)
    {
        $this->db->where('idpesan', $id);
        $this->db->delete('pesan');
    }

    public function addKomersial()
    {
        $data = [
            "nmPengumuman" => htmlspecialchars($this->input->post('pengumuman'), true),
            "satuan" => htmlspecialchars($this->input->post('satuan'), true),
            "harga" => htmlspecialchars($this->input->post('harga'), true),
        ];

        $this->db->insert('komersial', $data);
    }

    public function deleteKomersial($id)
    {
        $this->db->delete('komersial', ['idkomersial' => $id]);
    }

    public function getKomersialId($id)
    {
        return $this->db->get_where('komersial', ['idkomersial' => $id])->row_array();
    }

    public function editKomersial()
    {
        $data = [
            "nmPengumuman" => htmlspecialchars($this->input->post('pengumuman'), true),
            "satuan" => htmlspecialchars($this->input->post('satuan'), true),
            "harga" => htmlspecialchars($this->input->post('harga'), true),
        ];

        $this->db->where('idkomersial', $this->input->post('idkomersial'));
        $this->db->update('komersial', $data);
    }

    public function addNonKomersial()
    {
        $data = [
            "nmPengumuman" => htmlspecialchars($this->input->post('pengumuman'), true),
            "satuan" => htmlspecialchars($this->input->post('satuan'), true),
            "harga" => htmlspecialchars($this->input->post('harga'), true),
        ];

        $this->db->insert('non_komersial', $data);
    }

    public function deleteNonKomersial($id)
    {
        $this->db->delete('non_komersial', ['idnon_komersial' => $id]);
    }

    public function getNonKomersialId($id)
    {
        return $this->db->get_where('non_komersial', ['idnon_komersial' => $id])->row_array();
    }

    public function editNonKomersial()
    {
        $data = [
            "nmPengumuman" => htmlspecialchars($this->input->post('pengumuman'), true),
            "satuan" => htmlspecialchars($this->input->post('satuan'), true),
            "harga" => htmlspecialchars($this->input->post('harga'), true),
        ];

        $this->db->where('idnon_komersial', $this->input->post('idnonkomersial'));
        $this->db->update('non_komersial', $data);
    }
}