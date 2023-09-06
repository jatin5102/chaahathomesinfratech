<?php 
    include 'include/config.php'; 
    include 'include/functions.php';

   $page_url = '';
   if(isset($_GET['sid'])){
      $page_url = $_GET['sid'];
   }

   $services_details = get_services($page_url);
   $details_services = json_decode($services_details, true);
   if($details_services['status'] == 1){
      $data = $details_services['data'][0];   
   }
?>
<!DOCTYPE html>
<html lang="en">

<?php include 'include/css-url.php'; ?>

<body id="homepage">
   <div id="wrapper">
      <?php include 'include/header.php'; ?>

      <!-- content begin -->
      <div id="content" class="no-bottom no-top">
         <!-- revolution slider begin -->
         <section class="banner-sec">
            <div class="banner-img">
               <div class="overlay"></div>
               <img src="<?= BASE_URL ?>assets/uploads/services/<?php echo $data['thumbnails']; ?>" alt="">
               <div class="banner-content inter-banner-content">
                  <div class="container">
                     <div class="row">
                        <div class="col-md-12">
                           <div class="banner-text inter-banner-text">
                              <h2><?php echo $data['title']; ?></h2>
                              <span class="decor-equal"></span>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- revolution slider close -->
         <div id="content" style="background-size: cover;">
            <div class="container" style="background-size: cover;">
               <div class="row" style="background-size: cover;">
                  <div class="col-md-12" style="background-size: cover;">
                     <div class="blog-read" style="background-size: cover;">
                        <div class="post-content" style="background-size: cover;">
                           <div class="post-image" style="background-size: cover;">
                              <img src="#" alt="">
                           </div>
                           <div class="post-text" style="background-size: cover;">
                              <?php echo $data['description']; ?>
                           </div>
                        </div>
                        <div class="spacer-single" style="background-size: cover;"></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <section id="section-testimonial" class="text-light">
            <div class="container">
               <div class="row">
                  <div class="col-md-6 offset-md-3 text-center wow fadeInUp">
                     <h1>Customer Says</h1>
                     <div class="separator"><span><i class="fa fa-circle"></i></span></div>
                     <div class="spacer-single"></div>
                  </div>
               </div>
               <div id="testimonial-carousel" class="owl-carousel owl-theme de_carousel wow fadeInUp" data-wow-delay=".3s">
                  <div class="item">
                     <div class="de_testi">
                        <blockquote>
                           <p>I have met with excutive of chaahathomes. It was nice meeting with him and he gave very nice "Comparison and Growth of my Investment". Overall i am completely satisfy with the service of chaahat homes as well as the
                              Executive. Thanks
                           </p>
                           <div class="de_testi_by">
                              UPENDER SINGH
                           </div>
                        </blockquote>
                     </div>
                  </div>
                  <div class="item">
                     <div class="de_testi">
                        <blockquote>
                           <p>It was quite a Very good experience with the Chaahat Homes. The sales person which I met is good he explained everything nicely. Also he is very responsive. overall its was very nice.</p>
                           <div class="de_testi_by">
                              BIJENDER SHARMA
                           </div>
                        </blockquote>
                     </div>
                  </div>
                  <div class="item">
                     <div class="de_testi">
                        <blockquote>
                           <p>Hi team, I really appreciate the services that are provided by Chaahat Homes. The executives are really very kind and humble and always ready to help the client. I am so satisfied with their services that I am just
                              free from all tensions and problems that come across while purchasing the dream home of mine.
                           </p>
                           <div class="de_testi_by">
                              NARENDRA YADAV
                           </div>
                        </blockquote>
                     </div>
                  </div>
               </div>
            </div>
         </section>
      </div>
      <section id="" class="text-light latest-property">
         <div class="container">
            <div class="row">
               <div class="col-md-6 offset-md-3 text-center wow fadeInUp">
                  <h1> <span class="varColor"> Builder</span> Partner </h1>
                  <div class="separator"><span><i class="fa fa-circle"></i></span></div>
                  <div class="spacer-single"></div>
               </div>
            </div>
            <div id="propertyNew" class="owl-carousel owl-theme de_carousel wow fadeInUp" data-wow-delay=".3s">
               <div class="item">
                  <div class="de_testi">
                     <img src="<?= BASE_URL ?>assets/images/central-park.png" class="img-fluid propertyLogo mx-auto d-block">
                  </div>
               </div>
               <div class="item">
                  <div class="de_testi">
                     <img src="<?= BASE_URL ?>assets/images/dlf-ultima.png" class="img-fluid propertyLogo mx-auto d-block">
                  </div>
               </div>
               <div class="item">
                  <div class="de_testi">
                     <img src="<?= BASE_URL ?>assets/images/elan-logo.png" class="img-fluid propertyLogo mx-auto d-block">
                  </div>
               </div>
               <div class="item">
                  <div class="de_testi">
                     <img src="<?= BASE_URL ?>assets/images/trump-tower.png" class="img-fluid propertyLogo mx-auto d-block">
                  </div>
               </div>
               <div class="item">
                  <div class="de_testi">
                     <img src="<?= BASE_URL ?>assets/images/m3m-logo.png" class="img-fluid propertyLogo mx-auto d-block">
                  </div>
               </div>
            </div>
         </div>
      </section>

    <?php include 'include/modal.php'; ?>
    <?php include 'include/js-url.php'; ?>
    <?php include 'include/footer.php'; ?>
</body>


</html>