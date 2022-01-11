<?php defined('BASEPATH') or exit('No direct script access allowed');

class Notifikasi_model extends CI_Model
{
    private $_table = "notifikasi";

    public $id;
    public $nama;
    public $isi;
    public $keterangan;
    public $status;

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getbyId($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->result();
    }
    
    public function getLatest()
    {
        $this->db->select('*');
        $this->db->order_by('id','ASC');
        return $this->db->get($this->_table)->result();
    }
    
    public function save()
    {
        $post = $this->input->post();
        $this->id = "";
        $this->nama = $post["nama"];
        $this->isi = $post["isi"];
        $this->keterangan = $post["keterangan"];
        $this->status= $post["status"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id = $post["id"];
        $this->nama = $post["nama"];
        $this->isi = $post["isi"];
        $this->keterangan = $post["keterangan"];
        $this->status = $post["status"];
        return $this->db->update($this->_table, $this, array('id' => $post['id']));
    }

    private function _uploadImage()
    {
        $config['upload_path']          = './peraturan/';
        $config['allowed_types']        = 'pdf|jpg|png|jpeg';
        $config['max_size']                = 2048;
        $config['file_name']            = date('d-m-Y_H:i:s');
        $config['overwrite']            = true;
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file')) {
            return $this->upload->data("file_name");
        }
        return "default.jpg";
    }
}
