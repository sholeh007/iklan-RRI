<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_auth');
    }

    public function index()
    {
        stay();
        $data['title'] = 'User Login';

        $this->form_validation->set_rules('username', 'Username', 'trim|required', [
            'required' => 'Username harus di isi!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required', [
            'required' => 'Password harus di isi!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/head_login', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/footer_auth');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $pass = $this->input->post('password');

        $user = $this->db->get_where('user', ['username' => $username])->row_array();

        if ($user) {
            if ($user['aktif'] == 1) {

                if (password_verify($pass, $user['password'])) {
                    $data = [
                        'username' => $user['username'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    $this->session->set_flashdata('message5', 'login');
                    if ($user['role_id'] == 1) {
                        redirect('admin/index');
                    } else {
                        redirect('user/index');
                    }
                } else {
                    $this->session->set_flashdata('message4', 'salah');
                    redirect('auth/index');
                }
            } else {
                $this->session->set_flashdata('message3', 'aktif');
                redirect('auth/index');
            }
        } else {
            $this->session->set_flashdata('message2', 'tidak ada');
            redirect('auth/index');
        }
    }

    public function register()
    {
        stay();
        $data['title'] = 'User Registration';

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Nama harus di isi!',
        ]);
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', [
            'required' => 'Username harus di isi!',
            'is_unique' => 'Username sudah digunakan!'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'requiered' => 'Email harus di isi!',
            'valid_email' => 'Email tidak benar!',
            'is_unique' => 'Email sudah digunakan!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[4]|matches[password2]', [
            'required' => 'Password harus di isi!',
            'min_length' => 'Password terlalu pendek!',
            'matches' => 'Password tidak sama!'
        ]);
        $this->form_validation->set_rules('password2', 'Repeat Password', 'required|trim|matches[password]', [
            'required' => 'Password harus di isi!',
            'matches' => 'Password tidak sama!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/head_register', $data);
            $this->load->view('auth/register');
            $this->load->view('templates/footer_auth');
        } else {
            $token = base64_encode(random_bytes(32));
            $this->Model_auth->addData($token);

            $this->_sendEmail($token, 'verify');

            $this->session->set_flashdata('message', 'Aktifkan Akun');
            redirect('auth/index');
        }
    }

    private function _sendEmail($token, $type)
    {
        $email = $this->input->post('email');
        $config = [
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'steveone156@gmail.com',
            'smtp_pass' => 'jayapura123',
            'smtp_port' => 465,
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n"
        ];

        $this->load->library('email', $config);
        $this->email->initialize($config);

        $this->email->from('steveone156@gmail.com', 'Admin RRI');
        $this->email->to($email);
        if ($type == 'verify') {
            $this->email->subject('Account Verification');
            $this->email->message('Klik link ini untuk aktifasi akun : <a
            href="' . base_url() . 'auth/verify?email=' . $email . '&token=' . urlencode($token) . '">Aktifkan</a>');
        } else if ($type == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message('Klik link ini untuk reset password kamu : <a
            href="' . base_url() . 'auth/resetpassword?email=' . $email . '&token=' . urlencode($token) . '">Reset Password</a>');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {
                if (time() - $user_token['date_created'] < (60 * 10)) {
                    $this->db->set('aktif', 1);
                    $this->db->where('email', $email);
                    $this->db->update('user');

                    $this->db->delete('user_token', ['email' => $email]);
                    $this->session->set_flashdata('message17', 'login');
                    redirect('auth/index');
                } else {
                    $this->db->delete('user', ['email' => $email]);
                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('message16', 'expired');
                    redirect('auth/index');
                }
            } else {
                $this->session->set_flashdata('message15', 'token');
                redirect('auth/index');
            }
        } else {
            $this->session->set_flashdata('message14', 'email');
            redirect('auth/index');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message6', 'keluar');
        redirect('auth/index');
    }

    public function block()
    {
        $this->load->view('auth/blok');
    }

    public function lupaPassword()
    {
        $data['title'] = 'Forgot Password';

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
            'required' => 'Username harus di isi!',
            'valid_email' => 'Email harus benar'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/head_login', $data);
            $this->load->view('auth/forgot_password');
            $this->load->view('templates/footer_auth');
        } else {
            $email = $this->input->post('email');

            $user = $this->db->get_where('user', ['email' => $email, 'aktif' => 1])->row_array();

            if ($user) {
                $token = base64_encode(random_bytes(32));

                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];

                $this->db->insert('user_token', $user_token);
                $this->_sendEmail($token, 'forgot');
                $this->session->set_flashdata('message19', 'untuk reset password!');
                redirect('auth/lupaPassword');
            } else {
                $this->session->set_flashdata('message18', 'belum terdaftar atau aktif!');
                redirect('auth/lupaPassword');
            }
        }
    }

    public function resetpassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {
                if (time() - $user_token['date_created'] < (60 * 10)) {
                    $this->session->set_userdata('reset_email', $email);
                    $this->changePassword();
                } else {
                    $this->db->delete('user_token', ['email' => $email]);
                    $this->session->unset_userdata('reset_email');

                    $this->session->set_flashdata('message23', 'expired');
                    redirect('auth/index');
                }
            } else {
                $this->session->set_flashdata('message21', 'salah');
                redirect('auth/index');
            }
        } else {
            $this->session->set_flashdata('message20', 'gagal');
            redirect('auth/index');
        }
    }

    public function changePassword()
    {
        $data['title'] = 'Reset Password';

        if (!$this->session->userdata('reset_email')) {
            redirect('auth/index');
        }

        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Konfirmasi Password', 'trim|required|min_length[4]|matches[password]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/head_login', $data);
            $this->load->view('auth/changePassword');
            $this->load->view('templates/footer_auth');
        } else {
            $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('user');
            $this->db->delete('user_token', ['email' => $email]);

            $this->session->unset_userdata('reset_email');
            $this->session->set_flashdata('message22', 'login');
            redirect('auth/index');
        }
    }
}