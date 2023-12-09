<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller {
    public $karyawan_id;
    public $firstname;
    public $lastname;
    public $fullname;
    public $jenis_gaji;
    public $approval;
    public $atasan;
    public $senior;
    public $user;
    
    public function __construct() {
        parent::__construct();
        $this->load->library('curl');
    
        if ($this->session->userdata("username")) {
            $userData = $this->session->userdata("userData");
            if ($userData) {
                if ($userData) {
                    $this->user_id = $userData[0]['user_id'];
                    $this->karyawan_id = $userData[0]['employee_id'];
                    $this->firstname = $userData[0]['first_name'];
                    $this->lastname = $userData[0]['last_name'];
                    $this->fullname = $userData[0]['first_name'] . ' ' . $userData[0]['last_name'];
                    $this->jenis_gaji = $userData[0]['jenis_gaji'];
                    $this->approval = $userData[0]['approval_access'];
                    $this->atasan = $userData[0]['atasan_langsung_id'];
                    $this->senior = $userData[0]['superior_atasan_langsung_id'];
                }  else {
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
        $z["karyawan_id"] = $this->karyawan_id;
        $z["approval"] = $this->approval ;
        $this->load->view("beranda", $z, true);
        $this->load->view("home", $xyz);
	} 
    
    public function listCuti() {
        $ambil_data = file_get_contents('http://103.215.177.169/hris/API/Pengajuan/tipe_cuti');
        $data = json_decode($ambil_data, true);
        echo json_encode($data);
    }
    public function listSisaCuti() {
        $id = $this->karyawan_id;
        $ambil_data = file_get_contents('http://103.215.177.169/hris/API/Employee/checkSisaCutiTahunan?id=' . $id);
        $data = json_decode($ambil_data, true);
        echo json_encode($data);
    }
    public function listIzin() {
        $ambil_data = file_get_contents('http://103.215.177.169/hris/API/Pengajuan/tipe_izin');
        $data = json_decode($ambil_data, true);
        echo json_encode($data);
    }
    public function listKehadiran() {
        $id = $this->karyawan_id;
        $url = 'http://103.215.177.169/hris/API/Employee/getAttendance?id='.$id;
        $ambil_data = file_get_contents($url);
        $data = json_decode($ambil_data, true);
        echo json_encode($data);
    }

    public function listGaji() {
        $id = $this->karyawan_id;
        $start = trim(str_replace("'", "''", $this->input->get("start")));
        $end = trim(str_replace("'", "''",  $this->input->get("end")));
        $ambil_data = file_get_contents('http://103.215.177.169/hris/API/Employee/payslip_harian?employee_id=' .$id . '&start_date=' . $start . '&end_date=' . $end );
        $data = json_decode($ambil_data, true);
        echo json_encode($data);
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
        $z["karyawan_id"] = $this->karyawan_id;
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
            $id_approval2 = $k->karyawan_id_approval2;
            $karyawan_id = $k->karyawan_id;
            $nama = $k->nama;
            $jenis_pengajuan = $k->jenis_pengajuan;
            $tanggal_start = $k->tanggal_start;
            $tanggal_end = $k->tanggal_end;
            $create = $k->create;
            $keterangan = $k->keterangan;
            $status = $k->status;
            $action = "<div class='text-center'> <button type='button' class='btn btn-warning' onclick='approval1($id, $id_approval2)' style='margin:5px;'>Approval 1</button><button type='button' class='btn btn-danger' onclick='cancel($id)' style='margin:5px;'>Cancel</button> </div>";
            $ttl = $tanggal_start . " s/d " . $tanggal_end;
            $dtisi .= '["'.$karyawan_id.'","'.$nama.'","'.$jenis_pengajuan.'","'.$create.'","'.$ttl.'","'.$keterangan.'","'.$status.'","'.$action.'"],';
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
            $create = $k->create;
            $tanggal_start = $k->tanggal_start;
            $tanggal_end = $k->tanggal_end;
            $keterangan = $k->keterangan;
            $status = $k->status;
            $action = "<div class='text-center'> <button type='button' class='btn btn-warning' onclick='approval2($id)' style='margin:5px;'>Approval 2</button><button type='button' class='btn btn-danger' onclick='cancel($id)' style='margin:5px;'>Cancel</button> </div>";
            $ttl = $tanggal_start . " s/d " . $tanggal_end;
            $dtisi .= '["'.$karyawan_id.'","'.$nama.'","'.$jenis_pengajuan.'","'.$create.'","'.$ttl.'","'.$keterangan.'","'.$status.'","'.$action.'"],';
        }
        $dtisifix = rtrim($dtisi, ",");
        $data = str_replace("xxx", $dtisifix, $dtJSON);
        echo $data;
    }
    public function pengajuan_approval1() {
        $id_approval2 = $this->input->post('id_approval2');
        $id = $this->input->post('id');
        $hasil = '';
    
        if ($id_approval2 == null) {
            $hasil = $this->Mizin->update_approval1($id);
            $hasil = $this->Mizin->update_approval2($id);
            $post = $this->postPengajuanKaryawanKeHR($id);
        } else {
            $url_atasan_langsung = 'http://103.215.177.169/hris/API/Employee/getEmployee?id=' . $id_approval2;
            $data_atasan_langsung = file_get_contents($url_atasan_langsung);
    
            if ($data_atasan_langsung !== false && ($data_atasan_langsung = json_decode($data_atasan_langsung)) && isset($data_atasan_langsung->email)) {
                $send_email = $this->sendEmail($data_atasan_langsung->email);
                echo base64_encode($send_email ? "1|Berhasil Approval Pertama," : "0|Approval Pertama Gagal, Gagal Mengirim Email");
            } else {
                echo base64_encode("0|Data Atasan Langsung Tidak Valid atau Gagal Mengambil Data");
            }
    
            $hasil = $this->Mizin->update_approval1($id);
        }
    
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
     
        if ($hasil == "1") {    
            $this->sendEmail(); 
            echo base64_encode("1|Tambah Approval Date Berhasil,");
        } else {
            echo base64_encode("0|Tambah Approval Date Gagal, Silahkan Cek Datanya");
        }
    }
    public function pengajuan_cancel(){
        $id = $this->input->post('id');
        $ket_cancel = trim(str_replace("'", "''", $this->input->post("ket_cancel")));
        $hasil = $this->Mizin->update_cancel($id, $ket_cancel);
    
        if ($hasil == "1") {    
            echo base64_encode("1|Cancel Pengajuan Berhasil,");
        } else {
            echo base64_encode("0|Cancel Pengajuan Gagal, Silahkan Cek Datanya");
        }
    }
    public function pengajuan_hapus(){
        $id = $this->input->post('id');
        $hasil = $this->Mizin->hapus_pengajuan($id);
    
        if ($hasil == "1") {    
            echo base64_encode("1|Hapus Pengajuan Berhasil,");
        } else {
            echo base64_encode("0|Hapus Pengajuan, Silahkan Cek Datanya");
        }
    }
    public function kehadiran(){
        $xyz["konten"] = "kehadiran";
        $z["nama"] = $this->fullname ;
        $z["karyawan_id"] = $this->karyawan_id;
        $this->load->view("kehadiran", $z, true);
        $this->load->view("home", $xyz);
    }
    public function Penggajian(){
        $xyz["konten"] = "penggajian";
        $z["nama"] = $this->fullname ;
        $z["jenis_gaji"] = $this->jenis_gaji ;
        $z["karyawan_id"] = $this->karyawan_id;
        $this->load->view("penggajian", $z, true);
        $this->load->view("home", $xyz);
    }

    public function pengajuan_tampil(){
        $dtJSON = '{"data": [xxx]}'; 
        $dtisi = "";
        $z = $this->karyawan_id;
        $dt = $this->Mizin->data($z);
        foreach ($dt as $k) {
            $id = $k->id;
            $karyawan_id = $k->karyawan_id;
            $nama = $k->nama;
            $jenis_pengajuan = $k->jenis_pengajuan;
            $create = $k->create;
            $tanggal_start = $k->tanggal_start;
            $tanggal_end = $k->tanggal_end;
            $keterangan = $k->keterangan;
            $approval1_date = empty($k->approval1_date) ? '-' : $k->approval1_date;
            $approval2_date = empty($k->approval2_date) ? '-' : $k->approval2_date;
            $approval_cancel_date = empty($k->approval_cancel_date) ? '-' : $k->approval_cancel_date;
            $status = $k->status;
            $ket_cancel = $k->ket_cancel;
            if (empty($ket_cancel)) {
                $ket_cancel = '-';
            }
            $action = empty($k->approval2_date) ?  "<button type='button' class='btn btn-danger' onclick='hapus($id)' style='margin:5px;'>Hapus</button>" : "<button type='button' class='btn btn-success' style='margin:5px;'>No Action</button>";          
            $ttl = $tanggal_start . " s/d " . $tanggal_end;
            $dtisi .= '["' . $karyawan_id . '","' . $nama . '","' . $jenis_pengajuan . '","' . $create . '","' . $ttl . '","' . $keterangan . '","' . $approval1_date . '","' . $approval2_date . '","' . $approval_cancel_date . '","' . $status . '","' . $ket_cancel . '","' . $action . '"],';
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
        if (isset($this->senior) && !empty($this->senior)) {
            $karyawan_id_approval2 = trim(str_replace("'", "''", $this->senior));
        } else {
            $karyawan_id_approval2 = NULL;
        }
        $approval1_date = NULL;
        $approval2_date = NULL;
        $approval_cancel_date = NULL;
        $ket_cancel = NULL;
        $status = trim(str_replace("'", "''", $this->input->post("status")));
        $create = date('Y-m-d H:i:s');
        $hasil = $this->Mizin->tambah($id, $user_id, $karyawan_id, $nama, $jenis_pengajuan, $tanggal_start, $tanggal_end, $jenis_izin_id, $jenis_cuti_id, $jenis_sakit_id, $keterangan, $karyawan_id_approval1, $karyawan_id_approval2, $approval1_date, $approval2_date,$approval_cancel_date, $status, $ket_cancel, $create);
    
        $url_atasan_langsung = 'http://103.215.177.169/hris/API/Employee/getEmployee?id=' . $karyawan_id_approval1;
        $data_atasan_langsung = file_get_contents($url_atasan_langsung);

        if ($data_atasan_langsung !== false) {
            $data_atasan_langsung = json_decode($data_atasan_langsung);

            if ($data_atasan_langsung && isset($data_atasan_langsung->email)) {
                $email_atasan_langsung = $data_atasan_langsung->email;
                $send_email = $this->sendEmail($email_atasan_langsung);

                if ($send_email) {
                    echo base64_encode("1|Tambah Permohonan Berhasil,");
                } else {
                    echo base64_encode("0|Tambah Permohonan Gagal, Gagal Mengirim Email");
                }
            } else {
                echo base64_encode("0|Tambah Permohonan Gagal, Data Atasan Langsung Tidak Valid");
            }
        } else {
            echo base64_encode("0|Tambah Permohonan Gagal, Gagal Mengambil Data Atasan Langsung");
        }
    }
    public function sendEmail($email)
    {
        $this->load->library('email');

        $config = [
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_user' => '*',
            'smtp_pass' => '*',
            'smtp_port' => 465,
            'crlf'      => "\r\n",
            'newline'   => "\r\n",
        ];
 
        $this->email->initialize($config);

        // Email dan nama pengirim
        $this->email->from('it_spv@akuibirdnest.com','Akui Bird Nest Indonesia');

        // Email penerima
        $this->email->to($email);

        // Lampiran email, isi dengan url/path file
        // $this->email->attach('https://images.pexels.com/photos/3052361/pexels-photo-3052361.jpeg');

        // Subject email
        $this->email->subject('Pemberitahuan Permintaan Approval');

        $this->email->message("Ini adalah contoh email yang dikirim menggunakan SMTP Gmail pada CodeIgniter.");

        return $this->email->send();
    }
    function postPengajuanKaryawanKeHR($id_pengajuan){
        $pengajuan = $this->Mizin->getDataById($id_pengajuan);
        $url = '';
        $data = [
            'employee_id' => $pengajuan->karyawan_id,
            'from_date' => $pengajuan->tanggal_start,
            'to_date' => $pengajuan->tanggal_end,
            'sick_type_id' => $pengajuan->jenis_sakit_id,
            'leave_type_id' => $pengajuan->jenis_cuti_id,
            'izin_type_id' => $pengajuan->jenis_izin_id,
            'reason' => $pengajuan->keterangan,
        ];
        if ($pengajuan->jenis_pengajuan == 'Izin') {
           $url = "http://103.215.177.169/hris/API/Pengajuan/savePengajuanIzin";
        }else if ($pengajuan->jenis_pengajuan == 'Sakit') {
            $url = "http://103.215.177.169/hris/API/Pengajuan/savePengajuanSakit";
        }else{
            $url = "http://103.215.177.169/hris/API/Pengajuan/savePengajuanCuti";

        }
        $insert =  $this->curl->simple_post($url, $data, array(CURLOPT_BUFFERSIZE => 10)); 

        return $insert;
    }
}
