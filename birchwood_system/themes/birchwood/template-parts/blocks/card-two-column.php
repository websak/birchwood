<?php

$id = 'card-two-column-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

$className = 'card-two-column';
if( !empty($block['className']) ) {
	$className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
	$className .= ' align' . $block['align'];
}

$card = get_field("card");
// var_dump($card);
?>


<section class="<?php echo esc_attr($className); ?> image-match-text" id="<?php echo esc_attr($id); ?>">
  <div class="container">
    <?php if($card['alignment'] == "left") :?>
    <div class="row">
      <div class="col-md-6">
        <div class="inner">
          <div class="body left">
            <?php if($card['title'] === TRUE):?><h2><?php echo $card['heading'];?></h2><?php endif;?>
            <?php if($card['sub_text'] === TRUE):?><h2 class="sub_text"><?php echo $card['text'];?></h2><?php endif;?>
            <?php if($card['bullet_list'] === TRUE):?>
            <ul class="bullet_list">
              <?php foreach($card['list'] as $bullet):?>
              <li><span><img src="<?php echo $bullet['icon']['url'];?>"></span><?php echo $bullet['text'];?></li>
              <?php endforeach;?>
            </ul>
            <?php endif;?>
            <?php if($card['call_to_action'] === TRUE):?>
              <a href="<?php echo $card['button_link'];?>" class="btn"><?php echo $card['button_title'];?>
              <?php if($card['button_type'] == 'link'):?>
                <span class="link">
                  <svg xmlns="http://www.w3.org/2000/svg" width="11.787" height="11.788" viewBox="0 0 11.787 11.788">
                  <path id="arrow-down-to-line-solid" d="M4.757,8.089a.835.835,0,0,1-1.18,0L.244,4.755a.834.834,0,0,1,1.18-1.18L3.335,5.487V.833A.833.833,0,1,1,5,.833V5.487L6.913,3.576a.834.834,0,0,1,1.18,1.18L4.76,8.089Z" transform="translate(5.895 11.788) rotate(-135)" fill="#fff"/>
                  </svg>
                </span>
                <?php endif;?>
                <?php if($card['button_type'] == 'download'):?>
                  <span class="download">
                  <svg xmlns="http://www.w3.org/2000/svg" width="10" height="11.667" viewBox="0 0 10 11.667">
                  <path id="arrow-down-to-line-solid" d="M.833,43.667A.833.833,0,1,1,.833,42H9.167a.833.833,0,1,1,0,1.667Zm4.755-3.578a.835.835,0,0,1-1.18,0L1.076,36.755a.834.834,0,0,1,1.18-1.18l1.911,1.911V32.833a.833.833,0,1,1,1.667,0v4.654l1.911-1.911a.834.834,0,0,1,1.18,1.18L5.591,40.089Z" transform="translate(0 -32)" fill="#fff"/>
                  </svg>
                </span>
              <?php endif;?>
              </a>
            <?php endif;?>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <?php if($card['image_required'] === TRUE):?>
          <div class="image-container">          
            <img src="<?php echo $card['image']['url'];?>">          
          </div>
        <?php endif;?>
        <?php if($card['stats'] === TRUE):?>
          <div class="row stats">
          <?php foreach($card['stat_list'] as $index => $stats):?>
              <div class="col-md-6">
                <div class="stat">
                  <span class="value <?php 
        // Create pattern: odd, even, even, odd (0=odd, 1=even, 2=even, 3=odd, 4=odd, 5=even, etc.)
        $cycle_position = $index % 4; // Get position in 4-item cycle
        if ($cycle_position === 0 || $cycle_position === 3) {
          echo 'even';
        } else {
          echo 'odd';
        }
      ?>"><?php echo $stats['stat_value'];?></span>
                  <span class="text"><?php echo $stats['stat_text'];?></span>
                </div>
              </div>
              <?php endforeach;?>
          </div>
          
        <?php endif;?>
      </div>
    </div>
    <?php elseif($card['alignment'] == "right"):?>
    <div class="row">
      <div class="col-md-6">
      <?php if($card['image_required'] === TRUE):?>
          <div class="image-container">          
            <img src="<?php echo $card['image']['url'];?>">          
          </div>
        <?php endif;?>
      </div>
      <div class="col-md-6">
        <div class="inner">
          <div class="body right">
            <?php if($card['title'] === TRUE):?><h2><?php echo $card['heading'];?></h2><?php endif;?>
            <?php if($card['bullet_list'] === TRUE):?>
            <ul class="bullet_list">
              <?php foreach($card['list'] as $bullet):?>
              <li><span><img src="<?php echo $bullet['icon']['url'];?>"></span><?php echo $bullet['text'];?></li>
              <?php endforeach;?>
            </ul>
            <?php endif;?>
            <?php if($card['call_to_action'] === TRUE):?><a href="<?php echo $card['button_link'];?>"
              class="btn"><?php echo $card['button_title'];?></a><?php endif;?>
          </div>
        </div>
      </div>
      <?php else : ?>
      <div class="row">
        <div class="col-md-6">
          <div class="inner">
            <div class="body left">
              <?php if($card['title'] === TRUE):?><h2><?php echo $card['heading'];?></h2><?php endif;?>
              <?php if($card['bullet_list'] === TRUE):?>
              <ul class="bullet_list">
                <?php foreach($card['list'] as $bullet):?>
                <li><span><img src="<?php echo $bullet['icon']['url'];?>"></span><?php echo $bullet['text'];?></li>
                <?php endforeach;?>
              </ul>
              <?php endif;?>
              <?php if($card['call_to_action'] === TRUE):?><a href="<?php echo $card['button_link'];?>"
                class="btn"><?php echo $card['button_title'];?></a><?php endif;?>
            </div>
          </div>
        </div>
        <div class="col-md-6">
        <?php if($card['image_required'] === TRUE):?>
          <div class="image-container">          
            <img src="<?php echo $card['image']['url'];?>">          
          </div>
        <?php endif;?>
        </div>
      </div>
      <?php endif;?>
    </div>

</section>