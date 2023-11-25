<div class="panel-header bg-primary-gradient" style="margin-top: -30px">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
            <h3 class="font-weight-bold text-white">SELAMAT DATANG, <?= $nama; ?> (<?= $karyawan_id; ?>)</h3>
                <h4 class="text-white op-7 mb-2">Data Pengajuan Karyawan</h4>
            </div>
        </div>
    </div>
</div>
<div class="page-inner mt--5">
    <div class="row mt--2">
        <div class="col-md-6" >
            <div class="card card-success" onclick="approval1_tampil()">
                <div class="card-body">
                    <h4 class="text-center">Jumlah Approval 1</h4>
                    <div class="text-center" id="jmlapproval1">???</div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-danger" onclick="approval2_tampil()">
                <div class="card-body">
                    <h4 class="text-center">Jumlah Approval 2</h4>
                    <div class="card-category text-center" id="jmlapproval2">???</div>
                </div>
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
                        <th style="text-align: center">Id Karyawan</th>
                        <th style="text-align: center">Nama Karyawan</th>
                        <th style="text-align: center">Jenis Pengajuan</th>
                        <th style="text-align: center">Tanggal Pengajuan</th>
                        <th style="text-align: center">Tanggal Mulai-Selesai</th>
                        <th style="text-align: center">Keterangan</th>
                        <th style="text-align: center">Status</th>
                        <th style="text-align: center">Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="approvedModal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" onclick="approved1($id)">Approved 1</button>
			</div>
		</div>
	</div>
</div>

<script>  
    $("#mnapprov").addClass("active");
    semua();
    function semua() {
        if ($.fn.DataTable.isDataTable('#tblx')) {
            $('#tblx').DataTable().destroy();
        }
        $.ajax({
            url: "<?=base_url('Home/approval1_tampil');?>",
            dataType: "json",
            success: function(data1) {
                $.ajax({
                    url: "<?=base_url('Home/approval2_tampil');?>",
                    dataType: "json",
                    success: function(data2) {
                        var combinedData = data1.data.concat(data2.data);
                        let semua = $('#tblx').DataTable({
                            data: combinedData,
                        });
                    }
                });
            }
        });
    }
    function approval1_tampil() {
        if ($.fn.DataTable.isDataTable('#tblx')) {
            $('#tblx').DataTable().destroy();
        }
        let approval1 = $('#tblx').DataTable(
            {
                "ajax": "<?=base_url('Home/approval1_tampil');?>"
            }
        ); 
    }
    function approval2_tampil() {
        if ($.fn.DataTable.isDataTable('#tblx')) {
            $('#tblx').DataTable().destroy();
        }
        let approval2 = $('#tblx').DataTable(
            {
                "ajax": "<?=base_url('Home/approval2_tampil');?>"
            }
        );
    }
    function approval1(id) {
        swal({
            title: "Konfirmasi",
            text: "Apakah Anda yakin ingin menyetujui pengajuan?",
            icon: "warning",
            buttons: {
                confirm: {
                    text: 'Ya',
                    className: 'btn btn-success'
                },
                cancel: {
                    text: 'Batal',
                    className: 'btn btn-danger',
                    visible: true,
                }
            }
        }).then((confirmed) => {
            if (confirmed) {
                $.ajax({
                    url: "<?= base_url(); ?>" + "Home/pengajuan_approval1",
                    method: 'POST',
                    data: { id: id },
                    success: function (result) {
                        swal({
                            title: "Berhasil",
                            text: "Berhasil Approved",
                            icon: "success",
                            buttons: {
                                confirm: {
                                    text: 'OK',
                                    className: 'btn btn-success'
                                },
                            }
                        }).then(() => {
                            tblx.ajax.reload();
                            tblx1.ajax.reload();
                            tblx2.ajax.reload();
                        });
                    },
                    error: function () {
                        swal({
                            title: "Gagal",
                            text: "Gagal Approved",
                            icon: "error"
                        });
                    }
                });
            } else {
                console.log('Konfirmasi dibatalkan.');
            }
        });
    }
    function approval2(id) {
        swal({
            title: "Konfirmasi",
            text: "Apakah Anda yakin ingin menyetujui pengajuan?",
            icon: "warning",
            buttons: {
                confirm: {
                    text: 'Ya',
                    className: 'btn btn-success'
                },
                cancel: {
                    text: 'Batal',
                    className: 'btn btn-danger',
                    visible: true,
                }
            }
        }).then((confirmed) => {
            if (confirmed) {
                $.ajax({
                    url: "<?= base_url(); ?>" + "Home/pengajuan_approval2",
                    method: 'POST',
                    data: { id: id },
                    success: function (result) {
                        swal({
                            title: "Berhasil",
                            text: "Berhasil Approved",
                            icon: "success",
                            buttons: {
                                confirm: {
                                    text: 'OK',
                                    className: 'btn btn-success'
                                },
                            }
                        }).then(() => {
                            tblx.ajax.reload();
                            tblx1.ajax.reload();
                            tblx2.ajax.reload();
                        });
                    },
                    error: function () {
                        swal({
                            title: "Gagal",
                            text: "Gagal Approved",
                            icon: "error"
                        });
                    }
                });
            } else {
                console.log('Konfirmasi dibatalkan.');
            }
        });
    }
    function cancel(id) {
        swal({title: 'Keterangan Cancel', html: '',content: { element: "input", attributes: { placeholder: "Input Something",type: "text", id: "input-field",className: "form-control"},},
            buttons: {confirm: { text: 'Ya', className: 'btn btn-success'
                },
                cancel: { text: 'Batal', className: 'btn btn-danger', visible: true,
                }
            }
        }).then((confirmed) => {
            if (confirmed) {
                let ket_cancel = $("#input-field").val();
                $.ajax({
                    url: "<?= base_url(); ?>" + "Home/pengajuan_cancel",
                    method: 'POST',
                    data: { id: id, ket_cancel: ket_cancel },
                    success: function (result) {
                        swal({title: "Berhasil", text: "Berhasil Cancel",icon: "success", 
                            buttons: {confirm: {text: 'OK', className: 'btn btn-success'},
                            }
                        }).then(() => {
                            tblx.ajax.reload();
                            tblx1.ajax.reload();
                            tblx2.ajax.reload();
                        });
                    },
                    error: function () {
                        swal({title: "Gagal", text: "Gagal Cancel", icon: "error"});
                    }
                });
            }
        });
    }

    $.ajax({
        url: "<?=base_url('Home/jumlahApproval1');?>",
        method: "GET",
        dataType: "json",
        success: function (data) {
            $('#jmlapproval1').text(data)
        },
        error: function () {
            console.log('Ada masalah dalam permintaan GET');
        }
    });

    $.ajax({
        url: "<?=base_url('Home/jumlahApproval2');?>",
        method: "GET",
        dataType: "json",
        success: function (data) {
            $('#jmlapproval2').text(data)
        },
        error: function () {
            console.log('Ada masalah dalam permintaan GET');
        }
    });

</script>
