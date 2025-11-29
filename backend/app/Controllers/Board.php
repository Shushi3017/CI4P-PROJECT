<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Board extends BaseController
{
    // List all boards (optional)
    public function index()
    {
        $session = session();
        $user = $session->get('user');

        if (!$user) {
            return redirect()->to('/signup');
        }

        $boardModel = new \App\Models\BoardModel();
        $boards = $boardModel->where('user_id', $user->id)->findAll();

        return view('user/profile', [
            'boards' => $boards,
            'user' => $user
        ]);
    }

    // Show create board form
    public function makeBoard()
    {
        return view('user/make-board');
    }

    // Save new board
    public function saveBoard()
    {
        $session = session();
        $user = $session->get('user');

        if (!$user) {
            return redirect()->to('/signup');
        }

        $request = service('request');
        $name = $request->getPost('name');
        $description = $request->getPost('description');

        if (!$name) {
            $session->setFlashdata('error', 'Board name is required.');
            return redirect()->back()->withInput();
        }

        $boardModel = new \App\Models\BoardModel();
        $boardModel->insert([
            'user_id' => $user->id,
            'name' => $name,
            'description' => $description,
            'created_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->to('/profile'); // redirect back to profile
    }

    // Show edit form
    public function editBoard($id)
    {
        $session = session();
        $user = $session->get('user');

        if (!$user) {
            return redirect()->to('/signup');
        }

        $boardModel = new \App\Models\BoardModel();
        $board = $boardModel->where('id', $id)->where('user_id', $user->id)->first();

        if (!$board) {
            return redirect()->to('/profile')->with('error', 'Board not found.');
        }

        return view('user/edit-board', [
            'board' => $board
        ]);
    }

    // Update board
    public function updateBoard($id)
    {
        $session = session();
        $user = $session->get('user');

        if (!$user) {
            return redirect()->to('/signup');
        }

        $boardModel = new \App\Models\BoardModel();
        $board = $boardModel->where('id', $id)->where('user_id', $user->id)->first();

        if (!$board) {
            return redirect()->to('/profile')->with('error', 'Board not found.');
        }

        $request = service('request');
        $post = $request->getPost();

        $boardModel->update($id, [
            'name' => $post['name'],
            'description' => $post['description'],
        ]);

        return redirect()->to('/profile')->with('success', 'Board updated successfully!');
    }

    // Delete board
    public function deleteBoard($id)
    {
        $session = session();
        $user = $session->get('user');

        if (!$user) {
            return redirect()->to('/signup');
        }

        $boardModel = new \App\Models\BoardModel();
        $board = $boardModel->where('id', $id)->where('user_id', $user->id)->first();

        if (!$board) {
            return redirect()->to('/profile')->with('error', 'Board not found.');
        }

        $boardModel->delete($id);

        return redirect()->to('/profile')->with('success', 'Board deleted successfully!');
    }
}
