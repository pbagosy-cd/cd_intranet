<?php if (have_posts()) : ?>
<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
					<div class="navigation clearfix">
						<span class="fl"><?php next_posts_link('&laquo; Older Entries') ?></span>
						<span class="fr"><?php previous_posts_link('Newer Entries &raquo;') ?></span>
					</div>
<?php while (have_posts()) : the_post(); ?>
					<section class="post">
						<h2><?php the_title(); ?></h2>
						<section class="category-links row">
							<div class="col-lg-8">
<?php the_category(' | ') ?>
							</div>
							<div class="col-lg-4 text-right"><?php if( function_exists('ADDTOANY_SHARE_SAVE_KIT') ) { ADDTOANY_SHARE_SAVE_KIT(); } ?></div>
						</section>
<?php the_content() ?>
					</section>
<?php endwhile; ?>
					<div class="navigation clearfix">
						<span class="fl"><?php next_posts_link('&laquo; Older Entries') ?></span>
						<span class="fr"><?php previous_posts_link('Newer Entries &raquo;') ?></span>
					</div>
<?php endif; ?>