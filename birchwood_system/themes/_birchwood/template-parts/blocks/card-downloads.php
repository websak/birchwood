<?php

$id = 'card-downloads-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

$className = 'card-downloads';
if( !empty($block['className']) ) {
	$className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
	$className .= ' align' . $block['align'];
}

$card = get_field("card");
//var_dump($card);
$args = array('post_type'  => 'downloads', 'orderby' => 'publish_date', 'order' => 'ASC', 'post_status' => array('publish')); 
$downloads = new WP_Query( $args ); //echo '<pre>'; var_dump($downloads); echo '</pre>'; 
?>


<section class="<?php echo esc_attr($className); ?>" id="<?php echo esc_attr($id); ?>">
  <div class="container container--slim">
    <div class="row">

      <div class="col-md-12">
        <div class="inner">
          <div class="body">
            <?php if($card['title']) :?><h2><?php echo $card['title'];?></h2><?php endif;?>
          </div>
        </div>
      </div>
<?php $loop_variable = 1; if ($downloads->have_posts() ) : while ( $downloads->have_posts() ) : $downloads->the_post(); $id = get_the_ID();       
  $card = get_field('card', $id);
  $additional_classes = ($loop_variable % 2 == 0) ? 'odd' : 'even'; 
  $unique_class = 'dcard-' . $id; // Create unique class based on post ID
?>

<style>
  .<?php echo $unique_class; ?> .inner {
      background-image: url('data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" width="263.977" height="351.969" viewBox="0 0 263.977 351.969"%3E%3Cpath d="M0,44A44.037,44.037,0,0,1,44,0H157.767a44.011,44.011,0,0,1,31.141,12.855l62.213,62.213a44.011,44.011,0,0,1,12.855,31.141V307.973a44.037,44.037,0,0,1-44,44H44a44.037,44.037,0,0,1-44-44Z" fill="<?php echo urlencode($card['card_colour']);?>"/%3E%3C/svg%3E');
      background-size: contain;
      background-repeat: no-repeat;
      background-position: center;
  }
</style>

<div class="col-md-3 dcard <?php echo $unique_class; ?>">
  <div class="inner">
    <div class="body <?php echo $card['style'];?>">
      <h3><?php echo the_title();?></h3>
      <div class="<?php echo $additional_classes; ?>">
         <?php the_excerpt();?>
      </div>
      <?php if($card['download']):?>
        <a href="<?php echo $card['download']['url'];?>" class="btn" target="_blank">Download</a>
      <?php endif;?>
    </div>
  </div>
</div>
<?php $loop_variable++; endwhile;?>
      <?php wp_reset_postdata(); else :  _e( 'Sorry, no posts matched your criteria.' ); endif;?>       
    </div>
  </div>
</section>
