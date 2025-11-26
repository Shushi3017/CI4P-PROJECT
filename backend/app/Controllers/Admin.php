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
}
