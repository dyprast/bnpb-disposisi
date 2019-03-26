<?php
    include 'app/controller/c_manajemenPengguna.php';
    include 'app/config/db.php';
    $id = $_GET['data-id'];
    $q = mysqli_query($conn, "SELECT * FROM users WHERE id='$id'");
    $data = mysqli_fetch_array($q);

    $manajemenPengguna = new ManajemenPengguna;
    $manajemenPengguna->update();
?>
<link rel="stylesheet" href="_____/template/modules/jquery-selectric/selectric.css">
<script src="_____/template/modules/jquery-selectric/jquery.selectric.min.js"></script>
<script src="_____/template/modules/upload-preview/assets/js/jquery.uploadPreview.min.js"></script>
<section class="section">
    <div class="section-header">
        <h1>Manajemen Pengguna</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Manajemen Pengguna</a></div>
            <div class="breadcrumb-item">Edit</div>
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
                            <?php
                                if(!empty($data['profile'])){
                                    ?>
                                    <div id="image-preview" class="image-preview" style="background: url('public/profile/<?php echo $data['profile']; ?>');background-size: cover;background-position:center center;">
                                        <label for="image-upload" id="image-label">Change File</label>
                                        <input type="file" name="profile" id="image-upload"/>
                                    </div>
                                    <?php
                                }
                                else{
                                    ?>
                                    <div id="image-preview" class="image-preview" style="background: url('public/profile/default.png');background-size: cover;background-position:center center;">
                                        <label for="image-upload" id="image-label">Change File</label>
                                        <input type="file" name="profile" id="image-upload"/>
                                    </div>
                                    <?php
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-9">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Pengguna</h4>
                    </div>
                    <div class="card-body">
                    <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama_lengkap" required="" value="<?php echo $data['nama_lengkap'] ?>">
                            <div class="invalid-feedback">
                                Form Nama Lengkap harus diisi!
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" required="" value="<?php echo $data['email'] ?>">
                            <div class="invalid-feedback">
                                Form Email harus diisi!
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Nomor Anggota</label>
                            <input type="text" class="form-control" name="nomor_anggota" required=""  value="<?php echo $data['nomor_anggota']; ?>">
                            <div class="invalid-feedback">
                                Form Nomor Anggota harus diisi!
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Jabatan</label>
                            <input type="text" class="form-control" name="jabatan" required="" value="<?php echo $data['jabatan'] ?>">
                            <div class="invalid-feedback">
                                Form Jabatan harus diisi!
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" name="username" required="" value="<?php echo $data['username'] ?>" disabled>
                            <div class="invalid-feedback">
                                Form Username harus diisi!
                            </div>
                        </div>
                        <button id="change_pw_btn" class="btn btn-primary btn-sm">Ubah Password</button>
                        <button id="change_pw_btn_close" class="btn btn-danger btn-sm">Cancel</button>
                        <br><br>
                        <div id="change_pw">
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" id="__password" class="form-control" name="password">
                                <div class="invalid-feedback">
                                    Form Password harus diisi!
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Konfirmasi Password</label>
                                <input type="password" id="__conf_password" class="form-control" name="conf_password">
                                <div class="invalid-feedback">
                                    Form Konfirmasi Password harus diisi!
                                </div>
                            </div>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck1" required>
                            <label class="custom-control-label" for="customCheck1">Setuju, dan sudah memeriksa data dengan benar!</label>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" name="update" class="btn btn-primary">Perbarui</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<script>
    $('#manajemenpengguna').addClass('active');
    $('#change_pw').hide();
    $('#change_pw_btn_close').hide();

    $('#change_pw_btn').click(function(e){
        e.preventDefault();
        $(this).hide();
        $('#change_pw_btn_close').slideDown("slow");
        $('#change_pw').slideDown("slow");
        $('#__password').attr('required','');
        $('#__conf_password').attr('required','');
    });
    $('#change_pw_btn_close').click(function(e){
        e.preventDefault();
        $(this).hide();
        $('#change_pw_btn').slideDown("slow");
        $('#change_pw').slideUp("slow");
        $('#__password').val('');
        $('#__conf_password').val('');
        $('#__password').removeAttr('required');
        $('#__conf_password').removeAttr('required');
    });
</script>
<script src="_____/template/js/page/features-post-create.js"></script>

<script src="_____/template/modules/izitoast/js/iziToast.min.js"></script>
    <!-- @if(session('alertDanger'))
        <script>
        iziToast.error({
                title: 'Pesan Error!',
                message: 'Konfirmasi Password Tidak Sama!',
                position: 'bottomRight'
            });
        </script>
    @elseif($errors->has('email'))
        <script>
        iziToast.warning({
                title: 'Pesan Peringatan!',
                message: 'Emai Sudah digunakan!',
                position: 'bottomRight'
            });
        </script>
    @endif
@endsection -->