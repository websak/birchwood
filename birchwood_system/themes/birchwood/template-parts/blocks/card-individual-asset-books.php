<?php

$id = 'card-individual-asset-books-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

$className = 'card-individual-asset-books';
if( !empty($block['className']) ) {
	$className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
	$className .= ' align' . $block['align'];
}

$card = get_field("card");
//var_dump($card);
?>



<section class="<?php echo esc_attr($className); ?>" id="<?php echo esc_attr($id); ?>">
	<div class="container container--slim">
		<div class="row">
       <div class="col-md-12">
				  <?php if($card['title']):?><h2><?php echo $card['title'];?></h2><?php endif;?>
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
          <?php $args = array('post_type'  => 'assets', 'tax_query' => array(array('taxonomy' => 'assets_categories', 'field' => 'name','terms' => array($term->name),'operator' => 'IN')), 'orderby' => 'title', 'order' => 'ASC') ;?>
          <?php $assets = new WP_Query( $args ); //echo '<pre>'; var_dump($assets); echo '</pre>'; ?>
          <?php if ( $assets->have_posts() ) : ?>
            <div class="row">
          <?php while ( $assets->have_posts() ) : $assets->the_post(); $id = get_the_ID(); $assets_info = get_field("card", $id); ?>
            <?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?>
            <div class="col-md-3 card">
              <div class="body">
                <div class="inner">
                  <h2><?php echo get_the_title(); ?></h2>
                  <p class="address"><?php echo $assets_info['address'];?></p>
                  <?php if($assets_info['download']):?><p><a href="<?php echo $assets_info['download'];?>" target="_blank">Download Asset Book here</a></p><?php endif;?>
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