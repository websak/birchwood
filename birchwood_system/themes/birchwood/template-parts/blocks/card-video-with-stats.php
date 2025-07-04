<?php

$id = 'card-video-with-stats-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

$className = 'card-video-with-stats';
if( !empty($block['className']) ) {
	$className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
	$className .= ' align' . $block['align'];
}

$card = get_field("card");

?>

<section class="<?php echo esc_attr($className); ?>" id="<?php echo esc_attr($id); ?>" >
	<div class="image-container" <?php if($card['image']) :?> style="background-image: url('<?php echo ($card['image']['url'])?>')" <?php endif;?>>
		<div class="container container--slim">
			<div class="row">

			</div>
		</div>
	</div>

</section>