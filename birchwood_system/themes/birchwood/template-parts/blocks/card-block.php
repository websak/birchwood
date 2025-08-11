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
  <div class="container">
    <!-- Updated structure for equal height cards -->
    <div class="cards-container">
      <?php if($card['block']): $count = count($card['block']);?>
        <?php foreach($card['block'] as $index => $block):?>
          <div class="card-wrapper <?php 
            // Convert column size to flex-basis for consistent sizing
            $column_size = $block['column_size'] ?? '6-column';
            switch($column_size) {
              case '1-column': echo 'flex-basis-1'; break;
              case '2-column': echo 'flex-basis-2'; break;
              case '3-column': echo 'flex-basis-3'; break;
              case '4-column': echo 'flex-basis-4'; break;
              case '5-column': echo 'flex-basis-5'; break;
              case '6-column': echo 'flex-basis-6'; break;
              case '7-column': echo 'flex-basis-7'; break;
              case '8-column': echo 'flex-basis-8'; break;
              case '9-column': echo 'flex-basis-9'; break;
              case '10-column': echo 'flex-basis-10'; break;
              case '11-column': echo 'flex-basis-11'; break;
              case '12-column': echo 'flex-basis-12'; break;
              default: echo 'flex-basis-6';
            }
          ?>" >
           <div class="card <?php if($block['image_size'] == "full"): ?>full<?php endif; ?><?php if($block['image_size'] == "contained"): ?>contained<?php endif; ?>" 
     <?php if($block['image_size'] == "full" && ($block['column_size'] == "6-column" || $block['column_size'] == "12-column") && !empty($block['image_min_height'])): ?>
       style="min-height: <?php echo esc_attr($block['image_min_height']); ?>px;"
     <?php elseif($block['image_size'] != "full"): ?>
       style="background-color: <?php echo esc_attr($block['card_background_colour']); ?>;"
     <?php endif; ?>>
              
              <!-- Background Image for full size -->
              <?php if($block['image_size'] == "full" && $block['image']): ?>
                <div class="card-background-image" >
                  <img src="<?php echo esc_url($block['image']['url']); ?>" 
                       alt="<?php echo esc_attr($block['image']['alt'] ?: ''); ?>" />
                </div>
              <?php endif; ?>
              
              <div class="inner">
                <div class="body <?php echo esc_attr($block['style']);?>">
                  
                  <div class="content-area">
                    <?php if($block['title']):?>
                      <div class="title_tag<?php if(strlen($block['title']) > 20): ?> multiline<?php endif; ?>">
                        <h3><?php echo $block['title'];?></h3>
                      </div>
                    <?php endif;?>
                    
                    <?php if($block['subtitle']):?>
                      <h4><?php echo $block['heading'];?></h4>
                    <?php endif;?>

                    <?php if($block['description'] === TRUE && $block['text']):?>
                      <div class="description">
                        <?php echo $block['text'];?>
                      </div>
                    <?php endif;?>
                    
                    <?php if($block['bullet_list'] === TRUE && !empty($block['list'])):?>
                      <ul class="bullet_list<?php if ($block['column_size'] == "12-column"): ?> two-column<?php endif;?>">
                        <?php foreach($block['list'] as $bullet):?>
                          <li>
                            <?php if($bullet['icon']): ?>
                              <span class="icon">
                                <img src="<?php echo esc_url($bullet['icon']['url']);?>" 
                                     alt="<?php echo esc_attr($bullet['icon']['alt'] ?: 'Icon');?>">
                              </span>
                            <?php endif; ?>
                            <span class="text"><?php echo $bullet['text'];?></span>
                          </li>
                        <?php endforeach;?>
                      </ul>
                    <?php endif;?>

                    <?php if($block['image_size'] == "contained" && $block['image']): ?> 
                      <div class="inner_image">
                        <img src="<?php echo esc_url($block['image']['url']); ?>" 
                             alt="<?php echo esc_attr($block['image']['alt'] ?: ''); ?>"/> 
                      </div>
                    <?php endif;?>
                  </div>

                  <!-- Fixed positioned elements -->
                  <?php if($block['call_to_action'] === TRUE && $block['button_link']):?>
                    <a href="<?php echo esc_url($block['button_link']);?>" class="btn">
                      <?php echo $block['button_title'] ?: 'Learn More';?>
                      <?php if($block['button_type'] == 'link'):?>
                <span class="link">
                  <svg xmlns="http://www.w3.org/2000/svg" width="11.787" height="11.788" viewBox="0 0 11.787 11.788">
                  <path id="arrow-down-to-line-solid" d="M4.757,8.089a.835.835,0,0,1-1.18,0L.244,4.755a.834.834,0,0,1,1.18-1.18L3.335,5.487V.833A.833.833,0,1,1,5,.833V5.487L6.913,3.576a.834.834,0,0,1,1.18,1.18L4.76,8.089Z" transform="translate(5.895 11.788) rotate(-135)" fill="#fff"/>
                  </svg>
                </span>
                <?php endif;?>
                <?php if($block['button_type'] == 'download'):?>
                  <span class="download">
                  <svg xmlns="http://www.w3.org/2000/svg" width="10" height="11.667" viewBox="0 0 10 11.667">
                  <path id="arrow-down-to-line-solid" d="M.833,43.667A.833.833,0,1,1,.833,42H9.167a.833.833,0,1,1,0,1.667Zm4.755-3.578a.835.835,0,0,1-1.18,0L1.076,36.755a.834.834,0,0,1,1.18-1.18l1.911,1.911V32.833a.833.833,0,1,1,1.667,0v4.654l1.911-1.911a.834.834,0,0,1,1.18,1.18L5.591,40.089Z" transform="translate(0 -32)" fill="#fff"/>
                  </svg>
                </span>
              <?php endif;?>
                    </a>
                  <?php endif;?>

                  <?php if($block['statistic'] === TRUE && $block['stat_value']):?>
                    <div class="stat">
                      <span><?php echo $block['stat_value'];?></span>
                    </div>
                  <?php endif;?>
                  
                  <?php if($block['image_description']):?>
                    <div class="image_description<?php if ($block['column_size'] == "12-column"): ?> half<?php endif;?>">
                      <?php echo $block['image_description'];?>
                    </div>
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

<style>
/* Additional CSS for the flex-basis classes */
.cards-container {
  display: flex;
  flex-wrap: wrap;
  row-gap: 0px;
  column-gap: 20px;
  align-items: stretch;
}

.card-wrapper {
  display: flex;
  flex-direction: column;
}

.card-wrapper .card {
  flex: 1;
  display: flex;
  flex-direction: column;
  height: 100%;
  position: relative;
  overflow: hidden;
}

/* Background image container for full size cards */
.card-background-image {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 1;
}

.card-background-image img {
  width: 100%;
  height: auto;
  min-height: 100%;
  object-fit: cover;
  object-position: center;
}

/* Ensure content is above background image */
.card .inner {
  position: relative;
  z-index: 2;
}

/* Alternative for contained background images */
.card.contained .card-background-image img {
  object-fit: contain;
  object-position: bottom;
}

/* Show full image without cropping alternative */
.card.full.show-full-image .card-background-image img {
  object-fit: contain;
  object-position: center;
}

/* Flex basis classes for different column sizes */
.flex-basis-1 { flex: 0 0 calc(8.333% - 16.67px); }
.flex-basis-2 { flex: 0 0 calc(16.667% - 16.67px); }
.flex-basis-3 { flex: 0 0 calc(25% - 15px); }
.flex-basis-4 { flex: 0 0 calc(33.333% - 13.33px); }
.flex-basis-5 { flex: 0 0 calc(41.667% - 12px); }
.flex-basis-6 { flex: 0 0 calc(50% - 10px); }
.flex-basis-7 { flex: 0 0 calc(58.333% - 8.57px); }
.flex-basis-8 { flex: 0 0 calc(66.667% - 6.67px); }
.flex-basis-9 { flex: 0 0 calc(75% - 5px); }
.flex-basis-10 { flex: 0 0 calc(83.333% - 3.33px); }
.flex-basis-11 { flex: 0 0 calc(91.667% - 1.67px); }
.flex-basis-12 { flex: 0 0 100%; }

/* Responsive adjustments */
@media (max-width: 768px) {
  .cards-container {
    flex-direction: column;
  }
  
  .card-wrapper {
    flex: 0 0 100% !important;
  }
}

/* Two column bullet list for full width cards */
.bullet_list.two-column {
  columns: 2;
  column-gap: 30px;
}

.bullet_list.two-column li {
  break-inside: avoid;
  margin-bottom: 10px;
}

@media (max-width: 768px) {
  .bullet_list.two-column {
    columns: 1;
  }
}
</style>