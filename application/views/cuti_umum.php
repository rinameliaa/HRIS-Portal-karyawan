<div class="col-md-12">
    <div class="card">
        <div class="card-body" id="pengajuan">
            <div class="row">
                <div class="form-group col-md-4">
                    <label>Nama</label>
                    <select class="form-control">
                        <option ><?= $nama; ?></option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label>ID Karyawan</label>
                    <select class="form-control" id="iduser">
                        <option ><?= $iduser; ?></option>
                    </select> 
                </div>
                <div class="form-group col-md-4">
                    <label>Jenis Pengajuan</label>
                    <select class="form-control" id="cbojenis">
                        <option value="Cuti">Cuti</option>
                    </select> 
                </div>
                <div class="form-group col-md-6">
                    <label>Jenis Cuti</label>
                    <select class="form-control ftambah" id="cbocuti">
                        <option value="">Pilih Jenis Cuti</option>
                    </select>  
                </div>
                <div class="form-group col-md-6">
                    <label>Sisa Cuti</label>
                    <input type="text" class="form-control" id="cbosisa" readonly> 
                </div>
                <div class="form-group col-md-6">
                    <label>Tanggal Mulai</label>
                    <input type="date" class="form-control ftambah" id="txtmulai">
                </div>
                <div class="form-group col-md-6">
                    <label>Tanggal Selesai</label>
                    <input type="date" class="form-control ftambah" id="txtselesai">
                </div>
                <div class="form-group col-md-12">
                    <label>Keterangan</label>
                    <textarea class="form-control ftambah" id="txtket"></textarea>
                </div>
            </div>
        </div>
        <div class="card-tools">
            <div class="modal-footer">
                <button type="button" class="btn btn-primary mx-auto d-block" onclick="tambah()">Ajukan Permohonan</button>
                <button type="button" class="btn btn-danger mx-auto d-block" onclick="reset()">Reset Permohonan</button>
            </div>
        </div>
    </div>
</div>

<script>  
    let tblx = $('#tblx').DataTable(
        {
            "ajax": "<?=base_url('Home/izin_tampil');?>"
        }
    );

    $(document).ready(function () {
        sisa_cuti()
        cutioption();
        $("#txtmulai").change(updateEndDate);

        function formatDate(date) {
            var dd = date.getDate();
            var mm = date.getMonth() + 1;
            var yyyy = date.getFullYear();
            return dd + '/' + mm + '/' + yyyy;
        }

        function updateEndDate() {
            var mulai = $("#txtmulai").val();
            var izin = $("#cbocuti").val();

            if (mulai) {
                $.ajax({
                    url: "http://103.215.177.169/hris_dev/API/Pengajuan/tipe_cuti",
                    method: "GET",
                    dataType: "json",
                    success: function (data) {
                        var jumlah_hari = 0; 
                        for (var i = 0; i < data.length; i++) {
                            if (data[i].id === izin) {
                                jumlah_hari = parseInt(data[i].jumlah_hari);
                                break;
                            }
                        }

                        if (jumlah_hari > 0) {
                            var startDate = new Date(mulai);
                            startDate.setDate(startDate.getDate() + jumlah_hari);
                            $("#txtselesai").val(formatDate(startDate));
                        } else {
                            $("#txtselesai").val("Tidak ada jumlah hari yang sesuai.");
                        }
                    },
                    error: function () {
                        console.log('Ada masalah dalam permintaan GET');
                    }
                });
            } else {
                $("#txtselesai").val("");
            }
        }
    });

    function cutioption() {
        $.ajax({
            url: "http://103.215.177.169/hris_dev/API/Pengajuan/tipe_cuti",
            method: "GET",
            dataType: "json",
            success: function (data) {
                let cboizin = $("#cbocuti");

                if (Array.isArray(data)) {
                    data.forEach(function(v) {
                        if (v.tipe == "Cuti Tahunan") {
                            cboizin.append(`<option value="${v.id}">${v.tipe} (${v.jumlah_hari} Hari )</option>`);
                        }
                    });
                }
            },
            error: function (error) {
                console.error("Error data from the API:", error);
            }
        });
    }

    function sisa_cuti(){
        let id = '<?= $iduser; ?>';
        $.ajax({
            url: "http://103.215.177.169/hris_dev/API/Employee/checkSisaCutiTahunan?id=" + id,
            method: "GET",
            success: function (data) {
                let cbosisa = $("#cbosisa").val(data);
                console.log(data);
            },
            error: function () {
                console.error("Gagal ambil data dari API");
            }
        });
    }

    function reset() {
        $("#txtmulai").val("");
        $("#txtselesai").val("");
        $("#cbocuti").val("");
        $("#txtket").val("");
    }

    function tambah(){
        $("#btn_tambah").attr("disabled", true);
        $("#btn_reset").attr("disabled", true);
        let jenis_pengajuan = $("#cbojenis").val(); 
        let tanggal_start = $("#txtmulai").val();
        let tanggal_end = $("#txtselesai").val();
        let jenis_cuti_id = $("#cbocuti").val();
        let sisacuti = $("#cbosisa").val();
        let keterangan = $("#txtket").val();  
        let status = "proses";

        if (sisacuti === "0") {
            swal({ title: "Gagal", text: "Tidak bisa mengajukan cuti karena sisa cuti Anda 0", icon: "error" });
            return; 
        }
        
        if( tanggal_start == "" || tanggal_end == "" || jenis_cuti_id == "" || keterangan == ""){
            swal({title:"Gagal", text:"Ada Isian Yang Kosong", icon: "error"});
            $("#btn_tambah").attr("disabled", false);
            $("#btn_reset").attr("disabled", false);
            return;
        }
        
        let startDate = new Date(tanggal_start);
        let endDate = new Date(tanggal_end);
        
        if (startDate > endDate) {
            swal({ title: "Gagal", text: "Tanggal mulai tidak boleh lebih besar dari tanggal selesai", icon: "error" });
        } else if (startDate <= endDate && endDate > startDate) {
            let timeDiff = endDate.getTime() - startDate.getTime();
            let dayDiff = Math.ceil(timeDiff / (1000 * 3600 * 24));

            if (dayDiff > sisacuti) {
                swal({ title: "Gagal", text: "Jumlah cuti yang diajukan melebihi sisa cuti Anda", icon: "error" });
            } else if (tanggal_start === "" || tanggal_end === "" || jenis_cuti_id === "" || keterangan === "") {
                swal({ title: "Gagal", text: "Ada Isian Yang Kosong", icon: "error" });
                $("#btn_tambah").attr("disabled", false);
                $("#btn_reset").attr("disabled", false);
                return;
            } else {
                $.ajax({
                    url: "<?= base_url(); ?>" + "Home/pengajuan_tambah", 
                    method: "POST",
                    data: {jenis_pengajuan: jenis_pengajuan, tanggal_start: tanggal_start, tanggal_end: tanggal_end, jenis_cuti_id: jenis_cuti_id, keterangan: keterangan, status: status},
                    cache: false,
                    success: function(x){
                        let hasil = atob(x);
                        let param = hasil.split("|");
                        if(param[0] == "1"){
                            swal({title:"Berhasil", text: param[1], icon: "success"});
                            $(".ftambah").val("");
                        }else{
                            swal({title:"Gagal", text: param[1], icon: "error"});
                        }
                    },
                    error: function(){
                        swal({title:"Gagal", text:"Tidak Terhubung dengan Server", icon: "error"});
                    }
                })
            }
        }
    }

</script>
