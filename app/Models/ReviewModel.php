<?php

namespace App\Models;

use CodeIgniter\Model;

class ReviewModel extends Model
{
    protected $table = 'reviews';
    protected $primaryKey = 'id';
    protected $allowedFields = ['product_id', 'user_id', 'parent_id', 'rating', 'comment'];
    protected $useTimestamps = true;

    public function getReviewsByProduct($productId)
    {
        return $this->select('reviews.*, users.username, users.avatar')
            ->join('users', 'users.id = reviews.user_id')
            ->where('reviews.product_id', $productId)
            ->where('reviews.parent_id', null)
            ->orderBy('reviews.created_at', 'DESC')
            ->findAll();
    }

    public function getReplies($reviewId)
    {
        return $this->select('reviews.*, users.username, users.avatar')
            ->join('users', 'users.id = reviews.user_id')
            ->where('reviews.parent_id', $reviewId)
            ->orderBy('reviews.created_at', 'ASC')
            ->findAll();
    }

    public function getAverageRating($productId)
    {
        return $this->selectAvg('rating')
            ->where('product_id', $productId)
            ->where('parent_id', null)
            ->get()
            ->getRow()
            ->rating ?? 0;
    }

    public function getRatingCount($productId)
    {
        return $this->where('product_id', $productId)
            ->where('parent_id', null)
            ->countAllResults();
    }
}
