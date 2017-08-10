<div class="tieude_giua"><div><?=$title_cat?></div><span></span></div>
<div class="box_container">
<div class="wap_box_new">

	<?php if($type=='duan') { ?>
			
			<?php for($i = 0, $count_tintuc = count($product); $i < $count_tintuc; $i++){ ?>
		        <div class="box_news">
		            <a href="<?=$com?>/<?=$product[$i]['tenkhongdau']?>-<?=$product[$i]['id']?>.html" title="<?=$product[$i]['ten']?>"><img src="<?php if($product[$i]['photo']!=NULL)echo _upload_sanpham_l.$product[$i]['photo'];else echo 'images/noimage.png';?>" alt="<?=$product[$i]['ten']?>" /></a>      
		            <h3><a href="<?=$com?>/<?=$product[$i]['tenkhongdau']?>-<?=$product[$i]['id']?>.html" title="<?=$product[$i]['ten']?>"><?=$product[$i]['ten']?></a></h3>
		            <div class="mota"><?=$product[$i]['mota']?></div>  
		            <div class="clear"></div>         
		        </div><!---END .box_new--> 
		    <?php } ?>


	<?php }else{ ?>
	


		 	<?php for($i = 0, $count_tintuc = count($tintuc); $i < $count_tintuc; $i++){ ?>

				<?php 
				$more_link = '-'.$tintuc[$i]['id'].'.html';
				switch ($type_link) {
					case 'dm1':
						$more_link = '-'.$tintuc[$i]['id'];
						break;
					case 'dm2':
						$more_link = '-'.$tintuc[$i]['id'].'/';
						break;
					case 'bv':
						$more_link = '-'.$tintuc[$i]['id'].'.html';
						break;
					default:
						$more_link = '-'.$tintuc[$i]['id'].'.html';
						break;
				}
				?>

		        <div class="box_news">
		            <a href="<?=$com?>/<?=$tintuc[$i]['tenkhongdau'].$more_link?>" title="<?=$tintuc[$i]['ten']?>"><img src="<?php if($tintuc[$i]['photo']!=NULL)echo _upload_tintuc_l.$tintuc[$i]['photo'];else echo 'images/noimage.png';?>" alt="<?=$tintuc[$i]['ten']?>" /></a>      
		            <h3><a href="<?=$com?>/<?=$tintuc[$i]['tenkhongdau'].$more_link?>" title="<?=$tintuc[$i]['ten']?>"><?=$tintuc[$i]['ten']?></a></h3>
		            <div class="mota"><?=$tintuc[$i]['mota']?></div>  
		            <div class="clear"></div>         
		        </div><!---END .box_new--> 
		    <?php } ?>



	<?php } ?>

</div><!---END .wap_box_new-->
<div class="clear"></div>
<div class="pagination"><?=pagesListLimitadmin($url_link , $totalRows , $pageSize, $offset)?></div>
</div><!---END .box_container-->