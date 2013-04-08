<?php /* Template Name: Create */ ?>
<?php get_header(); ?>
	<div class="main" id="the-page">
		<section>
			<div class="title-block">
				<h1><?php _e('Create'); ?></h1>
				<h2><?php _e('workbooks for yourself or others'); ?></h2>
			</div>

			<form method="post">
				<div class="group">
					<label for="create-title"><?php _e('Title'); ?></label>
					<input type="text" id="create-title" name="title" value="<?php _e('Untitled Workbook'); ?>">
				</div>

				<div class="group chosen">
					<label for="create-areas" onClick="$('#create_areas_chzn .search-field input').focus();"><?php _e('Areas'); ?></label>
					<select id="create-areas" name="area" placeholder="<?php _e('Select Areas'); ?>" multiple rel="chosen" no-results-text="<?php _e('No Areas found.'); ?>">
						<option>Algebra</option>
						<option>00-XX General</option>
						<option>00-XX History and Biography</option>
					</select>
				</div>

				<hr>

				<div class="group">
					<label><?php _e('Problem Preview'); ?></label>
					<div rel="preview"></div>
				</div>

				<div class="group">
					<label for="create-preview"><?php _e('New Problem'); ?></label>
					<textarea name="" id="" cols="30" rows="10"></textarea>
					<small class="pull-right">enter markdown and either LaTex or AsciiMathML</small>
				</div>

				<input type="submit" name="add_problem" value="<?php _e('Add Problem'); ?>">
			</form>
		</section>
	</div>
<?php get_footer(); ?>