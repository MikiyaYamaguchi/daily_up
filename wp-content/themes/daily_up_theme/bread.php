<ul class="bread-wrap row">
	<a href="<?php bloginfo('url'); ?>">HOME</a>
	&nbsp;>&nbsp;
	<?php if (is_category()) : ?>
		<?php $cat = get_the_category();
		echo get_category_parents($cat[0], true, '&nbsp;'); ?>
	<?php elseif (is_tag()) : ?>
		<?php $cat = get_the_tags();
		echo single_tag_title(); ?>
	<?php elseif (is_single()) : ?>
		<?php $cat = get_the_category();
		echo get_category_parents($cat[0], true, '&nbsp;>&nbsp;'); ?>
		<?php the_title(''); ?>
	<?php elseif (is_search()) : ?>
		<?php
		$search_query = get_search_query();
		?>
		<?php echo $search_query; ?>
	<?php else : ?>
		<?php single_post_title(); ?>
	<?php endif; ?>
</ul>