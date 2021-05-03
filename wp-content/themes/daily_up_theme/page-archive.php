<?php get_header(); ?>
<main>
  <div class="container">
    <div class="main-column">
      <?php include('bread.php'); ?>
      <h1><?php the_title(); ?></h1>
      <section>
        <div class="archive-list">
          <?php
          $args = array(
            'posts_per_page' => 9,
            'paged' => $paged,
            'orderby' => 'post_date',
            'order' => 'DESC',
            'post_type' => 'post',
            'post_status' => 'publish'
          );
          $the_query = new WP_Query($args);
          if ($the_query->have_posts()) :
            while ($the_query->have_posts()) : $the_query->the_post();
          ?>
              <article class="article-item">
                <a href="<?php echo the_permalink(); ?>">
                  <figure>
                    <?php if (has_post_thumbnail()) : ?>
                      <?php the_post_thumbnail('full', array('alt' => get_the_title())); ?>
                    <?php else : ?>
                      <img src="/daily_up/wp-content/uploads/default_thumbnail.jpg" alt="<?php echo the_title(); ?>">
                    <?php endif; ?>
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
            <?php
            endwhile; // ループの終了
          else :
            ?>
            <p>記事がありません。</p>
          <?php
          endif;
          wp_reset_postdata(); // 直前のクエリを復元する
          ?>
        </div>
        <?php
        if ($the_query->max_num_pages > 1) {
          echo '<nav class="pagination">';
          echo paginate_links(array(
            'base' => get_pagenum_link(1) . '%_%',
            'format' => '/page/%#%/',
            'current' => max(1, $paged),
            'total' => $the_query->max_num_pages,
            'prev_text' => '<',
            'next_text' => '>',
            'type'         => 'list',
            'end_size'     => 3,
            'mid_size'     => 3
          ));
          echo '</nav>';
        }
        wp_reset_postdata();
        ?>
      </section>
    </div>
    <?php get_sidebar(); ?>
  </div>
</main>
<?php get_footer(); ?>