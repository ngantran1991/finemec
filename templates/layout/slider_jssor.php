<?php

	$d->reset();
	$sql_slider = "select ten$lang as ten,link,photo,noidung$lang as noidung from #_slider where hienthi=1 and type='slider' order by stt,id desc";
	$d->query($sql_slider);
	$slider=$d->result_array();
	
?>

<div class="slider_wrap"> <a href="#" class="prev" title=""><img src="images/main/m_prev.png" alt="prev" /></a>
    <a href="#" class="next" title=""><img src="images/main/m_next.png" alt="next" /></a>
    <div class="slider_show">
      <!-- slider_box -->
      <div class="slider_box">
          <?php for($i=0,$count_slider=count($slider);$i<$count_slider;$i++){ ?>
            <div class="slider_list">
                <div class="custom_pic">
                    <a href="javascript:sub02_04();">
                        <img src="<?php if($slider[$i]['photo']!='')echo _upload_hinhanh_l.$slider[$i]['photo'];else echo 'images/noimage.png' ?>" usemap="#visual04" border="0" alt="<?=$$slider[$i]['ten']?>"/></a>
                    </a>
                </div>
            </div>
            <?php } ?>    
<!--        <div class="slider_list">
          <div class="custom_pic"><a href="javascript:sub02_04();"><img src="../images/main/visual_04.png" usemap="#visual04" border="0" alt="NOBLEX Everything depends on you FineMEC new generation of laser"/></a></div>
        </div>
                    <div class="slider_list">
          <div class="custom_pic"><a href="javascript:sub02_01();"><img src="../images/main/visual_01.png" usemap="#visual01" border="0" alt="AILEEN PLUS High power long puked ND:YAG laser system turn back time like a magic"/></a></div>
        </div>
        <div class="slider_list">
          <div class="custom_pic"><a href="javascript:sub02_02();"><img src="../images/main/visual_02.png" usemap="#visual02" border="0" alt="NEOSYS sleady quality Q-switched ND:YAG laser system this is basic of antiaging"/></a></div>
        </div>
        <div class="slider_list">
          <div class="custom_pic"><a href="javascript:sub02_03();"><img src="../images/main/visual_03.png" usemap="#visual03" border="0" alt="FINPULES Step by step forwardas a world leading medical laser skin as while as snow"/></a></div>
        </div>
                   <div class="slider_list">
          <div class="custom_pic"><a href="javascript:sub02_05();"><img src="../images/main/visual_05.png" usemap="#visual03" border="0" alt="Rf benefits"/></a></div>
        </div>
                           <div class="slider_list">
          <div class="custom_pic"><a href="javascript:sub02_06();"><img src="../images/main/visual_06.png" usemap="#visual03" border="0" alt="Right benefits"/></a></div>
        </div>-->

      </div>
    </div>
  </div>
