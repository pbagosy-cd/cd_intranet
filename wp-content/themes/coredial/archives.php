<?php
/**
 * @package WordPress
 * @subpackage CoreDial Intranet
 */
/*
Template Name: Archives
*/
	get_header();
	get_sidebar();
?>
    <div id="content" class="narrowcolumn">
<?php get_search_form(); ?>
     <h2>Archives by Month:</h2>
     <ul>
<?php wp_get_archives('type=monthly'); ?>
     </ul>
     <h2>Archives by Subject:</h2>
     <ul>
<?php wp_list_categories(); ?>
     </ul>
    </div>
<?php get_footer(); ?>
