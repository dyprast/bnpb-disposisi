<?php
    $q_users = mysqli_query($conn, "SELECT COUNT(*) FROM users");
    $res_users = mysqli_fetch_array($q_users)[0];
    $q_surat = mysqli_query($conn, "SELECT COUNT(*) FROM surat");
    $res_surat = mysqli_fetch_array($q_surat)[0];
?>
<section class="section">
    <div class="section-header">
    <h1>Dashboard</h1>
    </div>
    <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
        <div class="card-icon bg-primary">
            <i class="mdi mdi-tooltip-account" style="font-size: 35px;color: #fff;"></i>
        </div>
        <div class="card-wrap">
            <div class="card-header" style="border-bottom: none !important;">
            <h4>Total Pengguna</h4>
            </div>
            <div class="card-body">
            <?php echo $res_users; ?>
            </div>
        </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
        <div class="card-icon bg-danger">
            <i class="mdi mdi-forum" style="font-size: 35px;color: #fff;"></i>
        </div>
        <div class="card-wrap">
            <div class="card-header" style="border-bottom: none !important;">
            <h4>Jumlah Surat</h4>
            </div>
            <div class="card-body">
            <?php echo $res_surat; ?>
            </div>
        </div>
        </div>
    </div>
    </div>
    <div class="row">
    <div class="col-lg-6 col-md-12 col-12 col-sm-12">
        <div class="card">
            <div class="card-header"><h4>Jumlah Data Enam Tahun Terakhir</h4></div>
            <div class="card-body">
            <canvas id="myChart"></canvas>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-12 col-12 col-sm-12">
        <div class="card">
            <div class="card-header"><h4>Diagram Pie Berdasarkan Sifat Surat</h4></div>
            <div class="card-body">
            <canvas id="myChart4"></canvas>
            </div>
        </div>
        <?php
            $Qthn = mysqli_query($conn, "SELECT tanggal_surat FROM surat GROUP BY YEAR(tanggal_surat) ORDER BY id LIMIT 6");
            $i = 1;
            foreach($Qthn as $res){
                $date = DateTime::createFromFormat("Y-m-d", $res['tanggal_surat']);
                $y = $date->format("Y");
                $qC = mysqli_query($conn, "SELECT COUNT(*) FROM surat WHERE YEAR(tanggal_surat) = $y");
                $qCa = mysqli_fetch_array($qC)[0];
                ?>
                <div style="display: none;">
                    <span id="y-<?php echo $i; ?>"><?php echo $y ?></span>
                    <p id="c-<?php echo $i; ?>"><?php echo $qCa ?></p>
                </div>
                <?php
                $i++;
            }

            $qSifat = mysqli_query($conn, "SELECT sifat FROM surat GROUP BY sifat");
            $i = 1;
            foreach($qSifat as $res){
                $sifat = $res['sifat'];
                $qC_2_ = mysqli_query($conn, "SELECT COUNT(*) FROM surat WHERE sifat = '$sifat'");
                $qC_2_a = mysqli_fetch_array($qC_2_)[0];
                ?>
                <div style="display: none;">
                    <span id="sifat-<?php echo $i; ?>"><?php echo $sifat ?></span>
                    <p id="c_2-<?php echo $i; ?>"><?php echo $qC_2_a ?></p>
                </div>
                <?php
                $i++;
            }
        ?>
    </div>
    
    </div>
</section>

<script src="_____/template/modules/chart.min.js"></script>
<script src="_____/js/chart.js"></script>

<script src="_____/template/modules/izitoast/js/iziToast.min.js"></script>

<?php
  if(isset($_SESSION['alertLogin'])){
      unset($_SESSION['alertLogin']);
    ?>
        <script>
            iziToast.success({
                title: 'Login sukses!',
                message: 'Selamat datang <?php echo $_SESSION['user_nama_lengkap']; ?>',
                position: 'bottomRight'
            });
        </script>
    <?php
  }
?>