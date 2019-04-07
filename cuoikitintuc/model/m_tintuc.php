<?php 
	include('database.php');
	class M_tintuc extends database{
		function Getmenuleft(){
			$sql = "SELECT tl.*, GROUP_CONCAT(lt.Id,':', lt.Ten,':', lt.TenKhongDau) AS Loaitin FROM theloai tl INNER JOIN loaitin lt ON lt.Idtheloai = tl.Id GROUP BY tl.Id";
			$this->setQuery($sql);
			return $this->loadAllRows();
		}
		function getmenu(){
			$sql = "SELECT tl.*, GROUP_CONCAT(Distinct lt.Id,':', lt.Ten,':', lt.TenKhongDau) AS Loaitin, tt.Id as idtin , tt.TieuDe as tieude , tt.HinhAnh as hinhtin , tt.TomTat as tomtattin, tt.TieuDeKhongDau as tieudetinkhongdau FROM theloai tl INNER JOIN loaitin lt ON lt.Idtheloai = tl.Id INNER JOIN tintuc tt ON tt.Idloaitin = lt.Id GROUP BY tl.Id";
			$this->setQuery($sql);
			return $this->loadAllRows();
		}
		function gettintucLoaiTin($id_loaitin,$vitri = -1,$limit = -1)
		{
			$sql="SELECT * FROM tintuc WHERE Idloaitin= $id_loaitin";
			if($vitri>-1 && $limit>1){
				$sql .= "limit $vitri,$limit";
			}
			$this->setQuery($sql);
			return $this->loadAllRows(array($id_loaitin));
		}
		function gettienlquanloaitin($id_loaitin){
			$sql ="SELECT TenKhongDau FROM loaitin WHERE Id = $id_loaitin";
			$this->setQuery($sql);
			return $this->loadRow(array($id_loaitin));
		}
		function gettitle($id_loaitin){
			$sql = "SELECT Ten From loaitin WHERE Id = $id_loaitin";
			$this->setQuery($sql);
			return $this->loadRow(array($id_loaitin));
		}
		function getchitietin($id_cttin){
			$sql ="SELECT * FROM tintuc WHERE Id = $id_cttin";
			$this->setQuery($sql);
			return $this->loadRow(array($id_cttin));
		}
		function gettinlienquan($tin_lq){
			$sql = "SELECT tt.*, lt.TenKhongDau as TenKhongDau,lt.Id as idloaitin FROM tintuc tt INNER JOIN loaitin lt ON tt.Idloaitin = lt.Id WHERE lt.TenKhongDau = '$tin_lq' limit 0,5";
			$this->setQuery($sql);
			return $this->loadAllRows(array($tin_lq));


		}
		function getcomment($id_tin){
			$sql = "SELECT * FROM comment WHERE Idtintuc = $id_tin";
			$this->setQuery($sql);
			return $this->loadAllRows(array($id_tin));
		}
		function addcomment($id_user,$id_tin,$noidung){
			$sql = "INSERT INTO comment(Idusers,Idtintuc,NoiDungCM) VALUES (?,?,?)";
			$this->setQuery($sql);
			return $this->execute(array($id_user,$id_tin,$noidung));
		}
	}

 ?>	