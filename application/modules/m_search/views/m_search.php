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

$lang = getLanguages();

	echo $css;
	$options = json_decode($search->options);
?>
<div class="module-search <?php if(isset($options->class_sfx) && $options->class_sfx != '') echo $options->class_sfx; ?>">
	<form action="<?php echo site_url('search');?>" method="GET">
		<?php 
			if(isset($options->display) && $options->display == 'input')
			{
		?>
			<div class="form-group has-feedback">
				<input type="text" name="keyword" class="form-control <?php if(isset($options->size)) echo $options->size;?>" placeholder="<?php echo language('search_btn', $lang); ?>" />
				<span class="glyphicon glyphicon-search form-control-feedback <?php if(isset($options->size) && $options->size == 'input-lg') echo 'feedback-lg'; elseif(isset($options->size) && $options->size == 'input-sm') echo 'feedback-sm';?>" aria-hidden="true"></span>
			</div>
		<?php 
			}elseif(isset($options->display) && $options->display == 'icon')
			{
		?>
			<div class="form-group has-feedback" style="display: table; width: 100%;">
				<input type="text" name="keyword" class="form-control <?php if(isset($options->size)) echo $options->size;?> feedback-input" placeholder="<?php echo language('search_btn', $lang); ?>" style="float: right; width: 0px; opacity: 0; padding: 0px;"/>
				<span class="feedback-icon-only glyphicon glyphicon-search form-control-feedback <?php if(isset($options->size) && $options->size == 'input-lg') echo 'feedback-lg'; elseif(isset($options->size) && $options->size == 'input-sm') echo 'feedback-sm';?>" aria-hidden="true"></span>
			</div>
		<?php
			}else
			{
		?>
			<div class="input-group">
				<input type="text" name="keyword" class="form-control <?php if(isset($options->size)) echo $options->size;?>" placeholder="<?php echo language('search_btn', $lang); ?>"/>
				<span class="input-group-btn">	
					<button type="submit" class="btn btn-primary <?php if(isset($options->size) && $options->size == 'input-lg') echo $options->size; elseif(isset($options->size) && $options->size == 'input-sm') echo 'btn-sm';?>"><?php echo language('search_btn', $lang);?></button>
				</span>
			</div>
		<?php 
			} 
		?>
	</form>
</div>
<script type="text/javascript">
	var state = true;
	jQuery('.feedback-icon-only').click(function(){
		var elm = jQuery(this).parent('.has-feedback').children('input');
		if ( state ) {
			elm.animate({
			  width: 100+'%',
			  opacity: 1,
			  padding: '6px 42.5px 6px 12px',
			}, 700 );
			elm.focus();
		} else {
			elm.animate({			  
			  width: 0,
			  opacity: 0,
			  padding: 0,
			}, 700 );
		}
		state = !state;
	});
</script>