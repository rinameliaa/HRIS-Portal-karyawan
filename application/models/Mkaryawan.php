<?php
defined('BASEPATH') OR exit ('No direct script access allowed');
class Mkaryawan extends CI_Model {
        public function data(){
                $sql = "SELECT a.*, c.nama_departemen, d.nama_pendidikan, b.akses_tambah, b.akses_update, b.akses_hapus FROM karyawan AS a JOIN level_grade as b ON a.id_level_grade = b.id_level_grade JOIN departemen as c ON a.id_departemen = c.id_departemen JOIN pendidikan as d ON a.id_pendidikan = d.id_pendidikan ORDER BY a.nama";
                $data = $this->db->query($sql);
                if($data){
                        return $data->result();
                }else{
                        return 0;
                }
	}
        public function pendidikan(){
                $sql = "SELECT * FROM pendidikan ORDER BY id_pendidikan";
                $data = $this->db->query($sql);
                if($data){
                        return $data->result();
                }else{
                        return 0;
                }
	}
        public function departemen(){
                $sql = "SELECT * FROM departemen ORDER BY id_departemen";
                $data = $this->db->query($sql);
                if($data){
                        return $data->result();
                }else{
                        return 0;
                }
	}
        public function level(){
                $sql = "SELECT * FROM level_grade ORDER BY id_level_grade";
                $data = $this->db->query($sql);
                if($data){
                        return $data->result();
                }else{
                        return 0;
                }
	}
	public function filter($id){
                $sql = "SELECT * FROM karyawan WHERE id_karyawan= '$id'";
                $data = $this->db->query($sql);
                if($data){
                        return $data->result();
                }else{
                        return 0;
                }
		
	}
        public function tambah($id, $nik, $nama, $tempat, $tanggal, $pendidikan, $departemen, $level, $status, $username, $password){
                $sql = "INSERT INTO karyawan VALUE('$id', '$nik', '$nama', '$tempat', '$tanggal', '$pendidikan', '$departemen', '$level', '$status', '$username', '$password')";
                $data = $this->db->query($sql);
                if($data){
                        return "1";
                }else{
                        return "0";
                }
        }
	public function update($id, $nik, $nama, $tempat, $tanggal, $pendidikan, $departemen, $level, $status){
                $sql = "UPDATE karyawan SET nik='$nik', nama='$nama', tempat_lahir='$tempat', tanggal_lahir='$tanggal', id_pendidikan= '$pendidikan', id_departemen='$departemen', id_level_grade='$level', status='$status' WHERE id_karyawan='$id'";
                $data = $this->db->query($sql);
                if($data){
                        return "1";
                }else{
                        return "0";
                }
        }
        public function hapus($id){
                $sql = "DELETE FROM karyawan WHERE id_karyawan='$id'";
                $data = $this->db->query($sql);
                if($data){
                        return "1";
                }else{
                        return "0";
                }
        }
}
