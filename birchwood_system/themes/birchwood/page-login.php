<?php
/* Template Name: Login/Register */
get_header('protected');
?>

<main class="page-wrapper login-register">


<?php $logo = get_field('logo', 'option');  ?>


<div class="protected-login">

<a href="/login" class="logo">
<?php  $logo_url = $logo['url']; 	$logo_alt = $logo['alt']; ?>
		<img class="logo" src="<?php echo esc_html($logo_url); ?>" alt="<?php echo esc_attr($logo_alt); ?>"/>	
</a>


<?php if(have_posts()): 
		while(have_posts()): the_post(); ?>
			<?php the_content(); ?>
		<?php endwhile;
	endif; ?>

	<?php if (isset($_GET['password']) && $_GET['password'] === 'updated'): ?>
    <div class="password-success-alert">
        <h3>✅ Password Set Successfully!</h3>
        <p>Your password has been created. Please log in with your new credentials below.</p>
    </div>
<?php endif; ?>

</div>

<?php get_footer('protected');?>