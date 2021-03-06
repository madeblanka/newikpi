<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Front extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('auth_helper');
		$this->load->model("Postingan_model", "postingan");
		$this->load->model("About_model", "about");
		$this->load->model("Peraturan_model", "peraturan");
		$this->load->model("Anggota_Model", "anggota");
		$this->load->model("Ppl_Model", "ppl");
		$this->load->model("Pengurus_model","pengurus");
		$this->load->model("Notifikasi_model","notifikasi");
		$this->load->model("Ppluser_Model", "ppluser");
		$this->load->model("Point_terstruktur_Model", "point_terstruktur");
	}
	public function index()
	{
		$data['notifikasi'] = $this->notifikasi->getLatest();
		$data['tahun'] = $this->postingan->getTahun();
		$data['postingan'] = $this->postingan->getAll();
		$data['peraturan'] = $this->peraturan->get5();
		$data['anggota'] = $this->anggota->terbaru5();
		$this->load->view('front/index', $data);
	}

	public function postingan()
	{
		$data['tahun'] = $this->postingan->getTahun();
		$data['postingan'] = $this->postingan->getAll();
		$this->load->view('front/postingan/postingan', $data);
	}

	public function postinganlist()
	{
		$data['tahun'] = $this->postingan->getTahun();
		$data['postingan'] = $this->postingan->getAll();
		$this->load->view('front/postingan/list', $data);
	}

	public function postinganlisttahun($tahun)
	{
		$data['tahun'] = $this->postingan->getTahun();
		$data['postingan'] = $this->postingan->getPostinganTahun($tahun);
		$data['tahunaktif'] = $tahun;

		$this->load->view('front/postingan/list', $data);
	}

	public function detailpostingan($id_postingan)
	{
		$data['tahun'] = $this->postingan->getTahun();
		$data['postingan'] = $this->postingan->getByIdArray($id_postingan);
		$this->load->view('front/postingan/detailpostingan', $data);
	}

	public function peraturanlist()
	{
		$data['tahun'] = $this->postingan->getTahun();
		$data['peraturan'] = $this->peraturan->getAll();
		$this->load->view('front/peraturan/list', $data);
	}

	public function peraturandetail($id_peraturan)
	{
		$data['peraturan'] = $this->peraturan->getById($id_peraturan);
		$this->load->view('front/peraturan/peraturandetail', $data);
	}

	public function ppllist()
	{
		$data['tahun'] = $this->postingan->getTahun();
		$data['ppl'] = $this->ppl->terbaruArrayActive();

		$this->load->view('front/ppl/list', $data);
	}

	public function detailppl($id_ppl)
	{
		$data['tahun'] = $this->postingan->getTahun();
		$data['ppl'] = $this->ppl->getbyIdArray($id_ppl);

		$this->load->view('front/ppl/detailppl', $data);
	}

	public function daftarppl($id_ppl)
	{
		is_logged_in();
		$data['tahun'] = $this->postingan->getTahun();

		// alert gak keluar
		if ($this->ppluser->daftar($id_ppl)) {
			echo "<script>
				alert('Pendaftaran Berhasil!');				
				</script>";
			redirect('front/pplstatus');
		} else {
			echo "<script>
                alert('Pendaftaran gagal!);                
                </script>";
			redirect('front/pplstatus');
		}
	}

	public function pplstatus()
	{
		is_logged_in();
		$data['tahun'] = $this->postingan->getTahun();
		$data['pplstatus'] = $this->ppluser->pplstatus();

		$this->load->view('front/ppl/status', $data);
	}

	public function ppluserdetail($id_ppluser)
	{
		is_logged_in();
		$data['tahun'] = $this->postingan->getTahun();
		$data['ppluser'] = $this->ppluser->getByIdArray($id_ppluser);
		$id_ppl = $data['ppluser']['id_ppl'];
		$data['ppl'] = $this->ppl->getbyIdArray($id_ppl);
		$this->load->view('front/ppl/ppluserdetail', $data);
	}

	public function uploadbuktitransfer($id_ppluser = null)
	{
		if ($this->input->post()) {
			if ($this->ppluser->update($id_ppluser)) {
				echo "<script>
                alert('Bukti Transfer Berhasil Diupload!');
                window.location.href='pplstatus';
                </script>";
			} else {
				echo "<script>
                alert('Bukti Transfer Gagal Diupload);
                window.location.href='editanggota';
                </script>";
				redirect('front/ppluserdetail/' . $id_ppluser);
			}
		}
	}

	public function anggotalist()
	{
		$data['tahun'] = $this->postingan->getTahun();
		$data['anggota'] = $this->anggota->getAll();
		$this->load->view('front/anggota/anggotalist', $data);
	}

	public function profileanggota($nra = null)
	{
		$data['tahun'] = $this->postingan->getTahun();
		$data['anggota'] = $this->anggota->getByIdresult($nra);
		$this->load->view('front/anggota/profile', $data);
	}

	public function indexpoint()
	{
		if ($this->input->post()) {
			is_logged_in();
			$tahun_select = $this->input->post('tahun_select');
			$id_peserta = $this->session->userdata('id_login');
			$data['tahun'] = $this->postingan->getTahun();
			$data['point_terstruktur'] = $this->point_terstruktur->getByPesertaByTahun($id_peserta, $tahun_select);
			$data['tahun_point']  = $this->point_terstruktur->getTahun();
			$data['tahun_select'] = $tahun_select;


			$this->load->view('front/point/index', $data);
		} else {
			is_logged_in();
			$id_peserta = $this->session->userdata('id_login');
			$data['tahun'] = $this->postingan->getTahun();
			$data['point_terstruktur'] = $this->point_terstruktur->getByPeserta($id_peserta);
			$data['tahun_point']  = $this->point_terstruktur->getTahun();
			$data['tahun_select'] = "";
			$this->load->view('front/point/index', $data);
		}
	}

	public function uploadbuktihadir($id_ppluser = null)
	{
		if ($this->input->post()) {
			if ($this->ppluser->updatebuktihadir($id_ppluser)) {
				echo "<script>
                alert('Bukti Hadir Berhasil Diupload!');
                window.location.href='pplstatus';
                </script>";
			} else {
				echo "<script>
                alert('Bukti Hadir Gagal Diupload);
                window.location.href='editanggota';
                </script>";
				redirect('front/ppluserdetail/' . $id_ppluser);
			}
		}
	}
	
	public function pengurus()
	{
		$data["ketua"] = $this->pengurus->getbyJabatan(1);
		$data["wakil"] = $this->pengurus->getbyJabatan(2);
		$data["sekre"] = $this->pengurus->getbyJabatan(3);
		$data["benda"] = $this->pengurus->getbyJabatan(4);
		$data["humas"] = $this->pengurus->getbyJabatan(5);
		$this->load->view('front/anggota/pengurus',$data);
	}
	
	public function aboutus()
	{
		$data["about"] = $this->about->getAll();
		$this->load->view("front/about/index",$data);
	}
}
