<div class="col-md-12">
    <div class="card">
        <div class="card-body" id="pengajuan">
            <div class="row">
                <div class="form-group col-md-4">
                    <label>Nama</label>
                    <select class="form-control ftambah">
                        <option ><?= $nama; ?></option>
                    </select>
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
                        <option value="Cuti">Cuti</option>
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
                    <label>ID Approval 1</label>
                    <select class="form-control ftambah" >
                        <option><?= $atasan; ?></option>
                    </select> 
                </div>
                <div class="form-group col-md-6">
                    <label>ID Approval 2</label>
                    <select class="form-control ftambah">
                        <option><?= $senior; ?></option>
                    </select> 
                </div>
                <div class="form-group col-md-6">
                    <label>Keterangan</label>
                    <textarea class="form-control ftambah" id="txtket"></textarea>
                </div>
                <div class="form-group col-md-6">
                    <label>Status</label>
                    <select class="form-control ftambah" id="cbostatus">
                        <option value="Proses">Diproses</option>
                    </select>  
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
        $("#txtmulai").val("");
        $("#txtselesai").val("");
        $("#txtket").val("");
    }

    function tambah(){
    $("#btn_tambah").attr("disabled", true);
    $("#btn_reset").attr("disabled", true);
    let tanggal_start = $("#txtmulai").val();
    let tanggal_end = $("#txtselesai").val();
    let keterangan = $("#txtket").val(); 
    
    if( tanggal_start == "" || tanggal_end == "" || keterangan == "" ){
        swal({title:"Gagal", text:"Ada Isian Yang Kosong", icon: "error"});
        $("#btn_tambah").attr("disabled", false);
        $("#btn_reset").attr("disabled", false);
        return;
    }
    
    $.ajax({
        url: "<?= base_url(); ?>" + "Home/pengajuan_tambah", 
        method: "POST",
        data: {tanggal_start: tanggal_start, tanggal_end: tanggal_end, keterangan: keterangan},
        cache: false,
        success: function(x){
            let hasil = atob(x);
            let param = hasil.split("|");
            if(param[0] == "1"){
                swal({title:"Berhasil", text: param[1], icon: "success"});
                $(".ftambah").val("");
                $("#cbostatus").val("Proses");
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
