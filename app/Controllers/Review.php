<?php

namespace App\Controllers;

use App\Models\ReviewModel;

class Review extends BaseController
{
    public function simpan()
    {
        $reviewModel = new ReviewModel();

        $rules = [
            'product_id' => 'required',
            'rating'     => 'required|numeric|greater_than[0]|less_than[6]',
            'comment'    => 'required|min_length[10]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $reviewModel->save([
            'product_id' => $this->request->getPost('product_id'),
            'user_id'    => session()->get('id'),
            'rating'     => $this->request->getPost('rating'),
            'comment'    => $this->request->getPost('comment'),
        ]);

        return redirect()->back()->with('success', 'Ulasan berhasil ditambahkan');
    }

    public function balas($reviewId)
    {
        $reviewModel = new ReviewModel();
        $review = $reviewModel->find($reviewId);
        if (!$review) {
            return redirect()->back()->with('error', 'Ulasan tidak ditemukan');
        }

        $rules = ['comment' => 'required|min_length[3]'];
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $reviewModel->save([
            'product_id' => $review['product_id'],
            'user_id'    => session()->get('id'),
            'parent_id'  => $reviewId,
            'rating'     => 0,
            'comment'    => $this->request->getPost('comment'),
        ]);

        return redirect()->back()->with('success', 'Balasan berhasil ditambahkan');
    }
}
