<div class="control_frm" style="margin-top:25px;">
    <div class="bc">
        <ul id="breadcrumbs" class="breadcrumbs">
        	            <li><a href="index.php?com=slider&act=man_photo<?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>"><span>Hình ảnh</span></a></li>
                        <li class="current"><a href="#" onclick="return false;">Sửa nội dung homepage</a></li>
        </ul>
        <div class="clear"></div>
    </div>
</div>
<script type="text/javascript">		
	function TreeFilterChanged2(){		
				$('#validate').submit();		
	}
</script>
<form name="supplier" id="validate" class="form" action="index.php?com=homepage&act=save<?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>" method="post" enctype="multipart/form-data">
	<div class="widget">
		<div class="title"><img src="./images/icons/dark/list.png" alt="" class="titleIcon" />
			<h6>Sửa nội dung homepage</h6>
		</div>		
        <?php
//			if($_REQUEST['type']!='banner' and $_REQUEST['type']!='banner_mobi' and $_REQUEST['type']!='banner2' and $_REQUEST['type']!='bannerqc')
				$config['lang'] = array(''=>'Tiếng Việt');	
		?>
        <ul class="tabs">
        	<?php foreach ($config['lang'] as $key => $value) { ?>
           		<li><a href="#content_lang_<?=$key?>"><?=$value?></a></li>
           <?php } ?>
       </ul>

		<?php foreach ($config['lang'] as $key => $value) {?>
        <div id="content_lang_<?=$key?>" class="tab_content">	
            <div class="formRow">
                <label>Notice: </label>
                <div class="formRight">
                    <?php
                    for ($i=0; $i<5; $i++){
                        ?>
                        <select name="notice[]" class="main_select">
                            <option value=""> -Chọn bài viết-</option>
                            <?php
                            foreach ($itemNotice as $itemNo){
                                $arrCheckSelected = array(
                                    'id' => $itemNo['id'],
                                    'is_homepage' => $i+1
                                );
                                $selected = in_array($arrCheckSelected, $itemNoticeSelected) ? "selected": "";
                                ?>
                            <option value="<?=$itemNo['id']?>" <?=$selected?>><?=$itemNo['title']?></option>
                            <?php
                            }
                            ?>
                        </select> 
                    <?php
                    }
                    ?>
                               
                </div>
                <div class="clear"></div>
          </div>
          <div class="formRow">
                <label>News: </label>
                <div class="formRight">
                    <?php
                    for ($i=0; $i<5; $i++){
                        ?>
                        <select name="news[]" class="main_select">
                            <option value=""> -Chọn bài viết-</option>
                            <?php
                            foreach ($itemNews as $itemNo){
                                ?>
                            <option value="<?=$itemNo['id']?>"><?=$itemNo['title']?></option>
                            <?php
                            }
                            ?>
                        </select> 
                    <?php
                    }
                    ?>
                               
                </div>
                <div class="clear"></div>
          </div>
             <div class="formRow">           
                <label>Hình ảnh hiện tại: </label>      
                <div class="formRight">          
                <img src="<?=_upload_hinhanh.$item['photo'.$key]?>"  alt="NO PHOTO" style="max-width:100%; max-height:200px;" />
                <br />
                </div>
                <div class="clear"></div>
            </div>
            
            <div class="formRow">
                <label>Upload hình ảnh:</label>
                <div class="formRight">
                    <input type="file" id="file" name="file<?=$key?>" />
                    <img src="./images/question-button.png" alt="Upload hình" class="icon_question tipS" original-title="Tải hình ảnh (ảnh JPEG, GIF , JPG , PNG)">
                    <?php if($_REQUEST['type']=='banner') { ?><span class="size_img">Chiều rộng <b>auto</b> Chiều cao: <b>140px</b></span><?php } ?>
                    <?php if($_REQUEST['type']=='pupop') { ?><span class="size_img">Chiều rộng <b>800px</b> Chiều cao: <b>auto</b></span><?php } ?>
                    <?php if($_REQUEST['type']=='bannerhotro') { ?><span class="size_img">Chiều rộng <b>216px</b> Chiều cao: <b>167px</b></span><?php } ?>
                        <?php if($_REQUEST['type']=='logo') { ?><span class="size_img">Chiều rộng <b>115px</b> Chiều cao: <b>20px</b></span><?php } ?>
                </div>
                <div class="clear"></div>
             </div> 
        </div><!-- End content <?=$key?> -->
        <?php } ?>
        

			<div class="formRow">
			<div class="formRight">
            <input type="hidden" name="type" id="type" value="<?=$_REQUEST['type']?>" />
                <input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
            	<input type="button" class="blueB" onclick="TreeFilterChanged2(); return false;" value="Hoàn tất" />
			</div>
			<div class="clear"></div>
		</div>     
		
	</div>
   
</form>   
