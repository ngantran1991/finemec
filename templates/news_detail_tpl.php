<div class="tieude_giua"><div><?=$title_cat?></div><span></span></div>
<div class="box_container">
    <div class="content">   	    
        <?=$row_detail['noidung']?> 
        
        <?php if(!empty($tags_sp)) { ?>
            <div class="tukhoa">
                <div id="tags">
                    <span>Tags:</span>
                    <?php foreach($tags_sp as $k=>$tags_sp_item) { ?>
                       <a href="tag/<?=changeTitle($tags_sp_item['ten'])?>/<?=$tags_sp_item['id']?>" title="<?=$tags_sp_item['ten']?>"><?=$tags_sp_item['ten']?></a>
                    <?php } ?>
                    <div class="clear"></div>
                </div>					
            </div>   
        <?php } ?>
        
        <div class="addthis_native_toolbox"><b><?=_chiase?>: </b></div>    

        <div class="wrap_comment" style="margin-top: 20px;">
            <div id="fb-root"></div>
            <script>(function(d, s, id) {
              var js, fjs = d.getElementsByTagName(s)[0];
              if (d.getElementById(id)) return;
              js = d.createElement(s); js.id = id;
              js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.9";
              fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>
            <div class="fb-comments" data-href="<?=getCurrentPageURL()?>" data-width="100%" data-numposts="5"></div>
        </div>
        
        <?php if(count($tintuc) > 0) { ?>   
        <div class="othernews">
             <div class="cactinkhac"><?=$title_other?></div>
             <ul class="phantrang">
                <?php for($i = 0, $count_tintuc = count($tintuc); $i < $count_tintuc; $i++){ ?>
                    <li><a href="<?=$com?>/<?=$tintuc[$i]['tenkhongdau']?>-<?=$tintuc[$i]['id']?>.html" title="<?=$tintuc[$i]['ten']?>"><?=$tintuc[$i]['ten']?></a> (<?=make_date($tintuc[$i]['ngaytao'])?>)</li>
                <?php }?>
             </ul> 
             <div class="pagination"><?=pagesListLimitadmin($url_link , $totalRows , $pageSize, $offset)?></div> 
        </div>
        
        <?php }?>     
    </div><!--.content-->
</div><!--.box_container-->
         