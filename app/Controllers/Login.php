<?php

namespace App\Controllers;

use App\Models\UserModel;

class Login extends BaseController
{
    public function index()
    {
        return view('login');
    }

    public function auth()
{
    $model = new UserModel();

    $username = $this->request->getPost('username');
    $password = $this->request->getPost('password');

    $user = $model->where('username', $username)->first();

    if ($user) {

        if (password_verify($password, $user['password'])) {

            session()->set([
                'logged_in' => true,
                'username' => $user['username']
            ]);

            return redirect()->to('/dashboard');

            session()->set([
                'logged_in' => true,
                'username' => $user['username']
            ]);

            dd(session()->get());

            return redirect()->to('/produk');
        }
    }

    return redirect()
        ->to('/login')
        ->with('error', 'Username atau Password salah');
}

    public function logout()
    {
        session()->destroy();

        return redirect()->to('/login');
    }
}