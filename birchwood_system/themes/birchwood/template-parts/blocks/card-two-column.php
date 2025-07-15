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
//var_dump($card);
?>


<section class="<?php echo esc_attr($className); ?>" id="<?php echo esc_attr($id); ?>">
  <div class="container container--slim">
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