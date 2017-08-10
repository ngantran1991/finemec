<?php

	$d->reset();
	$sql_banner = "select photo$lang as photo from #_background where type='banner' limit 0,1";
	$d->query($sql_banner);
	$row_banner = $d->fetch_array();

	$d->reset();
	$sql = "select photo from #_background where type='logo' limit 0,1";
	$d->query($sql);
	$row_logo = $d->fetch_array();

	$d->reset();
	$sql = "select photo$lang as photo from #_background where type='banner2' limit 0,1";
	$d->query($sql);
	$banner2 = $d->fetch_array();
	
	//$d->reset();
	//$sql_banner_mobi = "select photo$lang as photo from #_background where type='banner_mobi' limit 0,1";
	//$d->query($sql_banner_mobi);
	//$banner_mobi = $d->fetch_array();
	
	//$duoi_banner = end(explode('.',$row_banner['photo']));
			
?>

<!-- <a href="" class="logo"><img src="<?=_upload_hinhanh_l.$row_banner['photo']?>" /></a> -->
<?php /*<a href=""><img src="<?=_upload_hinhanh_l.$banner_mobi['photo']?>" class="logo_mobi wow <?=$arr_animate['0']?>" /></a>*/ ?>

<?php /*
<a class="logo_top" href="">
	<img src="<?=_upload_hinhanh_l.$row_logo['photo']?>" alt="">
</a> */ ?>

<a href="" class="diachi_top">
	<img src="<?=_upload_hinhanh_l.$banner2['photo']?>" alt="">
</a>

<div id="lang">	
	<?php if($lang=='en') { ?>
		<a href="index.php?com=ngonngu&lang=" title="Việt Nam"><img src="img/vi.png" alt="Việt Nam" /> VIE</a>
	<?php }else{ ?>
		<a href="index.php?com=ngonngu&lang=en" title="English"><img src="img/en.png" alt="English" /> ENG</a>
	<?php } ?>
</div><!--END #lang-->
