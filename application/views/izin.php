<div class="col-md-12">
    <div class="card">
        <div class="card-body" id="pengajuan">
            <div class="row">
                <div class="form-group col-md-4">
                    <label>ID Pengajuan</label>
                    <input type="numeric" class="form-control ftambah" readonly placeholder="Otomatis By Sistem">
                </div>
                <div class="form-group col-md-4">
                    <label>ID Karyawan</label>
                    <select class="form-control ftambah">
                        <option ><?= $iduser; ?></option>
                    </select> 
                </div>
                <div class="form-group col-md-4">
                    <label>Jenis Pengajuan</label>
                    <select class="form-control ftambah" id="cbojenis">
                        <option value="Izin">Izin</option>
                    </select> 
                </div>
                <div class="form-group col-md-6">
                    <label>Tanggal Mulai</label>
                    <input type="date" class="form-control ftambah" id="txtmulai">
                </div>
                <div class="form-group col-md-6">
                    <label>Tanggal Selesai</label>
                    <input type="date" class="form-control ftambah" id="txtselesai">
                </div>
                <div class="form-group col-md-6">
                    <label>Jenis Izin</label>
                    <select class="form-control ftambah" id="cbocuti">
                        <option value="cuti">option</option>
                    </select>  
                </div>
                <div class="form-group col-md-6">
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

    function reset() {
        $("#karyawan_id").val("");
        $("#cbojenis").val("");
        $("#txtmulai").val("");
        $("#txtselesai").val("");
        $("#txtket").val("");
        $("#cbostatus").val("");
    }

    function tambah(){
    $("#btn_tambah").attr("disabled", true);
    $("#btn_reset").attr("disabled", true);
    let karyawan_id = $("#txtid").val(); 
    let jenis_pengajuan = $("#cbojenis").val(); 
    let tanggal_start = $("#txtmulai").val();
    let tanggal_end = $("#txtselesai").val();
    let keterangan = $("#txtket").val();  
    let status = "proses";
    
    if( karyawan_id == "" || jenis_pengajuan == "" || tanggal_start == "" || tanggal_end == "" || keterangan == "" || status == ""){
        swal({title:"Gagal", text:"Ada Isian Yang Kosong", icon: "error"});
        $("#btn_tambah").attr("disabled", false);
        $("#btn_reset").attr("disabled", false);
        return;
    }
    
    $.ajax({
        url: "<?= base_url(); ?>" + "Home/pengajuan_tambah", 
        method: "POST",
        data: {karyawan_id: karyawan_id, jenis_pengajuan: jenis_pengajuan, tanggal_start: tanggal_start, tanggal_end: tanggal_end, keterangan: keterangan, status: status},
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

</script>
