<?php  if(!defined('_source')) die("Error");
	
	if(isset($_GET['keyword'])){
		$tukhoa =  $_GET['keyword'];
		$tukhoa = trim(strip_tags($tukhoa));    	
		if (get_magic_quotes_gpc()==false) {
			$tukhoa = mysql_real_escape_string($tukhoa);    			
		}							

		$arr_type_news = "(type='tintuc' or type='gioithieu' or type='dichvu' or type='hotro' or type='tuyendung')";	

		$d->reset();
		$sql = "select id,ten$lang as ten,tenkhongdau,thumb,photo,masp,gia,giacu,mota$lang as mota,file,hangsanxuat$lang as hsx,luotxem,type from #_product where (ten$lang LIKE '%$tukhoa%' or masp LIKE '%$tukhoa%' or noidung$lang LIKE '%$tukhoa%') and (type='sanpham' or type='duan') and hienthi=1 order by stt,id desc";		
		$d->query($sql);
		$arr_product = $d->result_array();	


		$d->reset();
		$sql = "select id,ten$lang as ten,tenkhongdau,thumb,photo,mota$lang as mota,ngaytao,type FROM #_news where (ten$lang LIKE '%$tukhoa%' or noidung$lang LIKE '%$tukhoa%' or mota$lang LIKE '%$tukhoa%') and $arr_type_news and hienthi=1 order by stt,id desc";		
		$d->query($sql);
		$arr_tintuc = $d->result_array();	

		$arr_item = array_merge($arr_product,$arr_tintuc);
		// echo '<pre>';print_r($arr_item);echo '</pre>';
	}	
?>