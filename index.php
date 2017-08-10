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
        <link href="css/default.css" type="text/css" rel="stylesheet" />
        <link href="style.css" type="text/css" rel="stylesheet" />
    <?php } ?>

	<?php include _template."layout/seoweb.php";?>
	<?php include _template."layout/js_css.php";?> 
    <?php if($lang=='') { ?>
    <style type="text/css">
        div.menu ul li a{
            padding: 0px 39px;
        }
    </style>
    <?php } ?>
    <?=$company['codethem']?>       
</head>

<?php //include _template."layout/background.php";?>
<body onLoad="<?php if(@$_GET['com']=='lien-he') echo 'initialize();'; ?>" <?=$str_background?>>
<div id="pre-loader"><div class="loader"></div></div>

<h1 class="vcard fn" style="position:absolute; top:-1000px;"><?php if($title!='')echo $title;else echo $company['title'];?></h1>
<h2 style="position:absolute; top:-1000px;"><?php if($title!='')echo $title;else echo $company['title'];?></h2>
<h3 style="position:absolute; top:-1000px;"><?php if($title!='')echo $title;else echo $company['title'];?></h3>


<?php //include _template."layout/pupop.php";?>

<?php if($deviceType !='computer'){?>

    <div id="wapper">
	<div id="header">
		<?php include _template."layout/header.php";?>
    </div><!---END #header-->
    
    <div id="menu_mobi">
        <?php include _template."layout/menu_mobi.php";?>  
    </div><!---END .wap_menu-->    
    
    <div id="slider">
        <?php include _template."layout/slider_jssor.php";?>
    </div><!---END #slider-->
    
    <div id="main_content">
        

        <div id="right">
        	<?php include _template.$template."_tpl.php"; ?> 
        </div><!---END #right-->
        
        <div id="left">
            <?php include _template."layout/left.php";?>
        </div><!---END #left-->
        <div class="clear"></div>
    </div><!---END #main_content-->
    
    <?php //include _template."layout/dangkynhantin.php";?>

    <div id="wap_footer">
        <div id="footer">
            <?php include _template."layout/footer.php";?>
            <div class="clear"></div>
        </div><!---END #footer--> 
    </div><!---END #wap_footer-->
	</div><!---END #wapper-->

<?php }else{?>

	<div id="wapper">
    	<div id="header">
    		<?php include _template."layout/header.php";?>
        </div><!---END #header-->
        
        <div class="wap_menu">
            <div class="menu">
                  <?php include _template."layout/menu_top.php";?>
            </div><!---END .menu-->
        </div><!---END .wap_menu-->   
        
        <div id="slider">
            <?php include _template."layout/slider_jssor.php";?>
        </div><!---END #slider-->
        
        <div id="main_content">
            <?php if($source=='product' && $type=='sanpham'){ ?>
                <div id="left_l">
                    <?php include _template."layout/left2.php";?>
                </div><!---END #left-->
            <?php } ?>

            <div id="right" <?php if($source=='product' && $type=='sanpham'){ ?> style="width: 745px;"<?php } ?>>
            	<?php include _template.$template."_tpl.php"; ?> 
            </div><!---END #right-->
            
            <div id="left">
                <?php include _template."layout/left.php";?>
            </div><!---END #left-->
            <div class="clear"></div>
        </div><!---END #main_content-->
        
        <?php include _template."layout/dangkynhantin.php";?>

        <div id="wap_footer">
            <div id="footer">
                <?php include _template."layout/footer.php";?>
                <div class="clear"></div>
            </div><!---END #footer--> 
        </div><!---END #wap_footer-->
	</div><!---END #wapper-->

<?php }?>
<script type="text/javascript">
    function do_search(){
        var timkiem = $('#name_tk').val();
        if(!timkiem){
            alert('<?=_nhaptukhoatimkiem?>');
            document.getElementById("name_tk").focus();
            return false;
        } else {
            window.location.href="tim-kiem.html&keyword="+timkiem;
            return true;
        }
        return false;
    }
</script>
<?php //include _template."layout/chat_facebook.php";?>
<?php //include_once _source . "login_with_facebook.php";?>
<?php //include _template."layout/phone.php";?>
<?php //include _template."layout/phone2.php";?>
</body>
</html>
