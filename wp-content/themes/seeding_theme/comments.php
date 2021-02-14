<div id="comments">
     <?php
     if ( have_comments() ):
          ?>
	<h5 id="resp"><i class="fa fa-commenting"></i>&nbsp;コメント一覧（<?php comments_number('0','1','%'); ?>件）</h5>
          <ul class="commets-list">
               <?php wp_list_comments( 'callback=costom_comment' ); ?>
          </ul>
          <?php
     endif;

     $args = array(
	'title_reply' => 'コメント',
	'comment_notes_before' => '',
	'fields' => array(
	    'author' => '<p class="comment-form-author">' . '<label for="author">' . __( 'Name' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
                    '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>',
            'email'  => '',
            'url'    => '',
            ),
	'label_submit' => __( 'コメントを送信' ),
     );
     comment_form( $args );
     ?>
</div>
<?php
if( $wp_query -> max_num_comment_pages > 1 ):
?>
<div class="st-pagelink">
<?php
$args = array(
'prev_text' => '&laquo; Prev',
'next_text' => 'Next &raquo;',
);
paginate_comments_links($args);
?>
</div>
<?php
endif;
?>

<!-- END singer -->
