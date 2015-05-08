<?php get_header(); ?>
<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;  ?>
<section class="content">

	<?php get_template_part('inc/page-title'); ?>
	
	<div class="pad group">
		
		<?php get_template_part('inc/featured'); ?>
		
        <?php if ($paged == 1): ?>
			<?php $args = array ( 'category_name' => 'announcements' ); $announce_query = new WP_Query( $args ); ?>	
            <?php if ( $announce_query->have_posts() ): ?>
                    <div class="announce"><h1 class="announce">Announcements</h1><ul class="announce">
                    <?php while ( $announce_query->have_posts() ): $announce_query->the_post(); ?>
                        <li><span class="announce-date">Posted <?php the_time('M jS'); ?>:</span> 
                            <?php $meta = get_post_custom($post->ID); ?>
                            <?php if ( has_post_format( 'link' ) && isset($meta['_link_url'][0]) ): ?>
                                    <a class="announce" href="<?php echo $meta['_link_url'][0]; ?>" rel="bookmark" title="<?php echo (isset($meta['_link_title'][0])?$meta['_link_title'][0]:get_the_title()); ?>"><?php the_title(); ?></a> 
                            <?php else: ?>
                                    <a class="announce" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a> 
                            <?php endif; ?>
                            <?php if (ot_get_option('excerpt-length') != '0'): ?>
                                <br><span class="announce-excerpt"><?php echo asd_custom_excerpt_length(200); ?></span>
                            <?php endif; ?>
                        </li>
                    <?php endwhile; ?>
                    </ul></div>
            <?php endif; wp_reset_query(); ?>
        <?php endif; ?>

		<?php if ( have_posts() ) : ?>
				<div class="post-list group">
				<?php if ($paged == 1): ?>
                	<div class="recent_heading"><h2 class="recent_heading">Recent Postings</h2></div>
                <?php endif; ?>
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