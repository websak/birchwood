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
<style>
    :root {
    --card-height: 1200px;
    --card-margin: 4vw;
    /* --card-top-offset: 2em; */
    --numcards: 4;
    --outline-width: 0px;
  }

  </style>

    <section class="<?php echo esc_attr($className); ?>" id="<?php echo esc_attr($id); ?>">
      <div class="container">
        <div class="row w-100">
          <div class="col-12">
            <?php if($card['cards']):?>
            <div id="cards">
              <?php foreach($card['cards'] as $key => $cards):?>
              <div class="card" id="card-<?php echo $key + 1; ?>" id="<?php echo $key + 1; ?>">
                <div class="card-content <?php echo $cards['style'];?>" style="background-color: <?php echo $cards['card_colour'];?>;">
                  <div>
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
                        <?php echo $bullet['title'];?>
                      </li>
                      <?php endforeach;?>
                    </ul>
                    <?php endif;?>
                    <?php if($cards['button_link']):?>
                    <a href="<?php echo $cards['button_link'];?>" class="btn"><?php echo $cards['button_title'];?>
                      <?php if($cards['button_type'] == 'link'):?>
                        <span class="link">
                          <svg xmlns="http://www.w3.org/2000/svg" width="11.787" height="11.788" viewBox="0 0 11.787 11.788">
                            <path id="arrow-down-to-line-solid" d="M4.757,8.089a.835.835,0,0,1-1.18,0L.244,4.755a.834.834,0,0,1,1.18-1.18L3.335,5.487V.833A.833.833,0,1,1,5,.833V5.487L6.913,3.576a.834.834,0,0,1,1.18,1.18L4.76,8.089Z" transform="translate(5.895 11.788) rotate(-135)" fill="#fff"/>
                          </svg>
                        </span>
                      <?php endif;?>
                      <?php if($cards['button_type'] == 'download'):?>
                        <span class="download">
                          <svg xmlns="http://www.w3.org/2000/svg" width="10" height="11.667" viewBox="0 0 10 11.667">
                            <path id="arrow-down-to-line-solid" d="M.833,43.667A.833.833,0,1,1,.833,42H9.167a.833.833,0,1,1,0,1.667Zm4.755-3.578a.835.835,0,0,1-1.18,0L1.076,36.755a.834.834,0,0,1,1.18-1.18l1.911,1.911V32.833a.833.833,0,1,1,1.667,0v4.654l1.911-1.911a.834.834,0,0,1,1.18,1.18L5.591,40.089Z" transform="translate(0 -32)" fill="#fff"/>
                          </svg>
                        </span>
                      <?php endif;?>
                    </a>
                    <?php endif;?>
                  </div>
                  <figure>
                    <?php if($cards['image']['url']):?><img src="<?php echo $cards['image']['url'];?>"> <?php endif;?>
                  </figure>
                </div>
              </div>
              <?php endforeach;?>
              <?php endif;?>
            </div>
          </div>
        </div>
    </section>


    <script>
// Fallback JavaScript animation for browsers that don't support CSS scroll-timeline
document.addEventListener('DOMContentLoaded', function() {
  // Check if CSS scroll-timeline is supported
  const supportsScrollTimeline = CSS.supports('animation-timeline', 'scroll()');

  if (!supportsScrollTimeline) {
    const cards = document.querySelectorAll('.card');
    const cardsContainer = document.getElementById('cards');

    function updateCards() {
      const containerRect = cardsContainer.getBoundingClientRect();
      const containerTop = containerRect.top;
      const containerHeight = containerRect.height;
      const windowHeight = window.innerHeight;

      // Calculate scroll progress through the cards container
      const scrollProgress = Math.max(0, Math.min(1, -containerTop / (containerHeight - windowHeight)));

      cards.forEach((card, index) => {
        const cardIndex = index + 1;
        const numCards = cards.length;
        const reverseIndex = numCards - index;

        // Calculate when this card should start scaling
        const cardStartProgress = index / numCards;
        const cardProgress = Math.max(0, Math.min(1, (scrollProgress - cardStartProgress) * numCards));

        // Calculate scale based on reverse index and progress
        const targetScale = 1.1 - (0.1 * reverseIndex);
        const currentScale = 1 + (targetScale - 1) * cardProgress;

        const cardContent = card.querySelector('.card-content');
        cardContent.style.transform = `scale(${currentScale})`;

        if (cardProgress > 0) {
          card.classList.add('stacked');
        } else {
          card.classList.remove('stacked');
        }
      });
    }

    // Throttled scroll handler
    let ticking = false;

    function requestTick() {
      if (!ticking) {
        requestAnimationFrame(function() {
          updateCards();
          ticking = false;
        });
        ticking = true;
      }
    }

    window.addEventListener('scroll', requestTick);
    window.addEventListener('resize', updateCards);

    // Initial update
    updateCards();
  }
});
    </script>