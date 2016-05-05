<?php
/**
 * @package WordPress
 * @subpackage CoreDial Intranet
 */

/*
Template Name: Page - Blue Bell Store
*/

	$page_cat_id = 20;
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

	get_header();

?>
<div id="content">
	<div class="container">
		<div class="row">
			<!-- left penel -->
			<div class="col-lg-9">
				<!-- posts -->
				<div class="posts">
<div id="content" class="narrowcolumn">
<?php
	if (have_posts()) : while (have_posts()) : the_post();
?>
     <div class="post" id="post-<?php the_ID(); ?>">
      <h2><?php the_title(); ?></h2>
      <div class="entry">
<?php
		the_content('<p class="serif">Read the rest of this page &raquo;</p>');
		wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number'));
?>
      </div>
     </div>
<?php
	endwhile; endif;
	query_posts("cat=$page_cat_id&paged=$paged");
	include_once("page_include.php");
?>
     </div>
				</div>
				<!-- /posts -->
			</div>
			<!-- /left panel -->

			<!-- right panel -->
			<div class="col-lg-3">
<?php 	get_sidebar(); ?>
				</div>
			</div>
			<!-- /right panel -->
		</div>
	</div>
</div>
<?php
	get_footer();

