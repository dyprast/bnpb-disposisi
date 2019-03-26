<?php
    session_start();
    if(isset($_SESSION['logged'])){
      header("location: .././");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Login &mdash; Persuratan</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="../_____/template/modules/bootstrap-social/bootstrap-social.css">
  <link rel="stylesheet" href="../_____/template/modules/izitoast/css/iziToast.min.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="../_____/template/css/style.css">
  <link rel="stylesheet" href="../_____/template/css/components.css">
  
  <!-- General JS Scripts -->
  <script src="../_____/template/modules/jquery.min.js"></script>
  <script src="../_____/template/modules/popper.js"></script>
  <script src="../_____/template/modules/tooltip.js"></script>
  <script src="../_____/template/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="../_____/template/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="../_____/template/modules/moment.min.js"></script>
  <script src="../_____/template/js/stisla.js"></script>
  
  <!-- JS Libraies -->
  <script src="../_____/template/modules/summernote/summernote-bs4.js"></script>
  <script src="../_____/template/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>

  <script src="../_____/template/modules/datatables/datatables.min.js"></script>
  <script src="../_____/template/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script src="../_____/template/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
  <script src="../_____/template/modules/jquery-ui/jquery-ui.min.js"></script>
  <script src="../_____/template/modules/izitoast/js/iziToast.min.js"></script>
</head>

<body>
<?php
  include '../app/controller/c_login.php';
  $check = new Login();
  $check->CheckLogin();
?>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              <img src="../_____/img/bnpb.png" alt="logo" width="100" class="shadow-light rounded-circle">
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Login</h4></div>

              <div class="card-body">
                <form method="POST" class="needs-validation" novalidate="">
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input id="username" type="text" class="form-control" name="username" tabindex="1" value="<?php if(isset($_COOKIE["username"])) { echo $_COOKIE["username"]; } ?>" required autofocus>
                    <div class="invalid-feedback">
                      Please fill in your username
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="d-block">
                    	<label for="password" class="control-label">Password</label>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>" required>
                    <div class="invalid-feedback">
                      please fill in your password
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                      <label class="custom-control-label" for="remember-me">Remember Me</label>
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" name="login" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Login
                    </button>
                  </div>
                </form>
              </div>
            </div>
            <div class="simple-footer">
              Copyright &copy; 2019, Persuratan &mdash; Biro Keuangan
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- Template JS File -->
  <script src="../_____/template/js/scripts.js"></script>
  <script src="../_____/template/js/custom.js"></script>
</body>
</html>

