<?php

$id = 'card-key-contacts-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

$className = 'card-key-contacts';
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
				<?php if($card['title']) :?><h2><?php echo $card['title'];?></h2><?php endif;?>
			</div>
			<?php if($card):?>
					<?php foreach($card['small_card'] as $small_card):?>
						<div class="col-xs-6 col-sm-6 col-md-2 small-card">
							<div class="inner">
								<div class="image-container" <?php if($small_card['image']):?> style="background-image: url('<?php echo $small_card['image'];?>')" <?php else :?> style="background-image: url('<?php echo get_template_directory_uri()?>/assets/images/placeholder.svg')"<?php endif;?>></div>
								<div class="body">
									<?php if($small_card['name']):?><h3><?php echo $small_card['name'];?></h3><?php endif;?>
									<div class="info">
										<?php if($small_card['job_title']):?><p><?php echo $small_card['job_title'];?></p><?php endif;?>
										<?php if($small_card['location']):?><p><?php echo $small_card['location']?></p><br/><?php endif;?>
									</div>
									<?php if($small_card['email_address']):?><p><a href="mailto:<?php echo $small_card['email_address'];?>"><?php echo $small_card['email_address'];?></a></p><?php endif;?>
									<?php if($small_card['telephone_number']):?><p><a href="tel:<?php echo $small_card['telephone_number'];?>"><?php echo $small_card['telephone_number'];?></a></p><?php endif;?>
								</div>
							</div>
						</div>
					<?php endforeach;?>
				<?php endif;?>
		</div>
	</div>
</section>