<?php
    error_reporting(0);
	session_start();
	$session=session_id();

	//@define ( '_template' , './templates/');
	@define ( '_source' , './sources/');
	@define ( '_lib' , './admin/lib/');
	
	include_once _lib."Mobile_Detect.php";
	$detect = new Mobile_Detect;
	$deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');

	if($deviceType == 'phone'){
		@define ( '_template' , './m/');		
	}else{
		@define ( '_template' , './templates/');
	}
	
	$lang_default = array("","en");
	if(!isset($_SESSION['lang']) or !in_array($_SESSION['lang'], $lang_default))
	{
		$_SESSION['lang'] = $company['lang_default'];
	}
	$lang=$_SESSION['lang'];

	require_once _source."lang$lang.php";	
	include_once _lib."config.php";
	include_once _lib."constant.php";
	include_once _lib."functions.php";	
	include_once _lib."class.database.php";
	include_once _lib."functions_user.php";
	include_once _lib."functions_giohang.php";
	include_once _lib."file_requick.php";
	include_once _source."counter.php"; 
   // echo $type;
?>
<!doctype html PUBLIC>
<html lang="vi">

<head itemscope itemtype="http://schema.org/WebSite">
	<base href="http://<?=$config_url?>/" />

	<?php if($deviceType == 'phone'){?>
    	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=1" />
        <link href="css/default_m.css" type="text/css" rel="stylesheet" />
        <link href="style_m.css" type="text/css" rel="stylesheet" />
    <?php }else{ ?>    
        <link rel="stylesheet" type="text/css" href="css/common.css"  />
        <link href="css/default.css" type="text/css" rel="stylesheet" />
        <link href="style.css" type="text/css" rel="stylesheet" />
    <?php } ?>

	<?php include _template."layout/seoweb.php";?>
	<?php include _template."layout/js_css.php";?> 
    
    <?=$company['codethem']?>       
</head>

<?php //include _template."layout/background.php";?>
<?php
        $d->reset();
	$sql = "select photo from #_background where type='bannerqc' limit 0,1";
	$d->query($sql);
	$row_bannerqc = $d->fetch_array();
?>
<style rel="stylesheet">
    #visual_main {background:url(<?=_upload_hinhanh_l.$row_bannerqc['photo']?>) no-repeat center top #dddddd;}
</style>
<body>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<script language="JavaScript" type="text/javascript" src="js/jqbanner.js"></script>
<script language="JavaScript" type="text/javascript" src="js/main4.js"></script>

<script type='text/javascript'> 
    function tabs(idx){ for(i = 1; i <= 2 ; i++ ){ document.getElementById('tab'+i).className = ""; document.getElementById('content'+i).className = "content hide"; } document.getElementById('tab'+idx).className = "active"; document.getElementById('content'+idx).className = "content show"; } 
</script>
<style type='text/css'>
div.tabs-area {position:relative; z-index:2; overflow:hidden; margin-top:-15px;}
div.tabs-line {position:relative; z-index:1;}
</style>
<!--<![endif]-->
<style type='text/css'>
ul.tabs li {list-style:none; display:inline; height:18px;}
ul.tabs li a {text-decoration:none;}
div.show {display:block;} div.hide { display:none; }
</style>
<script type="text/javascript" src="js/jquery-latest.js"></script>
<script type="text/javascript">
$(function(){
	/*  湲곕낯�명��  */
	var $list = $(".slider_list");
	var $box = $(".slider_box");
	var wd = $list.width();
	var num = $list.size();
	var margin,current,play;
	$box.width(wd*num);

	for(i=0; i<num; i++){
		var nav = '<a href="#" title="'+(i+1)+'踰�吏몃� �대��"></a>'
		$(".slider_nav").append(nav);
	};
	var $nav = $(".slider_nav a");

	$(".slider_nav a:first").addClass("on");

	setTimeout(function(){
		play = setInterval(play_next,9000);	},10000)

	$(".slider_wrap").hover(function(){
		$(".prev,.next").show();
	},function(){
		$(".prev,.next").hide();
	});

	/*  諛�蹂듯�� �대깽��  */
	function play_next(){
		margin = parseInt($box.css("margin-left"));
		if(margin < -(wd*(num-2))){
			$box.not(":animated").animate({"marginLeft":"0px"},"fast");
		}else{
			$box.not(":animated").animate({"marginLeft":"-="+wd+"px"},"fast");
		};
		//var current = Math.abs(margin/wd);
		var current = Math.abs(Math.floor(margin/wd));
		$nav.removeClass("on");
		$nav.eq((current-num)+1).addClass("on");
	}

	function play_prev(){
		clearInterval(play);
		margin = parseInt($box.css("margin-left"));
		if(margin == 0){
			$box.not(":animated").animate({"marginLeft":"-"+wd*(num-1)+"px"},"fast");
		}else{
			$box.not(":animated").animate({"marginLeft":"+="+wd+"px"},"fast");
		};
		var current = Math.abs(Math.floor(margin/wd));
		$nav.removeClass("on");
		$nav.eq(current-1).addClass("on");
	}

	/*  踰���  */
	$(".next").click(function(){
		clearInterval(play);
		play_next();
		return false;
	});

	$(document).keydown(function(evt){
		if (evt.keyCode==37){
			play_prev();
		}else if(evt.keyCode==39){
			clearInterval(play);
			play_next();
		}
	});

	$(".prev").click(function(){
		play_prev();
		return false;
	});

	$nav.click(function(){
		clearInterval(play);
		$nav.removeClass("on");
		$(this).addClass("on");
		$box.not(":animated").animate({
			"marginLeft":-wd*($(this).index())
		});
		return false;
	});

	$(".play").click(function(){
		clearInterval(play);
		play = setInterval(play_next,9000);
		return false;
	});

	$(".stop").click(function(){
		clearInterval(play);
		return false;
	});

	/*
	$(".slider_wrap").mouseenter(function(){
		clearInterval(play);
	}).mouseleave(function(){
		play = setInterval(play_next,5000);
	});
	*/


});
</script>
<!-- new 濡ㅻ� �� -->
<script language="JavaScript" type="text/javascript" src="js/slides.min.jquery.js"></script>
<div class="wrap" id="visual_main_bg">
  <div class="wrap" id="visual_main">
      <div class="container">
          <div id="header">
    		<?php include _template."layout/header.php";?>
        </div><!---END #header-->
        <div id="visual">
            <?php include _template."layout/slider_jssor.php";?>
        </div>
      </div>
  </div>
</div>
<div class="wrap" id="main_link">
  <div class="container">
    <ul>
      <li>
  <div class='tabs-area'>
    <ul class='tabs'>
      <li><a id='tab1' title="Tab1 Desc" href="javascript:tabs('1');"class='active'><img src="images/main/notice.jpg" alt="NOTICE"/></a></li>
      <li><a id='tab2' title="Tab2 Desc" href="javascript:tabs('2');"><img src="images/main/news.jpg" alt="NEWS"/></a></li>

    </ul>
  </div>

<div id='content1' class='content show'>
 <table width="214px" border="0" cellspacing="0" cellpadding="0">
      <colgroup>
      <col width="*">
      <col width="70px" align="right">
      </colgroup>
      
      <?php 
        $d->reset();
        $sql = "select * from #_news where id_danhmuc=3 and is_homepage <>0 order by is_homepage asc";
	$d->query($sql);
        $itemNoticeSelected = $d->result_array();
        if (is_array($itemNoticeSelected) && count($itemNoticeSelected)){
            foreach ($itemNoticeSelected as $itemNoti){
                ?>
      <tr>
        <td height="20"><div align="left"><a href="../sub03/sub03_01.php?wr_id=13">
          <img src="images/main/border_bl.gif" align="absmiddle" /> <?=$itemNoti['title']?>
        </a></div></td>
      </tr>
      <?php
            }
        }
      ?>
            
<!--            <tr>
        <td height="20"><div align="left"><a href="../sub03/sub03_01.php?wr_id=12">
          <img src="images/main/border_bl.gif" align="absmiddle" /> AMWC 2016..
        </a></div></td>
      </tr>
            <tr>
        <td height="20"><div align="left"><a href="../sub03/sub03_01.php?wr_id=11">
          <img src="images/main/border_bl.gif" align="absmiddle" /> KIMES 2016..
        </a></div></td>
      </tr>
            <tr>
        <td height="20"><div align="left"><a href="../sub03/sub03_01.php?wr_id=10">
          <img src="images/main/border_bl.gif" align="absmiddle" /> AAD 2016..
        </a></div></td>
      </tr>
            <tr>
        <td height="20"><div align="left"><a href="../sub03/sub03_01.php?wr_id=8">
          <img src="images/main/border_bl.gif" align="absmiddle" /> EADV 2015..
        </a></div></td>
      </tr>-->
          </table>
</div>
<div id='content2'class='content hide'>
 <table width="214px" border="0" cellspacing="0" cellpadding="0">
      <colgroup>
      <col width="*">
      <col width="70px" align="right">
      </colgroup>
      <?php 
        $d->reset();
        $sql = "select * from #_news where id_danhmuc=2 and is_homepage <>0 order by is_homepage asc";
	$d->query($sql);
        $itemNewsSelected = $d->result_array();
        if (is_array($itemNewsSelected) && count($itemNewsSelected)){
            foreach ($itemNewsSelected as $itemNew){
                ?>
      <tr>
        <td height="20"><div align="left"><a href="../sub03/sub03_01.php?wr_id=13">
          <img src="images/main/border_bl.gif" align="absmiddle" /> <?=$itemNew['title']?>
        </a></div></td>
      </tr>
      <?php
            }
        }
      ?>
          </table>
</div>


	  </li>
      <li><a href="javascript:sub02_01();"><img src="images/main/aileen.jpg" alt="AILEEN"/></a></li>
	  <li><a href="javascript:sub02_02();"><img src="images/main/neosys.jpg" alt="NEOSYS"/></a></li>
	  <li><a href="javascript:sub02_03();"><img src="images/main/finepulse.jpg" alt="FINEPULSE"/></a></li>
	  <li><a href="javascript:sub02_04();"><img src="images/main/regenlote.jpg" alt="REGENLOTE"/></a></li>
    </ul>
  </div>
</div>


<div class="wrap" id="main_link2">
  <div class="container">
    <ul>
      <li><a href="javascript:sub01_01();">
              <?php
              $d->reset();
            $sql = "select photo from #_background where type='banner' limit 0,1";
            $d->query($sql);
            $row_banner = $d->fetch_array();
              ?>
              <img src="<?=_upload_hinhanh_l.$row_banner['photo']?>" alt="CUSTOMER CENTER +82-2-309-1882"/>
          </a>
      </li>
      <?php
      $d->reset();
        $sql = "select * from #_news where type='gioithieu' and is_homepage <>0 order by is_homepage asc";
	$d->query($sql);
        $itemBVSelected = $d->result_array();
        if (is_array($itemBVSelected) && count($itemBVSelected)){
            foreach ($itemBVSelected as $itemBV){
                ?>
      <li><a href="javascript:sub01_05();"><img src="<?=_upload_tintuc_l.$itemBV['photo']?>" alt="SALES NETWORK"/></a></li>
      
      <?php
            }
        }
      ?>
<!--      <li><a href="javascript:sub01_05();"><img src="images/main/network.jpg" alt="SALES NETWORK"/></a></li>
	  <li><a href="javascript:sub01_04();"><img src="images/main/map.jpg" alt="ROUGH MAP"/></a></li>
	  <li><a href="javascript:sub04_01();"><img src="images/main/clinic.jpg" alt="CLINIC"/></a></li>
	  <li><a href="javascript:sub05_01();"><img src="images/main/online.jpg" alt="DEMO ONLINE"/></a></li>-->
    </ul>
  </div>
</div>
        
        
<div class="wrap" id="footer">
  <div class="container">
    <div id="foot_left">
        <h2>
            <?php
              $d->reset();
            $sql = "select photo from #_background where type='logofooter' limit 0,1";
            $d->query($sql);
            $row_logo_footer = $d->fetch_array();
              ?>
            <img src="<?=_upload_hinhanh_l.$row_logo_footer['photo']?>" alt="FineMEC">
        </h2>
    </div>
    <div id="foot_right">
	<!--<span><a href="javascript:sub01_05();"><img src="../images/common/foot_info.jpg" alt="COPYRIGHT FIND MEC ALL RIGHTS RESERVED"></span></a>-->
	<span><a href="javascript:sub01_05();">
                <?php
              $d->reset();
            $sql = "select photo from #_background where type='telfooter' limit 0,1";
            $d->query($sql);
            $row_tel_footer = $d->fetch_array();
              ?>
                <img src="<?=_upload_hinhanh_l.$row_tel_footer['photo']?>" alt="TEL:+82-2-309-1882">
              </a>
        </span>
	<span><a href="<?=$config_url ?>/admin" target="_blank">
                <img src="images/common/foot_admin.gif" alt="Admin">
            </a>
        </span>
	<span><a href="javascript:sub01_05();">
                <?php
              $d->reset();
            $sql = "select photo from #_background where type='footerright' limit 0,1";
            $d->query($sql);
            $row_footer_right = $d->fetch_array();
              ?>
                <img src="<?=_upload_hinhanh_l.$row_footer_right['photo']?>" alt="">
                </a>
        </span></div>

  </div>
</div>
<div class="wrap">
  <div class="container">
      <?php
              $d->reset();
            $sql = "select photo from #_background where type='footerleft' limit 0,1";
            $d->query($sql);
            $row_footer_left = $d->fetch_array();
              ?>
      <img src="<?=_upload_hinhanh_l.$row_footer_left['photo']?>">
  </div>
</div>



<script>
        if(window.console == undefined){console = {log:function(){}}}

		$(function(){

			var currentBtn=0;

			$("#tour_image_container ul li .gp .square").css({opacity:0.7});

			//�쇱�멸렇由ш린--------------------------------------------------------------------------------------------------------------------
			$("#tour_nav_container div.nav_line ul li").each(function(index,element){
				$(this).css({left:75*(index+1),"background-color":"#000",opacity:0.1});
			});
			//-----------------------------------------------------------------------------------------------------------------------------

			//$("#tour_image_container ul li").each(function(index,element){
				//if(index!=0){
					//$(this).css({opacity:0});
				//}
			//});
			$("#tour_image_container ul li").not($("#tour_image_container ul li:eq(0)")).css({opacity:0}); // �� 5以�怨� 媛��� �④낵...
			//-----------------------------------------------------------------------------------------------------------------------------

			var temp=$("#tour_image_container ul li:eq(0)")
			$("#tour_image_container ul").append(temp);
			temp.children(".gp").stop().css({top:0});

			$("#tour_nav_container div.nav_square ul li").css({opacity:0});
			$("#tour_container").css({display:"block"});
			//-----------------------------------------------------------------------------------------------------------------------------
			$(".nav_square ul li").hover(
				function(){
					if($(this).index()!=currentBtn){

						currentBtn=$(this).index();

						$(".nav_over").stop().animate({left:75*$(this).index()},500,"easeOutQuint");
						$(".nav_over ul").stop().animate({left:-75*$(this).index()},500,"easeOutQuint");

						//#tour_image_container ul li .gp

						var $temp=$("#tour_image_container ul li[data-index="+$(this).index()+"]");
						$("#tour_image_container ul").append($temp);
						$temp.children(".gp").stop().css({top:0});
						$temp.css({opacity:0}).stop().animate({opacity:1},500,"easeOutQuint",function(){
							$temp.children(".gp").stop().animate({top:0},600,"easeOutQuint");
						});
					}
				},
				function(){
				}
			);
		});
	</script>
<?php //include _template."layout/chat_facebook.php";?>
<?php //include_once _source . "login_with_facebook.php";?>
<?php //include _template."layout/phone.php";?>
<?php //include _template."layout/phone2.php";?>
</body>
</html>
