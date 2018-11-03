<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class DUid extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Duid_model');
        if($this->session->userdata('status') == ''){
            redirect('login');
        }
    }

    function index(){ 
    	
    	if(!empty($_POST['siswa'])){
            $data['id_siswa'] = $_POST['siswa'];
		}else{
            $data['id_siswa'] = $this->uri->segment(3);
		}
    	
            $data['cek'] = $this->Duid_model->get_duid($data['id_siswa']);
            $data['dataduid'] = $this->Duid_model->get_dataduid($data['id_siswa']);
            $datuk = $this->Duid_model->get_nama($data['id_siswa']);
            foreach($datuk as $row){
                $data['nama'] = $row->nama_siswa;
                $data['keles'] = $row->kelas;
            }

    	$data['siswa'] = $this->Duid_model->get_siswa();
    	$data['kelas'] = $this->Duid_model->get_kelas();
    	
    	$this->load->view('template/header');
        $this->load->view('template/sidenavbar');
        $this->load->view('template/navbar');
        $this->load->view('duid/duid_form', $data);
        $this->load->view('template/footer');
    	
    }

    function prosespembayaran(){
    	if($_POST <> ''){
    		$data = array(
		    	'id_siswa' => $_POST['id_siswa'],
		    	'tanggalbayar' => date('Y/m/d', strtotime($_POST['tanggalbayar'])),
		    	'pembayaranbulan' => $_POST['pembayaranbulan'], 
		    	'besaran' => $_POST['besaran'],
	    	);	
	    	$input = $this->Duid_model->insert($data);	
	    	redirect("duid/index/".$data['id_siswa']);
	    	
    	}else{
    		redirect('duid');
    	}
    	
    }

    function hapuspembayaran(){
        $data=$this->uri->segment(3);
        $id = explode("-", $data);
        $id_duid = $id[0];
        $id_siswa = $id[1];
        // $this->Duid_model->gantistatuspembayaran($id_duid);
        // redirect("duid/index/".$id_siswa);
    }
}