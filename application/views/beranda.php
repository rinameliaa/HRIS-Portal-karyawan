<div class="panel-header bg-primary-gradient" style="margin: -7px">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
            <h3 class="font-weight-bold text-white">SELAMAT DATANG, <?= $nama; ?></h3>
                <h4 class="text-white op-7 mb-2">Data Pengajuan Karyawan</h4>
            </div>
        </div>
    </div>
</div>
<div class="page-inner mt--5">
    <div class="row mt--2">
        <div class="col-md-3" >
            <div class="card card-success">
                <div class="card-body">
                    <h4 class="text-center">Jumlah Izin</h4>
                    <div class="text-center" id="jmlizin">???</div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-danger">
                <div class="card-body">
                    <h4 class="text-center">Jumlah Sakit</h4>
                    <div class="card-category text-center" id="jmlsakit">???</div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-info">
                <div class="card-body">
                    <h4 class="text-center">Jumlah Cuti Tahunan</h4>
                    <div class="card-category text-center" id="jmlcutit">???</div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-warning">
                <div class="card-body">
                    <h4 class="text-center">Jumlah Cuti Khusus</h4>
                    <div class="card-category text-center" id="jmlcutik">???</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mt--4" style="margin: 10px">
    <div class="col-md-12">
        <div class="card">
        <div class="card-body">
            <div class="table-responsive">
            <table id="tblx" class="display table table-striped table-hover">
                <thead>
                    <tr>
                    <th style="width: 18">Id Karyawan</th>
                    <th style="width: 13%">Nama Karyawan</th>
                    <th style="width: 15%">Jenis Pengajuan</th>
                    <th style="width: 30%">Tanggal Mulai-Selesai</th>
                    <th style="width: 15%">Keterangan</th>
                    <th style="width: 15%">Keterangan Ditolak</th>
                    <th style="width: 5%">Status</th>
                    </tr>
                </thead>
            </table>
            </div>
        </div>
    </div>
</div>

<script>  
    $("#mnhome").addClass("active");
    let tblx = $('#tblx').DataTable(
        {
            "ajax": "<?=base_url('Home/pengajuan_tampil');?>"
        }
    );
    $.ajax({
        url: "<?=base_url('Home/jumlahIzin');?>",
        method: "GET",
        dataType: "json",
        success: function (data) {
            $('#jmlizin').text(data)
        },
        error: function () {
            console.log('Ada masalah dalam permintaan GET');
        }
    });
    $.ajax({
        url: "<?=base_url('Home/jumlahSakit');?>",
        method: "GET",
        dataType: "json",
        success: function (data) {
            $('#jmlsakit').text(data)
        },
        error: function () {
            console.log('Ada masalah dalam permintaan GET');
        }
    });
    $.ajax({
        url: "<?=base_url('Home/jumlahCutiTahunan');?>",
        method: "GET",
        dataType: "json",
        success: function (data) {
            $('#jmlcutit').text(data);
        },
        error: function () {
            console.log('Ada masalah dalam permintaan GET');
        }
    });
    $.ajax({
        url: "<?=base_url('Home/jumlahCutiKhusus');?>",
        method: "GET",
        dataType: "json",
        success: function (data) {
            $('#jmlcutik').text(data);
        },
        error: function () {
            console.log('Ada masalah dalam permintaan GET');
        }
    });


</script>
