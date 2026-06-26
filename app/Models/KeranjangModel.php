<?php

namespace App\Models;

use CodeIgniter\Model;

class KeranjangModel extends Model
{
    protected $table = 'cart';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'product_id', 'variant_id', 'quantity'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = false;

    public function getCartWithProduct($userId)
    {
        return $this->select('cart.*, products.name, products.price, products.image, products.slug, products.badge, product_variants.name as variant_name, product_variants.price_adjustment, product_variants.image as variant_image, product_variants.stock')
            ->join('products', 'products.id = cart.product_id', 'left')
            ->join('product_variants', 'product_variants.id = cart.variant_id', 'left')
            ->where('cart.user_id', $userId)
            ->findAll();
    }

    public function getTotal($userId)
    {
        $result = $this->select('SUM(cart.quantity * (products.price + COALESCE(product_variants.price_adjustment, 0))) as total')
            ->join('products', 'products.id = cart.product_id', 'left')
            ->join('product_variants', 'product_variants.id = cart.variant_id', 'left')
            ->where('cart.user_id', $userId)
            ->get()
            ->getRow();

        return $result->total ?? 0;
    }
}
