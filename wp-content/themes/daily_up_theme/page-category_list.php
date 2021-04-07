<?php get_header(); ?>
<main>
	<div class="container">
		<div class="main-column">
			<?php include('bread.php'); ?>
			<h1><?php the_title(); ?></h1>
			<section>
				<div class="container">
					<div class="row">
						<div class="col span-12">
							<?php get_search_form(); ?>
						</div>
					</div>
				</div>
			</section>
			<?php
			$categories = get_categories(array('parent' => 0)); //最上位のカテゴリーのみを取得する
			foreach ($categories as $category) :
			?>
				<section class="category_list_sec">
					<div class="row">
						<h2><?php echo $category->name; ?></h2>
						<?php
						$my_query = new WP_Query(array('cat' => $category->term_id, 'posts_per_page' => 3));
						if ($my_query->have_posts()) :
						?>
							<div class="archive-list">
								<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
									<article class="article-item">
										<a href="<?php echo the_permalink(); ?>">
											<figure>
												<?php the_post_thumbnail(); ?>
												<figcaption><?php echo the_category(); ?></figcaption>
											</figure>
											<div class="archive-item-info">
												<h2 class="arcive-title">
													<?php
													if (mb_strlen($post->post_title, 'UTF-8') > 20) {
														$title = mb_substr($post->post_title, 0, 20, 'UTF-8');
														echo $title . '……';
													} else {
														echo $post->post_title;
													}
													?>
												</h2>
												<time class="archive-item-date text-left"><?php echo get_post_time('Y.n.j(D)'); ?></time>
												<div class="archive-item-tags"><?php the_tags('', ''); ?></div>
											</div>
										</a>
									</article>
								<?php endwhile; ?>
							</div>
							<div class="row">
								<div class="more">
									<a href="<?php echo get_category_link($category->term_id); ?>">もっと見る</a>
								</div>
							</div>
					</div>
				</section>
				<?php wp_reset_postdata(); ?>
			<?php else : ?>
				<div class="list_wrap">
					<div class="row item_list mb0">
						<p>投稿はありません。</p>
					</div>
				</div>
			<?php endif; ?>
		<?php endforeach; ?>
		</div>
		<?php get_sidebar(); ?>
</main>
<?php get_footer(); ?>