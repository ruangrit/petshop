<?php
	$pf_link = get_post_meta(get_the_ID(), 'kaya_link', true);
	echo '<div class="description ">';
		echo '<div class="blog_post_meta">'; ?>
               <span class=""><i class="fa fa-calendar">&nbsp;</i> <?php echo the_date(get_option('date-formate')); ?></span>
              <span  class="comment_color"><i class="fa fa-comments">&nbsp;</i> <?php comments_popup_link(__('0 Comments','pestore' ), __( '1 Comment', 'pestore' ), __( '% Comments', 'pestore' ) ); ?></span> 
              <span class="post_category"><i class="fa fa-tags">&nbsp;</i> <?php the_category(','); ?></span> 
    <?php  echo '</div></div>';
	echo '<div class="link_format_wrapper">';
	echo '<i class="fa fa-link"></i>';	
	echo '<div class="link_format_title">';
	echo '<h3 style=""><a style="" title="Permalink to: '.$pf_link.'" href="'.esc_url($pf_link).'" target="_blank">'.get_the_title().'</a></h3></div>';
	echo '</div>';
?>	
