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
//var_dump($card);
?>


<section class="<?php echo esc_attr($className); ?>" <?php if(is_front_page()): ?> id="summary" <?php else :?> id="<?php echo esc_attr($id); ?>" <?php endif;?>>
	<div class="container container--slim">
		<div class="row">
			<div class="col-md-12">
					<?php if($card['title']):?><h2><?php echo $card['title'];?></h2><?php endif;?>
					<?php if($card['gallery']):?>
						<div class="gallery">
						<?php foreach($card['gallery'] as $gallery):?>
								<div class="image-container" style="background-image: url('<?php echo $gallery['image']['url'];?>">
									<div class="image-caption"><p><?php echo $gallery['image_caption'];?></p></div>
								</div>
						<?php endforeach;?>
						</div>
					<?php endif;?>
			</div>
		</div>
	</div>
</section>