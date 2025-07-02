<?php

$id = 'card-call-to-action-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

$className = 'card-call-to-action';
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
      <div class="col-md-9">
        <?php if($card['title']):?><h2><?php echo $card['title'];?></h2><?php endif;?>
        <?php if($card['text']):?><?php echo $card['text'];?><?php endif;?>
      </div>
      <div class="col-md-3">
        <?php if($card['button_link']):?><div class="cta"><a href="<?php echo $card['button_link'];?>" class="btn green" target="_blank"><?php echo $card['button_title'];?></a></div><?php endif;?>
      </div>
		</div>
	</div>
</section>