<?php

$id = 'card-content-block-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

$className = 'card-content-block';
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
	<?php if($card['full_width'] === false) : ?>
	<div class="container container--slim">
		<div class="row">
			<div class="col-md-12">
				<div class="content">
					<?php echo $card['content'];?>
				</div>
			</div>
		</div>
	</div>
	<?php else : ?>
		<div class="content">
			<?php echo $card['content'];?>
		</div>
	<?php endif;?>
</section>