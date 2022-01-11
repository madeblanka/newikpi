<?php defined('BASEPATH') or exit('No direct script access allowed');

class About_model extends CI_Model
{
    private $_table = "about";

    public $id;
    public $visi;
    public $misi;
    public $sejarah;
    public $lainnya;

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->result();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id ="";
        $this->visi = $post["visi"];
        $this->misi = $post["misi"];
        $this->sejarah = $post["sejarah"];
        $this->lainnya = $post["lainnya"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id = $post["id"];
        $this->visi = $post["visi"];
        $this->misi = $post["misi"];
        $this->sejarah = $post["sejarah"];
        $this->lainnya = $post["lainnya"];
        return $this->db->update($this->_table, $this, array('id' => $post['id']));
    }
}
