<div class="logo"><a href="index.php"><img style="width: 100%;" src="images/logo.png" /></a></div>
<div class="sidebarSep mt0"></div>

<!-- Left navigation -->
<ul id="menu" class="nav">
<li class="dash" id="menu1"><a class=" active" title="" href="index.php"><span>Trang chủ</span></a></li>
<?php 
$activeHomepage = "";
if($_GET['com']=='anhnen' || $_GET['com']=='background' || $_GET['com']=='homepage' || $_GET['com']=='slider' || $_GET['com']=='letruot')
    $activeHomepage = "activemenu";
if ($_GET['type'] == "logofooter" || $_GET['type'] == "footerleft" || $_GET['type'] == "telfooter" || $_GET['type'] == "footerright")
    $activeHomepage = "";
?>
<li class="categories_li gallery_li <?=$activeHomepage ?>" id="menu_qc"><a href="" title="" class="exp"><span>Homepage</span><strong></strong></a>
     <ul class="sub">
		<?php //phanquyen_menu('Cập nhật background','anhnen','capnhat','background'); ?>
        <?php phanquyen_menu('Cập nhật logo','background','capnhat','logo'); ?>
        <?php phanquyen_menu('Quản lý slider','slider','man_photo','slider'); ?>
        <?php phanquyen_menu('Cập nhật banner phải','background','capnhat','bannerqc'); ?>
        
        <?php phanquyen_menu('Cập nhật nội dung homepage','homepage','capnhat','banner'); ?>
         
<!--        Cập nhật sản phẩm hiển thị
        Cập nhật notice hiển thị
        Cập nhật new hiển thị
        Cập nhật bài viết hiển thị
        Cập nhật tel bên phải
        Cập nhật image bên phải
        cập nhật bottom footer-->
        
        
        
        <?php // phanquyen_menu('Cập nhật notice hiển thị','background','capnhat','banner'); ?>
        
         
        <?php // phanquyen_menu('Cập nhật banner hỗ trợ','background','capnhat','bannerhotro'); ?>
         
        
        <?php // phanquyen_menu('Cập nhật footer bên trái','background','capnhat','banner2'); ?>
        
        
        <?php // phanquyen_menu('Cập nhật banner bảo trì','background','capnhat','baotri'); ?>
        <?php // phanquyen_menu('Quản lý đối tác','slider','man_photo','doitac'); ?>
        <?php // phanquyen_menu('Quản lý quảng cáo','slider','man_photo','quangcao'); ?>
        <?php // phanquyen_menu('Quản lý quảng cáo 2 bên','slider','man_photo','letruot'); ?>
        <?php // phanquyen_menu('Cập nhật pupop quảng cáo','background','capnhat','pupop'); ?>
     </ul>
</li>
<li class="categories_li gallery_li <?php if(($_GET['com']=='background' && ($_GET['type'] == "logofooter" || $_GET['type'] == "footerleft" || $_GET['type'] == "telfooter"  || $_GET['type'] == "footerright")) ||
        ($_GET['com']=='about' && $_GET['type'] == "footer")) echo ' activemenu' ?>" id="menu_image_footer"><a href="" title="" class="exp"><span>Footer</span><strong></strong></a>
     <ul class="sub">
        <?php phanquyen_menu('Cập nhật logo footer','background','capnhat','logofooter'); ?>
         <?php phanquyen_menu('Cập nhật footer left','about','capnhat','footer'); ?>
         <?php phanquyen_menu('Cập nhật footer right','background','capnhat','footerright'); ?>
     </ul>
</li>

<li class="categories_li <?php if($_GET['type']=='gioithieu') echo ' activemenu' ?>" id="menu_gioithieu"><a href="" title="" class="exp"><span>Company</span><strong></strong></a>
    <ul class="sub">
        <?php phanquyen_menu('Quản lý bài viết','news','man','gioithieu'); ?>
    </ul>
</li>

<li class="categories_li <?php if($_GET['type']=='sanpham') echo ' activemenu' ?>" id="menu_"><a href="" title="" class="exp"><span>Product</span><strong></strong></a>
    <ul class="sub">
    	<?php // phanquyen_menu('Quản lý danh mục 1','product','man_danhmuc','sanpham'); ?>
        <?php // phanquyen_menu('Quản lý danh mục 2','product','man_list','sanpham'); ?>
        <?php phanquyen_menu('Quản lý sản phẩm','product','man','sanpham'); ?>
        <?php //phanquyen_menu('Quản lý đơn hàng','order','man',''); ?>
    </ul>
</li>

<li class="categories_li <?php if($_GET['type']=='tintuc') echo ' activemenu' ?>" id="menu_tintuc"><a href="" title="" class="exp"><span>Media</span><strong></strong></a>
    <ul class="sub">
        <?php phanquyen_menu('Quản lý danh mục 1','news','man_danhmuc','tintuc'); ?>
        <?php phanquyen_menu('Quản lý media','news','man','tintuc'); ?>
    </ul>
</li>

<li class="categories_li <?php if($_GET['type']=='duan') echo ' activemenu' ?>" id="menu_da"><a href="" title="" class="exp"><span>Clinic</span><strong></strong></a>
    <ul class="sub">
        <?php phanquyen_menu('Quản lý danh mục 1','product','man_danhmuc','duan'); ?>
        <?php // phanquyen_menu('Quản lý danh mục 2','product','man_list','duan'); ?>
        <?php phanquyen_menu('Quản lý clinic','product','man','duan'); ?>
        <?php //phanquyen_menu('Quản lý đơn hàng','order','man',''); ?>
    </ul>
</li>

<!--<li class="categories_li <?php if($_GET['com']=='about' || $_GET['com']=='video') echo ' activemenu' ?>" id="menu_t"><a href="" title="" class="exp"><span>Trang tĩnh</span><strong></strong></a>
    <ul class="sub">
    	<?php //phanquyen_menu('Quản lý Video','video','man','video'); ?>
        <?php // phanquyen_menu('Cập nhật giới thiệu','about','capnhat','about'); ?>
        <?php // phanquyen_menu('Cập nhật liên hệ','about','capnhat','lienhe'); ?>
        <?php // phanquyen_menu('Cập nhật footer','about','capnhat','footer'); ?>
        <?php // phanquyen_menu('Cập nhật footer 2','about','capnhat','footer2'); ?>
    </ul>
</li>-->

<li class="categories_li gallery_li <?php if($_GET['com']=='background' && ($_GET['type'] == "companytitle" || $_GET['type'] == "companybackground")) echo ' activemenu' ?>" id="menu_image_company"><a href="" title="" class="exp"><span>Image trang Company</span><strong></strong></a>
     <ul class="sub">
        <?php phanquyen_menu('Cập nhật Image Title','background','capnhat','companytitle'); ?>
         <?php phanquyen_menu('Cập nhật Image Background','background','capnhat','companybackground'); ?>
     </ul>
</li>

<li class="categories_li gallery_li <?php if($_GET['com']=='background' && ($_GET['type'] == "producttitle" || $_GET['type'] == "productbackground")) echo ' activemenu' ?>" id="menu_image_product"><a href="" title="" class="exp"><span>Image trang Product</span><strong></strong></a>
     <ul class="sub">
        <?php phanquyen_menu('Cập nhật Image Title','background','capnhat','producttitle'); ?>
         <?php phanquyen_menu('Cập nhật Image Background','background','capnhat','productbackground'); ?>
     </ul>
</li>

<li class="categories_li gallery_li <?php if($_GET['com']=='background' && ($_GET['type'] == "mediatitle" || $_GET['type'] == "mediabackground")) echo ' activemenu' ?>" id="menu_image_media"><a href="" title="" class="exp"><span>Image trang Media</span><strong></strong></a>
     <ul class="sub">
        <?php phanquyen_menu('Cập nhật Image Title','background','capnhat','mediatitle'); ?>
         <?php phanquyen_menu('Cập nhật Image Background','background','capnhat','mediabackground'); ?>
     </ul>
</li>

<li class="categories_li gallery_li <?php if($_GET['com']=='background' && ($_GET['type'] == "clinictitle" || $_GET['type'] == "clinicbackground")) echo ' activemenu' ?>" id="menu_image_clinic"><a href="" title="" class="exp"><span>Image trang Clinic</span><strong></strong></a>
     <ul class="sub">
        <?php phanquyen_menu('Cập nhật Image Title','background','capnhat','clinictitle'); ?>
         <?php phanquyen_menu('Cập nhật Image Background','background','capnhat','clinicbackground'); ?>
     </ul>
</li>

<li class="categories_li gallery_li <?php if($_GET['com']=='background' && ($_GET['type'] == "demoonlinetitle" || $_GET['type'] == "demoonlinebackground")) echo ' activemenu' ?>" id="menu_image_demoonline"><a href="" title="" class="exp"><span>Image trang demo online</span><strong></strong></a>
     <ul class="sub">
        <?php phanquyen_menu('Cập nhật Image Title','background','capnhat','demoonlinetitle'); ?>
         <?php phanquyen_menu('Cập nhật Image Background','background','capnhat','demoonlinebackground'); ?>
     </ul>
</li>

<li class="categories_li gallery_li <?php if($_GET['com']=='background' && ($_GET['type'] == "sitemaptitle" || $_GET['type'] == "sitemapbackground")) echo ' activemenu' ?>" id="menu_image_demoonline"><a href="" title="" class="exp"><span>Image trang Sitemap</span><strong></strong></a>
     <ul class="sub">
        <?php phanquyen_menu('Cập nhật Image Title','background','capnhat','sitemaptitle'); ?>
         <?php phanquyen_menu('Cập nhật Image Background','background','capnhat','sitemapbackground'); ?>
     </ul>
</li>




<!--<li class="categories_li <?php if($_GET['type']=='dichvu') echo ' activemenu' ?>" id="menu_dichvu"><a href="" title="" class="exp"><span>Dịch vụ</span><strong></strong></a>
    <ul class="sub">
        <?php phanquyen_menu('Quản lý danh mục 1','news','man_danhmuc','dichvu'); ?>
        <?php phanquyen_menu('Quản lý danh mục 2','news','man_list','dichvu'); ?>
        <?php phanquyen_menu('Quản lý dịch vụ','news','man','dichvu'); ?>
    </ul>
</li>

<li class="categories_li <?php if($_GET['type']=='hotro') echo ' activemenu' ?>" id="menu_hotro"><a href="" title="" class="exp"><span>Hỗ trợ</span><strong></strong></a>
    <ul class="sub">
        <?php phanquyen_menu('Quản lý danh mục 1','news','man_danhmuc','hotro'); ?>
        <?php phanquyen_menu('Quản lý danh mục 2','news','man_list','hotro'); ?>
        <?php phanquyen_menu('Quản lý hỗ trợ','news','man','hotro'); ?>
    </ul>
</li>

<li class="categories_li <?php if($_GET['type']=='tuyendung') echo ' activemenu' ?>" id="menu_tuyendung"><a href="" title="" class="exp"><span>Tuyển dụng</span><strong></strong></a>
    <ul class="sub">
        <?php phanquyen_menu('Quản lý danh mục 1','news','man_danhmuc','tuyendung'); ?>
        <?php phanquyen_menu('Quản lý danh mục 2','news','man_list','tuyendung'); ?>
        <?php phanquyen_menu('Quản lý tuyển dụng','news','man','tuyendung'); ?>
    </ul>
</li>

<li class="categories_li <?php if($_GET['type']=='catalogue') echo ' activemenu' ?>" id="menu_catalogue"><a href="" title="" class="exp"><span>Catalogue</span><strong></strong></a>
    <ul class="sub">
        <?php phanquyen_menu('Quản lý catalogue','news','man','catalogue'); ?>
    </ul>
</li>


   
<li class="categories_li <?php if($_GET['com']=='newsletter' || $_GET['com']=='lkweb' || $_GET['com']=='yahoo') echo ' activemenu' ?>" id="menu_nt"><a href="" title="" class="exp"><span>Marketing Online</span><strong></strong></a>
      	<ul class="sub">
        	<?php //phanquyen_menu('Quản lý liên kết web','lkweb','man','lkweb'); ?>
            <?php phanquyen_menu('Quản lý hỗ trợ trực tuyến','yahoo','man','yahoo'); ?>
            <?php phanquyen_menu('Quản lý Đăng ký nhận tin','newsletter','man',''); ?>    	
        </ul>
</li>

<li class="categories_li none <?php if($_GET['com']=='database' || $_GET['com']=='backup') echo ' activemenu' ?>" id="menu_ntt"><a href="" title="" class="exp"><span>Database</span><strong></strong></a>
      	<ul class="sub">
        	<?php phanquyen_menu('Quản lý database','database','man',''); ?>
            <?php phanquyen_menu('Backup database','backup','backup_database',''); ?>
            <?php phanquyen_menu('Backup file','backup','backup_file',''); ?>    	
        </ul>
</li>
 
<li class="categories_li none <?php if($_GET['com']=='phanquyen' || $_GET['com']=='com') echo ' activemenu' ?>" id="menu_pq"><a href="" title="" class="exp"><span>Phân quyền</span><strong></strong></a>
  <ul class="sub">
  		<?php phanquyen_menu('Quản lý nhóm thành viên','phanquyen','man',''); ?>
        <?php phanquyen_menu('Quản lý thành viên','user','man',''); ?>
        <?php //phanquyen_menu('Quản lý com','com','man',''); ?>
    </ul>
</li>

<li class="categories_li none <?php if($_GET['com']=='place') echo ' activemenu' ?>" id="menu_pl"><a href="" title="" class="exp"><span>Địa điểm</span><strong></strong></a>
    <ul class="sub">
        <?php phanquyen_menu('Quản lý Tỉnh thành','place','man_city',''); ?>
        <?php phanquyen_menu('Quản lý Quận huyện','place','man_dist',''); ?>
        <?php phanquyen_menu('Quản lý Phường xã','place','man_ward',''); ?>
        <?php phanquyen_menu('Quản lý Đường','place','man_street',''); ?>
    </ul>
</li>-->

<li class="categories_li setting_li <?php if($_GET['com']=='company' || $_GET['com']=='meta' || $_GET['com']=='about' || $_GET['com']=='user') echo ' activemenu' ?>" id="menu_cp"><a href="" title="" class="exp"><span>Nội dung khác</span><strong></strong></a>
    <ul class="sub">
    	<?php phanquyen_menu('Cấu hình thông tin Website','company','capnhat',''); ?>
         <li<?php if($_GET['act']=='admin_edit') echo ' class="this"' ?>><a href="index.php?com=user&act=admin_edit">Quản lý Tài Khoản</a></li>
    </ul>
</li>
</ul>
