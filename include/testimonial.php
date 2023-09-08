<?php 
  include_once 'include/functions.php';
  $testi = get_testimonials();
  $data_decode = json_decode($testi, true);
  if($data_decode['status'] == 1){
?>

<section id="section-testimonial" class="text-light">
  <div class="container">
    <div class="row">
      <div class="col-md-6 offset-md-3 text-center wow fadeInUp">
        <h2> <span class="varColor"> Customer </span>Says</h2>
        <div class="separator"><span><i class="fa fa-circle"></i></span></div>
        <div class="spacer-single"></div>
      </div>
    </div>
    <div id="testimonial-carousel" class="owl-carousel owl-theme de_carousel wow fadeInUp" data-wow-delay=".3s">
      <?php 

        foreach($data_decode['data'] as $testimonials){
      ?>
          <div class="item">
            <div class="de_testi">
              <blockquote>
                <p><?php echo $testimonials['description'] ?></p>
                  <div class="de_testi_by"><?php echo $testimonials['name'] ?></div>
                </blockquote>
              </div>
          </div>
      <?php
        }
      ?>  
    </div>
  </div>
</section>
<?php 
  }
?>