<div class="panel-header bg-primary-gradient" style="margin-top: -30px">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h3 class="font-weight-bold text-white">PENGGAJIAN, <?= $nama; ?></h3>
                <h4 class="font-weight-bold text-white">Bulan <?= date('F Y'); ?></h4>
                <div class="form-group col-md-12">
                    <select class="form-control ftambah" id="cbotanggal">
                    <option value="">Pilih tanggal</option>
                        <?php
                        $today = date('Y-m-d');
                        $first_day = date('1/m/Y', strtotime($today));
                        $mid_month1 = date('15/m/Y', strtotime($today));
                        $mid_month2 = date('16/m/Y', strtotime($today));
                        $last_day = date('t/m/Y', strtotime($today));
                    
                        echo "<option value='$first_day|$mid_month'>$first_day - $mid_month1</option>";
                        echo "<option value='$mid_month|$last_day'>$mid_month2 - $last_day</option>";
                        ?>
                    </select>  
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt--4" style="margin: 10px">
    <div class="col-md-12">
        <div class="card" id="card_harian">
            <div class="card-head" style="display: flex; justify-content: flex-end;">
                <button type="button" class="btn btn-primary" style="margin: 15px; margin-bottom: -5px;" onclick="generatePDF1()"><i class="fas fa-file-pdf" style="margin-right: 5px;"></i>Cetak PDF</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="tbl-harian" border="1" style="width: 24.3cm; ">
                        <thead>
                            <tr>
                                <th style="border: none; text-align: left;" >
                                <p>Nama</p> 
                                <p>Divisi</p> 
                                <p>Periode</p>
                                <p>No. Rekening</p> 
                                <p>No.Urut</p> 
                                </th>
                                <th style="border:none; text-align: left;">
                                <p>: Kalkulus</p>
                                <p>: SPV</p>   
                                <p>: 01-01-2023 s/d 12-12-2023</p>  
                                <p>: 012828337 (Bank BNI)</p> 
                                <p>: 3</p> 
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="2"><b>Gaji Pokok</b> </td>
                                <td>110.000</td>
                            </tr>
                            <tr>
                                <td colspan="2"><b>Kehadiran</b> </td>
                                <td>11,0</td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                <b> Lembur</b> 
                                </td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <td rowspan="2" ><b>Revisi</b> </td> 
                                <td><b>tambahan</b> </td>
                                <td>0</td>
                            </tr>
                            <td><b>potongan</b> </td>
                            <td>0</td>
                            <tr>
                                <td colspan="2"><b>BPJS Kes</b> </td>
                                <td>0</td>
                            </tr>
                            <tr> 
                                <td colspan="2"><b>BPJS TK</b> </td>
                                <td>0</td>
                            </tr>
                            <tr>
                                
                                <td colspan="2" style="text-align: right;"><b>Jumlah Yang  diterima</b></td>
                                <td>5.200.000</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card" id="card_borongan">
            <div class="card-head" style="display: flex; justify-content: flex-end;">
                <button type="button" class="btn btn-primary" style="margin: 15px; margin-bottom: -5px;" onclick="generatePDF2()"><i class="fas fa-file-pdf" style="margin-right: 5px;"></i>Cetak PDF</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="tbl-borongan" border="1" style="width: 24.3cm;">
                        <thead>
                            <tr>
                                <th style="border: none; text-align: left;">
                                    <p>Nama </p>
                                    <p>Divisi </p>
                                    <p>Periode</p>
                                    <p>No.Rekening </p>
                                </th>
                                <th style="border: none; text-align: left;">
                                    <p>: NIA NUR FARIDA</p>
                                    <p>: Cabut & DRY</p>
                                    <p>: 01-10-2023 s/d 15-10-2023</p>
                                    <p>: 1117992701 (Bank BNI)</p>
                                </th>
                            </tr>
                            <tr>
                                <th colspan="2">Tanggal</th>
                                <th>Jumlah gram</th>
                                <th>Jumlah</th>
                                <th>Intensif</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="2">Minggu 01-10-2023</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <td colspan="2">Senin 02-10-2023</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <td colspan="2">Selasa 03-10-2023</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <td colspan="2">Rabu 04-10-2023</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td rowspan="2">
                                    <b>Revisi</b>
                                </td>
                                <td>
                                    <b>Tambahan</b>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Potongan</b>
                                </td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <td colspan="4">
                                    <b>BPJS Kes</b>
                                </td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <td colspan="4">
                                    <b>BPJS TK</b>
                                </td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <td colspan="4" style="text-align: right;"><b>Jumlah yang Diterima</b></td>
                                <td>0</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>  
    $("#mnpenggajian").addClass("active");
    jenis_gaji();
    function jenis_gaji(){
        // var jenis_gaji = "Harian";
        var jenis_gaji = '<?= $jenis_gaji; ?>';
        if (jenis_gaji === "Borongan") {
            $("#card_borongan").show();
            $("#card_harian").hide();
        } else if (jenis_gaji === "Harian") {
            $("#card_borongan").hide();
            $("#card_harian").show();
        } else {
            console.log("Jenis gaji tidak valid");
        }
    }
    
    function generatePDF1() {
        printJS({
            printable: 'tbl-harian',  
            type: 'html',
            documentTitle: 'Penggajian Bulan <?= date('F'); ?>.pdf' 
        });
    }
    function generatePDF2() {
        printJS({
            printable: 'tbl-borongan',  
            type: 'html',
            documentTitle: 'Penggajian Bulan <?= date('F'); ?>.pdf' 
        });
    }

</script>
