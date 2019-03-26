<?php
    $id = $_GET['data-id'];
    include '../config/db.php';
    $q = mysqli_query($conn, "DELETE FROM surat WHERE id='$id'");
    if($q){
        header("location: ../../?page=persuratan&session=successDelete");
    }
?>