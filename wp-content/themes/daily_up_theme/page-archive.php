<?php get_header(); ?>
<main>
  <div class="container">
    <div class="main-column">
      <ul class="bread-wrap row">
        <a href="<?php bloginfo('url'); ?>">HOME</a>&nbsp;>&nbsp;
        <?php single_post_title(); ?>
      </ul>
      <h1>New Post</h1>
      <section>
        <div class="archive-list">
          <?php
          $args = array(
            'posts_per_page' => 10,
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
      </section>
    </div>
    <?php get_sidebar(); ?>
  </div>
</main>
<?php get_footer(); ?>