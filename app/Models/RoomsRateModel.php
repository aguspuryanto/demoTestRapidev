<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class RoomsRateModel extends Model{
    protected $table = 'room_rates';

    protected $allowedFields = [
        'room_id',
        'date',
        'rate',
        'no_promo'
    ];

    public function getFetchAll(){
        $builder = $this->db->table($this->table);
        $builder->select('*');
        $builder->join('rooms b', 'b.id = room_rates.room_id');
        return $builder->get()->getResultArray();
    }
}