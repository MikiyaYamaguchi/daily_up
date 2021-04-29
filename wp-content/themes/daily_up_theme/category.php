<?php get_header(); ?>
<main>
	<div class="container">
		<div class="main-column">
			<?php include('bread.php'); ?>
			<h1><?php single_cat_title(); ?></h1>
			<section>
				<div class="archive-list">
					<?php if (have_posts()) : ?>
						<?php while (have_posts()) : the_post(); ?>
							<article class="article-item">
								<a href="<?php echo the_permalink(); ?>">
									　<figure>
										<a href="<?php echo the_permalink(); ?>">
											<?php if (has_post_thumbnail()) : ?>
												<?php the_post_thumbnail('full', array('alt' => get_the_title())); ?>
											<?php else : ?>
												<img src="/daily_up/wp-content/uploads/default_thumbnail.jpg" alt="<?php echo the_title(); ?>">
											<?php endif; ?>
											<figcaption><?php echo the_category(); ?></figcaption>
										</a>
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
					<?php else : ?>
						<!--投稿が見つからない-->
						<p>記事がありません。</p>
						<!--//投稿が見つからない-->
					<?php endif; ?>
				</div>
				<?php if (function_exists("the_pagination")) the_pagination(); ?>
			</section>
		</div>
		<?php get_sidebar(); ?>
	</div>
</main>
<?php get_footer(); ?>