<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Model_admin');
    }

    public function index()
    {
        $data['title'] = "Halaman Admin";
        $data['panggilan'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/head_admin', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('admin/beranda', $data);
        $this->load->view('templates/footer_admin');
    }

    public function myProfile()
    {
        $data['title'] = "My Profile";
        $data['panggilan'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/head_admin', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('admin/profile', $data);
        $this->load->view('templates/footer_admin');
    }

    public function editProfile()
    {
        $data['title'] = "Edit Profile";
        $data['panggilan'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/head_admin', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('admin/edit', $data);
            $this->load->view('templates/footer_admin');
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
                    $this->session->set_flashdata('message10', '' . $this->upload->display_errors());
                    redirect('admin/editProfile');
                }
            }

            $this->db->set('nama', $name);
            $this->db->where('username', $user);
            $this->db->update('user');
            $this->session->set_flashdata('message9', 'Diupdate!');
            redirect('admin/myProfile');
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
            $this->load->view('templates/head_admin', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('admin/ubahPassword', $data);
            $this->load->view('templates/footer_admin');
        } else {
            $current = $this->input->post('current_password');
            $new_password = $this->input->post('new_password');

            if (!password_verify($current, $data['panggilan']['password'])) {
                $this->session->set_flashdata('message11', 'salah');
                redirect('admin/ubahPassword');
            } else {
                if ($current == $new_password) {
                    $this->session->set_flashdata('message12', 'lama');
                    redirect('admin/ubahPassword');
                } else {
                    // password yang benar

                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('username', $data['panggilan']['username']);
                    $this->db->update('user');
                    $this->session->set_flashdata('message13', 'diubah');
                    redirect('admin/ubahPassword');
                }
            }
        }
    }

    public function pengguna()
    {
        $data['title'] = "Halaman Pengguna";
        $data['panggilan'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['role'] = $this->db->get('user_role')->result();

        //ambil data keyword
        if ($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
            $this->session->unset_userdata('keyword');
        }

        //config pagination
        $config['base_url'] = 'http://localhost/iklan/admin/pengguna';
        $this->db->like('nama', $data['keyword']);
        $this->db->from('user');
        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 10;

        //initialize
        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(3);

        $data['pengguna'] = $this->Model_admin->getCount($config['per_page'], $data['start'], $data['keyword']);

        $this->load->view('templates/head_admin', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('admin/pengguna', $data);
        $this->load->view('templates/footer_admin');
    }

    public function addUser()
    {
        $data['title'] = "Halaman Edit";
        $data['panggilan'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['level'] = $this->db->get('user_role')->result();

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[4]');
        $this->form_validation->set_rules('email', 'Email', 'required|is_unique[user.email]|valid_email');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/head_admin', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('admin/addUser', $data);
            $this->load->view('templates/footer_admin');
        } else {
            $this->Model_admin->addPengguna();
            $this->session->set_flashdata('flashdata24', 'di tambahkan');
            redirect('admin/pengguna');
        }
    }

    public function order()
    {
        $data['title'] = 'Halaman Pesanan';
        $data['panggilan'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        //ambil data keyword
        if ($this->input->post('submit2')) {
            $data['keyword'] = $this->input->post('keyword2');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
            $this->session->unset_userdata('keyword');
        }

        //config pagination
        $config['base_url'] = 'http://localhost/iklan/admin/order';
        $this->db->like('kode_pesan', $data['keyword']);
        $this->db->or_like('nmPemesan', $data['keyword']);
        $this->db->from('pesan');
        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 10;

        //initialize
        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(3);

        $data['pesan'] = $this->Model_admin->getOrderan($config['per_page'], $data['start'], $data['keyword']);

        $this->load->view('templates/head_admin', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('admin/orderan', $data);
        $this->load->view('templates/footer_admin');
    }

    public function deleteOrder($id)
    {
        $this->Model_admin->deleteDataOrder($id);
        $this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible fade show" role="alert">
       Data berhasuil di hapus!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>', '</div>');
        redirect('admin/order');
    }

    public function siaran()
    {
        $data['title'] = 'Halaman siaran';
        $data['panggilan'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['komersial'] = $this->db->get('komersial')->result();
        $data['nonKomersial'] = $this->db->get('non_komersial')->result();

        $this->load->view('templates/head_admin', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('admin/siaran', $data);
        $this->load->view('templates/footer_admin');
    }

    public function tambahKomersial()
    {

        $data['title'] = 'Halaman tambah komersial';
        $data['panggilan'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('pengumuman', 'Pengumuman', 'required');
        $this->form_validation->set_rules('satuan', 'Satuan', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required|integer');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/head_admin', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('admin/addKomersial', $data);
            $this->load->view('templates/footer_admin');
        } else {
            $this->Model_admin->addKomersial();
            $this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible fade show" role="alert">
       Data berhasuil di tambahkan!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>', '</div>');
            redirect('admin/siaran');
        }
    }

    public function deleteKomersial($id)
    {
        $this->Model_admin->deleteKomersial($id);
        $this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible fade show" role="alert">
       Data berhasuil di hapus!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>', '</div>');
        redirect('admin/siaran');
    }

    public function editKomersial($id)
    {
        $data['title'] = 'Halaman edit komersial';
        $data['panggilan'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['komersial'] = $this->Model_admin->getKomersialId($id);

        $this->form_validation->set_rules('pengumuman', 'Pengumuman', 'required');
        $this->form_validation->set_rules('satuan', 'Satuan', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required|integer');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/head_admin', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('admin/editKomersial', $data);
            $this->load->view('templates/footer_admin');
        } else {
            $this->Model_admin->editKomersial();
            $this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible fade show" role="alert">
       Data berhasuil di update!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>', '</div>');
            redirect('admin/siaran');
        }
    }

    public function tambahNonKomersial()
    {
        $data['title'] = 'Halaman non komersial';
        $data['panggilan'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('pengumuman', 'Pengumuman', 'required');
        $this->form_validation->set_rules('satuan', 'Satuan', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required|integer');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/head_admin', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('admin/addNonKomersial', $data);
            $this->load->view('templates/footer_admin');
        } else {
            $this->Model_admin->addNonKomersial();
            $this->session->set_flashdata('flash2', '<div class="alert alert-success alert-dismissible fade show" role="alert">
       Data berhasuil di tambahkan!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>', '</div>');
            redirect('admin/siaran');
        }
    }

    public function deleteNonKomersial($id)
    {
        $this->Model_admin->deleteNonKomersial($id);
        $this->session->set_flashdata('flash2', '<div class="alert alert-success alert-dismissible fade show" role="alert">
       Data berhasuil di hapus!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>', '</div>');
        redirect('admin/siaran');
    }

    public function editNonKomersial($id)
    {
        $data['title'] = 'Halaman edit komersial';
        $data['panggilan'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['komersial'] = $this->Model_admin->getNonKomersialId($id);

        $this->form_validation->set_rules('pengumuman', 'Pengumuman', 'required');
        $this->form_validation->set_rules('satuan', 'Satuan', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required|integer');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/head_admin', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('admin/editNonKomersial', $data);
            $this->load->view('templates/footer_admin');
        } else {
            $this->Model_admin->editNonKomersial();
            $this->session->set_flashdata('flash2', '<div class="alert alert-success alert-dismissible fade show" role="alert">
       Data berhasuil di update!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>', '</div>');
            redirect('admin/siaran');
        }
    }
}