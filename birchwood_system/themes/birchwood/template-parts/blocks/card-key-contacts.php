<?php

$id = 'card-key-contacts-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

$className = 'card-key-contacts';
if( !empty($block['className']) ) {
	$className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
	$className .= ' align' . $block['align'];
}

$card = get_field("card");

// Get all team members
$args = array(
	'post_type'  => 'team', 
	'posts_per_page' => -1, 
	'orderby' => 'published_date', 
	'order' => 'ASC'
);
$team = new WP_Query( $args );

// Get all product categories for tabs
$categories = get_terms(array(
	'taxonomy' => 'team_category',
	'hide_empty' => true,
	'orderby' => 'name',
	'order' => 'ASC'
));

?>

<section class="<?php echo esc_attr($className); ?>" id="<?php echo esc_attr($id); ?>">
	<div class="container container--slim">
		<div class="row">
			<div class="col-md-6">
				<?php if($card['title']) :?><h2><?php echo $card['title'];?></h2><?php endif;?>
			</div>
			<div class="col-md-6">
				<!-- Filter Tabs -->
				<?php if (!empty($categories)) : ?>
					<div class="team-filter-tabs">
						<button class="filter-tab active" data-category="all">View All</button>
						<?php foreach ($categories as $category) : ?>
							<button class="filter-tab" data-category="<?php echo esc_attr($category->slug); ?>">
								<?php echo esc_html($category->name); ?>
							</button>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
		
		<div class="row team-members-container">
			<?php if ($team->have_posts() ) :  ?>
				<?php while ( $team->have_posts() ) : $team->the_post(); 
					$id = get_the_ID(); 
					$job_title = get_field("job_title", $id); 
					$tel = get_field("telephone", $id); 
					$email = get_field("email", $id); 
					$image = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'full' );
					
					// Get team member categories
					$member_categories = wp_get_post_terms($id, 'team_category');
					$category_classes = '';
					if (!empty($member_categories)) {
						foreach ($member_categories as $cat) {
							$category_classes .= ' category-' . $cat->slug;
						}
					}
				?>
					<div class="col-xs-6 col-sm-6 col-md-2 small-card team-member<?php echo $category_classes; ?>">
						<div class="inner">
							<div class="image-container" <?php if($image[0]) :?> style="background-image: url('<?php echo $image[0];?>')" <?php else :?> style="background-image: url('https://placehold.co/228x200')"<?php endif;?>></div>
							<div class="body">
								<h3><?php echo the_title();?></h3>
								<div class="info">
									<?php if($job_title):?><p class="job_title"><?php echo $job_title ;?></p><?php endif;?>
								</div>
								<?php if($tel):?><p>T: <a href="tel:<?php echo $tel?>"><?php echo $tel;?></a></p><?php endif;?>
								<?php if($email):?><p>E: <a href="mailto:<?php echo $email?>"><?php echo $email?></a></p><?php endif;?>									
							</div>
						</div>
					</div>
				<?php endwhile;?>
			<?php endif;?>
		</div>
	</div>
</section>


<script>
document.addEventListener('DOMContentLoaded', function() {
	const filterTabs = document.querySelectorAll('.filter-tab');
	const teamMembers = document.querySelectorAll('.team-member');
	
	filterTabs.forEach(tab => {
		tab.addEventListener('click', function() {
			const selectedCategory = this.getAttribute('data-category');
			
			// Update active tab
			filterTabs.forEach(t => t.classList.remove('active'));
			this.classList.add('active');
			
			// Filter team members
			teamMembers.forEach(member => {
				if (selectedCategory === 'all') {
					member.classList.remove('hidden');
				} else {
					if (member.classList.contains('category-' + selectedCategory)) {
						member.classList.remove('hidden');
					} else {
						member.classList.add('hidden');
					}
				}
			});
		});
	});
});
</script>

<?php wp_reset_postdata(); ?>