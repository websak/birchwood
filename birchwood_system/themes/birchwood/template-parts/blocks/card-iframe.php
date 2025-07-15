<?php

$id = 'card-iframe-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

$className = 'card-iframe';
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
					<div class="inner">
						<div class="body">
							<?php if($card['iframe']):?><?php echo $card['iframe'];?><?php endif;?>
						</div>
					</div>
				</div>
		</div>
  </div>
</section>