<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "tintuccuoiki");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sqllt = "SELECT * FROM theloai ";
$sqllt2 = "SELECT tl.*, GROUP_CONCAT(Distinct lt.Id,':', lt.Ten,':', lt.TenKhongDau) AS Loaitin, tt.Id as idtin , tt.TieuDe as tieude , tt.HinhAnh as hinhtin , tt.TomTat as tomtattin, tt.TieuDeKhongDau as tieudetinkhongdau  FROM theloai tl INNER JOIN loaitin lt ON lt.Idtheloai = tl.Id INNER JOIN tintuc tt ON tt.Idloaitin = lt.Id GROUP BY tl.Id";
$result = mysqli_query($conn, $sqllt);
$result2 = mysqli_query($conn, $sqllt2);

// Nếu người dùng submit form thì thực hiện
if (isset($_REQUEST['timkiem'])) {
                                // Gán hàm addslashes để chống sql injection
    $search =$_GET['search'];

                                // Nếu $search rỗng thì báo lỗi, tức là người dùng chưa nhập liệu mà đã nhấn submit.
    if (empty($search)) {
        echo "Yeu cau nhap du lieu vao o trong";
    } else {
                                    // Dùng câu lênh like trong sql và sứ dụng toán tử % của php để tìm kiếm dữ liệu chính xác hơn.
        $query = "select * from tintuc where TieuDe like '%$search%'";

                                    // Kết nối sql
                                    // Thực thi câu truy vấn
        $sql = mysqli_query($conn, $query);

                                    // Đếm số đong trả về trong sql.
        $num = mysqli_num_rows($sql);

                                    // Nếu có kết quả thì hiển thị, ngược lại thì thông báo không tìm thấy kết quả
        if ($num > 0 && $search != "") {
                                        // Dùng $num để đếm số dòng trả về.

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
                                    <a href="#">
                                        <?php $idtl = $row['Id'];
                                        echo $row['Ten'] ?>
                                    </a>
                                </li>
                                <ul>
                                    <?php
                                    $sqllt = "SELECT * FROM loaitin Where Idtheloai= $idtl ";
                                    $result1 = mysqli_query($conn, $sqllt);
                                    if (mysqli_num_rows($result1) > 0) {

                                        while ($row1 = mysqli_fetch_assoc($result1)) {
                                            ?>
                                            <li class="list-group-item"><a href="loaitin.php?id_loai=<?php echo $row1['Id'] ?>"> <?php echo $row1['Ten']; ?> </a></li>

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
                            <h3 class="panel-title" id="title"><b><?php echo "$num Kết quả trả về với từ khóa: $search";?></b></h3>
                        </div>
                        <?php
                                // Vòng lặp while & mysql_fetch_assoc dùng để lấy toàn bộ dữ liệu có trong table và trả về dữ liệu ở dạng array.
                        echo '<table border="1" cellspacing="0" cellpadding="10">';
                        while ($rowtk = mysqli_fetch_assoc($sql)) {
                            ?>
                            <div class="panel-body">

                                <div class="row-item row">

                                    <div class="col-md-12">
                                        <div class="col-md-3">
                                            <a href="chitiettin.php?loai_tin=<?php echo $rowtk['TieuDeKhongDau']; ?>&id_tin=<?php echo $rowtk['Id']; ?>&loai=<?php echo $idtl ?>"><img class="img-thumbnail" src="anh/<?php echo $rowtk['HinhAnh']; ?>"></a>
                                        </div>
                                        <div class="col-md-9">
                                            <h3><?php echo $rowtk['TieuDe']; ?></h3>
                                            <p><?php echo $rowtk['TomTat']; ?></p>
                                            <a class="btn btn-primary" href="chitiettin.php?loai_tin=<?php echo $rowtk['TieuDeKhongDau']; ?>&id_tin=<?php echo $rowtk['Id']; ?>&loai=<?php echo $idtl ?>">View <span class=" glyphicon glyphicon-hand-right"></span></a>
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>

                </div>
            </div>	
            <?php
        }
    } else {
        echo "<script>alert('Không Tìm thấy kết quả cho $search!')</script>";
    }
}
}
?>
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

