<?php get_header(); ?>
<main>
  <div class="container">
    <div class="main_column">
      <section>
        <h2>New Post</h2>
        <div class="list_wrap">
          <div class="row item_list mb0 tile">
          <?php
          $args = array(
            'posts_per_page' => 3 // 表示件数の指定
          );
               $posts = get_posts( $args );
               if( !empty( $posts ) ) :
               foreach ( $posts as $post ): // ループの開始
               setup_postdata( $post ); // 記事データの取得
               $title = get_the_title(); ?>
            <article class="article_item col span_4">
              <a href="<?php echo the_permalink(); ?>">
                <figure>
                  <?php the_post_thumbnail(); ?>
                  <figcaption><?php echo the_category(); ?></figcaption>
                </figure>
                <div>
                  <h2 class="ttl">
                    <?php
                    if(mb_strlen($post->post_title, 'UTF-8')>20){
                    	$title= mb_substr($post->post_title, 0, 20, 'UTF-8');
                    	echo $title.'……';
                    }else{
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
      else:
        ?>
        <p>記事がありません。</p>
        <?php
      endif;
        wp_reset_postdata(); // 直前のクエリを復元する
      ?>
      </div>
      <div class="row">
        <div class="more">
          <a href="/archive">MORE</a>
        </div>
      </div>
        </div>
  </section>
    <section>
      <h2>Ranking</h2>
      <div class="list_wrap">
        <div class="row item_list mb0 tile">
          <?php
              $custom_key = 'custom_popular_ranking';
              $args = array(
                  'cat' => $cat_common_id,
                  'posts_per_page'=>3,
                  'meta_key'=>$custom_key,
                  'orderby'=>'meta_value_num',
                  'order'=>'DESC'
              );
              $my_query = new WP_Query($args);
              $ranking_counter = 0;
          ?>
          <?php if( $my_query -> have_posts() ) :?>
          <?php while($my_query -> have_posts()) : $my_query -> the_post();?>
          <?php
              $category = get_the_category();
              $category_slug = $category[0]->slug;
              $category_name = $category[0]->cat_name;
              $thumbnail_id = get_post_thumbnail_id();
              $eye_img = wp_get_attachment_image_src($thumbnail_id,'medium');
              $popular_ranking_cnt = get_post_meta($post->ID, $custom_key, true);
              $ranking_counter++;
          ?>
              <article class="article_item col span_4 ranking_list">
                <a href="<?php echo the_permalink(); ?>">
                  <figure>
                    <?php the_post_thumbnail(); ?>
                    <figcaption><?php echo the_category(); ?></figcaption>
                  </figure>
                  <div>
                    <h2 class="ttl">
                      <?php
                      if(mb_strlen($post->post_title, 'UTF-8')>20){
                      	$title= mb_substr($post->post_title, 0, 20, 'UTF-8');
                      	echo $title.'……';
                      }else{
                      	echo $post->post_title;
                      }
                      ?>
                    </h2>
                    <time class="date text-left"><?php the_time('Y.n.j'); ?></time>
                    <div class="read pc-only">記事を読む</div>
                  </div>
                </a>
              </article>
            <?php endwhile;?>
          <?php else:?>
          <p>記事がありません。</p>
        <?php endif; ?>
        </div>
        <div class="row">
          <div class="more">
            <a href="/ranking">MORE</a>
          </div>
        </div>
      </div>
    </section>
    <section>
      <h2>スポンサー</h2>
      <div class="list_wrap">
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- DailyUpトップページ広告 -->
        <ins class="adsbygoogle"
             style="display:block"
             data-ad-client="ca-pub-2725422849471150"
             data-ad-slot="7067007668"
             data-ad-format="auto"
             data-full-width-responsive="false"></ins>
        <script>
             (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
      </div>
    </section>
    <section>
      <div class="row">
        <?php
        $categories = get_categories(array('parent' => 0)); //最上位のカテゴリーのみを取得する
        foreach ($categories as $category):
        ?>
        <section>
        <h2><?php echo $category->name; ?></h2>
        <?php
        $my_query = new WP_Query(array('cat' => $category->term_id, 'posts_per_page'=>3));
        if ($my_query->have_posts()):
        ?>
        <div class="list_wrap top_category_list">
          <div class="row item_list mb0 tile">
            <?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
              <article class="article_item col span_4">
                <a href="<?php echo the_permalink(); ?>">
                  <figure>
                    <a href="<?php echo the_permalink(); ?>">
                    <?php the_post_thumbnail(); ?>
                  </a>
                  </figure>
                  <div>
                    <h2 class="ttl">
                      <?php
                      if(mb_strlen($post->post_title, 'UTF-8')>20){
                      	$title= mb_substr($post->post_title, 0, 20, 'UTF-8');
                      	echo $title.'……';
                      }else{
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
              <a href="<?php echo get_category_link( $category->term_id ); ?>">MORE</a>
            </div>
          </div>
        </div>
        <?php wp_reset_postdata(); ?>
        <?php else: ?>
          <div class="list_wrap">
            <div class="row item_list mb0">
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
