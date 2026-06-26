<?php

namespace App\Controllers;

use App\Models\UserAddressModel;

class Address extends BaseController
{
    public function index()
    {
        $addressModel = new UserAddressModel();
        $data = [
            'title' => 'Alamat Saya',
            'addresses' => $addressModel->getAddressesByUser(session()->get('id')),
        ];
        return view('address/index', $data);
    }

    public function simpan()
    {
        $addressModel = new UserAddressModel();

        $rules = [
            'recipient'   => 'required|min_length[3]',
            'phone'       => 'required|min_length[8]',
            'address'     => 'required|min_length[5]',
            'city'        => 'required',
            'province'    => 'required',
            'postal_code' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $userId = session()->get('id');
        $isDefault = $this->request->getPost('is_default');

        if ($isDefault) {
            $addressModel->where('user_id', $userId)->set(['is_default' => false])->update();
        }

        $addressModel->save([
            'user_id'     => $userId,
            'label'       => $this->request->getPost('label'),
            'recipient'   => $this->request->getPost('recipient'),
            'phone'       => $this->request->getPost('phone'),
            'address'     => $this->request->getPost('address'),
            'city'        => $this->request->getPost('city'),
            'province'    => $this->request->getPost('province'),
            'postal_code' => $this->request->getPost('postal_code'),
            'is_default'  => $isDefault ? true : false,
        ]);

        return redirect()->to('/address')->with('success', 'Alamat berhasil ditambahkan');
    }

    public function update($id)
    {
        $addressModel = new UserAddressModel();
        $userId = session()->get('id');

        $addr = $addressModel->find($id);
        if (!$addr || $addr['user_id'] != $userId) {
            return redirect()->to('/address')->with('error', 'Alamat tidak ditemukan');
        }

        $rules = [
            'recipient'   => 'required|min_length[3]',
            'phone'       => 'required|min_length[8]',
            'address'     => 'required|min_length[5]',
            'city'        => 'required',
            'province'    => 'required',
            'postal_code' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $isDefault = $this->request->getPost('is_default');

        if ($isDefault) {
            $addressModel->where('user_id', $userId)->set(['is_default' => false])->update();
        }

        $addressModel->update($id, [
            'label'       => $this->request->getPost('label'),
            'recipient'   => $this->request->getPost('recipient'),
            'phone'       => $this->request->getPost('phone'),
            'address'     => $this->request->getPost('address'),
            'city'        => $this->request->getPost('city'),
            'province'    => $this->request->getPost('province'),
            'postal_code' => $this->request->getPost('postal_code'),
            'is_default'  => $isDefault ? true : false,
        ]);

        return redirect()->to('/address')->with('success', 'Alamat berhasil diupdate');
    }

    public function hapus($id)
    {
        $addressModel = new UserAddressModel();
        $userId = session()->get('id');

        $addr = $addressModel->find($id);
        if (!$addr || $addr['user_id'] != $userId) {
            return redirect()->to('/address')->with('error', 'Alamat tidak ditemukan');
        }

        $addressModel->delete($id);
        return redirect()->to('/address')->with('success', 'Alamat berhasil dihapus');
    }

    public function setDefault($id)
    {
        $addressModel = new UserAddressModel();
        $addressModel->setDefault($id, session()->get('id'));
        return redirect()->back()->with('success', 'Alamat utama berhasil diubah');
    }
}
