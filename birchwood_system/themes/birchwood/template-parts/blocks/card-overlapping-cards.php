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

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollToPlugin.min.js"></script>

<section class="<?php echo esc_attr($className); ?>" id="<?php echo esc_attr($id); ?>">
  <div class="container container--slim cards-container">
    <div class="row w-100">
      <div class="col-12">
        <div class="cards">
          <div class="cards-wrapper">
            <?php if($card['cards']):?>
              <?php foreach($card['cards'] as $key => $cards):?>
                <div class="custom-card card<?php echo $key + 1; ?>" id="<?php echo $key + 1; ?>" style="background-color: <?php echo $cards['card_colour'];?>; z-index: <?php echo $key + 2; ?>;" >
                  <div class="slider_content">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="inner <?php echo $cards['style'];?>">
                          <div class="body">
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
                              <a href="<?php echo $cards['button_link'];?>" class="btn"><?php echo $cards['button_title'];?></a>
                            <?php endif;?>
                          </div>
                        </div>
                      </div>
                      <?php if($cards['image']['url']):?>
                        <div class="col-md-6">
                          <div class="card-image" style="background-image: url('<?php echo $cards['image']['url'];?>'); height: 100%; background-size: cover; background-position: center;"></div>
                        </div>
                      <?php endif;?>
                    </div>
                  </div>
                </div>
              <?php endforeach;?>
            <?php endif;?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
  gsap.registerPlugin(ScrollTrigger, ScrollToPlugin);

  // Use a more specific selector to avoid conflicts
  const cardsSection = document.querySelector('#<?php echo esc_attr($id); ?> .cards');

  if (!cardsSection) return;

  // Get the actual number of cards dynamically
  const totalCards = document.querySelectorAll('#<?php echo esc_attr($id); ?> .custom-card').length;
  
  if (totalCards === 0) return;

  // Initialize all cards - set Card 1 visible, others hidden
  gsap.set('#<?php echo esc_attr($id); ?> .card1', {
    yPercent: 0,
    opacity: 1,
    scale: 1,
    zIndex: 2  // Start at z-index 2
  });

  // Hide all other cards initially
  for (let i = 2; i <= totalCards; i++) {
    gsap.set(`#<?php echo esc_attr($id); ?> .card${i}`, {
      yPercent: 100,
      opacity: 0,
      scale: 1,
      zIndex: i + 1  // 3, 4, 5, etc.
    });
  }

  let tl = gsap.timeline({
    scrollTrigger: {
      trigger: '#<?php echo esc_attr($id); ?>',
      pin: '#<?php echo esc_attr($id); ?> .cards-container',
      start: "top top",
      end: "bottom bottom",
      scrub: 1,
      pinSpacing: true,
      refreshPriority: -1,
      invalidateOnRefresh: true,
    }
  });

  // Card 1 - stays visible longer
  tl.to('#<?php echo esc_attr($id); ?> .card1', {
    duration: 3,
    ease: "none"
  });

  // Dynamically create animations for all cards
  for (let i = 2; i <= totalCards; i++) {
    const currentCard = `#<?php echo esc_attr($id); ?> .card${i}`;
    const prevCard = `#<?php echo esc_attr($id); ?> .card${i-1}`;
    
    // Next card enters from bottom
    tl.from(currentCard, {
      yPercent: 100,
      opacity: 0,
      duration: 1
    })
    // Previous card scales down and moves back
    .to(prevCard, {
      scale: 0.95,
      yPercent: -5,
      opacity: 1,
      duration: 1
    }, "-=0.5")
    // Current card settles into place
    .to(currentCard, {
      yPercent: 0,
      opacity: 1,
      duration: 1
    }, "-=0.5");
  }

  // Force immediate refresh after creation
  ScrollTrigger.refresh();

  // Refresh ScrollTrigger on load and resize
  window.addEventListener('load', () => {
    ScrollTrigger.refresh();
    ScrollTrigger.clearScrollMemory();
    window.history.scrollRestoration = "manual";
  });

  window.addEventListener('resize', () => {
    ScrollTrigger.refresh();
  });
});
</script>