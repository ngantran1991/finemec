<?php
	$d->reset();
	$sql="select noidung$lang as noidung,photo from #_about where type='about' and hienthi=1 limit 0,1";
	$d->query($sql);
	$tintuc_detail=$d->fetch_array();

	$d->reset();
	$sql="select photo$lang,link from #_background where type='bannerqc' and hienthi=1 order by stt, id desc";
	$d->query($sql);
	$arr_bannerqc=$d->result_array();
?>

<div class="wap_about">
	
	<div class="tieude_giua" style="margin-top: 20px;"><div><?=_gioithieu?></div><span></span></div>
	<div class="wap_aboutl">
		<img src="thumb/370x230/1/<?=_upload_hinhanh_l.$tintuc_detail['photo']?>" alt="<?=$company['ten']?>">
	</div>
	<div class="wap_aboutr">
		<?=$tintuc_detail['noidung']?>
		<a href="gioi-thieu.html" class="xemthem"><?=_xemthem?></a>
	</div>
	<div class="clear"></div>
</div>

<div class="tieude_giua"><div><?=$title_cat?></div><span></span></div>
<div class="wap_item">
<?php for($i=0,$count_product=count($product);$i<$count_product;$i++){	?>
    <div class="box_news">
        <a href="<?=$com?>/<?=$product[$i]['tenkhongdau']?>-<?=$product[$i]['id']?>.html" title="<?=$product[$i]['ten']?>"><img src="<?php if($product[$i]['thumb']!=NULL)echo _upload_sanpham_l.$product[$i]['thumb'];else echo 'images/noimage.png';?>" alt="<?=$product[$i]['ten']?>" /></a>      
        <h3><a href="<?=$com?>/<?=$product[$i]['tenkhongdau']?>-<?=$product[$i]['id']?>.html" title="<?=$product[$i]['ten']?>"><?=$product[$i]['ten']?></a></h3>
        <div class="mota"><?=$product[$i]['mota']?></div>  
        <div class="clear"></div>         
    </div><!---END .box_new--> 
<?php } ?>
<div class="clear"></div>
<div class="pagination"><?=pagesListLimitadmin($url_link , $totalRows , $pageSize, $offset)?></div>
</div><!---END .wap_item-->
<div class="clear"></div>

<?php if(!empty($arr_bannerqc)){ ?>
	<div id="owl_qc">
		<?php foreach($arr_bannerqc as $bannerqc){ ?>
		<div>
			<a href="<?=$bannerqc['link']?>" target="_blank" class="bannerqc_img">
				<img src="<?=_upload_hinhanh_l.$bannerqc['photo'.$lang]?>" alt="<?=$company['ten']?>">
			</a>
		</div>
		<?php } ?>
	</div>
<?php } ?>


