<div class="col-md-12" style="margin-top: 15px">
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
                    <select class="form-control">
                        <option ><?= $karyawan_id; ?></option>
                    </select> 
                </div>
                <div class="form-group col-md-4">
                    <label>Jenis Pengajuan</label>
                    <select class="form-control" id="cbojenis">
                        <option value="Izin">Izin</option>
                    </select> 
                </div>
                <div class="form-group col-md-6">
                    <label>Jenis Izin</label>
                    <select class="form-control ftambah" id="cboizin">
                        <option value="">Pilih Jenis Izin</option>
                    </select> 
                </div>
                <div class="form-group col-md-6">
                    <label>Keterangan</label>
                    <textarea class="form-control ftambah" id="txtket" onkeydown="if(event.key === 'Enter') event.preventDefault()"></textarea>
                </div>
                <div class="form-group col-md-6">
                    <label>Tanggal Mulai</label>
                    <input type="date" class="form-control ftambah" id="txtmulai">
                </div>
                <div class="form-group col-md-6">
                    <label>Tanggal Selesai</label>
                    <input type="date" class="form-control ftambah" id="txtselesai">
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
    $("#mnpengajuan").addClass("active"); 
    $("#pengajuan").addClass("show");
    $("#mnizin").addClass("active");
    let tblx = $('#tblx').DataTable(
        {
            "ajax": "<?=base_url('Home/izin_tampil');?>"
        }
    );

    $(document).ready(function () {
        izinoption();
    });

    function izinoption() {
        $.ajax({
            url: "<?= base_url('Home/listIzin'); ?>",
            method: "GET",
            dataType: "json",
            success: function (data) {
                const cboizin = $("#cboizin");

                if (Array.isArray(data)) {
                    data.forEach(function(v) {
                        cboizin.append(`<option value="${v.id}">${v.tipe}</option>`);
                    });
                }
            },
            error: function (error) {
                console.error("Error fetching data from the API:", error);
            }
        });
    }

    function reset() {
        $("#txtmulai").val("");
        $("#txtselesai").val("");
        $("#cboizin").val("");
        $("#txtket").val("");
    }

    function tambah(){
        $("#btn_tambah").attr("disabled", true);
        $("#btn_reset").attr("disabled", true);
        let jenis_pengajuan = $("#cbojenis").val(); 
        let tanggal_start = $("#txtmulai").val();
        let tanggal_end = $("#txtselesai").val();
        let jenis_izin_id = $("#cboizin").val();
        let keterangan = $("#txtket").val();  
        let status = "Proses";
        
        if( tanggal_start == "" || tanggal_end == "" || jenis_izin_id == "" || keterangan == "" ){
            swal({title:"Gagal", text:"Ada Isian Yang Kosong", icon: "error"});
            $("#btn_tambah").attr("disabled", false);
            $("#btn_reset").attr("disabled", false);
            return;
        }
            
        if (tanggal_start > tanggal_end) {
            swal({ title: "Gagal", text: "Tanggal mulai tidak boleh lebih besar dari tanggal selesai", icon: "error" });
            return;
        }  
        swal({
            title: 'Loading...',
            text: "Mohon Tunggu sedang Diproses....", 
            icon: "info" 
        });
        $.ajax({
            url: "<?= base_url('Home/pengajuan_tambah'); ?>", 
            method: "POST",
            data: {jenis_pengajuan: jenis_pengajuan, tanggal_start: tanggal_start, tanggal_end: tanggal_end, jenis_izin_id: jenis_izin_id, keterangan: keterangan, status: status},
            cache: false,
            success: function(response){
                swal.close();
                swal({ title: "Berhasil", text: response, icon: "success" });
                $(".ftambah").val("");
            },
            error: function(){
                swal.close();
                swal({title:"Gagal", text:"Tidak Terhubung dengan Server", icon: "error"});
            }
        })
    }

</script>
