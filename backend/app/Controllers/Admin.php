<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\GameModel;
use App\Models\BoardModel;

class Admin extends BaseController
{
    protected $userModel;
    protected $boardModel;
    protected $gameModel;



    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->boardModel = new BoardModel();
        $this->gameModel = new GameModel();
    }

    private function checkAdmin()
    {
        $session = session();
        $user = $session->get('user');

        // Not logged in = redirect
        if (!$user) {
            return redirect()->to('/');
        }

        // Logged in but NOT admin = show custom error page
        if ($user->type !== 'admin') {
            return view('errors/error404');
        }

        return null;
    }


    // Make users() the default method
    public function index()
    {
        if ($resp = $this->checkAdmin()) return $resp;

        return $this->users();
    }

    public function users()
    {
        if ($resp = $this->checkAdmin()) return $resp;

        $search = $this->request->getGet('search');
        $users = $search
            ? $this->userModel->like('username', $search)->orLike('email', $search)->findAll()
            : $this->userModel->findAll();

        echo view('admin/admin-dboard', [
            'users' => $users,
            'stats' => [
                'registered' => $this->userModel->countAllResults(),
                'active' => $this->userModel->where('status', 'active')->countAllResults(),
                'boards' => $this->boardModel->countAllResults(),
                'games' => $this->gameModel->countAllResults(),
            ],
            'popularGenres' => [], // fill from DB if needed
            'search' => $search
        ]);
    }

    public function addUser()
{
    if ($resp = $this->checkAdmin()) return $resp;

    $data = $this->request->getPost();

    // Basic validation
    $requiredFields = ['addUserName', 'addUserEmail', 'addUserPassword', 'addUserRole'];
    foreach ($requiredFields as $field) {
        if (empty($data[$field])) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => ucfirst($field) . ' is required'
            ]);
        }
    }

    // Optional fields
    $firstname = $data['addUserFirstName'] ?? '';
    $lastname  = $data['addUserLastName'] ?? '';
    $age       = !empty($data['addUserAge']) ? (int)$data['addUserAge'] : null;

    // Insert user
    $this->userModel->insert([
        'username' => $data['addUserName'],
        'email'    => $data['addUserEmail'],
        'firstname'=> $firstname,
        'lastname' => $lastname,
        'age'      => $age,
        'type'     => $data['addUserRole'],
        'status'   => 'active',
        'password' => password_hash($data['addUserPassword'], PASSWORD_DEFAULT),
    ]);

    return $this->response->setJSON(['status' => 'success']);
}


    public function editUser($id)
    {
        if ($resp = $this->checkAdmin()) return $resp;

        $data = $this->request->getPost();
        $updateData = [
            'username' => $data['editUserUsername'],
            'email' => $data['editUserEmail'],
            'firstname' => $data['editUserFirstName'],
            'lastname' => $data['editUserLastName'],
            'age' => $data['editUserAge'],
            'type' => $data['editUserRole'],
            'status' => $data['editUserStatus'] ?? 'active',
        ];


        if (!empty($data['editUserPassword'])) {
            $updateData['password'] = password_hash($data['editUserPassword'], PASSWORD_DEFAULT);
        }

        $this->userModel->update($id, $updateData);
        return redirect()->to('/admin');
    }

    public function deleteUser($id)
    {
        if ($resp = $this->checkAdmin()) return $resp;

        $this->userModel->delete($id);
        return redirect()->to('/admin');
    }
    public function getUserById()
    {
        if ($resp = $this->checkAdmin()) return $resp;

        $id = $this->request->getGet('id');
        if (!$id) {
            return $this->response->setStatusCode(400)->setJSON(['error' => 'User ID required']);
        }

        $user = $this->userModel->find($id);
        if (!$user) {
            return $this->response->setStatusCode(404)->setJSON(['error' => 'User not found']);
        }

        return $this->response->setJSON($user);
    }


    // Show games dashboard
    public function games()
    {
        if ($resp = $this->checkAdmin()) return $resp;

        $games = $this->gameModel->findAll();

        echo view('admin/admingame-dboard', [
            'games' => $games
        ]);
    }

    public function addGame()
    {
        if ($resp = $this->checkAdmin()) return $resp;

        $data = $this->request->getPost();
        $this->gameModel->insert([
            'name'         => $data['addGameName'],
            'description'  => $data['addGameDescription'] ?? '',
            'image'        => $data['addGameImage'] ?? '',
            'genre'        => $data['addGameGenre'] ?? '',
            'platform'     => $data['addGamePlatform'] ?? '',
            'release_year' => $data['addGameReleaseYear'] ?? null,
        ]);

        return $this->response->setJSON(['status' => 'success']);
    }

    public function editGame($id)
    {
        if ($resp = $this->checkAdmin()) return $resp;

        $data = $this->request->getPost();
        $this->gameModel->update($id, [
            'name'         => $data['editGameName'],
            'description'  => $data['editGameDescription'] ?? '',
            'image'        => $data['editGameImage'] ?? '',
            'genre'        => $data['editGameGenre'] ?? '',
            'platform'     => $data['editGamePlatform'] ?? '',
            'release_year' => $data['editGameReleaseYear'] ?? null,
        ]);

        return $this->response->setJSON(['status' => 'success']);
    }

    public function deleteGame($id)
    {
        if ($resp = $this->checkAdmin()) return $resp;

        $this->gameModel->delete($id);
        return $this->response->setJSON(['status' => 'success']);
    }

    public function getGameById()
    {
        if ($resp = $this->checkAdmin()) return $resp;

        $id = $this->request->getGet('id');
        if (!$id) return $this->response->setJSON(['error' => 'Game ID required']);

        $game = $this->gameModel->find($id);
        if (!$game) return $this->response->setJSON(['error' => 'Game not found']);

        return $this->response->setJSON($game);
    }
}
