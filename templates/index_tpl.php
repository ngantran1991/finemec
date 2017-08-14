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