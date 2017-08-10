<style>
	table.table_download, table.table_download td, table.table_download th {    
    	border: 1px solid #ddd;
    	text-align: left;
	}

	table.table_download {
	    border-collapse: collapse;
	    width: 100%;
	}

	table.table_download th, table.table_download td {
	    padding: 15px;
	}

	table.table_download a {
		color: #000;
		transition: 0.1s;
	}

	table.table_download a:hover {
		color: #f00;
	}
</style>

<div class="tieude_giua"><div><?=$title_cat?></div></div>
<div class="box_container">
	<table class="table_download" style="margin-top: 15px;">
		<tr>
			<th>File name</th>
			<th>Download</th>
		</tr>

		<?php foreach ($catalogue as $key => $value) { ?>
			<tr>
				<td>
					<a href="<?=_upload_tintuc_l.$value['fileup']?>"><?=$value['ten']?></a>
				</td>
				<td>
					<a href="<?=_upload_tintuc_l.$value['fileup']?>">
						<i class="fa fa-cloud-download" aria-hidden="true"></i>&nbsp;Tải xuống
					</a>
				</td>
			</tr>
		<?php } ?>
	</table>
</div><!--.box_container-->
