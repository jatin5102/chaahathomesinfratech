

<script>
  var BASE_URL="<?php echo BASE_URL ?>";
</script>
  <!-- Javascript Files
    ================================================== -->
  <script src="<?= BASE_URL ?>assets/js/jquery.min.js"></script>
  <script src="<?= BASE_URL ?>assets/js/jpreLoader.js"></script>
  <script src="<?= BASE_URL ?>assets/js/bootstrap.min.js"></script>
  <script src="<?= BASE_URL ?>assets/js/jquery.isotope.min.js"></script>
  <script src="<?= BASE_URL ?>assets/js/easing.js"></script>
  <script src="<?= BASE_URL ?>assets/js/jquery.flexslider-min.js"></script>
  <script src="<?= BASE_URL ?>assets/js/jquery.scrollto.js"></script>
  <script src="<?= BASE_URL ?>assets/js/owl.carousel.js"></script>
  <script src="<?= BASE_URL ?>assets/js/jquery.countTo.js"></script>
  <script src="<?= BASE_URL ?>assets/js/classie.js"></script>
  <script src="<?= BASE_URL ?>assets/js/video.resize.js"></script>
  <script src="<?= BASE_URL ?>assets/js/validation.js"></script>
  <script src="<?= BASE_URL ?>assets/js/wow.min.js"></script>
  <script src="<?= BASE_URL ?>assets/js/jquery.magnific-popup.min.js"></script>
  <script src="<?= BASE_URL ?>assets/js/jquery.stellar.min.js"></script>
  <script src="https://api2.gtftech.com/Scripts/queryform.min.ssl.js"></script>
  <script src="<?= BASE_URL ?>assets/js/designesia.js"></script>
  <script src="<?= BASE_URL ?>assets/js/custom.js"></script>
  <script src="<?= BASE_URL ?>assets/rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
  <script src="<?= BASE_URL ?>assets/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>




  <script>
    var AgentInfo = {
      "vAgentID": "4421",
      "vProject": "Chaahat Homes Infratech",
      "vURL": "http://www.chaahathomesinfratech.com",
      "thankspageurl": "http://www.chaahathomesinfratech.com/thanks.htm",
    };

    $('#preferedtime').hide();

    $("#SubmitQuery").click(function () {
      var FormInfo = {
        "SenderControlID": "qSenderName",
        "SenderControlMobileID": "qMobileNo",
        "SenderControlEmailID": "qEmailID",
        "SenderControlMsgID": "qMessage"
      };

      SubmitQueryData(AgentInfo, FormInfo);
    });


    $("#SubmitQueryfooter").click(function () {
      var FormInfo = {
        "SenderControlID": "qSenderNamefooter",
        "SenderControlMobileID": "qMobileNofooter",
        "SenderControlEmailID": "qEmailIDfooter",
        "SenderControlMsgID": "qMessagefooter"
      };

      SubmitQueryData(AgentInfo, FormInfo);
    });

    $("#SubmitQuerymodal2").click(function () {
      var FormInfo = {
        "SenderControlID": "qSenderNamemodal2",
        "SenderControlMobileID": "qMobileNomodal2",
        "SenderControlEmailID": "qEmailIDmodal2",
        "SenderControlMsgID": "qMessagemodal2"
      };

      SubmitQueryData(AgentInfo, FormInfo);
    });

    $("#SubmitQuerymodal3").click(function () {
      var FormInfo = {
        "SenderControlID": "qSenderNamemodal3",
        "SenderControlMobileID": "qMobileNomodal3",
        "SenderControlEmailID": "qEmailIDmodal3",
        "SenderControlMsgID": "qMessagemodal3"
      };

      SubmitQueryData(AgentInfo, FormInfo);
    });
  </script>


  <!--from script start-->
  <script>
    $(document).ready(function () {

      $(window).scroll(function () {
        if ($(window).width() < 768 && $(this).scrollTop() > 300) {
          $(".mobile-section").show();
        } else {
          $(".mobile-section").hide();
        }

      });

    })
  </script> 