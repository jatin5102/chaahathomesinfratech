<?php 
    include 'include/config.php'; 
    include 'include/functions.php';
?>
<!DOCTYPE html>
<html lang="en">
    <?php include 'include/css-url.php'; ?>
<body id="homepage">

    <div id="wrapper">
        <?php  include 'include/header.php' ?>
        <!-- content begin -->
        <div id="content" class="no-bottom no-top">

            <!-- revolution slider begin -->
            <section class="banner-sec">
                <div class="banner-img">
                    <div class="overlay"></div>
                    <img class="img-fluid" src="<?= BASE_URL ?>assets/images/career.jpg">
                    <div class="banner-content inter-banner-content">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="banner-text inter-banner-text">

                                        <h2>Testimonials</h2>
                                        <span class="decor-equal"></span>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- revolution slider close -->

            <!-- section begin -->
            <section style="background-color: rgb(70, 77, 88); background-size: cover;" class="testimonial_section">
                <div class="container">
                    <h5 class="s2 text-center">Client Testimonials</h5>
                    <h1>Customer Says</h1>
                    <div class="separator" >
                        <span>
                            <i class="fa fa-square"></i>
                        </span>
                    </div>

                    <div class="row">
                        <?php 
                            $testi = get_testimonials();
                            $data_decode = json_decode($testi, true);
                            if($data_decode['status'] == 1){
                                foreach($data_decode['data'] as $testimonials){
                        ?>
                                    <div class="col-md-6 testimonial_box">
                                        <div class="box">
                                            <div class="left">
                                                <img src="<?= BASE_URL ?>assets/images/icon/quote.png" alt="quote " class="quote_icon" />
                                            </div>
                                            <div class="right">
                                                <p class="description">Hi team, I really appreciate the services that are provided by Chaahat Homes. The executives are really very kind and humble and always ready to help the client. I am so satisfied with their services that I am just free from all tensions and problems that come across while purchasing the dream home of mine.</p>
                                                <p class="name">Narendra Yadav</p>  
                                            </div>
                                        </div>
                                    </div>
                        <?php
                                }
                            }
                        ?>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <?php  include 'include/footer.php' ?>
    <?php  include 'include/modal.php' ?>
    <?php  include 'include/js-url.php' ?>
    
</body>


</html>