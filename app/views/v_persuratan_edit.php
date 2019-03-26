<script src="_____/template/modules/izitoast/js/iziToast.min.js"></script>
<?php
    include 'app/controller/c_persuratan.php';
    $id = $_GET['data-id'];
    $q = mysqli_query($conn, "SELECT * FROM surat WHERE id='$id'");
    $data = mysqli_fetch_array($q);
    $surat = new Persuratan;
    $surat->update();
?>
<link rel="stylesheet" href="_____/template/modules/jquery-selectric/selectric.css">
<script src="_____/template/modules/jquery-selectric/jquery.selectric.min.js"></script>
<script src="_____/template/modules/upload-preview/assets/js/jquery.uploadPreview.min.js"></script>
<link rel="stylesheet" href="_____/css/form.css">
<section class="section">
    <div class="section-header">
        <h1>Persuratan</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Persuratan</a></div>
            <div class="breadcrumb-item">Edit</div>
        </div>
    </div>
    <div class="row">
        <form method="POST" enctype="multipart/form-data" class="needs-validation" novalidate="" style="width: 100%;display: flex;flex-wrap:wrap;">
            <div class="col-12 col-lg-10">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Surat</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-lg-6 form-group">
                                <label>Nomor Surat</label>
                                <input type="text" class="form-control" name="nomor_surat" required="" value="<?php echo $data['nomor_surat'] ?>">
                                <div class="invalid-feedback">
                                    Form Nomor Surat harus diisi!
                                </div>
                            </div>
                            <div class="col-12 col-lg-6 form-group">
                                <label>Tanggal Surat</label>
                                <input type="text" class="form-control datepicker" name="tanggal_surat" required="" value="<?php echo $data['tanggal_surat'] ?>">
                                <div class="invalid-feedback">
                                    Form Tanggal Surat harus diisi!
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-lg-6 form-group">
                                <label>Tanggal Penyelesaian</label>
                                <input type="text" class="form-control datepicker" name="tanggal_penyelesaian" required="" value="<?php echo $data['tanggal_penyelesaian'];  ?>">
                                <div class="invalid-feedback">
                                    Form Tanggal Penyelesaian harus diisi!
                                </div>
                            </div>
                            <div class="col-12 col-lg-6 form-group">
                                <label>Tanggal Masuk</label>
                                <input type="text" class="form-control datepicker" name="tanggal_masuk" required="" value="<?php echo $data['tanggal_masuk'] ?>">
                                <div class="invalid-feedback">
                                    Form Tanggal Masuk harus diisi!
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-lg-6 form-group">
                                <label>Asal</label>
                                <input type="text" class="form-control" name="asal" required="" value="<?php echo $data['asal']; ?>">
                                <div class="invalid-feedback">
                                    Form Asal harus diisi!
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label>Sifat</label>
                                    <select name="sifat" class="form-control select2" required="">
                                        <option value="">-----</option>
                                <?php
                                    $data2 = ['Rahasia', 'Penting', 'Biasa', 'Lainnya'];
                                    foreach($data2 as $res){
                                        if($res == $data['sifat']){
                                ?>
                                        <option value="<?php echo $res ?>" selected><?php echo $res ?></option>
                                <?php  
                                        }
                                        else{
                                        ?>
                                        <option value="<?php echo $res ?>"><?php echo $res ?></option>
                                        <?php
                                        }
                                    }
                                ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        Form Sifat harus diisi!
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Isi</label>
                            <textarea name="isi" class="form-control" required><?php echo $data['isi']; ?></textarea>
                            <div class="invalid-feedback">
                                Form Isi harus diisi!
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Instruksi</label>
                            <textarea name="instruksi" class="summernote-simple" required><?php echo $data['instruksi'] ?></textarea>
                            <div class="invalid-feedback">
                                Form Instruksi harus diisi!
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label>Terusan</label>
                                    <select name="terusan[]" class="form-control select2" multiple required>
                                <!-- MULTIPLE SELECT SELECTED BY © ROMADHAN - CYBERSOFT - SMKN 10 JAKARTA - MARET 2019 -->
                                <?php
                                    $terusan = $data['terusan'];
                                    $terusan__ = explode(", ",$terusan);
                                    $q_data = mysqli_query($conn, "SELECT * FROM terusan ORDER BY terusan");
                                    $i=0;
                                    while($res = mysqli_fetch_array($q_data)){
                                        if(in_array($res["terusan"],$terusan__)) $s = "selected";
                                        else $s="";
                                ?>
                                            <option value="<?php echo $res['terusan'] ?>"<?php echo $s; ?>><?php echo $res['terusan'] ?></option>
                                <?php   
                                    }
                                ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        Form Terusan harus diisi!
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label>File</label>
                                    <div>
                                        <?php
                                            if(!empty($data['file'])){
                                                ?>
                                                <a href="./public/uploaded_file/<?php echo $data['file']; ?>" target="blank" class="btn btn-primary btn-sm">Lihat File</a>
                                                <?php
                                            }
                                        ?>
                                        <a href="#" id="edit_file_btn" class="btn btn-primary btn-sm">Edit File</a>
                                        <a href="#" id="edit_file_btn_close" class="btn btn-danger btn-sm">Close</a>
                                    </div><br>
                                    <div id="edit_file">
                                        <input type="file" name="file" class="form-control">
                                        <div class="invalid-feedback">
                                            Form Sifat harus diisi!
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck1" required>
                            <label class="custom-control-label" for="customCheck1">Setuju, dan sudah memeriksa data dengan benar!</label>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" name="update" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

<script>
    $('#persuratan').addClass('active');

    $('#edit_file').hide();
    $('#edit_file_btn_close').hide();

    $('#edit_file_btn').click(function(e){
        e.preventDefault();
        $(this).hide();
        $('#edit_file_btn_close').slideDown("slow");
        $('#edit_file').slideDown("slow");
    });
    $('#edit_file_btn_close').click(function(e){
        e.preventDefault();
        $(this).hide();
        $('#edit_file_btn').slideDown("slow");
        $('#edit_file').slideUp("slow");
    });
</script>
<script src="_____/template/js/page/features-post-create.js"></script>