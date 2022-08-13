<?php namespace App\Controllers;

use App\Models\PropertiesModel;
use CodeIgniter\Controller;
 
class Properties extends Controller
{
    protected $properties;

    function __construct()
    {
        $this->properties = new PropertiesModel();
    }

    public function index()
    {
        $session = session();
        // echo "Welcome back, ".$session->get('name');
        $data['title'] = 'Property';
        $data['properties'] = $this->properties->findAll();
        $data['ctrl'] = $this;

        echo view('_admin/properties_view', $data);
    }
}