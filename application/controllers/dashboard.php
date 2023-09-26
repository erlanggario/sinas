<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard extends CI_Controller {


	public function __construct() {
		parent::__construct();
		
		$this->load->library('form_validation');
		$this->load->model('select');  
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
	{
		$this->load->view('templates/header');
		$this->load->view('templates/menu');
		$this->load->view('dashboard');
		$this->load->view('templates/footer');
        $this->load->helper('url');
	}
	public function dataTransaksi(){
		$data['transaksi']=$this->select->selectdatatransaksi();
		$this->load->view('templates/header');
		$this->load->view('templates/menu');
		$this->load->view('home/dataTransaksi',$data);
		$this->load->view('templates/footer');
	}
	public function dataAcc(){
        $data['acc']=$this->select->selectdataacc();
		$this->load->view('templates/header');
		$this->load->view('templates/menu');
		$this->load->view('home/dataAcc',$data);
		$this->load->view('templates/footer');

	}
	public function editAcc($CIF){
		$querydetaildata = $this->select->getDataRekening($CIF);
		$data = array('row' => $querydetaildata);
		$this->load->view('templates/header');
		$this->load->view('templates/menu');
		$this->load->view('home/editAcc',$data);
		$this->load->view('templates/footer');
	} 
	public function updateDatarekening(){
		$nama = $this->input->post('nama_acc');
		$no_rekening = $this->input->post('nomor_rekening');
		$data = array(
			'nama_acc' => $nama,
			'nomor_rekening' => $no_rekening
		);

			// echo "<pre>";
			// print_r($data);
			// echo "</pre>";
	
		$this->select->updateDataRekening($no_rekening, $data);
		redirect('dashboard/dataAcc');
	}
    public function dataDebitur()
    {

        //load the method of model  
        $data['h']=$this->select->selectdatadebitur();
		// $recordData=$this->select->selectdatadebitur();
		$data['cif_number'] = str_pad(mt_rand(8,99999999),8,'0',STR_PAD_LEFT);
		// $dataArray = array('customer' => $recordData);  
        //return the data in view 
		$this->load->view('templates/header'); 
		$this->load->view('templates/menu');
        $this->load->view('home/dataDebitur', $data);  
		$this->load->view('templates/footer');
        
    }
    public function addDatadebitur(){
        $this->load->helper('string');
        $this->load->helper('url');
        $nama = $this->input->post('nama');
        $nik = $this->input->post('nik');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $no = $this->input->post('no_telp');
        $jk = $this->input->post('jenis_kelamin');
        $alamat = $this->input->post('alamat');
        $no_cif = $this->input->post('no_cif');
     

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
		$this->session->set_flashdata('message', '<div class="alert alert-success mb-4">data berhasil disimpan</div>');
        redirect('dashboard/dataDebitur');
	    }
		public function editData($CIF){
			$querydetaildata = $this->select->getDatadebiturDetail($CIF);
			$data = array('row' => $querydetaildata);
			$this->load->view('templates/header');
			$this->load->view('templates/menu');
			$this->load->view('home/editData',$data);
			$this->load->view('templates/footer');
			
		}
		public function updateDatadebitur(){
			$nama = $this->input->post('nama');
			$nik = $this->input->post('nik');
			$tgl_lahir = $this->input->post('tgl_lahir');
			$no = $this->input->post('no_telp');
			$jk = $this->input->post('jenis_kelamin');
			$alamat = $this->input->post('alamat');
			$no_cif = $this->input->post('no_cif');
		 
	
			$data = array(
				'nama_debitur' => $nama,
				'NIK' => $nik,
				'tgl_lahir' => $tgl_lahir,
				'nomor_telepon' => $no,
				'jenis_kelamin' => $jk,
				'alamat_lengkap' => $alamat,
				'nomor_cif' => $no_cif
			);
			$this->select->updateDataDebitur($no_cif, $data);
			redirect('dashboard/dataDebitur');

		}

    	public function hapusData($CIF)
    {
		$this->select->hapusDataDebitur($CIF);

        echo '<script language="javascript">';
        echo 'alert ("DATA TELAH BERHASIL DI HAPUS!!!")';
        echo '</script>';
        echo "<script>window.location.href = '" . site_url('dashboard/dataDebitur') . "';</script>";
    }
	public function pembukaanRekening($CIF){
		$querydetaildata = $this->select->getDatadebiturDetail($CIF);
		$data = array('row' => $querydetaildata);
		$data['nomor_rekening'] = str_pad(mt_rand(8,99999999),8,'0',STR_PAD_LEFT);  		

		$this->load->view('templates/header');
		$this->load->view('templates/menu');
		$this->load->view('home/pembukaanRekening',$data);
		$this->load->view('templates/footer');


		
	}
	public function addpembukaanRekening(){
		$no_rekening = $this->input->post('nomor_rekening');
		$nama = $this->input->post('name');
		$tgl_pembukaan = $this->input->post('tgl_pembukaan');
		$no_cif = $this->input->post('nomor_cif');



		$data = array(
			'nomor_rekening' => $no_rekening,
			'nama_acc' => $nama,
			'tgl_pembukaan' => $tgl_pembukaan,
			'nomor_cif' => $no_cif,
		);
		$this->select->addpembukaanRekening($no_cif, $data);
		redirect('dashboard/dataAcc');

	}
	public function hapusRekening($CIF)
    {
		$this->select->hapusRekening($CIF);

        echo '<script language="javascript">';
        echo 'alert ("DATA TELAH BERHASIL DI HAPUS!!!")';
        echo '</script>';
        echo "<script>window.location.href = '" . site_url('dashboard/dataAcc') . "';</script>";
    }
	public function setorTunai($CIF){
		$querydetaildata = $this->select->getDatadebiturRekening($CIF);
		$data = array('row' => $querydetaildata);
		$this->load->view('templates/header');
		$this->load->view('templates/menu');
		$this->load->view('home/setorTunai',$data);
		$this->load->view('templates/footer');
	}
	public function addsetortunai(){
		$no_rekening = $this->input->post('nomor_rekening');
		$jumlah = $this->input->post('jumlah');

	
		$datatosaldo = array(
			'saldo_terakhir' => $jumlah
		);
		$datatotransaksi = array(
			'nomor_rekening' => $no_rekening,
			'nominal' => $jumlah,
			'jenis_transaksi' => 'Setoran Tunai',
			'status' => 'D'
		);
		$this->select->setorTunai($no_rekening, $datatosaldo);
		$this->select->adddatatransaksi($no_rekening, $datatotransaksi);
		redirect('dashboard/dataAcc');

} 
}  
