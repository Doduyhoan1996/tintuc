<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "tintuccuoiki");
            // Check connection
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
$sqllt = "SELECT * FROM theloai ";
$sqllt2 = "SELECT  theloai.Id AS Id, theloai.Ten AS Ten, theloai.TenKhongDau AS TenKhongDau, tintuc.Id AS idtin, tintuc.TieuDe AS tieude, tintuc.TieuDeKhongDau AS tieudekhongdau, tintuc.HinhAnh as hinhtin, tintuc.TomTat as tomtattin,tintuc.Updated FROM tintuc,theloai,loaitin WHERE tintuc.Idloaitin=loaitin.Id AND loaitin.Idtheloai=theloai.Id ORDER BY tintuc.Updated DESC LIMIT 0,4";
$result = mysqli_query($conn, $sqllt);
$result2 = mysqli_query($conn, $sqllt2);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Tin Vịt</title>
	<link rel="stylesheet" type="text/css" href="css/mycss.css">
	<meta charset="utf-8">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
	<script src="jquery/jquery.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container-fluid">
		<div class="container">
			<nav class="navbar navbar-default" id="navbar-default" role="navigation">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" id="navbar-brand1" href="#">
						<img src="anh/anhnen.jpg" class="img-circle">
					</a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<form class="navbar-form navbar-left" role="search" action="timkiem.php" method="get">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Nhập nội dung tìm kiếm" name="search">
						</div>
						<button type="submit" class="btn btn-danger" name="timkiem">Tìm Kiếm</button>
					</form>
					<ul class="nav navbar-nav navbar-right" id="navbar-right">
						<?php
						if(isset($_SESSION['user_name'])){
							?>
							<li><a href="index.php">Home</a></li>
							<li><a href="dangxuat.php">Đăng xuất</a></li>
							<li><a class="glyphicon glyphicon-user" href="#"><?=$_SESSION['user_name']?></a></li>
							<?php
						}
						else{
							?>
							<li><a href="index.php">Home</a></li>
							<li><a href="dangnhap.php">Đăng nhập</a></li>
							<li><a href="dangki.php">Đăng kí</a></li>
						
							<?php
						}
						?>
					</ul>
				</div><!-- /.navbar-collapse -->
			</nav>
		</div><hr>
		<div class="container">
			<div class="row main-left">
				<div class="col-md-3">
					<ul class="list-group">
						<li href="#" class="list-group-item active">Menu</li>
						<?php
						if (mysqli_num_rows($result) > 0) {

							while ($row = mysqli_fetch_assoc($result)) {
								?>
								<li class="list-group-item menu1">
										<?php $idtl=$row['Id']; echo $row['Ten'] ?>
								</li>
								<ul>
									<?php
									$sqllt = "SELECT * FROM loaitin Where Idtheloai= $idtl ";
									$result1 = mysqli_query($conn, $sqllt);
									if (mysqli_num_rows($result1) > 0) {

										while ($row1 = mysqli_fetch_assoc($result1)) {
											?>
											<li class="list-group-item"><a href="loaitin.php?id_loai=<?php echo $row1['Id']?>"> <?php echo $row1['Ten']; ?> </a></li>

											<?php
										}
										?>
									</ul>
									<?php

								}
							}
						}
						?>
						
					</ul>	
				</div>
				<div class="col-md-9">
					<div class="panel panel-default">
						<div class="panel-heading" id="headd" style="background: #2b669a;">
							<h3 class="panel-title" id="title"><b>Tin Tức-Sự Kiện</b></h3>
						</div>
						<div class="panel-body">
							<?php
							if (mysqli_num_rows($result2) > 0) {

								while ($row2 = mysqli_fetch_assoc($result2)) {
									?>
									<div class="row-item row">
										<h3>
											
											
											<a href="#"><?php $id = $row2['Id']; echo $row2['Ten']; ?></a> |
											<?php
											$sqllt1 = "SELECT * FROM loaitin Where Idtheloai = $id ";
											$result3 = mysqli_query($conn, $sqllt1);
											if (mysqli_num_rows($result3) > 0) {

												while ($row3 = mysqli_fetch_assoc($result3)) {
													?>
													<small><a href="loaitin.php?id_loai=<?php echo $row3['Id']; ?>"><i><?php echo $row3['Ten']; ?></i></a>/</small>
													
													<?php
													
												}}
												?>
											</h3>
											<div class="col-md-12">
												<div class="col-md-3">
													<a href="#"><img class="img-thumbnail" src="anh/<?php echo $row2['hinhtin'];?>"></a>
												</div>
												<div class="col-md-9">
													<h3><?php echo $row2['tieude']; ?></h3>
													<p><?php echo $row2['tomtattin']; ?></p>
													<a class="btn btn-primary" href="chitiettin.php?loai_tin=<?php echo $row2['tieudekhongdau']; ?>&id_tin=<?php echo $row2['idtin']; ?>&loai=<?php echo $row2['Id']; ?>">View <span class=" glyphicon glyphicon-hand-right"></span></a>
												</div>
											</div>
										</div>
										<?php }}?>
										
										
									</div>		
								</div>
							</div>
						</div>
					</div>	
					<footer>
						<div class="container">
							<div class="row" id="endpage">
								<div class="col-md-12">
									<p>Copyright &copy by SV Khoa CNTT Học Viện Quản Lí Giáo Dục 2017</p>
								</div>
							</div>
						</div>
						
					</footer>
				</body>
				</html>