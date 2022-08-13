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

    public  function getPromoPrice($roomrateArr) {
        // $data = $this->getRoomRate($room_id);
        if($roomrateArr['no_promo']==0) {
            $data = $this->room_rate->where([
                'room_id' => $roomrateArr['room_id'],
                'date' => $roomrateArr['date']
            ])->findAll();
            
            $rate = $data[0]['rate'];
            // jika promo 10%
            $diskon = 10;
            if($roomrateArr['no_promo']==0) {
                // echo "<br>" . ($data[0]['rate']);
                $rate = $rate - ($rate * ($diskon/100));
            }

            return $rate;
        }
    }

    public function getKomisiPrice($diskonprice) {
        $komisi = 10;
        return $diskonprice - ($diskonprice * ($komisi/100));
    }
}