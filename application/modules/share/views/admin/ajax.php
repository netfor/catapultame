<?php
/**
 * @author tshirtecommerce - www.tshirtecommerce.com
 * @date: 2015-01-10
 * 
 * @copyright  Copyright (C) 2015 tshirtecommerce.com. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 *
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

?>
<div class="col-md-12">
	<table class="table table-bordered table-hover" id="sample-table-1">
		<thead>
			<tr>
				<th class="center" style="width: 10%;"><?php echo lang('share_list_id_title'); ?></th>
				<th class="center" style="width: 50%;"><?php echo lang('share_list_module_name_title'); ?></th>
				<th class="center" style="width: 30%;"><?php echo lang('share_list_key_title'); ?></th>							
				<th class="center" style="width: 10%;"><?php echo lang('share_list_option_title'); ?></th>
			</tr>
		</thead>
		<tbody>
			
			<?php 
				if(count($shares) > 0)
				{
					foreach($shares as $share){?>
					<tr>
						<td class="center"><?php echo $share->id; ?></td>
						<td>
							<a title="Click to choose this module" href="javascript:void(0)" onclick="grid.module.insert('share', 'index', <?php echo $share->id; ?>, '<?php echo $share->key; ?>', '<?php echo $share->title; ?>')">
								<?php echo $share->title; ?>
							</a>
						</td>
						<td><?php echo $share->key; ?></td>
						<td class="center"><i class="fa fa-pencil-square-o" onclick="grid.module.setting('share', <?php echo $share->id; ?>)" style="cursor: pointer;"></i><span class="page_ajax"><a href="<?php echo site_url().'share/admin/setting/remove/'.$share->id;?>"><i class="glyphicon glyphicon-remove" style="margin-left: 5px; color: #D9534F;"></i></span></td>
					</tr>
				<?php } ?>
			<?php } ?>
			
		</tbody>
	</table>
	<div class="row col-md-12">
		<div class="pull-right page_ajax">
			<?php echo $links; ?>
		</div>
	</div>
</div>
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery(".page_ajax a").click(function(){
			var url = jQuery(this).attr("href");
			var check = true;
			if(url.indexOf('remove') > 0)
			{
				check = confirm('You want remove. Are you sure?');
			}
			
			if(check)
			{
				if(url != '')
				{
					jQuery.ajax({
							type: "POST",
							url: url,
							data: {"type":"ajax"},
							async: true,
							beforeSend: function(){
									jQuery("#content_popup").html("");
							},
							success: function(kq){
									jQuery("#content_popup").html(kq);
							}
					});
				}
			}
			return false;
		});
	})
</script>