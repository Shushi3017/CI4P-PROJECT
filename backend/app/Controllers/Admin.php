<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\GameModel;
use App\Models\BoardModel;

class Admin extends BaseController
{
    public function index()
    {
        $userModel  = new UserModel();
        $gameModel  = new GameModel();
        $boardModel = new BoardModel();

        // Fetch users list
        $users = $userModel->findAll();

        // Stats
        $stats = [
            'registered' => $userModel->countAllResults(),
            'active'     => $userModel->where('status', 'Active')->countAllResults(),
            'boards'     => $boardModel->countAllResults(),
            'games'      => $gameModel->countAllResults(),
        ];

        // Example genres (replace later)
        $popularGenres = [
            ['name' => 'Action', 'count' => 12],
            ['name' => 'RPG', 'count' => 5],
            ['name' => 'Strategy', 'count' => 8]
        ];

        return view('admin/admin-dboard', [
            'users' => $users,
            'stats' => $stats,
            'popularGenres' => $popularGenres,
        ]);
    }
    function  adminlogin(){
    return view('user/Authentication/login');
    
    $session = session();

    if ($session->get('type') === 'admin') {
        return redirect()->to('/admin-dashboard');
    }

    if ($session->has('type') && $session->get('type') !== 'admin') {
        // Non-admin trying to access -> 404 and show login again
        return $this->response
            ->setStatusCode(404)
            ->setBody(view('user/Authentication/login'));
    }

    // No session -> show login page
    return view('user/Authentication/login');


}
}