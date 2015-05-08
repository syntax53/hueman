<?php $current_blog_id = asd_custom_identify_site(); ?>
<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;  ?>
<?php if (get_post_type() == 'attachment') $file_path = get_attached_file(get_the_ID()); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('group'); ?>>	
	<div class="post-inner post-hover">
		
        <?php if ( has_post_thumbnail() || ot_get_option('placeholder') != 'off' || (has_post_format('video') && !is_sticky()) || (has_post_format('audio') && !is_sticky()) || is_sticky() || get_post_type() == 'page'): ?>
        	<?php get_template_part('inc/thumbnail'); ?>
		<?php endif; ?>
        
		<h2 class="post-title">
        	<?php
				$title_prefix = '';
				$the_title = get_the_title();
				if ( get_post_type() == 'attachment' ) {
					$filetype = wp_check_filetype(pathinfo($file_path, PATHINFO_BASENAME));
					if (!empty($filetype)) { $filext = strtoupper($filetype['ext']); } else { $filext = 'File'; }
					
					if ( $current_blog_id == 'policies') {
						if (stripos($the_title, 'BOARD POLICY STATEMENT') > 0) {
							$title_prefix = '<span style="color:#A30000">Policy:</span> ';
						} elseif (stripos($the_title, 'S ADMINISTRATIVE PROCEDURE') > 0) {
							$title_prefix = '<span style="color:#0000FF">SAP:</span> ';
						} else {
							$title_prefix = $filext.': ';
						}
					} else {
						if ( $current_blog_id == 'main' && stripos($file_path, '/meeting-summary/') !== FALSE) {
							$title_prefix = 'Wednesday Morning: ';
						} else {
							$title_prefix = $filext.': ';
						}
					}
				} elseif ( $current_blog_id == 'policies') {
					$title_prefix = 'Section: ';
				} elseif ( $current_blog_id == 'main') {
					if ( get_post_type() == 'page' ) {
	                	$parent_id = $post->post_parent;
						$board_mtg = FALSE;
						while ($parent_id) {
							$page = get_post($parent_id);
							if ($page->post_title == 'Meeting Agenda and Materials') { $board_mtg = TRUE; break; }
							$parent_id  = $page->post_parent;
						}
						if ($board_mtg) $title_prefix = 'School Board Meeting: ';
					}
				}
				if (is_search()) {
					if (is_plugin_active( 'relevanssi/relevanssi.php' )) $the_title = relevanssi_highlight_terms($the_title, get_search_query());
				}
			?>
            <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php echo $title_prefix; ?><?php echo $the_title; ?></a>
		</h2><!--/.post-title-->
		
        
            <div class="post-meta group">
                <?php if ( get_post_type() == 'post' ): ?>
	                <p class="post-category"><?php the_category(' / '); ?></p>
                <?php elseif ( get_post_type() == 'attachment' ): ?>
					<?php
					$file_categories = '';
                    if (!empty($file_path) && file_exists($file_path)) {
						$base_file = pathinfo($file_path, PATHINFO_BASENAME);
						if ($current_blog_id == 'main' && stripos($file_path, '/meeting-summary/') !== FALSE /*&& substr($base_file, 0, 3) == "WM-"*/) {
							$file_categories = '<a href="http://'.$_SERVER['HTTP_HOST'].'/board-of-directors/meeting-information/meeting-summary/">Board Meeting Summaries</a>';
						} elseif ($current_blog_id == 'main' && stripos($file_path, '/Meeting-Agenda-and-Materials/') !== FALSE) {
							$dir_struct = explode('/', pathinfo($file_path, PATHINFO_DIRNAME));
							$x = 0; $mtg_date = '';
							for ($i = count($dir_struct)-1; $x < 3 && $i > 0; $i--) {
								if (!empty($mtg_date)) { $mtg_date = '-'.$mtg_date; }
								$mtg_date = $dir_struct[$i].$mtg_date;
								$x++;
							}
							if (strlen($mtg_date) == 10) {
								$file_categories = '<a href="http://'.$_SERVER['HTTP_HOST'].'/board-of-directors/meeting-information/meeting-agenda-and-materials/">Board Meeting: '.date("F jS, Y", strtotime($mtg_date)).'</a>';
							}
						}
                    }
                    
                    if ( !empty($file_categories) ): ?>
                        <p class="post-category file-category"><?php echo $file_categories; ?></p>
                    <?php endif ?>
                <?php else: ?>
                <?php
                    $parent_id  = $post->post_parent;
                    $breadcrumbs = array();
                    while ($parent_id) {
                      $page = get_page($parent_id);
                      $breadcrumbs[] = '<a href="'.get_permalink($page->ID).'" title="">'.get_the_title($page->ID).'</a>';
                      $parent_id  = $page->post_parent;
                    }
                    if (!empty($breadcrumbs)) {
						$breadcrumbs = array_reverse($breadcrumbs);
						while (count($breadcrumbs) > 2) { array_shift($breadcrumbs); }
						$catecho = implode(htmlspecialchars(' > '), $breadcrumbs);
						?>
                        	<p class="post-category"><?php echo $catecho; ?></p>
                        <?php
					}
				?>
               	<?php endif ?>
                <?php if ( get_post_type() != 'page' && ($current_blog_id != 'policies' || get_post_type() != 'attachment') ): ?>
                    <p class="post-date"><?php if (get_post_type() == 'attachment') { echo 'Posted: '; } the_time(get_option('date_format')); ?></p>
				<?php endif; ?>
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
				
				if ($current_blog_id == 'main' && is_home() && $paged == 1) {
					echo asd_limit_words($excerpt, 25);
				} else {
					echo asd_limit_words($excerpt, $excerpt_max_length);
				}
			?>
		</div><!--/.entry-->
		<?php endif; ?>
		
	</div><!--/.post-inner-->	
</article><!--/.post-->	