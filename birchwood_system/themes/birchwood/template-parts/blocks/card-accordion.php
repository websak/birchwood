<?php

$id = 'card-accordion-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

$className = 'card-accordion';
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
      <div class="col-sm-12 col-md-12">
        <?php if($card['title']):?><h2><?php echo $card['title'];?></h2><?php endif;?>
      </div>
			<div id="accordion" class="accordion-container col-md-12">
					<?php foreach($card['accordion'] as $accordion):?>
				  <button class="accordion"><span><?php echo $accordion['title'];?></span></button>
          <div class="accordion-content">
						<div class="inner">
								<?php echo $accordion['text'];?>
						</div>
          </div>
					<?php endforeach;?>
			</div>
		</div>
	</div>
</section>

