<?php

$id = 'card-grid-column-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

$className = 'card-grid-column';
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
    <?php if($card['block']): $count = count($card['block']);?>
       <?php foreach($card['block'] as $index => $grid):?>
        <div class="col-md-6">
          <div class="inner">
            <div class="body">
            <?php if($grid['title']):?>           
              <h3><?php echo $grid['title'];?></h3>
            <?php endif;?>
            <?php if($grid['text'] === TRUE):?>
            <div class="description">
              <?php echo $grid['content'];?>
            </div>
            <?php endif;?>
            <?php if($grid['bullet_list'] === TRUE):?>
            <ul class="bullet_list">
              <?php foreach($grid['list'] as $bullet):?>
              <li><span><img src="<?php echo $bullet['icon']['url'];?>"></span><?php echo $bullet['text'];?></li>
              <?php endforeach;?>
            </ul>
            <?php endif;?>
            <?php if($grid['call_to_action'] === TRUE):?>
                    <a href="<?php echo $grid['button_link'];?>" class="btn"><?php echo $grid['button_title'];?></a>
                  <?php endif;?>
            </div>
          </div>
        </div>
        <?php endforeach;?>
    <?php endif;?>
    </div>
  </div>
</section>