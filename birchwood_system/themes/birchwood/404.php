<?php 

/** Template Name: 404*/ 

get_header();

?>

<section class="<?php echo esc_attr($className); ?>" id="<?php echo esc_attr($id); ?>">
  <div class="container container--slim">
    <div class="row">
      <div class="col-md-12">
        <div class="body" style="padding: 40px;">
          <div class="inner" style="text-align:center;">
            <h1 style="color: #b3db6d;">Error 404</h1>
            <p>The link you clicked is broken or has been moved. Try looking for what you need here: <p>
            <a href="/" class="btn" style="margin: 0 auto; max-width: 130px;">Back Home
                <span class="link">
                  <svg xmlns="http://www.w3.org/2000/svg" width="11.787" height="11.788" viewBox="0 0 11.787 11.788">
                  <path id="arrow-down-to-line-solid" d="M4.757,8.089a.835.835,0,0,1-1.18,0L.244,4.755a.834.834,0,0,1,1.18-1.18L3.335,5.487V.833A.833.833,0,1,1,5,.833V5.487L6.913,3.576a.834.834,0,0,1,1.18,1.18L4.76,8.089Z" transform="translate(5.895 11.788) rotate(-135)" fill="#fff"/>
                  </svg>
                </span>
              </a>
          </div>
        </div>
      </div>
    </div>  
  </div>
</section>

<?php get_footer();?>