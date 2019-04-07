<?php
include('controller/c_tintuc.php');
session_start();
$c_tintuc = new C_tintuc();
$cactin = $c_tintuc->chitiettin();
$ChiTietTin = $cactin['ctiettin'];
$tinlienquan = $cactin['tinlienquan'];
$comment = $cactin['comment'];

if(isset($_POST['binhluan'])){
	if(isset($_SESSION['id_user'])){
	$id_user = $_SESSION['id_user'];
	$id_tin = $_POST['id_tin'];
	$noidung = $_POST['noidung'];
	$comment = $c_tintuc->thembinhluan($id_user,$id_tin,$noidung);
	}
	else{
		$_SESSION['chua_dnhap'] = "Vui Lòng Đăng Nhập Để CMT";
	}
	
}
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
	
	<nav class="navbar navbar-default" id="navbar-default" role="navigation">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header" style="margin-right: 50px;">
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
					<button type="submit" class="btn btn-default" name="timkiem">Tìm Kiếm</button>
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
		</div>
	</nav>
	<div class="container">
		<div class="row">
			<div class="col-md-9" id="left">
                            <?php
                                 $conn = mysqli_connect("localhost", "root", "", "tintuccuoiki");
                                 // Check connection
                                 if (!$conn) {
                                  die("Connection failed: " . mysqli_connect_error());
                                             }
                                     $id_loai=$_GET['loai'];        
                                     $id_tin=$_GET['id_tin'];
                                     $sqltin= "SELECT * FROM tintuc Where Id = $id_tin";
                                     $Bai_tin= mysqli_query($conn,$sqltin);
                                     $Tin= mysqli_fetch_array($Bai_tin);
                            ?>
				<h3><?php echo $Tin['TieuDe']; ?></h3>
				<p>by	
					<a href="#">Admin</a>
				</p>
				<img class="img-responsive" src="anh/<?php echo $Tin['HinhAnh']; ?>" style="border: 1px solid grey; margin: auto;">
				<p><span class="glyphicon glyphicon-time"></span><?php echo $Tin['Created']; ?></p>
				<hr>
				<h3 class="luff"><?php echo $Tin['TomTat']; ?></h3>
				<p class="ace"><?php echo $Tin['NoiDung'];?></p>
				<hr>
				<?php
					if(isset($_SESSION['chua_dnhap'])) {
						echo "<div class='alert alert-danger'>".$_SESSION['chua_dnhap']."</div>";	
					}
				?>

				<div class="cmttt">
					<h4>Viết bình luận...<span class="glyphicon glyphicon-pencil"></span></h4>
					<form role="form" method="POST" action="#">
						<input type="hidden" name="id_tin" value="<?=$ChiTietTin->Id?>" >
						<div class="form-group">
							<textarea class="form-control" name="noidung" rows="3"></textarea>
						</div>
						<button type="submit" name="binhluan" class="btn btn-primary">Gửi</button>
					</form>
				</div><hr>

				<?php
				foreach ($comment as $cmt) {
					?>
					<div class="showcomment">
					<a href="#"><img src="http://placehold.it/60x60" style="float: left; margin-right: 10px;"></a>
					<h4><?=$cmt->Idusers?>
						<small class="glyphicon glyphicon-time"><?=$cmt->Created?></small>
					</h4>
					<p><?=$cmt->NoiDungCM?></p>
				</div><hr>
					<?php
				}
				?>
				
			</div>	
			<div class="col-md-3" id="right">
				<div class="panel panel-default">
					<div class="panel-heading"><b>Tin liên quan</b></div>
					<div class="panel-body">
						<?php
                                                $slqtlq= "SELECT * FROM tintuc Where Idloaitin = $id_loai ORDER BY Updated DESC LIMIT 0,3";
						$tlq = mysqli_query($conn, $slqtlq);
                                                if (mysqli_num_rows($tlq) > 0) {

										while ($rowtlq = mysqli_fetch_assoc($tlq)) {
                                                
							?>
							<div class="row" style="margin-top: 10px;">
								<div class="col-md-5">
									<a href="chitiettin.php?loai_tin=<?php echo $rowtlq['TieuDeKhongDau'];?>&id_tin=<?php echo $rowtlq['Id']?>&loai=<?php echo $id_loai?>">
										<img class="img-responsive" src="anh/<?php echo $rowtlq['HinhAnh'];?>" alt="">
									</a>
								</div>
								<div class="col-md-7">
									<a href="chitiettin.php?loai_tin=<?php echo $rowtlq['TieuDeKhongDau'];?>&id_tin=<?php echo $rowtlq['Id']?>&loai=<?php echo $id_loai ?>"><b><?php echo $rowtlq['TieuDe'];?></b></a>
								</div>
							</div><hr>
							<?php
						}
                                                }
						?>
					</div>
				</div>
				<!-- <div class="panel panel-default">
					<div class="panel-heading"><b>Tin nổi bật</b></div>
					<div class="panel-body">
				
						<div class="row" style="margin-top: 10px;">
							<div class="col-md-5">
								<a href="#">
									<img class="img-responsive" src="http://placehold.it/60x60" alt="">
								</a>
							</div>
							<div class="col-md-7">
								<a href="#"><b>Tiêu đề</b></a>
							</div>
							<p>Tóm tắt</p> 
						</div><hr>
						<div class="row" style="margin-top: 10px;">
							<div class="col-md-5">
								<a href="#">
									<img class="img-responsive" src="http://placehold.it/60x60" alt="">
								</a>
							</div>
							<div class="col-md-7">
								<a href="#"><b>Tiêu đề</b></a>
							</div>
							<p>Tóm tắt</p> 
						</div><hr>
					</div>
				</div> -->
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