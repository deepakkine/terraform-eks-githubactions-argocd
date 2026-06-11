<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function register()
    {
        return view('auth/register');
    }

    public function saveRegister()
    {
        $model = new UserModel();

        $model->save([
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
        ]);

        return redirect()->to('/login');
    }

    public function login()
    {
        return view('auth/login');
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to('/login')
            ->with('success', 'Logged out successfully');
    }

    public function checkLogin()
    {
        $model = new \App\Models\UserModel();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $model->where('email', $email)->first();

        if (!$user) {
            return redirect()->back()->with('error', 'User not found');
        }

        if (!password_verify($password, $user['password'])) {
            return redirect()->back()->with('error', 'Wrong password');
        }

        session()->set('user', $user);

        if ($user['role'] === 'admin') {
            return redirect()->to('/admin')->with('success', 'Welcome Admin');
        }

        return redirect()->to('/')->with('success', 'Login successful');
    }
    public function createAdmin()
    {
        $model = new UserModel();

        $model->save([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => '123456',
            'role' => 'admin'
        ]);

        echo "Admin created";
    }
}
