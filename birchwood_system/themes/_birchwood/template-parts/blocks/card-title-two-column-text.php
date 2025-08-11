<?php

$id = 'card-two-column-title-text-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

$className = 'card-two-column-title-text';
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
  <div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php if($card['title']):?><h3><?php echo $card['title'];?></h3><?php endif;?>
			</div>
			<div class="col-md-6">
				<?php if($card['column_1']):?><div class="column"><?php echo $card['column_1'];?></div><?php endif;?>
			</div>
			<div class="col-md-6">
				<?php if($card['column_2']):?><div class="column"><?php echo $card['column_2'];?></div><?php endif;?>
			</div>
		</div>
  </div>
</section>