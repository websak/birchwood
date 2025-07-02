<?php

$id = 'card-asset-book-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

$className = 'card-asset-book';
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
        <?php if($card['download']):?><p><a href="<?php echo $card['download'];?>" target="_blank"><?php echo $card['download_title'];?></a></p><?php endif;?>

      </div>
    </div>
  </div>
</section>