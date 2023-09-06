<?php include 'include/config.php'; ?>
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
                    <img class="img-fluid" src="<?= BASE_URL ?>assets/images/contact.jpg">
                    <div class="banner-content inter-banner-content">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="banner-text inter-banner-text">

                                        <h2>Contact Us</h2>
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
            <section>
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 wow fadeInLeft">
                            <div class="why-us-sec">
                                <h2> Reach Us</span>
                                </h2>
                            </div>
                            <div class="contact-text">
                                <h4>Chaahat Homes Infratech Pvt. Ltd.</h4>

                                <p>M3M TeePoint, South Block, 6th Floor, Sector 65 <br> Gurugram, Haryana 122002</p>
                                <h5><i class="fa fa-phone" aria-hidden="true"></i>&nbsp;+91-9810277378</h5>
                                <h5><i class="fa fa-envelope-open-o" aria-hidden="true"></i>&nbsp;chaahathomes@gmail.com</h5>
                                <h5><i class="fa fa-globe" aria-hidden="true"></i>&nbsp; <a href="https://chaahathomesinfratech.com/">https://chaahathomesinfratech.com</a> </h5>
                            </div>
                            <br><br>
                            <div class="newsletter-form">
                                <h3>SUBSCRIBE TO NEWSLETTER</h3>
                                <input type="email" placeholder="Enter Your Email Address" required="" class="frm">
                                <input type="submit" value="Subscribe" class="btn">
                            </div>
                        </div>
                        <div class="col-md-6 wow fadeInRight">
                            <div class="why-us-sec">
                                <h2> Get In Touch with Us</span>
                                </h2>
                            </div>
                            <div class="contact-form-sec">
                                <form metho="POST" id="ContactQuery" name="ContactQuery">
                                    <div class="form-group">
                                        <label for="name">Your Name *</label>
                                        <input type="text" class="form-control" placeholder="Name" id="query_name" name="query_name">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email address *</label>
                                        <input type="text" class="form-control" placeholder="E-Mail ID" id="query_email" name="query_email">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Phone Number *</label>
                                        <input type="text" class="form-control" placeholder="Phone Number" id="query_phone" name="query_phone">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Message *</label>
                                        <textarea class="form-control" rows="6" placeholder="Comment" id="query_msg" name="query_msg"></textarea>
                                    </div>

                                    <input type="submit" class="btn btn-warning" value="SUBMIT" id="ContactQuery">
                                </form>

                            </div>

                        </div>
                    </div>
                </div>
            </section>
            <section class="map">
                <div class="container-fluid px-md-0">
                    <div class="row">
                        <div class="col-12">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14033.995237376499!2d77.0588533!3d28.4343762!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x47e5e257348e1ffc!2sChaahat+Homes+Infratech+Pvt.+Ltd.!5e0!3m2!1sen!2sin!4v1541136173815" width="100%"
                                frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                    </div>

                </div>
            </section>
        </div>

        <!-- footer begin -->
   
    </div>
    <?php  include 'include/footer.php' ?>
    <?php  include 'include/modal.php' ?>
    <?php  include 'include/js-url.php' ?>
</body>
</html>
<script>
    $(document).on('submit',"#ContactQuery", function(e){
    
        e.preventDefault(0);
        // debugger;
        var formData = new FormData(this);
        $.ajax({
            url : BASE_URL+'ajax/contact/ajax-contact-insert.php',
            type: "POST",
            data: formData,
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            success : function(resp){
                var data=JSON.parse(JSON.stringify(resp));
                if(data.status==3){
                    $('.errors').remove();
                    var keys = Object.keys(data.errors);
                    for (let index = 0; index < keys.length; index++) {
                        var keynam=keys[index];
                        $('#'+keynam).after('<p class="errors text-danger">'+data.errors[keynam]+'<p>');
                            if(index==0){
                                $('#'+keynam).focus();
                            }
                    }
                    alert(data.message);

                }else if(data.status==1){
                    window.location.reload();
                    alert(data.message);

                }else{
                        window.location.reload();
                        alert(data.message);
                }
            }
        })
    });

</script>