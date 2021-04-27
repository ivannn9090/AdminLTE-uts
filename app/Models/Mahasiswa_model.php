<?php

class Mahasiswa_model extends CI_Model{
    public function getAllMahasiswa()
    {
        return $this->db->get('mahasiswa')->result_array();

    }

    public function tambahDataMahasiswa(){
        $data = [
            "NAMA"=> $this->input->post('NAMA', true),
            "Statistik"=> $this->input->post('Statistik',true),
            "Teknologi_Web"=> $this->input->post('Teknologi_Web',true),
            "Teknologi_Komputer"=> $this->input->post('Teknologi_Komputer',true),
            "Basis_Data"=> $this->input->post('Basis_Data',true),
        ];

        $this->db->insert('mahasiswa', $data);
        
    }

    public function hapusDataMahasiswa($ID)
    {
        $this->db->where('ID',$ID);
        $this->db->delete('mahasiswa');
    }

    public function getMahasiswaById($ID)
    {
        return $this->db->get_where('mahasiswa',['ID'=>$ID])->row_array();
    }

    public function ubahDataMahasiswa(){
        $data = [
            "NAMA"=> $this->input->post('NAMA', true),
            "Statistik"=> $this->input->post('Statistik',true),
            "Teknologi_Web"=> $this->input->post('Teknologi_Web',true),
            "Teknologi_Komputer"=> $this->input->post('Teknologi_Komputer',true),
            "Basis_Data"=> $this->input->post('Basis_Data',true),
        ];
        $this->db->where('ID', $this->input->post('ID'));
        $this->db->update('mahasiswa', $data);
    }

    public function cariDataMahasiswa()
    {
        $keyword = $this->input->post('keyword',true);
        $this->db->like('nama', $keyword);
        return $this->db->get('mahasiswa')->result_array();
    }

    public function get_max()
    {
        $this->db->order_by('Statistik', 'desc');
        $this->db->from('mahasiswa');
        return $this->db->get('')->row();
    }

    public function get_min()
    {
        $this->db->order_by('Statistik','asc');
        $this->db->from('mahasiswa');
        return $this->db->get('')->row();
    }
    public function get_avg()
    {
        $this->db->select_avg('Statistik','Statistik');
        $this->db->from('mahasiswa');
        return $this->db->get('')->row();
    }
    public function maxtekonologiWEB()
    {
        $this->db->order_by('Teknologi_Web', 'desc');
        $this->db->from('mahasiswa');
        return $this->db->get('')->row();
    }

    public function mintekonologiWEB()
    {
        $this->db->order_by('Teknologi_Web','asc');
        $this->db->from('mahasiswa');
        return $this->db->get('')->row();
    }
    public function avgtekonologiWEB()
    {
        $this->db->select_avg('Teknologi_Web','Teknologi_Web');
        $this->db->from('mahasiswa');
        return $this->db->get('')->row();
    }
    public function maxtekonologikomp()
    {
        $this->db->order_by('Teknologi_Komputer', 'desc');
        $this->db->from('mahasiswa');
        return $this->db->get('')->row();
    }

    public function mintekonologikomp()
    {
        $this->db->order_by('Teknologi_Komputer','asc');
        $this->db->from('mahasiswa');
        return $this->db->get('')->row();
    }
    public function avgtekonologikomp()
    {
        $this->db->select_avg('Teknologi_Komputer','Teknologi_Komputer');
        $this->db->from('mahasiswa');
        return $this->db->get('')->row();
    }
    public function maxtekonologiBD()
    {
        $this->db->order_by('Basis_Data', 'desc');
        $this->db->from('mahasiswa');
        return $this->db->get('')->row();
    }

    public function mintekonologiBD()
    {
        $this->db->order_by('Basis_Data','asc');
        $this->db->from('mahasiswa');
        return $this->db->get('')->row();
    }
    public function avgtekonologiBD()
    {
        $this->db->select_avg('Basis_Data','Basis_Data');
        $this->db->from('mahasiswa');
        return $this->db->get('')->row();
    }
    public function frekuensi()
   {
     $this->db->select('ID, NAMA, Statistik, COUNT(Statistik) as total');
    $this->db->group_by('Statistik'); 
    $this->db->order_by('total', 'desc'); 
    $hasil = $this->db->get('mahasiswa');
   return $hasil;
    }
}