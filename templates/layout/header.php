<?php

//	$d->reset();
//	$sql_banner = "select photo$lang as photo from #_background where type='banner' limit 0,1";
//	$d->query($sql_banner);
//	$row_banner = $d->fetch_array();

	$d->reset();
	$sql = "select photo from #_background where type='logo' limit 0,1";
	$d->query($sql);
	$row_logo = $d->fetch_array();

//	$d->reset();
//	$sql = "select photo$lang as photo from #_background where type='banner2' limit 0,1";
//	$d->query($sql);
//	$banner2 = $d->fetch_array();
	
	//$d->reset();
	//$sql_banner_mobi = "select photo$lang as photo from #_background where type='banner_mobi' limit 0,1";
	//$d->query($sql_banner_mobi);
	//$banner_mobi = $d->fetch_array();
	
	//$duoi_banner = end(explode('.',$row_banner['photo']));
			
?>
<style>
body {margin:0;}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav .icon {
  display: none;
}
#myTopnav{
    display: none;
}
.mobi-slide{
    display: none;
}

@media screen and (max-width: 1030px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }
  #myTopnav{
      display: block;
  }
  #menu{
      display: none;
  }
}

@media screen and (max-width: 1030px) {
  .topnav.responsive {position: relative; z-index: 10;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .mobi-slide{
      display: block;
      margin-top: 60px;
  }
  #main_link .tabs-area ul li{
      width: 49%;
      padding-left: 0px;
      padding-right: 0px;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
  

}
@media screen and (max-width: 760px){
    .mobi-slide img{
      margin-top: 20px;
  }
}
</style>
<div id="logo">
    <a href="/vcontrol">
        <img src="<?=_upload_hinhanh_l.$row_logo['photo']?>" alt="logo"/>
        <!--<img src="../images/common/logo.jpg" alt="logo"/>-->
    </a>
</div>
<div id="menu">
  <div id="navi">
    <div id="menu_left">
      <ul>
        <li>
            <?php
            $d->reset();
            $sql = "select * from #_news where type='gioithieu' and id <> 20 order by stt asc limit 0,1";
            $d->query($sql);
            $row_company = $d->fetch_array();
            ?>
            <a href="company/<?=$row_company['tenkhongdau']."-".$row_company['id']?>.html">
                <span class="title-menu"><?=_company?></span>
            </a>
        </li>
        <li>
            <?php
            $d->reset();
            $sql_list_product = "select * FROM #_product where type='sanpham' and hienthi=1 order by stt,id asc limit 1";
            $d->query($sql_list_product);
            $row_product = $d->fetch_array();
            ?>
            <a href="san-pham/<?=$row_product['tenkhongdau']."-".$row_product['id']?>.html">
                <span class="title-menu"><?=_product?></span>
            </a>
        </li>
        <li>
            <?php
            $d->reset();
            $sql_list = "select id,ten$lang as ten, tenkhongdau FROM #_news_danhmuc where hienthi=1 and type='tintuc' order by stt asc limit 1";
            $d->query($sql_list);
            $row_list = $d->fetch_array();
            $listLoaiTinTucMenu = $row_list;
            ?>
            <a href="media/<?=$listLoaiTinTucMenu['tenkhongdau']."-".$listLoaiTinTucMenu['id']?>.html">
                <span class="title-menu"><?=_media?></span>
            </a>
        </li>
        <li>
            <?php
            $d->reset();
            $sql_list = "select id,ten$lang as ten, tenkhongdau FROM #_product_danhmuc where hienthi=1 and type='duan' order by stt asc limit 1";
            $d->query($sql_list);
            $row_list_menu = $d->fetch_array();
            ?>
            <a href="clinic/<?=$row_list_menu['tenkhongdau']."-".$row_list_menu['id']?>.html">
                <span class="title-menu"><?=_clinic?></span>
            </a>
        </li>
		<li><a href="demo-online.html">
                        <span class="title-menu"><?=_demoonline?></span>
                    </a></li>
      </ul>
    </div>
    <div id="menu_right">
      <ul>
        <li><a href="/">
                <span class="title-menu-right"><?=_home?></span>
            </a></li><li>|</li>
        <li><a href="mailto:cool@finemec.co.kr">
                <span class="title-menu-right"><?=_contactus?></span>
            </a></li><li>|</li>
        <li><a href="site-map.html">
                <span class="title-menu-right"><?=_sitemap?></span>
            </a></li>
        <li id="lang">
	<?php if($lang=='en') { ?>
		<a href="index.php?com=ngonngu&lang=" title="Việt Nam">
                    <span class="lang-top"><?=_lang_viet_nam?></span>
                </a>
	<?php }else{ ?>
		<a href="index.php?com=ngonngu&lang=en" title="English">
                    <span class="lang-top"><?=_lang_english?></span>
                </a>
	<?php } ?>
        </li>
      </ul>
    </div>
  </div>
</div>
<script>
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
</script>

<!--<div id="lang">
	<?php if($lang=='en') { ?>
		<a href="index.php?com=ngonngu&lang=" title="Việt Nam"><img src="img/vi.png" alt="Việt Nam" /> VIE</a>
	<?php }else{ ?>
		<a href="index.php?com=ngonngu&lang=en" title="English"><img src="img/en.png" alt="English" /> ENG</a>
	<?php } ?>
</div>END #lang-->
