<?php

$id = 'card-highlighted-text-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

$className = 'card-highlighted-text';
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
  <div class="progress-bar" id="progressBar"></div>
  <div class="text-highlight-section">
    <div class="container container--slim highlight-container">
      <div class="highlight-text" id="highlightText">
        <?php echo $card['text'];?>
      </div>
    </div>
  </div>
</section>


<script>
let words = [];
let currentHighlightIndex = -1;
let currentStyle = 'default';

function initializeWords() {
  const textElement = document.getElementById('highlightText');
  const text = textElement.textContent;

  // Split text into words and wrap each in a span
  const wordArray = text.split(/\s+/);
  words = wordArray;

  textElement.innerHTML = wordArray.map((word, index) =>
    `<span class="word" data-index="${index}">${word}</span>`
  ).join(' ');
}

function updateProgress() {
  const scrollTop = window.pageYOffset;
  const docHeight = document.documentElement.scrollHeight - window.innerHeight;
  const scrollPercent = (scrollTop / docHeight) * 100;
  document.getElementById('progressBar').style.width = scrollPercent + '%';
}

function handleTextHighlight() {
  const scrollTop = window.pageYOffset;
  const textSection = document.querySelector('.text-highlight-section');
  const textElement = document.getElementById('highlightText');

  if (!textSection || !textElement) return;

  const sectionTop = textSection.offsetTop;
  const sectionHeight = textSection.offsetHeight;
  const windowHeight = window.innerHeight;

  // Define the scroll range for the text highlighting
  const scrollStart = sectionTop - windowHeight * 0.8;
  const scrollEnd = sectionTop + sectionHeight - windowHeight * 0.2;

  // Always update, but calculate progress differently based on position
  if (scrollTop < scrollStart) {
    // Before section - all words at start state
    updateWordHighlights(-1, 0);
  } else if (scrollTop > scrollEnd) {
    // After section - all words at end state
    updateWordHighlights(words.length, 1);
  } else {
    // Within section - normal progression
    updateWordHighlights(0, 0); // The function now handles all words internally
  }
}

function updateWordHighlights(targetIndex, wordProgress = 0) {
  const wordElements = document.querySelectorAll('.word');
  const scrollTop = window.pageYOffset;
  const textSection = document.querySelector('.text-highlight-section');
  const sectionTop = textSection.offsetTop;
  const sectionHeight = textSection.offsetHeight;
  const windowHeight = window.innerHeight;

  // Calculate overall progress through the text section
  const scrollStart = sectionTop - windowHeight * 0.8;
  const scrollEnd = sectionTop + sectionHeight - windowHeight * 0.2;
  const overallProgress = Math.max(0, Math.min(1, (scrollTop - scrollStart) / (scrollEnd - scrollStart)));

  wordElements.forEach((word, index) => {
    // Calculate word-specific progress
    const wordStart = index / words.length;
    const wordEnd = (index + 1) / words.length;

    // Determine how "activated" this word is
    let wordActivation = 0;
    if (overallProgress >= wordStart && overallProgress <= wordEnd) {
      // Currently transitioning
      wordActivation = (overallProgress - wordStart) / (wordEnd - wordStart);
    } else if (overallProgress > wordEnd) {
      // Fully activated
      wordActivation = 1;
    } else {
      // Not yet activated
      wordActivation = 0;
    }

    // Smooth color interpolation
    const startColor = {
      r: 26,
      g: 56,
      b: 43,
      a: 0.4
    }; // Light gray
    const endColor = {
      r: 26,
      g: 56,
      b: 43,
      a: 1
    }; // Dark gray/black

    // Handle different styles
    let finalColor;
    switch (currentStyle) {
      case 'gradient':
        if (wordActivation > 0.1) {
          const hue = (index * 30 + overallProgress * 180) % 360;
          finalColor = `hsl(${hue}, 70%, ${40 + wordActivation * 20}%)`;
        } else {
          finalColor = `rgba(${startColor.r}, ${startColor.g}, ${startColor.b}, ${startColor.a})`;
        }
        break;

      case 'glow':
        if (wordActivation > 0.1) {
          finalColor = '#fff';
          const glowIntensity = wordActivation * 0.8;
          word.style.background = `rgba(255, 107, 107, ${0.7 + wordActivation * 0.3})`;
          word.style.padding = '0.1em 0.3em';
          word.style.borderRadius = '8px';
          word.style.boxShadow = `0 0 ${10 + wordActivation * 20}px rgba(255, 107, 107, ${glowIntensity})`;
        } else {
          finalColor = `rgba(${startColor.r}, ${startColor.g}, ${startColor.b}, ${startColor.a})`;
          word.style.background = '';
          word.style.padding = '';
          word.style.borderRadius = '';
          word.style.boxShadow = '';
        }
        break;

      case 'underline':
        if (wordActivation > 0.1) {
          finalColor = '#333';
          word.style.borderBottom = `${1 + wordActivation * 2}px solid rgba(255, 107, 107, ${wordActivation})`;
          word.style.paddingBottom = '2px';
        } else {
          finalColor = `rgba(${startColor.r}, ${startColor.g}, ${startColor.b}, ${startColor.a})`;
          word.style.borderBottom = '';
          word.style.paddingBottom = '';
        }
        break;

      default:
        // Smooth color interpolation for default style
        const r = Math.round(startColor.r + (endColor.r - startColor.r) * wordActivation);
        const g = Math.round(startColor.g + (endColor.g - startColor.g) * wordActivation);
        const b = Math.round(startColor.b + (endColor.b - startColor.b) * wordActivation);
        const a = startColor.a + (endColor.a - startColor.a) * wordActivation;
        finalColor = `rgba(${r}, ${g}, ${b}, ${a})`;
        break;
    }

    // Apply the color
    word.style.color = finalColor;

    // Optional subtle scale effect for emphasis
    const scale = 1 + (wordActivation * 0.02);
    word.style.transform = `scale(${scale})`;

    // Font weight transition
    const fontWeight = 600 + (wordActivation * 200);
    word.style.fontWeight = Math.round(fontWeight);

    // Remove any lingering class-based styles
    word.className = 'word';
  });
}

function setStyle(style) {
  const container = document.querySelector('.highlight-container');
  const buttons = document.querySelectorAll('.control-btn');

  // Remove all style classes
  container.className = 'highlight-container';

  // Add new style class
  if (style !== 'default') {
    container.classList.add(`style-${style}`);
  }

  // Update button states
  buttons.forEach(btn => btn.classList.remove('active'));
  event.target.classList.add('active');

  currentStyle = style;
}

// Throttled scroll handler
let ticking = false;

function handleScroll() {
  if (!ticking) {
    requestAnimationFrame(() => {
      updateProgress();
      handleTextHighlight();
      ticking = false;
    });
    ticking = true;
  }
}

// Initialize
document.addEventListener('DOMContentLoaded', function() {
  initializeWords();

  // Add scroll listener
  window.addEventListener('scroll', handleScroll);

  // Initial update
  handleScroll();

  // Handle window resize
  window.addEventListener('resize', function() {
    setTimeout(() => {
      handleScroll();
    }, 100);
  });
});

// Expose setStyle to global scope for onclick handlers
window.setStyle = setStyle;
</script>