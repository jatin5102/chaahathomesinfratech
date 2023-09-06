<?php 
    include 'include/config.php'; 
    include 'include/functions.php';
?>

<!DOCTYPE html>
<html lang="en">

<?php include 'include/css-url.php'; ?>
 

<body class="page-services">

    <div id="wrapper">
        <!-- header begin -->
        <?php include 'include/header.php'; ?>
        <!-- header close -->

        <!-- subheader -->
        <section class="banner-sec service1">
            <div class="banner-img">
                <div class="overlay"></div>
                <img class="img-fluid" src="<?= BASE_URL ?>assets/images/slider/wide7.jpg">
                <div class="banner-content inter-banner-content">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="banner-text inter-banner-text">

                                    <h1>Service</h1>
                                    <span class="decor-equal"></span>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- subheader close -->

        <!-- content begin -->
        <div id="content" class="no-top no-bottom">

            <!-- section service begin -->
            <?php 
                $data_services = get_services();
                $filter_data = json_decode($data_services, true); 
                $count = 0;
                if($filter_data['status'] == 1){
                    foreach ($filter_data['data'] as $services) {
            ?>
                        <section id="section-service-1" class="side-bg no-padding" style="<?=($count%2 == 0) ?  'background-color:#000' : 'background-color:#212225; display:flex; flex-direction: row-reverse;' ?>">
                            <div class="image-container col-md-5 pull-left" data-delay="0">
                                <div class="background-image">
                                    <img src="<?= BASE_URL ?>/assets/uploads/services/<?php echo $services['feature']; ?>" />
                                </div>
                            </div>

                            <div class="container">
                                <div class="row py-5" style="<?=($count%2 == 0) ?  'background-color:#000' : 'display:flex; flex-direction: row-reverse;' ?>">
                                        <div class="col-md-6"></div>
                                        <div class="col-md-6 wow fadeInRight" data-wow-delay=".5s">
                                            <h3 class="id-color"><?php echo $services['title']; ?></h3>
                                            <p><?php echo mb_strimwidth($services['description'], 0, 120, '...') ?></p>
                                            <div class="spacer-single"></div>
                                            <a href="detail-services.php?sid=<?php echo $services['page_url'] ?>" class="btn-line">Read More</a>
                                        </div>
                                        <div class="clearfix"></div>
                                </div>
                            </div>
                        </section>
            <?php
                    $count++;}
                }
            ?>
        </div>

        <!-- footer begin -->
      
        <!-- footer close -->

    </div>
    <?php include 'include/modal.php'; ?>
    <?php include 'include/js-url.php'; ?>
    <?php include 'include/footer.php'; ?>
</body>


</html>