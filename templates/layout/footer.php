<?php
	$d->reset();
	$sql_contact = "select noidung$lang as noidung from #_about where type='footer' limit 0,1";
	$d->query($sql_contact);
	$company_contact = $d->fetch_array();

    $d->reset();
    $sql = "select noidung$lang as noidung from #_about where type='footer2' limit 0,1";
    $d->query($sql);
    $footer2 = $d->fetch_array();
?>

<div id="menu2" align="center">
    <ul>
        <li><a class="<?php if((!isset($_REQUEST['com'])) or ($_REQUEST['com']==NULL) or $_REQUEST['com']=='index') echo 'active'; ?>" href=""><?=_trangchu?></a></li>
        <li class="line"></li>
        <li><a class="<?php if($_REQUEST['com'] == 'gioi-thieu') echo 'active'; ?>" href="gioi-thieu.html"><?=_gioithieu?></a></li>
        <li class="line"></li>
        <li><a class="<?php if($_REQUEST['com'] == 'dich-vu') echo 'active'; ?>" href="dich-vu.html"><?=_dichvu?></a></li>
        <li class="line"></li>
        <li><a class="<?php if($_REQUEST['com'] == 'du-an') echo 'active'; ?>" href="du-an.html"><?=_duan?></a></li>
        <li class="line"></li>
        <li><a class="<?php if($_REQUEST['com'] == 'san-pham') echo 'active'; ?>" href="san-pham.html"><?=_sanpham?></a></li>
        <li class="line"></li>
        <li><a class="<?php if($_REQUEST['com'] == 'tuyen-dung') echo 'active'; ?>" href="tuyen-dung.html"><?=_tuyendung?></a></li>
        <li class="line"></li>
        <li><a class="<?php if($_REQUEST['com'] == 'tin-tuc') echo 'active'; ?>" href="tin-tuc.html"><?=_tintuc?></a></li>
        <li class="line"></li>
        <li><a class="<?php if($_REQUEST['com'] == 'catalogue') echo 'active'; ?>" href="catalogue.html">Catalogue</a></li>
        <li class="line"></li>
        <li><a class="<?php if($_REQUEST['com'] == 'lien-he') echo 'active'; ?>" href="lien-he.html"><?=_lienhe?></a></li>
    </ul>
</div>

<div id="main_footer">
	<?=$company_contact['noidung'];?>
</div>

<div id="thongke">    
	<a href="<?=$company['facebook']?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
    <a href="<?=$company['tiwtter']?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
    <a href="<?=$company['google']?>" target="_blank"><i class="fa fa-google" aria-hidden="true"></i></a>
    <a href="<?=$company['youtube']?>" target="_blank"><i class="fa fa-youtube" aria-hidden="true"></i></a>
    <div class="clear"></div>
    <?=$footer2['noidung']?>
</div><!---END #thongke-->
