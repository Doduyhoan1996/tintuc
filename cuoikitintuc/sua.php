<?php
		 $conn = mysqli_connect("localhost", "root", "", "tintuccuoiki");
            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
	$idt=$_GET['idtin'];
        $idL=$_GET['idloai'];
        
	$tieude= $_POST['TD'];
        $tieudekd=$_POST['TDkd'];
        $tomtat=$_POST['TT'];
        $NoiDung=$_POST['ND'];

		

		$tieude = str_replace("\<br />", "",$tieude );
		$tieudekd = str_replace("<br />", "", $tieudekd);
		$tomtat = str_replace("\n\n", "<br />", $tomtat);
		$NoiDung = str_replace("\n\n", "<br />", $NoiDung);
                $update=date('Y-m-d H:i:s');
		

		$sqla = "SELECT HinhAnh FROM tintuc WHERE Id=$idt";
		$texta = mysqli_query($conn,$sqla);
		$rowa = mysqli_fetch_array($texta);

		$anh = $rowa['HinhAnh'];
		if('anh/'.$_FILES['Images']['name']!=$anh && 'anh/'.$_FILES['Images']['name']!='anh/' )
			$anh=$_FILES['Images']['name'];
		$stmt = $conn->prepare("UPDATE tintuc SET TieuDe=?, TieuDeKhongDau=?, TomTat=?, NoiDung=?,HinhAnh=?, Updated=? WHERE Id=$idt");
		$stmt->bind_param("ssssss", $tieude, $tieudekd, $tomtat,$NoiDung,$anh,$update);

		$stmt->execute();
		echo "Sua bai viet thanh cong";
                header("location:loaitin.php?id_loai=$idL");
                echo "<script>alert('Sua bai viet thanh cong!')</script>";
?>


<?php
		$stmt->close();
		$conn->close();
		
	
	
?>