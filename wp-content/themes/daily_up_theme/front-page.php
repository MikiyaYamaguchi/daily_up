<?php get_header(); ?>
<main>
  <div class="container">
    <div class="main-column">
      <section>
        <h2>New Post</h2>
        <div class="list-wrap">
          <div class="row archive-list">
            <?php
            $args = array(
              'posts_per_page' => 3 // 表示件数の指定
            );
            $posts = get_posts($args);
            if (!empty($posts)) :
              foreach ($posts as $post) : // ループの開始
                setup_postdata($post); // 記事データの取得
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
              endforeach; // ループの終了
            else :
              ?>
              <p>記事がありません。</p>
            <?php
            endif;
            wp_reset_postdata(); // 直前のクエリを復元する
            ?>
          </div>
          <div class="row">
            <div class="more">
              <a href="/daily_up/archive">MORE</a>
            </div>
          </div>
        </div>
      </section>
      <section>
        <div class="row">
          <?php
          $categories = get_categories(array('parent' => 0)); //最上位のカテゴリーのみを取得する
          foreach ($categories as $category) :
          ?>
            <section>
              <h2><?php echo $category->name; ?></h2>
              <?php
              $my_query = new WP_Query(array('cat' => $category->term_id, 'posts_per_page' => 3));
              if ($my_query->have_posts()) :
              ?>
                <div class="list-wrap top-category-list">
                  <div class="row item-list">
                    <?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
                      <article class="article-item col span-4">
                        <a href="<?php echo the_permalink(); ?>">
                          <figure>
                            <a href="<?php echo the_permalink(); ?>">
                              <?php the_post_thumbnail(); ?>
                            </a>
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
                            <time class="date text-left"><?php the_time('Y.n.j'); ?></time>
                            <div class="read pc-only">記事を読む</div>
                          </div>
                        </a>
                      </article>
                    <?php endwhile; ?>
                  </div>
                  <div class="row">
                    <div class="more">
                      <a href="<?php echo get_category_link($category->term_id); ?>">MORE</a>
                    </div>
                  </div>
                </div>
                <?php wp_reset_postdata(); ?>
              <?php else : ?>
                <div class="list-wrap">
                  <div class="row item-list mb0">
                    <p>投稿はありません。</p>
                  </div>
                </div>
              <?php endif; ?>
            </section>
          <?php endforeach; ?>
        </div>
      </section>
    </div>
    <?php get_sidebar(); ?>
  </div>
</main>
<?php get_footer(); ?>