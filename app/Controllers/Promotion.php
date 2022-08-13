<?php namespace App\Controllers;

use App\Models\PromotionModel;
use App\Models\PropertiesModel;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
 
class Promotion extends Controller
{
    protected $promotionMdel;
    protected $propertiesMdel;

    protected $helpers = [];

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
    }
    
    function __construct()
    {
        $this->promotionMdel = new PromotionModel();
        $this->propertiesMdel = new PropertiesModel();
    }

    public function index()
    {
        // $session = session();
        // echo "Welcome back, ".$session->get('name');
        $data['title']  = 'Promotions';
        
        $data['promotion'] = $this->promotionMdel->findAll();
        $data['properties'] = $this->propertiesMdel->findAll();
        $data['ctrl']   = $this;

        // echo view('_partials/header', $data);
        echo view('_admin/promotion_view', $data);
        // echo view('_partials/footer', $data);
    }

    public function create() {
        // $create = new PromotionModel();
        $post   = $this->request->getPost();
        // echo json_encode($post); die();

        $p_publikasi = explode("-", $post['p_publikasi']);
        $p_reservasi = explode("-", $post['p_reservasi']);
        $p_inap      = explode("-", $post['p_inap']);

        $data = [
            'author_id' => 1,
            'name' => $post['name'],
            'type' => $post['type'],
            'amount' => $post['amount'],
            'max_amount' => 40,
            'publish_start' => date('Y-m-d', strtotime(trim($p_publikasi[0]))),
            'publish_end' => date('Y-m-d', strtotime(trim($p_publikasi[1]))),
            'booking_start' => date('Y-m-d', strtotime(trim($p_reservasi[0]))),
            'booking_end' => date('Y-m-d', strtotime(trim($p_reservasi[1]))),
            'stay_start' => date('Y-m-d', strtotime(trim($p_inap[0]))),
            'stay_end' => date('Y-m-d', strtotime(trim($p_inap[1]))),
            'is_all_properties' => false,
            'created_at' => date('Y-m-d H:i:s'),
        ];
        
        $this->promotionMdel->insert($data);
        return redirect('promotion')->with('success', 'Data Added Successfully');	
    }

    public function is_publish($id) {
        //
        $data = $this->promotionMdel->find($id);
        // return json_encode($data);
        $isValid = false;
        $publish_start = date('Y-m-d', strtotime($data['publish_start']));
        $publish_end = date('Y-m-d', strtotime($data['publish_end']));

        if((strtotime($publish_end) >= time()) && (strtotime($publish_start) <= time())) {
            $isValid = true;
        }

        return ($isValid) ? "Valid" : "Expired";

    }

    public function can_reservation($id) {
        // 
        $data = $this->promotionMdel->find($id);
        // return json_encode($data);
        $isValid = false;
        $booking_start = date('Y-m-d', strtotime($data['booking_start']));
        $booking_end = date('Y-m-d', strtotime($data['booking_end']));

        if((strtotime($booking_end) >= time()) && (strtotime($booking_start) >= time())) {
            $isValid = true;
        }

        return ($isValid) ? "Valid" : "Expired";
    }

    public function can_checkin($id) {
        // 
        $data = $this->promotionMdel->find($id);
        // return json_encode($data);
        $isValid = false;
        $stay_start = date('Y-m-d', strtotime($data['stay_start']));
        $stay_end = date('Y-m-d', strtotime($data['stay_end']));

        if((strtotime($stay_end) >= time()) && (strtotime($stay_start) >= time())) {
            $isValid = true;
        }

        return ($isValid) ? "Valid" : "Expired";
    }
}