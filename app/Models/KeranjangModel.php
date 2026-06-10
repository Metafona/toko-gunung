<?php

namespace App\Models;

use CodeIgniter\Model;

class KeranjangModel extends Model
{
    protected $table = 'cart';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'product_id', 'quantity'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = false;

    public function getCartWithProduct($userId)
    {
        return $this->select('cart.*, products.name, products.price, products.image, products.slug, products.badge')
            ->join('products', 'products.id = cart.product_id')
            ->where('cart.user_id', $userId)
            ->findAll();
    }

    public function getTotal($userId)
    {
        return $this->selectSum('cart.quantity * products.price as total')
            ->join('products', 'products.id = cart.product_id')
            ->where('cart.user_id', $userId)
            ->get()
            ->getRow()
            ->total ?? 0;
    }
}
