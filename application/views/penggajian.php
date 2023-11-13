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
                        $first_day = date('Y-m-1', strtotime($today));
                        $mid_month1 = date('Y-m-15', strtotime($today));
                        $mid_month2 = date('Y-m-16', strtotime($today));
                        $last_day = date('Y-m-t', strtotime($today));
                    
                        echo "<option value='$first_day|$mid_month1'>$first_day s/d $mid_month1</option>";
                        echo "<option value='$mid_month2|$last_day'>$mid_month2 s/d $last_day</option>";
                        ?>
                    </select> 
                    <button type="button" class="btn btn-primary" style="margin-top: 3px;" onclick="tampil()">Cari</button> 
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt--4" style="margin: 10px">
    <div class="col-md-12">
        <div id="loader" style="display: flex; align-items: center; justify-content: center; height: 50vh;margin: 150px">
            <div class="loader loader-lg"></div>
        </div>
        <div class="card" id="card_harian">
            <div class="card-head" style="display: flex; justify-content: flex-end;">
                <button type="button" class="btn btn-primary" style="margin: 15px; margin-bottom: -5px;" onclick="generatePDF1()"><i class="fas fa-file-pdf" style="margin-right: 5px;"></i>Cetak PDF</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="tbl-harian" border="1" style="width: 24.3cm; ">
                    </table>
                </div>
            </div>
        </div>
        <!-- <div class="card" id="card_borongan">
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
        </div> -->
    </div>
</div>
<script>  
    $("#mnpenggajian").addClass("active");
    $("#card_harian").hide();
    $("#card_borongan").hide();
    $("#loader").hide();
    
    jenis_gaji();
    function jenis_gaji(){
        var jenis_gaji = '<?= $jenis_gaji; ?>';
        if (jenis_gaji === "Borongan") {
            $("#card_borongan").hide();
            $("#card_harian").hide();
        } else if (jenis_gaji === "Harian") {      
            function tampil(){
                $("#loader").show();
                let tanggal = $("#cbotanggal").val();
                var range = tanggal.split("|");
                let start = range[0];
                let end = range[1];
                if(tanggal === 0){
                    swal({ title: "Gagal", text: "Pilih tanggal terleboih dahulu", icon: "error" });
                        return;
                }
                $.ajax({
                    url: "http://103.215.177.169/hris/API/Employee/payslip_harian?employee_id=JBG-2019-129&start_date=2023-10-01&end_date=2023-10-15",
                    // url: "http://103.215.177.169/hris/API/Employee/payslip_harian?employee_id=<?= $karyawan_id ?>&start_date=" + start + "&end_date=" + end ,
                    method: "GET",
                    success: function (data) {
                        var ambildata = data;
                        ambildata.forEach(function (item) {
                            var newRow = $("<tr>");
                            newRow.append(
                                "<th style='border:none; text-align: left;'>" +
                                    "<p>Nama</p>" +
                                    "<p>Divisi</p>" +
                                    "<p>Periode</p>" +
                                    "<p>No. Rekening</p>" +
                                    "<p>No.Urut</p>" +
                                "</th>" +
                                "<th style='border:none; text-align: left;'>" +
                                    "<p>: " + item.fullname + "</p>" +
                                    "<p>: SPV</p>" +
                                    "<p>: " + start + " s/d " + end + "</p>" +
                                    "<p>: " + item.rekening + " (Bank BNI)</p>" +
                                    "<p>: 3 </p>" +
                                "</th>"
                            );
                            $("#tbl-harian").append(newRow);
                            $("#tbl-harian").append(
                                "<tr>" +
                                "<td colspan='2'><b>Gaji Pokok</b></td>" +
                                "<td>" + item.gaji_pokok + "</td>" +
                                "</tr>" +
                                "<tr>" +
                                "<td colspan='2'><b>Kehadiran</b></td>" +
                                "<td>" + item.kehadiran + "</td>" +
                                "</tr>" +
                                "<tr>" +
                                "<td colspan='2'><b>Lembur</b></td>" +
                                "<td>" + item.lembur + "</td>" +
                                "</tr>" +
                                "<tr>" +
                                "<td rowspan='2'><b>Revisi</b></td>" +
                                "<td><b>Tambahan</b></td>" +
                                "<td>" + item.tambahan + "</td>" +
                                "</tr>" +
                                "<tr>" +
                                "<td><b>Potongan</b></td>" +
                                "<td>" + item.potongan + "</td>" +
                                "</tr>" +
                                "<tr>" +
                                "<td colspan='2'><b>BPJS Kes</b></td>" +
                                "<td>" + item.bpjs_kes + "</td>" +
                                "</tr>" +
                                "<tr>" +
                                "<td colspan='2'><b>BPJS TK</b></td>" +
                                "<td>" + item.bpjs_tk + "</td>" +
                                "</tr>" +
                                "<tr>" +
                                "<td colspan='2' style='text-align: right;'><b>Jumlah Yang  diterima</b></td>" +
                                "<td>" + item.total_gaji + "</td>" +
                                "</tr>"
                            );
                        });
                        $("#loader").hide();
                        $("#card_harian").show();
                    },
                    error: function (error) {
                        console.log("Error fetching data: " + JSON.stringify(error));
                    }
                });
            }
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

    function tampil(){
        $("#loader").show();
        let tanggal = $("#cbotanggal").val();
        var range = tanggal.split("|");
        let start = range[0];
        let end = range[1];
        if(tanggal === 0){
            swal({ title: "Gagal", text: "Pilih tanggal terleboih dahulu", icon: "error" });
                return;
        }
        $.ajax({
            url: "http://103.215.177.169/hris/API/Employee/payslip_harian?employee_id=JBG-2019-129&start_date=2023-10-01&end_date=2023-10-15",
            // url: "http://103.215.177.169/hris/API/Employee/payslip_harian?employee_id=<?= $karyawan_id ?>&start_date=" + start + "&end_date=" + end ,
            method: "GET",
            success: function (data) {
                var ambildata = data;
                ambildata.forEach(function (item) {
                    var newRow = $("<tr>");
                    newRow.append(
                        "<th style='border:none; text-align: left;'>" +
                            "<p>Nama</p>" +
                            "<p>Divisi</p>" +
                            "<p>Periode</p>" +
                            "<p>No. Rekening</p>" +
                            "<p>No.Urut</p>" +
                        "</th>" +
                        "<th style='border:none; text-align: left;'>" +
                            "<p>: " + item.fullname + "</p>" +
                            "<p>: SPV</p>" +
                            "<p>: " + start + " s/d " + end + "</p>" +
                            "<p>: " + item.rekening + " (Bank BNI)</p>" +
                            "<p>: 3 </p>" +
                        "</th>"
                    );
                    $("#tbl-harian").append(newRow);
                    $("#tbl-harian").append(
                        "<tr>" +
                        "<td colspan='2'><b>Gaji Pokok</b></td>" +
                        "<td>" + item.gaji_pokok + "</td>" +
                        "</tr>" +
                        "<tr>" +
                        "<td colspan='2'><b>Kehadiran</b></td>" +
                        "<td>" + item.kehadiran + "</td>" +
                        "</tr>" +
                        "<tr>" +
                        "<td colspan='2'><b>Lembur</b></td>" +
                        "<td>" + item.lembur + "</td>" +
                        "</tr>" +
                        "<tr>" +
                        "<td rowspan='2'><b>Revisi</b></td>" +
                        "<td><b>Tambahan</b></td>" +
                        "<td>" + item.tambahan + "</td>" +
                        "</tr>" +
                        "<tr>" +
                        "<td><b>Potongan</b></td>" +
                        "<td>" + item.potongan + "</td>" +
                        "</tr>" +
                        "<tr>" +
                        "<td colspan='2'><b>BPJS Kes</b></td>" +
                        "<td>" + item.bpjs_kes + "</td>" +
                        "</tr>" +
                        "<tr>" +
                        "<td colspan='2'><b>BPJS TK</b></td>" +
                        "<td>" + item.bpjs_tk + "</td>" +
                        "</tr>" +
                        "<tr>" +
                        "<td colspan='2' style='text-align: right;'><b>Jumlah Yang  diterima</b></td>" +
                        "<td>" + item.total_gaji + "</td>" +
                        "</tr>"
                    );
                });
                $("#loader").hide();
                $("#card_harian").show();
            },
            error: function (error) {
                console.log("Error fetching data: " + JSON.stringify(error));
            }
        });
    }

</script>
