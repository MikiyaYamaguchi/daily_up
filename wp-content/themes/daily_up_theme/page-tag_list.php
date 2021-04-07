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
			<section>
				<div class="container">
					<div class="row">
						<div class="col span_12">
							<div class="tag-list-wrap">
								<ul>
									<?php
									$args = array(
										'orderby' => 'count',
										'order' => 'DESC',
									);
									$posttags = get_tags($args);
									if (!empty($posttags)) :
										foreach ($posttags as $tag) : ?>
											<li>
												<a href='<?php echo get_tag_link($tag->term_id); ?>'>#<?php echo $tag->name ?></a>
											</li>
										<?php
										endforeach;
									else :
										?>
										<p>タグなし</p>
									<?php endif; ?>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
		<?php get_sidebar(); ?>
	</div>
</main>
<?php get_footer(); ?>