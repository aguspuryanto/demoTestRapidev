<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class PromotionModel extends Model{
    protected $table = 'promotions';

    protected $allowedFields = [
        'author_id',
        'name',
        'type',
        'amount',
        'publish_start',
        'publish_end',
        'booking_start',
        'booking_end',
        'stay_start',
        'stay_end',
        'created_at'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}