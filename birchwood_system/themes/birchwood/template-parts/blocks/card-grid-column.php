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
                    <a href="<?php echo $grid['button_link'];?>" class="btn"><?php echo $grid['button_title'];?>
                                        <?php if($grid['button_type'] == 'link'):?>
                <span class="link">
                  <svg xmlns="http://www.w3.org/2000/svg" width="11.787" height="11.788" viewBox="0 0 11.787 11.788">
                  <path id="arrow-down-to-line-solid" d="M4.757,8.089a.835.835,0,0,1-1.18,0L.244,4.755a.834.834,0,0,1,1.18-1.18L3.335,5.487V.833A.833.833,0,1,1,5,.833V5.487L6.913,3.576a.834.834,0,0,1,1.18,1.18L4.76,8.089Z" transform="translate(5.895 11.788) rotate(-135)" fill="#fff"/>
                  </svg>
                </span>
                <?php endif;?>
                <?php if($grid['button_type'] == 'download'):?>
                  <span class="download">
                  <svg xmlns="http://www.w3.org/2000/svg" width="10" height="11.667" viewBox="0 0 10 11.667">
                  <path id="arrow-down-to-line-solid" d="M.833,43.667A.833.833,0,1,1,.833,42H9.167a.833.833,0,1,1,0,1.667Zm4.755-3.578a.835.835,0,0,1-1.18,0L1.076,36.755a.834.834,0,0,1,1.18-1.18l1.911,1.911V32.833a.833.833,0,1,1,1.667,0v4.654l1.911-1.911a.834.834,0,0,1,1.18,1.18L5.591,40.089Z" transform="translate(0 -32)" fill="#fff"/>
                  </svg>
                </span>
              <?php endif;?>
                    </a>
                  </a>
                  <?php endif;?>
            </div>
          </div>
        </div>
        <?php endforeach;?>
    <?php endif;?>
    </div>
  </div>
</section>