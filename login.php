<!DOCTYPE html>
<?php 
session_start();
if(isset($_SESSION['auth']))
{
    if(!isset($_SESSION['message'])){
        $_SESSION['message'] = "You are already logged In";
    }
    header("Location: user/index.php");
    exit(0);
}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/img/logo.png" type="image/icon type">
    <title>Log in Page</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,700" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel=”stylesheet” href=”https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css” />
    <link rel="stylesheet" href="css/login.css">
    
</head>
<body>
    <section class="vh-100" id="loginPage">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100 background">
        <img src="/img/logo.png" class="col col-xl-6">
        <div class="col col-xl-6">
            <div class="card" style="border-radius: 1rem;">
                <div class="card-body p-4 p-lg-5 text-black form-square">

                <?php include('message.php'); ?>
                
                    <form method="POST" action="logincode.php" class="align-items-center text-start" >
                    
                        <div class="d-flex align-items-center mb-3 pb-1 text-center">
                            <span class="h1 fw-bold mb-0">General Tinio</span>
                        </div>

                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Log in to your account</h5>

                        <div class="form-outline mb-4">
                            <label class="form-label">Email address</label>
                            <input type="email"
                                    id="email"
                                    name="email"
                                    class="form-control form-control-lg" required/>
                        </div>

                        <div class="form-outline mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" 
                                    id="password"
                                    name="password"
                                    pattern=".{8, 15}"
                                    class="form-control form-control-lg mb-1" required/>
                            <div class="form-checkbox">
                                <input type="checkbox" 
                                        class="form-check-input" 
                                        onclick="showPassword()">
                                <i class="fas fa-envelope prefix grey-text pb-3">Show Password</i>
                            </div>
                        </div>

                        <div class="pt-1 mb-4">
                            <button class="btn btn-dark btn-lg btn-block login" type="submit" name="login_btn"">Login</button>
                        </div>

                        
                        <!-- <a class="small text-muted" href="password-reset.php">Forgot password?</a> -->
                        <p class="mb-0 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="register.php" style="color: #393f81;">Register here</a></p>
                        <a href="#!" class="small text-muted">Terms of use.</a>
                        <a href="#!" class="small text-muted">Privacy policy</a>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </div>
    </section>
    <script>
        function showPassword() {
            var user = document.getElementById("password");
            if (user.type === "password") {
                user.type = "text";
            } else {
                user.type = "password";
            }
        }

    </script>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous"></script>
</body>
</html>