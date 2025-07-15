<?php

$id = 'card-block-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

$className = 'card-block';
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
      <?php if($card['block']): $count = count($card['block']);?>
        <?php foreach($card['block'] as $index => $block):?>
          <div class="<?php 
            // Clean up column size logic
            $column_size = $block['column_size'] ?? '6-column'; // Default to 6-column
            switch($column_size) {
              case '1-column': echo 'col-md-1'; break;
              case '2-column': echo 'col-md-2'; break;
              case '3-column': echo 'col-md-3'; break;
              case '4-column': echo 'col-md-4'; break;
              case '5-column': echo 'col-md-5'; break;
              case '6-column': echo 'col-md-6'; break;
              case '7-column': echo 'col-md-7'; break;
              case '8-column': echo 'col-md-8'; break;
              case '9-column': echo 'col-md-9'; break;
              case '10-column': echo 'col-md-10'; break;
              case '11-column': echo 'col-md-11'; break;
              case '12-column': echo 'col-md-12'; break;
              default: echo 'col-md-6'; // Default fallback
            }
          ?>">
            <div class="card <?php if($block['image_size'] == "full"):?>full<?php endif;?>"
              <?php if($block['image_size'] == "full"): ?>
                style="background-image: url('<?php echo esc_url($block['image']['url']); ?>');"
              <?php else : ?>
                style="background-color: <?php echo esc_attr($block['card_background_colour']); ?>;"
              <?php endif; ?>>
              <div class="inner">
                <div class="body <?php echo esc_attr($block['style']);?>">
                  <?php if($block['title']):?>
                    <div class="title_tag">
                      <h3><?php echo esc_html($block['title']);?></h3>
                    </div>
                  <?php endif;?>
                  
                  <?php if($block['subtitle']):?>
                    <h4><?php echo esc_html($block['heading']);?></h4>
                  <?php endif;?>

                  <?php if($block['image_size'] == "contained"):?> 
                    <img src="<?php echo esc_url($block['image']['url']); ?>" 
                         alt="<?php echo esc_attr($block['image']['alt']); ?>" 
                         class="inner_image"/> 
                  <?php endif;?>

                  <?php if($block['description'] === TRUE):?>
                    <div class="description">
                      <?php echo $block['text'];?>
                    </div>
                  <?php endif;?>
                  
                  <?php if($block['call_to_action'] === TRUE):?>
                    <a href="<?php echo $block['button_link'];?>" class="btn"><?php echo $block['button_title'];?></a>
                  <?php endif;?>

                  <?php if($block['statistic'] === TRUE):?>
                    <div class="stat">
                      <span><?php echo esc_html($block['stat_value']);?></span>
                    </div>
                  <?php endif;?>
                  
                  <?php if($block['image_description']):?>
                    <div class="image_description <?php if ($block['column_size'] == "12-column") :?>half<?php endif;?>">
                      <?php echo ($block['image_description']);?>
                    </div>
                  <?php endif;?>
                  
                  <?php if($block['bullet_list'] === TRUE):?>
                    <ul class="bullet_list <?php if ($block['column_size'] == "12-column") :?>two-column<?php endif;?>">
                      <?php foreach($block['list'] as $bullet):?>
                        <li>
                          <span>
                            <img src="<?php echo esc_url($bullet['icon']['url']);?>" 
                                 alt="<?php echo esc_attr($bullet['icon']['alt']);?>">
                          </span>
                          <?php echo esc_html($bullet['text']);?>
                        </li>
                      <?php endforeach;?>
                    </ul>
                  <?php endif;?>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach;?>
      <?php endif;?>
    </div>
  </div>
</section>