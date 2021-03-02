<?php get_header(); ?>
<main>
  <?php global $wp_query;
  $total_results = $wp_query->found_posts;
  $search_query = get_search_query();
  ?>
  <div class="container">
    <div class="main-column">
      <ul class="bread-wrap row">
        <a href="<?php bloginfo('url'); ?>">HOME</a>&nbsp;>&nbsp;
        <?php echo $search_query; ?>
      </ul>
      <section>
        <div class="row">
          <div class="row archive-list">
            <?php
            if ($total_results > 0) :
              if (have_posts()) :
                while (have_posts()) : the_post();
            ?>
                  <article class="article-item col span-12">
                    <a href="<?php echo the_permalink(); ?>">
                      <figure>
                        <?php the_post_thumbnail(); ?>
                        <figcaption><?php echo the_category(); ?></figcaption>
                      </figure>
                      <div>
                        <h2 class="archive-title">
                          <?php
                          if (mb_strlen($post->post_title, 'UTF-8') > 20) {
                            $title = mb_substr($post->post_title, 0, 20, 'UTF-8');
                            echo $title . '……';
                          } else {
                            echo $post->post_title;
                          }
                          ?>
                        </h2>
                        <p><?php echo get_the_excerpt(); ?></p>
                        <time class="date text-right"><?php the_time('Y.n.j'); ?></time>
                      </div>
                    </a>
                  </article>
              <?php endwhile;
              endif;
            else : ?>
              <p class="text-center"><?php echo $search_query; ?>に一致する情報は見つかりませんでした。</p>
            <?php endif; ?>
          </div>
        </div>
      </section>
    </div>
    <?php get_sidebar(); ?>
  </div>
</main>
<?php get_footer(); ?>