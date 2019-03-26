<?php
class ManajemenPengguna
{
    public function save(){
        include 'app/config/db.php';
        if(isset($_POST['save'])){

            $nama_lengkap = $_POST['nama_lengkap'];
            $email = $_POST['email'];
            $nomor_anggota = $_POST['nomor_anggota'];
            $jabatan = $_POST['jabatan'];
            $username = $_POST['username'];
            $password = md5($_POST['password']);
            $conf_password = md5($_POST['conf_password']);

            $profile = $_FILES['profile']['name'];
            $ext = pathinfo($profile, PATHINFO_EXTENSION);
            $rand = md5(date("dmYhisA"));
            $rs = $rand.".".$ext;
            $tmp_profile = $_FILES['profile']['tmp_name'];

            $c = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
            if(mysqli_num_rows($c) > 0){
                ?>
                <script>
                    iziToast.warning({
                        title: 'Peringatan!',
                        message: 'Username sudah digunakan!',
                        position: 'bottomRight'
                    });
                </script> 
                <?php
            }
            elseif($password != $conf_password)
            {
                ?>
                <script>
                    iziToast.error({
                        title: 'Error!',
                        message: 'Konfirmasi password tidak sama!',
                        position: 'bottomRight'
                    });
                </script> 
                <?php
            }
            else{
                
                $tanggal_daftar = date("j F Y");
                if(!empty($profile)){
                    $q = mysqli_query($conn, "INSERT INTO users VALUES ('','$rs', '$nama_lengkap', '$email', '$nomor_anggota', '$jabatan', '$username', '$password', '$tanggal_daftar')");
                    if($q){
                        move_uploaded_file($tmp_profile, "public/profile/".$rs);
                        ?>
                            <script>
                                window.location = "./?page=manajemenPengguna&session=successUpdate";
                            </script>
                        <?php
                    }
                    else{
                        ?>
                        <script>
                            iziToast.error({
                                title: 'Error!',
                                message: 'Kesalahan kueri sql!',
                                position: 'bottomRight'
                            });
                        </script>
                        <?php
                    }
                }
                else{
                    $q = mysqli_query($conn, "INSERT INTO users VALUES ('','', '$nama_lengkap', '$email', '$nomor_anggota', '$jabatan', '$username', '$password', '$tanggal_daftar')");
                    if($q){
                        ?>
                            <script>
                                window.location = "./?page=manajemenPengguna&session=successSave";
                            </script>
                        <?php
                    }
                    else{
                        ?>
                        <script>
                            iziToast.error({
                                title: 'Error!',
                                message: 'Kesalahan kueri sql!',
                                position: 'bottomRight'
                            });
                        </script>
                        <?php
                    }
                }
            }
        }
    }
    public function update(){
        include 'app/config/db.php';
        if(isset($_POST['update'])){

            $id = $_GET['data-id'];
            $nama_lengkap = $_POST['nama_lengkap'];
            $email = $_POST['email'];
            $nomor_anggota = $_POST['nomor_anggota'];
            $jabatan = $_POST['jabatan'];
            $username = $_POST['username'];
            $password = md5($_POST['password']);
            $conf_password = md5($_POST['conf_password']);

            $profile = $_FILES['profile']['name'];
            $ext = pathinfo($profile, PATHINFO_EXTENSION);
            $rand = md5(date("dmYhisA"));
            $rs = $rand.".".$ext;
            $tmp_profile = $_FILES['profile']['tmp_name'];

            $c = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
            if(mysqli_num_rows($c) > 0){
                ?>
                <script>
                    iziToast.warning({
                        title: 'Peringatan!',
                        message: 'Username sudah digunakan!',
                        position: 'bottomRight'
                    });
                </script> 
                <?php
            }
            if(!empty($_POST['password']) && !empty($_POST['conf_password'])){
                if($password != $conf_password)
                {
                    ?>
                    <script>
                        iziToast.error({
                            title: 'Error!',
                            message: 'Konfirmasi password tidak sama!',
                            position: 'bottomRight'
                        });
                    </script> 
                    <?php
                }
                else{
                    if(!empty($profile)){
                        $q = mysqli_query($conn, "UPDATE users SET profile='$rs', nama_lengkap='$nama_lengkap', email='$email', nomor_anggota='$nomor_anggota', jabatan='$jabatan', password='$password' WHERE id='$id'");
                        if($q){
                            move_uploaded_file($tmp_profile, "public/profile/".$rs);
                            ?>
                                <script>
                                    window.location = "./?page=manajemenPengguna&session=successUpdate";
                                </script>
                            <?php
                        }
                        else{
                            ?>
                            <script>
                                iziToast.error({
                                    title: 'Error!',
                                    message: 'Kesalahan kueri sql!',
                                    position: 'bottomRight'
                                });
                            </script>
                            <?php
                        }
                    }
                    else{
                        $q = mysqli_query($conn, "UPDATE users SET nama_lengkap='$nama_lengkap', email='$email', nomor_anggota='$nomor_anggota', jabatan='$jabatan', password='$password' WHERE id='$id'");
                        if($q){
                            ?>
                                <script>
                                    window.location = "./?page=manajemenPengguna&session=successUpdate";
                                </script>
                            <?php
                        }
                        else{
                            ?>
                            <script>
                                iziToast.error({
                                    title: 'Error!',
                                    message: 'Kesalahan kueri sql!',
                                    position: 'bottomRight'
                                });
                            </script>
                            <?php
                        }
                    }
                }
            }
            else{
                if(!empty($profile)){
                    $q = mysqli_query($conn, "UPDATE users SET profile='$rs', nama_lengkap='$nama_lengkap', email='$email', nomor_anggota='$nomor_anggota', jabatan='$jabatan' WHERE id='$id'");
                    if($q){
                        move_uploaded_file($tmp_profile, "public/profile/".$rs);
                        ?>
                            <script>
                                window.location = "./?page=manajemenPengguna&session=successUpdate";
                            </script>
                        <?php
                    }
                    else{
                        ?>
                        <script>
                            iziToast.error({
                                title: 'Error!',
                                message: 'Kesalahan kueri sql!',
                                position: 'bottomRight'
                            });
                        </script>
                        <?php
                    }
                }
                else{
                    $q = mysqli_query($conn, "UPDATE users SET nama_lengkap='$nama_lengkap', email='$email', nomor_anggota='$nomor_anggota', jabatan='$jabatan' WHERE id='$id'");
                    if($q){
                        ?>
                            <script>
                                window.location = "./?page=manajemenPengguna&session=successUpdate";
                            </script>
                        <?php
                    }
                    else{
                        ?>
                        <script>
                            iziToast.error({
                                title: 'Error!',
                                message: 'Kesalahan kueri sql!',
                                position: 'bottomRight'
                            });
                        </script>
                        <?php
                    }
                }
            }
        }
    }
}
?>