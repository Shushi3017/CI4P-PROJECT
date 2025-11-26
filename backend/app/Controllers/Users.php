<?php

namespace App\Controllers;

use App\Models\UserModel;

class Users extends BaseController
{
    public function index()
    {
        return view('user/landing');
    }

    public function signup()
    {
        return view('user/Authentication/signup');
    }

    public function register() // POST endpoint for signup
    {
        $session = session();
        $request = service('request');

        $validation = \Config\Services::validation();
        $validation->setRule('username', 'Username', 'required|min_length[3]|max_length[50]');
        $validation->setRule('firstname', 'First Name', 'required');
        $validation->setRule('lastname', 'Last Name', 'required');
        $validation->setRule('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $validation->setRule('password', 'Password', 'required|min_length[6]');
        $validation->setRule('terms', 'Terms', 'required');

        $post = $request->getPost();

        if (! $validation->run($post)) {
            $session->setFlashdata('errors', $validation->getErrors());
            return redirect()->back()->withInput();
        }

        $userModel = new UserModel();
        $data = [
            'username' => $post['username'],
            'firstname' => $post['firstname'],
            'lastname' => $post['lastname'],
            'email' => $post['email'],
            'password' => password_hash($post['password'], PASSWORD_DEFAULT),
            'type' => 'user',
            'status' => 'active',
        ];

        $userModel->insert($data);

        $session->setFlashdata('success', 'Account created successfully. Please login.');
        return redirect()->to('/login');
    }

    public function login()
    {
        return view('user/Authentication/login');
    }

public function authenticate()
{
    $session = session();
    $request = service('request');

    $validation = \Config\Services::validation();
    $validation->setRule('username', 'Username', 'required');
    $validation->setRule('password', 'Password', 'required');

    $post = $request->getPost();

    if (! $validation->run($post)) {
        // Pass errors and old data to view
        return view('user/Authentication/login', [
            'errors' => $validation->getErrors(),
            'old' => $post
        ]);
    }

    $username = $post['username'];
    $password = $post['password'];

    $userModel = new \App\Models\UserModel();
    $user = $userModel->where('username', $username)->first();

    if (!$user || !password_verify($password, $user->password)) {
        return view('user/Authentication/login', [
            'errors' => ['username' => 'Invalid username or password'],
            'old' => $post
        ]);
    }

    $session->set('user', [
        'id' => $user->id,
        'username' => $user->username,
        'email' => $user->email,
        'firstname' => $user->firstname,
        'lastname' => $user->lastname,
        'type' => $user->type,
    ]);

    return redirect()->to('/'); // landing page for regular users
}

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }

    public function roadmap()
    {
        return view('user/roadmap');
    }

    public function moodboard()
    {
        return view('user/moodboard');
    }
}