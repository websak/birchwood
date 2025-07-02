</main>


<footer class="c-footer">
  <div class="container container--slim">
    <div class="row">
      <div class="col-md-12">
        <?php $content = get_field('disclaimer', 'option'); $logo = get_field('logo', 'option');?>
        <?php echo $content;?>
      </div>
      <div class="col-md-8">
        <ul>
          <li><a href="/privacy-policy">Privacy Policy</a></li>
          <li>Copyright &copy; <?php echo date('Y');?> Gerald Eve. All rights reserved.</li>
          <!-- <li><a href="<?//php echo wp_logout_url( home_url() ); ?>">Logout</a></li> -->
        </ul>
      </div>
      <div class="col-md-4">
        <p class="logo"><img src="<?php echo $logo['url'];?>" alt="<?php echo $logo['alt'];?>"></p>
      </div>
    </div>
  </div>

</footer>

<?php wp_footer(); ?>
</body>
</html>