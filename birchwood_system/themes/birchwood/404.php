<?php 

/** Template Name: 404*/ 

get_header();

?>


<div class="page-header">
  <div class="container container--slim">
    <div class="row">
      <div class="col-md-12 content">
        <div class="inner">
          <h1>Error 404</h1>
        </div>
      </div>
    </div>
  </div>
</div>



<section class="<?php echo esc_attr($className); ?>" id="<?php echo esc_attr($id); ?>">
  <div class="container container--slim">
    <div class="row">
      <div class="col-md-12">
        <div class="body">
          <div class="inner">
            <p>The link you clicked is broken or has been moved. Try looking for what you need here: <p>
            <a href="/" class="btn">Back Home</a>
          </div>
        </div>
      </div>
    </div>  
  </div>
</section>

<?php get_footer();?>