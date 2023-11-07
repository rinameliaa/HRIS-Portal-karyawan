<div class="panel-header bg-primary-gradient" style="margin-top: -30px">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
            <h3 class="font-weight-bold text-white">PRESENSI KEHADIRAN, <?= $nama; ?></h3> 
                <select class="form-control ftambah" id="cbocuti">
                    <option value="">Pilih Presensi Bulan</option>
                </select>
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
                    <th style="width: 3">No</th>
                    <th style="width: 7%">Tanggal</th>
                    <th style="width: 5%">Hari</th>
                    <th style="width: 10%">Jam Kerja</th>
                    <th style="width: 10%">Jam Masuk</th>
                    <th style="width: 10%">Jam Pulang</th>
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
    $("#mnkehadiran").addClass("active");
    semua();

    function semua() {
        if ($.fn.DataTable.isDataTable('#tblx')) {
            $('#tblx').DataTable().destroy();
        }
        let approval1 = $('#tblx').DataTable(
            {
                "ajax": "<?=base_url('Home/approval1_tampil');?>"
            }
        ); 
    }


</script>
