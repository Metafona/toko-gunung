<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'slug'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = false;
}
