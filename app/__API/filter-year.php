<?php
    include '../config/db.php';
    include 'tanggal-indo.php';
    $year = $_GET['tanggal_surat'];
    if(!empty($year)){
        $q = mysqli_query($conn, "SELECT * FROM surat WHERE YEAR(tanggal_surat) = $year ORDER BY id DESC");

        if(mysqli_num_rows($q) > 0){
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
        }
    }
    else{
        $q = mysqli_query($conn, "SELECT * FROM surat ORDER BY id DESC");

        if(mysqli_num_rows($q) > 0){
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
        }
    }
?>