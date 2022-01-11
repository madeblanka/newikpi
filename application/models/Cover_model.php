<?php defined('BASEPATH') or exit('No direct script access allowed');

class Cover_model extends CI_Model
{
    private $_table = "cover";

    public $id;
    public $c1;

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id = "";
        $this->c1 = $this->do_upload();
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id = $post["id"];
        $this->c1 = $this->do_upload();;

        return $this->db->update($this->_table, $this, array('id' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id" => $id));
    }

    private function do_upload()
    {
        $config['upload_path']          = './cover/';
        $config['allowed_types']        = 'jpg|png|jpeg|mp4|mpeg';
        // $config['max_size']                = 2048;
        $config['file_name']            = date('d-m-Y_H-i-s');
        $config['overwrite']            = true;
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('c1')) {
            return $this->upload->data("file_name");
        }
        $error = array('error' => $this->upload->display_errors());
        print_r($error);
        exit;
    }

}
