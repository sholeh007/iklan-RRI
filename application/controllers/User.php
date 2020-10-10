<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Model_pesan');
    }

    public function index()
    {
        $data['title'] = "Halaman User";
        $data['panggilan'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/head_user', $data);
        $this->load->view('templates/sidebar_user', $data);
        $this->load->view('member/beranda', $data);
        $this->load->view('templates/footer_user');
    }

    public function myProfile()
    {
        $data['title'] = "My Profile";
        $data['panggilan'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/head_user', $data);
        $this->load->view('templates/sidebar_user', $data);
        $this->load->view('member/profile', $data);
        $this->load->view('templates/footer_user');
    }

    public function editProfile()
    {
        $data['title'] = "Edit Profile";
        $data['panggilan'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/head_user', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('member/edit', $data);
            $this->load->view('templates/footer_user');
        } else {
            $name = $this->input->post('nama');
            $user = $this->input->post('username');

            //cek jika ada gambar yang akan diupload
            $upload_image = $_FILES['gambar']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|svg|jpg|png';
                $config['max_size']      = '2048';
                $config['upload_path']   = './assets/img/profile';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar')) {

                    $old_image = $data['panggilan']['image'];
                    if ($old_image != 'default.svg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    $this->session->set_flashdata('message8', '' . $this->upload->display_errors());
                    redirect('user/editProfile');
                }
            }

            $this->db->set('nama', $name);
            $this->db->where('username', $user);
            $this->db->update('user');
            $this->session->set_flashdata('message7', 'Diupdate!');
            redirect('user/myProfile');
        }
    }

    public function ubahPassword()
    {
        $data['title'] = "Ubah Password";
        $data['panggilan'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password', 'New Password', 'required|trim|min_length[4]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm Password', 'required|trim|min_length[4]|matches[new_password]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/head_user', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('member/ubahPassword', $data);
            $this->load->view('templates/footer_user');
        } else {
            $current = $this->input->post('current_password');
            $new_password = $this->input->post('new_password');

            if (!password_verify($current, $data['panggilan']['password'])) {
                $this->session->set_flashdata('message11', 'salah');
                redirect('user/ubahPassword');
            } else {
                if ($current == $new_password) {
                    $this->session->set_flashdata('message12', 'lama');
                    redirect('user/ubahPassword');
                } else {
                    // password yang benar

                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('username', $data['panggilan']['username']);
                    $this->db->update('user');
                    $this->session->set_flashdata('message13', 'diubah');
                    redirect('user/ubahPassword');
                }
            }
        }
    }

    public function order()
    {
        $data['title'] = "Halaman Order";
        $data['panggilan'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['jadwal'] = $this->db->get('siar')->result();
        $data['komersial'] = $this->db->get('komersial')->result();
        $data['nonKomersial'] = $this->db->get('non_komersial')->result();
        $data['jenis'] = $this->db->get('jenis_siaran')->result();

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('pengumuman', 'Pengumuman', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required|integer');
        $this->form_validation->set_rules('telpon', 'Telpon', 'required|max_length[12]|integer');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/head_user', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('member/orderan', $data);
            $this->load->view('templates/footer_user');
        } else {

            //untuk kode automatis
            $table = "pesan";
            $field = "kode_pesan";

            $lastkode = $this->Model_pesan->getKode($table, $field);
            $noUrut = (int) substr($lastkode, -4, 4);
            $noUrut++;

            $str = "PSN";
            $kode = $str . sprintf('%04s', $noUrut);
            //akhir kode automatis

            $this->Model_pesan->addPesan($kode, $data['panggilan']['iduser']);
            redirect('user/tagihan');
        }
    }

    public function tagihan()
    {
        $data['title'] = "Halaman Tagihan";
        $data['pesan'] = $this->Model_pesan->getOrder();

        $this->load->view('templates/head_user', $data);
        $this->load->view('member/invoice', $data);
    }

    public function riwayat()
    {
        $data['title'] = "Halaman Riwayat";
        $data['panggilan'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['history'] = $this->Model_pesan->getHistory($data['panggilan']['iduser']);

        $this->load->view('templates/head_user', $data);
        $this->load->view('templates/sidebar_user', $data);
        $this->load->view('member/riwayat', $data);
        $this->load->view('templates/footer_user');
    }
}