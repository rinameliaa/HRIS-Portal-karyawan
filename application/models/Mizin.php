<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mizin extends CI_Model {
    public function data($z) {
        $sql = "SELECT * FROM pengajuan_karyawan WHERE karyawan_id = ?";
        $data = $this->db->query($sql, array($z));
        if ($data) {
            return $data->result();
        } else {
            return 0;
        }
    }

    public function tambah($id, $karyawan_id, $nama, $jenis_pengajuan, $tanggal_start, $tanggal_end, $jenis_izin_id, $jenis_cuti_id, $jenis_sakit_id, $keterangan, $karyawan_id_approval1, $karyawan_id_approval2,$approval1_date, $approval2_date, $status, $create){
        $sql = "INSERT INTO pengajuan_karyawan VALUE('$id', '$karyawan_id', '$nama', '$jenis_pengajuan', '$tanggal_start', '$tanggal_end', '$jenis_izin_id', '$jenis_cuti_id', '$jenis_sakit_id', '$keterangan', '$karyawan_id_approval1', '$karyawan_id_approval2','$approval1_date', '$approval2_date', '$status', '$create')";
        $data = $this->db->query($sql);
        if($data){
                return "1";
        }else{
                return "0";
        }
    }     
    
    public function jmlIzin($z) {
        $sql = "SELECT karyawan_id, COUNT(*) AS jumlah_izin FROM pengajuan_karyawan WHERE jenis_pengajuan = 'Izin' AND karyawan_id = ? GROUP BY karyawan_id";
        $data = $this->db->query($sql, array($z));
        if ($data) {
            return $data->row()->jumlah_izin;
        } else {
            return 0;
        }
    }

    public function jmlSakit($z) {
        $sql = "SELECT karyawan_id, COUNT(*) AS jumlah_sakit FROM pengajuan_karyawan WHERE jenis_pengajuan = 'Sakit' AND karyawan_id = ? GROUP BY karyawan_id";
        $data = $this->db->query($sql, array($z));
        if ($data) {
            return $data->row()->jumlah_sakit;
        } else {
            return 0;
        }
    }

    public function jmlCutiTahunan($z) {
        $sql = "SELECT karyawan_id, COUNT(*) AS jumlah_cuti_tahunan FROM pengajuan_karyawan WHERE jenis_pengajuan = 'Cuti Tahunan' AND karyawan_id = ? GROUP BY karyawan_id";
        $data = $this->db->query($sql, array($z));
        if ($data) {
            return $data->row()->jumlah_cuti_tahunan;
        } else {
            return 0;
        }
    }

    public function jmlCutiKhusus($z) {
        $sql = "SELECT karyawan_id, COUNT(*) AS jumlah_cuti_khusus FROM pengajuan_karyawan WHERE jenis_pengajuan = 'Cuti Khusus' AND karyawan_id = ? GROUP BY karyawan_id";
        $data = $this->db->query($sql, array($z));
        if ($data) {
            return $data->row()->jumlah_cuti_khusus;
        } else {
            return 0;
        }
    }

    public function jmlApproval1($z) {
        $sql = "SELECT COUNT(*) AS jumlah_approval1 FROM pengajuan_karyawan WHERE karyawan_id_approval1 = ?  ";
        $data = $this->db->query($sql, array($z));
        if ($data) {
            return $data->row()->jumlah_approval1;
        } else {
            return 0;
        }
    }       

    public function jmlApproval2($z) {
        $sql = "SELECT COUNT(*) AS jumlah_approval2 FROM pengajuan_karyawan WHERE karyawan_id_approval2 = ? ";
        $data = $this->db->query($sql, array($z));
        if ($data) {
            return $data->row()->jumlah_approval2;
        } else {
            return 0;
        }
    } 
    
    public function tampilapproval1($z){
        $sql = "SELECT * FROM pengajuan_karyawan WHERE karyawan_id_approval1 = ? ";
        $data = $this->db->query($sql, array($z));
        if ($data) {
            return $data->result();
        } else {
            return 0;
        }
    }

    public function tampilapproval2($z){
        $sql = "SELECT * FROM pengajuan_karyawan WHERE karyawan_id_approval2 = ?";
        $data = $this->db->query($sql, array($z));
        if ($data) {
            return $data->result();
        } else {
            return 0;
        }
    }

    public function update_approval1($id){
        $data = array(
            'approval1_date' => date('Y-m-d H:i:s')
        );
        $this->db->where('id', $id);
        $sql = $this->db->update('pengajuan_karyawan', $data);

        if($sql){
                return "1";
        }else{
                return "0";
        }
    }

    public function update_approval2($id){
        $data = array(
            'approval2_date' => date('Y-m-d H:i:s')
        );
        $this->db->where('id', $id);
        $sql = $this->db->update('pengajuan_karyawan', $data);

        if($sql){
                return "1";
        }else{
                return "0";
        }
    }
}
