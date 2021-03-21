<?php
$con= new mysqli('localhost:3306','root','','pawdb')or die("Could not connect to mysql".mysqli_error($con));
// session_start(); 
if(isset($_SESSION["user"])) 
{ 
    session_destroy(); 
} 
if(isset($_POST['register'])){ 

    $username = $_POST['username'];
    $email= $_POST['email'];
    $password = $_POST['password']; 
    $username = stripslashes($_REQUEST['username']);
    $username = mysqli_real_escape_string($con,$username); 
    $email = stripslashes($_REQUEST['email']);
    $email = mysqli_real_escape_string($con,$email);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($con,$password);
    $role = $_POST['role'];
    $query = "INSERT into masterlogin (username,  email, password, role)
VALUES ('$username',  '$email', '$password', '$role')";
    $result = mysqli_query($con,$query);
    if($result){
        echo "<script>setTimeout(\"location.href = 'login.php';\",500);</script>";
        }
        else
        {
            echo "Failure!";
        
        } 
    } 
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Donate</title>
    <link rel="icon" href="img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- animate CSS -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <!-- themify CSS -->
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="css/flaticon.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="css/magnific-popup.css">
    <!-- style CSS 
    <link rel="stylesheet" href="css/style.css">-->
    <style>
body {
  background-image: url('img/banner.png');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
}
</style>

</head>

<body>
    <header class="header_area">
        <div class="sub_header">
            <div class="container">
                <div class="row align-items-center">
                  <div class="col-4 col-md-4 col-xl-6">
                  </div>
                  <div class="col-8 col-md-8 col-xl-6 ">
                    
                      <div class="sub_header_social_icon float-right">
                        <a href="#"><i class="flaticon-phone"></i>12345 56789</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main_menu">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg navbar-light">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <i class="ti-menu"></i>
                            </button>

                            <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                                <ul class="navbar-nav">
                                    <li class="nav-item active">
                                        <a href= "login.php" class="nav-link active"><b><u>DONATE TODAY</b></u></a>
                                    </li>
                                    
                                </ul>
                            </div>
                        </nav>
                     </div>
                </div>
            </div>
        </div>
    </header>
<br>

<!-- Header part end--> 
<section class="banner_part">
 <!-- register -->
            <div class="container">
                <div class="row align-content-center">
                <div id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                 <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel"><b>Register</b></h5>
                </div>

            <div class="modal-body">
                <form  method="POST" class="p-sm-3">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Name</label>
                        <input type="text" class="form-control" placeholder="" name="username" id="recipient-rname" required="">
                    </div>
                    <div class="form-group">
                        <label for="recipient-email" class="col-form-label">Email</label>
                        <input type="email" class="form-control" placeholder="" name="email" id="recipient-email" required="">
                    </div>
                    <div class="form-group">
                        <label for="password1" class="col-form-label">Password</label>
                        <input type="password" class="form-control" placeholder="" name="password" id="password" required="">
                    </div>
                    
                    <div class="sub-w3l">
                        <div class="sub-w3_pvt">
                            <input type="checkbox" id="brand2" value="">
                            <label for="brand2" class="mb-3">
                                <span></span>I Accept to the Terms & Conditions</label>
                        </div>
                    </div>
                    <div class="right-w3l button">
                        <input type="submit" class="form-control" type="submit" name="register" value="Sign Up">
                    </div>
                </form>
                
        </div>
    </div>
</div>
</div>
</div>
</section>
<footer>
  <p>Made by Vidhi Punjabi<br>

</footer>

</html>

