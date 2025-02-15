<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_Laporan extends CI_Model
{
    private $_table = "tb_posting";

    public $ID_akun;
    //public $id_akun;
    //public $foto;
    public $image1 = "default.jpg";
    public $image2 = "default.jpg";
    public $image3 = "default.jpg";
    public $tipe_posting;
    public $nama_barang;
    public $kategori;
    public $lokasi;
    public $tgl_posting;
    public $tgl_kehilangan;
    public $Description;
    public $no_telp;

    public function saveLost($id_akun)
    {
        $post = $this->input->post();
        $this->ID_posting = "";

        $this->ID_akun = $id_akun;
        $this->tipe_posting = "Barang Hilang";
        $this->nama_barang = $post["nama_barang"];
        $this->kategori = $post["kategori"];
        $this->lokasi = $post["lokasi"];
        $this->tgl_posting = date("Y-m-d H:i:s");
        $this->tgl_kehilangan = $post["tgl_kehilangan"];
        $this->Description = $post["deskripsi"];
        $this->no_telp = $post["no_telp"];
        $this->image1 = $this->_uploadImage('foto1');
        $this->image2 = $this->_uploadImage('foto2');
        $this->image3 = $this->_uploadImage('foto3');
        return $this->db->insert($this->_table, $this);
    }

    public function saveFound($id_akun)
    {
        $post = $this->input->post();
        $this->ID_posting = "";

        $this->ID_akun = $id_akun;
        $this->tipe_posting = "Barang Hilang";
        $this->nama_barang = $post["nama_barang"];
        $this->kategori = $post["kategori"];
        $this->lokasi = $post["lokasi"];
        $this->tgl_posting = date("Y-m-d H:i:s");
        $this->tgl_kehilangan = $post["tgl_kehilangan"];
        $this->Description = $post["deskripsi"];
        $this->no_telp = $post["no_telp"];
        $this->image1 = $this->_uploadImage('foto1');
        $this->image2 = $this->_uploadImage('foto2');
        $this->image3 = $this->_uploadImage('foto3');
        return $this->db->insert($this->_table, $this);
    }

    private function _uploadImage($foto)
    {
        $config['upload_path']          = './dist/images/uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $this->ID_posting;
        $config['overwrite']            = true;
        $config['max_size']             = 10240;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload($foto)) {
            return $this->upload->data("file_name");
        }

        return "default.jpg";
    }
}
