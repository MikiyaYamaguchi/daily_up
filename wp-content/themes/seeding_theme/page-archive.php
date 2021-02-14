<?php get_header(); ?>
<main>
  <div class="container">
    <div class="main_column">
      <ul class="bread_wrap">
        <a href="<?php bloginfo('url'); ?>">HOME</a>&nbsp;>&nbsp;
        <?php single_post_title(); ?>
      </ul>
      <h1>New Post<span>新着情報</span></h1>
      <section class="bg_gray">
        <div class="row item_list">
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
          $ads_infeed = '4';
          $ads_infeed_count = '1';
          if ($the_query->have_posts()) :
            while ($the_query->have_posts()) : $the_query->the_post();
            ?>
            <?php
            if($ads_infeed_count == $ads_infeed){
            ?>
              <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
              <div class="pc-only">
                <ins class="adsbygoogle"
                     style="display:block"
                     data-ad-format="fluid"
                     data-ad-layout-key="-f2+f+cm-a3-q"
                     data-ad-client="ca-pub-2725422849471150"
                     data-ad-slot="7896324867"></ins>
                <script>
                     (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
            </div>
            <div class="sp-only">
              <ins class="adsbygoogle"
                   style="display:block"
                   data-ad-format="fluid"
                   data-ad-layout-key="-9s+eu-3i-j6+1be"
                   data-ad-client="ca-pub-2725422849471150"
                   data-ad-slot="6767624762"></ins>
              <script>
                   (adsbygoogle = window.adsbygoogle || []).push({});
              </script>
            </div>
            <?php
            }
            $ads_infeed_count++;
            ?>
            <article class="article_item col span_12">
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
                  <p><?php echo get_the_excerpt(); ?></p>
                  <time class="date text-right"><?php the_time('Y.n.j'); ?></time>
                </div>
              </a>
            </article>
            <?php
          endwhile; // ループの終了
          else:
          ?>
          <p>記事がありません。</p>
          <?php
        endif;
          wp_reset_postdata(); // 直前のクエリを復元する
          ?>
    </div>
    <div class="pagenation fixed_page">
      <?php
      if ($the_query->max_num_pages > 1) {
          echo paginate_links(array(
              'base' => get_pagenum_link(1) . '%_%',
              'format' => 'page/%#%/',
              'current' => max(1, $paged),
              'total' => $the_query->max_num_pages,
              'show_all' => true,
              'mid_size' => 5,
              'prev_next'    => True,
              'prev_text'    => __('&#x25C0;'),
              'next_text'    => __('&#x25B6;'),
          ));
      } else {
        echo '<div><ul>';
        echo "<li><span aria-current=\"page\" class=\"page-numbers current\">1</span></li>";
        echo '</ul></div>';      }
      wp_reset_postdata();
      ?>
    </div>
  </section>
    </div>
    <?php get_sidebar(); ?>
  </div>
</main>
<?php get_footer(); ?>
