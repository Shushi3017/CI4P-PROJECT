<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

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
            'username'  => $post['username'],
            'firstname' => $post['firstname'],
            'lastname'  => $post['lastname'],
            'email'     => $post['email'],
            'password'  => password_hash($post['password'], PASSWORD_DEFAULT),
            'type'      => 'user',
            'status'    => 'active',
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
            return view('user/Authentication/login', [
                'errors' => $validation->getErrors(),
                'old' => $post
            ]);
        }

        $userModel = new \App\Models\UserModel();
        $user = $userModel->where('username', $post['username'])->first();

        if (!$user || !password_verify($post['password'], $user->password)) {
            return view('user/Authentication/login', [
                'errors' => ['username' => 'Invalid username or password'],
                'old' => $post
            ]);
        }

        // Check if user is deactivated
        if ($user->status === 'deactivated') {
            return view('user/Authentication/login', [
                'errors' => ['username' => 'Your account is deactivated. Please contact support.'],
                'old' => $post
            ]);
        }

        // Store full User entity in session
        $session->set('user', $user);

        // Redirect based on type
        if ($user->type === 'admin') {
            return redirect()->to('/admin-dashboard');
        } else {
            return redirect()->to('/'); // regular landing page
        }
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

    public function profile()
    {
        $session = session();
        $user = $session->get('user');

        if (!$user) {
            return redirect()->to('/login');
        }

        $boardModel = new \App\Models\BoardModel();
        $boardDetailModel = new \App\Models\BoardDetailModel();
        $gameModel = new \App\Models\GameModel();

        // 1. Get user's boards
        $boards = $boardModel->where('user_id', $user->id)->findAll();

        // 2. Get games per board
        $gamesByBoardId = [];
        foreach ($boards as $board) {
            $gameIds = $boardDetailModel
                ->where('board_id', $board->id)
                ->findColumn('game_id') ?? [];

            $gamesByBoardId[$board->id] = !empty($gameIds)
                ? $gameModel->whereIn('id', $gameIds)->findAll()
                : [];
        }

        return view('user/accountprofile', [
            'user' => $user, // entity object
            'boards' => $boards,
            'gamesByBoardId' => $gamesByBoardId
        ]);
    }

    public function updateUser()
    {
        $session = session();
        $user = $session->get('user');

        if (!$user) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Not logged in']);
        }

        $post = $this->request->getPost();
        $userModel = new UserModel();

        $data = [
            'username'  => $post['username'],
            'firstname' => $post['firstname'],
            'lastname'  => $post['lastname'],
            'age'       => $post['age'],
            'email'     => $post['email'],
        ];

        $userModel->update($user->id, $data);

        // Update session with fresh entity
        $session->set('user', $userModel->find($user->id));

        return $this->response->setJSON(['status' => 'success']);
    }
}
