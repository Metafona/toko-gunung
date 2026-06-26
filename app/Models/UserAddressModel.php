<?php

namespace App\Models;

use CodeIgniter\Model;

class UserAddressModel extends Model
{
    protected $table = 'user_addresses';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'label', 'recipient', 'phone', 'address', 'city', 'province', 'postal_code', 'is_default'];
    protected $useTimestamps = true;

    public function getAddressesByUser($userId)
    {
        return $this->where('user_id', $userId)->orderBy('is_default', 'DESC')->findAll();
    }

    public function setDefault($id, $userId)
    {
        $this->where('user_id', $userId)->set(['is_default' => false])->update();
        $this->update($id, ['is_default' => true]);
    }
}
