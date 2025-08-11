<?php

$id = 'card-grid-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

$className = 'card-grid';
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
        <div class="inner">
          <div class="body">
            <?php if($card['title']):?><h2><?php echo $card['title'];?></h2><?php endif;?>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
			<?php if($card['image_required'] === TRUE):?>
        <div class="image-container">
					<img src="<?php echo $card['image']['url'];?>">
        </div>
				<?php endif;?>
      </div>
    </div>
    <div class="row">
      <?php if($card['grid']):?>
				<?php foreach($card['grid'] as $grid):?>
				<div class="col-md-3 scard">
					<div class="inner">
						<div class="body">
							<div class="icon-container">
								<img src="<?php echo $grid['icon']['url'];?>">
							</div>
							<h3 <?php if($grid['colour']):?>style="color:<?php echo $grid['colour'];?>"<?php endif;?>><?php echo $grid['title'];?></h3>
							<?php echo $grid['text'];?>
						</div>
					</div>
				</div>
					<?php endforeach;?>
        <?php endif;?>
      </div>
    </div>
</section>