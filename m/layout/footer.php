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

<div id="main_footer">
	<?=$company_contact['noidung'];?>
</div>
