<?php
	$com = (isset($_REQUEST['com'])) ? addslashes($_REQUEST['com']) : "";
	$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
	$d = new database($config['database']);
	
	#Thông tin công ty
	$d->reset();
	$sql_company = "select *,ten$lang as ten,diachi$lang as diachi from #_company limit 0,1";
	$d->query($sql_company);
	$company= $d->fetch_array();

	$d->reset();
	$sql = "select photo from #_background where type='baotri' and hienthi=1 ";
	$d->query($sql);
	$baotri= $d->fetch_array();
	$link_baotri = getCurrentPageURL()._upload_hinhanh_l.$baotri['photo'];

	if($baotri['photo']!="") {
		redirect($link_baotri);	
	}

	switch($com)
	{
		
		/*case 'gioi-thieu':
			$type = "about";
			$title = _gioithieu;
			$title_cat = _gioithieu;
			$source = "about";
			$template = "about";
			break;*/
                case 'company':
			$type = "company";
			$title = _company;
			$title_cat = _company;
			$title_other = _tinlienquan;
			$source = "news";
			$template = "news_detail";
			break;
                    
                 case 'site-map':
			$type = "site-map";
			$title = _company;
			$title_cat = _company;
			$title_other = _tinlienquan;
			$source = "sitemap";
			$template = "news_detail";
			break;
                    
                case 'media':
			$type = "media";
			$title = _media;
			$title_cat = _media;
			$title_other = _tinlienquan;
			$source = "media";
			$template = isset($_GET['id']) ? "media_detail" : "news";
			break;
                    
                case 'media-detail':
			$type = "media";
			$title = _media;
			$title_cat = _media;
			$title_other = _tinlienquan;
			$source = "media-detail";
			$template = isset($_GET['id']) ? "media_detail_item" : "news";
			break;
                    
                case 'clinic':
			$type = "clinic";
			$title = _clinic;
			$title_cat = _clinic;
			$title_other = _tinlienquan;
			$source = "clinic";
			$template = isset($_GET['id']) ? "clinic_detail" : "news";
			break;
                    
                case 'clinic-detail':
			$type = "clinic";
			$title = _clinic;
			$title_cat = _clinic;
			$title_other = _tinlienquan;
			$source = "clinic-detail";
			$template = isset($_GET['id']) ? "clinic_detail_item" : "news";
			break;
			
		case 'tin-tuc':
			$type = "tintuc";
			$title = _tintuc;
			$title_cat = _tintuc;
			$title_other = _tinlienquan;
			$source = "news";
			$template = isset($_GET['id']) ? "news_detail" : "news";
			break;

		case 'ho-tro':
			$type = "hotro";
			$title = _hotro;
			$title_cat = _hotro;
			$title_other = _tinlienquan;
			$source = "news";
			$template = isset($_GET['id']) ? "news_detail" : "news";
			break;

		case 'dich-vu':
			$type = "dichvu";
			$title = _dichvu;
			$title_cat = _dichvu;
			$title_other = _tinlienquan;
			$source = "news";
			$template = isset($_GET['id']) ? "news_detail" : "news";
			break;

		case 'gioi-thieu':
			$type = "gioithieu";
			$title = _gioithieu;
			$title_cat = _gioithieu;
			$title_other = _tinlienquan;
			$source = "news";
			$template = isset($_GET['id']) ? "news_detail" : "news";
			break;
			
		case 'dich-vu':
			$type = "dichvu";
			$title = _dichvu;
			$title_cat = _dichvu;
			$title_other = _tinlienquan;
			$source = "news";
			$template = isset($_GET['id']) ? "news_detail" : "news";
			break;
			
		case 'tuyen-dung':
			$type = "tuyendung";
			$title = _tuyendung;
			$title_cat = _tuyendung;
			$title_other = _tinlienquan;
			$source = "news";
			$template = isset($_GET['id']) ? "news_detail" : "news";
			break;

		case 'catalogue':
			$type = "catalogue";
			$title = 'Catalogue';
			$title_cat = 'Catalogue';
			//$title_other = _tinlienquan;
			$source = "catalogue";
			$template = "catalogue";
			break;
			
		case 'cong-trinh':
			$type = "congtrinh";
			$title = _congtrinh;
			$title_cat = _congtrinh;
			$title_other = _tinlienquan;
			$source = "news";
			$template = isset($_GET['id']) ? "congtrinh_detail" : "news";
			break;
			
		/*case 'du-an':
			$type = "duan";
			$title = _duan;
			$title_cat = _duan;
			$title_other = _tinlienquan;
			$source = "news";
			$template = isset($_GET['id']) ? "congtrinh_detail" : "news";
			break;*/
			
		case 'lien-he':
			$type = "lienhe";
			$title = _lienhe;
			$title_cat = _lienhe;
			$source = "contact";
			$template = "contact";
			break;

		case 'tim-kiem':
			$title = _ketquatimkiem;
			$title_cat = _ketquatimkiem;
			$source = "search";
			$template = "search";
			break;
			
		case 'tags':
			$type = "sanpham";
			$title = _tagsanpham;
			$title_cat = _tagsanpham;
			$source = "product";
			$template = "product";
			break;	
			
		case 'tag':
			$type = "tintuc";
			$title = _tagbaiviet;
			$title_cat = _tagbaiviet;
			$source = "news";
			$template = "news";
			break;	
							
		case 'san-pham':
			$type = "sanpham";
			$title = _sanpham;
			$title_cat = _sanpham;
			$title_other = _sanphamcungloai;
			$source = "product";
			$template = isset($_GET['id']) ? "product2_detail" : "product";
			break;

		case 'du-an':
			$type = "duan";
			$title = _duan;
			$title_cat = _duan;
			$title_other = _tinlienquan;
			$source = "product";
			$template = isset($_GET['id']) ? "product_detail" : "news";
			break;
			
		case 'phan-trang-danh-muc':
			$type = "sanpham";
			$title = _sanpham;
			$title_cat = _sanpham;
			$source = "phantrang_dm";
			$template = "phantrang_dm";
			break;
			
		case 'video':
			$title = 'Video Clip';
			$title_cat = "Video Clip";
			$source = "video";
			$template = "video";
			break;
		
		case 'gio-hang':
			$type = "giohang";
			$title = _giohang;
			$title_cat = _giohang;
			$source = "giohang";
			$template = "giohang";
			break;	
			
		case 'thanh-toan':
			$type = "thanhtoan";
			$title = _thanhtoan;
			$title_cat = _thanhtoan;
			$source = "thanhtoan";
			$template = "thanhtoan";
			break;
			
		case 'dang-ky':
			$type = "dangky";
			$title = _dangky;
			$title_cat = _dangky;
			$source = "dangky";
			$template = "dangky";
			break;
			
		case 'dang-nhap':
			$type = "dangnhap";
			$title = _dangnhap;
			$title_cat = _dangnhap;
			$source = "dangnhap";
			$template = "dangnhap";
			break;
		
		case 'quen-mat-khau':
			$type = "quenmatkhau";
			$title = _quenmatkhau;
			$title_cat = _quenmatkhau;
			$source = "quenmatkhau";
			$template = "quenmatkhau";
			break;
			
		case 'thay-doi-thong-tin':
			$type = "thaydoithongtin";
			$title = _thaydoithongtin;
			$title_cat = _thaydoithongtin;
			$source = "thaydoithongtin";
			$template = "thaydoithongtin";
			break;
			
		case 'dang-xuat':
			logout();
			break;
				
		case 'them-user':
			$source = "user";
			$template = "user";
			break;
			
		case 'ngonngu':
			if(isset($_GET['lang']))
			{
				switch($_GET['lang'])
					{
						case '':
							$_SESSION['lang'] = '';
							break;
						case 'en':
							$_SESSION['lang'] = 'en';
							break;
						default: 
							$_SESSION['lang'] = '';
							break;
					}
			}
			else{
				$_SESSION['lang'] = '';
			}
		redirect($_SERVER['HTTP_REFERER']);
		break;
											
		default: 
			$source = "index";
			$template = "index";
			break;
	}

	if($source!="") include _source.$source.".php";	
	if($_REQUEST['com']=='logout')
	{
		session_unregister($login_name);
		header("Location:index.php");
	}

	$arr_animate =array("wow bounce","wow flash","wow pulse","wow rubberBand","wow shake","wow swing","wow tada","wow wobble","wow jello","wow bounceIn","wow bounceInDown","wow bounceInLeft","wow bounceInRight","wow bounceInUp","wow bounceOut","wow bounceOutDown","wow bounceOutLeft","wow bounceOutRight","wow bounceOutUp","wow fadeIn","wow fadeInDown","wow fadeInDownBig","wow fadeInLeft","wow fadeInLeftBig","wow fadeInRight","wow fadeInRightBig","wow fadeInUp","wow fadeInUpBig","wow fadeOut","wow fadeOutDown","wow fadeOutDownBig","wow fadeOutLeft","wow fadeOutLeftBig","wow fadeOutRight","wow fadeOutRightBig","wow fadeOutUp","wow fadeOutUpBig","wow flip","wow flipInX","wow flipInY","wow flipOutX","wow flipOutY");		
?>