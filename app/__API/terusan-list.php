<?php
    include '../config/db.php';
    $q = mysqli_query($conn, "SELECT * FROM terusan ORDER BY id DESC");
    $i = 1;
    foreach($q as $res){
?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $res['terusan'] ?></td>
            <td nowrap>
                <a href="#" id="<?php echo $res['id']; ?>" class="btn btn-info btn-sm edit">Edit</a>
                <a href="#" data-id="<?php echo $res['id']; ?>" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteCModal_">Delete</a>
            </td>
        </tr>
<?php
    $i++;
    }
?>