<?php
session_start();
include('config/dbcon.php');

if(isset($_POST['login_btn']))
{
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    // Check if user is an admin
    $admin_query = "SELECT * FROM admin WHERE email='$email' AND password='$password' LIMIT 1";
    $admin_query_run = mysqli_query($con, $admin_query);

    if(mysqli_num_rows($admin_query_run) > 0)
    {
        $admin_data = mysqli_fetch_assoc($admin_query_run);

        $_SESSION['auth'] = true;
        $_SESSION['auth_user'] = [
            'user_id' => $admin_data['id'],
            'user_email' => $admin_data['email'],
            'user_name' => $admin_data['name'],
            'user_address' => $admin_data['address'],
            'user_phone' => $admin_data['phone'],
            'user_birthdate' => $admin_data['birthdate'],
            'user_age' => $admin_data['age'],
            'user_language' => $admin_data['languages'],
            'user_password' => $admin_data['password']
        ];

        $_SESSION['login_success'] = "Hey, welcome to the dashboard!";
        
        header("Location: admin");
        exit(0);
    }
    else
    {
        
        $_SESSION['login_message'] = "Invalid email or password";
        header("Location: login.php");
        exit(0);
    }
}
?>
