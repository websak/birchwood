<?php

$id = 'card-image-slider-' . $block['id'];
if( !empty($block['anchor']) ) {
  $id = $block['anchor'];
}

$className = 'card-image-slider';
if( !empty($block['className']) ) {
  $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
  $className .= ' align' . $block['align'];
}

$card = get_field("card");
//var_dump($card);
?>


<section class="<?php echo esc_attr($className); ?><?php if(basename(get_page_template()) === 'page.php') :?> container<?php endif;?>" id="<?php echo esc_attr($id); ?>">
  <?php if($card['image_slider']):?>
    <div class="image_carousel">
    <?php foreach($card['image_slider'] as $image):?>
      <div class="image-container">
        <img src="<?php echo $image['image']['url'];?>">
        <div class="block">
          <div class="<?php if(basename(get_page_template()) === 'page.php') :?> col-md-7 <?php else :?> col-md-8  <?php endif;?>">
            <?php if($image['address']):?><h3><?php echo $image['address'];?></h3><?php endif;?>
          </div>
          <div class="<?php if(basename(get_page_template()) === 'page.php') :?> col-md-5 <?php else :?> col-md-4  <?php endif;?>">
            <?php if($image['description']):?><div class="desc"><?php echo $image['description'];?></div><?php endif;?>
          </div>
        </div>
      </div>
    <?php endforeach;?>
    </div>

    <div class="slick-navigation">
        <button type="button" class="slick-prev-custom" aria-label="Previous">
            <svg xmlns="http://www.w3.org/2000/svg" width="11.666" height="11.672" viewBox="0 0 11.666 11.672">
              <path id="arrow-down-to-line-solid" d="M6.66,11.324a1.168,1.168,0,0,1-1.652,0L.342,6.657A1.168,1.168,0,0,1,1.993,5.006L4.669,7.682V1.167A1.167,1.167,0,1,1,7,1.167V7.682L9.679,5.006A1.168,1.168,0,1,1,11.33,6.657L6.664,11.324Z" transform="translate(11.666) rotate(90)" fill="#1a382b"/>
            </svg>
        </button>
        <button type="button" class="slick-next-custom" aria-label="Next">
            <svg xmlns="http://www.w3.org/2000/svg" width="11.666" height="11.672" viewBox="0 0 11.666 11.672">
              <path id="arrow-down-to-line-solid" d="M6.66,11.324a1.168,1.168,0,0,1-1.652,0L.342,6.657A1.168,1.168,0,0,1,1.993,5.006L4.669,7.682V1.167A1.167,1.167,0,1,1,7,1.167V7.682L9.679,5.006A1.168,1.168,0,1,1,11.33,6.657L6.664,11.324Z" transform="translate(0 11.672) rotate(-90)" fill="#1a382b"/>
            </svg>
        </button>
    </div>
  <?php endif;?>
</section>