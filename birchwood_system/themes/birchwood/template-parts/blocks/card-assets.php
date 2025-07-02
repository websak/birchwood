<?php

$id = 'assets-information-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

$className = 'assets-information';
if( !empty($block['className']) ) {
	$className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
	$className .= ' align' . $block['align'];
}

//$card = get_field("card");
//var_dump($card);
?>


<section class="<?php echo esc_attr($className); ?>" id="<?php echo esc_attr($id); ?>">
  <div class="container container--slim">
    <div class="row">
      <div class="col-md-12">
        <?php $taxonomy = 'assets_categories'; $terms = get_terms(['taxonomy' => $taxonomy,'hide_empty' => false,]);?>
        <ul class="nav nav-tabs">
          <?php $i = 0; foreach($terms as $term) : $i++; ?>
          <li <?php if($i == 1) :?> class="active" <?php endif;?>>
            <a href="#tab-<?php echo $term->slug;?>"><?php echo $term->name;?></a>
          </li>
          <?php endforeach;?>
        </ul>
        <?php $i = 0; foreach($terms as $term) : $i++;  ?>
        <div id="tab-<?php echo $term->slug;?>" <?php if($i == 1) :?> class="tab-content active" <?php else :?> class="tab-content hide" <?php endif;?>>
          <?php $card = get_field('card', 'term_'. $term->term_id);?>
          <div class="row">
            
            <div class="col-md-6">
              <div class="content">
                <h2><?php echo $term->name;?> Market Fundamentals</h2>
                <?php if($card['description']):?><?php echo $card['description'];?><?php endif;?>
                <?php if($card['download']):?><p><a href="<?php echo $card['download'];?>" class="btn" target="_blank">Download full document here</a></p><?php endif;?>
              </div>
            </div>
            <div class="col-md-6">              
              <div class="tax_image" <?php if($card['image']['url']):?> style="background-image: url('<?php echo $card['image']['url'];?>')" <?php else :?> style="background-image: url('<?php echo get_template_directory_uri()?>/assets/images/placeholder.svg')"<?php endif;?>></div>
            </div>
          </div>
          <?php $args = array('post_type'  => 'assets', 'tax_query' => array(array('taxonomy' => 'assets_categories', 'field' => 'name','terms' => array($term->name),'operator' => 'IN')), 'orderby' => 'title', 'order' => 'ASC') ;?>
          <?php $assets = new WP_Query( $args ); //echo '<pre>'; var_dump($assets); echo '</pre>'; ?>
          <?php if ( $assets->have_posts() ) : ?>
            <div class="row">
          <?php while ( $assets->have_posts() ) : $assets->the_post(); $id = get_the_ID(); $assets_info = get_field("card", $id); ?>
            <?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?>
            <div class="col-md-4 card">
              <div class="image-container" <?php if($backgroundImg):?> style="background: url('<?php echo $backgroundImg[0]; ?>') no-repeat; "  <?php else :?> style="background-image: url('<?php echo get_template_directory_uri()?>/assets/images/asset_placeholder.jpeg')"<?php endif;?>></div>
              <div class="body">
                <div class="inner">
                  <h2><?php echo get_the_title(); ?></h2>
                   <p class="address"><?php echo $assets_info['address'];?></p>
                    <ul>
                      <li class="size"><?php echo $assets_info['size'];?></li>
                      <li class="value"><?php echo $assets_info['stat_value'];?></li>
                    </ul>
                    <?php if($assets_info['download']):?><p><a href="<?php echo $assets_info['download'];?>" class="btn green" target="_blank">View Asset Pack</a></p><?php endif;?>
                </div>
              </div>
            </div>
            <?php endwhile; ?>
          </div>
          <?php endif;?>
                    </div>
        <?php endforeach;?>
      </div>
    </div>
  </div>
</section>