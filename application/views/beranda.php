<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="row">
            <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                <h3 class="font-weight-bold">Selamat Datang <?= $nama; ?></h3>
                <h4 class="font-weight-bold">Data Pengajuan Karyawan</h4>
            </div>
        </div> 
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
        <div class="card-body">
            <div class="table-responsive">
            <table id="tblx" class="display table table-striped table-hover">
                <thead>
                    <tr>
                    <th style="width: 10%">Id Karyawan</th>
                    <th style="width: 15%">Nama Karyawan</th>
                    <th style="width: 25%">Jenis Pengajuan</th>
                    <th style="width: 15%">Tanggal Mulai - Selesai</th>
                    <th style="width: 25%">Keterangan</th>
                    <th style="width: 10%">Status</th>
                    </tr>
                </thead>
            </table>
            </div>
        </div>
    </div>
</div>
<script>  
    let tblx = $('#tblx').DataTable(
        {
            "ajax": "<?=base_url('Home/pengajuan_tampil');?>"
        }
    );

</script>
