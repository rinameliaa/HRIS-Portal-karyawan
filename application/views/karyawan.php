<div class="row">
    <div class="col-md-12">
        <div class="card-header">
            <div class="card-title">Data Karyawan</div>
            <br/>
            <div class="card-tools">
                <?php
                    if($hakakses[0] == "1"){
                        echo '<button type="button" class="btn btn-primary" style="margin-bottom: 20px;" data-toggle="modal" data-target="#modaltambah" data-toggle="modal" data-backdrop="static" data-keyboard="false">Tambah Data</button>&nbsp';
                    }
                ?>
                <button type="button" class="btn btn-danger" style="margin-bottom: 20px;" onclick="tblx.ajax.reload()">Refresh Data</button>
            </div>
        <div class="col-md-12">
        <div class="card">
        <div class="card-body">
            <div class="table-responsive">
            <table id="tblx" class="display table table-striped table-hover">
                <thead>
                    <tr>
                        <th style="width: 5%">Kelola</th>
                        <th style="width: 10%">ID</th>
                        <th style="width: 20%">Nik</th>
                        <th style="width: 25%">Nama</th>
                        <th style="width: 10%">TTL</th>
                        <th style="width: 10%">Pendidikan</th>
                        <th style="width: 20%">Departemen</th>
                    </tr>
                </thead>
            </table>
            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" role="dialog" id="modaltambah">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Karyawan</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>ID Karyawan</label>
                            <input type="numeric" class="form-control ftambah" id="txtid" readonly placeholder="Otomatis By Sistem">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Nik</label>
                            <input type="text" maxlength="16" class="form-control ftambah" id="txtnik">
                        </div>
                        <div class="form-group col-md-12">
                            <label>Nama</label>
                            <input type="text" class="form-control ftambah" id="txtnama">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Tempat Lahir</label>
                            <input type="text" class="form-control ftambah" id="txttempat">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Tanggal Lahir</label>
                            <input type="date" class="form-control ftambah" id="txtlahir">
                        </div>
                        <div class="form-group col-md-12">
                            <label>Pendidikan</label>
                            <select class="form-control ftambah" id="cbopend">
                                <option value="">Pilih Salah Satu</option>
                                <?php
                                    if(is_array($dtpendidikan)){
                                        if(count($dtpendidikan)>0){
                                            foreach($dtpendidikan as $k){
                                                $id = $k->id_pendidikan;
                                                $nama = $k->nama_pendidikan;
                                                echo "<option value='$id'>$nama</option>";
                                            }
                                        }
                                    }
                                ?>
                            </select>    
                        </div>
                        <div class="form-group col-md-6">
                            <label>Departemen</label>
                            <select class="form-control ftambah" id="cbodepar">
                            <option value="">Pilih Salah Satu</option>
                                <?php
                                    if(is_array($dtdepartemen)){
                                        if(count($dtdepartemen)>0){
                                            foreach($dtdepartemen as $k){
                                                $id = $k->id_departemen;
                                                $nama = $k->nama_departemen;
                                                echo "<option value='$id'>$nama</option>";
                                            }
                                        }
                                    }
                                ?>
                            </select>    
                        </div>
                        <div class="form-group col-md-6">
                            <label>Level</label>
                            <select class="form-control ftambah" id="cbolevel">
                            <option value="">Pilih Salah Satu</option>
                                <?php
                                    if(is_array($dtlevel)){
                                        if(count($dtlevel)>0){
                                            foreach($dtlevel as $k){
                                                $id = $k->id_level_grade;
                                                $nama = $k->nama_level;
                                                echo "<option value='$id'>$nama</option>";
                                            }
                                        }
                                    }
                                ?>
                            </select>    
                        </div>
                        <div class="form-group col-md-6">
                            <label>Status</label>
                            <select class="form-control ftambah" id="cbostatus">
                                <option value="1">Aktif</option>
                                <option value="0">Tidak Aktif</option>
                            </select>      
                        </div>
                        <div class="form-group col-md-6">
                            <label>Username</label>
                            <input type="text" class="form-control ftambah" id="txtusername">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Password</label>
                            <input type="password" class="form-control ftambah" id="txtpassword1">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Konfirmasi Password</label>
                            <input type="password" class="form-control ftambah" id="txtpassword2">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="btn_tambah" onclick="tambah()">Save</button>
                    <button type="button" class="btn btn-danger" id="btn_reset" onclick="$('#modaltambah').modal('hide')">Reset</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" role="dialog" id="modalupdate">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Data Karyawan</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>ID Karyawan</label>
                            <input type="numeric" class="form-control fupdate" id="txtide" readonly placeholder="Otomatis By Sistem">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Nik</label>
                            <input type="text" maxlength="16" class="form-control fupdate" id="txtnike">
                        </div>
                        <div class="form-group col-md-12">
                            <label>Nama</label>
                            <input type="text" class="form-control fupdate" id="txtnamae">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Tempat Lahir</label>
                            <input type="text" class="form-control fupdate" id="txttempate">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Tanggal Lahir</label>
                            <input type="date" class="form-control fupdate" id="txtlahire">
                        </div>
                        <div class="form-group col-md-12">
                            <label>Pendidikan</label>
                            <select class="form-control fupdate" id="cbopende">
                                <option value="">Pilih Salah Satu</option>
                                <?php
                                    if(is_array($dtpendidikan)){
                                        if(count($dtpendidikan)>0){
                                            foreach($dtpendidikan as $k){
                                                $id = $k->id_pendidikan;
                                                $nama = $k->nama_pendidikan;
                                                echo "<option value='$id'>$nama</option>";
                                            }
                                        }
                                    }
                                ?>
                            </select>    
                        </div>
                        <div class="form-group col-md-6">
                            <label>Departemen</label>
                            <select class="form-control fupdate" id="cbodepare">
                            <option value="">Pilih Salah Satu</option>
                                <?php
                                    if(is_array($dtdepartemen)){
                                        if(count($dtdepartemen)>0){
                                            foreach($dtdepartemen as $k){
                                                $id = $k->id_departemen;
                                                $nama = $k->nama_departemen;
                                                echo "<option value='$id'>$nama</option>";
                                            }
                                        }
                                    }
                                ?>
                            </select>    
                        </div>
                        <div class="form-group col-md-6">
                            <label>Level</label>
                            <select class="form-control fupdate" id="cbolevele">
                            <option value="">Pilih Salah Satu</option>
                                <?php
                                    if(is_array($dtlevel)){
                                        if(count($dtlevel)>0){
                                            foreach($dtlevel as $k){
                                                $id = $k->id_level_grade;
                                                $nama = $k->nama_level;
                                                echo "<option value='$id'>$nama</option>";
                                            }
                                        }
                                    }
                                ?>
                            </select>    
                        </div>
                        <div class="form-group col-md-6">
                            <label>Status</label>
                            <select class="form-control fupdate" id="cbojenise">
                                <option value="1">Aktif</option>
                                <option value="0">Tidak Aktif</option>
                            </select>      
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="btn_update" onclick="update()">Update</button>
                    <button type="button" class="btn btn-danger" id="btn_batal" onclick="$('#modalupdate').modal('hide')">Batal</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>  
    let tblx = $('#tblx').DataTable(
        {
            "ajax": "<?=base_url('Home/karyawan_tampil');?>"
        }
    );

    function tambah(){
        $("#btn_tambah").attr("disabled", true);
        $("#btn_reset").attr("disabled", true);
        let nik = $("#txtnik").val();
        let nama = $("#txtnama").val();
        let tempat = $("#txttempat").val();
        let tanggal = $("#txtlahir").val();
        let pendidikan = $("#cbopend").val();
        let departemen = $("#cbodepar").val();
        let level = $("#cbolevel").val();
        let status = $("#cbostatus").val();
        let username = $("#txtusername").val();
        let password1 = $("#txtpassword1").val();
        let password2 = $("#txtpassword2").val();
        if(nik == "" || nama == "" || tempat == "" || tanggal == "" || pendidikan == "" || departemen == "" || level == "" || status == "" || username == "" || password1== ""|| password2 == ""){
            swal({title:"Gagal", text:"Ada Isian Yang Kosong", icon: "error"});
            $("#btn_tambah").attr("disabled", false);
            $("#btn_reset").attr("disabled", false);
            return;
        }
        if(password1 != password2){
            swal({title:"Gagal", text:"Password Yang Anda Masukkan Tidak Sama", icon: "error"});
            $("#btn_tambah").attr("disabled", false);
            $("#btn_reset").attr("disabled", false);
            return;
        }
        $.ajax({
            url: "<?= base_url(); ?>" + "Home/karyawan_tambah",
            method: "POST",
            data: {nik: nik, nama: nama, tempat: tempat, tanggal: tanggal, pendidikan: pendidikan, departemen: departemen, level: level, status: status, username: username, password: password1},
            cache: "false",
            success: function (response) {
                let result = JSON.parse(atob(response)); 

                if (result[0] === "1") { 
                    swal({
                        title: "Berhasil",
                        text: result[1],
                        icon: "success"
                    });
                    $(".ftambah").val("");
                    $("#cbostatus").val("Diproses");
                } else {
                    swal({title:"Gagal", text: param[1], icon: "error"});
                }
            },
            error: function(){
                swal({title:"Gagal", text:"Tidak Terhubung dengan Server", icon: "error"});
            }
        })
    }
    function filter(el){
        let id = $(el).data("id");
        if(id == ""){
            swal({title:"Gagal", text:"Karyawan Tidak Terdeteksi", icon:"error"});
            return;
        }
        $.ajax({
            url: "<?= base_url(); ?>" + "Home/karyawan_filter",
            method: "POST",
            data: {id: id},
            cache: "false",
            success: function(x){
                let hasil = atob(x); 
                let param = hasil.split("|"); 
                if(param[0] == "1"){
                    $("#txtide").val(param[1]);
                    $("#txtnike").val(param[2]);
                    $("#txtnamae").val(param[3]);
                    $("#txttempate").val(param[4]);
                    $("#txtlahire").val(param[5]);
                    $("#cbopende").val(param[6]);
                    $("#cbodepare").val(param[7]);
                    $("#cbolevele").val(param[8]);
                    $("#cbostatuse").val(param[9]);
                    $("#modalupdate").modal({backdrop: 'static', keyboard: false});
                }else{
                    swal({title:"Gagal", text: param[1], icon: "error"});
                }
            },
            error: function(){
                swal({title:"Gagal", text:"Tidak Terhubung dengan Server", icon: "error"});
            }
        })
    }
    function update(){
        let id = $("#txtide").val();
        let nik = $("#txtnike").val();
        let nama = $("#txtnamae").val();
        let tempat = $("#txttempate").val();
        let tanggal = $("#txtlahire").val();
        let pendidikan = $("#cbopende").val();
        let departemen = $("#cbodepare").val();
        let level = $("#cbolevele").val();
        let status = $("#cbostatuse").val();
        if(nik == "" || nama == "" || tempat == "" || tanggal == "" || pendidikan == "" || departemen == "" || level == "" || status == ""){
            swal({title:"Gagal", text:"Ada Isian Yang Kosong", icon: "error"});
            return;
        }
        $.ajax({
            url: "<?= base_url(); ?>" + "Home/karyawan_update",
            method: "POST",
            data: {id: id, nik: nik, nama: nama, tempat: tempat, tanggal: tanggal, pendidikan: pendidikan, departemen: departemen, level: level, status: status},
            cache: "false",
            success: function(x){
                let hasil = atob(x); //sama fungsinya kayak decode pada php
                let param = hasil.split("|");
                if(param[0] == "1"){
                    swal({title:"Berhasil", text: param[1], icon: "success"});
                    $(".fupdate").val("");
                    $("#modalupdate").modal("hide");
                    tblx.ajax.reload();
                }else{
                    swal({title:"Gagal", text: param[1], icon: "error"});
                }
            },
            error: function(){
                swal({title:"Gagal", text:"Tidak Terhubung dengan Server", icon: "error"});
            }
        })
    }
    function hapus(el){
        let id = $(el).data("id");
        if(id == ""){
            swal({title:"Gagal",text:"Akun Tidak Terhubung dengan Server", icon: "error"});
        }
        swal({
            title: 'Konfirmasi',
            text: "Anda Yakin Ingin Menghapus?",
            icon: 'warning',
            buttons: {
                confirm: {text: 'Yakin', className: 'btn btn-primary'},
                cancel: {visible: true, text: 'Tidak', className: 'btn btn-danger'}
            }
        })
        .then((hapus) => {
            if(hapus){
                $.ajax({
                    url: "<?= base_url(); ?>" + "Home/karyawan_hapus",
                    method: "POST",
                    data: {id: id},
                    cache: "false",
                    success: function(x){
                        var hasil = atob(x);
                        var param= hasil.split("|");
                        if(param[0] == "1"){
                            swal({title: "Berhasil", text: param[1], icon: "success"});
                            $("#modalupdate").modal("hide");
                            tblx.ajax.reload();
                        }else{
                            swal({title: "Gagal", text: param[1], icon: "error"});
                        }
                    },
                    error: function(){
                        swal({title: "Gagal", text: "Koneksi API Gagal", icon: "error"});
                    }
                })
            }
        })
    }
</script>
