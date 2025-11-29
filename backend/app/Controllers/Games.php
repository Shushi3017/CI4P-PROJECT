<?php

namespace App\Controllers;

use App\Models\GameModel;
use App\Models\BoardModel;
use App\Models\BoardDetailModel;

class Games extends BaseController
{
    public function explore()
    {
        $session = session();
        $user = $session->get('user'); // User entity

        if (!$user) {
            return redirect()->to('/login');
        }

        $gameModel = new GameModel();
        $boardModel = new BoardModel();

        return view('user/explore-games', [
            'games'  => $gameModel->findAll(),
            'boards' => $boardModel->where('user_id', $user->id)->findAll(), // object style
            'user'   => $user, // pass user entity to view
        ]);
    }

    public function addToBoard()
    {
        $session = session();
        $user = $session->get('user'); // User entity
        if (!$user) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Not logged in']);
        }

        $board_id = (int) $this->request->getPost('board_id');
        $game_id  = (int) $this->request->getPost('game_id');

        if (!$board_id || !$game_id) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Missing fields']);
        }

        // Check board ownership
        $boardModel = new BoardModel();
        $board = $boardModel->where('id', $board_id)
                            ->where('user_id', $user->id)
                            ->first(); // object style
        if (!$board) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Board not found']);
        }

        $boardDetailModel = new BoardDetailModel();

        // Prevent duplicates
        $exists = $boardDetailModel
            ->where('board_id', $board_id)
            ->where('game_id', $game_id)
            ->first();

        if ($exists) {
            return $this->response->setJSON(['status' => 'exists']);
        }

        $boardDetailModel->insert([
            'board_id'   => $board_id,
            'game_id'    => $game_id,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return $this->response->setJSON(['status' => 'success']);
    }
}
