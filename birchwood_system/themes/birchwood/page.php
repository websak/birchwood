<?php
get_header();
?>

<?php 

$page_header = get_field("banner");
$banner_image = $page_header['banner_image'];
$banner_title = $page_header['banner_title'];
$banner_text = $page_header['banner_text'];
?>

<!-- Page header -->

<div class="page-header" style="background-image:url('<?php echo $banner_image['url'];?>')">
  <div class="container container--slim">
    <div class="row">
      <div class="col-md-12">
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
</div>

<main class="page-wrapper">
<?php if(have_posts()): 
		while(have_posts()): the_post(); ?>
			<?php the_content(); ?>
		<?php endwhile;
	endif; ?>


<?php get_footer();?>