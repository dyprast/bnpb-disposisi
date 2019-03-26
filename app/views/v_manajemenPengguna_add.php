<script src="_____/template/modules/izitoast/js/iziToast.min.js"></script>
<?php
    include 'app/controller/c_manajemenPengguna.php';
    $users = new ManajemenPengguna;
    $users->save();
?>
<link rel="stylesheet" href="_____/template/modules/jquery-selectric/selectric.css">
<script src="_____/template/modules/jquery-selectric/jquery.selectric.min.js"></script>
<script src="_____/template/modules/upload-preview/assets/js/jquery.uploadPreview.min.js"></script>
<section class="section">
    <div class="section-header">
        <h1>Manajemen Pengguna</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Manajemen Pengguna</a></div>
            <div class="breadcrumb-item">Tambah</div>
        </div>
    </div>
    <div class="row">
        <form method="POST" enctype="multipart/form-data" class="needs-validation" novalidate="" style="width: 100%;display: flex;flex-wrap:wrap;">
            <div class="col-12 col-lg-3">
                <div class="card">
                    <div class="card-header">
                        <h4>Profile</h4>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <div id="image-preview" class="image-preview">
                                <label for="image-upload" id="image-label">Pilih File</label>
                                <input type="file" name="profile" id="image-upload"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-9">
                <div class="card">
                    <div class="card-header">
                        <h4>Tambah Pengguna</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama_lengkap" required="">
                            <div class="invalid-feedback">
                                Form Nama Lengkap harus diisi!
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" required="">
                            <div class="invalid-feedback">
                                Form Email harus diisi!
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Nomor Anggota</label>
                            <input type="text" class="form-control" name="nomor_anggota" required="">
                            <div class="invalid-feedback">
                                Form Nomor Anggota harus diisi!
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Jabatan</label>
                            <input type="text" class="form-control" name="jabatan" required="">
                            <div class="invalid-feedback">
                                Form Jabatan harus diisi!
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" name="username" required="">
                            <div class="invalid-feedback">
                                Form Username harus diisi!
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" required="">
                            <div class="invalid-feedback">
                                Form Password harus diisi!
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Konfirmasi Password</label>
                            <input type="password" class="form-control" name="conf_password" required="">
                            <div class="invalid-feedback">
                                Form Konfirmasi Password harus diisi!
                            </div>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck1" required>
                            <label class="custom-control-label" for="customCheck1">Setuju, dan sudah memeriksa data dengan benar!</label>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" name="save" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

<script>
    $('#manajemenpengguna').addClass('active');
</script>
<script src="_____/template/js/page/features-post-create.js"></script>