<?php
    class Login{
        function checkLogin(){
            include '../app/config/db.php';
            if(isset($_POST['login'])){
                $username = $_POST['username'];
                $password = md5($_POST['password']);

                $q = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' AND password='$password'");
                $num = mysqli_num_rows($q);
                $res = mysqli_fetch_array($q);
                if($num > 0 && $num < 2){
                    $_SESSION['logged'] = true;
                    $_SESSION['alertLogin'] = "alert";
                    $_SESSION['user_tanggal_daftar'] = $res['tanggal_daftar'];
                    $_SESSION['user_id'] = $res['id'];
                    $_SESSION['user_nama_lengkap'] = $res['nama_lengkap'];
                    $_SESSION['user_logged'] = time();
                    if(!empty($_POST["remember"])) {
                        //COOKIES for username
                        setcookie ("username",$_POST["username"],time()+ (10 * 365 * 24 * 60 * 60));
                        //COOKIES for password
                        setcookie ("password",$_POST["password"],time()+ (10 * 365 * 24 * 60 * 60));
                    } 
                    else {
                        if(isset($_COOKIE["username"])) {
                            setcookie ("username","");
                            if(isset($_COOKIE["password"])) {
                                setcookie ("password","");
                            }
                        }
                    }
                    header("location: .././");
                }
                else{
                    ?>
                        <script>
                            iziToast.error({
                                title: 'Login gagal!',
                                message: 'Username Password salah!',
                                position: 'bottomRight'
                            });
                        </script>
                    <?php
                }
            }
        }
    }
?>