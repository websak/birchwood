<?php

$id = 'card-two-column-title-image-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

$className = 'card-two-column-title-image';
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
        <div class="inner" <?php if($card['background_colour']):?>style="background-color: <?php echo esc_attr($card['background_colour']);?>;"<?php endif;?>>
          <div class="row">
						<div class="col-md-12">
						<div class="body <?php echo ($card['style']);?>">
              <?php if($card['title']):?>
								<div class="title_tag">
									<h3><?php echo $card['title'];?></h3>
								</div>
              <?php endif;?>
							</div>
						</div>
            <div class="col-md-6">
							<div class="body <?php echo ($card['style']);?>">

              <?php if($card['sub_title']):?>
              	<h4><?php echo $card['sub_title'];?></h4>
              <?php endif;?>

              <?php if($card['text']):?>
								<div class="description">
									<?php echo $card['text'];?>
								</div>
              <?php endif;?>
							</div>
            </div>
            <div class="col-md-6">
              <div class="image-container">
                <?php if($card['image']):?>
                <img src="<?php echo $card['image']['url']; ?>" alt="<?php echo $card['image']['alt']; ?>">
                <?php endif;?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>