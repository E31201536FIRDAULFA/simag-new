<?php

namespace App\Controllers;

use App\Models\InfoPesertaModel;
use App\Models\UserModel;

class Registrasi extends BaseController
{
    public function index()
    {

        if (!session()->get('regist')) {
            return redirect()->to(base_url('Home'));
        }

        if (isset($_POST['submit'])) {
            // validasi pendaftaran    
            if (!$this->validate([
                'nama' => [
                    'rules' => 'required',
                    'errors' => ['required' => 'Masukkan nama lengkap Anda']
                ],
                'JK' => [
                    'rules' => 'required',
                    'errors' => ['required' => 'Masukkan jenis kelamin Anda']
                ],
                'tglLahir' => [
                    'rules' => 'required',
                    'errors' => ['required' => 'Masukkan tanggal lahir Anda']
                ],

                'email'    => 'required|valid_email',

            ])) {
                session()->setFlashdata('error', 'Maaf! Terdapat kesalahan dalam pengisian data.');
                return redirect()->to(base_url('registrasi'))->withInput();
            }

            $user = [
                'nama' => $this->request->getPost('nama'),
                'jenisKelamin' => $this->request->getPost('JK'),
                'tglLahir' => $this->request->getPost('tglLahir'),
                'email' => $this->request->getPost('email'),
                'role' => 3,
                'status' => 1
            ];
            $userModel = new UserModel();
            $userModel->save($user);
            $user_id = $userModel->getInsertID();
            $getUser = $userModel->select('
                            info_peserta.*,
                            user.*,
                            user.id AS id_user,
                        ')
                        ->join('info_peserta', 'user.id=info_peserta.userId', 'left')
                        ->where('email', $user['email'])
                        ->get()->getRowArray();
            $setData = [
                'id'        => $getUser['id_user'],
                'email'     => $getUser['email'],
                'status'    => $getUser['status'],
                'role'      => $getUser['role'],
                'nama'      => $getUser['nama'],
                'foto'      => $getUser['foto'],
                'WesLogin'  => TRUE,
                'log'       => TRUE,
            ];
            session()->set($setData);
            session()->setFlashdata('success', 'Sukses! Anda berhasil melakukan pendaftaran.');
            return redirect()->to(base_url('dashboard/notif'));
        }
        echo view('templates/header');
        echo view('auth/registrasi');
    }
}
