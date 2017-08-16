<div class="wrap" id="sub">
  <div class="container">
	<div id="snavi">    
        <p><script>
/*
	�⑥��紐�	: �대�몄�紐� 移���
	���깆��	: �ν�몄��
	���깆��	: 2011.10.13
	肄�硫���	- ��寃⑤��� �ㅻ����몄�� src瑜� 蹂�寃쏀����.
			- obj 	= ���� img
			- flag 	= on, off
*/
function snaviReplace(obj,flag){
	try {
		var snaviSrc = obj.attr("src");
		if(flag == "on"){
			snaviSrc = snaviSrc.replace(".gif","_on.gif");
		} else if(flag == "off"){
			snaviSrc = snaviSrc.replace("_on.gif",".gif");
		}
		obj.attr("src",snaviSrc);
	} catch(e) {}
}

$(function(){
	var snbArea = $(".snb_area");
 	var snb = $("#snb");
	var snb1Deps = $("#snb > li");
	var snb2Deps = $("#snb > li > ul > li");
	var snbTotal = $(".allmenu > h2 ");
	var snb1Reset = snb1Deps.eq(snb1Idx-1);
	var snb2Reset = snb1Reset.find(">ul >li").eq(snb2Idx-1);;
	var has2depth = $(".snb_2depth");
	var snbH2 = $(".t_h2");
	var $allMenu 		= $(".allmenu");								//��泥대���
	var $allMenuArea	= $("#allmenu_area");							//��泥� 硫��� 由ъ�ㅽ�� ����
	var all2depth = $(".all2depth");

	hideGnb();
	resetGnb();

	function hideGnb(){
		$("#allmenu_area").hide();
		$(".all2depth").hide();
		$(".all2depth").remove();
	};

	function showGnb(){
		$(".header_wrap").after("<div class='all2depth'></div>");	
		$(".all2depth").css("height",all2depth.height()).show();
	};
	
	//1���� ����
	snb1Deps.mouseenter(function(){
		snb1Deps.each(function(){
			snaviReplace($(this).find(">h2 >a >img"), "off");
			$(this).find(">ul").hide();
		});
		snaviReplace($(this).find(">h2 >a >img"), "on");
		//$(this).find(">ul").show();
		//snb2Deps.removeClass("on");
	}).focusin(function(){
		$(this).mouseenter();
	});

	snbArea.mouseleave(function(){
		//hideGnb();
		resetGnb();
		return false;
	});
/*
	//snb 2depth �쇱�湲�
	snbH2.mouseenter(function(){
		//showGnb();
	}).focusin(function(){
		//$(this).mouseenter();
	});

	$(".inner, .leftSection, #content").mouseenter(function(){
		hideGnb();
		resetGnb();
	}).focusin(function(){
		$(this).mouseenter();
	});

	

/*
	//留��곗�� 踰��� �ъ�� �� 珥�湲고��
	snb.mouseleave(function(){
		if(! $allMenu.hasClass("active") ){ //��泥대��닿� 鍮����깊������留� �ㅽ��
			resetGnb();
		};
	});
	$(".inner, .allmenu, #container ").focusin(function(){
		if(! $allMenu.hasClass("active") ){ //��泥대��닿� 鍮����깊������留� �ㅽ��
			resetGnb();
		};
	});
*/
	
	//由ъ���⑥��
	function resetGnb(){
		snb1Deps.each(function(){
			snaviReplace($(this).find(">h2 >a >img"), "off");
			//$(this).find(">ul").hide();
		});
		if(snb1Idx != 0){
			snaviReplace(snb1Reset.find(">h2 >a >img"), "on");
			//snb1Reset.find(">ul").show();
		};
		if(snb2Idx != 0){
			snb2Deps.removeClass("on");
			snb2Reset.addClass("on");
		};
	};
	
	//  珥�湲고��
	resetGnb();	
	
	//��泥대���
	$allMenu.find("> h2 > a").click(function(){
		//snaviReplace ( snb1Reset.find("> h2 > a > img"),  "off" );
		//snb.find(" > li.on").removeClass("on").find("ul").hide(); 
		$allMenuArea.show();
		//snaviReplace($(this).find("img") ,  "on");
		//$allMenu.addClass("active");
		showGnb();
		//return false;
	});
	
	$allMenu.find(".close").click(function(){
		//snb1Reset.addClass("on").find("ul").show(); 
		$allMenuArea.hide();
		//$allMenu.removeClass("active");
		//snb.find(" > li.on").removeClass("on").find("ul").hide();
		hideGnb();
	});	

});

</script>



<!-- snb -->
<div class="snb_area">
    <?php 
      if (is_array($listLoaiTinTuc) && count($listLoaiTinTuc)){
          ?>
  <ul id="snb">
      <?php
      foreach ($listLoaiTinTuc as $loaitt){
          ?>
      <li class="<?=$loaitt['id'] == $loaiTinTuc['id'] ? "active": ""?>">
        <h2 class="t_h2"><a href="<?="media/".$loaitt['tenkhongdau']."-".$loaitt['id'].".html"?>">
                <?=$loaitt['ten']?>
            </a>
        </h2>
      </li>
      <?php
      }
      ?>
    
  </ul>
    <?php
      }
      ?>
</div>
<!-- // snb -->
<script>
    var snb1Idx = 1;
    var snb2Idx = 1;
</script>









<p>		
	</div>
	<div id="contents">
 	<h1>
           <?=$loaiTinTuc['ten']?> 
</h1>
	    <div class="location">
        	<ul><li class="home"><a href="<?=$config_url ?>">HOME</a></li><li>Media</li><li>

<?=$loaiTinTuc['ten']?>


</li></ul>
      	</div>
            
<div id="page" class="page-media-detail">
    <?php
    if (is_array($listTinTuc)){
        ?>
    <div style="float: right;">Total: <?=count($listTinTuc)?></div>
    <?php
    if (count($listTinTuc)){
        ?>
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
      <th>
          No
      </th>
      <th>
          Subject
      </th>
      <th>
          Name
      </th>
      <th>
          Date
      </th>
      <th>
          Hits
      </th>
  </tr>
  <?php
        foreach ($listTinTuc as $itemTinTuc){
            ?>
  <tr>
      <td><?=$itemTinTuc['stt']?></td>
      <td>
          <a href="media-detail/<?=$itemTinTuc['tenkhongdau']."-".$itemTinTuc['id']?>.html">
                    <?=$itemTinTuc['title']?>
          </a>
          <?php
          if ($itemTinTuc['noibat'] == 1){
              ?>
          <img src="images/main/icon_hot.gif" align="absmiddle">
          <?php
          }
          ?>
          
      </td>
      <td><?=$itemTinTuc['ten']?></td>
      <td><?=date('d-m',$itemTinTuc['ngaytao'])?></td>
      <td><?=$itemTinTuc['luotxem']?></td>
  </tr>
    <?php
        }
        ?>
  </table>
    
        <?php
    }
 }
    ?>
    <p>
    <form action="" method="post">
        <select class="inline type-select" name="type" style="margin-left: 30%;">
            <option value="title" <?=$type=="title" ? "selected" : ""?>>Subject</option>
            <option value="noidung" <?=$type=="noidung" ? "selected" : ""?>>Contents</option>
            <option value="title+noidung" <?=$type=="title+noidung" ? "selected" : ""?>>Subject + Contents</option>
            <option value="ten" <?=$type=="title" ? "selected" : ""?>>Name</option>
        </select>
        <input type="text" name="keyword" value="<?=$keyword?>" class="inline search-textbox"/>
        <input type="submit" value="" class="inline search-botton"/>
    </form>
    </p>
</div>

</div>
</div>
</div>