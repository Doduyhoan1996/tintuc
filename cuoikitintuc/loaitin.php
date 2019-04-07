<?php
include ('controller/c_tintuc.php');
session_start();
$c_tintuc= new C_tintuc();
$danhmuctintuc = $c_tintuc->LoaiTin();
$tintuc = $danhmuctintuc['danhmuctin'];
$noidung = $c_tintuc->getMenuleft();
$menu = $noidung['menu'];
$title = $danhmuctintuc['title'];
$tinlienquan = $danhmuctintuc['tinlienquan'];
$thanhphantrang = $danhmuctintuc['thanhphantrang'];
?>
<?php

$conn = mysqli_connect("localhost", "root", "", "tintuccuoiki");
            // Check connection
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
$sqllt = "SELECT * FROM theloai ";

$result = mysqli_query($conn, $sqllt);


?>
<!DOCTYPE html>
<html>
<head>
	<title>Tin Vịt</title>
	
	<meta charset="utf-8">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="css/mycss.css">
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
					<a class="navbar-brand" id="navbar-brand1" href="index.php">
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
							<li><a href="dangkitk.php">Đăng kí</a></li>

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
						//foreach($menu as $mn){
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
//								$loaitin = explode(',',$mn->Loaitin);
//								foreach ($loaitin as $loai) {
//									list($id,$ten,$tenkhongdau) = explode(':',$loai);
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
					<?php
					if(isset($_SESSION['user_name'])&&$_SESSION['user_name']=="Admin"){
						?>
						<div class="panel panel-default">
							<div class="panel-heading"><b>ADMIN</b></div>
							<div class="panel-body">

								<div class="row" style="margin-top: 10px;">
									<div class="col-md-5">
										<?php
										$idloai = $_GET['id_loai'];
										?>
										<a href="themtinad.php?idloai=<?php echo $idloai;?>">
											Thêm
										</a>
									</div>
								</div><hr>
							</div>
						</div>
						<?php
					}
					?>
				</div>
				<?php 
				$idlt= $_GET['id_loai'];
				$sqltt = "SELECT * FROM tintuc Where Idloaitin= $idlt ORDER BY Id DESC ";
				$result2 = mysqli_query($conn, $sqltt);
				$sql = "SELECT * FROM loaitin Where Id= $idlt ";
				$result3 = mysqli_query($conn, $sql);
				$row3 = mysqli_fetch_array($result3);

				?>
				<div class="col-md-6">

					<div class="panel panel-default">
						<div class="panel-heading" id="headd" style="background: #2b669a;">
							<h3 class="panel-title" id="title"><b><?php echo $row3['Ten']; ?></b></h3>
						</div>
						<div class="panel-body">
							<?php
							//foreach ($tintuc as $tin) {
							if (mysqli_num_rows($result2) > 0) {

								while ($row2 = mysqli_fetch_assoc($result2)) {
									?>
									<div class="row-item row">
										<div class="col-md-12">
											<div class="col-md-3">
												<a href="chitiettin.php?loai_tin=<?php echo $row2['TieuDeKhongDau'];?>&id_tin=<?php echo $row2['Id']; ?>&loai=<?php echo $idlt ?>"><img class="img-thumbnail" src="anh/<?php echo $row2['HinhAnh']; ?>"></a> 
											</div>
											<div class="col-md-9">
												<h3><?php echo $row2['TieuDe']; ?></h3>
													<a class="btn btn-primary" href="chitiettin.php?loai_tin=<?php echo $row2['TieuDeKhongDau'];?>&id_tin=<?php echo $row2['Id']; ?>&loai=<?php echo $idlt ?>">View<span class=" glyphicon glyphicon-hand-right"></span></a>
												
												<?php
												if(isset($_SESSION['user_name']) &&$_SESSION['user_name']=="Admin"){
													?>
													<a class="btn btn-primary" href="suatinad.php?idloai=<?php echo $idloai;?>&id_tin=<?php echo $row2['Id'];?>" style="margin-left: 30px;">Sửa<span class=" glyphicon glyphicon-hand-right"></span></a>
													<a class="btn btn-primary" href="xoa.php?idloai=<?php echo $idloai;?>&id_tin=<?php echo $row2['Id'];?>" style="margin-left: 30px;">Xóa<span class=" glyphicon glyphicon-hand-right"></span></a>
													<?php
												}
												?>
											</div>
										</div>
									</div><hr>
									<?php
								}
							}
							?>
						</div>		
					</div>
					<div class="row text-center">
						<div class="col-lg-12">
							<?=$thanhphantrang?>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="panel panel-default">
						<div class="panel-heading"><b>Quảng cáo</b></div>
						<div class="panel-body">
							<div class="row" >
								<div class="advertisement">
									<a href="#">
										<img class="img-responsive" src="http://placehold.it/200x120" alt="">
									</a>
									<a href="#"><b>Tiêu đề</b></a>
								</div>
							</div><hr>
							<div class="row">
								<div class="advertisement">
									<a href="#">
										<img class="img-responsive" src="http://placehold.it/200x120" alt="">
									</a>
									<a href="#"><b>Tiêu đề</b></a>
								</div>
							</div><hr>
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