<?php

$id = 'card-documents-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

$className = 'card-documents';
if( !empty($block['className']) ) {
	$className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
	$className .= ' align' . $block['align'];
}

?>



<section class="<?php echo esc_attr($className); ?>" id="<?php echo esc_attr($id); ?>">
  <div class="container container--slim">
    <div class="row">
      <?php $taxonomy = 'document_categories'; $terms = get_terms(['taxonomy' => $taxonomy,'hide_empty' => false,]);?>
      <?php $i = 0; foreach($terms as $term) : $i++; ?>
      <div class="col-md-3">
        <h2><?php echo $term->name;?></h2>
        <div class="inner">
          <?php $args = array('post_type'  => 'documents', 'tax_query' => array(array('taxonomy' => 'document_categories', 'field' => 'name','terms' => array($term->name),'operator' => 'IN')), 'orderby' => 'title', 'order' => 'ASC') ;?>
          <?php $assets = new WP_Query( $args ); //echo '<pre>'; var_dump($assets); echo '</pre>'; ?>
          <?php if ( $assets->have_posts() ) : ?>
            <?php while ( $assets->have_posts() ) : $assets->the_post(); $id = get_the_ID(); $assets_info = get_field("card", $id); ?>
              <p><a href="<?php echo $assets_info['document_download'];?>" target="_blank"><?php echo get_the_title(); ?></a></p>
            <?php endwhile; ?>
          <?php endif;?>
        </div>
      </div>
      <?php endforeach;?>
    </div>
  </div>
</section>