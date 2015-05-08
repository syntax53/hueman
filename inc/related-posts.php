<?php if (get_post_type() == 'attachment') $file_path = get_attached_file(get_the_ID()); ?>

<?php $related = alx_related_posts(); ?>

<?php if ( $related->have_posts() ): ?>

<h4 class="heading">
	<i class="fa fa-hand-o-right"></i><?php _e('Articles you may have missed...','hueman'); ?>
</h4>

<ul class="related-posts group">
	
	<?php while ( $related->have_posts() ) : $related->the_post(); ?>
	<li class="related post-hover">
		<article <?php post_class(); ?>>

			<?php get_template_part('inc/thumbnail'); ?>
			
			<div class="related-inner">
				
				<h4 class="post-title">
					<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a>
				</h4><!--/.post-title-->
				
				<div class="post-meta group">
					<p class="post-date"><?php the_time(get_option('date_format')); ?></p>
				</div><!--/.post-meta-->
			
                <?php $excerpt_max_length = ot_get_option('excerpt-length'); if ($excerpt_max_length != '0'): ?>
                <div class="entry excerpt">
                    <?php
                        if (!is_search() && get_post_type() == 'attachment') {
                            $excerpt = trim(get_post_meta( get_the_ID(), 'pdf_indexer_contents', true ));
                            if (empty($excerpt)) $excerpt = trim(get_the_excerpt());
                        } else {
                            $excerpt = trim(get_the_excerpt());	
                        }
                        if (strlen(str_ireplace(array('&nbsp;', ' '),'', $excerpt)) == 0) {
                            $excerpt = asd_custom_excerpt_length();
                        }
                        $excerpt = preg_replace('/([^0-9a-zA-Z\\/])\1+|(?:=[*])+|(?:->)+/', '$1', $excerpt); //remove repeating non-alph chars
                        
                        echo asd_limit_words($excerpt, 25);
                    ?>
                </div><!--/.entry-->
                <?php endif; ?>
			</div><!--/.related-inner-->

		</article>
	</li><!--/.related-->
	<?php endwhile; ?>
	<?php wp_reset_postdata(); ?>

</ul><!--/.post-related-->
<?php endif; ?>

<?php wp_reset_query(); ?>
