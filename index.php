<?php include 'include/config.php'; ?>
<?php include_once 'include/functions.php'; ?>
<!DOCTYPE html>
<html lang="en">

    <?php include 'include/css-url.php'; ?>

<body id="homepage">
  <div id="wrapper">

    <!-- header begin -->
    <?php  include 'include/header.php'; ?>
    <!-- header close -->

    <!-- content begin -->
    <div id="content" class="no-bottom no-top">

      <!-- revolution slider begin -->

      <div id="homeSlider" class="carousel slide" data-ride="carousel">

        <!-- Indicators -->
        <ul class="carousel-indicators">
          <li data-target="#homeSlider" data-slide-to="0" class="active"></li>
          <li data-target="#homeSlider" data-slide-to="1" class=""></li>
          <li data-target="#homeSlider" data-slide-to="2" class=""></li>
        </ul>

        <!-- The slideshow -->
        <div class="carousel-inner">
          <div class="carousel-item active"> <img src="<?= BASE_URL ?>assets/images/slider/wide1.jpg" alt="Residential Properties in Gurgaon">
          </div>
          <div class="carousel-item"> <img src="<?= BASE_URL ?>assets/images/slider/wide2.jpg" alt="Luxury Property in Gurgaon"> </div>
          <div class="carousel-item"> <img src="<?= BASE_URL ?>assets/images/slider/wide3.jpg" alt="Properties in Gurgaon"> </div>
        </div>
        <div class="sliderText">
          <div class="tp-caption big-white sft"> The best way to find your home with </div>
          <div class="tp-caption ultra-big-white customin customout start"> Chaahat Homes </div>
          <div class="tp-caption sfb" data-x="0"> <a href="#section-portfolio" class="btn-slider">Our Portfolio </a>
          </div>
        </div>
        <!-- Left and right controls -->
        <!-- <a class="carousel-control-prev" href="#homeSlider" data-slide="prev"> <span class="carousel-control-prev-icon"></span> </a>
                <a class="carousel-control-next" href="#homeSlider" data-slide="next"> <span class="carousel-control-next-icon"></span> </a> -->
      </div>
      <!-- revolution slider close -->

      <!-- section begin -->
      <?php
          $data_services = get_services($title = null , $limit = 3);
          $filter_data = json_decode($data_services, true); 
          $count = 0;
          if($filter_data['status'] == 1){
      ?>
      <section id="section-about">
        <div class="container">
          <div class="row">
            <div class="col-md-6 offset-md-3 text-center wow fadeInUp">
              <h1> <span class="varColor">What </span>We Are Doing</h1>
              <div class="separator"><span><i class="fa fa-circle"></i></span></div>
              <div class="spacer-single"></div>
            </div>
            <?php 
              foreach ($filter_data['data'] as $services) {
            ?>
                <div class="col-md-4 wow fadeInLeft">
                  <h3><span class="id-color"><?php echo $services['title'] ?></span></h3>
                  <p><?php echo mb_strimwidth($services['description'], 0, 250, '....') ?></p>
                  <a class="home-services-align" href="detail-services.php?sid=<?php echo $services['page_url'] ?>">
                    <img class="img-responsive" src="<?= BASE_URL ?>admin/<?php echo $services['feature'] ?>" alt="<?php echo $services['feature_alt_tag'] ?>"> 
                  </a>
                </div>
            <?php
              $count++;}
            ?>
          </div>
        </div>
      </section>
      <?php
        }
      ?>
      <!-- section close -->

      <!-- section begin -->
      <section id="section-portfolio" class="no-top no-bottom properties" aria-label="section-portfolio">
        <div class="container-fluid">
          <div class="spacer-single"></div>
          <div class="row">
            <div class="col-md-6 offset-md-3 text-center wow fadeInUp">
              <h2> <span class="varColor">TOP </span> PROPERTIES IN DELHI NCR</h2>
              <div class="separator"><span><i class="fa fa-circle"></i></span></div>
              <div class="spacer-single"></div>
            </div>
          </div>
          <div>
            <nav>
              <div class="nav nav-tabs border-bottom-0 justify-content-center" id="nav-tab" role="tablist"> <a
                  class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
                  aria-controls="nav-home" aria-selected="true">Featured</a> <a class="nav-item nav-link"
                  id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile"
                  aria-selected="false">Residential</a> <a class="nav-item nav-link" id="nav-contact-tab"
                  data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact"
                  aria-selected="false">Commercial</a> </div>
            </nav>
            <div class="tab-content  wow fadeInUp" id="nav-tabContent">
              <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <div id="" class="row changeNew gallery" data-wow-delay=".3s">
                  <div class="col-md-3 col-sm-6 item">
                    <div class="picframe properties-inner"> <span class="overlay"
                        onclick="window.open('m3m-golfestate.html','_blank')"> <span class="pf_text"> <span
                            class="project-name">M3M Golf Estate</span> </span> </span> <img src="<?= BASE_URL ?>assets/images/golf.jpg"
                        alt="M3M Golf Estate Gurgaon" /> </div>
                    <div class="properties-detail"> <img src="<?= BASE_URL ?>assets/images/golf-logo.jpg" alt="M3M Golf Estate"
                        class="img-fluid propertyLogo mx-auto d-block">
                      <h3>M3M Golf Estate</h3>
                      <h4><i class="fa fa-inr"></i>3 Crs </h4>
                      <h5>
                        Featured
                      </h5>

                      <p class="property-location"><i class="fa fa-map-marker"></i>Sec - 65, Gurgaon</p>

                      <!-- <span> <a href="#" data-toggle="modal" data-target="#myModal" onclick="return OpenPop('golf-estate', 'M3M Golf Estate', 'Gurgaon','golf-logo.jpg')">Know More</a></span> -->
                      <span> <a href="m3m-golfestate.html" target="_blank">Know More</a></span>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-6 item">
                    <div class="picframe properties-inner"> <span class="overlay"
                        onclick="window.open('m3m-sierra.html','_blank')"> <span class="pf_text"> <span
                            class="project-name">M3M Sierra 68</span> </span> </span> <img src="<?= BASE_URL ?>assets/images/Sierra68.jpg"
                        alt="M3M Sierra Sector 68" /> </div>
                    <div class="properties-detail"> <img src="<?= BASE_URL ?>assets/images/sierra-logo.jpg" alt="M3M Sierra68"
                        class="img-fluid propertyLogo mx-auto d-block">
                      <h3>M3M Sierra68</h3>
                      <h4><i class="fa fa-inr"></i>80 Lacs </h4>
                      <h5>
                        Featured
                      </h5>

                      <p class="property-location"><i class="fa fa-map-marker"></i>Sec - 68, Gurgaon</p>
                      <span> <a href="m3m-sierra.html" target="_blank">Know More</a></span>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-6 item">
                    <div class="picframe properties-inner"> <span class="overlay"
                        onclick="window.open('m3m-woodshire.html','_blank')"> <span class="pf_text"> <span
                            class="project-name">M3M Woodshire</span> </span> </span> <img src="<?= BASE_URL ?>assets/images/wood.jpg"
                        alt="M3M Woodshire" /> </div>
                    <div class="properties-detail"> <img src="<?= BASE_URL ?>assets/images/wood-logo.jpg" alt="M3M Woodshire"
                        class="img-fluid propertyLogo mx-auto d-block">
                      <h3>M3M Woodshire</h3>
                      <h4><i class="fa fa-inr"></i>68 Lacs </h4>
                      <h5>
                        Featured
                      </h5>

                      <p class="property-location"><i class="fa fa-map-marker"></i>Sec - 107, Gurgaon</p>
                      <span> <a href="m3m-woodshire.html" target="_blank">Know More</a></span>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-6 item">
                    <div class="picframe"> <span class="overlay"
                        onclick="window.open('m3m-london-street.html','_blank')"> <span class="pf_text"> <span
                            class="project-name">M3M London Street</span> </span> </span> <img src="<?= BASE_URL ?>assets/images/212.jpg"
                        alt="M3M London Street" /> </div>
                    <div class="properties-detail"> <img src="<?= BASE_URL ?>assets/images/londan.png" alt="M3M London"
                        class="img-fluid propertyLogo mx-auto d-block">
                      <h3>M3M London Street</h3>
                      <h4><i class="fa fa-inr"></i>1.00 Crs </h4>
                      <h5>
                        Featured
                      </h5>
                      <p class="property-location"><i class="fa fa-map-marker"></i>Sec-65, Gurgaon</p>
                      <span> <a href="m3m-london-street.html" target="_blank">Know More</a></span>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-6 item">
                    <div class="picframe"> <span class="overlay" onclick="window.open('m3m-corner-walk.html','_blank')">
                        <span class="pf_text"> <span class="project-name">M3M Corner Walk</span> </span> </span> <img
                        src="<?= BASE_URL ?>assets/images/corner.jpg" alt="M3M Corner Walk" /> </div>
                    <div class="properties-detail"> <img src="<?= BASE_URL ?>assets/images/corner-logo.jpg" alt="M3M Corner Walk logo"
                        class="img-fluid propertyLogo mx-auto d-block">
                      <h3>M3M Corner Walk</h3>
                      <h4><i class="fa fa-inr"></i> 50 Lacs </h4>
                      <h5>
                        Featured
                      </h5>
                      <p class="property-location"><i class="fa fa-map-marker"></i>Sec-74, Gurgaon</p>
                      <span> <a href="m3m-corner-walk.html" target="_blank">Know More</a></span>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-6 item">
                    <div class="picframe"> <span class="overlay" onclick="window.open('trumptower.html','_blank')">
                        <span class="pf_text"> <span class="project-name">Trump Towers</span> </span> </span> <img
                        src="<?= BASE_URL ?>assets/images/trump.jpg" alt="Trump Towers" /> </div>
                    <div class="properties-detail"> <img src="<?= BASE_URL ?>assets/images/trump-logo.jpg" alt="Trump Towers logo"
                        class="img-fluid propertyLogo mx-auto d-block">
                      <h3>Trump Towers</h3>
                      <h4><i class="fa fa-inr"></i> 5.56 Cr. </h4>
                      <h5>
                        Featured
                      </h5>
                      <p class="property-location"><i class="fa fa-map-marker"></i>Golf Course Extn. Road, <br>
                        Gurgaon</p>
                      <span> <a href="trumptower.html" target="_blank">Know More</a></span>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-6 item">
                    <div class="picframe"> <span class="overlay" onclick="window.open('m3m-sky-loft.html','_blank')">
                        <span class="pf_text"> <span class="project-name">M3M Sky Loft</span> </span> </span> <img
                        src="<?= BASE_URL ?>assets/images/sky.jpg" alt="M3M Sky Loft" /> </div>
                    <div class="properties-detail"> <img src="<?= BASE_URL ?>assets/images/sky-logo.jpg" alt="M3M Sky Loft logo"
                        class="img-fluid propertyLogo mx-auto d-block">
                      <h3>M3M Sky Loft</h3>
                      <h4><i class="fa fa-inr"></i> 75 Lacs </h4>
                      <h5>
                        Featured
                      </h5>
                      <p class="property-location"><i class="fa fa-map-marker"></i>Sec-71, Gurgaon</p>
                      <span> <a href="m3m-sky-loft.html" target="_blank">Know More</a></span>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-6 item">
                    <div class="picframe"> <span class="overlay" onclick="window.open('m3m-broadway.html','_blank')">
                        <span class="pf_text"> <span class="project-name">M3M Broadway</span> </span> </span> <img
                        src="<?= BASE_URL ?>assets/images/broad.jpg" alt="M3M Broadway" /> </div>
                    <div class="properties-detail"> <img src="<?= BASE_URL ?>assets/images/broadway-logo.jpg" alt="M3M Broadway logo"
                        class="img-fluid propertyLogo mx-auto d-block">
                      <h3>M3M Broadway</h3>
                      <h4><i class="fa fa-inr"></i> 50 Lacs </h4>
                      <h5>
                        Featured
                      </h5>
                      <p class="property-location"><i class="fa fa-map-marker"></i>Sec-71, Gurgaon</p>
                      <span> <a href="m3m-broadway.html" target="_blank">Know More</a></span>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-6 item">
                    <div class="picframe"> <span class="overlay" onclick="window.open('dlf-the-ultima.html','_blank')">
                        <span class="pf_text"> <span class="project-name">DLF Ultima</span> </span> </span> <img
                        src="<?= BASE_URL ?>assets/images/ultima1.jpg" alt="DLF Ultima" /> </div>
                    <div class="properties-detail"> <img src="<?= BASE_URL ?>assets/images/ultima.jpg" alt="DLF Ultima logo"
                        class="img-fluid propertyLogo mx-auto d-block">
                      <h3>DLF Ultima</h3>
                      <h4><i class="fa fa-inr"></i> 1.5 Cr. </h4>
                      <h5>
                        Featured
                      </h5>
                      <p class="property-location"><i class="fa fa-map-marker"></i>Sec-81, Gurgaon</p>
                      <span> <a href="dlf-the-ultima.html" target="_blank">Know More</a></span>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-6 item">
                    <div class="picframe"> <span class="overlay" onclick="window.open('dlf-the-crest.php','_blank')">
                        <span class="pf_text"> <span class="project-name">DLF Crest</span> </span> </span> <img
                        src="<?= BASE_URL ?>assets/images/crest.jpg" alt="DLF Crest" /> </div>
                    <div class="properties-detail"> <img src="<?= BASE_URL ?>assets/images/crest-logo.jpg" alt="DLF Crest logo"
                        class="img-fluid propertyLogo mx-auto d-block">
                      <h3>DLF Crest</h3>
                      <h4><i class="fa fa-inr"></i> 4.92 Cr. </h4>
                      <h5>
                        Featured
                      </h5>
                      <p class="property-location"><i class="fa fa-map-marker"></i>Sec-54, Gurgaon</p>
                      <span> <a href="dlf-the-crest.php" target="_blank">Know More</a></span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <div id="" class="row changeNew gallery" data-wow-delay=".3s">
                  <div class="col-md-3 col-sm-6 item">
                    <div class="picframe"> <span class="overlay" onclick="window.open('m3m-latitude.html','_blank')">
                        <span class="pf_text"> <span class="project-name">M3M LATITUDE </span> </span> </span> <img
                        src="<?= BASE_URL ?>assets/images/latitude.jpg" alt="M3M LATITUDE" /> </div>
                    <div class="properties-detail"> <img src="<?= BASE_URL ?>assets/images/latitude-logo.jpg" alt="M3M LATITUDE logo"
                        class="img-fluid propertyLogo mx-auto d-block">
                      <h3>M3M LATITUDE </h3>
                      <h4><i class="fa fa-inr"></i> 3.52 Cr. </h4>
                      <h5>
                        Residential
                      </h5>
                      <p class="property-location"><i class="fa fa-map-marker"></i>Sec-65, Gurgaon</p>
                      <span> <a href="m3m-latitude.html" target="_blank">Know More</a></span>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-6 item">
                    <div class="picframe"> <span class="overlay" onclick="window.open('m3m-icon-merlin.html','_blank')">
                        <span class="pf_text"> <span class="project-name">M3M ICON MERLIN </span> </span> </span> <img
                        src="<?= BASE_URL ?>assets/images/icon.jpg" alt="M3M ICON MERLIN" /> </div>
                    <div class="properties-detail"> <img src="<?= BASE_URL ?>assets/images/icon-logo.jpg" Alt="M3M ICON MERLIN Gurgaon"
                        class="img-fluid propertyLogo mx-auto d-block">
                      <h3>M3M ICON MERLIN </h3>
                      <h4><i class="fa fa-inr"></i> 1.9 Cr. </h4>
                      <h5>
                        Residential
                      </h5>
                      <p class="property-location"><i class="fa fa-map-marker"></i>Sec-67, Gurgaon</p>
                      <span> <a href="m3m-icon-merlin.html" target="_blank">Know More</a></span>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-6 item">
                    <div class="picframe properties-inner"> <span class="overlay"
                        onclick="window.open('m3m-sky-suites.html','_blank')"> <span class="pf_text"> <span
                            class="project-name">M3M Sky Suites</span> </span> </span> <img src="<?= BASE_URL ?>assets/images/sky-suit.jpg"
                        alt="M3M Sky Suites Gurgaon" /> </div>
                    <div class="properties-detail"> <img src="<?= BASE_URL ?>assets/images/sky-suite-logo.jpg" alt="M3M Sky Suites"
                        class="img-fluid propertyLogo mx-auto d-block">
                      <h3>M3M Sky Suites</h3>
                      <h4><i class="fa fa-inr"></i>10.56 Crs </h4>
                      <h5>
                        Residential
                      </h5>

                      <p class="property-location"><i class="fa fa-map-marker"></i>Sec-65, Gurgaon</p>
                      <span> <a href="m3m-sky-suites.html" target="_blank">Know More</a></span>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-6 item">
                    <div class="picframe properties-inner"> <span class="overlay"
                        onclick="window.open('IREO-grand-arch.html','_blank')"> <span class="pf_text"> <span
                            class="project-name">IREO Grand Arch</span> </span> </span> <img src="<?= BASE_URL ?>assets/images/arch.jpg"
                        alt="IREO Grand Arch Gurgaon" /> </div>
                    <div class="properties-detail"> <img src="<?= BASE_URL ?>assets/images/arch-logo.jpg" alt="IREO Grand Arch"
                        class="img-fluid propertyLogo mx-auto d-block">
                      <h3>IREO Grand Arch</h3>
                      <h4><i class="fa fa-inr"></i>1.40 Crs </h4>
                      <h5>
                        Residential
                      </h5>

                      <p class="property-location"><i class="fa fa-map-marker"></i>Sec-58, Gurgaon</p>
                      <span> <a href="IREO-grand-arch.html" target="_blank">Know More</a></span>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-6 item">
                    <div class="picframe properties-inner"> <span class="overlay"
                        onclick="window.open('IREO-skyon.html','_blank')"> <span class="pf_text"> <span
                            class="project-name">IREO Skyon </span> </span> </span> <img src="<?= BASE_URL ?>assets/images/skyon.jpg"
                        alt="IREO Skyon Gurgaon" /> </div>
                    <div class="properties-detail"> <img src="<?= BASE_URL ?>assets/images/skyon-logo.jpg" alt="IREO Skyon"
                        class="img-fluid propertyLogo mx-auto d-block">
                      <h3>IREO Skyon </h3>
                      <h4><i class="fa fa-inr"></i>95 Lacs </h4>
                      <h5>
                        Residential
                      </h5>

                      <p class="property-location"><i class="fa fa-map-marker"></i>Sec-60, Gurgaon</p>
                      <span> <a href="IREO-skyon.html" target="_blank">Know More</a></span>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-6 item">
                    <div class="picframe properties-inner"> <span class="overlay"
                        onclick="window.open('IREO-victory-valley.html','_blank')"> <span class="pf_text"> <span
                            class="project-name">Ireo Victory Valley</span> </span> </span> <img
                        src="<?= BASE_URL ?>assets/images/vallery.jpg" alt="Ireo Victory Valley" /> </div>
                    <div class="properties-detail"> <img src="<?= BASE_URL ?>assets/images/valley-logo.jpg" alt="Ireo Victory Valley"
                        class="img-fluid propertyLogo mx-auto d-block">
                      <h3>Ireo Victory Valley</h3>
                      <h4><i class="fa fa-inr"></i>1.31 Crs </h4>
                      <h5>
                        Residential
                      </h5>

                      <p class="property-location"><i class="fa fa-map-marker"></i>Sec-67, Gurgaon</p>
                      <span> <a href="IREO-victory-valley.html" target="_blank">Know More</a></span>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-6 item">
                    <div class="picframe"> <span class="overlay" onclick="window.open('dlf-the-ultima.html','_blank')">
                        <span class="pf_text"> <span class="project-name">DLF Ultima</span> </span> </span> <img
                        src="<?= BASE_URL ?>assets/images/ultima1.jpg" alt="DLF Ultima" /> </div>
                    <div class="properties-detail"> <img src="<?= BASE_URL ?>assets/images/ultima.jpg" alt="DLF Ultima"
                        class="img-fluid propertyLogo mx-auto d-block">
                      <h3>DLF Ultima</h3>
                      <h4><i class="fa fa-inr"></i> 1.5 Cr. </h4>
                      <h5>
                        Residential
                      </h5>
                      <p class="property-location"><i class="fa fa-map-marker"></i>Sec-81, Gurgaon</p>
                      <span> <a href="dlf-the-ultima.html" target="_blank">Know More</a></span>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-6 item">
                    <div class="picframe"> <span class="overlay" onclick="window.open('m3m-natura.html','_blank')">
                        <span class="pf_text"> <span class="project-name">M3M Natura</span> </span> </span> <img
                        src="<?= BASE_URL ?>assets/images/natura.jpg" alt="M3M Natura" /> </div>
                    <div class="properties-detail"> <img src="<?= BASE_URL ?>assets/images/natura-logo.jpg" alt="M3M Natura"
                        class="img-fluid propertyLogo mx-auto d-block">
                      <h3>M3M Natura</h3>
                      <h4><i class="fa fa-inr"></i> 75 Lacs </h4>
                      <h5>
                        Residential
                      </h5>
                      <p class="property-location"><i class="fa fa-map-marker"></i>Sec-68, Gurgaon</p>
                      <span> <a href="m3m-natura.html" target="_blank">Know More</a></span>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-6 item">
                    <div class="picframe"> <span class="overlay" onclick="window.open('m3m-sky-city.html','_blank')">
                        <span class="pf_text"> <span class="project-name">M3M Sky City</span> </span> </span> <img
                        src="<?= BASE_URL ?>assets/images/sky-city1.jpg" alt="M3M Sky City" /> </div>
                    <div class="properties-detail"> <img src="<?= BASE_URL ?>assets/images/sky-city.jpg" alt="M3M Sky City"
                        class="img-fluid propertyLogo mx-auto d-block">
                      <h3>M3M Sky City</h3>
                      <h4><i class="fa fa-inr"></i> 1.05 Cr. </h4>
                      <h5>
                        Residential
                      </h5>
                      <p class="property-location"><i class="fa fa-map-marker"></i>Sec-65, Gurgaon</p>
                      <span> <a href="m3m-sky-city.html" target="_blank">Know More</a></span>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-6 item">
                    <div class="picframe"> <span class="overlay"
                        onclick="window.open('mahindraluminare.html','_blank')"> <span class="pf_text"> <span
                            class="project-name">Mahindra Luminare</span> </span> </span> <img src="<?= BASE_URL ?>assets/images/mahin1.jpg"
                        alt="Mahindra Luminare" /> </div>
                    <div class="properties-detail"> <img src="<?= BASE_URL ?>assets/images/mahin.jpg" alt="Mahindra Luminare"
                        class="img-fluid propertyLogo mx-auto d-block">
                      <h3>Mahindra Luminare</h3>
                      <h4><i class="fa fa-inr"></i> 4.18 Cr. </h4>
                      <h5>
                        Residential
                      </h5>
                      <p class="property-location"><i class="fa fa-map-marker"></i>Sec-59, GURUGRAM</p>
                      <span> <a href="mahindraluminare.html" target="_blank">Know More</a></span>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-6 item">
                    <div class="picframe"> <span class="overlay" onclick="window.open('m3m-sky-loft.html','_blank')">
                        <span class="pf_text"> <span class="project-name">M3M Sky Loft</span> </span> </span> <img
                        src="<?= BASE_URL ?>assets/images/sky.jpg" alt="M3M Sky Loft" /> </div>
                    <div class="properties-detail"> <img src="<?= BASE_URL ?>assets/images/sky-logo.jpg" alt="M3M Sky Loft"
                        class="img-fluid propertyLogo mx-auto d-block">
                      <h3>M3M Sky Loft</h3>
                      <h4><i class="fa fa-inr"></i> 75 Lacs </h4>
                      <h5>
                        Residential
                      </h5>
                      <p class="property-location"><i class="fa fa-map-marker"></i>Sec-71, Gurgaon</p>
                      <span> <a href="m3m-sky-loft.html" target="_blank">Know More</a></span>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-6 item">
                    <div class="picframe"> <span class="overlay" onclick="window.open('trumptower.html','_blank')">
                        <span class="pf_text"> <span class="project-name">Trump Towers</span> </span> </span> <img
                        src="<?= BASE_URL ?>assets/images/trump.jpg" alt="Trump Towers" /> </div>
                    <div class="properties-detail"> <img src="<?= BASE_URL ?>assets/images/trump-logo.jpg" alt="Trump Towers"
                        class="img-fluid propertyLogo mx-auto d-block">
                      <h3>Trump Towers</h3>
                      <h4><i class="fa fa-inr"></i> 5.20 Cr. </h4>
                      <h5>
                        Residential
                      </h5>
                      <p class="property-location"><i class="fa fa-map-marker"></i>Sector-65, Gurgaon</p>
                      <span> <a href="trumptower.html" target="_blank">Know More</a></span>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-6 item">
                    <div class="picframe"> <span class="overlay" onclick="window.open('CHD-Y-Suites.html','_blank')">
                        <span class="pf_text"> <span class="project-name">CHD Y Suites</span> </span> </span> <img
                        src="<?= BASE_URL ?>assets/images/ch1.jpg" alt="CHD Y Suites" /> </div>
                    <div class="properties-detail"> <img src="<?= BASE_URL ?>assets/images/ch.jpg" alt="CHD Y Suites"
                        class="img-fluid propertyLogo mx-auto d-block">
                      <h3>CHD Y Suites</h3>
                      <h4><i class="fa fa-inr"></i> 57.43 Lacs. </h4>
                      <h5>
                        Residential
                      </h5>
                      <p class="property-location"><i class="fa fa-map-marker"></i> Sec-34, Gurgaon</p>
                      <span> <a href="CHD-Y-Suites.html" target="_blank">Know More</a></span>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-6 item">
                    <div class="picframe"> <span class="overlay" onclick="window.open('vipulaarohan.html','_blank')">
                        <span class="pf_text"> <span class="project-name">Vipul Aarohan</span> </span> </span> <img
                        src="<?= BASE_URL ?>assets/images/vipul.jpg" alt="Vipul Aarohan" /> </div>
                    <div class="properties-detail"> <img src="<?= BASE_URL ?>assets/images/vipul-logo.jpg" alt="Vipul Aarohan"
                        class="img-fluid propertyLogo mx-auto d-block">
                      <h3>Vipul Aarohan</h3>
                      <h4><i class="fa fa-inr"></i>2.50 Cr. </h4>
                      <h5>
                        Residential
                      </h5>
                      <p class="property-location"><i class="fa fa-map-marker"></i> Sec-53, Gurgaon</p>
                      <span> <a href="vipulaarohan.html" target="_blank">Know More</a></span>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-6 item">
                    <div class="picframe"> <span class="overlay" onclick="window.open('dlf-the-crest.php','_blank')">
                        <span class="pf_text"> <span class="project-name">DLF Crest</span> </span> </span> <img
                        src="<?= BASE_URL ?>assets/images/crest.jpg" alt="DLF Crest" /> </div>
                    <div class="properties-detail"> <img src="<?= BASE_URL ?>assets/images/crest-logo.jpg" alt="DLF Crest"
                        class="img-fluid propertyLogo mx-auto d-block">
                      <h3>DLF Crest</h3>
                      <h4><i class="fa fa-inr"></i> 4.92 Cr. </h4>
                      <h5>
                        Residential
                      </h5>
                      <p class="property-location"><i class="fa fa-map-marker"></i>Sec-54, Gurgaon</p>
                      <span> <a href="dlf-the-crest.php" target="_blank">Know More</a></span>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-6 item">
                    <div class="picframe"> <span class="overlay"
                        onclick="window.open('Tata-Gurgaon-gateway.html','_blank')"> <span class="pf_text"> <span
                            class="project-name">Tata Gurgaon Gateway</span> </span> </span> <img src="<?= BASE_URL ?>assets/images/tata.jpg"
                        alt="Tata Gurgaon Gateway" /> </div>
                    <div class="properties-detail"> <img src="<?= BASE_URL ?>assets/images/tata-lgog.jpg" alt="Tata Gurgaon Gateway"
                        class="img-fluid propertyLogo mx-auto d-block">
                      <h3>Tata Gurgaon Gateway</h3>
                      <h4><i class="fa fa-inr"></i> 1.19 Cr. </h4>
                      <h5>
                        Residential
                      </h5>
                      <p class="property-location"><i class="fa fa-map-marker"></i>Sec-113, Gurgaon</p>
                      <span> <a href="Tata-Gurgaon-gateway.html" target="_blank">Know More</a></span>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-6 item">
                    <div class="picframe"> <span class="overlay" onclick="window.open('m3m-escala.html','_blank')">
                        <span class="pf_text"> <span class="project-name">M3M Escala</span> </span> </span> <img
                        src="<?= BASE_URL ?>assets/images/escala1.jpg" alt="M3M Escala" /> </div>
                    <div class="properties-detail"> <img src="<?= BASE_URL ?>assets/images/escala.jpg" alt="M3M Escala"
                        class="img-fluid propertyLogo mx-auto d-block">
                      <h3>M3M Escala</h3>
                      <h4><i class="fa fa-inr"></i> 84 Lacs </h4>
                      <h5>
                        Residential
                      </h5>
                      <p class="property-location"><i class="fa fa-map-marker"></i>Sec-70A, Gurgaon</p>
                      <span> <a href="m3m-escala.html" target="_blank">Know More</a></span>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-6 item">
                    <div class="picframe"> <span class="overlay"
                        onclick="window.open('m3m-heightsgurugram.html','_blank')"> <span class="pf_text"> <span
                            class="project-name">M3M Heights</span> </span> </span> <img src="<?= BASE_URL ?>assets/images/height.jpg"
                        alt="M3M Heights" /> </div>
                    <div class="properties-detail"> <img src="<?= BASE_URL ?>assets/images/height-logo.jpg" alt="M3M Heights"
                        class="img-fluid propertyLogo mx-auto d-block">
                      <h3>M3M Heights</h3>
                      <h4><i class="fa fa-inr"></i> 1.06 Cr. </h4>
                      <h5>
                        Residential
                      </h5>
                      <p class="property-location"><i class="fa fa-map-marker"></i>Sec-70A, Gurgaon</p>
                      <span> <a href="m3m-heightsgurugram.html" target="_blank">Know More</a></span>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-6 item">
                    <div class="picframe"> <span class="overlay" onclick="window.open('m3m-merlin.html','_blank')">
                        <span class="pf_text"> <span class="project-name">M3M Merlin </span> </span> </span> <img
                        src="<?= BASE_URL ?>assets/images/merlin.jpg" alt="M3M Merlin" /> </div>
                    <div class="properties-detail"> <img src="<?= BASE_URL ?>assets/images/merlin-logo.jpg" alt="M3M Merlin"
                        class="img-fluid propertyLogo mx-auto d-block">
                      <h3>M3M Merlin </h3>
                      <h4><i class="fa fa-inr"></i> 1.61 Cr. </h4>
                      <h5>
                        Residential
                      </h5>
                      <p class="property-location"><i class="fa fa-map-marker"></i>Sec-67, Gurgaon</p>
                      <span> <a href="m3m-merlin.html" target="_blank">Know More</a></span>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-6 item">
                    <div class="picframe"> <span class="overlay" onclick="window.open('m3m-polo-suites.html','_blank')">
                        <span class="pf_text"> <span class="project-name">M3M Polo Suites </span> </span> </span> <img
                        src="<?= BASE_URL ?>assets/images/polo.jpg" alt="M3M Polo Suites" /> </div>
                    <div class="properties-detail"> <img src="<?= BASE_URL ?>assets/images/polo-logo.jpg" alt="M3M Polo Suites"
                        class="img-fluid propertyLogo mx-auto d-block">
                      <h3>M3M Polo Suites </h3>
                      <h4><i class="fa fa-inr"></i> 4.5 Cr. </h4>
                      <h5>
                        Residential
                      </h5>
                      <p class="property-location"><i class="fa fa-map-marker"></i>Sec-65, Gurgaon</p>
                      <span> <a href="m3m-polo-suites.html" target="_blank">Know More</a></span>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-6 item">
                    <div class="picframe"> <span class="overlay" onclick="window.open('bptp-amstoria.html','_blank')">
                        <span class="pf_text"> <span class="project-name">BPTP AMSTORIA</span> </span> </span> <img
                        src="<?= BASE_URL ?>assets/images/bptp.jpg" alt="BPTP AMSTORIA" /> </div>
                    <div class="properties-detail"> <img src="<?= BASE_URL ?>assets/images/bptp-logo.jpg" alt="BPTP AMSTORIA"
                        class="img-fluid propertyLogo mx-auto d-block">
                      <h3>BPTP AMSTORIA</h3>
                      <h4><i class="fa fa-inr"></i>1.20 Cr.* </h4>
                      <h5>
                        Residential
                      </h5>
                      <p class="property-location"><i class="fa fa-map-marker"></i>Sec 65, Gurgaon</p>
                      <span> <a href="bptp-amstoria.html" target="_blank">Know More</a></span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                <div id="" class="row changeNew gallery" data-wow-delay=".3s">
                  <div class="col-md-3 col-sm-6 item">
                    <div class="picframe properties-inner"> <span class="overlay"
                        onclick="window.open('m3m-ifc.html','_blank')"> <span class="pf_text"> <span
                            class="project-name">M3M INTERNATIONAL FINANCIAL CENTER</span> </span> </span> <img
                        src="<?= BASE_URL ?>assets/images/225.jpg" alt="M3M INTERNATIONAL FINANCIAL CENTER" /> </div>
                    <div class="properties-detail"> <img src="<?= BASE_URL ?>assets/images/ifc.png" alt="M3M IFC"
                        class="img-fluid propertyLogo mx-auto d-block">
                      <h3>M3M INTERNATIONAL FINANCIAL CENTER</h3>
                      <h4><i class="fa fa-inr"></i>1.29 Crs </h4>
                      <h5>
                        Commercial
                      </h5>

                      <p class="property-location"><i class="fa fa-map-marker"></i>Sec - 66, Gurgaon</p>
                      <span> <a href="m3m-ifc.html" target="_blank">Know More</a></span>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-6 item">
                    <div class="picframe"> <span class="overlay" onclick="window.open('m3m-sco-plots.html','_blank')">
                        <span class="pf_text"> <span class="project-name">M3M SCO PLOTS</span> </span> </span> <img
                        src="<?= BASE_URL ?>assets/images/219.jpg" alt="M3M SCO Plots" /> </div>
                    <div class="properties-detail"> <img src="<?= BASE_URL ?>assets/images/sco.png" alt="M3M SCO Plot"
                        class="img-fluid propertyLogo mx-auto d-block">
                      <h3>M3M SCO PLOTS</h3>
                      <h4><i class="fa fa-inr"></i>3.40 Crs </h4>
                      <h5>
                        Commercial
                      </h5>
                      <p class="property-location"><i class="fa fa-map-marker"></i>Sec - 84/113 Gurgaon</p>
                      <span> <a href="m3m-sco-plots.html" target="_blank">Know More</a></span>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-6 item">
                    <div class="picframe"> <span class="overlay" onclick="window.open('m3m-code-73.html','_blank')">
                        <span class="pf_text"> <span class="project-name">M3M PRIVE 73</span> </span> </span> <img
                        src="<?= BASE_URL ?>assets/images/214.jpg" alt="M3M PRIVE 73" /> </div>
                    <div class="properties-detail"> <img src="<?= BASE_URL ?>assets/images/prive.png" alt="M3M PRIVE 73"
                        class="img-fluid propertyLogo mx-auto d-block">
                      <h3>M3M PRIVE 73</h3>
                      <h4><i class="fa fa-inr"></i>53.60 Lac </h4>
                      <h5>
                        Commercial
                      </h5>
                      <p class="property-location"><i class="fa fa-map-marker"></i>Sec 73 Gurgaon </p>
                      <span> <a href="m3m-code-73.html" target="_blank">Know More</a></span>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-6 item">
                    <div class="picframe"> <span class="overlay"
                        onclick="window.open('m3m-london-street.html','_blank')"> <span class="pf_text"> <span
                            class="project-name">M3M London Street</span> </span> </span> <img src="<?= BASE_URL ?>assets/images/212.jpg"
                        alt="M3M London Street" /> </div>
                    <div class="properties-detail"> <img src="<?= BASE_URL ?>assets/images/londan.png" alt="M3M London"
                        class="img-fluid propertyLogo mx-auto d-block">
                      <h3>M3M London Street</h3>
                      <h4><i class="fa fa-inr"></i>1.00 Crs </h4>
                      <h5>
                        Commercial
                      </h5>
                      <p class="property-location"><i class="fa fa-map-marker"></i>Sec-65, Gurgaon</p>
                      <span> <a href="m3m-london-street.html" target="_blank">Know More</a></span>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-6 item">
                    <div class="picframe"> <span class="overlay" onclick="window.open('m3m-urbana.html','_blank')">
                        <span class="pf_text"> <span class="project-name">M3M Urbana</span> </span> </span> <img
                        src="<?= BASE_URL ?>assets/images/200.jpg" alt="M3M Urbana" /> </div>
                    <div class="properties-detail"> <img src="<?= BASE_URL ?>assets/images/62.png" alt="M3M Urbana"
                        class="img-fluid propertyLogo mx-auto d-block">
                      <h3>M3M Urbana</h3>
                      <h4><i class="fa fa-inr"></i>78.00 Lac </h4>
                      <h5>
                        Commercial
                      </h5>
                      <p class="property-location"><i class="fa fa-map-marker"></i>Sec 67, Golf Course <br>
                        Extn Road</p>
                      <span> <a href="m3m-urbana.html" target="_blank">Know More</a></span>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-6 item">
                    <div class="picframe"> <span class="overlay" onclick="window.open('elanepic.html','_blank')"> <span
                          class="pf_text"> <span class="project-name">Elan Epic</span> </span> </span> <img
                        src="<?= BASE_URL ?>assets/images/elan.jpg" alt="Elan Epic" /> </div>
                    <div class="properties-detail"> <img src="<?= BASE_URL ?>assets/images/elanlogo.jpg" alt="Elan Epic"
                        class="img-fluid propertyLogo mx-auto d-block">
                      <h3>Elan Epic</h3>
                      <h4><i class="fa fa-inr"></i>78.00 Lac </h4>
                      <h5>
                        Commercial
                      </h5>
                      <p class="property-location"><i class="fa fa-map-marker"></i>Sector-70 Gurgaon</p>
                      <span> <a href="elanepic.html" target="_blank">Know More</a></span>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-6 item">
                    <div class="picframe"> <span class="overlay" onclick="window.open('aipljoycentral.html','_blank')">
                        <span class="pf_text"> <span class="project-name">Aipl Joy Central</span> </span> </span> <img
                        src="<?= BASE_URL ?>assets/images/api.jpg" alt="Aipl Joy Central" /> </div>
                    <div class="properties-detail"> <img src="<?= BASE_URL ?>assets/images/1.jpg" alt="Aipl Joy Central"
                        class="img-fluid propertyLogo mx-auto d-block">
                      <h3>Aipl Joy Central</h3>
                      <h4><i class="fa fa-inr"></i>40.50 Lac </h4>
                      <h5>
                        Commercial
                      </h5>
                      <p class="property-location"><i class="fa fa-map-marker"></i>Sec 65, Gurgaon</p>
                      <span> <a href="aipljoycentral.html" target="_blank">Know More</a></span>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-6 item">
                    <div class="picframe"> <span class="overlay" onclick="window.open('aipljoysquare.html','_blank')">
                        <span class="pf_text"> <span class="project-name">Aipl Joy Square</span> </span> </span> <img
                        src="<?= BASE_URL ?>assets/images/square.jpg" alt="aipl joy square" /> </div>
                    <div class="properties-detail"> <img src="<?= BASE_URL ?>assets/images/square-logo.jpg" alt="aipl joy square"
                        class="img-fluid propertyLogo mx-auto d-block">
                      <h3>Aipl Joy Square</h3>
                      <h4><i class="fa fa-inr"></i>25 Lac </h4>
                      <h5>
                        Commercial
                      </h5>
                      <p class="property-location"><i class="fa fa-map-marker"></i>Sec 63 A, Gurgaon</p>
                      <span> <a href="aipljoysquare.html" target="_blank">Know More</a></span>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                  <div class="col-md-3 col-sm-6 item">
                    <div class="picframe"> <span class="overlay" onclick="window.open('m3m-teepoint.html','_blank')">
                        <span class="pf_text"> <span class="project-name">M3M Tee Point</span> </span> </span> <img
                        src="<?= BASE_URL ?>assets/images/187.jpg" alt="M3M Tee Point" /> </div>
                    <div class="properties-detail"> <img src="<?= BASE_URL ?>assets/images/55.png" alt="M3M Tee Point"
                        class="img-fluid propertyLogo mx-auto d-block">
                      <h3>M3M Tee Point</h3>
                      <h4><i class="fa fa-inr"></i>36.00 Lac </h4>
                      <h5>
                        Residential
                      </h5>
                      <p class="property-location"><i class="fa fa-map-marker"></i>Sec-65-Gurgaon</p>
                      <span> <a href="m3m-teepoint.html" target="_blank">Know More</a></span>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-6 item">
                    <div class="picframe"> <span class="overlay"
                        onclick="window.open('m3m-cosmopolitan.html','_blank')"> <span class="pf_text"> <span
                            class="project-name">M3M Cosmopolitan</span> </span> </span> <img src="<?= BASE_URL ?>assets/images/com.jpg"
                        alt="M3M Cosmopolitan" /> </div>
                    <div class="properties-detail"> <img src="<?= BASE_URL ?>assets/images/2.jpg" alt="M3M Cosmopolitan"
                        class="img-fluid propertyLogo mx-auto d-block">
                      <h3>M3M Cosmopolitan</h3>
                      <h4><i class="fa fa-inr"></i>60.72 Lac </h4>
                      <h5>
                        Commercial
                      </h5>
                      <p class="property-location"><i class="fa fa-map-marker"></i>Sector-66, Gurgaon</p>
                      <span> <a href="m3m-cosmopolitan.html" target="_blank">Know More</a></span>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-6 item">
                    <div class="picframe"> <span class="overlay"
                        onclick="window.open('m3m-urbana-premium.html','_blank')"> <span class="pf_text"> <span
                            class="project-name">M3M Urbana Premium</span> </span> </span> <img src="<?= BASE_URL ?>assets/images/pre.jpg"
                        alt="M3M Urbana Premium" /> </div>
                    <div class="properties-detail"> <img src="<?= BASE_URL ?>assets/images/pre-logo.jpg" alt="M3M Urbana Premium"
                        class="img-fluid propertyLogo mx-auto d-block">
                      <h3>M3M Urbana Premium</h3>
                      <h4><i class="fa fa-inr"></i>50 Lac </h4>
                      <h5>
                        Commercial
                      </h5>
                      <p class="property-location"><i class="fa fa-map-marker"></i>Sector-67 Gurgaon</p>
                      <span> <a href="m3m-urbana-premium.html" target="_blank">Know More</a></span>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-6 item">
                    <div class="picframe"> <span class="overlay" onclick="window.open('m3m-broadway.html','_blank')">
                        <span class="pf_text"> <span class="project-name">M3M Broadway</span> </span> </span> <img
                        src="<?= BASE_URL ?>assets/images/broad.jpg" alt="M3M Broadway" /> </div>
                    <div class="properties-detail"> <img src="<?= BASE_URL ?>assets/images/broadway-logo.jpg" alt="M3M Broadway"
                        class="img-fluid propertyLogo mx-auto d-block">
                      <h3>M3M Broadway</h3>
                      <h4><i class="fa fa-inr"></i> 50 Lacs </h4>
                      <h5>
                        Featured
                      </h5>
                      <p class="property-location"><i class="fa fa-map-marker"></i>Sec-71, Gurgaon</p>
                      <span> <a href="m3m-broadway.html" target="_blank">Know More</a></span>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-6 item">
                    <div class="picframe"> <span class="overlay" onclick="window.open('m3m-corner-walk.html','_blank')">
                        <span class="pf_text"> <span class="project-name">M3M Corner Walk</span> </span> </span> <img
                        src="<?= BASE_URL ?>assets/images/corner.jpg" alt="M3M Corner Walk" /> </div>
                    <div class="properties-detail"> <img src="<?= BASE_URL ?>assets/images/corner-logo.jpg" alt="M3M Corner Walk Logo"
                        class="img-fluid propertyLogo mx-auto d-block">
                      <h3>M3M Corner Walk</h3>
                      <h4><i class="fa fa-inr"></i>75 Lac </h4>
                      <h5>
                        Commercial
                      </h5>
                      <p class="property-location"><i class="fa fa-map-marker"></i>Sector-74 Gurgaon</p>
                      <span> <a href="m3m-corner-walk.html" target="_blank">Know More</a></span>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-6 item">
                    <div class="picframe"> <span class="overlay" onclick="window.open('aipljoystreet.html','_blank')">
                        <span class="pf_text"> <span class="project-name">Aipl Joy Street</span> </span> </span> <img
                        src="<?= BASE_URL ?>assets/images/street.jpg" alt="Aipl Joy Street Gurgaon" /> </div>
                    <div class="properties-detail"> <img src="<?= BASE_URL ?>assets/images/street-logo.jpg" alt="Aipl Joy Street"
                        class="img-fluid propertyLogo mx-auto d-block">
                      <h3>Aipl Joy Street</h3>
                      <h4><i class="fa fa-inr"></i>45.78 Lac </h4>
                      <h5>
                        Commercial
                      </h5>
                      <p class="property-location"><i class="fa fa-map-marker"></i>Sec 66, Gurgaon</p>
                      <span> <a href="aipljoystreet.html" target="_blank">Know More</a></span>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-6 item">
                    <div class="picframe"> <span class="overlay" onclick="window.open('m3m-65-avenue.html','_blank')">
                        <span class="pf_text"> <span class="project-name">M3M 65TH AVENUE</span> </span> </span> <img
                        src="<?= BASE_URL ?>assets/images/m3m-65-avenue-banner.jpg" alt="M3M 65TH AVENUE Gurgaon" /> </div>
                    <div class="properties-detail"> <img src="<?= BASE_URL ?>assets/images/m3m-65-avenue.jpg" alt="M3M 65TH AVENUE"
                        class="img-fluid propertyLogo mx-auto d-block">
                      <h3>M3M 65TH AVENUE</h3>
                      <h4><i class="fa fa-inr"></i>75 Lac </h4>
                      <h5>
                        Commercial
                      </h5>
                      <p class="property-location"><i class="fa fa-map-marker"></i>Sec 65, Gurgaon</p>
                      <span> <a href="m3m-65-avenue.html" target="_blank">Know More</a></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- add testimonials -->
      <?php include 'include/testimonial.php'; ?>

      <!-- add partner/builder section-->
      <?php include 'include/partner.php'; ?>

    </div>
  </div>





  <?php  include 'include/modal.php'; ?>


<?php  include 'include/footer.php'; ?>
<?php  include 'include/js-url.php'; ?>

</body>

</html>