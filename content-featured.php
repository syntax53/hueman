<article id="post-<?php the_ID(); ?>" <?php post_class('group'); ?>>	
	<div class="post-inner post-hover">
		
        <?php
        	set_query_var( 'is_featured_thumbnail', true );
			get_template_part('inc/thumbnail');
		?>
		
		<h2 class="post-title">
			<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a>
		</h2><!--/.post-title-->
		
		<?php if (ot_get_option('excerpt-length') != '0'): ?>
		<div class="entry excerpt">				
			<?php echo strip_tags(asd_custom_excerpt_length(35)); /*the_excerpt();*/ ?>
		</div><!--/.entry-->
		<?php endif; ?>
		
	</div><!--/.post-inner-->	
</article><!--/.post-->	