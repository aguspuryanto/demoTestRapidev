<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class RoomsModel extends Model{
    protected $table = 'rooms';

    protected $allowedFields = [
        'property_id',
        'name',
        'created_at'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}