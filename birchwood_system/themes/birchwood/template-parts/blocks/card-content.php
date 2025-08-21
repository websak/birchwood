<?php

$id = 'card-content-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

$className = 'card-content';
if( !empty($block['className']) ) {
	$className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
	$className .= ' align' . $block['align'];
}

$card = get_field("card");
?>

<section class="<?php echo esc_attr($className); ?>" id="<?php echo esc_attr($id); ?>">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <?php if($card['content']):?><?php echo $card['content'];?><?php endif;?>
        <?php if($card['cta'] === TRUE):?>
          <p>
            <a href="<?php echo $card['button_link'];?>" class="cta">
              <span>
                <svg xmlns="http://www.w3.org/2000/svg" width="11.787" height="11.787" viewBox="0 0 11.787 11.787">
                  <path id="arrow-down-to-line-solid" d="M4.757,8.089a.835.835,0,0,1-1.18,0L.244,4.755a.834.834,0,0,1,1.18-1.18L3.335,5.487V.833A.833.833,0,1,1,5,.833V5.487L6.913,3.576a.834.834,0,0,1,1.18,1.18L4.76,8.089Z" transform="translate(11.787 5.892) rotate(135)" fill="#1a382b"/>
                </svg>
              </span>
             <?php echo $card['button_title'];?>
            </a>
          </p>
        <?php endif;?>
      </div>
    </div>
  </div>
</section>