<?php

$id = 'card-list-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

$className = 'card-list';
if( !empty($block['className']) ) {
	$className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
	$className .= ' align' . $block['align'];
}

$card = get_field("card");
//var_dump($card);
?>



<section class="<?php echo esc_attr($className); ?> <?php if($card['require'] === true ) : ?>bg-color<?php endif;?>" <?php if(is_front_page()): ?> id="summary" <?php else :?> id="<?php echo esc_attr($id); ?>" <?php endif;?>>
	<div class="container container--slim">
		<div class="row">
      <?php if($card['require'] === true ) : ?>
        <div class="col-sm-12 col-md-12">
          <?php if($card['title']):?><h2><?php echo $card['title'];?></h2><?php endif;?>
          <?php if($card['text']):?><?php echo $card['text'];?><?php endif;?>
        </div>
       <?php endif;?>
        <?php if($card['list']) : ?>
        <?php foreach($card['list'] as $list):?>
        <div class="list col-sm-6 col-md-6">
          <div class="row">
            <div class="col-sm-4 col-md-2">
              <div class="icon" style="background-image: url('<?php echo $list['icon']['url'];?>"></div>
            </div>
            <div class="col-sm-8 col-md-10">
              <span><?php echo $list['text'];?></span>
            </div>
          </div>
        </div>
        <?php endforeach;?>
        <?php endif;?>
        <div class="col-sm-12 col-md-12 bottom_text">
          <?php if($card['bottom_text']):?><?php echo $card['bottom_text'];?><?php endif;?>
        </div>
		</div>
	</div>
</section>

