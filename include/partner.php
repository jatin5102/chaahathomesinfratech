<?php
      include_once 'include/functions.php'; 
      $decode_partner = get_all_developer();
      $partner_data = json_decode($decode_partner, true);
      if($partner_data['status'] == 1){
?> 

<section id="" class="text-light latest-property">
      <div class="container">
            <div class="row">
                  <div class="col-md-6 offset-md-3 text-center wow fadeInUp">
                        <h2> <span class="varColor"> Builder</span> Partner </h2>
                        <div class="separator"><span><i class="fa fa-circle"></i></span></div>
                        <div class="spacer-single"></div>
                  </div>
            </div>
            <div id="propertyNew" class="owl-carousel owl-theme de_carousel wow fadeInUp" data-wow-delay=".3s">
                  <?php
                        foreach($partner_data['data'] as $partner){
                  ?>
                              <div class="item">
                                    <div class="de_testi">
                                          <img class="img-fluid propertyLogo mx-auto d-block" src="<?= ADMIN_ASSETS ?>developer/<?php echo $partner['logo'] ?>" alt="central park" /> 
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