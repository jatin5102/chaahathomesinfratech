<?php 	include_once 'config/conn.php'; ?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Propfrill | Login</title>
<meta name="keywords" content="">
<meta name="description" content="">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/fontawesome.min.css">
<link rel="stylesheet" href="css/all.min.css">
</head>
<body>
<div class="loader-icon-head"><img class="loader-icon" src="images/icon/loading-gif.gif"/></div>
<?php
session_start();
if(isset($_SESSION['email'])){
  header("Location:index.php");   
}

?>

<section class="loginith">
<div class="login-box">
  <h2>Login</h2>
  <div id="login_error" class="text-danger"></div>
  <div class="form-group">
    <input type="email" class="form-control" placeholder="Enter email" id="email">
    <div id="email_err" class="text-danger"></div>
  </div>
  <div class="form-group">
    <input type="password" class="form-control" placeholder="Enter password" id="password">
    <div id="email_pswrd" class="text-danger"></div>
  </div>
  <div class="form-group form-check">
    <label class="form-check-label">
      <input class="form-check-input" type="checkbox" id="logincheck"> Remember me
      <div id="check_err" class="text-danger"></div>
    </label>
  </div>
  <button type="submit" class="btn btn-primary" id="submit">Submit</button>

</div>
</section>

<?php include_once('layout/footer/footer.php')?>


<script>
    // check valid eamil address custom function
    function IsEmail(email) {
        var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if (!regex.test(email)) {
            return false;
        }
        else {
            return true;
        }
    }
    

    // validation for login page 
    function validation(){
        var flag = true;
        var email = $("#email").val();   
        var pswrd = $("#password").val();   
        

        if(email == ''){
            flag = false;
            $("#email_err").html("Please enter your Email");
        }else if(email != ''){
            if (IsEmail(email) == false) {
                    $("#email_err").html("Please enter valid Email ID");
                    flag = false;
            }else{
                $("#email_err").html("");
                    flag = true;
            }  
            
        } 

        if(pswrd == ''){
            $("#email_pswrd").html("Please enter your Password");
            flag = false;
        }else if(pswrd != ''){
            if(pswrd.length < 5){
                $("#email_pswrd").html("please enter at least 5 characters");                    
                flag = false;
            }else if(pswrd.length > 15){
                $("#email_pswrd").html("please must enter only 15 characters");
                flag = false;
            }else{
                flag = true;
                $("#email_pswrd").html("");
            }

        }


        // On key press
        $('#email').on('keyup', function(){
            if(this.value == ''){
                $("#email_err").html("Please enter your Email");
            }else if(this.value != ''){
                if (IsEmail(this.value) == false) {
                        $("#email_err").html("Please enter valid Email ID");
                }else{
                    $("#email_err").html("");
                }  
                
            }
        });

        $("#password").on('keyup', function(){
            if(this.value == ''){
                $("#email_pswrd").html("Please enter your Password");
            }else if(this.value != ''){
                if(this.value.length < 5){
                    $("#email_pswrd").html("please enter at least 5 characters");                    
                }else if(this.value.length > 15){
                    $("#email_pswrd").html("please must enter only 15 characters");
                }else{
                    $("#email_pswrd").html("");
                }

            }
        });



        if(flag){
            return true;
        }else{
            return false;
        }   

    }
    




    $(document).ready(function(){
        
        $("#logincheck").on("click", function(){
            
            if($("#logincheck").is(":checked"))
            {
                $("#check_err").html("");
            }else{
                $("#check_err").html("Please check keep me loged in");
            }
        });

        $("#submit").on('click', function(){
            
            if(!validation()){
                return true;
            }

            if($("#logincheck").is(":checked")){
                $("#check_err").html("");
                var email = $("#email").val();
                var password = $("#password").val();
                
                $(".loader-icon-head").css('display', 'flex');
                
                $.ajax({
                    url : 'ajax/login/ajax-login-insert.php',
                    type : 'POST', 
                    data : {"email" : email, "password" : password}, 
                    success : function(resp){
                        var login_status = resp;
                        $(".loader-icon-head").css('display', 'none');
                        if(login_status == 1){
                            location.reload();
                       }else{
                            $("#login_error").html("Incorrect your Login ID or Password");    
                       }
                    }
                });
            }else{
                $("#check_err").html("Please check keep me loged in");
            }
            
            
        });
    });
</script>