<?php
	include('model/m_tintuc.php');
	include('model/pager.php');
	class C_tintuc{
		function getMenuleft(){
			$m_tintuc = new M_tintuc();
			$menu = $m_tintuc->Getmenuleft();
			return array('menu'=>$menu);
		}
		function getMenu(){
			$m_tintuc = new M_tintuc();
			$menu = $m_tintuc->getmenu();
			return array('menu'=>$menu);
		}
		function LoaiTin(){
			$id_loai = $_GET['id_loai'];
			$m_tintuc = new M_tintuc();
			$danhmuctin = $m_tintuc->gettintucLoaiTin($id_loai);


			$tranghientai = (isset($_GET['page'])) ? $_GET['page']:1;
			$pagination = new pagination(count($danhmuctin),$tranghientai,4,3);
			$paginationhtml = $pagination->showPagination();
			$limit = $pagination->_nItemOnPage;
			$vitri = ($tranghientai-1)*$limit;
			$danhmuctin = $m_tintuc->gettintucLoaiTin($id_loai,$vitri,$limit);


			$menu = $m_tintuc->getmenu();
			$title = $m_tintuc->gettitle($id_loai);
			$tinlienquan = $m_tintuc->gettienlquanloaitin($id_loai);
			return array('danhmuctin'=>$danhmuctin,'menu'=>$menu,'title'=>$title,'tinlienquan'=>$tinlienquan,'thanhphantrang'=>$paginationhtml);
		}
		function chitiettin(){
			$id_tin = $_GET['id_tin'];
			$id_lq = $_GET['loai_tin'];
			$m_tintuc = new M_tintuc();
			$ctiettin = $m_tintuc->getchitietin($id_tin);
			$tinlienquan = $m_tintuc->gettinlienquan($id_lq);
			$comment = $m_tintuc->getcomment($id_tin);
			return array('ctiettin'=>$ctiettin,'tinlienquan'=>$tinlienquan,'comment'=>$comment);
		}
		function thembinhluan($id_user,$id_tin,$noidung){
			$m_tintuc = new M_tintuc();
			$binhluan = $m_tintuc->addcomment($id_user,$id_tin,$noidung);
			header('Location:'.$_SERVER['HTTP_REFERER']);
		}	
	}
?>