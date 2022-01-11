<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('auth_helper');
		$this->load->model("Anggota_model", "anggota");
		$this->load->model("Member_model", "member");
		$this->load->model("Peraturan_model", "peraturan");
		$this->load->model("Postingan_model", "postingan");
		$this->load->model("Ppl_model", "ppl");
		$this->load->model("Ppluser_model", "ppluser");
	}

	public function index()
	{
		$this->load->view('admin/dashboard');
	}
	public function comingsoon()
	{
		$this->load->view('admin/404');
	}

	public function login()
	{
		$this->load->view('admin/login');
	}
	public function logout()
	{
		$this->member->logout();
		redirect('anggota/login');
	}

	public function register()
	{
		$this->load->view('admin/member/register');
	}

	public function registeraction()
	{
		if ($this->member->save()) {
			echo "<script>
                alert('Pendaftaran Berhasil! Silahkan Login');
                window.location.href='login';
                </script>";
		} else {
			echo "<script>
                alert('Pendaftaran gagal! Silahkan Hubungi Admin!');
                window.location.href='';
                </script>";
		};
	}
}
