
<div class="panel-header bg-primary-gradient" style="margin-top: -30px">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h3 class="font-weight-bold text-white">SELAMAT DATANG, <?= $nama; ?> (<?= $karyawan_id; ?>)</h3>
                <h4 class="font-weight-bold text-white">Bulan <?= date('F Y'); ?></h4>
                <div class="row">
                    <div class="col-md-12 d-flex">
                        <input type="month" id="cbobulan" class="form-control">
                        <button type="button" class="btn btn-success" id="cari" onclick="tampil_presensi($('#cbobulan').val())" style="margin: 5px">Cari</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="page-inner mt--5">
    <div class="row mt--2">
        <div class="col-md-2" >
            <div class="card card-success" id="hadirTampil">
                <div class="card-body" >
                    <h4 class="text-center">Jumlah Hadir</h4>
                    <div class="text-center" id="jmlhadir">???</div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card card-warning" id="hadirSakit">
                <div class="card-body">
                    <h4 class="text-center">Jumlah Sakit</h4>
                    <div class="card-category text-center" id="jmlsakit">???</div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card card-primary" id="hadirIzin">
                <div class="card-body">
                    <h4 class="text-center">Jumlah Izin</h4>
                    <div class="card-category text-center" id="jmlizin">???</div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card card-info" id="hadirCuti">
                <div class="card-body">
                    <h4 class="text-center">Jumlah Cuti</h4>
                    <div class="card-category text-center" id="jmlcuti">???</div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card card-secondary" id="hadirLembur">
                <div class="card-body">
                    <h4 class="text-center">Jumlah Lembur</h4>
                    <div class="card-category text-center" id="jmllembur">???</div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card card-danger" id="hadirAlpha">
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
            <table id="tblx" class="display table table-hover table-bordered table-head-bg-primary" cellspacing="1" width="100%">
                <thead>
                    <tr>
                    <th style="text-align: center;">No</th>
                    <th style="text-align: center;">Tanggal</th>
                    <th style="text-align: center;">Hari</th>
                    <th style="text-align: center;">Jam_Kerja</th>
                    <th style="text-align: center;">Jam_Masuk</th>
                    <th style="text-align: center;">Jam_Pulang</th>
                    <th style="text-align: center;">Status Kehadiran</th>
                    <th style="text-align: center;">Terlambat (menit)</th>
                    <th style="text-align: center;">Pulang Cepat (menit)</th>
                    <th style="text-align: center;">Lembur (menit)</th>
                    <th style="text-align: center;">Total Jam Kerja (menit)</th>
                    <th style="text-align: center;">Keterangan</th>
                    </tr>
                </thead>
            </table>
            </div>
        </div>
    </div>
</div>

<script>  
    $("#mnkehadiran").addClass("active");
    
    let currentDate = new Date();
    let month = currentDate.getMonth() + 1;
    let bulan = currentDate.getFullYear() + '-' + (month < 10 ? '0' : '') + month;
    tampil_presensi(bulan);

    function tampil_presensi(bulan) {
        $("#loader").show();
        $("#card").hide();

        $.ajax({
            url: "<?=base_url('Home/listKehadiran/');?>" + bulan,
            dataType: "json",
            success: function(data) {
                $('#jmlhadir').text(countStatus(data.data, 'Hadir'));
                $('#jmlsakit').text(countStatus(data.data, 'Sakit'));
                $('#jmlizin').text(countStatus(data.data, 'Izin'));
                $('#jmlcuti').text(countStatus(data.data, 'Cuti'));
                $('#jmllembur').text(countStatus(data.data, 'Lembur'));
                $('#jmlabsen').text(countStatus(data.data, 'Absen'));

                $('#hadirTampil').on('click', function() {
                    statusAbsen(data.data, 'Hadir');
                });
                $('#hadirSakit').on('click', function() {
                    statusAbsen(data.data, 'Sakit');
                });
                $('#hadirIzin').on('click', function() {
                    statusAbsen(data.data, 'Izin');
                });
                $('#hadirCuti').on('click', function() {
                    statusAbsen(data.data, 'Cuti');
                });
                $('#hadirLembur').on('click', function() {
                    statusAbsen(data.data, 'Lembur');
                });
                $('#hadirAlpha').on('click', function() {
                    statusAbsen(data.data, 'Absen');
                });

                new DataTable("#tblx", {
                    data: data.data,
                    destroy: true,
                    // fixedHeader: true,
                    fixedColumns: {
                        start: 1
                    },
                    paging: false,
                    scrollCollapse: true,
                    scrollX: true,
                    scrollY: 500,
                    layout: {
                        topStart: {
                            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
                        }
                    },
                    createdRow: function(row, data, dataIndex) {
                        let status = data[6];
                        $('td', row).each(function(index) {
                            if (status === 'Hadir') {
                                $(this).css({
                                    'background-color': 'white',
                                    'color': 'black'
                                });
                            } else if (status === 'Libur') {
                                $(this).css({
                                    'background-color': 'red',
                                    'color': 'black'
                                });
                            } else if (status === 'Absen') {
                                $(this).css({
                                    'background-color': 'yellow',
                                    'color': 'black'
                                });
                            } else if (status === 'Sakit') {
                                $(this).css({
                                    'background-color': 'orange',
                                    'color': 'black'
                                });
                            } else if (status === 'Izin') {
                                $(this).css({
                                    'background-color': 'navy',
                                    'color': 'black'
                                });
                            } else if (status === 'Cuti') {
                                $(this).css({
                                    'background-color': 'lightblue',
                                    'color': 'black'
                                });
                            } else if (status === 'Lembur') {
                                $(this).css({
                                    'background-color': 'purple',
                                    'color': 'black'
                                });
                            } else {
                                $(this).css({
                                    'background-color': 'white',
                                    'color': 'black'
                                });
                            }
                        });
                    },
                });

                $("#loader").hide();
                $("#card").show();
            },
            error: function() {
                console.error("Gagal mengambil data dari API");
                $("#loader").hide();
                $("#card").show();
            }
        });
    }

    function countStatus(data, status) {
        if (!Array.isArray(data)) {
            return 0;
        }
        return data.filter(item => item[6] === status).length;
    }

    function statusAbsen(data, status){
        let filteredData = data.filter(item => item[6] === status);
        let dataTable = new DataTable("#tblx", {
            data: filteredData,
            destroy: true,
            paging: false,
            fixedHeader: true,
            fixedColumns: {
                    start: 1
                },
            scrollCollapse: true,
            scrollX: true,
            scrollY: 500,
            layout: {
                topStart: {
                    buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
                }
            },
            createdRow: function(row, data, dataIndex) {
                let status = data[6];
                $('td', row).each(function(index) {
                    if (status === 'Hadir') {
                        $(this).css({
                            'background-color': 'white',
                            'color': 'black'
                        });
                    } else if (status === 'Libur') {
                        $(this).css({
                            'background-color': 'red',
                            'color': 'black'
                        });
                    } else if (status === 'Absen') {
                        $(this).css({
                            'background-color': 'yellow',
                            'color': 'black'
                        });
                    } else if (status === 'Sakit') {
                        $(this).css({
                            'background-color': 'orange',
                            'color': 'black'
                        });
                    } else if (status === 'Izin') {
                        $(this).css({
                            'background-color': 'navy',
                            'color': 'black'
                        });
                    } else if (status === 'Cuti') {
                        $(this).css({
                            'background-color': 'lightblue',
                            'color': 'black'
                        });
                    } else if (status === 'Lembur') {
                        $(this).css({
                            'background-color': 'purple',
                            'color': 'black'
                        });
                    } else {
                        $(this).css({
                            'background-color': 'white',
                            'color': 'black'
                        });
                    }
                });
            },
        });
    }

</script>