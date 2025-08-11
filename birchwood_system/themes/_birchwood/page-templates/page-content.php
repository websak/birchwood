<?php
/**
 * Template Name: Content Page
 */
?>

<?php if ( post_password_required() ) : ?>
	<?php get_header('protected');?>
  		<?php $logo = get_field('logo', 'option');?>
			<img src="<?php echo $logo['url'] ?>">
			<div class="container">
				<?php echo get_the_password_form();?>
			</div>
	<?php get_footer('protected');?>
<?php else :?>

<?php get_header(); ?>

<?php 

$page_header = get_field("banner");
$banner_image = $page_header['banner_image'];
$banner_title = $page_header['banner_title'];
$banner_text = $page_header['banner_text'];
?>

<!-- Page header -->

<div class="page-header" style="background-image: url('<?php echo $banner_image['url']; ?>');">
  <div class="container container--slim">
    <div class="row">
      <div class="col-md-12 content">
        <div class="inner">
          <?php if(!empty($banner_title)): ?>

          <h1><?php echo $banner_title; ?></h1>
          <?php else: ?>
          <h1><?php echo get_the_title(); ?></h1>

          <?php endif; ?>
          <?php if(!empty($banner_text)): ?>
          <?php echo $banner_text;?>
          <?php endif;?>
        </div>
      </div>
    </div>
  </div>

</div>
<!-- End Page Header -->


<main class="page-content">

  <?php if(have_posts()): 
		while(have_posts()): the_post(); ?>
  <?php the_content(); ?>
  <?php endwhile;
	endif; ?>




	<?php get_footer();?>

  <?php endif;?>