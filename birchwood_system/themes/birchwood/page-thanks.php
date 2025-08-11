<?php
/* Template Name: Register Thanks */
get_header('protected');
?>

<main class="page-wrapper login-register">


<?php $logo = get_field('logo', 'option');  ?>


<div class="protected-login">

<a href="/login" class="logo">
<?php  $logo_url = $logo['url']; 	$logo_alt = $logo['alt']; ?>
		<img class="logo" src="<?php echo esc_html($logo_url); ?>" alt="<?php echo esc_attr($logo_alt); ?>"/>	
</a>

<div class="content">
<?php if(have_posts()): 
		while(have_posts()): the_post(); ?>
			<?php the_content(); ?>
		<?php endwhile;
	endif; ?>
</div>

</div>

<?php get_footer('protected');?>