<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model_auth extends CI_Model
{
    public function addData($token)
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
            'role_id' => 2,
            'aktif' => 0,
            'date_created' => time()
        ];

        //token aktifasi
        $user_token = [
            'email' => $email,
            'token' => $token,
            'date_created' => time()
        ];

        $this->db->insert('user', $data);
        $this->db->insert('user_token', $user_token);
    }
}