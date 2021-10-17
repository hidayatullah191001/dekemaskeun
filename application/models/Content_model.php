<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Content_model extends CI_Model
{
    private $_table = "katalog";

    public function getById($id_user) {
        return $this->db->get_where($this->_table, ["id" => $id_user])->row();
    }


    public function fungsiUploadgambar($lokasi,$namainputan){
        $config['upload_path']          = './assets/img/'.$lokasi.'/';
        $config['allowed_types']        = 'jpg|jpeg|png';
        $this->load->library('upload', $config);
        $this->upload->do_upload($namainputan);
        return $this->upload->data("file_name");
    }

    public function fungsiUploadkategori($namainputan){
        $config['upload_path']          = './assets/img/kategori/';
        $config['allowed_types']        = 'jpg|jpeg|png';
        $this->load->library('upload', $config);
        $this->upload->do_upload($namainputan);
        return $this->upload->data("file_name");
    }

    public function update_data()
    {
        $post = $this->input->post();
        $this->id = $post['id'];
        $this->nama_produk = $post['nama_produk'];
        $this->deskripsi = $post['deskripsi'];
        $this->kategori_id = $post['kategori_id'];
        $this->tipe = $post['tipe'];
        $this->harga = $post['harga'];

        if (!empty($_FILES['image']['name'])) {
            $this->image = $this->Content_model->fungsiUploadgambar('produk','image');
            unlink(FCPATH . 'assets/img/produk/'. $post['oldfile']);
        }else{
            $this->image = $post['oldfile'];
        }

        $this->db->update($this->_table, $this, array('id' => $post['id']));
    }

    public function getData($limit, $start)
    {
        $this->db->order_by('id','desc');
        return $this->db->get('katalog', $limit, $start)->result_array();
    }

    public function getDataKategori($limit, $start)
    {
        $this->db->order_by('id','desc');
        return $this->db->get('kategori', $limit, $start)->result_array();
    }

    public function countbyid($id)
    {
        return $this->db->get_where('katalog', ['kategori_id' => $id])->num_rows();
    }

    public function countAll()
    {
        return $this->db->get('katalog')->num_rows();
    }


    public function countKategori()
    {
        return $this->db->get('kategori')->num_rows();
    }


    public function getPengumuman($limit, $start)
    {
        $this->db->order_by('id','desc');
        return $this->db->get('pengumuman', $limit, $start)->result();
    }

    public function getTestimoni()
    {
        $this->db->order_by('id','desc');
        return $this->db->get('testimoni')->result();
    }

    public function countPengumuman()
    {
        return $this->db->get('pengumuman')->num_rows();
    }

    public function countTestimoni()
    {
        return $this->db->get('testimoni')->num_rows();
    }

    public function getNamaKategori($idkategori){
        $this->db->select('kategori');
        $this->db->from('kategori');
        $this->db->where('id', $idkategori);
        return $this->db->get()->row();
    }
}
