<?php
session_start();

include("include1/connection.php");
if(isset($_POST['login']))
{
    $username = $_POST['uname'];
    $password = $_POST['pass'];
    $error = array();
    if(empty($username))
    {
        $error['admin'] = "Enter Username";
    } 
    else if(empty($password))
    {
        $error['admin'] = "Enter Password";
    }
    if(count($error)==0)
    {
        $query = "SELECT * FROM admin1 WHERE Username='$username' AND Password='$password'";
        $result = mysqli_query($connect,$query);

        if(mysqli_num_rows($result) == 1)
        {
            echo "<script>alert('You have Login as an admin')</script>";
            $_SESSION['admin'] = $username;
            header("Location:admin/index.php");
            exit();
        }
        else{
            echo "<script>alert('Invalid Username or Password')</script>";

        }
        
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background-image:url(images/hospital.jpg); background-repeat:no-repeat;background-size:cover;">
    <?php
    include("include1/header.php");
    ?>
    <div style="margin-top:20px;"></div>
    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="jumbotron">
                        <img src="images/adminlogin.jpg" class="col-md-12">
                    <form method="post" class="my-2">

                            <div>
                                <?php
                                if(isset($error['admin1']))
                                {
                                    $sh = $error['admin1'];

                                    $show = "<h4 class='alert alert-danger'>$sh</h4>";
                                }
                                else{
                                    $show = "";
                                }
                                echo $show;
                                ?>
                            </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="uname" class="form-control"
                            autocomplete="off" placeholder="Enter Username">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="pass" class="form-control">
                        </div><br>
                        <input type="submit" name="login" class="btn btn-success" value="Login">
                    </form>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
</body>
</html>