<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Duid_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_siswa(){
    	$this->db->select('id_siswa, kelas, nama_siswa');
    	$this->db->order_by('id_siswa', 'ASC');
        return $this->db->get('ex_siswa')->result();
    }
    function get_kelas(){
    	$this->db->select('kelas');
    	$this->db->group_by('kelas', 'ASC');
        return $this->db->get('ex_siswa')->result();
    }

    function get_duid($id_siswa){
    	$this->db->like('id_siswa', $id_siswa);
        $this->db->from('duid');
        return $this->db->count_all_results();
    }

    function get_dataduid($id_siswa){
    	$this->db->like('id_siswa', $id_siswa);
        $this->db->where('status', 0);
        $this->db->order_by('tanggalbayar', 'ASC');
        return $this->db->get('duid')->result();
    }

    function get_nama($id_siswa){
    	// $this->db->select('nama_siswa');
    	$query = $this->db->get_where('ex_siswa', array('id_siswa' => $id_siswa));
        return $query->result();
    }

    function insert($data)
    {
        $this->db->insert('duid', $data);
    }

    function gantistatuspembayaran($id){
        $this->db->set('status', '1');
        $this->db->where('id_duid', $id);
        $this->db->update('duid');
    }
}