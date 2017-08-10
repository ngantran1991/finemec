<!-- slick -->
<script type="text/javascript">
    $(document).ready(function(){
		$('.slick2').slick({
			  slidesToShow: 1,
			  slidesToScroll: 1,
			  arrows: false,
			  fade: true,
			  autoplay:false,  //Tự động chạy
			  autoplaySpeed:5000,  //Tốc độ chạy
			  asNavFor: '.slick'			 
		});
		$('.slick').slick({
			  slidesToShow: 4,
			  slidesToScroll: 1,
			  asNavFor: '.slick2',
			  dots: false,
			  centerMode: false,
			  focusOnSelect: true
		});
		 return false;
    });
</script>
<!-- slick -->

<link href="magiczoomplus/magiczoomplus.css" rel="stylesheet" type="text/css" media="screen"/>
<script src="magiczoomplus/magiczoomplus.js" type="text/javascript"></script>
<script type="text/javascript">
	var mzOptions = {
		zoomMode:true,
		onExpandClose: function(){MagicZoom.refresh();}
	};
</script>



<!--Tags sản phẩm-->
<link href="css/tab.css" type="text/css" rel="stylesheet" />
<script language="javascript" type="text/javascript">
	$(document).ready(function(){
		$('#content_tabs .tab').hide();
		$('#content_tabs .tab:first').show();
		$('#ultabs li:first').addClass('active');
		
		$('#ultabs li').click(function(){
			var vitri = $(this).data('vitri');
			$('#ultabs li').removeClass('active');
			$(this).addClass('active');
			
			$('#content_tabs .tab').hide();
			$('#content_tabs .tab:eq('+vitri+')').show();
			return false;
		});	
	});
</script>
<!--Tags sản phẩm-->

<!--Mua hàng-->
<script type="text/javascript">
	$(document).ready(function(e) {
		$('.size').click(function(){
			$('.size').removeClass('active_size');
			$(this).addClass('active_size');
		});
		$('.mausac').click(function(){
			$('.mausac').removeClass('active_mausac');
			$(this).addClass('active_mausac');
		});
		$('a.dathang').click(function(){
				if($('.size').length && $('.active_size').length==false)
				{
					alert('<?=_chonsize?>');
					return false;
				}
				if($('.active_size').length)
				{
					var size = $('.active_size').html();
				}
				else
				{
					var size = '';
				}
				
				if($('.mausac').length && $('.active_mausac').length==false)
				{
					alert('<?=_chonmau?>');
					return false;
				}
				if($('.active_mausac').length)
				{
					var mausac = $('.active_mausac').html();
				}
				else
				{
					var mausac = '';
				}
					var act = "dathang";
					var id = "<?=$row_detail['id']?>";
					var soluong = $('.soluong').val();
					if(soluong>0)
					{
						$.ajax({
							type:'post',
							url:'ajax/cart.php',
							dataType:'json',
							data:{id:id,size:size,mausac:mausac,soluong:soluong,act:act},
							beforeSend: function() {
								$('.thongbao').html('<p><img src="images/loader_p.gif"></p>');  
							},
							error: function(){
								add_popup('<?=_hethongloi?>');
							},
							success:function(kq){
								add_popup(kq.thongbao);
								$('.menu2 li span').html(kq.sl);
								console.log(kq);
							}
						});
					}
					else
					{
						alert('<?=_nhapsoluong?>');
					}
			return false;
		});
	});
</script>
<!--Mua hàng-->

<!--Đánh giá sao-->
<script type="text/javascript">
	$(document).ready(function(e) {
		var giatri_default = "<?=$num_danhgiasao?>";
		$('.danhgiasao span:lt('+giatri_default+')').addClass('active');
		$('.danhgiasao span').hover(function(){
			var giatri = $(this).data('value');
			$('.danhgiasao span').removeClass('hover');
			$('.danhgiasao span:lt('+giatri+')').addClass('hover');
		},function(){
			$('.danhgiasao span').removeClass('hover');
		});
		
		$('.danhgiasao span').click(function(){
			var url = $('.danhgiasao').data('url');
			var giatri = $(this).data('value');
			
			$.ajax({
				type:'post',
				url:'ajax/danhgiasao.php',
				data:{giatri:giatri,url:url},
				success:function(kq){
					if(kq==1){
						$('.danhgiasao span:lt('+giatri+')').addClass('active');
						alert('<?=_bandanhgia?>: '+giatri+'/10');
						$('.num_danhgia').html(+giatri+'/10');
					}
					else if(kq==2){
						alert('<?=_danhgiaroi?>');
					}
					else{
						alert('<?=_hethongloi?>');
					}
				}
			});
		});
	});
 </script>
<!--Đánh giá sao-->


<div class="tieude_giua"><div><?=$title_cat?></div><span></span></div>
<div class="box_container">
	<div class="wap_pro">
        <div class="zoom_slick">    
         	<div class="slick2">                
                <a data-zoom-id="Zoom-detail" id="Zoom-detail" class="MagicZoom" href="<?php if($row_detail['photo'] != NULL)echo _upload_sanpham_l.$row_detail['photo'];else echo 'images/noimage.gif';?>" title="<?=$row_detail['ten']?>"><img class='cloudzoom' src="<?php if($row_detail['photo'] != NULL)echo _upload_sanpham_l.$row_detail['photo'];else echo 'images/noimage.gif';?>" /></a>
                
                <?php $count=count($hinhthem); if($count>0) {?>
                <?php for($j=0,$count_hinhthem=count($hinhthem);$j<$count_hinhthem;$j++){?>
                	<a data-zoom-id="Zoom-detail" id="Zoom-detail" class="MagicZoom" href="<?php if($hinhthem[$j]['photo']!=NULL) echo _upload_hinhthem_l.$hinhthem[$j]['photo']; else echo 'images/noimage.gif';?>" title="<?=$row_detail['ten']?>" ><img src="<?php if($hinhthem[$j]['photo']!=NULL) echo _upload_hinhthem_l.$hinhthem[$j]['photo']; else echo 'images/noimage.gif';?>" /></a>	
                <?php }} ?>
            </div><!--.slick-->
            
         
         	<?php $count=count($hinhthem); if($count>0) {?>
            <div class="slick">                
                <p><img src="thumb/100x80/1/<?php if($row_detail['photo'] != NULL)echo _upload_sanpham_l.$row_detail['photo'];else echo 'images/noimage.gif';?>" /></p>
                <?php for($j=0,$count_hinhthem=count($hinhthem);$j<$count_hinhthem;$j++){?>
                	<p><img src="<?php if($hinhthem[$j]['thumb']!=NULL) echo _upload_hinhthem_l.$hinhthem[$j]['thumb']; else echo 'images/noimage.gif';?>" /></p>
                <?php } ?>
            </div><!--.slick-->
            <?php } ?>
        </div><!--.zoom_slick--> 
        
        <ul class="product_info">
                <li class="ten"><?=$row_detail['ten']?></li>
                 <?php if($row_detail['masp'] != '') { ?><li><b><?=_masanpham?>:</b> <?=$row_detail['masp']?></span></li><?php } ?>
                 <?php if($row_detail['giacu'] > 0) { ?><li class="giacu"><?=_giacu?>: <?=number_format($row_detail['giacu'],0, ',', '.').' vnđ';?></li><?php } ?>
                 <li class="gia none"><?=_gia?>: <?php if($row_detail['gia'] > 0)echo number_format($row_detail['gia'],0, ',', '.').'  vnđ';else echo _lienhe; ?></li>
                   
                 <?php if($row_detail['size'] != '') { ?>
                 <li><b><?=_chonsize?>:</b> 
				  	<?php $arr_size = explode(',',$row_detail['size']);
						foreach($arr_size as $key=>$value)
						{
							echo '<span class="size">'.$value.'</span>';
						}
					?>
                 </li>
				 <?php } ?> 
                 
                 <?php if($row_detail['mausac'] != '') { ?>
                 <li><b style="float:left;"><?=_chonmau?>:</b> 
				  	<?php $arr_mausac = explode(',',$row_detail['mausac']);
						foreach($arr_mausac as $key=>$value)
						{
						  echo '<span class="mausac" style="background:'.$value.'">'.$value.'</span>';
						}
					?>
                 <div class="clear"></div>
                 </li>
				 <?php } ?>
                 <li class="none"><b><?=_soluong?>:</b> <input type="number" value="1" class="soluong" /> </li>  
                            
                 <li><b><?=_luotxem?>:</b> <span><?=$row_detail['luotxem']?></span></li>
                 <?php if($row_detail['mota'] != '') { ?><li><?=$row_detail['mota']?></li><?php } ?>
                 <li class="none"><a class="dathang"><i class="fa fa-shopping-cart" aria-hidden="true"></i><?=_datmuasanpham?></a></li>
                 <li class="none"><div class="danhgiasao" data-url="<?=getCurrentPageURL();?>"><?php for($i=1;$i<=10;$i++) { ?><span data-value="<?=$i?>"></span><?php } ?>&nbsp;&nbsp;<b class="num_danhgia"><?=$num_danhgiasao?>/10</b></div>
                 </li>
                 <li><div class="addthis_native_toolbox"><b><?=_chiase?>: </b></div></li>          
        </ul>
        <div class="clear"></div>  
  </div><!--.wap_pro-->
        
        <div id="tabs">   
            <ul id="ultabs">				 
                <li data-vitri="0"><?=_thongtinsanpham?></li>
                <li data-vitri="1"><?=_binhluan?></li>      
            </ul>
            <div style="clear:both"></div>
                            
            <div id="content_tabs">               
                <div class="tab">
                    <?=$row_detail['noidung']?>   
                    
                    <?php if(!empty($tags_sp)) { ?>
                        <div class="tukhoa">
                            <div id="tags">
                                    <span>Tags:</span>
									<?php foreach($tags_sp as $k=>$tags_sp_item) { ?>
                                       <a href="tags/<?=changeTitle($tags_sp_item['ten'])?>/<?=$tags_sp_item['id']?>" title="<?=$tags_sp_item['ten']?>"><?=$tags_sp_item['ten']?></a>
                                    <?php } ?>
                                <div class="clear"></div>
                            </div>					
                        </div>   
                	<?php } ?>      
                </div> 
                
                <div class="tab">
                	<?php //include _template."layout/comment.php";?>
                	<div id="fb-root"></div>
		            <script>(function(d, s, id) {
		              var js, fjs = d.getElementsByTagName(s)[0];
		              if (d.getElementById(id)) return;
		              js = d.createElement(s); js.id = id;
		              js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.9";
		              fjs.parentNode.insertBefore(js, fjs);
		            }(document, 'script', 'facebook-jssdk'));</script>
                    <div class="fb-comments" data-href="<?=getCurrentPageURL()?>" data-numposts="5" data-width="100%"></div>
                </div>  
            </div><!---END #content_tabs-->
        </div><!---END #tabs-->	
<div class="clear"></div>
</div><!--.box_containerlienhe-->

<?php if(count($product)>0) { ?>
<div class="tieude_giua"><div><?=$title_other?></div><span></span></div>
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
<?php } ?>
