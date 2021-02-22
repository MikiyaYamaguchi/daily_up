<div class="side_column">
  <div class="row sns single_sns">
    <div class="col span_3">
      <figure>
        <a class="twitter icon-twitter" href="//twitter.com/intent/tweet?text=<?php echo urlencode(the_title("","",0)); ?>&<?php echo urlencode(get_permalink()); ?>&url=<?php echo urlencode(get_permalink()); ?>" target="_blank" title="Twitterでシェアする">
        <img src="/wp-content/uploads/2020/08/twitter.png" alt="twitter">
        </a>
      </figure>
    </div>
    <div class="col span_3">
      <figure>
        <a class="facebook icon-facebook" href="//www.facebook.com/sharer.php?u=<?php echo urlencode(get_permalink()); ?>&t=<?php echo urlencode(the_title("","",0)); ?>" target="_blank" title="facebookでシェアする">
        <img src="/wp-content/uploads/2020/08/facebook.png" alt="facebook">
        </a>
      </figure>
    </div>
  </div>
  <div class="row sns no_single_sns">
    <div class="col span_3">
      <figure>
        <a href="https://twitter.com/DailyUpppp" target="_blank" class="twitter">
        <img src="/wp-content/uploads/2020/08/twitter.png" alt="twitter">
        </a>
      </figure>
    </div>
    <div class="col span_3">
      <figure>
        <a href="" target="_blank" class="facebook">
        <img src="/wp-content/uploads/2020/08/facebook.png" alt="facebook">
        </a>
      </figure>
    </div>
  </div>
  <div class="row adsence_block">
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <!-- DailyUpサイドバナー広告 -->
    <ins class="adsbygoogle"
         style="display:block"
         data-ad-client="ca-pub-2725422849471150"
         data-ad-slot="4581123746"
         data-ad-format="auto"
         data-full-width-responsive="false"></ins>
    <script>
         (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
  </div>
  <div class="row">
    <p class="side_title">Category</p>
    <?php
      	wp_list_categories(array(
  			'title_li' =>'',  //デフォルトで出力されるタイトルを非表示
  			'show_count' => 1 //各カテゴリーに投稿数を表示する
  		));
  	?>
  </div>
  <div class="row">
    <p class="side_title">Tag</p>
    <?php
    $args = array(
      'orderby' => 'count',
      'order' => 'DESC',
      'number'=>'20'
    );
    $posttags = get_tags( $args );
    ?>
    <ul class="side_tag_list">
    <?php
      if(!empty($posttags)):
      foreach($posttags as $tag):?>
      <li>
        <a href='<?php echo get_tag_link( $tag->term_id );?>'><?php echo $tag->name?></a>
      </li>
    <?php
      endforeach;
      else:
    ?>
      <p>タグなし</p>
    <?php endif; ?>
  </ul>
  </div>
  <div class="row">
    <p class="side_title">Archive</p>
    <ul class="row date_select">
    <select name="archive-dropdown" onChange='document.location.href=this.options[this.selectedIndex].value;'>
    <option value=""><?php echo attribute_escape(__('Select Month')); ?></option>
    <?php wp_get_archives('type=monthly&format=option&show_post_count=1'); ?>
    </select>
  </ul>
  <p class="side_title">Search</p>
  <div class="row">
    <?php get_search_form(); ?>
  </div>
  </div>
  <div class="row">
    <p class="side_title">新着記事</p>
    <div class="row item_list">
    <?php
    $args = array(
      'posts_per_page' => 3 // 表示件数の指定
    );
         $posts = get_posts( $args );
         if(!empty($posts)):
         foreach ( $posts as $post ): // ループの開始
         setup_postdata( $post ); // 記事データの取得 ?>
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
               <time class="date text-left sp-only"><?php the_time('Y.n.j'); ?></time>
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
  </div>
  <div class="fix_block">
    <div class="row sns single_sns">
      <div class="col span_3">
        <figure>
          <a class="twitter icon-twitter" href="//twitter.com/intent/tweet?text=<?php echo urlencode(the_title("","",0)); ?>&<?php echo urlencode(get_permalink()); ?>&url=<?php echo urlencode(get_permalink()); ?>" target="_blank" title="Twitterでシェアする">
          <img src="/wp-content/uploads/2020/08/twitter.png" alt="twitter">
          </a>
        </figure>
      </div>
      <div class="col span_3">
        <figure>
          <a class="facebook icon-facebook" href="//www.facebook.com/sharer.php?u=<?php echo urlencode(get_permalink()); ?>&t=<?php echo urlencode(the_title("","",0)); ?>" target="_blank" title="facebookでシェアする">
          <img src="/wp-content/uploads/2020/08/facebook.png" alt="facebook">
          </a>
        </figure>
      </div>
    </div>
    <div class="row related_article">
      <p class="side_title">関連記事</p>
      <?php
      //関連記事一覧
      $tags = wp_get_post_tags($post->ID);
      $tag_ids = array();
      foreach($tags as $tag):
        array_push( $tag_ids, $tag -> term_id);
      endforeach ;
      $args = array(
        'post__not_in' => array($post -> ID),
        'posts_per_page'=> 3,
        'tag__in' => $tag_ids,
        'orderby' => 'rand',
      );
      $query = new WP_Query($args); ?>
      <?php if( $query -> have_posts() && !empty($tag_ids) ): ?>
        <div class="row item_list">
      <?php while ($query -> have_posts()) : $query -> the_post(); ?>
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
              <time class="date text-left sp-only"><?php the_time('Y.n.j'); ?></time>
            </div>
          </a>
        </article>
      <?php endwhile;?>
    </div>
      <?php else:?>
      <p>記事がありません。</p>
      <?php
    endif;
    wp_reset_postdata();
    ?>
    </div>
  </div>
</div>
