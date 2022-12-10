<?php
session_start();
include('connection.php');

if(isset($_POST['login_btn']))
{
   $email = mysqli_real_escape_string($con, $_POST['email']);
   $password = mysqli_real_escape_string($con, $_POST['password']);

   $login_query = "SELECT * FROM registration WHERE email = '$email'";
   $login_query_run =  mysqli_query($con, $login_query);

   if(mysqli_num_rows($login_query_run) > 0)
   {
        foreach($login_query_run as $data)
        {
            if(password_verify($password, $data['password']))
            {
                $user_id = $data['account_id'];
                $user_email = $data['email'];
                $user_fname = $data['first_name'];
                $user_name = $data['first_name'].''.$data['middle_initial'].''.$data['last_name'];
                $user_role = $data['role'];
                
                $_SESSION['auth'] = true;
                $_SESSION['auth_role'] = "$user_role";
                $_SESSION['auth_user'] = [
                    'user_id'=>$user_id,
                    'user_name'=>$user_name,
                    'user_fname'=>$user_fname,
                    'user_email'=>$user_name
                ];

                if($_SESSION['auth_role'] == '1') //ADMIN LOGIN
                {
                    $_SESSION['message'] = "Welcome to Dashboard"; //you are log in as Admin
                    header("Location: admin/index.php");
                    exit(0);
                }
                elseif($_SESSION['auth_role'] == '0') //USER LOGIN  
                {
                    $_SESSION['message'] = "Welcome to Barangay Website"; //you are log in as Admin
                    header("Location: user/index.php");
                    exit(0);
                }
            }
            else
            {
                $_SESSION['message'] = "Invalid Email or Password";
                header("Location: login.php");
                exit(0);
            }
        }
    }
    else
    {
            $_SESSION['message'] = "Invalid Email or Password";
            header("Location: login.php");
            exit(0);
    }
}
else
{
    $_SESSION['message'] = "You are not allowed to access this File";
    header("Location: login.php");
    exit(0);
}

?>