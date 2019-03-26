<section class="section">
    <div class="section-header">
    <h1>Manajemen Pengguna</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Manajemen Pengguna</a></div>
        <div class="breadcrumb-item">Data</div>
    </div>
    </div>
    <div class="row">
        <div class="col-12">
        <div class="card">
            <div class="card-header">
                <a href="./?page=manajemenPengguna&mode=add" class="btn btn-primary">Tambah Data</a>
            </div>
            <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                <thead>
                    <tr>
                    <th>No</th>
                    <th>Profile</th>
                    <th>Username</th>
                    <th>Nama Lengkap</th>
                    <th>Email</th>
                    <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
            <?php
                $q = mysqli_query($conn, "SELECT * FROM users ORDER BY id DESC");
                $i = 1;
                foreach($q as $res){
            ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td>
                            <?php
                                if(!empty($res['profile'])){
                                    ?>
                                    <img alt="image" src="public/profile/<?php echo $res['profile'] ?>" width="25" height="25" data-toggle="tooltip" title="" data-original-title="<?php echo $res['nama_lengkap'] ?>" style="object-fit: cover;border-radius: 50%;">
                                    <?php
                                }else{
                                    ?>
                                    <img alt="image" src="public/profile/default.png" width="25" height="25" data-toggle="tooltip" title="" data-original-title="<?php echo $res['nama_lengkap'] ?>" style="object-fit: cover;border-radius: 50%;">
                                    <?php
                                }
                            ?>
                        </td>
                        <td><p class="badge badge-info"><?php echo $res['username'] ?></p></td>
                        <td><?php echo $res['nama_lengkap'] ?></td>
                        <td><?php echo $res['email'] ?></td>
                        <td nowrap>    
                            <a href="./?page=manajemenPengguna&mode=edit&data-id=<?php echo $res['id']; ?>" class="btn btn-info btn-sm">Edit</a>
                            <a href="#" data-uri="app/controller/c_manajemenPengguna_delete.php?data-id=<?php echo $res['id']; ?>" class="btn btn-danger btn-sm delete" data-toggle="modal" data-target="#deleteCModal">Delete</a>
                        </td>
                    </tr>
            <?php
                $i++;
                }
            ?>
                </tbody>
                </table>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
</section>


<script src="_____/template/js/page/modules-datatables.js"></script>
<script src="_____/template/modules/izitoast/js/iziToast.min.js"></script>
<?php
    if(isset($_GET['session'])){
        if($_GET['session'] == "successSave"){
        ?>
            <script>
                $('#manajemenpengguna').addClass('active');
                iziToast.success({
                    title: 'Sukses!',
                    message: 'Berhasil menambah pengguna!',
                    position: 'bottomRight'
                });
            </script>
        <?php
        }
        elseif($_GET['session'] == "successUpdate"){
            ?>
            <script>
                $('#manajemenpengguna').addClass('active');
                iziToast.success({
                    title: 'Sukses!',
                    message: 'Berhasil memperbarui pengguna!',
                    position: 'bottomRight'
                });
            </script>
        <?php
        }
        elseif($_GET['session'] == "successDelete"){
            ?>
            <script>
                $('#manajemenpengguna').addClass('active');
                iziToast.success({
                    title: 'Sukses!',
                    message: 'Berhasil menghapus pengguna!',
                    position: 'bottomRight'
                });
            </script>
        <?php
        }
    }
?>