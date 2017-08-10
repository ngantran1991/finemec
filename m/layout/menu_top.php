<?php
	
	$d->reset();
	$sql="select ten$lang as ten,tenkhongdau,id from #_product_danhmuc where hienthi=1 and type='sanpham' order by stt,id desc";
	$d->query($sql);
	$product_danhmuc=$d->result_array();

	$d->reset();
	$sql="select ten$lang as ten,tenkhongdau,id from #_product_danhmuc where hienthi=1 and type='duan' order by stt,id desc";
	$d->query($sql);
	$duan_danhmuc=$d->result_array();

	$d->reset();
	$sql="select ten$lang as ten,tenkhongdau,id from #_news where hienthi=1 and type='gioithieu' order by stt,id desc";
	$d->query($sql);
	$bv_gioithieu=$d->result_array();

	$d->reset();
	$sql="select ten$lang as ten,tenkhongdau,id from #_news where hienthi=1 and type='dichvu' order by stt,id desc";
	$d->query($sql);
	$bv_dichvu=$d->result_array();

	$d->reset();
	$sql="select ten$lang as ten,tenkhongdau,id from #_news_danhmuc where hienthi=1 and type='dichvu' order by stt,id desc";
	$d->query($sql);
	$dm_dichvu=$d->result_array();

	$d->reset();
	$sql="select ten$lang as ten,tenkhongdau,id from #_news where hienthi=1 and type='hotro' order by stt,id desc";
	$d->query($sql);
	$bv_hotro=$d->result_array();

	$d->reset();
	$sql="select ten$lang as ten,tenkhongdau,id from #_news_danhmuc where hienthi=1 and type='hotro' order by stt,id desc";
	$d->query($sql);
	$dm_hotro=$d->result_array();

	$d->reset();
	$sql="select ten$lang as ten,tenkhongdau,id from #_news where hienthi=1 and type='tintuc' order by stt,id desc";
	$d->query($sql);
	$bv_tintuc=$d->result_array();

	$d->reset();
	$sql="select ten$lang as ten,tenkhongdau,id from #_news_danhmuc where hienthi=1 and type='tintuc' order by stt,id desc";
	$d->query($sql);
	$dm_tintuc=$d->result_array();

	$d->reset();
	$sql="select ten$lang as ten,tenkhongdau,id from #_news where hienthi=1 and type='tuyendung' order by stt,id desc";
	$d->query($sql);
	$bv_tuyendung=$d->result_array();

	$d->reset();
	$sql="select ten$lang as ten,tenkhongdau,id from #_news_danhmuc where hienthi=1 and type='tuyendung' order by stt,id desc";
	$d->query($sql);
	$dm_tuyendung=$d->result_array();
	
?>

<!--Hover menu-->
<script language="javascript" type="text/javascript">
	$(document).ready(function() { 
		//Hover vào menu xổ xuống
		$(".menu ul li").hover(function(){
			$(this).find('ul:first').css({visibility: "visible",display: "none"}).show(300); 
			},function(){ 
			$(this).find('ul:first').css({visibility: "hidden"});
			}); 
		$(".menu ul li").hover(function(){
				$(this).find('>a').addClass('active2'); 
			},function(){ 
				$(this).find('>a').removeClass('active2'); 
		}); 
		//Hover vào danh mục xổ xuống
		/*$("#danhmuc ul li").hover(function(){
			$(this).find('ul:first').show(300); 
		},function(){ 
			$(this).find('ul:first').hide(300);
		}); */
		//Click vào danh mục xổ xuống
		$("#danhmuc > ul > li > a").click(function(){
			if($(this).parents('li').children('ul').find('li').length>0)
			{
				$("#danhmuc ul li ul").hide(300);
				
				if($(this).hasClass('active'))
				{
					$("#danhmuc ul li a").removeClass('active');
					$(this).parents('li').find('ul:first').hide(300); 
					$(this).removeClass('active');
				}
				else
				{
					$("#danhmuc ul li a").removeClass('active');
					$(this).parents('li').find('ul:first').show(300); 
					$(this).addClass('active');
				}
				return false;
			}
		});
	});  
</script>
<!--Hover menu-->

<nav id="menu_mobi" style="height:0; overflow:hidden;"></nav>
<div class="header"><a href="#menu_mobi" class="hien_menu"><i class="fa fa-bars" aria-hidden="true"></i> <i class="fa fa-caret-right" aria-hidden="true"></i></a>
</div>

<nav id="menu">
	<ul>
	    <li><a class="<?php if((!isset($_REQUEST['com'])) or ($_REQUEST['com']==NULL) or $_REQUEST['com']=='index') echo 'active'; ?>" href=""><?=_trangchu?></a></li>
	    <li class="line"></li>
	    <li><a class="<?php if($_REQUEST['com'] == 'gioi-thieu') echo 'active'; ?>" href="gioi-thieu.html"><?=_gioithieu?></a>
			<ul>
				<?php foreach ($bv_gioithieu as $key => $value) { ?>
					<li><a href="gioi-thieu/<?=$value['tenkhongdau']?>-<?=$value['id']?>.html"><?=$value['ten']?></a></li>
				<?php } ?>
			</ul>
	    </li>
	    <li class="line"></li>
		<li><a class="<?php if($_REQUEST['com'] == 'dich-vu') echo 'active'; ?>" href="dich-vu.html"><?=_dichvu?></a>
			<ul>

				<?php if(count($dm_dichvu)>0) { ?>
				
				<?php foreach ($dm_dichvu as $key => $value) { ?>
					<li><a href="dich-vu/<?=$value['tenkhongdau']?>-<?=$value['id']?>"><?=$value['ten']?></a></li>
				<?php } } else { ?>

				<?php foreach ($bv_dichvu as $key => $value) { ?>
					<li><a href="dich-vu/<?=$value['tenkhongdau']?>-<?=$value['id']?>.html"><?=$value['ten']?></a></li>
				<?php } ?>

				<?php } ?>
				
			</ul>
		</li>
	    <li class="line"></li>
	    <li><a class="<?php if($_REQUEST['com'] == 'du-an') echo 'active'; ?>" href="du-an.html"><?=_duan?></a>
			<?php if(count($duan_danhmuc)>0) { ?>
	    		<ul>
				<?php for($i = 0, $count_product_danhmuc = count($duan_danhmuc); $i < $count_product_danhmuc; $i++){ ?>
	            <li><a href="du-an/<?=$duan_danhmuc[$i]['tenkhongdau']?>-<?=$duan_danhmuc[$i]['id']?>"><?=$duan_danhmuc[$i]['ten']?></a>
	            	<?php	
						$d->reset();
						$sql_product_list="select ten$lang as ten,tenkhongdau,id from #_product_list where hienthi=1 and id_danhmuc='".$duan_danhmuc[$i]['id']."' order by stt,id desc";
						$d->query($sql_product_list);
						$product_list=$d->result_array();	
						if(count($product_list)>0) {														
					?>
	                    <ul>    
							 <?php for($j = 0, $count_product_list = count($product_list); $j < $count_product_list; $j++){ ?>
	                                <li><a href="du-an/<?=$product_list[$j]['tenkhongdau']?>-<?=$product_list[$j]['id']?>/"><?=$product_list[$j]['ten']?></a></li>
	                         <?php } ?>
	                     </ul>
	                 <?php } ?>
	                </li>
	                <?php } ?>
	            </ul>	
	        <?php } ?>
	    </li>
	    <li class="line"></li>
	    <li><a class="<?php if($_REQUEST['com'] == 'san-pham') echo 'active'; ?>" href="san-pham.html"><?=_sanpham?></a>
	    	<?php if(count($product_danhmuc)>0) { ?>
	    		<ul>
				<?php for($i = 0, $count_product_danhmuc = count($product_danhmuc); $i < $count_product_danhmuc; $i++){ ?>
	            <li><a href="san-pham/<?=$product_danhmuc[$i]['tenkhongdau']?>-<?=$product_danhmuc[$i]['id']?>"><?=$product_danhmuc[$i]['ten']?></a>
	            	<?php	
						$d->reset();
						$sql_product_list="select ten$lang as ten,tenkhongdau,id from #_product_list where hienthi=1 and id_danhmuc='".$product_danhmuc[$i]['id']."' order by stt,id desc";
						$d->query($sql_product_list);
						$product_list=$d->result_array();	
						if(count($product_list)>0) {														
					?>
	                    <ul>    
							 <?php for($j = 0, $count_product_list = count($product_list); $j < $count_product_list; $j++){ ?>
	                                <li><a href="san-pham/<?=$product_list[$j]['tenkhongdau']?>-<?=$product_list[$j]['id']?>/"><?=$product_list[$j]['ten']?></a></li>
	                         <?php } ?>
	                     </ul>
	                 <?php } ?>
	                </li>
	                <?php } ?>
	            </ul>	
	        <?php } ?>
    	</li>
    	<li class="line"></li>
    	<li><a class="<?php if($_REQUEST['com'] == 'ho-tro') echo 'active'; ?>" href="ho-tro.html"><?=_hotro?></a>

			<ul>
				
				<?php if(count($dm_hotro)>0) { ?>
				
				<?php foreach ($dm_hotro as $key => $value) { ?>
					<li><a href="ho-tro/<?=$value['tenkhongdau']?>-<?=$value['id']?>"><?=$value['ten']?></a></li>
				<?php } } else { ?>

				<?php foreach ($bv_hotro as $key => $value) { ?>
					<li><a href="ho-tro/<?=$value['tenkhongdau']?>-<?=$value['id']?>.html"><?=$value['ten']?></a></li>
				<?php } ?>

				<?php } ?>
				
			</ul>
			
    	</li>
	    <li class="line"></li>
	    <li><a class="<?php if($_REQUEST['com'] == 'tin-tuc') echo 'active'; ?>" href="tin-tuc.html"><?=_tintuc?></a>
			
			<ul>
				
				<?php if(count($dm_tintuc)>0) { ?>
				
				<?php foreach ($dm_tintuc as $key => $value) { ?>
					<li><a href="tin-tuc/<?=$value['tenkhongdau']?>-<?=$value['id']?>"><?=$value['ten']?></a></li>
				<?php } } else { ?>

				<?php foreach ($bv_tintuc as $key => $value) { ?>
					<li><a href="tin-tuc/<?=$value['tenkhongdau']?>-<?=$value['id']?>.html"><?=$value['ten']?></a></li>
				<?php } ?>

				<?php } ?>
				
			</ul>

	    </li>
	    <li class="line"></li>
	    <li><a class="<?php if($_REQUEST['com'] == 'tuyen-dung') echo 'active'; ?>" href="tuyen-dung.html"><?=_tuyendung?></a>

			<ul>
				
				<?php if(count($dm_tuyendung)>0) { ?>
				
				<?php foreach ($dm_tuyendung as $key => $value) { ?>
					<li><a href="tuyen-dung/<?=$value['tenkhongdau']?>-<?=$value['id']?>"><?=$value['ten']?></a></li>
				<?php } } else { ?>

				<?php foreach ($bv_tuyendung as $key => $value) { ?>
					<li><a href="tuyen-dung/<?=$value['tenkhongdau']?>-<?=$value['id']?>.html"><?=$value['ten']?></a></li>
				<?php } ?>

				<?php } ?>
				
			</ul>

	    </li>
	    <li class="line"></li>
	    <li><a class="<?php if($_REQUEST['com'] == 'lien-he') echo 'active'; ?>" href="lien-he.html"><?=_lienhe?></a></li>
	</ul>
</nav>
