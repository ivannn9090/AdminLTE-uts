<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

class Mahasiswa extends CI_Controller{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Mahasiswa_model');
        $this->load->library('form_validation');
     
        
    }


    public function index()
    {
        $data['title'] = 'DAFTAR MAHASISWA';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        if($this->db->select('Statistik')){

            $data['max'] = $this->Mahasiswa_model->get_max();
            $data['min'] = $this->Mahasiswa_model->get_min();
            $data['rata_rata'] = $this->Mahasiswa_model->get_avg();
            $data['frek1'] = $this->Mahasiswa_model->frekuensi();
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
        $this->load->view('statistik/mahasiswa/index', $data);
        $this->load->view('templates/footer');


    }

    public function tambah()
    {
        
        $data['title'] = 'nambah data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        
        $data['mahasiswa'] = $this->db->get('mahasiswa')->result_array();

        $this->form_validation->set_rules('NAMA','NAMA','required');
        $this->form_validation->set_rules('Statistik','Statistik','required|max_length[2]');
        $this->form_validation->set_rules('Teknologi_Web','Teknologi_Web','required|max_length[2]');
        $this->form_validation->set_rules('Teknologi_Komputer','Teknologi_Komputer','required|max_length[2]');
        $this->form_validation->set_rules('Basis_Data','Basis_Data','required|max_length[2]');
        if($this->form_validation->run() == FALSE){

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('statistik/mahasiswa/index', $data);
            $this->load->view('templates/footer');
           
        }else{
            $this->Mahasiswa_model->tambahDataMahasiswa();
            $this->session->set_flashdata('flash','Ditambahkan');
            redirect('mahasiswa');

          //  $data = [
          //      "NAMA"=> $this->input->post('NAMA'),
           //     "Statistik"=> $this->input->post('Statistik'),
           //     "Teknologi_Web"=> $this->input->post('Teknologi_Web'),
           //     "Teknologi_Komputer"=> $this->input->post('Teknologi_Komputer'),
           //     "Basis_Data"=> $this->input->post('Basis_Data'),
           // ];
           //$this->db->insert('mahasiswa', $data);
           // $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New data mahasiswa added!</div>');
           // redirect('mahasiswa');
        }
    }

    public function hapus($ID)
    {
        $this->Mahasiswa_model->hapusDataMahasiswa($ID);
        $this->session->set_flashdata('flash','Dihapus');
        redirect('mahasiswa');
    }

    public function detail($ID)
    {
        $data['judul'] = 'Detail Data Mahasiswa';
        $data['mahasiswa'] = $this->Mahasiswa_model->getMahasiswaById($ID);
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('mahasiswa/detail', $data);
        $this->load->view('templates/footer');
    }

    
    public function getubah()
    {
        echo json_encode($this->Mahasiswa_model->getMahasiswaById($_POST['id']));
    }
    
    public function ubah($ID)
    {
        $data['title'] = 'Merubah data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('NAMA', 'NAMA', 'required');
        $this->form_validation->set_rules('Statistik', 'Statistik', 'required|max_length[2]');
        $this->form_validation->set_rules('Teknologi_Web', 'Teknologi_Web', 'required|max_length[2]');
        $this->form_validation->set_rules('Teknologi_Komputer', 'Teknologi_Komputer', 'required|max_length[2]');
        $this->form_validation->set_rules('Basis_Data', 'Basis_Data', 'required|max_length[2]');

        $data['judul'] = 'form ubah data nilai mahasiswa';
        $data['mahasiswa'] = $this->Mahasiswa_model->getMahasiswaByid($ID);
        $this->form_validation->set_rules('NAMA', 'NAMA', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
            $this->load->view('statistik/mahasiswa/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Mahasiswa_model->ubahDataMahasiswa();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('mahasiswa');
        }
    }


}