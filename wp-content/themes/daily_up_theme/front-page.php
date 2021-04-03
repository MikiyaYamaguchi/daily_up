<?php get_header(); ?>
<main>
  <div class="container">
    <section>
      <div class="list-wrap">
        <div class="row archive-list tile">
          <?php
          $args = array(
            'posts_per_page' => 3
          );
          $posts = get_posts($args);
          if (!empty($posts)) :
            foreach ($posts as $post) :
              setup_postdata($post);
              $title = get_the_title(); ?>
              <article class="article-item col span-4">
                <a href="<?php echo the_permalink(); ?>">
                  <figure>
                    <?php the_post_thumbnail(); ?>
                    <figcaption><?php echo the_category(); ?></figcaption>
                  </figure>
                  <div>
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
                    <time class="date text-left"><?php the_time('Y.n.j'); ?></time>
                    <div class="read pc-only">記事を読む</div>
                  </div>
                </a>
              </article>
            <?php
            endforeach;
          else :
            ?>
            <p>記事がありません。</p>
          <?php
          endif;
          wp_reset_postdata();
          ?>
        </div>
        <div class="row">
          <div class="more">
            <a href="/daily_up/archive">MORE</a>
          </div>
        </div>
      </div>
    </section>
  </div>
</main>
<?php get_footer(); ?>