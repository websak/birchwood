<?php
/* Template Name: Home*/
get_header();
?>


<?php $banner = get_field("homepage_banner");?>


<?php if(have_posts()): 
		while(have_posts()): the_post(); ?>
<?php the_content(); ?>
<?php endwhile;
	endif; ?>


<?php get_footer();?>