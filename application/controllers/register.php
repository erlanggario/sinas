<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    public function __construct() {
		parent::__construct();

    }
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{   $this->load->view('templates/header');
		$this->load->view('register');
        $this->load->view('templates/footer');
        $this->load->helper('url');
        // var_dump($data);
	}

    public function addData() {
        
        $this->load->helper('string');
        $this->load->helper('url');
        $nama = $this->input->post('nama');
        $nik = $this->input->post('nik');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $no = $this->input->post('no_telp');
        $jk = $this->input->post('jenis_kelamin');
        $alamat = $this->input->post('alamat');
        $no_cif = $this->input->post('no_cif');
     
        var_dump($random_number);

        $data = array(
            'nama_debitur' => $nama,
            'NIK' => $nik,
            'tgl_lahir' => $tgl_lahir,
            'nomor_telepon' => $no,
            'jenis_kelamin' => $jk,
            'alamat_lengkap' => $alamat,
            'nomor_cif' => $no_cif
        );
        $this->db->insert('customer', $data);
        redirect('dashboard/dataDebitur');
    }
    public function daftarCS(){
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $no = $this->input->post('no_telp');

        $data = array(
            'nama' => $nama,
            'username' => $username,
            'password' => $password,
            'nomor_telepon' => $no
        );

        $this->db->insert('users', $data);
        redirect('login');
    }
}
