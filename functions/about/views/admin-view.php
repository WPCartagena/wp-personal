<style type="text/css">
	/* Temporary CSS - NUKE ME WHEN READY */
	.cf-about-wrap input,
	.cf-about-wrap textarea,
	.cf-about-wrap label {
		float: left;
		display: block;
	}
	label {
		width: 200px;
	}
	.cf-clearfix {
		clear: both;
	}
	.cf-about-wrap fieldset,
	.cf-about-wrap p.submit {
		border-top: 1px solid gray;
		margin: 15px 0;
		padding: 15px 0;
	}
</style>
<div class="wrap cf-about-wrap cf-clearfix">
	<h2><?php _e('About', 'carrington-personal'); ?></h2>
	<p>This page likely throws php notices at the moment. Please ignore for now.</p>
	<form id="cfcp-about-settings" name="cfcp-about-settings" action="options.php" method="post">

		<?php settings_fields(CFCP_ABOUT_SETTINGS); ?>

		<fieldset>
			<p>We're temporarily taking a comma separated input of image ids. UI &amp; interaction TBD.</p>
			<div>
				<label for="cfcp_about_images"><?php _e('Images', 'carrington-personal'); ?></label>
				<input size="50" type="text" name="<?php echo CFCP_ABOUT_SETTINGS; ?>[images]" id="cfcp_settings_images" value="<?php echo (is_array($settings['images']) ? implode(', ', $settings['images']) : ''); ?>" />
			</div>
		</fieldset>

		<fieldset>
			<div class="cf-clearfix">
				<label for="cfcp_about_title"><?php _e('Title', 'carrington-personal'); ?></label>
				<input size="50" type="text" name="<?php echo CFCP_ABOUT_SETTINGS; ?>[title]" id="cfcp_settings_title" value="<?php echo esc_attr($settings['title']); ?>" />
			</div>
		
			<div class="cf-clearfix">
				<label for="cfcp_about_description"><?php _e('Description', 'carrington-personal'); ?></label>
				<textarea cols="50" rows="10" name="<?php echo CFCP_ABOUT_SETTINGS; ?>[description]" id="cfcp_settings_description"><?php echo esc_attr($settings['description']); ?></textarea>
			</div>
		</fieldset>
		
		<h3>Links</h3>
		<fieldset>
			<p>We're temporarily only taking 2 link inputs here. UI &amp; interaction TBD.</p>
			<p>Favicon fetching is active and favicons are saved to: <code><?php echo esc_html(CFCP_FAVICON_DIR); ?></code></p>
			<?php
				for ($i = 0; $i < 2; $i++) {
					echo '
						<fieldset>
							<div class="cf-clearfix">
								<label for="cfcp_about_links_title_'.$i.'">'.__('Link Title', 'carrington-personal').'</label>
								<input size="50" id="cfcp_about_links_title_'.$i.'" type="text" name="'.CFCP_ABOUT_SETTINGS.'[links]['.$i.'][title]" value="'.esc_attr($settings['links'][$i]['title']).'" />
								<br  class="cf-clearfix">
								<label for="cfcp_about_links_url_'.$i.'">'.__('Link Url', 'carrington-personal').'</label>
								<input size="50" id="cfcp_about_links_url_'.$i.'"type="text" name="'.CFCP_ABOUT_SETTINGS.'[links]['.$i.'][url]" value="'.esc_attr($settings['links'][$i]['url']).'" />';
					if (!empty($settings['links'][$i]['favicon'])) {
						echo '<img src="'.cf_about_favicon_url($settings['links'][$i]['favicon']).'" width="16" height="16" style="margin-left: -22px; margin-top: 5px;" />';
					}					
					echo '
								<input type="hidden" name="'.CFCP_ABOUT_SETTINGS.'[links]['.$i.'][favicon]" value="'.$settings['links'][$i]['favicon'].'" />
							</div>
						</fieldset>';						
				}
			?>

		</fieldset>
								
		<p class="submit"><input class="button button-primary" type="submit" name="submit" value="<?php _e('Save Settings', 'carrington-personal'); ?>" /></p>
	</form>
</div><!-- / cf-about-wrap -->