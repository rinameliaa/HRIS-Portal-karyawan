
<div class="panel-header bg-primary-gradient" style="margin-top: -30px">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
            <h3 class="font-weight-bold text-white">SELAMAT DATANG, <?= $nama; ?> (<?= $karyawan_id; ?>)</h3>
            <h4 class="font-weight-bold text-white">Rekap Kehadiran Karyawan Departemen Bulan <?= date('F Y'); ?></h4>
            </div>
        </div>
    </div>
</div>
<div class="row mt--4" style="margin: 10px">
    <div class="col-md-12">
        <!-- <div id="loader" style="display: flex; align-items: center; justify-content: center; height: 70vh;">
            <div class="loader loader-lg"></div>
        </div> -->
        <div class="card" id="card">
        <div class="card-body">
            <div class="table-responsive">
            <table id="tblx" class="display table table-hover" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th style="text-align: center" rowspan="2">No</th>
                        <th style="text-align: center" rowspan="2">Nama Karyawan</th>
                        <th style="text-align: center" colspan="<?= $daysInMonth; ?>">Tanggal</th>
                        <th style="text-align: center" colspan="9">Rekap</th>
                        <th style="text-align: center" rowspan="2">Terlambat Menit</th>
                        <th style="text-align: center" rowspan="2">Terlambat Jam</th>
                    </tr>
                    <tr>
                        <?php for ($i = 1; $i <= $daysInMonth; $i++): ?>
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
                <!-- <tbody>
                    <?php if (is_array($data) && !empty($data)): ?>
                        <?php foreach ($data as $key => $x): ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $x->nama ?></td>
                                <?php
                                    $countDay = 0;
                                ?>
                                <?php if (isset($x->absensi) && is_array($x->absensi)): ?>
                                    <?php foreach ($x->absensi as $item): ?>
                                        <?php
                                            $countDay++;
                                            if ($countDay > $daysInMonth) {
                                                continue;
                                            }
                                        ?>
                                        <td>
                                            <?php if (is_array($item) && isset($item[0])): ?>
                                                <?= is_object($item[0]) ? $item[0]->status_kehadiran_simbol : $item[0]; ?>
                                            <?php endif; ?>
                                        </td>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                                <td><?= $x->totalLibur ?></td>
                                <td><?= $x->totalLK ?></td>
                                <td><?= $x->totalHadir ?></td>
                                <td><?= $x->totalSakit ?></td>
                                <td><?= $x->totalIzin ?></td>
                                <td><?= $x->totalIK ?></td>
                                <td><?= $x->totalCuti ?></td>
                                <td><?= $x->totalCK ?></td>
                                <td><?= $x->totalAlpha ?></td>
                                <td><?= $x->totalDinas ?></td>
                                <td><?= $x->totalTerlambat ?></td>
                                <td><?= $x->totalPulangCepat ?></td>
                                <td><?= $x->totalOvertime ?></td>
                                <td><?= $x->totalMenitKerja ?></td>
                                <td><?= $x->totalMenitKerja ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody> -->
            </table>
            </div>
        </div>
    </div>
</div>

<script>  
    $("#mnrekap").addClass("active");
    let tblx = $('#tblx').DataTable({
        "ajax": "<?=base_url('Home/rekap');?>",
        fixedColumns: {
            left: 2,
        },
        paging: false,
        scrollCollapse: true,
        scrollX: true,
        scrollY: 500
    });
  
</script>