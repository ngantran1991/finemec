<div class="tieude_giua"><div><?=$title_cat?></div><span></span></div>
<div class="wap_item">
<?php for($i=0,$count_product=count($product);$i<$count_product;$i++){	?>

	<div class="item_product2">
            <div class="sp_img hover_sang1">
            	<a href="<?=$com?>/<?=$product[$i]['tenkhongdau']?>-<?=$product[$i]['id']?>.html" title="<?=$product[$i]['ten']?>">
            		<img src="<?php if($product[$i]['photo']!=NULL) echo 'thumb/205x140/1/'._upload_sanpham_l.$product[$i]['photo']; else echo 'images/noimage.png';?>" alt="<?=$product[$i]['ten']?>" />
            	</a>
            </div>
            <div class="info">
            	<div class="sp_name"><h3><a href="san-pham/<?=$product[$i]['tenkhongdau']?>-<?=$product[$i]['id']?>.html" title="<?=$product[$i]['ten']?>" ><?=$product[$i]['ten']?></a></h3></div>
            	<div><?=_masanpham?>: <?=$product[$i]['masp']?></div>
            	<div><?=_hangsanxuat?>: <?=$product[$i]['hsx']?></div>
            	<div class="des"><?=$product[$i]['mota']?></div>
            </div>
        <div class="clear"></div>
    </div><!---END .item-->
<?php } ?>
<div class="clear"></div>
<div class="pagination"><?=pagesListLimitadmin($url_link , $totalRows , $pageSize, $offset)?></div>
</div><!---END .wap_item-->