<?php

$id = 'card-call-to-action-grid-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

$className = 'card-call-to-action-grid';
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
		<?php $grid_repeater_total_items = count($card['small_card']);?>
		<div class="row">
				<?php if($card):?>
					<?php foreach($card['small_card'] as $small_card):?>
						<div class="<?php if($grid_repeater_total_items <= 3 ) :?>col-md-4<?php else : ?>col-md-3<?php endif;?> small-card">
							<div class="inner">
								<div class="body">
									<?php if($small_card['title']):?><h2><?php echo $small_card['title'];?></h2><?php endif;?>
									<?php if($small_card['text']):?><?php echo $small_card['text'];?><?php endif;?>
									<?php if($small_card['button_link']):?><a href="<?php echo $small_card['button_link'];?>" class="btn green" target="_blank"><?php echo $small_card['button_title'];?></a><?php endif;?>
								</div>
							</div>
						</div>
					<?php endforeach;?>
				<?php endif;?>
		</div>
	</div>
</section>