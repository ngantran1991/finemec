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
<div id="logo">
    <a href="javascript:main();">
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
            $sql = "select * from #_news where type='gioithieu' order by stt asc limit 0,1";
            $d->query($sql);
            $row_company = $d->fetch_array();
            ?>
            <a href="company/<?=$row_company['tenkhongdau']."-".$row_company['id']?>.html">
                <img src="images/common/navi_01.png" alt="company"/>
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
                <img src="images/common/navi_02.png" alt="products"/>
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
                <img src="images/common/navi_03.png" alt="media"/>
            </a>
        </li>
        <li><a href="javascript:sub04();"><img src="images/common/navi_04.png" alt="clinic"/></a></li>
		<li><a href="javascript:sub05();"><img src="images/common/navi_05.png" alt="online"/></a></li>
      </ul>
    </div>
    <div id="menu_right">
      <ul>
        <li><a href="javascript:main();"><img src="images/common/home.png" alt="HOME|"/></a></li>
        <li><a href="mailto:cool@finemec.co.kr"><img src="images/common/contactus.png" alt="CONTACT US|"/></a></li>
        <li><a href="javascript:sub06();"><img src="images/common/sitmap.png" alt="SITEMAP"/></a></li>
        <li><a href="http://finemec.co.kr" target="_blank"><img src="images/common/korea.png" alt="KOREA"/></a></li>
      </ul>
    </div>
  </div>
</div>

<!--<div id="lang">
	<?php if($lang=='en') { ?>
		<a href="index.php?com=ngonngu&lang=" title="Việt Nam"><img src="img/vi.png" alt="Việt Nam" /> VIE</a>
	<?php }else{ ?>
		<a href="index.php?com=ngonngu&lang=en" title="English"><img src="img/en.png" alt="English" /> ENG</a>
	<?php } ?>
</div>END #lang-->
