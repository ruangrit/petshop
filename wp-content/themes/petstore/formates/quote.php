<?php
$source = get_post_meta(get_the_ID(), 'kaya_quote_desc', true);
	echo '<div class="description ">';
		echo '<div class="blog_post_meta">'; ?>
               <span class=""><i class="fa fa-calendar">&nbsp;</i> <?php echo the_date(get_option('date-formate')); ?></span>
              <span  class="comment_color"><i class="fa fa-comments">&nbsp;</i> <?php comments_popup_link(__('0 Comments','pestore' ), __( '1 Comment', 'pestore' ), __( '% Comments', 'pestore' ) ); ?></span> 
              <span class="post_category"><i class="fa fa-tags">&nbsp;</i> <?php the_category(','); ?></span> 
    <?php  echo '</div></div>';
	echo '<div class="quote_format">';
	echo '<i class="fa fa-quote-right"></i>';
	echo '<div class="quote_format_text">';
	echo '<p>'.$source.'</p>';
	echo '<h5>--'.get_the_title().'</h5>';
	echo '</div></div>';
	?>