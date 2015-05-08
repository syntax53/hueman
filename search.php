<?php get_header(); ?>

<section class="content">

	<?php get_template_part('inc/page-title'); ?>
	
	<div class="pad group">
		
		<div class="notebox">
			<?php _e('For the term','hueman'); ?> "<span><?php echo get_search_query(); ?></span>".
			<?php if ( !have_posts() ): ?>
				<?php _e('Please try another search:','hueman'); ?>
			<?php endif; ?>
            <?php $q = get_search_query(); if (asd_custom_identify_site() == 'main' && (stripos($q, 'policy') !== FALSE || stripos($q, 'policies') !== FALSE)): ?>
            	<div style="font-size:1.0em; font-style:italic; margin:5px 0 0 0; color:#C30003;">If you are looking for board policies and/or administrative procedures, <a href="/policies/">click here</a>.</div>
	        <?php endif; ?>
			<div class="search-again">
				<?php get_search_form(); ?>
			</div>
		</div>
        
        
		<?php if ( have_posts() ) : ?>
		
			<div class="post-list group">
				<?php $i = 1; echo '<div class="post-row">'; while ( have_posts() ): the_post(); ?>
				<?php get_template_part('content'); ?>
				<?php if($i % 3 == 0) { echo '</div><div class="post-row">'; } $i++; endwhile; echo '</div>'; ?>
			</div><!--/.post-list-->
		
			<?php get_template_part('inc/pagination'); ?>
			
		<?php endif; ?>
		
	</div><!--/.pad-->
	
</section><!--/.content-->

<?php get_sidebar(); ?>
	
<?php get_footer(); ?>