<?php
include('controller/c_user.php');
$c_user = new C_user();
if(isset($_POST['dangnhap'])){
	$email = $_POST['email'];
	$password = $_POST['password'];
	$user = $c_user->dangnhapTK($email,$password);
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
				<form class="navbar-form navbar-left" role="search">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Nhập nội dung tìm kiếm">
					</div>
					<button type="submit" class="btn btn-danger">Tìm Kiếm</button>
				</form>
				<ul class="nav navbar-nav navbar-right" id="navbar-right">
					<li><a href="index.php">Home</a></li>
					<li><a href="dangnhap.php">Đăng nhập</a></li>
					<li><a href="dangkitk.php">Đăng kí</a></li>
					<li><a class="glyphicon glyphicon-user" href="#"></a></li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</nav>
	</div><hr>
	  <div class="container">

    	<!-- slider -->
    	<div class="row carousel-holder">
    		<div class="col-md-2"></div>
            <div class="col-md-8">
            	<?php
					if(isset($_SESSION['user_error'])) {
						echo "<div class='alert alert-danger'>".$_SESSION['user_error']."</div>";	
					}
				?>
                <div class="panel panel-default">
				  	<div class="panel-heading">Đăng nhập</div>
				  	<div class="panel-body">
				    	<form method="POST" action="#">
							<div>
				    			<label>Email</label>
							  	<input type="email" class="form-control" placeholder="Email" name="email" 
							  	>
							</div>
							<br>	
							<div>
				    			<label>Mật khẩu</label>
							  	<input type="password" class="form-control" name="password">
							</div>
							<br>
							<button type="submit" name="dangnhap" class="btn btn-success">Đăng nhập</button>
				    	</form>
				  	</div>
				</div>
            </div>
            <div class="col-md-2"></div>
        </div>
        <!-- end slide -->
    </div>
</body>
</html>