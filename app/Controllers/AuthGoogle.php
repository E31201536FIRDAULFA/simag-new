<?php

namespace App\Controllers;

use App\Models\UserModel;
use Google_Client;
use Google_Service;
use Google_Service_Oauth2;

class AuthGoogle extends BaseController
{
    public function __construct()
    {
        session();
    }

    public function index()
    {
        $client = new Google_Client();
        $clientId = '235798189288-7s5aq32v09n5se3s0cjibdaa07qt1lk5.apps.googleusercontent.com';
        $clientSecret = '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';
        $redirectUri = base_url('login');

        $client->setClientId($clientId);
        $client->setClientSecret($clientSecret);
        $client->setRedirectUri($redirectUri);
        $client->addScope('profile');
        $client->addScope('email');

        if (isset($_GET['code'])) {
            $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
            $client->setAccessToken($token['access_token']);
            $service = new Google_Service_Oauth2($client);
        } else {
            return redirect()->to($client->createAuthUrl());
        }
        $respond = [
            'name' => $service->userinfo->get()->getName(),
            'email' => $service->userinfo->get()->getEmail(),
            'regist' => TRUE
        ];
        $userModel = new UserModel();
        $user = $userModel->select('
                info_peserta.*,
                user.*,
                user.id AS id_user,
            ')
            ->join('info_peserta', 'user.id=info_peserta.userId', 'left')
            ->where('email', $respond['email'])
            ->get()->getRowArray();
            
        if ($user) {
            $setData = [
                'id'        => $user['id_user'],
                'email'     => $user['email'],
                'status'    => $user['status'],
                'role'      => $user['role'],
                'nama'      => $user['nama'],
                'foto'      => $user['foto'],
                'WesLogin'  => TRUE,
                'log'       => TRUE,
            ];
            if ($user['status'] == 2) {
                session()->set($setData);
                if ($setData['role'] === '1') {
                    return redirect()->to(base_url('dashboard/admin'));
                } elseif ($setData['role'] === '2') {
                    return redirect()->to(base_url('dashboard/pembimbing'));
                } elseif ($setData['role'] === '3') {
                    return redirect()->to(base_url('dashboard/peserta'));
                } elseif ($setData['role'] === '4') {
                    return redirect()->to(base_url('dashboard/tu'));
                }
            } else if ($user['status'] == 1) {
                session()->set($setData);
                return redirect()->to(base_url('dashboard/notif'));
            } else if ($user['status'] == 3) {
                session()->set($setData);
                return redirect()->to(base_url('dashboard/notif'));
            }
        } else {
            session()->set($respond);
            return redirect()->to(base_url('registrasi'));
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('home'));
    }
}
