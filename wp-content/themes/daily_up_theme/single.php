<?php get_header(); ?>
<main>
  <div class="container">
    <div class="main-column">
      <?php include('bread.php'); ?>
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
          <section>
            <div class="row">
              <div class="col span-12">
                <p class="single-category"><?php the_category(','); ?></p>
                <h1><?php the_title(); ?></h1>
                <time datetime="<?php echo get_post_time('Y.n.j(D)'); ?>"><?php echo get_post_time('Y.n.j(D)'); ?></time>
              </div>
            </div>
          </section>
          <section>
            <div class="row">
              <div class="col span-2">
                <div class="single-tag-list">
                  <p><?php the_tags('', ''); ?></p>
                </div>
              </div>
              <div class="col span-10">
                <div class="row">
                  <figure>
                    <?php the_post_thumbnail('full'); ?>
                  </figure>
                </div>
                <p><?php the_content('Read more'); ?></p>
              </div>
            </div>
          </section>
      <?php endwhile;
      endif; ?>
    </div>
    <?php get_sidebar(); ?>
  </div>
</main>
<?php get_footer(); ?>