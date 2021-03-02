<?php get_header(); ?>
<main>
  <div class="container">
    <div class="main-column">
      <div class="main-column">
        <ul class="bread-wrap">
          <a href="<?php bloginfo('url'); ?>">HOME</a>&nbsp;>&nbsp;
          <?php $cat = get_the_category();
          echo get_category_parents($cat[0], true, '&nbsp;'); ?>
        </ul>
        <section>
          <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
              <div class="row">
                <p class="single-category-list"><?php the_category(','); ?></p>
                <div class="single-tag-list">
                  <p><?php the_tags('', ' ', '<br />'); ?></p>
                </div>
                <h1><?php the_title(); ?></h1>
                <time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y.m.d'); ?></time>
                <div class="row">
                  <figure>
                    <?php the_post_thumbnail('full'); ?>
                  </figure>
                </div>
                <p><?php the_content('Read more'); ?></p>
                <div class="next-prev-btns">
                  <?php previous_post_link('%link', '＜%title'); ?>
                  <?php next_post_link('%link', '%title＞'); ?>
                </div>
              </div>
          <?php endwhile;
          endif; ?>
        </section>
      </div>
      <?php get_sidebar(); ?>
</main>
<?php get_footer(); ?>