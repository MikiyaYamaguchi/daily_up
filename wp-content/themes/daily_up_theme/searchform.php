<div id="search">
	<form role="search" action="<?php bloginfo('url'); ?>" method="get" id="searchform" class="searchform">
		<div class="search-wrap">
			<input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="キーワード検索" />
			<input type="submit" id="searchsubmit" value="" />
		</div>
	</form>
</div>