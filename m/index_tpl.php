<?php
	$d->reset();
	$sql="select noidung$lang as noidung,photo from #_about where type='about' and hienthi=1 limit 0,1";
	$d->query($sql);
	$tintuc_detail=$d->fetch_array();

	$d->reset();
	$sql="select photo,link from #_background where type='bannerqc' and hienthi=1 limit 0,1";
	$d->query($sql);
	$bannerqc=$d->fetch_array();
?>

<div class="wap_about">
	
	<div class="wap_aboutr">
		<div class="tieude_giua"><div><?=_gioithieu?></div><span></span></div>
		<div class="wap_aboutl" style="margin: 0px; float: none; margin-bottom: 10px; margin-top: 42px;">
			<img src="thumb/370x230/1/<?=_upload_hinhanh_l.$tintuc_detail['photo']?>" alt="<?=$company['ten']?>">
		</div>
		<?=$tintuc_detail['noidung']?>
		<a href="gioi-thieu.html" class="xemthem"><?=_xemthem?></a>
	</div>
	<div class="clear"></div>
</div>

<div class="tieude_giua"><div><?=$title_cat?></div><span></span></div>
<div class="wap_item">
<?php for($i=0,$count_product=count($product);$i<$count_product;$i++){	?>
    <div class="item">
            <p class="sp_img hover_sang1"><a href="<?=$com?>/<?=$product[$i]['tenkhongdau']?>-<?=$product[$i]['id']?>.html" title="<?=$product[$i]['ten']?>">
            <img src="<?php if($product[$i]['photo']!=NULL) echo 'thumb/205x140/1/'._upload_sanpham_l.$product[$i]['photo']; else echo 'images/noimage.png';?>" alt="<?=$product[$i]['ten']?>" /></a></p>

            <div class="bongmo"></div>
            <h3 class="sp_name"><a href="san-pham/<?=$product[$i]['tenkhongdau']?>-<?=$product[$i]['id']?>.html" title="<?=$product[$i]['ten']?>" ><?=$product[$i]['ten']?></a></h3>
    </div><!---END .item-->
<?php } ?>
<div class="clear"></div>
<div class="pagination"><?=pagesListLimitadmin($url_link , $totalRows , $pageSize, $offset)?></div>
</div><!---END .wap_item-->
<div class="clear"></div>
<?php if($bannerqc['photo']!=""){ ?>
<a href="<?=$bannerqc['link']?>" class="bannerqc_img">
	<img src="<?=_upload_hinhanh_l.$bannerqc['photo']?>" alt="<?=$company['ten']?>">
</a>
<?php } ?>
