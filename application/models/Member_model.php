<?php defined('BASEPATH') or exit('No direct script access allowed');

class Member_model extends CI_Model
{
    private $_table = "member";

    public $id_member;
    public $nama;
    public $alamat;
    public $email;
    public $password;
    public $notelp;
    public $created_at;
    public $updated_at;

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function doLogin()
    {
        $post = $this->input->post();

        // cari user berdasarkan email dan username
        $this->db->where('email', $post["email"]);
        $user = $this->db->get($this->_table)->row();

        // jika user terdaftar
        if ($user) {
            // periksa password-nya
            $isPasswordTrue = $post["password"] == $user->password;
            // jika password benar dan dia admin
            if ($isPasswordTrue) {
                // login sukses yay!
                $this->session->set_userdata(['user_logged' => $user]);
                $this->session->set_userdata(['role' => 'Member']);
                $this->session->set_userdata(['nama' => $user->nama]);
                $this->session->set_userdata(['id_member' => $user->id_member]);
                $this->session->set_userdata(['id_login' => $user->id_member]);
                return true;
            }
        }

        // login gagal
        return false;
    }

    public function getidmemberlast()
    {
        $this->db->select('id_member');
        $this->db->order_by('id_member','DESC');
        $this->db->limit('1');
        return $this->db->get($this->_table)->row();
    }
    public function save()
    {
        $a = str_split($this->getidmemberlast()->id_member,1);
        $u= $a[5]+1;
        $post = $this->input->post();
        $this->id_member ="U00".$u;
        $this->nama = $post["nama"];
        $this->alamat = $post["alamat"];
        $this->email = $post["email"];
        $this->password = $post["password"];
        $this->notelp = $post["notelp"];
        $this->created_at = date('Y-m-d H:i:s');
        $this->updated_at = '';
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_member = $post["id_member"];
        $this->nama = $post["nama"];
        $this->alamat = $post["alamat"];
        $this->email = $post["email"];
        $this->password = $post["password"];
        $this->notelp = $post["notelp"];
        $this->created_at = date('Y-m-d H:i:s');
        $this->updated_at = '';
        return $this->db->update($this->_table, $this, array('id_member' => $post['id_member']));
    }
}
