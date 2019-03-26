<script src="_____/template/modules/izitoast/js/iziToast.min.js"></script>
<?php
    include 'app/controller/c_persuratan.php';
    $id = $_GET['data-id'];
    $q = mysqli_query($conn, "SELECT * FROM surat WHERE id='$id'");
    $data = mysqli_fetch_array($q);
    $surat = new Persuratan;
    $surat->update();
    include 'app/__API/tanggal-indo.php';
?>
<link rel="stylesheet" href="_____/template/modules/jquery-selectric/selectric.css">
<script src="_____/template/modules/jquery-selectric/jquery.selectric.min.js"></script>
<script src="_____/template/modules/upload-preview/assets/js/jquery.uploadPreview.min.js"></script>
<style media="print">
    @page 
    {
        size: auto;   /* auto is the current printer page size */
        margin: 0mm;  /* this affects the margin in the printer settings */
    }

    body 
    {
        background-color:#FFFFFF; 
        border: solid 1px black ;
        margin: 0px;  /* the margin on the content before printing */
    }
</style>
<section class="section">
    <div class="section-header">
        <h1>Persuratan</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Persuratan</a></div>
            <div class="breadcrumb-item">Detail</div>
        </div>
    </div>
    <div class="btn-print">
        <button type="button" id="print-btn-js" class="btn btn-success btn-sm" onclick="printDiv('printarea')">Cetak Disposisi</button>
    </div>
    <div class="row">
        <div class="col-12 col-lg-2"></div>
        <div class="col-12 col-lg-8">
            <div id="printarea" class="card">
                <div class="card-header detail">
                    <div class="brand-detail">
                        <img src="_____/img/bnpb.png" alt="">
                    </div>
                    <div class="kop_detail">
                        <h4>KEPALA BIRO KEUANGAN</h4>
                        <h4>BADAN NASIONAL PENANGGULANGAN BENCANA</h4>
                        <p>Jl. Pramuka No.160, RT.10/RW.5, Utan Kayu Utara, Matraman, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13120</p>
                    </div>
                </div>
                <div class="line"></div>
                <div class="card-body">
                    <table class="tableprint">
                        <tr>
                            <th colspan="2" style="text-align: center;"><b>LEMBAR DISPOSISI</b></th>
                        </tr>
                        <tr>
                            <td width="230px;"><b>File</b></td>
                            <?php
                                if(!empty($data['file'])){
                                    ?>
                                    <td><span class="data"><?php echo $data['file']; ?> &mdash; <a target="blank" href="public/uploaded_file/<?php echo $data['file']; ?>">Lihat File</a></span></td>
                                    <?php
                                }
                                else{
                                    ?>
                                    <td><span class="data">-</span></td>
                                    <?php
                                }
                            ?>
                        </tr>
                        <tr>
                            <td width="230px;"><b>Nomor Surat</b></td>
                            <td><span class="data"><?php echo $data['nomor_surat']; ?></span></td>
                        </tr>
                        <tr>
                            <td width="230px;"><b>Tanggal Surat</b></td>
                            <td><span class="data"><?php echo tgl_indo($data['tanggal_surat']); ?></span></td>
                        </tr>
                        <tr>
                            <td width="230px;"><b>Asal Surat</b></td>
                            <td><span class="data"><?php echo $data['asal']; ?></span></td>
                        </tr>
                        <tr>
                            <td width="230px;"><b>Sifat</b></td>
                            <td><span class="data"><?php echo $data['sifat']; ?></span></td>
                        </tr>
                        <tr>
                            <td width="230px;"><b>Isi Ringkas</b></td>
                            <td><span class="data"><?php echo $data['isi']; ?></span></td>
                        </tr>
                        <tr>
                            <td width="230px;"><b>Diterima Tanggal</b></td>
                            <td><span class="data"><?php echo tgl_indo($data['tanggal_masuk']); ?></span></td>
                        </tr>
                        <tr>
                            <td width="230px;"><b>Tanggal Penyelesaian</b></td>
                            <?php
                                if($data['tanggal_penyelesaian'] != "0000-00-00"){
                                    ?>
                                    <td><span class="data"><?php echo tgl_indo($data['tanggal_penyelesaian']); ?></span></td>
                                    <?php
                                }
                                else{
                                    ?>
                                    <td><span class="data">-</span></td>
                                    <?php
                                }
                            ?>
                        </tr>
                    </table>
                    <div class="row" style="padding: 0 15px;">
                        <div class="col-6" style="padding-left: 0; padding-right: 0;">
                            <div class="instruksi">
                                <p><b><u>Instruksi</u></b></p>
                                <p><?php echo $data['instruksi']; ?></p>
                            </div>
                        </div>
                        <div class="col-6" style="padding-left: 0; padding-right: 0;">
                            <div class="terusan">
                                <p><b><u>Diteruskan Kepada</u><b></p>
                                <?php
                                    $terusan = explode(", ", $data['terusan']);
                                    $i = 1;
                                    foreach($terusan as $res){
                                ?>
                                <p><?php echo $i.". ".$res; ?></p>
                                <?php
                                    $i++;
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-2"></div>
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
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
    setInterval(function(){
        $('#print-btn-js').removeClass('btn-success');
        $('#print-btn-js').addClass('btn-primary');
    },500);
    setInterval(function(){
        $('#print-btn-js').removeClass('btn-primary');
        $('#print-btn-js').addClass('btn-success');
    },1000);
</script>
<script src="_____/template/js/page/features-post-create.js"></script>