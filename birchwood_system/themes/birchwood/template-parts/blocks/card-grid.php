<?php

$id = 'card-grid-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

$className = 'card-grid';
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
  
</section>