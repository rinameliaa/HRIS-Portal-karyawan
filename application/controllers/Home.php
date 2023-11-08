<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller {
    public $karyawan_id;
    public $firstname;
    public $lastname;
    public $fullname;
    public $approval;
    public $atasan;
    public $senior;
    
    public function __construct() {
        parent::__construct();
        $this->load->library('curl');
        if ($this->session->userdata("username")) {
            $userData = $this->session->userdata("userData");
            if ($userData) {
                $userData = json_decode($userData);
                if ($userData) {
                    $this->user_id = $userData->user_id;
                    $this->karyawan_id = $userData->employee_id;
                    $this->firstname = $userData->first_name;
                    $this->lastname = $userData->last_name;
                    $this->fullname = $userData->first_name . ' ' . $userData->last_name;
                    $this->approval = $userData->approval_access;
                    $this->atasan = $userData->atasan_langsung_id;
                    $this->senior = $userData->superior_atasan_langsung_id;
                } else {
                    redirect(base_url('Login'));
                }
            } else {
                redirect(base_url('Login'));
            }
        } else {
            redirect(base_url('Login'));
        }
    }
    
    
	public function index(){
        $xyz["konten"] = "beranda";
        $z["nama"] = $this->fullname ;
        $z["approval"] = $this->approval ;
        $this->load->view("beranda", $z, true);
        $this->load->view("home", $xyz);
	}    
    public function login(){
        $xyz["konten"] = "masuk";
        $this->load->view("masuk", $xyz);
	}
    public function izin(){
        $xyz["konten"] = "izin";
        $z["nama"] = $this->fullname ;
        $z["karyawan_id"] = $this->karyawan_id;
        $z["atasan"] = $this->atasan;
        $z["senior"] = $this->senior;
        $this->load->view("izin", $z, true);
        $this->load->view("home", $xyz);
    }
    public function sakit(){
        $xyz["konten"] = "sakit";
        $z["nama"] = $this->fullname ;
        $z["karyawan_id"] = $this->karyawan_id;
        $z["atasan"] = $this->atasan;
        $z["senior"] = $this->senior;
        $this->load->view("sakit", $z, true);
        $this->load->view("home", $xyz);
    }
    public function cuti_tahunan(){
        $xyz["konten"] = "cuti_tahunan";
        $z["nama"] = $this->fullname ;
        $z["karyawan_id"] = $this->karyawan_id;
        $z["atasan"] = $this->atasan;
        $z["senior"] = $this->senior;
        $this->load->view("cuti_tahunan", $z, true);
        $this->load->view("home", $xyz);
    }
    public function cuti_khusus(){
        $xyz["konten"] = "cuti_khusus";
        $z["nama"] = $this->fullname ;
        $z["karyawan_id"] = $this->karyawan_id;
        $z["atasan"] = $this->atasan;
        $z["senior"] = $this->senior;
        $this->load->view("cuti_khusus", $z, true);
        $this->load->view("home", $xyz);
    }
    public function jumlahIzin(){
        $z = $this->karyawan_id;
        $jumlah_izin = $this->Mizin->jmlIzin($z);
        echo $jumlah_izin;
    }
    public function jumlahSakit(){
        $z = $this->karyawan_id;
        $jumlah_sakit = $this->Mizin->jmlSakit($z);
        echo $jumlah_sakit;
    }
    public function jumlahCutiTahunan(){
        $z = $this->karyawan_id;
        $jumlah_cuti_tahunan = $this->Mizin->jmlCutiTahunan($z);
        echo $jumlah_cuti_tahunan;
    }
    public function jumlahCutiKhusus(){
        $z = $this->karyawan_id;
        $jumlah_cuti_khusus = $this->Mizin->jmlCutiKhusus($z);
        echo $jumlah_cuti_khusus;
    }
    public function approval(){
        $xyz["konten"] = "approval";
        $z["nama"] = $this->fullname ;
        $this->load->view("approval", $z, true);
        $this->load->view("home", $xyz);
    }
    public function jumlahApproval1(){
        $z = $this->user_id;
        $jumlah_approval1 = $this->Mizin->jmlApproval1($z);
        echo $jumlah_approval1;
    }

    public function jumlahApproval2(){
        $z = $this->user_id;
        $jumlah_approval2 = $this->Mizin->jmlApproval2($z);
        echo $jumlah_approval2;
    }

    public function approval1_tampil(){
        $dtJSON = '{"data": [xxx]}'; 
        $dtisi = "";
        $z = $this->user_id;
        $dt = $this->Mizin->tampilapproval1($z);
        foreach ($dt as $k){
            $id = $k->id;
            $karyawan_id = $k->karyawan_id;
            $nama = $k->nama;
            $jenis_pengajuan = $k->jenis_pengajuan;
            $tanggal_start = $k->tanggal_start;
            $tanggal_end = $k->tanggal_end;
            $keterangan = $k->keterangan;
            $status = $k->status;
            $action = "<button type='button' class='btn btn-danger' onclick='approval1($id)'>Approval 1</button>";
            $ttl = $tanggal_start . " s/d " . $tanggal_end;
            $dtisi .= '["'.$karyawan_id.'","'.$nama.'","'.$jenis_pengajuan.'","'.$ttl.'","'.$keterangan.'","'.$status.'","'.$action.'"],';
        }
        $dtisifix = rtrim($dtisi, ",");
        $data = str_replace("xxx", $dtisifix, $dtJSON);
        echo $data;
    }
    public function approval2_tampil(){
        $dtJSON = '{"data": [xxx]}'; 
        $dtisi = "";
        $z = $this->user_id;
        $dt = $this->Mizin->tampilapproval2($z);
        foreach ($dt as $k){
            $id = $k->id;
            $karyawan_id = $k->karyawan_id;
            $nama = $k->nama;
            $jenis_pengajuan = $k->jenis_pengajuan;
            $tanggal_start = $k->tanggal_start;
            $tanggal_end = $k->tanggal_end;
            $keterangan = $k->keterangan;
            $status = $k->status;
            $action = "<button type='button' class='btn btn-danger' onclick='approval2($id)'>Approval 2</button>";
            $ttl = $tanggal_start . " s/d " . $tanggal_end;
            $dtisi .= '["'.$karyawan_id.'","'.$nama.'","'.$jenis_pengajuan.'","'.$ttl.'","'.$keterangan.'","'.$status.'","'.$action.'"],';
        }
        $dtisifix = rtrim($dtisi, ",");
        $data = str_replace("xxx", $dtisifix, $dtJSON);
        echo $data;
    }
    public function pengajuan_approval1(){
        $id = $this->input->post('id');
        $hasil = $this->Mizin->update_approval1($id);
    
        if ($hasil == "1") {    
            echo base64_encode("1|Tambah Approval Date Berhasil,");
        } else {
            echo base64_encode("0|Tambah Approval Date Gagal, Silahkan Cek Datanya");
        }
    }
    public function pengajuan_approval2(){
        $id = $this->input->post('id');
        $hasil = $this->Mizin->update_approval2($id);
        $post = $this->postPengajuanKaryawanKeHR($id);
        // var_dump($post);return;
    
        if ($hasil == "1") {    
            echo base64_encode("1|Tambah Approval Date Berhasil,");
        } else {
            echo base64_encode("0|Tambah Approval Date Gagal, Silahkan Cek Datanya");
        }
    }
    public function kehadiran(){
        $xyz["konten"] = "kehadiran";
        $z["nama"] = $this->fullname ;
        $this->load->view("kehadiran", $z, true);
        $this->load->view("home", $xyz);
    }

    public function pengajuan_tampil(){
        $dtJSON = '{"data": [xxx]}'; 
        $dtisi = "";
        $z = $this->karyawan_id;
        $dt = $this->Mizin->data($z);
        foreach ($dt as $k) {
            $karyawan_id = $k->karyawan_id;
            $nama = $k->nama;
            $jenis_pengajuan = $k->jenis_pengajuan;
            $tanggal_start = $k->tanggal_start;
            $tanggal_end = $k->tanggal_end;
            $keterangan = $k->keterangan;
            $status = $k->status; 
        
            $ttl = $tanggal_start . " s/d " . $tanggal_end;
            $dtisi .= '["' . $karyawan_id . '","' . $nama . '","' . $jenis_pengajuan . '","' . $ttl . '","' . $keterangan . '",';
        
            if ($status === "Proses") {
                $dtisi .= '"<button type=\"button\" class=\"btn btn-danger\">Proses</button>"],';
            } elseif ($status === "Disetujui") {
                $dtisi .= '"<button type=\"button\" class=\"btn btn-success\">Disetujui</button>"],';
            } else {
                $dtisi .= '"Status tidak valid"],';
            }
        }
        $dtisifix = rtrim($dtisi, ",");
        $data = str_replace("xxx", $dtisifix, $dtJSON);
        echo $data;
    }
    public function pengajuan_tambah(){
        $id = strtotime(date("Y-m-d H:i:s"));
        $user_id = trim(str_replace("'", "''", $this->user_id));
        $karyawan_id = trim(str_replace("'", "''", $this->karyawan_id));
        $nama = trim(str_replace("'", "''", $this->fullname));
        $jenis_pengajuan = trim(str_replace("'", "''", $this->input->post("jenis_pengajuan")));
        $tanggal_start = trim(str_replace("'", "''", $this->input->post("tanggal_start")));
        $tanggal_end = date("Y/m/d", strtotime(str_replace('/', '-', $this->input->post("tanggal_end"))));
        $jenis_izin_id = trim(str_replace("'", "''", $this->input->post("jenis_izin_id")));
        $jenis_cuti_id = trim(str_replace("'", "''", $this->input->post("jenis_cuti_id")));
        $jenis_sakit_id = trim(str_replace("'", "''", $this->input->post("jenis_sakit_id")));
        $keterangan = trim(str_replace("'", "''", $this->input->post("keterangan")));
        $karyawan_id_approval1 = trim(str_replace("'", "''", $this->atasan));
        // Periksa jika userdata hanya memiliki approval1
        if (isset($this->senior) && !empty($this->senior)) {
            $karyawan_id_approval2 = trim(str_replace("'", "''", $this->senior));
        } else {
            $karyawan_id_approval2 = NULL;
        }
        $approval1_date = NULL;
        $approval2_date = NULL;
        $create = date('Y-m-d H:i:s');
        $status = trim(str_replace("'", "''", $this->input->post("status")));
        $hasil = $this->Mizin->tambah($id, $user_id, $karyawan_id, $nama, $jenis_pengajuan, $tanggal_start, $tanggal_end, $jenis_izin_id, $jenis_cuti_id, $jenis_sakit_id, $keterangan, $karyawan_id_approval1, $karyawan_id_approval2, $approval1_date, $approval2_date, $status, $create);
    
        if ($hasil == "1") {    
            echo base64_encode("1|Tambah Permohonan Berhasil,");
        } else {
            echo base64_encode("0|Tambah Permohonan Gagal, Silahkan Cek Datanya");
        }
    }

    
    
    // public function karyawan(){
    //     $xyz["konten"] = "karyawan";
    //     $xyz["dtpendidikan"] = $this->Mkaryawan->pendidikan();
    //     $xyz["dtdepartemen"] = $this->Mkaryawan->departemen();
    //     $xyz["dtlevel"] = $this->Mkaryawan->level();
    //     $xyz["hakakses"] = [$this->haktambah, $this->hakupdate, $this->hakhapus];
    //     $this->load->view("home", $xyz);
    // }
    // public function karyawan_tampil(){
    //     $dtJSON = '{"data": [xxx]}';
    //     $dtisi = "";
    //     $dt = $this->Mkaryawan->data();
    //     foreach ($dt as $k){
    //         $id = $k->id_karyawan;
    //         $nik = $k->nik;
    //         $nama = $k->nama;
    //         $tempat = $k->tempat_lahir;
    //         $tanggal = $k->tanggal_lahir;
    //         $pendidikan = $k->nama_pendidikan;
    //         $departemen = $k->nama_departemen;
    //         $ttl = $tempat.", ".$tanggal;
    //         $tombol = "";
    //         if($this->hakupdate == "1"){
    //             $tombol .= "<button type='button' class='btn btn-primary' data-id='".$id."' onclick='filter(this)'>Edit</button>";
    //         }
    //         if($this->hakhapus == "1"){
    //             $tombol .= " <button type='button' class='btn btn-danger' data-id='".$id."'onclick='hapus(this)'>Hapus</button>";
    //         }
    //         if($tombol == ""){
    //             $tombol = "Hak Di Batasi";
    //         }
    //         $dtisi .= '["'.$tombol.'","'.$id.'","'.$nik.'","'.$nama.'","'.$ttl.'","'.$pendidikan.'","'.$departemen.'"],';
    //     }
    //     $dtisifix = rtrim($dtisi, ",");
    //     $data = str_replace("xxx", $dtisifix, $dtJSON);
    //     echo $data;
    // }
    // public function karyawan_tambah(){
    //     if($this->haktambah == "1"){
    //         $id = strtotime(date("Y-m-d H:i:s"));
    //         $nik = trim(str_replace("'","''",$this->input->post("nik")));
    //         $nama = trim(str_replace("'","''",$this->input->post("nama")));
    //         $tempat = trim(str_replace("'","''",$this->input->post("tempat")));
    //         $tanggal = trim(str_replace("'","''",$this->input->post("tanggal")));
    //         $pendidikan = trim(str_replace("'","''",$this->input->post("pendidikan")));
    //         $departemen = trim(str_replace("'","''",$this->input->post("departemen")));
    //         $level = trim(str_replace("'","''",$this->input->post("level")));
    //         $status = trim(str_replace("'","''",$this->input->post("status")));
    //         $username = trim(str_replace("'","''",$this->input->post("username")));
    //         $password = trim(str_replace("'","''",$this->input->post("password")));
    //         $hasil = $this->Mkaryawan->tambah($id, $nik, $nama, $tempat, $tanggal, $pendidikan, $departemen, $level, $status, $username, enkripsi($password));
    //         if($hasil == "1"){    
    //             echo base64_encode("1|Tambah Akun Berhasil,");
    //         }else{
    //             echo base64_encode("0|Tambah Akun Gagal, Silahkan Cek Datannya");
    //         }
    //     }else{
    //         echo base64_encode("0|Anda Tidak Memiliki Hak Untuk Menambah Data");
    //     }
    // }

    // public function karyawan_filter(){
    //     $id = $this->input->post("id");
    //      $hasil = $this->Mkaryawan->filter($id);
    //      if(is_array($hasil)){
    //         if(count($hasil)>0){
    //             foreach($hasil as $k){
    //                 $id = $k->id_karyawan;
    //                 $nik = $k->nik;
    //                 $nama = $k->nama;
    //                 $tempat = $k->tempat_lahir;
    //                 $tanggal = $k->tanggal_lahir;
    //                 $pendidikan = $k->id_pendidikan;
    //                 $departemen = $k->id_departemen;
    //                 $level = $k->id_level_grade;
    //                 $status = $k->status;
    //             }
    //              echo base64_encode("1|$id|$nik|$nama|$tempat|$tanggal|$pendidikan|$departemen|$level|$status");

    //         }else{
    //             echo base64_encode("0|Data Karyawan Tidak Ditemukan");
    //         }
    //     }else{
    //         echo base64_encode("0|Data Karyawan Tidak Ditemukan");
    //      }
    // }
    // public function karyawan_update(){
    //     if($this->hakupdate == "1"){
    //         $id = trim(str_replace("'","''",$this->input->post("id")));
    //         $nik = trim(str_replace("'","''",$this->input->post("nik")));
    //         $nama = trim(str_replace("'","''",$this->input->post("nama")));
    //         $tempat = trim(str_replace("'","''",$this->input->post("tempat")));
    //         $tanggal = trim(str_replace("'","''",$this->input->post("tanggal")));
    //         $pendidikan = trim(str_replace("'","''",$this->input->post("pendidikan")));
    //         $departemen = trim(str_replace("'","''",$this->input->post("departemen")));
    //         $level = trim(str_replace("'","''",$this->input->post("level")));
    //         $status = trim(str_replace("'","''",$this->input->post("status")));
    //         $hasil = $this->Mkaryawan->update($id, $nik, $nama, $tempat, $tanggal, $pendidikan, $departemen, $level, $status);
    //         if($hasil== "1"){    
    //             echo base64_encode("1|Update Data Karyawan Berhasil");
    //         }else{
    //             echo base64_encode("0|Update Data Karyawan Gagal, Silahkan Cek Datannya");
    //         }
    //     }else{
    //         echo base64_encode("0|Anda Tidak Memiliki Hak Untuk Update Data");
    //     }
    // }
    // public function karyawan_hapus (){
    //     if($this->hakhapus == "1"){
    //         $id = $this->input->post("id");
    //         $hasil = $this->Mkaryawan->hapus($id);
    //         if($hasil== "1"){    
    //             echo base64_encode("1|Hapus Data Karyawan Berhasil");
    //         }else{
    //             echo base64_encode("0|Hapus Data Karyawan Gagal, Silahkan Cek Datannya");
    //         }
    //     }else{
    //         echo base64_encode("0|Anda Tidak Memiliki Hak Untuk Hapus Data");
    //     }
    // }

    function postPengajuanKaryawanKeHR($id_pengajuan){
        $pengajuan = $this->Mizin->getDataById($id_pengajuan);
        $url = '';
        $data = [
            'employee_id' => $pengajuan->karyawan_id,
            'from_date' => $pengajuan->karyawan_id,
            'to_date' => $pengajuan->karyawan_id,
            'sick_type_id' => $pengajuan->jenis_sakit_id,
            'leave_type_id' => $pengajuan->jenis_cuti_id,
            'izin_type_id' => $pengajuan->jenis_izin_id,
            'reason' => $pengajuan->keterangan,
        ];
        if ($pengajuan->jenis_pengajuan == 'Izin') {
           $url = "http://103.215.177.169/hris_dev/API/Pengajuan/savePengajuanIzin";
        }else if ($pengajuan->jenis_pengajuan == 'Sakit') {
            $url = "http://103.215.177.169/hris_dev/API/Pengajuan/savePengajuanSakit";
        }else{
            $url = "http://103.215.177.169/hris_dev/API/Pengajuan/savePengajuanCuti";

        }
        $insert =  $this->curl->simple_post($url, $data, array(CURLOPT_BUFFERSIZE => 10)); 

        return $insert;
    }
}