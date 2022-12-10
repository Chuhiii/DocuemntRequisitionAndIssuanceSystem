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
    <title>Registration Page</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,700" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel=”stylesheet” href=”https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css” />
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <section class="vh-100" id="loginPage">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-12">

        <?php include('message.php'); ?>
        
            <div class="card" style="border-radius: 1rem;">
                <div class="card-body p-4 p-lg-5 text-black">

                    <form method="POST" action="registercode.php" class="align-items-center text-start" enctype="multipart/form-data">
                    <div class="d-flex align-items-center mb-3 pb-1 text-center">
                        <span class="h1 fw-bold mb-0">User</span>
                    </div>

                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Register your account</h5>
                    <div class="row">
                        <div class="form-outline mb-4 col-6">
                            <label class="form-label">First Name</label>
                            <input type="text"
                                    id="fname"
                                    name="fname"
                                    class="form-control form-control-lg" required/>
                        </div>

                        <div class="form-outline mb-4 col-6">
                            <label class="form-label">Middle Initial</label>
                            <input type="text"
                                    id="mname"
                                    name="mname"
                                    style="text-transform:uppercase"
                                    class="form-control form-control-lg"/>
                        </div>

                        <div class="form-outline mb-4 col-6">
                            <label class="form-label">Last Name</label>
                            <input type="text"
                                    id="lname"
                                    name="lname"
                                    class="form-control form-control-lg" required/>
                        </div>

                        <div class="form-outline mb-2 col-6">
                            <div class="row">
                                <label class="form-label col-6">Gender: </label>
                                <input type="radio" id="male" class="gender" value="male" name="gender">
                                <label for="male">Male</label>
                                <input type="radio" id="female" class="gender" value="female" name="gender">
                                <label for="female">Female</label>
                            </div>    
                        </div>

                        <div class="form-outline mb-4 col-6">
                            <label class="form-label">Birthday: </label>
                            <input type="date" required
                                    id="birthday"
                                    name="birthday"
                                    class="form-control form-control-lg" required/>
                        </div>

                        <div class="form-outline mb-4 col-3">
                            <label class="form-label">Monthly Income:</label>
                            <input type="number" required
                                    id="income"
                                    name="income"
                                    class="form-control form-control-lg" required/>
                        </div>

                        <div class="form-outline mb-4 col-3">
                            <label class="form-label">Proof</label>
                            <input type="file" required
                                    id="incomeProof"
                                    name="incomeProof"
                                    class="form-control form-control-lg" required/>
                        </div>
                    

                        <div class="form-outline mb-4 col-12">
                            <label class="form-label">Address</label>
                            <input type="text" required
                                    id="address"
                                    name="address"
                                    class="form-control form-control-lg" required/>
                        </div>
                    

                        <div class="form-outline mb-4 col-12">
                            <label class="form-label">Mobile Number</label>
                            <input type="tel" required pattern="[0-9]{11}"
                                    maxlength="11"
                                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                    id="mobileNumber"
                                    name="mobileNumber"
                                    placeholder="09xxxxxxxxx"
                                    class="form-control form-control-lg" required/>
                        </div>

                    <div class="form-outline mb-4 col-6">
                        <label class="form-label">Email address</label>
                        <input type="email" required
                                id="email"
                                name="email"
                                class="form-control form-control-lg" required/>
                    </div>

                    <div class="form-outline mb-3 col-5">
                        <label class="form-label">Password</label>
                        <input type="password" required
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
                        <input type="password" 
                                id="conPass"
                                name="conPass"
                                pattern=".{8, 15}"
                                class="form-control form-control-lg mb-1" required/>
                        <div class="form-checkbox">
                            <input type="checkbox"
                                    class="form-check-input" 
                                    onclick="showPassword2()">
                            <i class="fas fa-envelope prefix grey-text pb-3">Show Password</i>
                        </div>
                        <div class="form-outline mb-4 col-6">
                        <input type="hidden"
                                id="role"
                                name="role"
                                value="0"
                                class="form-control form-control-lg" required/>
                    </div>
                    </div>
                     </div>

                    <div class="pt-1 mb-4">
                        <button class="btn btn-dark btn-lg btn-block login" type="submit" name="register_btn" ">Register</button>
                    </div>


                    <!-- Modal -->
                    <!-- <a class="small text-muted" href="#!">Forgot password?</a> -->
                    <p class="mb-0 pb-lg-2" style="color: #393f81;">have an account? <a href="login.php" style="color: #393f81;">Login here</a></p>
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
        function showPassword2() {
            var user = document.getElementById("conPass");
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