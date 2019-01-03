<?php
/**
 * Template Name: Blog Layout
 *
 * Description: Custom temaplte to display desired post on page with pagination
 */
get_header();
?>


<div class="right-gif">
		<?php

if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('resources-search-area')):
endif; ?>
	</div>


	<div class="wrap">
		<?php
global $paged;
$curpage = $paged ? $paged : 1;
$args = array(
	'orderby' => 'post_date',
	'posts_per_page' => 27,
	'paged' => $paged
);
$query = new WP_Query($args);

if ($query->have_posts()):
	while ($query->have_posts()):
		$query->the_post();
?>




		<div id="post-<?php
		the_ID(); ?>" class="quote">
			<?php
		echo '<a class="image-bison" href="' . get_permalink() . '">';

		//	echo get_the_post_thumbnail($post->ID, array( 350, 230, $crop) );

		echo get_the_post_thumbnail($post_id, 'large', 'style=height:230px;width: 350px;');
		echo '</a>';
		echo '<a class="more-link" href="' . get_permalink() . '"><h2>' . get_the_title() . '</h2></a>';
		the_excerpt();
?>
		</div>

		<?php
	endwhile;
	echo '
    <div id="wp_pagination">
		<!--a class="first page button" href="' . get_pagenum_link(1) . '">&laquo;</a-->
        <a rel="prev" class="previous page button" href="' . get_pagenum_link(($curpage - 1 > 0 ? $curpage - 1 : 1)) . '">&lsaquo;</a>';
	for ($i = 1; $i <= $query->max_num_pages; $i++) echo '<a class="' . ($i == $curpage ? 'active ' : '') . 'page button" href="' . get_pagenum_link($i) . '">' . $i . '</a>';
	echo '
        <a rel="next" class="next page button" href="' . get_pagenum_link(($curpage + 1 <= $query->max_num_pages ? $curpage + 1 : $query->max_num_pages)) . '">&rsaquo;</a>
        <!--a class="last page button" href="' . get_pagenum_link($query->max_num_pages) . '">&raquo;</a-->
    </div>
    ';
	wp_reset_postdata();
endif;
?>
	</div>




</div> <!-- #content -->


<script>
	( function ( $ ) {
		$( "#searchform input" ).attr( 'placeholder', 'Start typing any keyword...' );
	} )( jQuery );
</script>


<?php
get_footer(); ?>
