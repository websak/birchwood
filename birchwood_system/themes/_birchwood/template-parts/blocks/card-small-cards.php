<?php

$id = 'card-small-cards-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

$className = 'card-small-cards';
if( !empty($block['className']) ) {
	$className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
	$className .= ' align' . $block['align'];
}

$card = get_field("card");
//var_dump($card);
?>

<?php if($card['background'] === TRUE) : ?>
<style>
.card-small-cards {
  border-radius: 60px;
  background: <?php echo $card['background_colour_1'];
  ?>;
  background: linear-gradient(90deg, <?php echo $card['background_colour_1']; ?> 0%, <?php echo $card['background_colour_2']; ?> 100%);
  padding: 100px 0;
}
</style>
<?php endif; ?>




<section class="<?php echo esc_attr($className); ?><?php if(basename(get_page_template()) === 'page.php') :?> container<?php endif;?>" id="<?php echo esc_attr($id); ?>">
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
  </div>

  <?php if($card['small_card']): $count = count($card['small_card']);?>
  <div class="container-fluid">
    <div class="card_carousel">
      <?php foreach($card['small_card'] as $index => $scard):?>
      <div class="scard <?php if($scard['image_size'] == "full"):?> full <?php endif;?>"
        <?php if($scard['image_size'] == "full"): ?>
        style="background-image: url('<?php echo $scard['image']['url']; ?>');" <?php else : ?>
        style="background-color: <?php echo $scard['card_background_colour']; ?>;" <?php endif; ?>>
        <div class="inner">
          <div class="body <?php echo esc_attr($scard['style']);?>">
            <?php if($scard['title']):?>
            <div class="title_tag">
              <h3><?php echo $scard['title'];?></h3>
            </div>
            <?php endif;?>

            <?php if($scard['subtitle']):?>
            <h4><?php echo $scard['heading'];?></h4>
            <?php endif;?>

            <?php if($scard['image_size'] == "contained"):?>
            <img src="<?php echo $scard['image']['url']; ?>" alt="<?php echo $scard['image']['alt']; ?>" class="inner_image"/>
            <?php endif;?>

            <?php if($scard['description'] === TRUE):?>
            <div class="description">
              <?php echo $scard['text'];?>
            </div>
            <?php endif;?>
            <?php if($scard['statistic'] === TRUE):?>
            <div class="stat">
              <span><?php echo $scard['stat_value'];?></span>
            </div>
            <?php endif;?>
            <?php if($scard['bullet_list'] === TRUE):?>
            <ul class="bullet_list">
              <?php foreach($scard['list'] as $bullet):?>
              <li><span class="icon"><img src="<?php echo $bullet['icon']['url'];?>"></span><span class="text"><?php echo $bullet['text'];?></span></li>
              <?php endforeach;?>
            </ul>
            <?php endif;?>
          </div>
        </div>
      </div>
      <?php endforeach;?>
    </div>
  </div>
  <?php endif;?>
</section>