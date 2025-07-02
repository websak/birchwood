<?php

$id = 'card-content-left-right-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

$className = 'card-content-left-right';
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
				<div class="content">
					<?php if($card['title']):?><h2><?php echo $card['title'];?></h2><?php endif;?>
					<?php if($card['content']):?><?php echo $card['content'];?><?php endif;?>
				</div>
			</div>
			<div class="col-md-6">
				<div class="image-container" style="background-image: url('<?php echo $card['image']['url'];?>"></div>
			</div>
		</div>
	</div>
</section>