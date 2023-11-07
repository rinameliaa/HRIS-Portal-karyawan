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

    public function tambah($id, $user_id, $karyawan_id, $nama, $jenis_pengajuan, $tanggal_start, $tanggal_end, $jenis_izin_id, $jenis_cuti_id, $jenis_sakit_id, $keterangan, $karyawan_id_approval1, $karyawan_id_approval2, $approval1_date, $approval2_date, $status, $create) {
        $data = array(
            'id' => $id,
            'user_id' => $user_id,
            'karyawan_id' => $karyawan_id,
            'nama' => $nama,
            'jenis_pengajuan' => $jenis_pengajuan,
            'tanggal_start' => $tanggal_start,
            'tanggal_end' => $tanggal_end,
            'jenis_izin_id' => $jenis_izin_id,
            'jenis_cuti_id' => $jenis_cuti_id,
            'jenis_sakit_id' => $jenis_sakit_id,
            'keterangan' => $keterangan,
            'karyawan_id_approval1' => $karyawan_id_approval1,
            'karyawan_id_approval2' => $karyawan_id_approval2,
            'approval1_date' => $approval1_date,
            'approval2_date' => $approval2_date,
            'status' => $status,
            'create' => $create
        );
    
        $this->db->set($data);
        $this->db->insert('pengajuan_karyawan');
    
        if ($this->db->affected_rows() > 0) {
            return "1";
        } else {
            return "0";
        }
    }       
    
    public function jmlIzin($z) {
        $sql = "SELECT COUNT(*) AS jumlah_izin FROM pengajuan_karyawan WHERE jenis_pengajuan = 'Izin' AND karyawan_id = ?";
        $data = $this->db->query($sql, array($z));
        if ($data) {
            return $data->row()->jumlah_izin;
        } else {
            return 0;
        }
    }

    public function jmlSakit($z) {
        $sql = "SELECT COUNT(*) AS jumlah_sakit FROM pengajuan_karyawan WHERE jenis_pengajuan = 'Sakit' AND karyawan_id = ?";
        $data = $this->db->query($sql, array($z));
        if ($data) {
            return $data->row()->jumlah_sakit;
        } else {
            return 0;
        }
    }

    public function jmlCutiTahunan($z) {
        $sql = "SELECT COUNT(*) AS jumlah_cuti_tahunan FROM pengajuan_karyawan WHERE jenis_pengajuan = 'Cuti Tahunan' AND karyawan_id = ?";
        $data = $this->db->query($sql, array($z));
        if ($data) {
            return $data->row()->jumlah_cuti_tahunan;
        } else {
            return 0;
        }
    }

    public function jmlCutiKhusus($z) {
        $sql = "SELECT COUNT(*) AS jumlah_cuti_khusus FROM pengajuan_karyawan WHERE jenis_pengajuan = 'Cuti Khusus' AND karyawan_id = ?";
        $data = $this->db->query($sql, array($z));
        if ($data) {
            return $data->row()->jumlah_cuti_khusus;
        } else {
            return 0;
        }
    }

    public function jmlApproval1($z) {
        $sql = "SELECT COUNT(*) AS jumlah_approval1 FROM pengajuan_karyawan WHERE karyawan_id_approval1 = ? AND approval1_date IS NULL";
        $data = $this->db->query($sql, array($z));
        if ($data) {
            return $data->row()->jumlah_approval1;
        } else {
            return 0;
        }
    }       

    public function jmlApproval2($z) {
        $sql = "SELECT COUNT(*) AS jumlah_approval2 FROM pengajuan_karyawan WHERE karyawan_id_approval2 = ? AND approval2_date IS NULL";
        $data = $this->db->query($sql, array($z));
        if ($data) {
            return $data->row()->jumlah_approval2;
        } else {
            return 0;
        }
    } 
    
    public function tampilapproval1($z){
        $sql = "SELECT * FROM pengajuan_karyawan WHERE karyawan_id_approval1 = ? AND approval1_date IS NULL";
        $data = $this->db->query($sql, array($z));
        if ($data) {
            return $data->result();
        } else {
            return 0;
        }
    }

    public function tampilapproval2($z){
        $sql = "SELECT * FROM pengajuan_karyawan WHERE karyawan_id_approval2 = ? AND approval2_date IS NULL";
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
            'approval2_date' => date('Y-m-d H:i:s'),
            'status' => "Disetujui"
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
