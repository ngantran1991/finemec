<div class="tieude_giua"><div><?=$title_cat?></div><span></span></div>
<div class="wap_item">
	<?php if(count($arr_item)!=0){?>
	    <ul id="itemContainer_item">
	      <?php for($j=0,$count_item=count($arr_item);$j<$count_item;$j++){?>
	      	<?php
	      	$com = get_com_from_type($arr_item[$j]['type']);
	      	if($com=='san-pham' || $com=='du-an'){
	      		$link_image = _upload_sanpham_l;
	      	}else{
	      		$link_image = _upload_tintuc_l;
	      	}
	      	?>
	        <li>
	          <?php if($arr_item[$j]['type']=='sanpham') { ?>
					<div class="item_product2">
				            <div class="sp_img hover_sang1">
				            	<a href="<?=$com?>/<?=$arr_item[$j]['tenkhongdau']?>-<?=$arr_item[$j]['id']?>.html" title="<?=$arr_item[$j]['ten']?>">
				            		<img src="<?php if($arr_item[$j]['photo']!=NULL) echo 'thumb/205x140/1/'._upload_sanpham_l.$arr_item[$j]['photo']; else echo 'images/noimage.png';?>" alt="<?=$arr_item[$j]['ten']?>" />
				            	</a>
				            </div>
				            <div class="info">
				            	<div class="sp_name"><h3><a href="san-pham/<?=$arr_item[$j]['tenkhongdau']?>-<?=$arr_item[$j]['id']?>.html" title="<?=$arr_item[$j]['ten']?>" ><?=$arr_item[$j]['ten']?></a></h3></div>
				            	<div><?=_masanpham?>: <?=$arr_item[$j]['masp']?></div>
				            	<div><?=_hangsanxuat?>: <?=$arr_item[$j]['hsx']?></div>
				            	<div class="des"><?=$arr_item[$j]['mota']?></div>
				            </div>
				        <div class="clear"></div>
				    </div>
	          <?php }else{ ?>
					<div class="box_news">
	                    <a href="<?=$com?>/<?=$arr_item[$j]['tenkhongdau']?>-<?=$arr_item[$j]['id']?>.html" title="<?=$arr_item[$j]['ten']?>"><img src="<?php if($arr_item[$j]['photo']!=NULL)echo $link_image.$arr_item[$j]['photo'];else echo 'images/noimage.png';?>" alt="<?=$arr_item[$j]['ten']?>" /></a>      
	                    <h3><a href="<?=$com?>/<?=$arr_item[$j]['tenkhongdau']?>-<?=$arr_item[$j]['id']?>.html" title="<?=$arr_item[$j]['ten']?>"><?=$arr_item[$j]['ten']?></a></h3>
	                    <div class="mota"><?=$arr_item[$j]['mota']?></div>  
	                    <div class="clear"></div>         
	                </div>
	          <?php } ?>
	        </li>
	      <?php } ?>
	    </ul>
	    <div class="clear"></div>
	    <div class="wrap_paging">
	        <div class="holder_item holder"></div>
	    </div>
	  <?php } ?>
</div><!---END .wap_item-->