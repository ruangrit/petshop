<?php $kaya_audio = get_post_meta( get_the_ID(), 'kaya_audio', true );
if( trim($kaya_audio) ){ ?>
	<div class="blog_audo_player">
		<audio id="format_audo_player" src="<?php echo trim($kaya_audio); ?>" type="audio/mp3" controls="controls"></audio>	
	</div>
<?php } ?>