<div id="search">
	<form role="search" action="<?php bloginfo('url'); ?>" method="get" id="searchform" class="searchform">
		<div class="search-wrap">
			<input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="キーワード検索" />
			<?php
			$args = array(
				'show_option_all'   => 'カテゴリー選択',
				'echo'               => 1,
				'selected'           => 0,
			);
			wp_dropdown_categories($args);
			?>
			<?php $tags = get_tags();
			if ($tags) : ?>
				<select name='tag' id='tag'>
					<option value="" selected="selected">タグ選択</option>
					<?php foreach ($tags as $tag) : ?>
						<option value="<?php echo esc_html($tag->slug);  ?>"><?php echo esc_html($tag->name); ?></option>
					<?php endforeach; ?>
				</select>
			<?php endif; ?>
			<input type="submit" id="searchsubmit" value="検索" />
		</div>
	</form>
</div>