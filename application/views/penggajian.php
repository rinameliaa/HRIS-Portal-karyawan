<style>
.status-masuk {
    background-color: white;
    color: black;
}
.status-libur {
    background-color: red;
    color: black;
}

.status-absen {
    background-color: yellow;
    color: black;
}

.status-sakit {
    background-color: orange;
    color: black;
}

.status-izin {
    background-color: navy;
    color: black;
}

.status-cuti {
    background-color: lightblue;
    color: black;
}

.status-lembur {
    background-color: purple;
    color: black;
}

</style>
<div class="panel-header bg-primary-gradient" style="margin-top: -30px">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
            <h3 class="font-weight-bold text-white">PRESENSI KEHADIRAN, <?= $nama; ?></h3>
            <h4 class="font-weight-bold text-white">Bulan <?= date('F Y'); ?></h4>
            </div>
        </div>
    </div>
</div>
<div class="page-inner mt--5">
    <div class="row mt--2">
        <div class="col-md-2" >
            <div class="card card-success">
                <div class="card-body">
                    <h4 class="text-center">Jumlah Hadir</h4>
                    <div class="text-center" id="jmlhadir">???</div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card card-warning">
                <div class="card-body">
                    <h4 class="text-center">Jumlah Sakit</h4>
                    <div class="card-category text-center" id="jmlsakit">???</div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card card-primary" >
                <div class="card-body">
                    <h4 class="text-center">Jumlah Izin</h4>
                    <div class="card-category text-center" id="jmlizin">???</div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card card-info">
                <div class="card-body">
                    <h4 class="text-center">Jumlah Cuti</h4>
                    <div class="card-category text-center" id="jmlcuti">???</div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card card-secondary">
                <div class="card-body">
                    <h4 class="text-center">Jumlah Lembur</h4>
                    <div class="card-category text-center" id="jmllembur">???</div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card card-danger" >
                <div class="card-body">
                    <h4 class="text-center">Jumlah Alpha</h4>
                    <div class="card-category text-center" id="jmlabsen">???</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mt--4" style="margin: 10px">
    <div class="col-md-12">
        <div id="loader" style="display: flex; align-items: center; justify-content: center; height: 70vh;">
            <div class="loader loader-lg"></div>
        </div>
        <div class="card" id="card">
        <div class="card-body">
            <div class="table-responsive">
            <table id="tblx" class="display table table-hover" cellspacing="0" width="100%">
                <thead>
                    <tr>
                    <th style="width: 3">No</th>
                    <th style="width: 10%">Tanggal</th>
                    <th style="width: 5%">Hari</th>
                    <th style="width: 10%">Jam Kerja</th>
                    <th style="width: 10%">Jam Masuk</th>
                    <th style="width: 10%">Jam Pulang</th>
                    <!-- jika keterangan 
                    libur merah
                    absen kuning
                    sakit  orange
                    izin biru tua
                    cuti biru muda
                    lembur ungu
                    disahi jumlah nya di card hadir,sakit,izin,cuti,lembur,libur,alpha = Absen -->
                    <th style="width: 5%">Status</th>
                    <th style="width: 5%">Terlambat (menit)</th>
                    <th style="width: 5%">Pulang Cepat (menit)</th>
                    <th style="width: 5%">Lembur (menit)</th>
                    <th style="width: 5%">Total Jam Kerja (menit)</th>
                    <th style="width: 15%">Keterangan</th>
                    </tr>
                </thead>
            </table>
            </div>
        </div>
    </div>
</div>

<script>  
    $("#mnpenggajian").addClass("active");
    tampil_presensi();
    function tampil_presensi(){
        $("#loader").show();
        $("#card").hide();
        $.ajax({
            url: "http://103.215.177.169/hris/API/Employee/getAttendance?id=" + '<?= $karyawan_id; ?>', 
            method: "GET",
            success: function (data) {
                // "Hadir" 
                var hadirData = data.filter(item => item.status == "Hadir");
                var jumlahHadir = hadirData.length;
                $('#jmlhadir').text(jumlahHadir);
                // "Sakit" 
                var sakitData = data.filter(item => item.status === "Sakit");
                var jumlahSakit = sakitData.length;
                $('#jmlsakit').text(jumlahSakit);

                // "Izin" 
                var izinData = data.filter(item => item.status === "Izin");
                var jumlahIzin = izinData.length;
                $('#jmlizin').text(jumlahIzin);

                // "Cuti" 
                var cutiData = data.filter(item => item.status === "Cuti");
                var jumlahCuti = cutiData.length;
                $('#jmlcuti').text(jumlahCuti);

                // "Lembur" 
                var lemburData = data.filter(item => item.status === "Lembur");
                var jumlahLembur = lemburData.length;
                $('#jmllembur').text(jumlahLembur);

                // "Absen" 
                var absenData = data.filter(item => item.status === "Absen");
                var jumlahAbsen = absenData.length;
                $('#jmlabsen').text(jumlahAbsen);
            
                let dataTable = $("#tblx").DataTable({
                    data: data,
                    columns: [
                        { data: "no" },
                        { data: "tanggal" },
                        { data: "hari" },
                        { data: "jam_kerja" },
                        { data: "jam_masuk" },
                        { data: "jam_pulang" },
                        { data: "status" },
                        { data: "terlambat" },
                        { data: "pulang_cepat" },
                        { data: "lembur" },
                        { data: "total_jam_kerja" },
                        { data: "keterangan" },
                    ],
                    rowCallback: function (row, data) {
                        let status = data.status;
                        if (status == "Hadir") {
                            $(row).addClass("status-masuk");
                        } else if (status == "Libur") {
                            $(row).addClass("status-libur");
                        } else if (status == "Absen") {
                            $(row).addClass("status-absen");
                        } else if (status == "Sakit") {
                            $(row).addClass("status-sakit");
                        } else if (status == "Izin") {
                            $(row).addClass("status-izin");
                        } else if (status == "Cuti") {
                            $(row).addClass("status-cuti");
                        } else if (status == "Lembur") {
                            $(row).addClass("status-lembur");
                        }
                    },
                });
                $("#loader").hide();
                $("#card").show();
            },
            error: function () {
                console.error("Gagal mengambil data dari API");
                $("#loader").hide();
                $("#card").show();
            }
        }); 
    }

</script>
