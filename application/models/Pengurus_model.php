<?php defined('BASEPATH') or exit('No direct script access allowed');

class Pengurus_model extends CI_Model
{
    private $_table = "pengurus";

    public $nra;
    public $jabatan;
    public $tahun_jabatan;
    public $tahun_berahir;

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($nra)
    {
        return $this->db->get_where($this->_table, ["nra" => $nra])->result();
    }
    
    public function getbyJabatan($jabatan)
    {
        $this->db->select('*');
        $this->db->like('jabatan',$jabatan);
        return $this->db->get($this->_table)->result();
    }
    public function save()
    {
        $post = $this->input->post();
        $this->nra = $post["nra"];
        $this->jabatan = $post["jabatan"];
        $this->tahun_jabatan = $post["tahun_jabatan"];
        $this->tahun_berahir = $post["tahun_berahir"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->nra = $post["nra"];
        $this->jabatan = $post["jabatan"];
        $this->tahun_jabatan = $post["tahun_jabatan"];
        $this->tahun_berahir = $post["tahun_berahir"];
        return $this->db->update($this->_table, $this, array('nra' => $post['nra']));
    }

    public function delete($nra)
    {
        return $this->db->delete($this->_table, array("nra" => $nra));
    }

    public function getNamaId()
    {
        $this->db->select('nama, id_peraturan');
        $this->db->order_by('created_at', 'DESC');
        $this->db->where('forum_fgd', '0');
        return $this->db->get($this->_table)->result_array();
    }

    public function updatefgd($id_peraturan)
    {
        $peraturan_old = $this->db->get_where($this->_table, ["id_peraturan" => $id_peraturan])->row_array();

        $this->id_peraturan = $peraturan_old["id_peraturan"];
        $this->nama = $peraturan_old["nama"];
        $this->keterangan = $peraturan_old["keterangan"];
        $this->file = $peraturan_old["old_file"];
        $this->status = $peraturan_old["status"];
        $this->forum_fgd = 1;
        $this->created_at = $peraturan_old["created_at"];
        $this->updated_at = $peraturan_old["updated_at"];

        return $this->db->update($this->_table, $this, array('id_peraturan' => $id_peraturan));
    }

    private function _uploadImage()
    {
        $config['upload_path']          = './peraturan/';
        $config['allowed_types']        = 'pdf|jpg|png|jpeg';
        $config['max_size']                = 2048;
        $config['file_name']            = date('d-m-Y') . '-' . $this->nama;
        $config['overwrite']            = true;
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file')) {
            return $this->upload->data("file_name");
        }
        return "default.jpg";
    }
}
