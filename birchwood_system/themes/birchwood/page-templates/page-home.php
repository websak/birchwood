<?php
/* Template Name: Home*/
get_header();
?>


<?php $homepage_banner = get_field('homepage_banner'); ?>


<div class="page-header">
	<div class="container container--slim">
		<div class="row">
			<div class="col-md-9">
				<h1><?php echo $homepage_banner['title'];?></h1>
			</div>
			<div class="col-md-3 content">
				<div class="inner">
					<?php echo $homepage_banner['text'];?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php if(have_posts()): 
		while(have_posts()): the_post(); ?>
<?php the_content(); ?>
<?php endwhile;
	endif; ?>


<?php get_footer();?>