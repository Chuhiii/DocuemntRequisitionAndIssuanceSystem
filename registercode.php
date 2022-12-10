<?php
session_start();  
include('connection.php');

if(isset($_POST['register_btn']))
{
    $fname = mysqli_real_escape_string($con, $_POST['fname']);
    $mname = mysqli_real_escape_string($con, $_POST['mname']);
    $lname =  mysqli_real_escape_string($con, $_POST['lname']);
    $gender =  mysqli_real_escape_string($con, $_POST['gender']);
    $address =  mysqli_real_escape_string($con, $_POST['address']);
    $mobileNumber =  mysqli_real_escape_string($con, $_POST['mobileNumber']);
    $email =  mysqli_real_escape_string($con, $_POST['email']);
    $password =  mysqli_real_escape_string($con, $_POST['password']);
    $conPass =  mysqli_real_escape_string($con, $_POST['conPass']);
    $birthday = mysqli_real_escape_string($con, $_POST['birthday']);
    $income = mysqli_real_escape_string($con, $_POST['income']);
    $incomeProof = mysqli_real_escape_string($con, $_FILES['incomeProof']['name']);
    
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password); 
    $specialChars = preg_match('@[^\w]@', $password);

    // destination of the file on the server
    $destination = 'uploads/' . $incomeProof;

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['incomeProof']['tmp_name'];
    $size = $_FILES['incomeProof']['size'];

    //Rename this image
    $extension = pathinfo($incomeProof, PATHINFO_EXTENSION);
    $filename = time().'.'.$extension;

    if (!in_array($extension, ['pdf', 'docx'])) {
        $_SESSION['message'] = "Your file extension must be .pdf or .docx";
        header("Location: register.php");
        exit(0);
    } elseif ($_FILES['incomeProof']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
        $_SESSION['message'] = "Your file is too large";
        header("Location: register.php");
        exit(0);
    } else {

        if($password == $conPass)
        {
            //Check email

            $checkemail = "SELECT email FROM registration WHERE email='$email'";
            $checkemail_run = mysqli_query($con, $checkemail);

            //VAlidation for password
            if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8)
            {
                $_SESSION['message'] = "Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character";
                header("Location: register.php");
                exit(0);
            }
            else
            {
                if(mysqli_num_rows($checkemail_run) > 0)
                {
                    //ALREADY EMAIL EXISTS 
                    $_SESSION['message'] = "Email Already Exists";
                    header("Location: register.php");
                    exit(0);
                }
                else
                {
                    $password = password_hash($password, PASSWORD_BCRYPT);
                    move_uploaded_file($_FILES['incomeProof']['tmp_name'], 'uploads/'.$filename);
                    $user_query = "INSERT INTO registration (first_name, middle_initial, last_name, gender, mobile_number, address, email, password, birthday, income, income_proof) 
                    VALUES ('$fname',  '$mname', '$lname', '$gender', '$mobileNumber', '$address', '$email', '$password', '$birthday', '$income', '$filename')";
                    $user_query_run = mysqli_query($con, $user_query);

                    if($user_query_run)
                    {
                        $_SESSION['message'] = "Registered Successfully";
                        header("Location: login.php");
                        exit(0);
                    }
                    else
                    {   
                        $_SESSION['message'] = "Something Went Wrong!";
                        header("Location: register.php");
                        exit(0);
                    }
                }
            }
                
        }
        else
        {
        $_SESSION['message'] = "Password and Confrim password does not Match";
        header("Location: register.php");
        exit(0);
        }
    }
}
else
{
    header("Location: register.php");
    exit(0);
}

?>