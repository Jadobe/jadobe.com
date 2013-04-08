<?php global $wp_query; ?>
<?php get_header(); ?>
	<div class="main" id="the-page">
		<section>
			<div class="title-block">
				<h1><?php _e('404'); ?></h1>
				<h2><?php _e('page not found'); ?></h2>
			</div>

			<h2><?php _e('Search'); ?></h2>
			<form method="post">
				<div class="group">
					<label for="_404-title"><?php _e('Title'); ?></label>
					<input type="text" id="_404-title" name="keywords" value="<?php echo esc_attr($wp_query->query_vars['name']); ?>">
				</div>
				<div class="group chosen">
					<label for="_404-areas" onClick="$('#_404_areas_chzn .search-field input').focus();"><?php _e('Areas'); ?></label>
					<select id="_404-areas" name="area" placeholder="<?php _e('Select Areas'); ?>" multiple rel="chosen" no-results-text="<?php _e('No Areas found.'); ?>">
						<option>Algebra</option>
						<option>00-XX General</option>
						<option>00-XX History and Biography</option>
					</select>
				</div>

				<input type="submit" name="submit" value="search">
			</form>
		</section>
	</div>
<?php get_footer(); ?>