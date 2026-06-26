<?php

namespace App\Controllers;

use App\Models\UserModel;

class Profile extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Profil Saya',
        ];

        return view('profile/index', $data);
    }

    public function update()
    {
        $userModel = new UserModel();
        $userId = session()->get('id');

        $rules = [
            'username' => 'required|min_length[3]|is_unique[users.username,id,' . $userId . ']',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'username' => $this->request->getVar('username'),
        ];

        $file = $this->request->getFile('avatar');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/avatars', $newName);
            $data['avatar'] = base_url('uploads/avatars/' . $newName);
        }

        $userModel->update($userId, $data);

        $updatedUser = $userModel->find($userId);
        session()->set('username', $updatedUser['username']);
        if ($updatedUser['avatar']) {
            session()->set('avatar', $updatedUser['avatar']);
        }

        return redirect()->to('/profile')->with('success', 'Profil berhasil diupdate');
    }
}
