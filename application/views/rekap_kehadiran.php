
<div class="panel-header bg-primary-gradient" style="margin-top: -30px">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h3 class="font-weight-bold text-white">SELAMAT DATANG, <?= $nama; ?> (<?= $karyawan_id; ?>)</h3>
                <h4 class="font-weight-bold text-white">Rekap Kehadiran Karyawan</h4>
                <div class="row">
                    <div class="col-md-12 d-flex">
                        <input type="month" id="cbobulan" class="form-control">
                        <button type="button" class="btn btn-success" id="cari" onclick="tampil_rekap($('#cbobulan').val())" style="margin: 5px">Cari</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mt--4" style="margin: 10px">
    <div class="col-md-12">
        <div class="card" id="card">
        <div class="card-body">
            <div class="">
            <table id="tblx" class="display table table-bordered table-head-bg-primary row-border order-column nowrap" width="100%">
                <thead>
                    <tr>
                        <th style="text-align: center" rowspan="2">No</th>
                        <th style="text-align: center" rowspan="2">Nama_Karyawan</th>
                        <th style="text-align: center" colspan="31">Tanggal</th>
                        <th style="text-align: center" colspan="9">Rekap</th>
                        <th style="text-align: center" rowspan="2">Terlambat Menit</th>
                        <th style="text-align: center" rowspan="2">Terlambat Jam</th>
                    </tr>
                    <tr>
                        <?php for ($i = 1; $i <= 31; $i++): ?>
                            <th><?= $i ?></th>
                        <?php endfor; ?>
                        <th>Libur</th>
                        <th>Libur Kantor</th>
                        <th>Hadir</th>
                        <th>Sakit</th>
                        <th>Izin</th>
                        <th>Cuti</th>
                        <th>Alpa</th>
                        <th>Lembur</th>
                        <th>Dinas</th>
                    </tr>
                </thead>
            </table>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $("#mnrekap").addClass("active");
        
        let currentDate = new Date();
        let month = currentDate.getMonth() + 1;
        let bulan = currentDate.getFullYear() + '-' + (month < 10 ? '0' : '') + month;
        
        swal({
            title: 'Loading data...',
            allowOutsideClick: false,
            showConfirmButton: false,
            onBeforeOpen: () => {
                Swal.showLoading();
            }
        });

        $.ajax({
            url: "<?=base_url('Home/rekap/');?>" + bulan,
            dataType: "json",
            success: function(data) {
                swal.close();
                new DataTable("#tblx", {
                    destroy: true,
                    data: data.data,
                    fixedColumns: {
                        leftColumns: 2,
                    },
                    fixedHeader: true,
                    paging: true,
                    scrollX: true,
                    scrollY: 500,
                    layout: {
                        topStart: {
                            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
                        }
                    },
                    createdRow: function(row, data, dataIndex) {
                        $('td', row).each(function(index) {
                            if (data[index] === 'A') {
                                $(this).css('color', 'red');
                            }
                        });
                    }
                });
            },
            error: function() {
                swal.close();
                console.error('Failed to load data');
            }
        });
    });

    function tampil_rekap(bulan) {
        swal({
            title: 'Loading data...',
            allowOutsideClick: false,
            showConfirmButton: false,
            onBeforeOpen: () => {
                Swal.showLoading();
            }
        });

        $.ajax({
            url: "<?=base_url('Home/rekap/');?>" + bulan,
            dataType: "json",
            success: function(data) {
                swal.close();
                new DataTable("#tblx", {
                    destroy: true,
                    data: data.data,
                    fixedColumns: {
                        leftColumns: 2,
                    },
                    fixedHeader: true,
                    paging: true,
                    scrollX: true,
                    scrollY: 500,
                    layout: {
                        topStart: {
                            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
                        }
                    },
                    createdRow: function(row, data, dataIndex) {
                        $('td', row).each(function(index) {
                            if (data[index] === 'A') {
                                $(this).css('color', 'red');
                            }
                        });
                    }
                });
            },
            error: function() {
                swal.close();
                console.error('Failed to load data');
            }
        });
    }

    
  
</script>