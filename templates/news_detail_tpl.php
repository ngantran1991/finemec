<div class="wrap" id="sub">
  <div class="container">
	<div id="snavi">    
        <p>



<!-- snb -->
<div class="snb_area">
  <ul id="snb">
      <?php
      if (is_array($listCompany) && count($listCompany)){
          foreach ($listCompany as $itemCompany){
              ?>
            <li class="<?=$itemCompany['id'] == $companyDetail['id'] ? "active": ""?>">
            <h2 class="t_h2"><a href="<?="company/".$itemCompany['tenkhongdau']."-".$itemCompany['id'].".html"?>">
                    <?=$itemCompany['ten']?>
                </a>
            </h2>
          </li>
      <?php
          }
      }
      ?>
    
  </ul>
</div>
<!-- // snb -->
<p>
	</div>
	<div id="contents">
 	<h1>
            <?=$title_cat?>
        </h1>
	    <div class="location">
        	<ul><li class="home"><a href="<?=$config_url ?>">HOME</a></li><li>Company</li><li><?=$title_cat?>




</li></ul>
      	</div>
<div id="page">
    <?=$noidung?></div>

</div>
</div>
</div>