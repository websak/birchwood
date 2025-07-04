<?php

$id = 'card-image-slider-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

$className = 'card-image-slider';
if( !empty($block['className']) ) {
	$className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
	$className .= ' align' . $block['align'];
}

$card = get_field("card");

?>

<section class="<?php echo esc_attr($className); ?>" id="<?php echo esc_attr($id); ?>">

</section>