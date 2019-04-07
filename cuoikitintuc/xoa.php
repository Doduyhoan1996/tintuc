<?php
	 $conn = mysqli_connect("localhost", "root", "", "tintuccuoiki");
            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            
        $id=$_GET['id_tin'];
        $idLt=$_GET['idloai'];
	$stmt = $conn->prepare("DELETE FROM tintuc where Id=?");
	$stmt->bind_param("i", $id);

	$stmt->execute();

	?>
	
	<?php  
		$stmt->close();
		$conn->close();
		//echo "Xoa bai viet thanh cong";
                 header("location:loaitin.php?id_loai=$idLt");
	
?>