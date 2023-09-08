<?php 
    include 'include/config.php'; 
    include_once 'include/functions.php';

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
               <img src="<?= BASE_URL ?>admin/<?php echo $data['thumbnails']; ?>" alt="">
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
      </div>
      <!-- testimonials section -->
         <?php include 'include/testimonial.php'; ?>
      <!-- testimonials section -->
      
      <!-- include developer/partner -->
      <?php include 'include/partner.php'; ?>


    <?php include 'include/modal.php'; ?>
    <?php include 'include/js-url.php'; ?>
    <?php include 'include/footer.php'; ?>
</body>


</html>