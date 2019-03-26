<?php
    include 'app/__API/tanggal-indo.php';
    $qsurat = mysqli_query($conn, "SELECT tanggal_surat FROM surat GROUP BY YEAR(tanggal_surat)");
?>
<section class="section">
    <div class="section-header">
    <h1>Persuratan - Data Terusan</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Persuratan</a></div>
        <div class="breadcrumb-item">Data</div>
    </div>
    </div>
    <div class="row">
        <div class="col-12">
        <div class="card">
                <div class="card-header">
                    <a href="#" id="tambah-data" class="btn btn-primary" data-toggle="modal" data-target="#addModal">Tambah Data</a>
                    <div>
                        <a href="./?page=persuratan" class="btn btn-success">Persuratan</a>
                        <button id="xls" class="btn btn-primary">XLS</button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                        <thead>
                            <tr>
                            <th>No</th>
                            <th>Terusan</th>
                            <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="list_data">
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<button id="editModalOpen" data-toggle="modal" data-target="#editModal"></button>
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog confirm" role="document">
    <form id="addForm" class="needs-validation" novalidate="">
        <input type="hidden" name="status" value="Tambah">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah - Data Terusan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Terusan</label>
                    <input id="terusan_add" type="text" class="form-control" name="terusan" required="">
                    <div class="invalid-feedback">
                        Form Terusan harus diisi!
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button id="addModalClose" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button id="addFormSimpan" type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
        </form>
    </div>
</div>
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog confirm" role="document">
    <form id="editForm" class="needs-validation" novalidate="">
        <input type="hidden" name="status" value="Edit">
        <input type="hidden" id="id_data" name="id">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit - Data Terusan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Terusan</label>
                    <input id="terusan" type="text" class="form-control" name="terusan" required="">
                    <div class="invalid-feedback">
                        Form Terusan harus diisi!
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button id="editModalClose" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button id="editFormSimpan" type="submit" class="btn btn-primary">Perbarui</button>
            </div>
        </div>
        </form>
    </div>
</div>
<div class="modal fade" id="deleteCModal_" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog confirm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah anda yakin ingin menghapus data?
            </div>
            <div class="modal-footer">
                <button id="deleteModalClose" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button id="conf_delete" class="btn btn-danger">Hapus</button>
            </div>
        </div>
    </div>
</div>
<script src="_____/js/jquery.table2excel.min.js"></script>
<script>
    $('#persuratan').addClass('active');
    $('#xls').click(function () {
        $("#table-1").table2excel({
            exclude: ".excludeThisClass",
            name: "Data Disposisi",
            filename: "Data Terusan - Disposisi Biro Keuangan - BNPB" //do not include extension
        });
    });  
</script>
<script src="_____/template/modules/izitoast/js/iziToast.min.js"></script>
<script>
    function load(){
        $.ajax({
            url: "app/__API/terusan-list.php",
            success:function(data){
                $('#list_data').html(data);
                $("#table-1").dataTable();
            }
        });
    }
    load();
    $('#tambah-data').click(function(e){
        e.preventDefault();
        $('#addForm')[0].reset();
    });
    $('#addForm').submit(function(e){
        e.preventDefault();
        var terusan = $('#terusan_add').val();
        if(terusan){
            $('#addFormSimpan').attr('disabled', 'disabled');
            $.ajax({
                url: "app/__API/terusan.php",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                success: function(data){
                    load();
                    $('#addFormSimpan').attr('disabled', false);
                    $('#addModalClose').click();
                    $('#addForm')[0].reset();
                    iziToast.success({
                        title: 'Sukses!',
                        message: 'Berhasil menambah data terusan!',
                        position: 'bottomRight'
                    });
                }
            });
        }
    });
    $(document).on('click', '.edit', function(e){
        e.preventDefault();
        var id = $(this).attr("id");
        var status = "Get_data";
        $.ajax({
            url: "app/__API/terusan.php",
            method: "POST",
            data: {id:id, status:status},
            dataType: "json",
            success: function(data){
                $('#terusan').val(data.terusan);
                $('#id_data').val(id);
                $('#editModalOpen').click();
            }
        });
    });
    $('#editForm').submit(function(e){
        e.preventDefault();
        var terusan = $('#terusan').val();
        if(terusan){
            $('#editFormSimpan').attr('disabled', 'disabled');
            $.ajax({
                url: "app/__API/terusan.php",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                success: function(data){
                    load();
                    $('#editFormSimpan').attr('disabled', false);
                    $('#editModalClose').click();
                    $('#editForm')[0].reset();
                    iziToast.success({
                        title: 'Sukses!',
                        message: 'Berhasil memperbarui data terusan!',
                        position: 'bottomRight'
                    });
                }
            });
        }
    });
    $('#deleteCModal_').on('show.bs.modal', function(e) {
        var id = $(e.relatedTarget).data('id');
        var status = "Hapus";

        $('#conf_delete').click(function(e){
            e.preventDefault();
                $.ajax({
                url: "app/__API/terusan.php",
                method: "POST",
                data: {id:id, status:status},
                success: function(data){
                    $('#deleteModalClose').click();
                    load();
                    iziToast.success({
                        title: 'Sukses!',
                        message: 'Berhasil menghapus data terusan!',
                        position: 'bottomRight'
                    });
                }
            });
        })
    });
</script>