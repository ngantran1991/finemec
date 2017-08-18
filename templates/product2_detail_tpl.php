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
  <ul id="snb">
      <?php
      if (is_array($listProduct) && count($listProduct)){
          foreach ($listProduct as $itemProduct){
              ?>
            <li class="<?=$itemProduct['id'] == $sanphamDetail['id'] ? "active": ""?>">
                <h2 class="t_h2"><a href="<?="san-pham/".$itemProduct['tenkhongdau']."-".$itemProduct['id'].".html"?>">
                        <?=$itemProduct['ten']?>
                    </a></h2>
              </li>
      <?php
          }
      }
      ?>
      

  </ul>
</div>
<!-- // snb -->
<script>
    var snb1Idx = 0;
    var snb2Idx = 0;
</script>


<script>
    var snb1Idx = 1;
    var snb2Idx = 1;
</script>









<p>		
	</div>
	<div id="contents">
 	<h1>
            <?=$title_cat ?>
</h1>
	    <div class="location">
        	<ul><li class="home"><a href="<?=$config_url ?>">HOME</a></li><li>Products</li><li>
<?=$title_cat ?>



</li></ul>
      	</div><script>
$(function(){	
	$('.Limg a').click(function(){				
		// 1.�닿� �대┃�� a��洹몄�� 寃쎈��� �닿꺼吏� �대�몄�瑜� .main img��洹몄���� ��濡� �ｌ�댁�. $('������A').before('異�媛����� ����')		
		// .before 紐��뱀�� �듯�� ��濡�寃� 異�媛����� img��洹몄�� src 媛� = �닿� �대┃�� a��洹몄�� href 媛� $(this).attr('href')
		$('.main img').before('<img src="' +  $(this).attr('href') + '" />');
		// 2.�대�몄� fadeOut -> �������� �대�몄���洹� ����.
		$('.main img:last').fadeOut(500, function(){
		   $(this).remove();	
		})		
		return false;
	})	
	
	// next踰��� �대┃������
	$('.next').click(function(){
		
		//.inner��寃� animater紐��뱀�� �ъ�⑺�� ��吏����� ����
		$('.inner').animate({
			
			marginLeft : parseInt($('.inner').css('margin-left')) - 220 + 'px'
			
			/* ���� .inner媛� 媛�吏�怨� ���� marginLeft媛�
			=> $('.inner').css('magin-left')
			=> ���� �듯�� 留��ㅼ�댁� 媛��� 臾몄��濡� �몄�� 臾몄��濡� �몄���� 媛��� �レ��濡� �몄������ ���� �⑥��瑜� �ъ��.
			=> .parselnt()
			=> .parselnt($('.inner').css('magin-left'))
			
			*/
		},500,'swing')	
	})
	
	$('.prev').click(function(){
		
		//.inner��寃� animater紐��뱀�� �ъ�⑺�� ��吏����� ����
		$('.inner').animate({
			
			marginLeft : parseInt($('.inner').css('margin-left')) + 220 + 'px'
			
			/* ���� .inner媛� 媛�吏�怨� ���� marginLeft媛�
			=> $('.inner').css('magin-left')
			=> ���� �듯�� 留��ㅼ�댁� 媛��� 臾몄��濡� �몄�� 臾몄��濡� �몄���� 媛��� �レ��濡� �몄������ ���� �⑥��瑜� �ъ��.
			=> .parselnt()
			=> .parselnt($('.inner').css('magin-left'))
			
			*/
		},500,'swing')	
	})	
})
</script>

<div id="page">
    <?php
    if (is_array($hinhthem) && count($hinhthem)){
    ?>
  <div id="produsts">
    <div class="Limg">
      <div class="inner">
        <div>
          <p><?=$title_cat ?></p>
          <p><a href="/static/images/sub/noblex_b01.jpg" onClick="window.open('pop04.php', 'sms', 'toolbar=no, location=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=565, height=567')" onfocus='blur()' style="cursor:hand;"><img src="static/images/sub/pro_bt.png" /></p>
        </div>
        <div class="page2">
            
          <ul>
              <?php
              foreach ($hinhthem as $hinh){
                  ?>
              <li><!-- a��洹몄�� �대�몄��� �곗�대�몄�瑜�, img�� �몃�ㅼ�쇱�� �대�몄�瑜� �ｌ�듬����. -->
              <a href="<?=_upload_hinhthem_l.$hinh['photo']?>">
              <div class="img_bg" style="background-image: url(<?=_upload_hinhthem_l.$hinh['photo']?>);"></div>
              </a>
            </li>
              <?php
              }
              ?>
            
          </ul>
        </div>
      </div>
    </div>
    <div class="main"><img src="<?=_upload_hinhthem_l.$hinhthem[0]['photo']?>" /></div>
  </div>
    <?php
    }
    ?>
   <?=$sanphamDetail['noidung']?>
</div>
</div>
</div>
</div>
