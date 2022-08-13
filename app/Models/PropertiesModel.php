<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class PropertiesModel extends Model{
    protected $table = 'properties';

    protected $allowedFields = [
        'property_group_id',
        'manager_id',
        'name',
        'created_at'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}