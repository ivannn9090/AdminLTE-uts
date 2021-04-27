<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

class Nilai extends CI_Controller{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Mahasiswa_model');
        $this->load->library('form_validation');
    }


    public function index()
    {
        $data['title'] = 'MAX, MIN, AVG, FREK';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        if($this->db->select('Statistik')){

            $data['max'] = $this->Mahasiswa_model->get_max();
            $data['min'] = $this->Mahasiswa_model->get_min();
            $data['rata_rata'] = $this->Mahasiswa_model->get_avg();
            $data['frek1']= $this->Mahasiswa_model->frekuensi();
        }
        if($this->db->select('Teknologi_Web')){

            $data['maxtw'] = $this->Mahasiswa_model->maxtekonologiWEB();
            $data['mintw'] = $this->Mahasiswa_model->mintekonologiWEB();
            $data['rata_ratatw'] = $this->Mahasiswa_model->avgtekonologiWEB();
        }
        if($this->db->select('Teknologi_Komputer')){

            $data['maxtk'] = $this->Mahasiswa_model->maxtekonologikomp();
            $data['mintk'] = $this->Mahasiswa_model->mintekonologikomp();
            $data['rata_ratatk'] = $this->Mahasiswa_model->avgtekonologikomp();
        }
        if($this->db->select('Basis_Data')){

            $data['maxbd'] = $this->Mahasiswa_model->maxtekonologiBD();
            $data['minbd'] = $this->Mahasiswa_model->mintekonologiBD();
            $data['rt'] = $this->Mahasiswa_model->avgtekonologiBD();
        }
        $data['mahasiswa']= $this->Mahasiswa_model->getAllMahasiswa();
        if($this->input->post('keyword')){
            $data['mahasiswa'] = $this->Mahasiswa_model->cariDataMahasiswa();
        }

         $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('statistik/nilai/index', $data);
        $this->load->view('templates/footer');


    }

  

}