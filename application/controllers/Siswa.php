<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Siswa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Siswa_model');
        $this->load->library('form_validation');
        if($this->session->userdata('status') == ''){
            redirect('login');
        }
    }

    public function index()
    {
        $kelas = urldecode($this->input->get('kelas', TRUE)); 
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'siswa/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'siswa/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'siswa/index.html';
            $config['first_url'] = base_url() . 'siswa/index.html';
        }

        $config['per_page'] = 20;
        $config['page_query_string'] = TRUE;
        
        if($kelas == ''){
            $config['total_rows'] = $this->Siswa_model->total_rows($q);
            $siswa = $this->Siswa_model->get_limit_data($config['per_page'], $start, $q);
        }else{
            $config['total_rows'] = $this->Siswa_model->total_rowskelas($kelas);
            $siswa = $this->Siswa_model->get_siswakelas($config['per_page'], $start, $kelas);
        }

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'siswa_data' => $siswa,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('template/header');
        $this->load->view('template/sidenavbar');
        $this->load->view('template/navbar');
        $this->load->view('siswa/ex_siswa_list', $data);
        $this->load->view('template/footer');
        
    }

    public function read($id) 
    {
        $row = $this->Siswa_model->get_by_id($id);
        if ($row) {
            $data = array(
                'action' => site_url('siswa/update_action'),
        		'id_siswa' => $row->id_siswa,
        		'nama_siswa' => $row->nama_siswa,
        		'jk' => $row->jk,
        		'kelas' => $row->kelas,
        		'aqidaht1' => $row->aqidaht1,
        		'aqidaht2' => $row->aqidaht2,
        		'aqidahu' => $row->aqidahu,
                'alqurant1' => $row->alqurant1,
                'alqurant2' => $row->alqurant2,
                'alquranu' => $row->alquranu,
                'alhaditst1' => $row->alhaditst1,
                'alhaditst2' => $row->alhaditst2,
                'alhaditsu' => $row->alhaditsu,
                'bat1' => $row->bat1,
                'bat2' => $row->bat2,
                'bau' => $row->bau,
                'akht1' => $row->akht1,
                'akht2' => $row->akht2,
                'akhu' => $row->akhu,
                'skit1' => $row->skit1,
                'skit2' => $row->skit2,
                'skiu' => $row->skiu,
                'fiqiht1' => $row->fiqiht1,
                'fiqiht2' => $row->fiqiht2,
                'fiqihu' => $row->fiqihu,
	    );
            $this->load->view('template/header');
            $this->load->view('template/sidenavbar');
            $this->load->view('template/navbar');
            $this->load->view('siswa/ex_siswa_read', $data);
            $this->load->view('template/footer');


        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('siswa'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('siswa/create_action'),
	    'id_siswa' => set_value('id_siswa'),
	    'nama_siswa' => set_value('nama_siswa'),
	    'jk' => set_value('jk'),
	    'kelas' => set_value('kelas'),
	    'indo' => set_value('indo'),
	    'mtk' => set_value('mtk'),
	    'inggris' => set_value('inggris'),
	);
        
        $this->load->view('template/header');
        $this->load->view('template/sidenavbar');
        $this->load->view('template/navbar');
        $this->load->view('siswa/ex_siswa_form', $data);
        $this->load->view('template/footer');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_siswa' => $this->input->post('nama_siswa',TRUE),
		'jk' => $this->input->post('jk',TRUE),
		'kelas' => $this->input->post('kelas',TRUE),
		'indo' => $this->input->post('indo',TRUE),
		'mtk' => $this->input->post('mtk',TRUE),
		'inggris' => $this->input->post('inggris',TRUE),
	    );

            $this->Siswa_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('siswa'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Siswa_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('siswa/update_action'),
		'id_siswa' => set_value('id_siswa', $row->id_siswa),
		'nama_siswa' => set_value('nama_siswa', $row->nama_siswa),
		'jk' => set_value('jk', $row->jk),
		'kelas' => set_value('kelas', $row->kelas),
		'indo' => set_value('indo', $row->indo),
		'mtk' => set_value('mtk', $row->mtk),
		'inggris' => set_value('inggris', $row->inggris),
	    );
            
        $this->load->view('template/header');
        $this->load->view('template/sidenavbar');
        $this->load->view('template/navbar');
        $this->load->view('siswa/ex_siswa_form', $data);
        $this->load->view('template/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('siswa'));
        }
    }
    
    public function update_action() 
    {
        // print_r($_POST);die();
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_siswa', TRUE));
        } else {
            $data = array(
        		'nama_siswa' => $this->input->post('nama_siswa',TRUE),
        		'jk' => $this->input->post('jk',TRUE),
        		'kelas' => $this->input->post('kelas',TRUE),
        		'aqidaht1' => $this->input->post('aqidaht1',TRUE),
                'aqidaht2' => $this->input->post('aqidaht2',TRUE),
                'aqidahu' => $this->input->post('aqidahu',TRUE),
                'alqurant1' => $this->input->post('alqurant1',TRUE),
                'alqurant2' => $this->input->post('alqurant2',TRUE),
                'alquranu' => $this->input->post('alquranu',TRUE),
                'alhaditst1' => $this->input->post('alhaditst1',TRUE),
                'alhaditst2' => $this->input->post('alhaditst2',TRUE),
                'alhaditsu' => $this->input->post('alhaditsu',TRUE),
                'bat1' => $this->input->post('bat1',TRUE),
                'bat2' => $this->input->post('bat2',TRUE),
                'bau' => $this->input->post('bau',TRUE),
                'akht1' => $this->input->post('akht1',TRUE),
                'akht2' => $this->input->post('akht2',TRUE),
                'akhu' => $this->input->post('akhu',TRUE),
                'skit1' => $this->input->post('skit1',TRUE),
                'skit2' => $this->input->post('skit2',TRUE),
                'skiu' => $this->input->post('skiu',TRUE),
                'fiqiht1' => $this->input->post('fiqiht1',TRUE),
                'fiqiht2' => $this->input->post('fiqiht2',TRUE),
                'fiqihu' => $this->input->post('fiqihu',TRUE)
	       );

            $this->Siswa_model->update($this->input->post('id_siswa', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('siswa/index?kelas='.$data['kelas']));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Siswa_model->get_by_id($id);

        if ($row) {
            $this->Siswa_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('siswa'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('siswa'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_siswa', 'nama siswa', 'trim|required');
	$this->form_validation->set_rules('jk', 'jk', 'trim|required');
	$this->form_validation->set_rules('kelas', 'kelas', 'trim|required');
	

	$this->form_validation->set_rules('id_siswa', 'id_siswa', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "ex_siswa.xls";
        $judul = "ex_siswa";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Siswa");
	xlsWriteLabel($tablehead, $kolomhead++, "Jk");
	xlsWriteLabel($tablehead, $kolomhead++, "Kelas");
	xlsWriteLabel($tablehead, $kolomhead++, "Indo");
	xlsWriteLabel($tablehead, $kolomhead++, "Mtk");
	xlsWriteLabel($tablehead, $kolomhead++, "Inggris");

	foreach ($this->Siswa_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_siswa);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jk);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kelas);
	    xlsWriteLabel($tablebody, $kolombody++, $data->indo);
	    xlsWriteLabel($tablebody, $kolombody++, $data->mtk);
	    xlsWriteLabel($tablebody, $kolombody++, $data->inggris);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Siswa.php */
/* Location: ./application/controllers/Siswa.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-10-16 11:20:58 */
/* http://harviacode.com */