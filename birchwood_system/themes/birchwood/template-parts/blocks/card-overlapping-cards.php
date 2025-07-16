<?php
$id = 'card-overlapping-cards-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

$className = 'card-overlapping-cards';
if( !empty($block['className']) ) {
	$className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
	$className .= ' align' . $block['align'];
}

$card = get_field('card');

?>

<section class="<?php echo esc_attr($className); ?>" id="<?php echo esc_attr($id); ?>">
  <div class="cards-section">
    <div class="container container--slim cards-container">

      <?php if($card['cards']):?>
      <?php foreach($card['cards'] as $key => $cards):?>
      <div class="card card-<?php echo $key + 1; ?>" data-index="<?php echo $key + 1; ?>"
        style="background-color: <?php echo $cards['card_colour'];?>">
        <div class="row">
          <div class="col-md-6">
            <div class="inner">
            <?php if($cards['title']):?><h2><?php echo $cards['title'];?></h2><?php endif;?>
            <?php if($cards['text']):?><?php echo $cards['text'];?><?php endif;?>
            <?php if($cards['list']):?>
            <ul class="bullet_list">
              <?php foreach($cards['list'] as $bullet):?>
              <li>
                <span>
                  <img src="<?php echo esc_url($bullet['icon']['url']);?>"
                    alt="<?php echo esc_attr($bullet['icon']['alt']);?>">
                </span>
                <?php echo esc_html($bullet['title']);?>
              </li>
              <?php endforeach;?>
            </ul>
            <?php endif;?>
            <?php if($cards['button_link']):?>
                    <a href="<?php echo $block['button_link'];?>" class="btn"><?php echo $cards['button_title'];?></a>
                  <?php endif;?>
              </div>
          </div>
          <?php if($cards['image']['url']):?>
          <div class="col-md-6">
            <div class="card-image" style="background-image: url('<?php echo $cards['image']['url'];?>');"></div>
          </div>
          <?php endif;?>
        </div>
      </div>
      <?php endforeach;?>
      <?php endif;?>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const cardsSection = document.querySelector('.cards-section');
  const cards = document.querySelectorAll('.card');
  const totalCards = cards.length;

  function updateCards() {
    const rect = cardsSection.getBoundingClientRect();
    const scrollProgress = Math.max(0, Math.min(1, -rect.top / (rect.height - window.innerHeight)));

    // Determine which card should be active
    const activeCardIndex = Math.min(Math.floor(scrollProgress * totalCards), totalCards - 1);

    cards.forEach((card, index) => {
      if (index <= activeCardIndex) {
        // This card has been reached - stack it
        const stackOrder = index; // 0 = bottom, 1 = middle, 2 = top

        if (index === activeCardIndex) {
          // Active card - fully visible at the front
          card.style.transform = `translateY(${stackOrder * 25}px) scale(1)`;
          card.style.opacity = 1;
          card.style.zIndex = 100 + index;
        } else {
          // Previously active cards - show as stacked below with minimal visibility
          card.style.transform =
            `translateY(${stackOrder * 25}px) scale(${1 - (activeCardIndex - index) * 0.02})`;
          card.style.opacity = 1;
          card.style.zIndex = 100 + index;
        }
      } else {
        // Cards not yet reached - hide them
        card.style.transform = `translateY(${index * 25 + 200}px) scale(0.8)`;
        card.style.opacity = 0;
        card.style.zIndex = index;
      }
    });
  }

  // Smooth scroll handling
  let ticking = false;

  function onScroll() {
    if (!ticking) {
      requestAnimationFrame(() => {
        updateCards();
        ticking = false;
      });
      ticking = true;
    }
  }

  window.addEventListener('scroll', onScroll, {
    passive: true
  });
  updateCards(); // Initialize
});
</script>

</body>

</html>