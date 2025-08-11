<?php

$id = 'card-video-with-stats-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

$className = 'card-video-with-stats';
if( !empty($block['className']) ) {
	$className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
	$className .= ' align' . $block['align'];
}

$card = get_field("card");
$video_url = $card['video']['url'];
?>

<section class="<?php echo esc_attr($className); ?>" id="<?php echo esc_attr($id); ?>">
  <div class="image-container" <?php if($card['image']) :?>
    style="background-image: url('<?php echo ($card['image']['url'])?>')" <?php endif;?>>
		<?php if($video_url): ?>
 <!-- Video Container (hidden by default) -->
 <div class="video-container" id="video-container-<?php echo esc_attr($id); ?>" style="display: none;">
      <div class="video-close-button" onclick="closeVideo('<?php echo esc_attr($id); ?>')">
        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
          <circle cx="15" cy="15" r="15" fill="rgba(179, 219, 109, 0.7)" />
          <path d="M10 10L20 20M20 10L10 20" stroke="white" stroke-width="2" stroke-linecap="round" />
        </svg>
      </div>
      <div class="video-wrapper">
        <video id="video-player-<?php echo esc_attr($id); ?>" controls width="100%" height="100%">
          <source src="<?php echo esc_url($video_url); ?>" type="video/mp4">
          Your browser does not support the video tag.
        </video>
      </div>
    </div>
		<?php endif;?>
		<div class="content_wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6">
          <?php if($card['stats']):?>
          <div class="row stat-container">
            <?php foreach($card['stats'] as $stat):?>
            <div class="stat">
              <div class="row">
                <div class="col-md-4">
                  <span><?php echo $stat['stat'];?></span>
                </div>
                <div class="col-md-8">
                  <div class="text">
                    <?php echo $stat['text'];?>
                  </div>
                </div>
              </div>
            </div>
            <?php endforeach;?>
          </div>
          <?php endif;?>
        </div>
        <div class="col-md-6">

				<?php if($video_url): ?>
    <!-- Play Button -->
    <div class="video-play-button" onclick="playVideo('<?php echo esc_js($video_url); ?>')">
      Play Video
      <svg xmlns="http://www.w3.org/2000/svg" width="54" height="54" viewBox="0 0 54 54">
        <g id="Group_113" data-name="Group 113" transform="translate(-1262 -687)">
          <circle id="Ellipse_1" data-name="Ellipse 1" cx="27" cy="27" r="27" transform="translate(1262 687)"
            fill="#b3db6d" opacity="0.25" />
          <path id="Polygon_1" data-name="Polygon 1"
            d="M10.778,3.116a2,2,0,0,1,3.49,0l9.111,16.269a2,2,0,0,1-1.745,2.977H3.412a2,2,0,0,1-1.745-2.977Z"
            transform="translate(1303.955 701.312) rotate(90)" fill="#b3db6d" />
        </g>
      </svg>
    </div>   
    <?php endif; ?>
				</div>
				</div>
      </div>
    </div>
  </div>
</section>


<script>
document.addEventListener('DOMContentLoaded', function() {
  // Function to play video
  window.playVideo = function(videoUrl, event) {
    event.preventDefault();
    event.stopPropagation();

    const playButton = event.target.closest('.video-play-button');
    const container = playButton.closest('.image-container');
    const videoContainer = container.querySelector('.video-container');
    const videoPlayer = container.querySelector('video');

    console.log('Playing video:', videoUrl); // Debug log

    // Show video container
    videoContainer.style.display = 'flex';
    container.classList.add('video-playing');

    // Play the video
    videoPlayer.play().catch(function(error) {
      console.error('Error playing video:', error);
    });
  };

  // Function to close video
  window.closeVideo = function(blockId, event) {
    if (event) {
      event.preventDefault();
      event.stopPropagation();
    }

    const container = document.getElementById(blockId);
    const videoContainer = container.querySelector('.video-container');
    const videoPlayer = container.querySelector('video');

    // Hide video container
    videoContainer.style.display = 'none';
    container.querySelector('.image-container').classList.remove('video-playing');

    // Pause and reset video
    videoPlayer.pause();
    videoPlayer.currentTime = 0;
  };

  // Add event listeners to play buttons
  document.querySelectorAll('.video-play-button').forEach(function(button) {
    button.addEventListener('click', function(event) {
      const videoUrl = this.getAttribute('data-video-url');
      playVideo(videoUrl, event);
    });
  });

  // Add event listeners to close buttons
  document.querySelectorAll('.video-close-button').forEach(function(button) {
    button.addEventListener('click', function(event) {
      const blockId = this.getAttribute('data-block-id');
      closeVideo(blockId, event);
    });
  });

  // Close video when clicking outside the video player
  document.addEventListener('click', function(event) {
    const videoContainers = document.querySelectorAll('.video-container');

    videoContainers.forEach(container => {
      if (container.style.display === 'flex' &&
        !container.querySelector('.video-wrapper').contains(event.target) &&
        !event.target.closest('.video-close-button')) {

        const blockId = container.id.replace('video-container-', '');
        closeVideo(blockId);
      }
    });
  });

  // Close video with Escape key
  document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
      const visibleVideoContainer = document.querySelector('.video-container[style*="flex"]');
      if (visibleVideoContainer) {
        const blockId = visibleVideoContainer.id.replace('video-container-', '');
        closeVideo(blockId);
      }
    }
  });
});
</script>