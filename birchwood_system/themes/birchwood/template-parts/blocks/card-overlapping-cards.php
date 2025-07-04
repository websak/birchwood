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
      <div class="card card-<?php echo $key + 1; ?>" data-index="<?php echo $key + 1; ?>" style="background-color: <?php echo $cards['card_colour'];?>">
        <div class="row">
          <div class="col-md-6">
            <?php if($cards['title']):?><h2><?php echo $cards['title'];?></h2><?php endif;?>
            <?php if($cards['text']):?><?php echo $cards['text'];?><?php endif;?>
            <ul>
              <li>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam</li>
              <li>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam</li>
              <li>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam</li>
            </ul>
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
const cards = document.querySelectorAll('.card');
const dots = document.querySelectorAll('.scroll-dot');
const totalCards = cards.length;
let currentCard = 0;

function updateCards() {
  cards.forEach((card, index) => {
    card.classList.remove('active', 'prev', 'next');

    if (index === currentCard) {
      card.classList.add('active');
    } else if (index < currentCard) {
      card.classList.add('prev');
    } else {
      card.classList.add('next');
    }
  });

  // Update dots
  dots.forEach((dot, index) => {
    dot.classList.toggle('active', index === currentCard);
  });
}

window.addEventListener('scroll', () => {
  const scrollTop = window.pageYOffset;
  const heroHeight = window.innerHeight;
  const cardsSection = document.querySelector('.cards-section');
  const cardsSectionTop = cardsSection.offsetTop;
  const cardsSectionHeight = cardsSection.offsetHeight;

  if (scrollTop >= cardsSectionTop - heroHeight / 2) {
    const scrollProgress = (scrollTop - cardsSectionTop + heroHeight / 2) / (cardsSectionHeight - heroHeight);
    const cardProgress = Math.max(0, Math.min(1, scrollProgress));
    const targetCard = Math.min(totalCards - 1, Math.floor(cardProgress * totalCards));

    if (targetCard !== currentCard) {
      currentCard = targetCard;
      updateCards();
    }
  }
});

// Dot navigation
dots.forEach((dot, index) => {
  dot.addEventListener('click', () => {
    const cardsSection = document.querySelector('.cards-section');
    const targetScroll = cardsSection.offsetTop + (index / totalCards) * (cardsSection.offsetHeight - window
      .innerHeight);
    window.scrollTo({
      top: targetScroll,
      behavior: 'smooth'
    });
  });
});

// Initialize
updateCards();
</script>
</body>

</html>