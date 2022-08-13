<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
 
class Dashboard extends Controller
{
    public function index()
    {
        $session = session();
        // echo "Welcome back, ".$session->get('name');

        $data['title']     = 'Data Vaksin Karyawan';

        echo view('_partials/header', $data);
        echo view('_admin/dashboard_view', $data);
        echo view('_partials/footer', $data);
    }
}