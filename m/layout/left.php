<?php
	$d->reset();
	$sql_tinmoi = "select id,ten$lang as ten,tenkhongdau,thumb,mota$lang as mota from #_news where type='tintuc' and hienthi=1 and noibat=1 order by stt,id desc";
	$d->query($sql_tinmoi);
	$tinmoi = $d->result_array();

	$d->reset();
	$sql_hotro = "select ten$lang as ten,dienthoai,email,yahoo,skype from #_yahoo where hienthi=1 and type='yahoo' order by stt,id desc";
	$d->query($sql_hotro);
	$hotro = $d->result_array();
	
	$d->reset();
	$sql_quangcao = "select id,ten$lang as ten,link,photo from #_slider where hienthi=1 and type='quangcao' order by stt,id desc";
	$d->query($sql_quangcao);
	$quangcao = $d->result_array();
	
	$d->reset();
	$sql_lkweb="select id,ten$lang as ten,link from #_lkweb where hienthi=1 and type='lkweb' order by stt,id desc";
	$d->query($sql_lkweb);
	$lkweb=$d->result_array();

  $d->reset();
  $sql="select photo from #_background where hienthi=1 and type='bannerhotro' limit 1 ";
  $d->query($sql);
  $banner_hotro=$d->fetch_array();
?>

<script type="text/javascript">
    $(document).ready(function(){
      $('#tinmoi ul').slick({
		  	lazyLoad: 'ondemand',
        infinite: true,//Hiển thì 2 mũi tên
  			accessibility:true,
  			vertical:true,//Chay dọc
  		  slidesToShow: 3,    //Số item hiển thị
  		  slidesToScroll: 1, //Số item cuộn khi chạy
  		  autoplay:true,  //Tự động chạy
  			autoplaySpeed:3000,  //Tốc độ chạy
  			speed:1000,
  			arrows:false, //Hiển thị mũi tên
  			centerMode:false,  //item nằm giữa
  			dots:false,  //Hiển thị dấu chấm
  			draggable:true,  //Kích hoạt tính năng kéo chuột
  			mobileFirst:true
      });
	});
</script>
<div id="danhmuc" class="danhmuc">
<div class="tieude"><?=_duan?></div>
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
</div><!---END #danhmuc-->

<?php /*
<div id="video" class="danhmuc">
<div class="tieude">VIDEO CLIP</div>
	<div class="load_video">
	<script type="text/javascript">
		$(document).ready(function(e) {
			$(window).scroll(function(){
				if(!$('.load_video').hasClass('load_video2'))
				{
					$('.load_video').addClass('load_video2');
					$('.load_video').load( "ajax/video.php");
				}
			 });
        });
	</script>
    </div><!---END .load_video-->
</div><!---END #video-->*/ ?>

<!-- <?php if($banner_hotro['photo']!="") { ?>
<style>
  div#hotro
  {
    background: url(thumb/216x167/1/<?=_upload_hinhanh_l.$banner_hotro['photo']?>) center 5em no-repeat;
  }
</style>
<?php } ?> -->



<div id="tinmoi" class="danhmuc control_slick_doc">
<div class="tieude"><?=_tintucsukien?></div>
	<ul>
    	<?php for($i = 0, $count_tinmoi = count($tinmoi); $i < $count_tinmoi; $i++){ ?>
    		<li>
            	<a href="tin-tuc/<?=$tinmoi[$i]['tenkhongdau']?>-<?=$tinmoi[$i]['id']?>.html"><img src="<?=_upload_tintuc_l.$tinmoi[$i]['thumb']?>" alt="<?=$tinmoi[$i]['ten']?>" /></a>
                <h4><a href="tin-tuc/<?=$tinmoi[$i]['tenkhongdau']?>-<?=$tinmoi[$i]['id']?>.html"><?=$tinmoi[$i]['ten']?></a></h4>
                <div class="clear"></div>
            </li>
        <?php } ?>
    </ul>
</div>

<div id="hotro" class="danhmuc">
<div class="tieude"><?=_hotrotructuyen?></div>
  <div class="phone"><?=$company['dienthoai']?></div>
    <?php for($i = 0, $count_hotro = count($hotro); $i < $count_hotro; $i++){ ?>
        <ul>
            <li><a href="skype:<?=$hotro[$i]['skype']?>?chat"><img src="images/skype.png" alt="<?=$hotro[$i]['ten']?>" /></a><a href="tel:<?=$hotro[$i]['yahoo']?>"><img src="images/zalo.png" alt="<?=$hotro[$i]['ten']?>" width="25" /></a><span><?=$hotro[$i]['ten']?></span></li>
            <li><i class="fa fa-phone" aria-hidden="true"></i><?=$hotro[$i]['dienthoai']?></li>
            <li><i class="fa fa-envelope-o" aria-hidden="true"></i><?=$hotro[$i]['email']?></li>
        </ul>
    <?php } ?>
</div><!---END #danhmuc-->

<?php /*
<div id="quangcao" class="danhmuc">
<div class="tieude"><?=_quangcao?></div>
    <div id="ctsdiv" style="text-align:center; position:relative; height:350px; overflow:hidden">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" id="ctstbl" style="position:relative; margin:0px">  
         <?php for($i=0,$count_quangcao=count($quangcao);$i<$count_quangcao;$i++){	?>
             <tr>
                 <td valign="top">
                    <table width="100%" cellspacing="0" cellpadding="0" border="0">
                       <tr>
                           <td valign="top">     	  
                          		<a href="<?=$quangcao[$i]['link']?>"><img src="<?php if($quangcao[$i]['photo']!=NULL) echo _upload_hinhanh_l.$quangcao[$i]['photo']; else echo 'images/noimage.gif';?>" alt="<?php if($quangcao[$i]['ten']!='') echo $quangcao[$i]['ten'];else echo $company['ten']?>" /></a></td>
                      </tr>
                   </table>
                </td>      
            </tr>  
        <?php } ?>    
        </table>
     </div>
<script type="text/javascript">createScroller("myScroller", "ctsdiv", "ctstbl",0,70,2,0,1);</script> 
</div><!---END #danhmuc-->


<div id="lkweb" class="danhmuc">
<div class="tieude"><?=_lienketweb?></div>
	<select onchange="window.open(this.value,'_Blank');" style="width:90%; height:27px; line-height:27px; border:1px solid #BBB; border-radius:3px; margin:10px 5%;">
        <option value="">Liên kết Website</option>
        <?php for($i=0,$count_lkweb=count($lkweb);$i<$count_lkweb;$i++) { ?>
             <option value="<?=$lkweb[$i]['link'];?>"><?=$lkweb[$i]['ten'];?></option>
        <?php } ?>
    </select> 
</div><!---END #danhmuc--> */ ?>