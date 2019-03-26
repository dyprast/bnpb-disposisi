<?php
    include 'app/__API/tanggal-indo.php';
    $qsurat = mysqli_query($conn, "SELECT tanggal_surat FROM surat GROUP BY YEAR(tanggal_surat)");
    if(isset($_GET['q'])){
        $q = $_GET['q'];
?>
        <section class="section">
            <div class="section-header">
            <h1>Persuratan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Persuratan</a></div>
                <div class="breadcrumb-item">Data</div>
            </div>
            </div>
            <div class="row">
                <div class="col-12">
                <p>Hasil pencarian <b><span style="color: #487eb0">"<?php echo $q; ?>"</span></b></p>
                <div class="card">
                    <div class="card-header">
                        <a href="./?page=persuratan&mode=add" class="btn btn-primary">Tambah Data</a>
                        <div>
                            <select name="tanggal_surat" id="tanggal_surat" class="form-control select2">
                                <option value="">Semua Tahun</option>
                                <?php
                                foreach($qsurat as $res){
                                    $date = DateTime::createFromFormat("Y-m-d", $res['tanggal_surat']);
                                    ?>
                                    <option value="<?php echo $date->format("Y") ?>">Tahun <?php echo $date->format("Y") ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                            <button id="xls" class="btn btn-primary">XLS</button>
                        </div>
                    </div>
                    <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                        <thead>
                            <tr>
                            <th>No</th>
                            <th>Nomor Surat</th>
                            <th>Tanggal Surat</th>
                            <th>Asal</th>
                            <th>Terusan</th>
                            <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="data_row">
                    <?php
                        $q = mysqli_query($conn, "SELECT * FROM surat WHERE nomor_surat LIKE '%$q%' OR asal LIKE '%$q%' OR terusan LIKE '%$q%' ORDER BY id DESC");
                        $i = 1;
                        foreach($q as $res){
                    ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $res['nomor_surat'] ?></td>
                                <td><?php echo tgl_indo($res['tanggal_surat']); ?></td>
                                <td><?php echo $res['asal'] ?></td>
                                <td><?php echo $res['terusan'] ?></td>
                                <td nowrap>    
                                    <a href="./?page=persuratan&mode=detail&data-id=<?php echo $res['id']; ?>" class="btn btn-secondary btn-sm">Detail</a>
                                    <a href="./?page=persuratan&mode=edit&data-id=<?php echo $res['id']; ?>" class="btn btn-info btn-sm">Edit</a>
                                    <a href="#" data-uri="app/controller/c_persuratan_delete.php?data-id=<?php echo $res['id']; ?>" class="btn btn-danger btn-sm delete" data-toggle="modal" data-target="#deleteCModal">Delete</a>
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
        <script>
            $('#persuratan').addClass('active');
        </script>
<?php
    }
    else{
        ?>
                <section class="section">
            <div class="section-header">
            <h1>Persuratan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Persuratan</a></div>
                <div class="breadcrumb-item">Data</div>
            </div>
            </div>
            <div class="row">
                <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="./?page=persuratan&mode=add" class="btn btn-primary">Tambah Data</a>
                        <div>
                            <a target="blank" href="./?page=persuratan&mode=data-terusan" class="btn btn-success">Data Terusan</a>
                            <select name="tanggal_surat" id="tanggal_surat" class="form-control select2 tanggal_surat">
                                <option value="">Semua Tahun</option>
                                <?php
                                foreach($qsurat as $res){
                                    $date = DateTime::createFromFormat("Y-m-d", $res['tanggal_surat']);
                                    ?>
                                    <option value="<?php echo $date->format("Y") ?>">Tahun <?php echo $date->format("Y") ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                            <button id="xls" class="btn btn-primary">XLS</button>
                        </div>
                    </div>
                    <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                        <thead>
                            <tr>
                            <th>No</th>
                            <th>Nomor Surat</th>
                            <th>Tanggal Surat</th>
                            <th>Asal</th>
                            <th>Terusan</th>
                            <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="data_row">
                    <?php
                        $q = mysqli_query($conn, "SELECT * FROM surat ORDER BY id DESC");
                        $i = 1;
                        foreach($q as $res){
                    ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $res['nomor_surat'] ?></td>
                                <td><?php echo tgl_indo($res['tanggal_surat']); ?></td>
                                <td><?php echo $res['asal'] ?></td>
                                <td><?php echo $res['terusan'] ?></td>
                                <td nowrap>    
                                    <a href="./?page=persuratan&mode=detail&data-id=<?php echo $res['id']; ?>" class="btn btn-secondary btn-sm">Detail</a>
                                    <a href="./?page=persuratan&mode=edit&data-id=<?php echo $res['id']; ?>" class="btn btn-info btn-sm">Edit</a>
                                    <a href="#" data-uri="app/controller/c_persuratan_delete.php?data-id=<?php echo $res['id']; ?>" class="btn btn-danger btn-sm delete" data-toggle="modal" data-target="#deleteCModal">Delete</a>
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
                <div class="table-responsive" style="display: none;">
                    <table class="table table-striped" id="table-2">
                    <thead>
                        <tr>
                        <th>No</th>
                        <th>Nomor Surat</th>
                        <th>Tanggal Surat</th>
                        <th>Asal</th>
                        <th>Sifat</th>
                        <th>Tanggal Masuk</th>
                        <th>Tanggal Penyelesaian</th>
                        <th>Isi</th>
                        <th>Instruksi</th>
                        <th>Terusan</th>
                        <th>File</th>
                        </tr>
                    </thead>
                    <tbody id="data_row2">
                <?php
                    $q = mysqli_query($conn, "SELECT * FROM surat ORDER BY id DESC");
                    $i = 1;
                    foreach($q as $res){
                ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $res['nomor_surat'] ?></td>
                            <td><?php echo tgl_indo($res['tanggal_surat']); ?></td>
                            <td><?php echo $res['asal'] ?></td>
                            <td><?php echo $res['sifat'] ?></td>
                            <td><?php echo tgl_indo($res['tanggal_masuk']) ?></td>
                            <td><?php echo tgl_indo($res['tanggal_penyelesaian']) ?></td>
                            <td><?php echo $res['isi'] ?></td>
                            <td><?php echo $res['instruksi'] ?></td>
                            <td><?php echo $res['terusan'] ?></td>
                            <?php
                                if(!empty($res['file'])){
                                    ?>
                                    <td><?php echo $res['file'] ?></td>
                                    <?php
                                }
                                else{
                                    ?>
                                    <td>-</td>
                                    <?php
                                }
                            ?>
                        </tr>
                <?php
                    $i++;
                    }
                ?>
                    </tbody>
                    </table>
                </div>
        </section>
        <?php
    }
?>

<script src="_____/template/js/page/modules-datatables.js"></script>
<script src="_____/js/jquery.table2excel.min.js"></script>
<script>
    $('#xls').click(function () {
        $("#table-2").table2excel({
            exclude: ".excludeThisClass",
            name: "Data Disposisi",
            filename: "Persuratan - Biro Keuangan BNPB"
        });
    });  
</script>
<script src="_____/template/modules/izitoast/js/iziToast.min.js"></script>
<script>
    $('#tanggal_surat').change(function(e){
        e.preventDefault();
        var tanggal_surat = $(this).val();
        $.ajax({
            url: "app/__API/filter-year.php?tanggal_surat="+tanggal_surat,
            success:function(res){
                if (res) {
                    $('#data_row').empty();
                    $('#data_row').html(res);
                    $('#data_row2').empty();
                    $('#data_row2').html(res);
                }
            }
        })
    });
</script>
<?php
    if(isset($_GET['session'])){
        if($_GET['session'] == "successSave"){
        ?>
            <script>
                $('#persuratan').addClass('active');
                iziToast.success({
                    title: 'Sukses!',
                    message: 'Berhasil menambah surat!',
                    position: 'bottomRight'
                });
            </script>
        <?php
        }
        elseif($_GET['session'] == "successUpdate"){
            ?>
            <script>
                $('#persuratan').addClass('active');
                iziToast.success({
                    title: 'Sukses!',
                    message: 'Berhasil memperbarui surat!',
                    position: 'bottomRight'
                });
            </script>
        <?php
        }
        elseif($_GET['session'] == "successDelete"){
            ?>
            <script>
                $('#persuratan').addClass('active');
                iziToast.success({
                    title: 'Sukses!',
                    message: 'Berhasil menghapus surat!',
                    position: 'bottomRight'
                });
            </script>
        <?php
        }
    }
?>