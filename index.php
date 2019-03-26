<?php
  include 'app/config/db.php';
  session_start();
  if(!isset($_SESSION['logged'])){
    header("location: ./login");
  }
  $user_id = $_SESSION['user_id'];
  $q = mysqli_query($conn, "SELECT * FROM users WHERE id = '$user_id'");
  $res_user = mysqli_fetch_array($q);
  include 'app/__API/time-ago.php';
?>


<!-- DESIGN AND DEVELOPMENT BY © ROMADHAN - CYBERSOFT - SMKN 10 JAKARTA - MARET 2019 -->
<!-- PUDATINMAS BNPB - INTERNSHIP -->

<!-- IG : @ROMADHANEP17 -->
<!-- FB : ROMADHAN PRASETYO -->


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Persuratan &mdash; Biro Keuangan</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <link rel="stylesheet" href="_____/template/modules/jqvmap/dist/jqvmap.min.css">
  <link rel="stylesheet" href="_____/template/modules/weather-icon/css/weather-icons.min.css">
  <link rel="stylesheet" href="_____/template/modules/weather-icon/css/weather-icons-wind.min.css">
  <link rel="stylesheet" href="_____/template/modules/summernote/summernote-bs4.css">
  <link rel="stylesheet" href="_____/template/modules/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="_____/template/modules/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="_____/template/modules/datatables/datatables.min.css">
  <link rel="stylesheet" href="_____/template/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="_____/template/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">
  <link rel="stylesheet" href="_____/template/modules/izitoast/css/iziToast.min.css">

  <link rel="stylesheet" href="_____/template/css/style.css">
  <link rel="stylesheet" href="_____/template/css/components.css">
  <link rel="stylesheet" href="//cdn.materialdesignicons.com/3.5.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="_____/css/custom-master.css">
  
  <script src="_____/template/modules/jquery.min.js"></script>
  <script src="_____/template/modules/popper.js"></script>
  <script src="_____/template/modules/tooltip.js"></script>
  <script src="_____/template/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="_____/template/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="_____/template/modules/moment.min.js"></script>
  <script src="_____/template/js/stisla.js"></script>
  
  <script src="_____/template/modules/summernote/summernote-bs4.js"></script>
  <script src="_____/template/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>

  <script src="_____/template/modules/datatables/datatables.min.js"></script>
  <script src="_____/template/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script src="_____/template/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
  <script src="_____/template/modules/jquery-ui/jquery-ui.min.js"></script>

  <script src="_____/template/modules/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script src="_____/template/modules/izitoast/js/iziToast.min.js"></script>
  <script src="_____/template/modules/select2/dist/js/select2.full.min.js"></script>

  <script src="_____/template/js/scripts.js"></script>
  <script src="_____/template/js/custom.js"></script>
</head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto" method="GET">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
          <div class="search-element">
            <input type="hidden" name="page" value="persuratan">
            <input class="form-control" type="search" name="q" placeholder="Search" aria-label="Search" data-width="250">
            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
            <div class="search-backdrop"></div>
            <div class="search-result">
              <div class="search-header">
                MENU UTAMA
              </div>
              <div class="search-item">
                <a href="./?page=persuratan">Persuratan</a>
                <a href="#" class="search-close"><i class="fas fa-times"></i></a>
              </div>
              <div class="search-item">
                <a href="./?page=manajemenPengguna">Manajemen Pengguna</a>
                <a href="#" class="search-close"><i class="fas fa-times"></i></a>
              </div>
              <div class="search-header">
                Dashboard
              </div>
              <div class="search-item">
                <a href="./">
                  <div class="search-icon bg-info text-white mr-3">
                    <i class="mdi mdi-view-dashboard"></i>
                  </div>
                  Dashboard
                </a>
              </div>
            </div>
          </div>
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <?php
              if(!empty($res_user['profile'])){
                ?>
                <img alt="image" src="public/profile/<?php echo $res_user['profile']; ?>" style="width: 30px; height: 30px;border-radius: 50%;object-fit: cover;">
                <?php
              }
              else{
                ?>
                <img alt="image" src="public/profile/default.png" style="width: 30px; height: 30px;border-radius: 50%;object-fit: cover;">
                <?php
              }
            ?>
            <div class="d-sm-none d-lg-inline-block">Hi, <?php echo $res_user['nama_lengkap']; ?></div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-title">
                LOGGED IN
                <?php
                  $time_ago = $_SESSION['user_logged'];
                  echo timeAgo($time_ago);
                ?>
              </div>
              <a href="./?page=manajemenPengguna&mode=edit&data-id=<?php echo $_SESSION['user_id']; ?>" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              <div class="dropdown-divider"></div>
              <a href="app/controller/c_logout.php" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="./">Persuratan</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="home">SM</a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li><a class="nav-link" href="./"><i class="far sidebar-icon mdi mdi-view-dashboard"></i> <span>Dashboard</span></a></li>
            
            <li class="menu-header">Persuratan</li>
            <li id="persuratan"><a class="nav-link" href="./?page=persuratan"><i class="far sidebar-icon mdi mdi-forum"></i> <span>Persuratan</span></a></li>
            
            <li class="menu-header">Manajemen Pengguna</li>
            <li id="manajemenpengguna"><a class="nav-link" href="./?page=manajemenPengguna"><i class="far sidebar-icon mdi mdi-tooltip-account"></i> <span>Manajemen Pengguna</span></a></li>
          </ul>

            <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
              <a href="http://bnpb.go.id" target="blank" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="far sidebar-icon mdi mdi-earth"></i> BNPB Website
              </a>
            </div>
        </aside>
      </div>

      <!-- Main Content -->
      <div class="main-content">
        <?php include 'app/routes/web.php'; ?>
      </div>
      <div id="pusdatinmas"></div>
    </div>
  </div>
  <div class="modal fade" id="deleteCModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <a href="#" id="conf_delete" class="btn btn-danger">Hapus</a>
              </div>
          </div>
      </div>
  </div>
  
  <script src="_____/js/link-active.js"></script>
  <script src="_____/js/index.js"></script>
</body>
</html>