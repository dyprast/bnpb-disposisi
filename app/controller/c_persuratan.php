<?php
    class Persuratan{
        function save(){
            include 'app/config/db.php';
            if(isset($_POST['save'])){
                $nomor_surat = $_POST['nomor_surat'];
                $tanggal_surat = $_POST['tanggal_surat'];
                $tanggal_penyelesaian = $_POST['tanggal_penyelesaian'];
                $tanggal_masuk = $_POST['tanggal_masuk'];
                $asal = $_POST['asal'];
                $isi = $_POST['isi'];
                $sifat = $_POST['sifat'];
                $instruksi = $_POST['instruksi'];
                $terusan = implode($_POST['terusan'], ', ');
                $file = $_FILES['file']['name'];
                $ext = pathinfo($file, PATHINFO_EXTENSION);
                $rand = md5(date("dmYhisA"));
                $rs = $rand.".".$ext;
                $tmp_file = $_FILES['file']['tmp_name'];

                if(!empty($file)){

                    $q = mysqli_query($conn, "INSERT INTO surat (nomor_surat, tanggal_surat, tanggal_penyelesaian, tanggal_masuk, asal, isi, instruksi, terusan, sifat, file) VALUES ('$nomor_surat','$tanggal_surat','$tanggal_penyelesaian','$tanggal_masuk','$asal','$isi','$instruksi','$terusan','$sifat','$rs')");
                    if($q){
                        move_uploaded_file($tmp_file, "public/uploaded_file/".$rs);
                        ?>
                            <script>
                                window.location = "./?page=persuratan&session=successSave";
                            </script>
                        <?php
                    }
                    else{
                        ?>
                            <script>
                                iziToast.error({
                                    title: 'Error!',
                                    message: 'Kesalahan saat menyimpan data!',
                                    position: 'bottomRight'
                                });
                            </script>
                        <?php
                    }
                }
                else{
                    $q = mysqli_query($conn, "INSERT INTO surat (nomor_surat, tanggal_surat, tanggal_penyelesaian, tanggal_masuk, asal, isi, instruksi, terusan, sifat) VALUES ('$nomor_surat','$tanggal_surat','$tanggal_penyelesaian','$tanggal_masuk','$asal','$isi','$instruksi','$terusan','$sifat')");
                    if($q){
                        ?>
                            <script>
                                window.location = "./?page=persuratan&session=successSave";
                            </script>
                        <?php
                    }
                    else{
                        ?>
                            <script>
                                iziToast.error({
                                    title: 'Error!',
                                    message: 'Kesalahan saat menyimpan data!',
                                    position: 'bottomRight'
                                });
                            </script>
                        <?php
                    }
                }
            }
        }
        function update(){
            $id = $_GET['data-id'];
            include 'app/config/db.php';
            if(isset($_POST['update'])){
                $nomor_surat = $_POST['nomor_surat'];
                $tanggal_surat = $_POST['tanggal_surat'];
                $tanggal_penyelesaian = $_POST['tanggal_penyelesaian'];
                $tanggal_masuk = $_POST['tanggal_masuk'];
                $asal = $_POST['asal'];
                $isi = $_POST['isi'];
                $instruksi = $_POST['instruksi'];
                $terusan = implode($_POST['terusan'], ', ');
                $sifat = $_POST['sifat'];

                $file = $_FILES['file']['name'];
                $ext = pathinfo($file, PATHINFO_EXTENSION);
                $rand = md5(date("dmYhisA"));
                $rs = $rand.".".$ext;
                $tmp_file = $_FILES['file']['tmp_name'];

                if(!empty($file)){

                    $q = mysqli_query($conn, "UPDATE surat SET nomor_surat='$nomor_surat', tanggal_surat='$tanggal_surat', tanggal_penyelesaian='$tanggal_penyelesaian', tanggal_masuk='$tanggal_masuk', asal='$asal', isi='$isi', instruksi='$instruksi', terusan='$terusan', sifat='$sifat', file='$rs' WHERE id = '$id'");

                    if($q){
                        move_uploaded_file($tmp_file, "public/uploaded_file/".$rs);
                        ?>
                            <script>
                                window.location = "./?page=persuratan&session=successUpdate";
                            </script>
                        <?php
                    }
                    else{
                        ?>
                            <script>
                                iziToast.error({
                                    title: 'Error!',
                                    message: 'Kesalahan saat menyimpan data!',
                                    position: 'bottomRight'
                                });
                            </script>
                        <?php
                    }
                }
                else{
                    $q = mysqli_query($conn, "UPDATE surat SET nomor_surat='$nomor_surat', tanggal_surat='$tanggal_surat', tanggal_penyelesaian='$tanggal_penyelesaian', tanggal_masuk='$tanggal_masuk', asal='$asal', isi='$isi', instruksi='$instruksi', terusan='$terusan', sifat='$sifat' WHERE id = '$id'");

                    if($q){
                        ?>
                            <script>
                                window.location = "./?page=persuratan&session=successUpdate";
                            </script>
                        <?php
                    }
                    else{
                        ?>
                            <script>
                                iziToast.error({
                                    title: 'Error!',
                                    message: 'Kesalahan saat menyimpan data!',
                                    position: 'bottomRight'
                                });
                            </script>
                        <?php
                    }
                }
            }
        }
    }
?>