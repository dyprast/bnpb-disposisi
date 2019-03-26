<?php 
	include '../config/db.php';

	if (isset($_POST['status'])) {
		if ($_POST['status'] == "Tambah") {
			$terusan = $_POST['terusan'];
			$q = mysqli_query($conn, "INSERT INTO terusan (terusan) VALUES ('$terusan')");
		}
		if ($_POST['status'] == "Get_data") {
			$id = $_POST['id'];
			$q = mysqli_query($conn, "SELECT * FROM terusan WHERE id='$id'");
			foreach($q as $res){
				$output['terusan'] = $res['terusan'];
				$output['id'] = $id;
				echo json_encode($output);
			}
		}
		if ($_POST['status'] == "Edit") {
            $id = $_POST['id'];
            $terusan = $_POST['terusan'];
			$q = mysqli_query($conn, "UPDATE terusan SET terusan='$terusan' WHERE id = '$id'");
		}
		if ($_POST['status'] == "Hapus") {
			$id = $_POST['id'];
			$q = mysqli_query($conn, "DELETE FROM terusan WHERE id='$id'");
		}
	}
 ?>