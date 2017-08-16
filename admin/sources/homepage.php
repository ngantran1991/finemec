<?php	if(!defined('_source')) die("Error");
$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
switch($act){
	case "capnhat":
		get_gioithieu();
		$template = "homepage/item_add";
		break;
	case "save":
		save_gioithieu();
		break;
		
	default:
		$template = "index";
}
function fns_Rand_digit($min,$max,$num)
	{
		$result='';
		for($i=0;$i<$num;$i++){
			$result.=rand($min,$max);
		}
		return $result;	
	}

function get_gioithieu(){
	global $d, $item, $itemNotice, $itemNews, $itemNoticeSelected, $itemNewsSelected, $itemBaiViet, $itemBaiVietSelected, $itemProduct, $itemProductSelected;

	$sql = "select * from #_background where type='".$_REQUEST['type']."' limit 0,1";
	$d->query($sql);
	if($d->num_rows()==0)
	{
		$data['hienthi'] = '1';
		$data['ngaytao'] = time();
		$data['type'] = $_REQUEST['type'];
		
		$d->setTable('background');
		if($d->insert($data))
			transfer("Dữ liệu được khởi tạo","index.php?com=homepage&act=capnhat&type=".$_REQUEST['type']);
		else
			transfer("Khởi tạo dữ liệu lỗi","index.php?com=homepage&act=capnhat&type=".$_REQUEST['type']);
	}
	$item = $d->fetch_array();
        
        $d->reset();
        $sql = "select * from #_news where id_danhmuc=3 ";
	$d->query($sql);
        $itemNotice = $d->result_array();
        
        $d->reset();
        $sql = "select id, is_homepage from #_news where id_danhmuc=3 and is_homepage <>0";
	$d->query($sql);
        $itemNoticeSelected = $d->result_array();
        
        $d->reset();
        $sql = "select * from #_news where id_danhmuc=2 ";
	$d->query($sql);
        $itemNews = $d->result_array();
        
        $d->reset();
        $sql = "select id, is_homepage from #_news where id_danhmuc=2 and is_homepage <>0";
	$d->query($sql);
        $itemNewsSelected = $d->result_array();
        
        $d->reset();
        $sql = "select * from #_news where type='gioithieu' ";
	$d->query($sql);
        $itemBaiViet = $d->result_array();
        
        $d->reset();
        $sql = "select id, is_homepage from #_news where type='gioithieu' and is_homepage <>0";
	$d->query($sql);
        $itemBaiVietSelected = $d->result_array();
        
        $d->reset();
        $sql = "select * from #_product where id<>0  and type='sanpham' ";
	$d->query($sql);
        $itemProduct = $d->result_array();
        
        $d->reset();
        $sql = "select id, is_homepage from #_product where id<>0  and type='sanpham' and is_homepage <>0";
	$d->query($sql);
        $itemProductSelected = $d->result_array();
        
}
function save_gioithieu(){
	global $d,$config;
        // update notice and news
        mysql_query("UPDATE table_news SET is_homepage = 0 where id <> 0");
        mysql_query("UPDATE table_product SET is_homepage = 0 where id <> 0");
        
        $isHomepageNo = 0;
        $isHomepageNew = 0;
        $isHomepageBV = 0;
        $isHomepageProduct = 0;
        $arrNotice = $_POST['notice'];
        foreach ($arrNotice as $itemNotice){
            if (!empty($itemNotice)){
                $isHomepageNo++;
                mysql_query("UPDATE table_news SET is_homepage = $isHomepageNo where id = $itemNotice");
            }
        }
        $arrNews = $_POST['news'];
        foreach ($arrNews as $itemNew){
            if (!empty($itemNew)){
                $isHomepageNew++;
                mysql_query("UPDATE table_news SET is_homepage = $isHomepageNew where id = $itemNew");
            }
        }
        
        $arrProduct = $_POST['product'];
        foreach ($arrProduct as $itemProduct){
            if (!empty($itemProduct)){
                $isHomepageProduct++;
                mysql_query("UPDATE table_product SET is_homepage = $isHomepageProduct where id = $itemProduct");
            }
        }
        
        $arrBV = $_POST['baiviet'];
        foreach ($arrBV as $itemBV){
            if (!empty($itemBV)){
                $isHomepageBV++;
                mysql_query("UPDATE table_news SET is_homepage = $isHomepageBV where id = $itemBV");
            }
        }
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=background&act=capnhat&type=".$_REQUEST['type']);
	
	foreach ($config['lang'] as $key => $value) {
		$file_name = $_FILES['file'.$key]['name'];		
		if($photo = upload_image("file".$key, _format_duoihinh,_upload_hinhanh,$file_name)){
			$data['photo'.$key] = $photo;
			//$data['thumb'] = create_thumb($data['photo'], 170, 130, _upload_hinhanh,$file_name,2);
			$d->setTable('background');			
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_hinhanh.$row['photo'.$key]);
				//delete_file(_upload_hinhanh.$row['thumb']);
			}
		}		
	}
	$data['link'] = $_POST['link'];
	$data['tenkhongdau'] = changeTitle($_POST['ten']);
	$data['title'] = $_POST['title'];
	$data['keywords'] = $_POST['keywords'];
	$data['description'] = $_POST['description'];
	$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
	$data['ngaysua'] = time();
	
	foreach ($config['lang'] as $key => $value) {
		$data['ten'.$key] = $_POST['ten'.$key];
		$data['mota'.$key] = magic_quote($_POST['mota'.$key]);
		$data['noidung'.$key] = magic_quote($_POST['noidung'.$key]);			
	}

	$d->reset();
	$d->setTable('background');
	$d->setWhere('type', $_REQUEST['type']);
	if($d->update($data))
		transfer("Dữ liệu được cập nhật", "index.php?com=homepage&act=capnhat&type=".$_REQUEST['type']);
	else
		transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=homepage&act=capnhat&type=".$_REQUEST['type']);
}

?>