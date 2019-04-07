<?php
// Create connection
            $conn = mysqli_connect("localhost", "root", "", "tintuccuoiki");
            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
if (isset($_POST['addtin'])) {

    $file = $_FILES['Images'];
    if ($file['name'] == "") {
        echo 'không tải được ảnh';
   } else {
       move_uploaded_file($file['tmp_name'], 'anh/' . $file['name']);

        
        $HA=$_FILES['Images']['name'];

        $TD = $_POST['TD'];
        $TDkd = $_POST['TDkd'];
        $TT = $_POST['TT'];
        $ND= $_POST['ND'];
        $IDlt=$_GET['idloai'];


        $sql = "INSERT INTO tintuc(TieuDe,TieuDeKhongDau,TomTat,NoiDung,HinhAnh,Idloaitin) VALUES ('" . $TD . "','" . $TDkd . "','" . $TT . "','" . $ND . "','" . $HA . "','" . $IDlt . "')";
        $query = mysqli_query($conn, $sql);
    echo "Thêm Thành Công<br />";
    header("location:loaitin.php?id_loai=$IDlt");
    }
    
    
   
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tin Vịt</title>
	<link rel="stylesheet" type="text/css" href="css/themtinad.css">
	<meta charset="utf-8">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
	<script src="jquery/jquery.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<nav class="navbar navbar-default" role="navigation">
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">Admin Area</a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
							<a href="#" class="glyphicon glyphicon-user" data-toggle="dropdown">Admin <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="#">Đăng Xuất</a></li>
							</ul>
						</li>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div>
		</nav>
	</div>
	<div class="container">
		<div class="row main-left">
			<div class="col-md-3">
				<ul class="list-group">
					<li href="#" class="list-group-item active">Menu</li>
					<li class="list-group-item menu1">
						<a href="#">Tin tức</a>
					</li>
					<ul>
						<li class="list-group-item"><a href="">Danh sách tin</a></li>
						<li class="list-group-item"><a href="">Thêm tin</a></li>
					</ul>

				</ul>	
			</div>
			<div class="col-md-9">
				<div class="panel panel-default">
					<div class="panel-heading" id="headd" style="background: #2b669a;">
						<h3 class="panel-title" id="title"><b>Thêm tin tức</b></h3>
					</div>
					<div class="panel-body">
						<div class="row-item row">
							<div class="col-lg-7" style="padding-bottom:120px">
								<form action="" method="POST" enctype="multipart/form-data">
									<div class="form-group">
										<label>Tiêu Đề</label>
										<textarea class="form-control" rows="3" name="TD"></textarea>
									</div>
									<div class="form-group">
										<label>Tiêu Đề Không Dấu</label>
										<textarea class="form-control" rows="3" name="TDkd"></textarea>
									</div>
									<div class="form-group">
										<label>Tóm Tắt</label>
										<textarea class="form-control" rows="3" name="TT"></textarea>
									</div>
									<div class="form-group">
										<label>Nội Dung</label>
										<textarea class="form-control" rows="3" name="ND"></textarea>
									</div>
									
									<div class="form-group">
										<label>Hình Ảnh</label>
										<input type="file" name="Images">
									</div>
                                                                    <button type="submit" class="btn btn-success" name="addtin">Thêm Tin</button>
									<button type="reset" class="btn btn-info">Reset</button>
                                                                </form>
									</div>		
								</div>
							</div>
						</div>
					</div>	
				</div>
			</div>
		</body>
		</html>