<style>
     .belum {
        color: black; 
        animation: myAnim 10s ease 0s infinite normal forwards;
    }
    
    @keyframes myAnim {
        0%,
        50%,
        100% {
            background-color: yellow;
        }

        25%,
        75% {
            background-color: Gold;
        }
    }
</style>
<div class="panel-header bg-primary-gradient" style="margin-top: -25px">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
            <h3 class="font-weight-bold text-white">SELAMAT DATANG, <?= $nama; ?> (<?= $karyawan_id; ?>)</h3>
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
            <table id="tblx" class="display table table-hover">
                <thead>
                    <tr>
                    <th style="text-align: center">Id Karyawan</th>
                    <th style="text-align: center">Nama</th>
                    <th style="text-align: center">Jenis Pengajuan</th>
                    <th style="text-align: center">Tanggal Pengajuan</th>
                    <th style="text-align: center">Tanggal Mulai-Selesai</th>
                    <th style="text-align: center">Keterangan</th>
                    <th style="text-align: center">Approval 1 Date</th>
                    <th style="text-align: center">Approval 2 Date</th>
                    <th style="text-align: center">Cancel Date</th>
                    <th style="text-align: center">Status</th>
                    <th style="text-align: center">Keterangan Cancel</th>
                    <th style="text-align: center">Action</th>
                    </tr>
                </thead>
            </table>
            </div>
        </div>
    </div>
</div>

<script>  
    $("#mnhome").addClass("active");
    let tblx = $('#tblx').DataTable({
        "ajax": "<?=base_url('Home/pengajuan_tampil');?>",
        "initComplete": function(settings, json) {
            this.api().rows().every(function () {
                let rowData = this.data();
                if (rowData[9] == 'Proses') {
                    $(this.node()).addClass("belum");
                }
            });
        }
    });

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

    function hapus(id){
        $.ajax({
            url: "<?= base_url('Home/pengajuan_hapus'); ?>",
            method: 'POST',
            data: { id: id},
            success: function (result) {
                swal({title: "Berhasil", text: "Berhasil Hapus Pengajuan", icon: "success",})
                .then(() => {
                    tblx.ajax.reload();
                });
            },
            error: function () {
                swal({title: "Gagal",text: "Gagal Hapus Pengajuan",icon: "error"});
            }
        });
    }

</script>