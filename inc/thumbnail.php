<?php $current_blog_id = asd_custom_identify_site(); ?>
<?php if (get_post_type() == 'attachment') $file_path = get_attached_file(get_the_ID()); ?>

	<div class="post-thumbnail">
        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
            <?php if ( has_post_thumbnail() ): ?>
            	<?php if ( get_query_var( 'is_featured_thumbnail', false ) ): ?>
                	<?php the_post_thumbnail('thumb-large'); ?>
                <?php else: ?>
					<?php the_post_thumbnail('thumb-medium'); ?>
            	<?php endif; ?>
            <?php elseif (get_post_type() == 'attachment'): ?>
                <?php if (stripos($file_path, '/meeting-summary/') !== FALSE && $current_blog_id == 'main'): ?>
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/weds-morning.png" alt="<?php the_title(); ?>" />
                <?php else: ?>
                    <?php $img = array(); $img = wp_get_attachment_image_src(get_the_ID(), 'thumbnail', TRUE); ?>
                    <?php if (!empty($img)): ?>
                        <img src="<?php echo $img[0]; ?>" width="<?php echo $img[1]; ?>" height="<?php echo $img[2]; ?>" alt="<?php the_title(); ?>" />
                    <?php else: ?>
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/thumb-page.png" alt="<?php the_title(); ?>" />
                    <?php endif; ?>
                <?php endif; ?>
            <?php elseif ( ot_get_option('placeholder') != 'off' ): ?>
                <?php if ( (has_category( 54 )  && $current_blog_id == 'main') || (has_category( 'news' ) && $current_blog_id != 'main') ): ?>
                	<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/news.png" alt="<?php the_title(); ?>" />
                <?php elseif ( has_category( 'information' ) ): ?>
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/Information.png" alt="<?php the_title(); ?>" />
                <?php else: ?>
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/thumb-medium-220x104.png" alt="<?php the_title(); ?>" />
                <?php endif; ?>
            <?php endif; ?>
            <?php if ( has_post_format('video') && !is_sticky() ) echo'<span class="thumb-icon"><i class="fa fa-play"></i></span>'; ?>
            <?php if ( has_post_format('audio') && !is_sticky() ) echo'<span class="thumb-icon"><i class="fa fa-volume-up"></i></span>'; ?>
            
            <?php if ( is_sticky() ) echo'<span class="thumb-icon"><i class="fa fa-star"></i></span>'; ?>
        </a>
        <?php if ( comments_open() && ( ot_get_option( 'comment-count' ) != 'off' ) ): ?>
            <a class="post-comments" href="<?php comments_link(); ?>"><span><i class="fa fa-comments-o"></i><?php comments_number( '0', '1', '%' ); ?></span></a>
        <?php endif; ?>
    </div><!--/.post-thumbnail-->