<?php
class Petstore_Twitter_Widget extends WP_Widget {
  public function __construct(){
    global $petstore_plugin_name;
    parent::__construct(
      $petstore_plugin_name.'-twitter',
      __('Petstore - Twitter',$petstore_plugin_name),
      array('description' => __('Dsiplay latest tweets',$petstore_plugin_name))
      );
  }
  function widget($args, $instance)
  {   
    $instance = wp_parse_args($instance, array(
          'title' => '',
          'twitter_username' => '', 
          'count' => 3, 
          'consumer_key' => '',
          'access_token' => '',
          'consumer_secret' => '', 
          'access_token' => '', 
          'access_token_secret' => '',
          'animation_names' => '',
        )); 

  echo $args['before_widget'];
   $animation_class = trim( !empty( $instance['animation_names'] ) ) ? 'wow '.$instance['animation_names'] : '';
    if($instance['title']) {
      echo $args['before_title'].$instance['title'].$args['after_title'];
    }    
    if($instance['twitter_username'] && trim($instance['consumer_key']) && trim($instance['consumer_secret']) && trim($instance['access_token']) && trim($instance['access_token_secret']) && $instance['count']) { 
    require_once 'twitteroauth/twitteroauth.php';
    $transName = 'list_tweets';
    $cacheTime = 1;
    if(false === ($twittermsg = get_transient($transName))) {
         // require the twitter auth class
         require_once 'twitteroauth/twitteroauth.php';
         $twitterConnection = new TwitterOAuth(
             trim($instance['consumer_key']),  // Consumer Key
              trim($instance['consumer_secret']),     // Consumer secret
              trim($instance['access_token']),       // Access token
              trim($instance['access_token_secret'])     // Access token secret
              );
         $twittermsg = $twitterConnection->get(
                'statuses/user_timeline',
                array(
                  'screen_name'     => $instance['twitter_username'],
                  'count'           => $instance['count'],
                  'exclude_replies' => true
                )
              );
         if($twitterConnection->http_code != 200)
         {
              $twittermsg = get_transient($transName);
         }
         // Save our new transient.
         set_transient($transName, $twittermsg, 60 * $cacheTime);
    }
    $twitter = get_transient($transName);
    if($twitter && is_array($twitter)) {
      //var_dump($twitter);
    ?>
    
          <div class="<?php echo $animation_class; ?> twitter_container" id="tweets_<?php echo $args['widget_id']; ?>">
            <ul>
              <?php foreach($twitter as $tweet): ?>
              <li><i class="fa fa-twitter"> </i>
                <span class="description">
                <?php
                $latestTweet = $tweet->text;
                $latestTweet = preg_replace('/http:\/\/([a-z0-9_\.\-\+\&\!\#\~\/\,]+)/i', '<a href="http://$1" target="_blank">http://$1</a>', $latestTweet);
                $latestTweet = preg_replace('/@([a-z0-9_]+)/i', '<a href="http://twitter.com/$1" target="_blank">@$1</a>', $latestTweet);
                echo $latestTweet;
                ?>
              
                <?php
                $twitterTime = strtotime($tweet->created_at);
                $timeAgo = $this->ago($twitterTime);
                ?>
                <a href="http://twitter.com/<?php echo $tweet->user->screen_name; ?>/statuses/<?php echo $tweet->id_str; ?>" ><?php echo $timeAgo; ?></a>
                </span>
              </li>
              <?php endforeach; ?>
            </ul>
          </div>
    <?php }}
    
    echo $args['after_widget'];
  }
  
  function ago($time)
  {
     $periods = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
     $lengths = array("60","60","24","7","4.35","12","10");

     $now = time();
         $difference     = $now - $time;
         $tense         = "ago";
     for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
         $difference /= $lengths[$j];
     }
     $difference = round($difference);
     if($difference != 1) {
         $periods[$j].= "s";
     }
     return "$difference $periods[$j] ago ";
  }
 function form($instance)
  {
global $petstore_plugin_name;
 $instance = wp_parse_args($instance, array(
          'title' => '',
          'twitter_username' => '', 
          'count' => 3, 
          'consumer_key' => '',
          'access_token' => '',
          'consumer_secret' => '', 
          'access_token' => '', 
          'access_token_secret' => '',
           'animation_names' => '',

        )); 
?>
<div class="input-elements-wrapper">
  <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('twitter_username'); ?>"><?php _e('Twitter User Name:',$petstore_plugin_name) ?></label>
    <input class="widefat" type="text"  id="<?php echo $this->get_field_id('twitter_username'); ?>" name="<?php echo $this->get_field_name('twitter_username'); ?>" value="<?php echo $instance['twitter_username']; ?>" />
  </p>
  <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('count') ?>"><?php _e('Number of Tweets:',$petstore_plugin_name) ?></label>
    <input class="widefat" type="text" id="<?php echo $this->get_field_id('count') ?>" name="<?php echo $this->get_field_name('count') ?>" value="<?php echo esc_attr($instance['count']) ?>">    
  </p>    
  <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Twitter Title:',$petstore_plugin_name) ?></label>
    <input class="widefat" type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />
  </p>
</div>
<div class="input-elements-wrapper">
  <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('consumer_key'); ?>"><?php _e('Consumer Key:',$petstore_plugin_name) ?></label>
    <input class="widefat" type="text" id="<?php echo $this->get_field_id('consumer_key'); ?>" name="<?php echo $this->get_field_name('consumer_key'); ?>" value="<?php echo $instance['consumer_key']; ?>" />
  </p>
  <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('consumer_secret'); ?>"><?php _e('Consumer Secret:',$petstore_plugin_name) ?></label>
    <input class="widefat" type="text"  id="<?php echo $this->get_field_id('consumer_secret'); ?>" name="<?php echo $this->get_field_name('consumer_secret'); ?>" value="<?php echo $instance['consumer_secret']; ?>" />
  </p>
</div>
<div class="input-elements-wrapper">
  <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('access_token'); ?>"><?php _e('Access Token:',$petstore_plugin_name) ?></label>
    <input class="widefat" type="text" id="<?php echo $this->get_field_id('access_token'); ?>" name="<?php echo $this->get_field_name('access_token'); ?>" value="<?php echo $instance['access_token']; ?>" />
  </p>
  <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('access_token_secret'); ?>"><?php _e('Access Token Secret:',$petstore_plugin_name) ?></label>
    <input class="widefat" type="text" id="<?php echo $this->get_field_id('access_token_secret'); ?>" name="<?php echo $this->get_field_name('access_token_secret'); ?>" value="<?php echo $instance['access_token_secret']; ?>" />
  </p>
</div>
  <p>
   <label for="<?php echo $this->get_field_id('animation_names') ?>">  <?php _e('Select Animation Effect',$petstore_plugin_name) ?>  </label>
    <?php animation_effects($this->get_field_name('animation_names'), $instance['animation_names'] ); ?>
  <p>   
<?php
}
}
//petstore_kaya_register_widgets('twitter', __FILE__); 
 ?>