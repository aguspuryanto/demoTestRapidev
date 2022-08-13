<?php namespace App\Controllers;

use App\Models\RoomsModel;
use App\Models\RoomsRateModel;
use CodeIgniter\Controller;
 
class Rooms extends Controller
{
    protected $rooms;
    protected $room_rate;

    function __construct()
    {
        $this->rooms = new RoomsModel();
        $this->room_rate = new RoomsRateModel();
    }

    public function index()
    {
        $session = session();
        // echo "Welcome back, ".$session->get('name');
        $data['title'] = 'Rooms';
        $data['rooms'] = $this->rooms->findAll();
        $data['roomRate'] = $this->room_rate->getFetchAll();
        $data['ctrl'] = $this;

        echo view('_admin/rooms_view', $data);
    }

    public function getRoomRate($room_id){
        // 
        $table = $this->room_rate->where(['room_id' => $room_id])->findAll();
        return $table;
    }
}