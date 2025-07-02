<?php

$id = 'card-content-two-columns-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

$className = 'card-content-two-columns';
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
			<div class="col-md-6">
				<?php echo $card['column_1'];?>
			</div>
			<div class="col-md-6">
				<?php echo $card['column_2'];?>
			</div>
		</div>
	</div>
</section>