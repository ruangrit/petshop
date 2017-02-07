<form method="get"  class="searchbox-wrapper search_form s" action="<?php echo home_url(); ?>">
<input class="text" type="text"  onFocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue;"  name="s" placeholder="<?php _e('Search here...','petstore') ?>" required="required" />
</form>
