<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductVariantModel extends Model
{
    protected $table = 'product_variants';
    protected $primaryKey = 'id';
    protected $allowedFields = ['product_id', 'name', 'price_adjustment', 'stock', 'sku', 'image'];
    protected $useTimestamps = true;

    public function getVariantsByProduct($productId)
    {
        return $this->where('product_id', $productId)->findAll();
    }
}
